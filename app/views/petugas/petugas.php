<?php

// memanggil data dari database, dan otomatis mengkonversikannya ke array assosiatif
// $data = query("petugas", 4);
// $start = $data['start'];
// $result = $data['data'];
// $total_pages = $data['total_pages'];
// $current_page = $data['current_page'];
// $total_data = $data['total_data'];
// $limit = $data['limit'];

?>


<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Petugas</h1>


        <div class="search container-fluid d-flex flex-row flex-wrap justify-content-between align-items-center my-3">

            <div>
                <a href="<?= BASEURL; ?>/detail/tambahPetugas" target="_self" style="text-decoration: none;"><button class="btn btn-warning p-2 text-white font-weight-bold">+ Tambah petugas</button></a>
            </div>

            <div class="d-flex justify-content-end">
                <form action="" method="post" class="form-inline">
                    <input class="form-control mr-2" type="search" placeholder="Cari data" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Cari</button>
                </form>
            </div>

        </div> <!-- divContainer closing tag -->

        <div class="tableUnit container-fluid table-responsive">
            <table class="table table-striped text-center">
                <thead class="table-warning text-left p-5">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. Telp</th>
                        <th>Level</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody class="text-left">
                    <?php $no = $start + 1;
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_petugas']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['telp']; ?></td>
                            <td><?= $row['level']; ?></td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="<?= BASEURL;?>/detail/editData" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <p class="my-4">Showing <?= min($total_data, $start + $limit) ?> of <?= $total_data ?> entries</p>

        </div> <!-- tableUnit closing tag-->

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-end mr-3">
                <li class="page-item <?= ($current_page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?= $current_page - 1; ?>"><</a>
                </li>

                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item <?= ($current_page == $i) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php } ?>

                <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?= $current_page + 1; ?>">></a>
                </li>
            </ul>
        </nav>

    </div> <!-- container closing tag-->
</div>