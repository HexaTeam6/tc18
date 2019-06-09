<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" style="z-index: 100">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">MENU</li>
                <li>
                    <a href="<?php echo site_url('Home')?>" aria-expanded="false"><i class="fa fa-dashboard"></i><span
                                class="hide-menu">Dasboard</span></a>
                </li>
                <?php echo $_SESSION['menu'];?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
<!--     End Sidebar scroll-->
<!--     Bottom points-->
<!--    <div class="sidebar-footer">-->
<!--         item-->
<!--        <a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>-->
<!--         item-->
<!--        <a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>-->
<!--         item-->
<!--        <a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>-->
<!--    </div>-->
<!--     End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->