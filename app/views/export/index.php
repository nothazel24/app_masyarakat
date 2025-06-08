<style>
   * {
      font-family: sans-serif;
      font-size: 11px;
   }

   table {
      width: 100%;
      border-collapse: collapse;
   }

   tr,
   th {
      border: 1px solid black;
      padding: 5px;
      background-color: #17a2b8;
   }

   tr,
   td {
      border: 1px solid black;
      padding: 5px;
      background-color: #fefefe;
   }

   p {
      margin-top: 2rem;
      font-size: small;
      font-style: italic;
      text-align: right;
   }
</style>

<h1>Data Laporan Pengaduan</h1>
<h6>Periode: <?= $tgl_awal ?> s/d <?= $tgl_akhir ?></h6>

<table>
   <thead>
      <tr>
         <th>No.</th>
         <th>Tanggal Pengaduan</th>
         <th>NIK</th>
         <th>Isi Laporan</th>
         <th>Status</th>
      </tr>
   </thead>

   <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data['total_laporan'] as $export) : ?>

         <tr>
            <td><?= $no++; ?></td>
            <td><?= $export['tgl_pengaduan']; ?></td>
            <td><?= $export['nik']; ?></td>
            <td><?= $export['isi_laporan']; ?></td>
            <td><?= $export['status']; ?></td>
         </tr>
      <?php endforeach; ?>

   </tbody>
</table>

<p>
   <b>E-report</b> Public Complain Service
</p>