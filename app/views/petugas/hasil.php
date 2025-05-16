<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Data Masyarakat</h1>

      <div class="search container-fluid d-flex flex-row flex-wrap justify-content-between align-items-center my-3">

         <div>
            <a href="<?= BASEURL; ?>/petugas/masyarakat" target="_self" style="text-decoration: none;"><button class="btn btn-warning p-2 text-white font-weight-bold">Kembali</button></a>
         </div>

         <div class="d-flex justify-content-end">
            <form action="<?= BASEURL; ?>/petugas/cari/" method="post" class="form-inline" id="formCari">
               <input class="form-control mr-2" type="search" placeholder="Cari NIK" name="keyword" id="keyword" autocomplete="off" aria-label="Search">
               <button class="btn btn-outline-warning" type="submit" id="tombolCari">Cari</button>
            </form>
         </div>

      </div>

      <div class="tableUnit container-fluid table-responsive" id="hasilData">
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
               <?php $no = 1; ?>
               <?php foreach ($data['masyarakat'] as $msr) : ?>

                  <tr class="text-left">
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
                  <?php if(empty($msr['nik'])) :?>
                     <tr>
                        <td class="text-center bg-warning">Data tidak ditemukan atauKata kunci kosong!</td>
                     </tr>
                  <?php endif; ?>
               <?php endforeach; ?>

            </tbody>
         </table>

         <p class="my-4">Showing data by NIK <b><?= $msr['nik']; ?></b></p>

      </div> <!-- tableUnit closing -->

   </div> <!-- container closing -->
</div>