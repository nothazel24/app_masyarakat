  <div class="d-flex flex-row align-items-center" style="color: #fefefe;">

     <div class="loginSection container-fluid d-flex flex-column justify-content-center align-items-center rounded p-4" style="background-color: #4e17eb; min-height: 100vh;">

        <div class="container">
           <h1><strong>Login</strong></h1>
           <p>Silahkan masukkan akun anda!</p>
        </div>

        <div class="formLogin p-5 w-100">

           <form action="<?= BASEURL; ?>/login/userlogin" method="post" autocomplete="on">

              <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required />
              </div>

              <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" name="password" placeholder="**********" required />
              </div>

              <div class="d-flex flex-row mt-4 mb-3 justify-content-between">
                 <a href="<?= BASEURL; ?>/registrasi" target="_self" class="text-warning">
                    <p>Belum punya akun?</p>
                 </a>
                 <a href="#" target="_self" class="text-white">
                    <p>Lupa password</p>
                 </a>
              </div>

              <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Simpan data saya</label>
                </div> --> <!-- If required, delete the comments tag *Iann -->

              <button type="submit" class="btn btn-warning mt-3 w-100" name="submit"><b style="color: #fefefe;">Login</b></button>
           </form>

        </div> <!-- formLogin closing -->
     </div> <!-- loginSection closing -->



     <div class="img container-fluid">
        <img src="assets/img/side.png" alt="sideImage" class="sideImage" style="min-height: 100vh;">
        <!-- Notifikasi -->
        <div class="row px-3">
           <div class="container-fluid">
              <?php Flasher::flash(); ?>
           </div>
        </div>
     </div>

  </div>