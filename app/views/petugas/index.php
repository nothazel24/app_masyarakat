<?php Flasher::flash(); ?>

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <h1 class="mt-4 mb-4 ml-2 font-weight-bold">Dashboard</h1>


      <div class="dashboardUnit container-fluid d-flex flex-row justify-content-center">

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color: #fefefe;">
            <p class="mt-2">Petugas</p>
            <hr class="dbLine">
            <p><?= $data['total_petugas']; ?></p>
         </div>

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color: #fefefe;">
            <p class="mt-2">Laporan Terverifikasi</p>
            <hr class="dbLine">
            <p><?= $data['jumlah_terverifikasi']; ?></p>
         </div>

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color: #fefefe;">
            <p class="mt-2">Laporan Diproses</p>
            <hr class="dbLine">
            <p><?= $data['jumlah_proses']; ?></p>
         </div>

         <div class="border border-black rounded m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color: #fefefe;">
            <p class="mt-2">Laporan Selesai</p>
            <hr class="dbLine">
            <p><?= $data['jumlah_selesai']; ?></p>
         </div>
      </div> <!-- dashboardUnit closing tag-->

   </div>

</div>