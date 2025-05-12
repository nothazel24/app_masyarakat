<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Detail Laporan</h1>

        <!-- Detail Laporan -->

        <div class="rounded border border-black p-5 ml-4">
            <h2>Detail Laporan</h2>
            <hr>

            <div class="d-flex flex-column">
                <?php for ($i = 0; $i <= 5; $i++) : ?>
                    <div class="d-flex flex-row">
                        <p class="font-weight-bold">NIK : </p>
                        <p class="ml-4">0990883</p>
                    </div>
                <?php endfor; ?>
            </div>
        </div>


        <br><br><br>

        <!-- Section tanggapan -->

        <div class="rounded border border-black p-5 ml-4">
            <h2>Tanggapan Petugas</h2>
            <hr>

            <div class="d-flex flex-column">
                <div class="container">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" placeholder="Status" value="Pending" required />
                        </div>

                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <input type="text" class="form-control" id="tanggapan" placeholder="Isi tanggapan" required />
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-3" name="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- container closing -->
</div>