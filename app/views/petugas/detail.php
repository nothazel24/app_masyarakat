<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Detail Laporan</h1>

      <!-- Notifikasi -->
      <div class="row px-3">
         <div class="container-fluid">
            <?php Flasher::flash(); ?>
         </div>
      </div>

      <!-- Detail Laporan -->
      <div class="rounded border border-black p-5 ml-4 mb-4">
         <h2>Detail Laporan</h2>
         <hr>

         <div class="d-flex flex-column justify-content-start">
            <div class="d-flex flex-row justify-content-between">
               <div style="width: 30%;">
                  <div class="d-flex justify-content-between">
                     <p class="font-weight-bold">Tanggal Laporan</p>
                     <p>:</p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p class="font-weight-bold">Isi Laporan</p>
                     <p>:</p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p class="font-weight-bold">Bukti Laporan</p>
                     <p>:</p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p class="font-weight-bold">Status Laporan</p>
                     <p>:</p>
                  </div>
               </div>

               <div class="content" style="width: 65%;">
                  <p><?= $data['detail_laporan']['tgl_pengaduan']; ?></p>
                  <p><?= $data['detail_laporan']['isi_laporan']; ?></p>
                  <p><?= $data['detail_laporan']['foto']; ?></p>
                  <?php if ($data['detail_laporan']['status'] === 'proses') : ?>
                     <p class="badge badge-warning text-white p-2" style="text-transform: capitalize;"><?= $data['detail_laporan']['status']; ?></p>
                  <?php elseif ($data['detail_laporan']['status'] === 'selesai') : ?>
                     <p class="badge badge-success text-white p-2" style="text-transform: capitalize;"><?= $data['detail_laporan']['status']; ?></p>
                  <?php else : ?>
                     <p class="badge badge-danger text-white p-2" style="text-transform: capitalize;">Error!</p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>


      <br><br><br>

      <!-- Section tanggapan -->

      <div class="rounded border border-black p-5 ml-4">
         <h2>Tanggapan Petugas</h2>
         <hr>

         <div class="d-flex flex-column">
            <div class="container">
               <form action="<?= BASEURL; ?>/petugas/tanggapi" method="post">
                  <input type="hidden" name="id_pengaduan" value="<?= $data['detail_laporan']['id_pengaduan']; ?>">

                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control w-100" value="<?= $data['data_laporan']['status']; ?>" required>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="tanggapan">Tanggapan</label>
                     <input type="text" class="form-control" name="tanggapan" id="tanggapan" placeholder="Isi tanggapan" value="<?= $data['tanggapan']['tanggapan'] ?? ''; ?>" required />
                  </div>

                  <button type="submit" class="btn btn-success w-100 mt-3" name="submit">Kirim</button>
               </form>
            </div>
         </div>
      </div>

   </div> <!-- container closing -->

</div>