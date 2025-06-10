<div class="d-flex flex-row" style="height: 100vh;">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Generate Laporan</h1>

      <!-- Data search -->
      <div class="rounded border border-black p-5 ml-4" style="background-color: #fefefe;">
         <h2>Cari berdasarkan tanggal</h2>
         <hr>

         <form action="<?= BASEURL; ?>/petugas/laporan/" method="post">

            <div class="container p-2">

               <div class="form-group">
                  <label for="tanggalStart">Tanggal awal</label>
                  <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required />
               </div>

               <div class="form-group">
                  <label for="tanggalEnd">Tanggal Akhir</label>
                  <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required />
               </div>

               <button class="container-fluid btn btn-success text-white font-weight-bold mt-2" type="submit" name="submit">Cari</button>
            </div>
         </form>
      </div>



      <!-- Data result Layout section -->
      <?php if (isset($_POST['submit'])) : ?>

         <?php 
            $tgl_awal = $_POST['tgl_awal'];   
            $tgl_akhir = $_POST['tgl_akhir'];   
         ;?>

         <?php if (!empty($data['laporan'])) : ?>
            <div class="rounded border border-black ml-4 mt-5">
               <div class="d-flex justify-content-between align-self-center pl-4 pr-4 pt-3">
                  <h2>Data laporan</h2>
                  <a href="<?= BASEURL; ?>/export/pdf/<?= $tgl_awal; ?>/<?= $tgl_akhir;?>" style="color: #fefefe; text-decoration: none;">
                     <button class="btn btn-danger text-white font-weight-bold pl-4 pr-4 rounded">Export PDF</button>
                  </a>
               </div>
               <hr>

               <div class="table-responsive">
                  <div class="container">
                     <table class="table table-striped text-left">
                        <thead>
                           <tr class="font-weight-bold">
                              <td>No.</td>
                              <td>Tanggal</td>
                              <td>Isi laporan</td>
                              <td>Status</td>
                           </tr>
                        </thead>

                        <tbody>
                           <?php $no = 1; ?>
                           <?php foreach ($data['laporan'] as $laporan) : ?>
                              <tr class="text-left">
                                 <td><?= $no++; ?></td>
                                 <td><?= $laporan['tgl_pengaduan']; ?></td>
                                 <td><?= $laporan['isi_laporan']; ?></td>
                                 <td>
                                    <?php if ($laporan['status'] === 'proses') : ?>
                                       <div class="bg-warning p-2 rounded font-weight-bold text-white w-50 text-capitalize">
                                          <?= $laporan['status']; ?>
                                       </div>
                                    <?php elseif ($laporan['status'] === 'selesai') : ?>
                                       <div class="bg-success p-2 m-2 rounded font-weight-bold text-white w-50 text-capitalize">
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
                                       <div class="bg-danger p-2 rounded font-weight-bold text-white w-50 text-capitalize">
                                          Undefined
                                       </div>
                                    <?php endif; ?>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

         <?php else : ?>
            <div class="bg-danger p-3 rounded text-white font-weight-bold ml-4 mt-4">
               Data tidak ditemukan untuk tanggal yang dipilih.
            </div>
         <?php endif; ?>

      <?php endif; ?>


   </div> <!-- container closing -->
</div>