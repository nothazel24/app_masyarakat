<?php Flasher::flash(); ?>

<div class="d-flex flex-row">

   <div class="container-fluid d-flex flex-column mt-5" style="margin-left: 26%; flex-grow: 1;">
      <div class="my-4 ml-4">
         <h1 class="font-weight-bold">Dashboard</h1>
         <h3>Hai <?= $_SESSION['nama_petugas'];?>!, selamat bertugas.</h3>
      </div>


      <div class="dashboardUnit container-fluid d-flex flex-row justify-content-center">

         <div class="m-3 text-center font-weight-bold p-3 shadow-sm" style="width: 12rem; height: fit-content; background-color: rgba(95, 201, 211, 0.20); border-radius: 7px; border-top: 4px solid rgb(55, 115, 121)">
            <p class="mt-2">Petugas</p>
            <p><?= $data['total_petugas']; ?></p>
         </div>

         <div class="shadow-sm py-3 m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color: rgba(95, 201, 211, 0.20); border-radius: 7px; border-top: 4px solid rgb(95, 201, 211);">
            <p class="mt-2">Laporan Terverifikasi</p>
            <p><?= $data['jumlah_terverifikasi']; ?></p>
         </div>

         <div class="shadow-sm p-3 m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color:rgba(253, 232, 68, 0.38); border-radius: 7px; border-top: 4px solid rgb(253, 232, 68);">
            <p class="mt-2">Laporan Diproses</p>
            <p><?= $data['jumlah_proses']; ?></p>
         </div>

         <div class="shadow-sm p-3 m-3 text-center font-weight-bold" style="width: 12rem; height: fit-content; background-color:rgba(158, 214, 62, 0.38); border-radius: 7px; border-top: 4px solid rgb(158, 214, 62);">
            <p class="mt-2">Laporan Selesai</p>
            <p><?= $data['jumlah_selesai']; ?></p>
         </div>
      </div> <!-- dashboardUnit closing tag-->

   </div>

</div>