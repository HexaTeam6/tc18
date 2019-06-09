<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" style="z-index: 101">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url()?>">
                <span style="color: white; font-family: Roboto; font-size: 20px; font-weight: 100; letter-spacing: 7px;"><b>TC</b>18</span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('/assets/img/default-profile.png')?>" alt="user"
                                 class="profile-pic" style="width: 30px; height: auto;"/></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="<?php echo base_url('/assets/img/userProfile/').$_SESSION['foto'] ?>" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <label class="label label-light-danger"><?php echo $_SESSION['akses']?></label>
                                        <h4><?php echo $_SESSION['nama']; ?></h4>
                                        <p class="text-muted"><?php echo $_SESSION['email']; ?></p>
                                        <?php
                                            echo '<a href="'.site_url('/UserProfile').'" class="btn btn-rounded btn-danger btn-sm">
                                            Lihat Profil
                                            </a>';
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li><a href="<?php echo site_url('Auth/logout')?>"><i class="fa fa-power-off"></i> Keluar</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--<div style="position: relative; width: 1349px; height: 70px; display: block; vertical-align: baseline; float: none;"></div>-->
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->