<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Generate Laporan</h1>

        <!-- Data search -->
        <div class="rounded border border-black p-5 ml-4">
            <h2>Cari berdasarkan tanggal</h2>
            <hr>

            <form action="" method="post">

                <div class="container p-2">

                    <div class="form-group">
                        <label for="tanggalStart">Tanggal awal</label>
                        <input type="date" class="form-control" id="tanggalStart" required />
                    </div>

                    <div class="form-group">
                        <label for="tanggalEnd">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggalEnd" required />
                    </div>

                    <button class="container-fluid btn btn-warning text-white font-weight-bold mt-2" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>



        <!-- Data result Layout section -->

        <?php if (isset($_POST['submit'])) : ?>

            <div class="rounded border border-black ml-4 mt-5">
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