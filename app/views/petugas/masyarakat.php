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

            <a id="btn-delete-confirm3" href="#" class="btn btn-danger">Hapus</a>
         </div>
      </div>
   </div>
</div>

</div> <!-- END TAG MODAL -->

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Masyarakat</h1>


      <div class="d-flex justify-content-end m-3">
         <form action="<?= BASEURL; ?>/petugas/carimasyarakat/" method="post" class="form-inline" id="formCari">
            <input class="form-control mr-2" type="search" placeholder="Cari NIK" name="keyword" id="keyword" autocomplete="off" aria-label="Search">
            <button class="btn btn-outline-info" type="submit" id="tombolCari" required />Cari</button>
         </form>
      </div>


      <div class="tableUnit container-fluid table-responsive" id="hasilData">
         <table class="table table-striped text-left">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Username</th>
                  <th>No. Telp</th>
                  <th>Detail</th>
               </tr>
            </thead>

            <tbody>
               <?php $no = $data['offset'] + 1; ?>
               <?php foreach ($data['masyarakat'] as $msr) : ?>

                  <tr class="text-left">
                     <td><?= $no++; ?></td>
                     <td><?= $msr['nama']; ?></td>
                     <td><?= $msr['nik']; ?></td>
                     <td><?= $msr['username']; ?></td>
                     <td><?= $msr['telp']; ?></td>
                     <td>
                        <div class="d-flex justify-content-start align-items-center">

                           <a href="<?= BASEURL; ?>/petugas/editmasyarakat/<?= $msr['nik']; ?>" class="text-primary mr-3 text-dark" style="text-decoration: none;" data-nik="<?= $msr['nik'] ?>">Edit</a>

                           <a class="btn btn-danger btn-sm text-white btn-delete" style="text-decoration: none;" data-target="#delete" data-toggle="modal" data-id="<?= $msr['nik']; ?>">Hapus</a>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>

            </tbody>
         </table>

         <p class="my-4">Showing <?= min($data['total_masyarakat'], $data['offset'] + $data['limit']) ?> of <?= $data['total_masyarakat'] ?> entries</p>

      </div> <!-- tableUnit closing -->

      <!-- Pagination -->
      <nav aria-label="page-navigation">
         <ul class="pagination justify-content-end mr-3">

            <!-- Tombol "Previous" -->
            <li class="page-item <?= ($data['current_page'] <= 1) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL; ?>/petugas/masyarakat/<?= max(1, $data['current_page'] - 1); ?>">
                  <
               </a>
            </li>

            <!-- Nomor halaman -->
            <?php if (isset($data['total_pages']) && isset($data['current_page'])): ?>
               <?php for ($i = 1; $i <= $data['total_pages']; $i++) : ?>
                  <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : ''; ?>">
                     <a class="page-link" href="<?= BASEURL; ?>/petugas/masyarakat/<?= $i; ?>"> <?= $i; ?> </a>
                  </li>
               <?php endfor; ?>
            <?php endif; ?>

            <!-- Tombol "Next" -->
            <li class="page-item <?= ($data['current_page'] >= $data['total_pages']) ? 'disabled' : ''; ?>">
               <a class="page-link" href="<?= BASEURL; ?>/petugas/masyarakat/<?= min($data['total_pages'], $data['current_page'] + 1); ?>">
                  >
               </a>
            </li>

         </ul>
      </nav>

   </div> <!-- container closing -->
</div>