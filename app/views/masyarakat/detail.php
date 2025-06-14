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

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Detail Laporan</h1>


      <a href="<?= BASEURL; ?>/masyarakat"><button class="btn rounded btn-info text-white font-weight-bold p-2 my-3 ml-4" style="width: 10%;">Kembali</button></a>

      <!-- Detail Laporan -->
      <div class="rounded border border-black p-5 ml-4 mb-4" style="background-color: #fefefe;">
         <h2>Detail Laporan</h2>
         <hr>

         <div class="d-flex flex-column">

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Tanggal ditanggapi</p>
                  <p>:</p>
               </div>
               <p><?= $data['detail_tanggapan']['tgl_tanggapan'] ?? '-'; ?></p>
            </div>

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Tanggapan petugas</p>
                  <p>:</p>
               </div>
               <p><?= $data['detail_tanggapan']['tanggapan'] ?? '-'; ?></p>
            </div>

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Status</p>
                  <p>:</p>
               </div>
               <?php if ($data['detail_laporan']['status'] === 'proses') : ?>
                  <div class="text-warning font-weight-bold text-capitalize">
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

            <div class="d-flex flex-row">
               <div class="d-flex mr-4 justify-content-between" style="width: 20%;">
                  <p class="text-nowrap">Tanggal dibuat</p>
                  <p>:</p>
               </div>
               <p><?= $data['detail_laporan']['tgl_pengaduan']; ?></p>
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

         </div>
      </div>

   </div> <!-- container closing -->

</div>