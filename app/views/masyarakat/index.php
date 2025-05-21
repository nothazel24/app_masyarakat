<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Beranda</h1>

      <!-- Laporan -->
      <div class="p-5 ml-4 border rounded" style="background-color: #fefefe">
         <h2>Detail Akun anda</h2>
         <hr>

         <div class="d-flex flex-row align-items-center justify-content-around">
            <div class="d-flex flex-column m-4">
               <img src="<?= BASEURL; ?>/assets/img/profile.jpg" alt="pfp" class="rounded-circle mb-2" width="100">
               <p class="text-center font-weight-bold"><?= $_SESSION['nama']; ?></p>
            </div>

            <div class="d-flex flex-column p-4">
               <p class="font-weight-bold text-left">Laporan Terverifikasi</p>
               <p class="font-weight-bold text-center"><?= $_SESSION['laporan']['terverifikasi'] ?? '0'; ?></p>
            </div>

            <div class="d-flex flex-column p-4">
               <p class="font-weight-bold text-left">Laporan Diproses</p>
               <p class="font-weight-bold text-center"><?= $_SESSION['laporan']['proses'] ?? '0'; ?></p>
            </div>

            <div class="d-flex flex-column p-4">
               <p class="font-weight-bold text-left">Laporan Selesai</p>
               <p class="font-weight-bold text-center"><?= $_SESSION['laporan']['selesai'] ?? '0'; ?></p>
            </div>
         </div> <!-- wrapper info akun -->

      </div> <!-- wrapper border/content1 -->

      <div class="py-5 ml-4">
         <h2>History pengaduan</h2>
         <hr class="my-4">

         <?php if (!empty($data['laporan'])) : ?>
            <div class="table-responsive">
               <table class="table table-striped table-info text-left">
                  <thead class="font-weight-bold">
                     <tr>
                        <td>Tanggal</td>
                        <td>Isi laporan</td>
                        <td>Detail</td>
                     </tr>
                  </thead>

                  <tbody>
                     <?php foreach ($data['laporan'] as $laporan) : ?>
                        <tr>
                           <td><?= $laporan['tgl_pengaduan']; ?></td>
                           <td><?= $laporan['isi_laporan']; ?></td>
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