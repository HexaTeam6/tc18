<!DOCTYPE html>
<html lang="en">
<head>
    <title>TC18</title>
    <!--SweetAlert, Dropify-->
    <?php $this->load->view('partials/_css'); ?>
</head>

<body class="fix-sidebar fix-header card-no-border">
<?php $this->load->view('partials/_preloader'); ?>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <?php
//    $header['notif'] = $notif;
//    $header['new'] = $new;
//    $header['mark'] = $mark;
    $header = '';
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Preview User</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Master</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <?php foreach ($data as $user):?>
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <div class="el-element-overlay" style="height: 200px" >
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1" style="width: auto; height: 200px;">
                                                <div class="centered_pliss">
                                                    <img src="<?php echo base_url('/assets/img/userProfile/') . $user->foto ?>" alt="user">
                                                </div>
                                                <style>
                                                    .centered_pliss{
                                                        position: absolute;
                                                        left: 50%;
                                                        top: 50%;
                                                        transform: translateY(-50%) translateX(-50%);
                                                    }
                                                </style>
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url('/assets/img/userProfile/') . $user->foto ?>"><i class="icon-magnifier"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title m-t-10"><?php echo $user->nama?></h4>
                                    <h6 class="card-subtitle"><i>"<?php echo $user->moto?>"</i></h6>
                                    <label class="label label-light-info" data-placement='top' data-toggle="tooltip" data-title="Kode Kelas"><?php echo $user->NRP?></label>
                                    <div class="row text-center justify-content-md-center" data-placement="top" data-toggle="tooltip" data-title="Jumlah Anggota Kelas">
                                        <div class="col-4">
                                            <a href=<?php echo site_url('/MasterUser')?> class="link">
                                                <i class="icon-people"></i>
                                                <font class="font-medium"><?php echo $user->jumlahSiswa?></font>
                                            </a>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <hr size="12" width="100%" style="margin: 0px 0px">
                            <div class="card-body">
                                <small class="text-muted">Email</small>
                                <h6><?php echo $user->email?></h6>
                                <small class="text-muted p-t-30 db">Nomor Telepon</small>
                                <h6><?php echo $user->no_telp?></h6>
                                <small class="text-muted p-t-30 db">Alamat</small>
                                <h6><?php echo $user->alamat_sby?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
<!--                            <ul class="nav nav-tabs profile-tab" role="tablist">-->
<!--                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profil</a>-->
<!--                                </li>-->
<!--                            </ul>-->
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-md-12" align="center" style="margin-bottom: 10px">
                                            <label class="label label-info">Profil User</label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">NRP</label>
                                            <label class="col-md-6"><?php echo $user->NRP ?></label>
                                        </div>


                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Nama</label>
                                            <label class="col-md-6"><?php echo $user->nama ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Email</label>
                                            <label class="col-md-6"><?php echo $user->email ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Jenis Kelamin</label>
                                            <label class="col-md-6"><?php echo $user->jenis_kelamin ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">TTL</label>
                                            <label class="col-md-6"><?php echo $user->tempat_lahir.', '.$user->tanggal_lahir ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Nomer Telepon</label>
                                            <label class="col-md-6"><?php echo $user->no_telp ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Alamat</label>
                                            <label class="col-md-6"><?php echo $user->alamat; ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Alamat Surabaya</label>
                                            <label class="col-md-6"><?php echo $user->alamat_sby; ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Hobi</label>
                                            <label class="col-md-6"><?php echo $user->hobi; ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Moto</label>
                                            <label class="col-md-6"><i>"<?php echo $user->moto; ?>"</i></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Tujuan</label>
                                            <label class="col-md-6"><?php echo $user->tujuan; ?></label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">MBTI</label>
                                            <label class="col-md-6">
                                                <a href="https://www.16personalities.com/id/kepribadian-<?php echo $user->mbti; ?>" data-toggle="tooltip" title="Klik untuk selengkapnya"><?php echo $user->mbti ?></a>
                                            </label>
                                        </div>

                                        <div>
                                            <label class="col-md-3 font-weight-bold float-left">Favorit</label>
                                            <label class="col-md-6"><?php echo $user->fav; ?></label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <small class="text-muted col-md-12">Bergabung Pada</small>
                                                <br>
                                                <label class="col-md-12">
                                                    <i class="mdi mdi-calendar-today"></i>
                                                    <?php echo date_format(date_create($user->created_at),'d-m-Y'); ?>
                                                </label>
                                            </div>

                                            <div class="col-md-6">
                                                <small class="text-muted col-md-12">Terakhir diupdate</small>
                                                <br>
                                                <label class="col-md-12">
                                                    <i class="mdi mdi-clock"></i>
                                                    <?php $timeago = get_timeago(strtotime($user->updated_at ));
                                                    echo $timeago; ?></label>
                                            </div>
                                        </div>

                                        <!--                                    <hr>-->
                                        <!---->
                                        <!--                                    <div class="col-md-12" align="center" style="margin-bottom: 10px">-->
                                        <!--                                        <label class="label label-primary">Profil Kelas</label>-->
                                        <!--                                    </div>-->
                                        <!---->
                                        <!--                                    <div>-->
                                        <!--                                        <label class="col-md-3 font-weight-bold float-left">Kode Kelas</label>-->
                                        <!--                                        <label class="col-md-6">--><?php //echo $user->kode_kelas ?><!--</label>-->
                                        <!--                                    </div>-->
                                        <!---->
                                        <!--                                    <div>-->
                                        <!--                                        <label class="col-md-3 font-weight-bold float-left">Nama Sekolah</label>-->
                                        <!--                                        <label class="col-md-6">--><?php //echo $user->nama_sekolah ?><!--</label>-->
                                        <!--                                    </div>-->
                                        <!---->
                                        <!--                                    <div>-->
                                        <!--                                        <label class="col-md-3 font-weight-bold float-left">Alamat Sekolah</label>-->
                                        <!--                                        <label class="col-md-6">--><?php //echo $user->alamat_sekolah ?><!--</label>-->
                                        <!--                                    </div>-->
                                        <!---->
                                        <!--                                    <div>-->
                                        <!--                                        <label class="col-md-3 font-weight-bold float-left">Telepon</label>-->
                                        <!--                                        <label class="col-md-6">--><?php //echo $user->telp_sekolah ?><!--</label>-->
                                        <!--                                    </div>-->
                                        <!---->
                                        <!--                                    <div>-->
                                        <!--                                        <label class="col-md-3 font-weight-bold float-left">Kelas</label>-->
                                        <!--                                        <label class="col-md-6">-->
                                        <!--                                            --><?php //echo $user->kelas ?>
                                        <!--                                            <label class="label label-light-warning">--><?php //echo $user->jurusan ?><!--</label>-->
                                        <!--                                        </label>-->
                                        <!--                                    </div>-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                <?php endforeach; ?>
            </div>
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

<!--Dropify JS, InputMask Js, SweetAlert JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(function () {

        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

        $("#wtelp").inputmask("+628-9{1,3}-9{1,3}-9{1,4}");
        $("#wjenisKelamin").val($('#jenis_kelamin').val());

        $('.dropify').dropify({
            messages: {
                'default': 'Seret gambar kesini atau klik untuk menambahkan gambar',
                'replace': 'Seret gambar kesini atau klik untuk mengganti gambar',
                'remove':  'Hapus',
                'error':   'Ada kesalahan dalam file.'
            },
            tpl: {
                message:'<div class="dropify-message"><span class="file-icon" /> <p style="text-align: center">{{ default }}</p></div>'
            }
        });

    });
</script>
</body>
</html>
