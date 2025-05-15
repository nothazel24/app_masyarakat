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

            <tbody>
               <?php foreach ($data['petugas'] as $index => $ptgs) : ?>

                  <tr>

                     <td><?= ($current_page - 1) * 5 + $index + 1; ?></td>
                     <td><?= $ptgs['nama_petugas']; ?></td>
                     <td><?= $ptgs['username']; ?></td>
                     <td><?= $ptgs['telp']; ?></td>
                     <td><?= $ptgs['level']; ?></td>
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

         <!-- Showing entries section -->

      </div> <!-- tableUnit closing tag-->

      <!-- Pagination -->
      <nav aria-label="Page navigation example">
         <ul class="pagination justify-content-end m-3">
            <li class="page-item disabled">
               <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
               <a class="page-link" href="#">Next</a>
            </li>
         </ul>
      </nav>

   </div> <!-- container closing tag-->
</div>