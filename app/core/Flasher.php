<?php

class Flasher
{
   public static function setFlash($pesan, $aksi, $tipe, $id)
   {
      $_SESSION['flash'] = [
         'pesan' => $pesan,
         'aksi' => $aksi,
         'tipe' => $tipe,
         'id' => $id
      ];
   }

   public static function flash()
   {
      if (isset($_SESSION['flash'])) {

         echo 

         '<div class="modal fade" id="' . $_SESSION['flash']['id'] .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

         <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
               <div class="modal-header bg-' . $_SESSION['flash']['tipe'] . ' text-white">
               <h5 class="modal-title">Pemberitahuan</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>

               <div class="modal-body">
                  <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
               </div>

               <div class="modal-footer">
                  <em style="font-size: .7rem;">E-Report Public Complain Services</em>
               </div>
            </div>
         </div>
         </div>
         
         <script>
            document.addEventListener("DOMContentLoaded", function () {
               var modal = new bootstrap.Modal(document.getElementById("' . $_SESSION['flash']['id'] . '"));
               modal.show();
            });
         </script>
         
         ';

         unset($_SESSION['flash']);
      }
   }
}
