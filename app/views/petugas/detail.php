<?php Flasher::flash(); ?>

<!-- MODAL PREVIEW FOTO -->
<div class="modal fade" id="previewFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content d-flex flex-column">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bukti Kejadian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body mx-auto">
            <img src="<?= $data['detail_laporan']['foto']; ?>" width="400">
         </div>
         <div class="modal-footer">
            <em style="font-size: .7rem;">E-Report Public Complain Services</em>
         </div>
      </div>
   </div>
</div>

<div class="d-flex flex-row" style="background-color:rgb(250, 248, 248);">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Detail Laporan</h1>


      <a href="<?= BASEURL; ?>/petugas/pengaduan"><button class="btn rounded btn-info text-white font-weight-bold p-2 mb-3 mt-3 ml-4" style="width: 10%;">Kembali</button></a>

      <!-- Detail Laporan -->
      <div class="rounded border border-black p-5 ml-4 mb-4" style="background-color: #fefefe;">
         <h2>Detail Laporan</h2>
         <hr>

         <div class="d-flex flex-column">

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Tanggal laporan</p>
                  <p>:</p>
               </div>
               <p><?= $data['detail_laporan']['tgl_pengaduan'] ?? '-'; ?></p>
            </div>

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Isi laporan</p>
                  <p>:</p>
               </div>
               <p class="text-justify" style="width: 75%;"><?= $data['detail_laporan']['isi_laporan']; ?></p>
            </div>

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Foto</p>
                  <p>:</p>
               </div>
               <p><a href="#" style="text-decoration: none;" class="font-weight-bold text-info" data-toggle="modal" data-target="#previewFoto">Preview</a></p>
            </div>

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Status</p>
                  <p>:</p>
               </div>
               <?php if ($data['detail_laporan']['status'] === 'proses') : ?>
                  <p class="badge badge-warning text-white p-2" style="text-transform: capitalize;"><?= $data['detail_laporan']['status']; ?></p>

               <?php elseif ($data['detail_laporan']['status'] === 'selesai') : ?>
                  <p class="badge badge-success text-white p-2" style="text-transform: capitalize;"><?= $data['detail_laporan']['status']; ?></p>

               <?php elseif ($data['detail_laporan']['status'] === 'belum terverifikasi') : ?>
                  <p class="badge badge-secondary text-white p-2" style="text-transform: capitalize;"><?= $data['detail_laporan']['status']; ?></p>

               <?php elseif ($data['detail_laporan']['status'] === 'terverifikasi') : ?>
                  <p class="badge badge-info text-white p-2" style="text-transform: capitalize;"><?= $data['detail_laporan']['status']; ?></p>

               <?php else : ?>
                  <p class="badge badge-danger text-white p-2" style="text-transform: capitalize;">Error!</p>
               <?php endif; ?>
            </div>

         </div>
      </div>


      <br><br><br>

      <!-- Section tanggapan -->

      <div class="rounded border border-black p-5 ml-4" style="background-color: #fefefe;">
         <h2>Tanggapan Petugas</h2>
         <hr>

         <div class="d-flex flex-column">
            <div class="container">
               <form action="<?= BASEURL; ?>/petugas/tanggapi" method="post">
                  <input type="hidden" name="id_pengaduan" value="<?= $data['detail_laporan']['id_pengaduan']; ?>">
                  <input type="hidden" name="id_petugas" value="<?= $_SESSION['id_petugas']; ?>">

                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control w-100" required>
                        <option value="proses" <?= $data['detail_laporan']['status'] === 'proses' ? 'selected' : ''; ?>>
                           Proses
                        </option>

                        <option value="selesai" <?= $data['detail_laporan']['status'] === 'selesai' ? 'selected' : ''; ?>>
                           Selesai
                        </option>

                        <option value="terverifikasi" <?= $data['detail_laporan']['status'] === 'terverifikasi' ? 'selected' : ''; ?>>
                           Terverifikasi
                        </option>
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