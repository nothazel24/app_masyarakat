<aside class="sidebar d-flex flex-column justify-content-start p-3 col-md-3 col-lg-3 position-fixed" style="width: 400px; background-color: #4e17eb; min-height: 100vh;" id="sidebar">

    <div class="logo p-5 ml-3 text-white">
        <h2><a href="#" target="_self" class="font-weight-bold text-white" style="text-decoration: none;">E-Report</a></h2>
    </div>

    <div class="sidebarWrapper container-sm text-white">

        <div class="userWrapper d-flex flex-row justify-content-start p-1 align-items-center">
            <img src="<?= BASEURL;?>/assets/img/profile.jpg" alt="pfp" class="pfp rounded-circle m-2" width="50" height="50">

            <div class="userDetail container-sm d-flex flex-column text-start mt-3 py-2">
                <p class="font-weight-bold mb-0"><?= $_SESSION['nama'];?></p>
                <p><em><?= $_SESSION['status'] ?? 'User';?></em></p>
            </div> <!-- userDetail closing tag-->
        </div> <!-- userWrapper closing tag -->


        <div class="menu-toggle ml-4">
            <p class="m-3"><strong>Menu</strong></p> 
            <ul type="none" class="m-4">
                <li class="mt-3"><a href="<?= BASEURL; ?>/masyarakat" class="text-white" style="text-decoration: none;">Home</a></li>
                <li class="mt-3"><a href="<?= BASEURL; ?>/masyarakat/laporan" class="text-white" style="text-decoration: none;">laporan</a></li>
            </ul>
        </div>

    </div> <!-- sidebarWrapper closing tag -->

    <br><br><br>

    <div class="mt-5">
        <a href="<?= BASEURL; ?>/login/logout" target="_self" style="text-decoration: none;"><b class="m-5 text-white">< Logout</b></a>
    </div>

</aside> <!-- sidebar closing tag-->