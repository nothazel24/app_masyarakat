<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Laporan</h1>
        
        <!-- Laporan -->
        <div class="rounded border border-black p-5 ml-4">
            <h2>Formulir Laporan</h2>
            <hr>

            <form action="" method="post">

                <div class="container p-2">

                    <div class="form-group">
                        <label for="laporan">Laporan</label>
                        <textarea name="laporan" id="laporan" class="form-control" placeholder="Isi laporanmu" style="height: 10rem;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tanggalEnd">Tanggal Kejadian</label>
                        <input type="date" class="form-control" id="tanggalEnd" required />
                    </div>

                    <div class="form-group">
                        <label for="lokasi_kejadian">Lokasi Kejadian</label>
                        <input type="text" class="form-control" id="lokasi_kejadian" placeholder="Alamat, RT/RW" required />
                    </div>

                    <hr class="mt-4">

                    <div class="form-group">
                        <label for="bukti">Pilih file <em class="text-muted">*KTP Pengguna</em></label>
                        <input type="file" class="form-control" id="bukti" required />
                    </div>

                    <button class="container-fluid btn btn-warning text-white font-weight-bold mt-2" type="submit" name="submit">Kirim Laporan</button>
                </div>
            </form>
        </div>



        <!-- Data result Layout section -->

        <?php if (isset($_POST['submit'])) : ?>

            <br><br><br>

            <div class="rounded border border-black ml-4">
                <div class="d-flex justify-content-between align-self-center pl-4 pr-4 pt-3">
                    <h2>Data laporan</h2>
                    <button class="btn btn-danger text-white font-weight-bold pl-4 pr-4 rounded">Export PDF</button>
                </div>
                <hr>

                <div class="table-responsive">
                    <div class="container">
                        <table class=" table table-striped text-left">
                            <thead class="table-warning">
                                <tr>
                                    <td>No.</td>
                                    <td>Tanggal</td>
                                    <td>Isi laporan</td>
                                    <td>Status</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>01-11-2007</td>
                                    <td class="text-wrap">Lorem Ipsum dolor sit amet</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php else : ?>
                <!-- <div class="bg-danger p-2">
                    <p class="font-weight-bold text-white text-center m-1">Data tidak ditemukan!</p>
                </div> *buat nanti aja, --iann -->

            </div> <!-- Data closing tag -->

        <?php endif; ?>

    </div> <!-- container closing -->
</div>