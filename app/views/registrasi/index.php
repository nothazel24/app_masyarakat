<div class="d-flex flex-row align-items-center" style="color: #fefefe;">

    <div class="loginSection container-fluid d-flex flex-column justify-content-center align-items-center rounded p-4" style="background-color: #4e17eb; min-height: 100vh;">

        <div class="container-fluid">
            <h1><strong>Registrasi</strong></h1>
            <p>Silahkan masukkan detail akun anda!</p>
        </div>

        <div class="formLogin w-100 pl-5 pr-5 pt-2">
                <form action="" method="post" autocomplete="on">
                    <div class="form-group rounded" style="height: fit-content; margin-bottom: 0.5rem;">
                        <label for="nik" style="margin-bottom: 0;">NIK</label>
                        <input type="nik" class="form-control" id="nik" placeholder="09989xxxx" required />
                    </div>

                    <div class="form-group rounded" style="height: fit-content; margin-bottom: 0.5rem;">
                        <label for="namaLengkap" style="margin-bottom: 0;">Nama Lengkap</label>
                        <input type="namaLengkap" class="form-control" id="namaLengkap" placeholder="Nama lengkap mu" required />
                    </div>

                    <div class="form-group rounded" style="height: fit-content; margin-bottom: 0.5rem;">
                        <label for="telp" style="margin-bottom: 0;">No.Telp</label>
                        <input type="telp" class="form-control" id="telp" placeholder="+62 858xxxx" required />
                    </div>

                    <div class="form-group rounded" style="height: fit-content; margin-bottom: 0.5rem;">
                        <label for="username" style="margin-bottom: 0;">Username</label>
                        <input type="username" class="form-control" id="username" placeholder="Username" required />
                    </div>

                    <div class="form-group rounded" style="height: fit-content; margin-bottom: 0.5rem;">
                        <label for="password" style="margin-bottom: 0;">Password</label>
                        <input type="password" class="form-control" id="passInput" placeholder="**********" required />
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
        <img src="assets/img/side.png" alt="sideImage" style="min-height: 100vh;">
    </div>

</div>