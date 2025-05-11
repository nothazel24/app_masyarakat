<div class="container mt-5" style="width: 18rem;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $data['sis']['nama']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['sis']['nis']; ?></h6>
            <p class="card-text"><?= $data['sis']['email']; ?></p>
            <p class="card-text"><?= $data['sis']['jurusan']; ?></p>

            <a href="<?= BASEURL; ?>/siswa" class="card-link">Kembali</a>

        </div>
    </div>
</div>