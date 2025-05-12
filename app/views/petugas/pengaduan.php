<?php

// memanggil data dari database, dan otomatis mengkonversikannya ke array assosiatif
// $data = query("pengaduan", 4);
// $start = $data['start'];
// $result = $data['data'];
// $total_pages = $data['total_pages'];
// $current_page = $data['current_page'];
// $total_data = $data['total_data'];
// $limit = $data['limit'];

?>


<div class="d-flex flex-row">

    <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
        <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Pengaduan</h1>


        <div class="d-flex justify-content-end m-3">
            <form action="" method="post" class="form-inline">
                <input class="form-control mr-2" type="search" placeholder="Cari data" aria-label="Search">
                <button class="btn btn-outline-warning" type="submit">Cari</button>
            </form>
        </div>

        <div class="tableUnit container-fluid table-responsive">
            <table class="table table-striped text-center">
                <thead class="table-warning text-left p-5">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Isi laporan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody class="text-left">
                    <?php $no = $start + 1;
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['tgl_pengaduan']; ?></td>
                            <td><?= $row['isi_laporan']; ?></td>
                            <td>
                                <?php if ($row['status'] === 'proses') :?>
                                    <div class="bg-warning text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                                        <?= $row['status']; ?>
                                    </div>

                                <?php elseif($row['status'] === 'selesai'): ?>
                                    <div class="bg-success text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                                        <?= $row['status']; ?>
                                    </div>

                                <?php else : ?>
                                    <div class="text-center text-warning font-weight-bold">Error!</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="../sys/detail.php" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>
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
                    <a class="page-link" href="?page=<?= $current_page - 1; ?>">
                        <</a>
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

    </div> <!-- container cloding tag-->
</div>