<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar siswa</h3>

            <?php foreach($data['sis'] as $sis) : ?>
                <ul>
                    <li><?= $sis['nama']; ?></li>
                    <li><?= $sis['nis']; ?></li>
                    <li><?= $sis['email']; ?></li>
                    <li><?= $sis['jurusan']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>