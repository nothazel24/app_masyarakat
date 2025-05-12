<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Detail Akun</h1>

        <a href="<?= BASEURL;?>/detail/masyarakat"><button class="btn rounded btn-success text-white font-weight-bold p-2 mb-3 mt-3 ml-4" style="width: 10%;">Kembali</button></a>
        <div class="rounded border border-black p-5 ml-4">
            <h2>Edit data masyarakat</h2>
            <hr>

            <form action="" method="post">

                <div class="container p-2">

                    <div class="form-group">
                        <label for="tanggalStart">Nama Lengkap</label>
                        <input type="text" class="form-control" id="tanggalStart" required />
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" required />
                    </div>

                    <div class="form-group">
                        <label for="telp">No. Telp</label>
                        <input type="text" class="form-control" id="telp" placeholder="+62 xxxx" required />
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Dummy" required />
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="******" required />
                            </div>
                        </div>

                    </div>

                    <button class="container-fluid btn btn-warning text-white font-weight-bold mt-4" type="submit" name="submit">Konfirmasi perubahan</button>

                </div> <!-- form container section -->
            </form>

        </div> <!-- border closing tag -->

    </div> <!-- container closing -->
</div>