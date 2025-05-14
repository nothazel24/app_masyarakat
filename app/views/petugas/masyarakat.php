<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Masyarakat</h1>

      <div class="d-flex justify-content-end m-3">
         <form action="" method="post" class="form-inline">
            <input class="form-control mr-2" type="search" placeholder="Cari data" aria-label="Search">
            <button class="btn btn-outline-warning" type="submit">Cari</button>
         </form>
      </div>

      <div class="tableUnit container-fluid table-responsive">
         <table class="table table-striped text-left">
            <thead class="table-warning">
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
               <?php $no = 1 ;?>
               <?php foreach ($data['petugas'] as $msr) : ?>

                  <tr>

                     <td><?= $no++; ?></td>
                     <td><?= $msr['nama']; ?></td>
                     <td><?= $msr['nik']; ?></td>
                     <td><?= $msr['username']; ?></td>
                     <td><?= $msr['telp']; ?></td>
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

      </div> <!-- tableUnit closing -->


   </div> <!-- container closing -->
</div>