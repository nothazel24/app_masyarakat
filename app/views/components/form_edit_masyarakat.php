<form action="<?= BASEURL; ?>/petugas/ubah" method="post">
   <input type="hidden" name="nik" value="<?= $data['masyarakat']['nik']; ?>">

   <div class="container p-2">

      <div class="form-group">
         <label for="tanggalStart">Nama Lengkap</label>
         <input type="text" class="form-control" value="<?= $data['masyarakat']['nama']; ?>" name="nama" required />
      </div>

      <div class="form-group">
         <label for="telp">No. Telp</label>
         <input type="text" class="form-control" value="<?= $data['masyarakat']['telp']; ?>" name="telp" placeholder="+62 xxxx" required />
      </div>

      <div class="row">

         <div class="col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" value="<?= $data['masyarakat']['username']; ?>" name="username" placeholder="Dummy" required />
         </div>

         <div class="col-md-6">
            <div class="form-group">
               <label for="password">Password <em class="text-muted">*Kosongkan jika tidak ingin mengubah</em></label>
               <input type="password" class="form-control" name="password" placeholder="******">
            </div>
         </div>

      </div>

      <button class="container-fluid btn btn-warning text-white font-weight-bold mt-4" type="submit" name="submit">Konfirmasi perubahan</button>

   </div> <!-- form container section -->
</form>