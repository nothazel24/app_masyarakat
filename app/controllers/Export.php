<?php

class Export extends Controller
{
   public function pdf($tgl_awal = null, $tgl_akhir = null)
   {
      require_once("../vendor/tecnickcom/tcpdf/tcpdf.php");

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $tgl_awal = $_POST['tgl_awal'];
         $tgl_akhir = $_POST['tgl_akhir'];
      }

      if (!$tgl_awal) $tgl_awal = date('Y-m-01');
      if (!$tgl_akhir) $tgl_akhir = date('Y-m-d');

      $data = [
         'tgl_awal' => $tgl_awal,
         'tgl_akhir' => $tgl_akhir,
         'total_laporan' => $this->model('Pengaduan_model')->getPengaduanByDate($tgl_awal, $tgl_akhir)
      ];

      // Ekspor PDF
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('E-Report Public Complain Services');
      $pdf->SetTitle('Data Laporan');
      $pdf->SetSubject('Data Laporan');
      $pdf->SetKeywords('Data Laporan');
      $pdf->SetFont('times', '', 11);
      $pdf->setPrintHeader(false);
      $pdf->AddPage();

      // Buat output HTML dari file view khusus PDF
      extract($data);
      ob_start();
      require_once '../app/views/export/index.php';
      $html = ob_get_clean();

      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Output('Data_Laporan_' . $tgl_awal . '_to_' . $tgl_akhir . '.pdf', 'D');
   }

   public function index()
   {
      // Tampilkan halaman untuk filter tanggal
      $this->view('templates/header');
      $this->view('templates/sidebar');
      $this->view('export/index'); 
      $this->view('templates/footer');
   }
}
