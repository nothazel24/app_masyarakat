<?php Flasher::flash(); ?>

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Laporan</h1>


      <!-- Laporan -->
      <div class="rounded border border-black p-5 ml-4">
         <h2>Formulir Laporan</h2>
         <hr>

         <form action="<?= BASEURL; ?>/masyarakat/kirimlaporan" method="post" enctype="multipart/form-data">

            <div class="container p-2">
               <input type="hidden" name="nik" id="nik" value="<?= $data['masyarakat']['nik'] ?>">

               <div class="form-group">
                  <label for="tgl_pengaduan">Laporan</label>
                  <textarea name="isi_laporan" id="isi_laporan" class="form-control" placeholder="Isi laporanmu" style="height: 10rem;"></textarea>
               </div>

               <div class="form-group">
                  <label for="tgl_pengaduan">Tanggal Kejadian</label>
                  <input type="date" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" required />
               </div>

               <!-- <div class="form-group">
                  <label for="lokasi_kejadian">Lokasi Kejadian</label>
                  <input type="text" class="form-control" id="lokasi_kejadian" placeholder="Alamat, RT/RW" required />
               </div> -->

               <hr class="mt-4">

               <div class="form-group">
                  <label for="foto">Pilih file <em class="text-muted">*KTP Pengguna</em></label>
                  <input type="file" class="form-control" id="foto" name="foto" required />
               </div>

               <button class="container-fluid btn btn-success text-white font-weight-bold mt-2" type="submit" name="submit">Kirim Laporan</button>
            </div>
         </form>
      </div>

   </div> <!-- container closing -->
</div>