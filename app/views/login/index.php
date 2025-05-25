<?php Flasher::flash(); ?>

<div class="container-fluid d-flex flex-column justify-content-center align-content-center" style="min-height: 100vh;">

   <div class="text-center my-2">
      <h2 class="mb-1"><strong>E-Report</strong></h2>
      <p>Silahkan masukkan detail akun anda!</p>
   </div>

   <div class="p-5 w-50 mx-auto rounded shadow" style="background-color:rgb(255, 255, 255);">

      <form action="<?= BASEURL; ?>/login/userlogin" method="post" autocomplete="on">

         <div class="form-group">
            <label for="username">Username</label>
            <div class="d-flex">
               <img src="<?= BASEURL; ?>/assets/icons/user.svg" width="32" style="opacity: 80%;" class="mr-3">
               <input type="text" class="form-control" id="username" name="username" required />
            </div>
         </div>

         <div class="form-group">
            <label for="password">Password</label>
            <div class="d-flex">
               <img src="<?= BASEURL; ?>/assets/icons/password.svg" width="32" style="opacity: 80%;" class="mr-3">
               <input type="password" class="form-control" id="password" name="password" required />
            </div>
         </div>

         <div class="d-flex flex-row mt-4 mb-3 justify-content-between">
            <a href="<?= BASEURL; ?>/registrasi" target="_self" class="text-info">
               <p>Belum punya akun?</p>
            </a>
            <a href="mailto:e.report.office@gmail.com?subject=Permintaan ganti password" target="_self" class="text-dark">
               <p>Lupa password</p>
            </a>
         </div>

         <button type="submit" class="btn btn-info mt-3 w-100" name="submit"><b style="color: #fefefe;">Login</b></button>
      </form>

   </div> <!-- formLogin closing -->
   <p class="font-weight-bold mx-auto text-info my-2">&copy; 2025 E-Report. All rights reserved.</p>

</div>