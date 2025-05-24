<div class="d-flex flex-row" style="background-color:rgb(250, 248, 248); height: 100vh;">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data <?= $data['judul']; ?></h1>

      <div class="search container-fluid d-flex flex-row flex-wrap justify-content-between align-items-center my-3">

         <div>
            <a href="<?= BASEURL; ?>/petugas/<?= strtolower($data['judul']); ?>" target="_self" style="text-decoration: none;"><button class="btn btn-info p-2 text-white font-weight-bold">Kembali</button></a>
         </div>

      </div>

      <div class="tableUnit container-fluid table-responsive" id="hasilData">
         <table class="table table-striped text-left">
            <thead>
               <tr>
                  <?php if (!empty($data['masyarakat'])) : ?>
                     <th>No.</th>
                     <th>Nama</th>
                     <th>NIK</th>
                     <th>Username</th>
                     <th>No. Telp</th>
                     <th>Aksi</th>
                  <?php elseif (!empty($data['petugas'])) : ?>
                     <th>No.</th>
                     <th>Nama</th>
                     <th>Username</th>
                     <th>No. Telp</th>
                     <th>Level</th>
                     <th>Aksi</th>
                  <?php elseif (!empty($data['pengaduan'])) : ?>
                     <th>No.</th>
                     <th>Tanggal pengaduan</th>
                     <th>NIK</th>
                     <th>Isi laporan</th>
                     <th>Foto</th>
                     <th>Status</th>
                     <th>Aksi</th>
                  <?php endif; ?>
               </tr>
            </thead>

            <tbody>

               <!-- MASYARAKAT -->
               <?php if (!empty($data['masyarakat'])) :  ?>
                  <?php $this->view('components/tabel_masyarakat', $data); ?>


                  <!-- PETUGAS -->
               <?php elseif (!empty($data['petugas'])) :  ?>
                  <?php $this->view('components/tabel_petugas', $data); ?>


               <?php elseif (!empty($data['pengaduan'])) :  ?>
                  <?php $this->view('components/tabel_pengaduan', $data); ?>

               <?php else : ?>
                  <div class="container-fluid bg-danger rounded p-3">
                     <p class="text-white font-weight-bold">Data Keyword belum dimasukkan!</p>
                  </div>

               <?php endif; ?>

            </tbody>
         </table>

      </div> <!-- tableUnit closing -->

   </div> <!-- container closing -->
</div>