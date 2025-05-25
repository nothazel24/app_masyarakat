<?php Flasher::flash(); ?>

<div class="d-flex flex-row" style="background-color:rgb(250, 248, 248);">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Beranda</h1>

      <!-- Laporan -->
      <div class="p-5 ml-4 border rounded" style="background-color:rgb(247, 247, 247)">
         <h2>Detail Akun anda</h2>
         <hr>

         <div class="d-flex flex-row align-items-center justify-content-around ">

            <div class="d-flex flex-column mx-2 my-3 align-items-center">
               <img src="<?= BASEURL; ?>/assets/img/profile.jpg" alt="pfp" class="rounded-circle my-3" width="100">
               <p class="text-center font-weight-bold"><?= $_SESSION['nama']; ?></p>
            </div>

            <div class="d-flex flex-column px-4 py-3 rounded text-white" style="background-color:rgb(95, 201, 211)">
               <p class="font-weight-bold text-left">Laporan Terverifikasi</p>
               <p class="font-weight-bold text-center"><?= $_SESSION['laporan_rekap']['terverifikasi']; ?></p>
            </div>

            <div class="d-flex flex-column px-4 py-3 rounded text-white" style="background-color:rgb(253, 232, 68)">
               <p class="font-weight-bold text-left">Laporan Diproses</p>
               <p class="font-weight-bold text-center"><?= $_SESSION['laporan_rekap']['proses']; ?></p>
            </div>

            <div class="d-flex flex-column px-4 py-3  rounded text-white" style="background-color:rgb(158, 214, 62)">
               <p class="font-weight-bold text-left">Laporan Selesai</p>
               <p class="font-weight-bold text-center"><?= $_SESSION['laporan_rekap']['selesai']; ?></p>
            </div>
         </div> <!-- wrapper info akun -->

      </div> <!-- wrapper border/content1 -->

      <div class="py-5 ml-4">
         <h2>History pengaduan</h2>
         <hr class="my-4">

         <?php if (!empty($data['laporan'])) : ?>
            <div class="table-responsive">
               <table class="table table-striped text-left">
                  <thead class="font-weight-bold">
                     <tr>
                        <th>Tanggal</th>
                        <th>Isi laporan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php foreach ($data['laporan'] as $laporan) : ?>
                        <tr>
                           <td><?= $laporan['tgl_pengaduan']; ?></td>
                           <td><?= substr($laporan['isi_laporan'], 0, 50); ?></td>
                           <td>
                              <?php if ($laporan['status'] === 'proses') : ?>
                                 <div class="bg-warning text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                                    <?= $laporan['status']; ?>
                                 </div>

                              <?php elseif ($laporan['status'] === 'selesai'): ?>
                                 <div class="bg-success text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                                    <?= $laporan['status']; ?>
                                 </div>

                              <?php elseif ($laporan['status'] === 'terverifikasi'): ?>
                                 <div class="bg-info text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                                    <?= $laporan['status']; ?>
                                 </div>

                              <?php elseif ($laporan['status'] === 'belum terverifikasi'): ?>
                                 <div class="bg-secondary text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                                    <?= $laporan['status']; ?>
                                 </div>

                              <?php else : ?>
                                 <div class="text-left text-danger font-weight-bold">Error!</div>
                              <?php endif; ?>
                           </td>
                           <td>
                              <a href="<?= BASEURL; ?>/detail/laporan/<?= $laporan['id_pengaduan']; ?>" class="text-dark font-weight-bold" style="text-decoration: none;">Detail laporan</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>

                  </tbody>
               </table>

            </div>
      </div>
   <?php else : ?>
      <div class="bg-info rounded  p-2 text-white font-weight-bold text-center">Anda belum mengisi laporan</div>
   <?php endif; ?>

   </div> <!-- container closing -->
</div>