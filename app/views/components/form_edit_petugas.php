<form action="<?= BASEURL; ?>/petugas/ubahpetugas" method="post">
   <input type="hidden" name="id_petugas" value="<?= $data['petugas']['id_petugas']; ?>">

   <div class="container p-2">

      <div class="form-group">
         <label for="tanggalStart">Nama Lengkap</label>
         <input type="text" class="form-control" value="<?= $data['petugas']['nama_petugas']; ?>" name="nama_petugas" required />
      </div>

      <div class="form-group">
         <label for="telp">No. Telp</label>
         <input type="text" class="form-control" value="<?= $data['petugas']['telp']; ?>" name="telp" placeholder="+62 xxxx" required />
      </div>

      <label for="level">Level</label>
      <select name="level" id="level" class="form-control w-100" value="<?= $data['petugas']['level']; ?>" required>
         <option value="admin">Admin</option>
         <option value="petugas">Petugas</option>
      </select>

      <div class="row mt-4">

         <div class="col-md-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" value="<?= $data['petugas']['username']; ?>" name="username" placeholder="Dummy" required />
         </div>

         <div class="col-md-6">
            <label for="password">Password <em class="text-muted">*Kosongkan jika tidak ingin mengubah</em></label>
            <input type="password" class="form-control" name="password" placeholder="******">
         </div>

      </div>

      <button class="container-fluid btn btn-success text-white font-weight-bold mt-4" type="submit" name="submit">Konfirmasi perubahan</button>

   </div> <!-- form container section -->
</form>
