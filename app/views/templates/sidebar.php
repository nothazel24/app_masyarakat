<!-- LOGOUT MODAL -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header bg-info">
            <h5 class="modal-title text-white">Pemberitahuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p class="my-2">Anda yakin ingin keluar?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <a href="<?= BASEURL; ?>/login/logout">
               <button type="button" class="btn btn-danger">Keluar</button>
            </a>
         </div>
      </div>
   </div>
</div>

<aside class="sidebar d-flex rounded-right shadow-sm flex-column justify-content-start p-3 col-md-3 col-lg-3 position-fixed" style="width: 400px; background-color: #fefefe; min-height: 100vh;" id="sidebar">

   <div class="logo my-5 px-4">
      <h2><a href="<?= BASEURL; ?>" target="_self" class=" text-dark font-weight-bold" style="text-decoration: none;">E-Report</a></h2>
      <div class="bg-info pl-1 pr-4 text-white font-weight-bold" style="height: fit-content; width: fit-content; font-size: 12px; margin-top: -5px;">make life easier.</div>
   </div>

   <div class="sidebarWrapper container-sm text-dark">

      <div class="userWrapper d-flex flex-row justify-content-start p-1 align-items-center">
         <img src="<?= BASEURL; ?>/assets/img/profile.jpg" alt="pfp" class="pfp rounded-circle m-2" width="50" height="50">

         <div class="userDetail container-sm d-flex flex-column text-start mt-3">
            <p class="font-weight-bold mb-0"><?= $_SESSION['nama_petugas']; ?></p>
            <p><em><?= $_SESSION['level'] ?? 'Undefined status'; ?></em></p>
         </div> <!-- userDetail closing tag-->
      </div> <!-- userWrapper closing tag -->


      <div class="menu-toggle ml-2">
         <p class="m-3" style="font-size: 19px;"><strong>Menu</strong></p>
         <ul type="none" class="my-4">

            <li>
               <a href="<?= BASEURL; ?>/petugas/" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%">
                  <img src="<?= BASEURL; ?>/assets/icons/home.svg" width="28" style="opacity: 75%">
                  Dashboard
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/pengaduan" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/pengaduan.svg" width="28" style="opacity: 75%">
                  Pengaduan
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/petugas" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/petugas.svg" width="28" style="opacity: 75%">
                  Petugas
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/masyarakat" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/masyarakat.svg" width="28" style="opacity: 75%">
                  Masyarakat
               </a>
            </li>

            <li>
               <a href="<?= BASEURL; ?>/petugas/laporan" class="my-3 d-flex flex-row justify-content-start align-items-center text-dark" style="text-decoration: none; gap: 10%;">
                  <img src="<?= BASEURL; ?>/assets/icons/laporan_petugas.svg" width="28" style="opacity: 75%">
                  Laporan
               </a>
            </li>
         </ul>
      </div>

      <a href="#" style="text-decoration: none;" class="mt-5 mx-2 d-flex flex-row justify-content-start align-items-center logout" data-target="#logout" data-toggle="modal">
         <img src="<?= BASEURL; ?>/assets/icons/logout.svg" width="30" style="opacity: 75%;">
         <b class="text-dark mx-2">Logout</b>
      </a>

   </div> <!-- sidebarWrapper closing tag -->

</aside> <!-- sidebar closing tag-->

<div style="background: #17a2b8;">
   <div class="text-right pb-1">
      <em class="p-2 text-white" style="font-size: .7rem;"><strong>E-Report</strong> Public Complain Service</em>
   </div>
</div>