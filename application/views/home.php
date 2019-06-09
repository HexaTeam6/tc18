<!DOCTYPE html>
<html lang="en">
<head>
    <title>TC18</title>
    <?php $this->load->view('partials/_css'); ?>
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
<?php $this->load->view('partials/_preloader'); ?>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <?php
//    $header['notif'] = $notif;
//    $header['new'] = $new;
    $header= '';
    $this->load->view('partials/_header', $header);
    ?>

    <?php $this->load->view('partials/_sidebar'); ?>
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <form action="<?php echo site_url('Home/cari') ?>" method="post">
                <div class="row justify-content-md-center" style="margin-bottom: 20px">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="key" placeholder="Cari..." value="<?php echo $search?>">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="submit" style="padding: 10px 12px;" >
                                  <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>


            <div class="acards">

                <?php foreach ($data as $row):?>
                <div class="acard">
                    <div class="aimage"
                         style="background-image: url('<?php echo base_url('/assets/img/userProfile/').$row->foto; ?>')">
                    </div>
                    <div class="acard-title">
                        <a href="#" class="atoggle-info abtn">
                            <span class="aleft"></span>
                            <span class="aright"></span>
                        </a>
                        <h5>
                            <div style="height: 20px"><?php echo $row->nama; ?></div><br>
                            <small class="label label-rounded label-info"><?php echo $row->NRP; ?></small>
                        </h5>
                    </div>
                    <div class="acard-flap aflap1">
                        <center><i><small class="text-inverse">"<?php echo $row->moto; ?>"</small></i></center>
                        <div class="acard-description">
                            <hr style="margin-top: 0px; margin-bottom: 5px">
                            <center><small class="label label-inverse">info</small></center>
                            <small><?php echo $row->jenis_kelamin; ?> <br>
                            <?php echo $row->no_telp; ?> <br>
                            <?php echo $row->alamat_sby; ?> <br></small>
                        </div>
                        <div class="acard-flap aflap2">
                            <div class="acard-actions">
                                <a href="<?php echo site_url('/MasterUser/preview/').$row->NRP; ?>" class="abtn">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
            <?php foreach ($links as $link) {
                echo "<li>". $link."</li>";
            } ?>
            <style type="text/css">

                a.abtn {
                    background: #0096a0;
                    border-radius: 4px;
                    box-shadow: 0 2px 0px 0 rgba(0,0,0,0.25);
                    color: #ffffff;
                    display: inline-block;
                    padding: 6px 30px 8px;
                    position: relative;
                    text-decoration: none;
                    transition: all 0.1s 0s ease-out;
                }

                a.abtn:hover {
                    background: lighten(#0096a0,2.5);
                    box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
                    transform: translateY(-2px);
                    transition: all 0.25s 0s ease-out;
                }

                a.abtn:active,
                    a.abtn:active {
                    background: darken(#0096a0,2.5);
                    box-shadow: 0 1px 0px 0 rgba(255,255,255,0.25);
                    transform: translate3d(0,1px,0);
                    transition: all 0.025s 0s ease-out;
                }

                div.acards {
                    margin: 0px auto;
                    max-width: 960px;
                    text-align: center;
                }

                div.acard {
                    background: #ffffff;
                    display: inline-block;
                    margin: 8px;
                    max-width: 200px;
                    /*perspective: 1000px;*/
                    position: relative;
                    text-align: left;
                    transition: all 0.3s 0s ease-in;
                    z-index: 1;
                }

                div.acard .aimage {
                    height: 200px;
                    width: 200px;
                    background-size: 200px auto;
                    background-position: center;
                    background-repeat: no-repeat;
                    /*max-width: 250px;*/
                    filter: grayscale(100%) brightness(75%) contrast(80%);
                    -webkit-transition:  filter .3s ease-in-out;
                }

                .acard:hover .aimage{
                    filter: grayscale(0%) brightness(100%) contrast(100%);
                    -webkit-transition:  filter .3s ease-in-out;
                }

                div.acard div.acard-title {
                    background: #ffffff;
                    padding: 6px 15px 10px;
                    position: relative;
                    z-index: 0;
                }

                div.acard div.acard-title a.atoggle-info {
                    border-radius: 32px;
                    height: 32px;
                    padding: 0;
                    position: absolute;
                    right: 15px;
                    top: 10px;
                    width: 32px;
                }

                div.acard div.acard-title a.atoggle-info span {
                    background: #ffffff;
                    display: block;
                    height: 2px;
                    position: absolute;
                    top: 16px;
                    transition: all 0.15s 0s ease-out;
                    width: 12px;
                }

                div.acard div.acard-title a.atoggle-info span.aleft {
                    right: 14px;
                    transform: rotate(45deg);
                }
                div.acard div.acard-title a.atoggle-info span.aright {
                    left: 14px;
                    transform: rotate(-45deg);
                }

                div.acard div.acard-title h2 {
                    font-size: 24px;
                    font-weight: 700;
                    letter-spacing: -0.05em;
                    margin: 0;
                    padding: 0;
                }

                div.acard div.acard-title h2 small {
                    display: block;
                    font-size: 18px;
                    font-weight: 600;
                    letter-spacing: -0.025em;
                }

                div.acard div.acard-description {
                    padding: 0 15px 10px;
                    position: relative;
                    font-size: 14px;
                }

                div.acard div.acard-actions {
                    box-shadow: 0 2px 0px 0 rgba(0,0,0,0.075);
                    padding: 10px 15px 20px;
                    text-align: center;
                }

                div.acard div.acard-flap {
                    background: darken(#ffffff,15);
                    position: absolute;
                    width: 100%;
                    transform-origin: top;
                    transform: rotateX(-90deg);
                }

                div.acard div.aflap1 {
                    transition: all 0.3s 0.3s ease-out;
                    z-index: -1;
                }

                div.acard div.aflap2 {
                    transition: all 0.3s 0s ease-out;
                    z-index: -2;
                }

                div.acards.ashowing div.acard {
                    cursor: pointer;
                    opacity: 0.6;
                    transform: scale(0.88);
                }

                div.acards.ashowing div.acard:hover {
                    opacity: 0.94;
                    transform: scale(0.92);
                }

                div.acard.ashow {
                    opacity: 1 !important;
                    transform: scale(1) !important;
                }

                div.acard.ashow div.acard-title a.atoggle-info {
                    background: #ff6666 !important;
                }

                div.acard.ashow div.acard-title a.atoggle-info span {
                    top: 15px;
                }

                div.acard.ashow div.acard-title a.atoggle-info span.aleft {
                    right: 10px;
                }

                div.acard.ashow div.acard-title a.atoggle-info span.aright {
                    left: 10px;
                }

                div.acard.ashow div.acard-flap {
                    background: #ffffff;
                    transform: rotateX(0deg);
                }

                div.acard.ashow div.aflap1 {
                    transition: all 0.3s 0s ease-out;
                }
                div.acard.ashow div.aflap2 {
                    transition: all 0.3s 0.2s ease-out;
                }

                .acard {
                    text-align:center;
                    margin-right: 40%;
                    margin-left: 40%;
                    /*width: 200px;*/
                    background: white;
                    box-shadow: 0px 0px 0px grey;
                    -webkit-transition:  box-shadow .2s ease-out;
                    box-shadow: .8px .9px 3px grey;

                }
                .acard:hover{
                    box-shadow: 1px 8px 20px grey;
                    -webkit-transition:  box-shadow .2s ease-in;
                }

            </style>

            <script>

            </script>

            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <?php $this->load->view('partials/_footer'); ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(function () {


            var zindex = 10;

            $("div.acard").click(function(e){
                e.preventDefault();

                $(this).has("a").click(function (e) {
                   window.location = e.target.attributes.href.value;
                });

//                console.log($("this a"));

                var isShowing = false;

                if ($(this).hasClass("ashow")) {
                    isShowing = true
                }

                if ($("div.acards").hasClass("ashowing")) {
                    // a card is already in view
                    $("div.acard.ashow")
                        .removeClass("ashow");

                    if (isShowing) {
                        // this card was showing - reset the grid
                        $("div.acards")
                            .removeClass("ashowing");
                    } else {
                        // this card isn't showing - get in with it
                        $(this)
                            .css({zIndex: zindex})
                            .addClass("ashow");

                    }

                    zindex++;

                } else {
                    // no cards in view
                    $("div.acards")
                        .addClass("ashowing");
                    $(this)
                        .css({zIndex:zindex})
                        .addClass("ashow");

                    zindex++;
                }

            });


        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

    });
</script>
</body>
</html>
