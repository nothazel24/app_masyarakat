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

            <a id="btn-delete-confirm2" href="#" class="btn btn-danger">Hapus</a>
         </div>
      </div>
   </div>
</div>

</div> <!-- END TAG MODAL -->

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Petugas</h1>


      <div class="search container-fluid d-flex flex-row flex-wrap justify-content-between align-items-center my-3">

         <?php if ($_SESSION['level'] === 'admin') : ?>
            <div>
               <a href="<?= BASEURL; ?>/detail/tambahpetugas" target="_self" style="text-decoration: none;"><button class="btn btn-success p-2 text-white font-weight-bold">+ Tambah petugas</button></a>
            </div>

         <?php else : ?>
            <div></div>

         <?php endif; ?>

         <div class="d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/petugas/caripetugas/" method="post" class="form-inline" id="formCari">
               <input class="form-control mr-2" type="search" placeholder="Cari Username" name="keyword" id="keyword" autocomplete="off" aria-label="Search">
               <button class="btn btn-outline-info" type="submit" id="tombolCari" required />Cari</button>
            </form>
         </div>

      </div> <!-- divContainer closing tag -->

      <div class="tableUnit container-fluid table-responsive">
         <table class="table table-striped text-left">
            <thead class="text-left p-5">
               <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>No. Telp</th>
                  <th>Level</th>
                  <?php if ($_SESSION['level'] === 'admin') : ?>
                     <th>Detail</th>
                  <?php endif; ?>
               </tr>
            </thead>

            <tbody>

               <?php $no = $data['offset'] + 1; ?>
               <?php foreach ($data['petugas'] as $ptgs) : ?>
                  <tr class="text-left">
                     <td><?= $no++; ?></td>
                     <td><?= $ptgs['nama_petugas']; ?></td>
                     <td><?= $ptgs['username']; ?></td>
                     <td><?= $ptgs['telp']; ?></td>
                     <td style="text-transform: capitalize; "><?= $ptgs['level']; ?></td>

                     <?php if ($_SESSION['level'] === 'admin') : ?>
                        <td>
                           <div class="d-flex justify-content-start align-items-center">
                              <a href="<?= BASEURL; ?>/petugas/editpetugas/<?= $ptgs['id_petugas']; ?>" class="text-primary mr-3 text-dark" style="text-decoration: none;">Edit</a>

                              <a class="btn btn-danger btn-sm text-white btn-delete" style="text-decoration: none;" data-target="#delete" data-toggle="modal" data-id="<?= $ptgs['id_petugas']; ?>">Hapus</a>
                           </div>
                        </td>
                     <?php endif; ?>

                  </tr>
               <?php endforeach; ?>

            </tbody>
         </table>

         <p class="my-4">Showing <?= min($data['total_petugas'], $data['offset'] + $data['limit']) ?> of <?= $data['total_petugas'] ?> entries</p>

      </div> <!-- tableUnit closing tag-->

      <!-- Pagination -->
      <nav aria-label="page-navigation">
         <ul class="pagination justify-content-end mr-3">

            <!-- Tombol "Previous" -->
            <li class="page-item <?= ($data['current_page'] <= 1) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL; ?>/petugas/petugas/<?= max(1, $data['current_page'] - 1); ?>">
                  <
                     </a>
            </li>

            <!-- Nomor halaman -->
            <?php if (isset($data['total_pages']) && isset($data['current_page'])): ?>
               <?php for ($i = 1; $i <= $data['total_pages']; $i++) : ?>
                  <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : ''; ?>">
                     <a class="page-link" href="<?= BASEURL; ?>/petugas/petugas/<?= $i; ?>"> <?= $i; ?> </a>
                  </li>
               <?php endfor; ?>
            <?php endif; ?>

            <!-- Tombol "Next" -->
            <li class="page-item <?= ($data['current_page'] >= $data['total_pages']) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL; ?>/petugas/petugas/<?= min($data['total_pages'], $data['current_page'] + 1); ?>">
                  >
               </a>
            </li>

         </ul>
      </nav>

   </div> <!-- container closing tag-->
</div>