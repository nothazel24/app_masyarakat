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
         <table class="table table-striped text-left">
            <thead class="table-warning text-left p-5">
               <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Isi laporan</th>
                  <th>Status</th>
                  <th>Detail</th>
               </tr>
            </thead>

            <tbody>
               <?php $no = $data['offset'] + 1; ?>
               <?php foreach ($data['pengaduan'] as $laporan) : ?>

                  <tr class="text-left">

                     <td><?= $no++; ?></td>
                     <td><?= $laporan['tgl_pengaduan']; ?></td>
                     <td><?= $laporan['isi_laporan']; ?></td>
                     <td>
                        <?php if ($laporan['status'] === 'proses') : ?>
                           <div class="bg-warning text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                              <?= $laporan['status']; ?>
                           </div>

                        <?php elseif ($laporan['status'] === 'selesai'): ?>
                           <div class="bg-success text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                              <?= $laporan['status']; ?>
                           </div>

                        <?php else : ?>
                           <div class="text-center text-warning font-weight-bold">Error!</div>
                        <?php endif; ?>
                     </td>
                     <td>
                        <div class="d-flex justify-content-start align-items-center">
                           <a href="<?= BASEURL; ?>/detail/editData" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>
                           <button class="btn btn-danger btn-sm">Hapus</button>
                        </div>
                     </td>

                  </tr>
               <?php endforeach; ?>

            </tbody>
         </table>

        <p class="my-4">Showing <?= min($data['total_pengaduan'], $data['offset'] + $data['limit']) ?> of <?= $data['total_pengaduan'] ?> entries</p>

      </div> <!-- tableUnit closing tag-->


      <!-- Pagination -->
      <nav aria-label="page-navigation">
         <ul class="pagination justify-content-end mr-3">

            <!-- Tombol "Previous" -->
            <li class="page-item <?= ($data['current_page'] <= 1) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL ;?>/petugas/pengaduan/<?= max(1, $data['current_page'] - 1); ?>"><</a>
            </li>

            <!-- Nomor halaman -->
            <?php if (isset($data['total_pages']) && isset($data['current_page'])): ?>
               <?php for ($i = 1; $i <= $data['total_pages']; $i++) : ?>
                  <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : ''; ?>">
                     <a class="page-link" href="<?= BASEURL ;?>/petugas/pengaduan/<?= $i; ?>"> <?= $i; ?> </a>
                  </li>
               <?php endfor; ?>
            <?php endif; ?>

            <!-- Tombol "Next" -->
            <li class="page-item <?= ($data['current_page'] >= $data['total_pages']) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL ;?>/petugas/pengaduan/<?= min($data['total_pages'], $data['current_page'] + 1); ?>">></a>
            </li>

         </ul>
      </nav>


   </div> <!-- container cloding tag-->
</div>