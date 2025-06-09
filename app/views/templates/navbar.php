<nav class="navbar navbar-expand-lg navbar-light shadow-sm py-3 px-5 d-flex flex-row fixed-top" style="background-color:rgb(21, 152, 172);">
   <div class="logo">
      <h4><a href="<?= BASEURL; ?>" target="_self" class=" text-white font-weight-bold" style="text-decoration: none;">E-Report</a></h4>
      <div class="bg-light pl-1 pr-4 text-info font-weight-bold" style="height: fit-content; width: fit-content; font-size: 8px; margin-top: -5px;">make life easier.</div>
   </div>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>
   
   <div class="collapse navbar-collapse justify-content-end">

      <ul class="navbar-nav">
         <li class="nav-item active">
            <a class="nav-link text-white" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link ml-4 text-white" href="<?= BASEURL; ?>/login">Log In</a>
         </li>
         <li class="nav-item">
            <a class="nav-link px-3 ml-3 font-weight-bold text-white shadow-sm" href="<?= BASEURL; ?>/registrasi" style="background-color:rgba(15, 99, 112, 0.34); border-radius: 20px;">Registrasi</a>
         </li>
      </ul>

   </div>
</nav>