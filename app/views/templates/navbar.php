<nav class="navbar navbar-expand-lg navbar-light py-3 px-5 d-flex flex-row fixed-top" style="background-color: #fefefe; border-bottom: 1px solid rgba(43, 43, 43, 0.07);">
   <div class="logo">
      <h4><a href="<?= BASEURL; ?>" target="_self" class="text-dark font-weight-bold" style="text-decoration: none;">E-Report</a></h4>
      <div class="bg-info pl-1 pr-4 font-weight-bold text-light" style="height: fit-content; width: fit-content; font-size: 8px; margin-top: -5px;">make life easier.</div>
   </div>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse justify-content-end">

      <?php if (!empty($_SESSION['username'])) : ?>
         
         <ul class="navbar-nav">
            <li class="nav-item active">
               <?php if ($_SESSION['level'] === 'admin' || $_SESSION['level'] === 'petugas') : ?>
                  <a class="nav-link" href="<?= BASEURL; ?>/petugas">Hi, <?= $_SESSION['username']; ?>!</a>

               <?php else : ?>
                  <a class="nav-link" href="<?= BASEURL; ?>/masyarakat">Hi, <?= $_SESSION['username']; ?>!</a>
               <?php endif; ?>
            </li>

            <img src="<?= BASEURL; ?>/assets/img/profile.jpg" width="40" class="ml-2 rounded-circle">
         </ul>

      <?php else : ?>
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link ml-4" href="<?= BASEURL; ?>/login">Log In</a>
            </li>
            <li class="nav-item">
               <a class="nav-link px-3 ml-3 font-weight-bold" href="<?= BASEURL; ?>/registrasi" style="background-color:rgba(0, 153, 184, 0.73); border-radius: 20px; color:rgba(254, 254, 254, 0.96);">Registrasi</a>
            </li>
         </ul>
      <?php endif; ?>

   </div>
</nav>