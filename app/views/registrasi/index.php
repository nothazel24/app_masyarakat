<?php Flasher::flash(); ?>

<div class="container-fluid d-flex flex-column justify-content-center align-content-center" style="min-height: 100vh;">

   <div class="text-center my-2">
      <h2 class="mb-1"><strong>E-Report</strong></h2>
      <p>Silahkan masukkan detail akun anda!</p>
   </div>

   <div class="p-5 w-50 mx-auto rounded shadow" style="background-color:rgb(255, 255, 255);">

      <form action="<?= BASEURL; ?>/registrasi/daftarmasyarakat" method="post" autocomplete="on">

         <div class="form-group rounded mb-3" style="height: fit-content; margin-bottom: 0.5rem;">
            <label for="namaLengkap" style="margin-bottom: 0;">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap mu" required />
         </div>

         <div class="row">
            <div class="col-md-6 rounded mv-3" style="height: fit-content; margin-bottom: 0.5rem;">
               <label for="nik" style="margin-bottom: 0;">NIK</label>
               <input type="text" class="form-control" name="nik" id="nik" placeholder="09989xxxx" required />
            </div>


            <div class="col-md-6 rounded mb-3" style="height: fit-content; margin-bottom: 0.5rem;">
               <label for="telp" style="margin-bottom: 0;">No.Telp</label>
               <input type="text" class="form-control" name="telp" id="telp" placeholder="+62 858xxxx" required />
            </div>
         </div>

         <div class="row">
            <div class="col-md-6 rounded mb-3" style="height: fit-content; margin-bottom: 0.5rem;">
               <label for="username" style="margin-bottom: 0;">Username</label>
               <input type="text" class="form-control" name="username" id="username" placeholder="Username" required />
            </div>

            <div class="col-md-6 rounded mb-3" style="height: fit-content; margin-bottom: 0.5rem;">
               <label for="password" style="margin-bottom: 0;">Password</label>
               <input type="password" class="form-control" name="password" id="password" placeholder="**********" required />
            </div>
         </div>

         <button type="submit" class="btn btn-info mt-3 w-100" name="submit"><b style="color: #fefefe;">Daftar</b></button>
      </form>

   </div> <!-- formRegistrasi closing -->

   <p class="font-weight-bold mx-auto text-info my-2">&copy; 2025 E-Report. All rights reserved.</p>

</div>