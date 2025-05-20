<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Beranda</h1>

        <!-- Laporan -->
        <div class="p-5 ml-4 border rounded" style="background-color: #fefefe">
            <h2>Detail Akun anda</h2>
            <hr>

            <div class="d-flex flex-row align-items-center justify-content-around">
                <div class="d-flex flex-column m-4">
                    <img src="<?= BASEURL; ?>/assets/img/profile.jpg" alt="pfp" class="rounded-circle mb-2" width="100">
                    <p class="text-center font-weight-bold">User244432</p>
                </div>

                <div class="d-flex flex-column p-4">
                    <p class="font-weight-bold text-left">Laporan Terverifikasi</p>
                    <p class="font-weight-bold text-center">0</p>
                </div>

                <div class="d-flex flex-column p-4">
                    <p class="font-weight-bold text-left">Laporan Diproses</p>
                    <p class="font-weight-bold text-center">0</p>
                </div>

                <div class="d-flex flex-column p-4">
                    <p class="font-weight-bold text-left">Laporan Selesai</p>
                    <p class="font-weight-bold text-center">0</p>
                </div>
            </div> <!-- wrapper info akun -->

        </div> <!-- wrapper border/content1 -->

        <div class="py-5 ml-4">
            <h2>History pengaduan</h2>
            <hr class="my-4">

            <div class="table-responsive">
                <table class="table table-striped table-info text-left">
                    <thead class="font-weight-bold">
                        <tr>
                            <td>Tanggal</td>
                            <td>Isi laporan</td>
                            <td>Detail</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>01-11-2007</td>
                            <td>Lorem ipsum dolor sit amet</td>
                            <td><a href="../sys/editLaporan.php" target="_self" style="text-decoration: none; color: #252525;">Lihat</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- container closing -->
</div>