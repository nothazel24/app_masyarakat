<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar siswa</h3>

                <ul type="none" class="list-group">
                    <?php foreach ($data['sis'] as $sis) : ?>
                        <li class="list-group-item d-flex flex-row justify-content-between align-items-center">
                            <?= $sis['nama']; ?>
                        
                        <a href="<?= BASEURL; ?>/siswa/detail/<?= $sis['id']; ?>" class="badge badge-warning">Detail</a>

                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>
</div>