<div class="container mt-4">

   <!-- Notifikasi -->
   <div class="row">
      <div class="col-lg-6">
         <?php Flasher::flash(); ?>
      </div>
   </div>

   <!-- Add section -->
   <div class="row mb-3">
      <div class="col-lg-6">
         <button type="button" class="btn btn-primary mb-2 tombolTambahData" data-toggle="modal" data-target="#formModal">
            Tambah Data Siswa
         </button>
      </div>
   </div>

   <!-- Searching section -->
   <div class="row mb-3">
      <div class="col-lg-6">
         <form action="<?= BASEURL; ?>/siswa/cari" method="post">
            <div class="input-group mb-3">
               <input type="text" class="form-control" placeholder="Cari NIS" name="keyword" id="keyword" autocomplete="off">
               <div class="input-group-append">
                  <button class="btn btn-outline-warning" type="submit" id="tombolCari">Cari</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <!-- Daftar siswa -->
   <div class="row">
      <div class="col-lg-6">

         <h3>Daftar siswa</h3>

         <ul type="none" class="list-group">
            <?php foreach ($data['sis'] as $sis) : ?>
               <li class="list-group-item">
                  <?= $sis['nama']; ?>

                  <a href="<?= BASEURL; ?>/siswa/hapus/<?= $sis['id']; ?>" class="badge badge-danger text-white float-right m-1" onclick="return confirm('Anda yakin?')">Hapus</a>
                  
                  <a href="<?= BASEURL; ?>/siswa/detail/<?= $sis['id']; ?>" class="badge badge-info text-white float-right m-1">Detail</a>

                  <a href="<?= BASEURL; ?>/siswa/edit/<?= $sis['id']; ?>" class="badge badge-warning text-white float-right m-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $sis['id']; ?>">Edit</a>

               </li>
            <?php endforeach; ?>
         </ul>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">

   <div class="modal-dialog" role="document">
      <div class="modal-content">

         <div class="modal-header">
            <h5 class="modal-title" id="judulModal">Tambah Data Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= BASEURL; ?>/siswa/tambah" method="post">
               <input type="hidden" name="id" id="id">

               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required />
               </div>

               <div class="form-group">
                  <label for="nis">NIS</label>
                  <input type="number" class="form-control" id="nis" name="nis" required />
               </div>

               <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" required />
               </div>

               <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <select class="form-control" id="jurusan" name="jurusan">
                     <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                     <option value="Arsitektur">Arsitektur</option>
                     <option value="Teknik Audio Video">Teknik Audio Video</option>
                     <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                     <option value="Kuliner">Kuliner</option>
                  </select>
               </div>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
         </div>

      </div>
      
   </div>
</div>