<div class="d-flex flex-row ">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Dashboard</h1>

      <!-- Notifikasi -->
      <div class="row px-3 mx-3">
         <div class="container-fluid">
            <?php Flasher::flash(); ?>
         </div>
      </div>

      <div class="dashboardUnit container-fluid d-flex flex-row justify-content-center align-items-center">

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content;">
            <p>Petugas</p>
            <hr class="dbLine">
            <p><?= $data['total_petugas']; ?></p>
         </div>

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content;">
            <p>Laporan Terverifikasi</p>
            <hr class="dbLine">
            <p><?= $data['jumlah_terverifikasi']; ?></p>
         </div>

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content;">
            <p>Laporan Diproses</p>
            <hr class="dbLine">
            <p><?= $data['jumlah_proses']; ?></p>
         </div>

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content;">
            <p>Laporan Selesai</p>
            <hr class="dbLine">
            <p><?= $data['jumlah_selesai']; ?></p>
         </div>
      </div> <!-- dashboardUnit closing tag-->

   </div>

</div>