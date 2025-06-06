<?php Flasher::flash(); ?>

<!-- DELETE MODAL -->
<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header bg-info">
            <h5 class="modal-title text-white">Pemberitahuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p class="my-2">Anda yakin ingin menghapusnya?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>

            <a id="btn-delete-confirm" href="#" class="btn btn-danger">Hapus</a>
         </div>
      </div>
   </div>
</div>

</div> <!-- END TAG MODAL -->

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Pengaduan</h1>

      <div class="d-flex justify-content-end m-3">
         <form action="<?= BASEURL; ?>/petugas/caripengaduan/" method="post" class="form-inline" id="formCari">
            <input class="form-control mr-2" type="date" placeholder="YYYY-MM-dd" name="keyword" id="keyword" autocomplete="off" aria-label="Search">
            <button class="btn btn-outline-info" type="submit" id="tombolCari" required />Cari</button>
         </form>
      </div>

      <div class="tableUnit container-fluid table-responsive">
         <table class="table table-striped text-left">
            <thead class="text-left p-5">
               <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Isi laporan</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
            </thead>

            <tbody>
               <?php $no = $data['offset'] + 1; ?>
               <?php foreach ($data['pengaduan'] as $laporan) : ?>

                  <tr class="text-left">

                     <td><?= $no++; ?></td>
                     <td><?= $laporan['tgl_pengaduan']; ?></td>
                     <td><?= substr($laporan['isi_laporan'], 0, 30); ?></td>
                     <td>
                        <?php if ($laporan['status'] === 'proses') : ?>
                           <div class="bg-warning text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                              <?= $laporan['status']; ?>
                           </div>

                        <?php elseif ($laporan['status'] === 'selesai'): ?>
                           <div class="bg-success text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                              <?= $laporan['status']; ?>
                           </div>

                        <?php elseif ($laporan['status'] === 'terverifikasi'): ?>
                           <div class="bg-info text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                              <?= $laporan['status']; ?>
                           </div>

                        <?php elseif ($laporan['status'] === 'belum terverifikasi'): ?>
                           <div class="bg-secondary text-center p-2 text-white font-weight-bold rounded" style="width: fit-content; font-size: 13px; text-transform: capitalize;">
                              <?= $laporan['status']; ?>
                           </div>

                        <?php else : ?>
                           <div class="text-left text-danger font-weight-bold">Undefined</div>
                        <?php endif; ?>
                     </td>
                     <td>
                        <div class="d-flex justify-content-start align-items-center">
                           <a href="<?= BASEURL; ?>/petugas/detail/<?= $laporan['id_pengaduan']; ?>" class="text-dark mr-3" style="text-decoration: none;" target="_self">Detail</a>

                           <a class="btn btn-danger btn-sm text-white btn-delete" style="text-decoration: none;" data-target="#delete" data-toggle="modal" data-id="<?= $laporan['id_pengaduan']; ?>">Hapus</a>
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
               <a class="page-link" href="<?= BASEURL; ?>/petugas/pengaduan/<?= max(1, $data['current_page'] - 1); ?>">
                  <
                     </a>
            </li>

            <!-- Nomor halaman -->
            <?php if (isset($data['total_pages']) && isset($data['current_page'])): ?>
               <?php for ($i = 1; $i <= $data['total_pages']; $i++) : ?>
                  <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : ''; ?>">
                     <a class="page-link" href="<?= BASEURL; ?>/petugas/pengaduan/<?= $i; ?>"> <?= $i; ?> </a>
                  </li>
               <?php endfor; ?>
            <?php endif; ?>

            <!-- Tombol "Next" -->
            <li class="page-item <?= ($data['current_page'] >= $data['total_pages']) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL; ?>/petugas/pengaduan/<?= min($data['total_pages'], $data['current_page'] + 1); ?>">
                  >
               </a>
            </li>

         </ul>
      </nav>


   </div> <!-- container closing tag-->
</div>