<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Generate Laporan</h1>

      <div class="row px-3">
         <div class="container-fluid">
            <?php Flasher::flash(); ?>
         </div>
      </div>

      <a href="<?= BASEURL; ?>/petugas/petugas"><button class="btn rounded btn-success text-white font-weight-bold p-2 mb-3 mt-3 ml-4" style="width: 10%;">Kembali</button></a>
      
      <div class="rounded border border-black p-5 ml-4">
         <h2>Tambah petugas</h2>
         <hr>

         <form action="<?= BASEURL; ?>/detail/tambah" method="post">

            <div class="container p-2">

               <div class="form-group">
                  <label for="nama_petugas">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required />
               </div>

               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" required />
               </div>

               <div class="form-group">
                  <label for="password">Password <em class="text-muted">* Gunakan password yang kuat</em></label>
                  <input type="password" class="form-control" id="password" name="password" required />
               </div>

               <div class="row">

                  <div class="col-md-6">
                     <label for="telp">No. telp</label>
                     <input type="text" class="form-control" id="telp" name="telp" placeholder="+62 xxxx" required />
                  </div>

                  <div class="col-md-6">
                     <label for="level">Level</label>
                     <div class="d-flex flex-column">
                        <select name="level" id="level" name="level" class="form-control w-100" required>
                           <option value="admin">Admin</option>
                           <option value="petugas">Petugas</option>
                        </select>
                     </div>
                  </div>

               </div>

               <button class="container-fluid btn btn-warning text-white font-weight-bold mt-4" type="submit" name="submit">Tambah Petugas</button>

            </div> <!-- form container section -->
         </form>

      </div> <!-- border closing tag -->

   </div> <!-- container closing -->
</div>