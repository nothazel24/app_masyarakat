<div class="d-flex flex-row" style="background-color:rgb(250, 248, 248);">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Detail Laporan</h1>


      <a href="<?= BASEURL; ?>/masyarakat"><button class="btn rounded btn-info text-white font-weight-bold p-2 mb-3 mt-3 ml-4" style="width: 10%;">Kembali</button></a>

      <!-- Detail Laporan -->
      <div class="rounded border border-black p-5 ml-4 mb-4" style="background-color: #fefefe;">
         <h2>Detail Laporan</h2>
         <hr>

         <div class="d-flex flex-column">

            <div class="d-flex flex-row justify-content-between">
               <p>Tanggal ditanggapi :</p>
               <p><?= $data['detail_tanggapan']['tgl_tanggapan']; ?></p>
            </div>

            <div class="d-flex flex-row justify-content-between">
               <p>Tanggapan petugas :</p>
               <p><?= $data['detail_tanggapan']['tanggapan']; ?></p>
            </div>

            <div class="d-flex flex-row justify-content-between">
               <p>Status :</p>
               <?php if ($data['detail_laporan']['status'] === 'proses') : ?>
                  <div class="text-success font-weight-bold text-capitalize">
                     <?= $data['detail_laporan']['status']; ?>
                  </div>

               <?php elseif ($data['detail_laporan']['status'] === 'selesai') : ?>
                  <div class="text-success font-weight-bold text-capitalize">
                     <?= $data['detail_laporan']['status']; ?>
                  </div>

               <?php elseif ($data['detail_laporan']['status'] === 'belum terverifikasi') : ?>
                  <div class="text-secondary font-weight-bold text-capitalize">
                     <?= $data['detail_laporan']['status']; ?>
                  </div>

               <?php elseif ($data['detail_laporan']['status'] === 'terverifikasi') : ?>
                  <div class="text-info font-weight-bold text-capitalize">
                     <?= $data['detail_laporan']['status']; ?>
                  </div>

               <?php else : ?>
                  <div class="bg-danger p-2 rounded font-weight-bold text-white text-capitalize">
                     Undefined
                  </div>
               <?php endif; ?>
            </div>

            <div class="d-flex flex-row justify-content-between">
               <p>Tanggal laporan dibuat :</p>
               <p><?= $data['detail_laporan']['tgl_pengaduan']; ?></p>
            </div>

            <div class="d-flex flex-row justify-content-between">
               <p>Isi laporan :</p>
               <p><?= $data['detail_laporan']['isi_laporan']; ?></p>
            </div>

         </div>
      </div>

   </div> <!-- container closing -->

</div>