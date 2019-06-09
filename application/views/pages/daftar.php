<!DOCTYPE html>
<html lang="en" style="background-color: #F2F2F2">
<head>
    <title>TC18</title>
    <!-- Wizard Step, SweetAlert, BootstrapSelect CSS, and Dropify CSS -->
    <?php $this->load->view('partials/_css'); ?>

<!--        <style>-->
<!--            .wizard-content .wizard{-->
<!--                overflow: visible;-->
<!--            }-->
<!--            .wizard-content .wizard>.content{-->
<!--                overflow: visible;-->
<!--            }-->
<!--        </style>-->
</head>

<body>
<?php $this->load->view('partials/_preloader'); ?>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" style="background-color: #F2F2F2;">
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <div class="col-md-8" style="margin: 5% 17% 0% 17%;">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">

                <!-- Validation wizard -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <center>
                                    <h2 class="card-title">Perbarui Data</h2>
                                    <h6 class="card-subtitle">Isi data anda dengan benar</h6>
                                </center>
                                <form action="<?php echo site_url('Daftar/insert') ?>"
                                      class="validation-wizard wizard-circle" method="post" id="form" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Data pribadi</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="formGroupNRP">
                                                    <label for="wnrp">NRP</label>
<!--                                                    <div class="control">-->
                                                        <input type="text" class="form-control"
                                                               id="wnrp" name="NRP" value="<?php echo $_SESSION['kode_user']?>" readonly>
<!--                                                        <div class="help-block" id="alertNip"></div>-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wnama">Nama</label>
                                                    <input type="text" class="form-control" id="wnama"
                                                           name="nama" value="<?php echo $_SESSION['nama']?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <div class="control">
                                                        <input type="password" class="form-control" id="password"
                                                               name="password" pattern="(.*[a-z]+.*)(.*[A-Z]+.*)|(.*[A-Z]+.*)(.*[a-z]+.*)"
                                                               data-validation-pattern-message="Minimal terdapat satu huru kecil dan besar"
                                                               data-validation-regex-regex="(.*[0-9]+.*)(.*[!@#\$%\^&\*]+.*)|(.*[!@#\$%\^&\*]+.*)(.*[0-9]+.*)"
                                                               data-validation-regex-message="Minimal terdapat satu angka dan simbol"
                                                               minlength="8" required
                                                               >
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpassword">Retype Password</label>
                                                    <div class="controls">
                                                        <input type="password" id="cpassword" name="cpassword"
                                                               data-validation-match-match="password"
                                                               class="form-control" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="formGroupEmail">
                                                    <label for="wemail"> Email</label>
                                                    <input type="email" class="form-control"
                                                           id="wemail" name="email" required>
                                                    <div class="help-block" id="alertEmail"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wjenisKelamin"> Jenis Kelamin</label>
                                                    <select class="selectpicker form-control"
                                                            id="wjenisKelamin"
                                                            name="jenisKelamin" required>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki Laki">Laki Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtempatLahir"> Kota Kelahiran</label>
                                                    <input type="text" class="form-control"
                                                           id="wtempatLahir" name="tempatLahir" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="wtanggalLahir"
                                                           name="tanggalLahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamat">Alamat : </label>
                                                    <input type="text" class="form-control"
                                                           id="walamat" name="alamat" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamatsby">Alamat Surabaya: </label>
                                                    <input type="text" class="form-control"
                                                           id="walamatsby" name="alamatsby" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtelepon">Nomor Telepon</label>
                                                    <input type="text" class="form-control" id="wtelepon"
                                                           name="telepon" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom: 20px;">
                                            <div class="col-md-12">
                                                <label for="input-file-now">Foto Profil</label>
                                                <input type="file" id="input-file-now" name="foto" class="dropify"
                                                       data-allowed-file-extensions="jpg png jpeg" required>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Lain Lain</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wmbti">MBTI</label>
                                                    <input type="text" class="form-control" id="wmbti"
                                                           name="mbti"
                                                           minlength="4" maxlength="4" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group" style="padding-top: 34px;">
                                                    <a target="_blank"
                                                       href="https://www.16personalities.com/free-personality-test"
                                                       data-toggle="tooltip"
                                                       title="Klik untuk melakukan tes"
                                                       class="btn btn-success waves-effect waves-light">
                                                        <i class="fa fa-check" required></i>
                                                        Tes Sekarang
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="whobi">Hobi</label>
                                                    <input type="text" class="form-control required"
                                                           id="whobi" name="hobi" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfav">Makanan/Minuman Favorit</label>
                                                    <input type="text" class="form-control required" id="wfav"
                                                           name="fav" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="wmoto">Moto</label>
                                                    <input type="text" class="form-control required"
                                                           id="wmoto" name="moto" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="jurusan">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="wtujuan">Tujuan</label>
                                                    <textarea name="tujuan" id="wtujuan" class="form-control required" cols="30" rows="10" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </form>
                                <center>
                                    <a href="<?php echo site_url() ?>">
                                        <button class="btn btn-danger waves waves-effect waves-light">Batalkan</button>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

<!--Moment, Wizard, SweetAlert, BootstrapSelect, Jquery InputMask, Validation, and Dropify JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();

//        validation in submit
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
            preventSubmit: true,
            submitError: function ($form, events, errors) {
                console.log(errors);
                var alerts = "";
                for (var props in errors) {
                    for (var i = 0; i < errors[props].length; i++) {
                        console.log(errors[props][i]);
                        alerts += "<span class='label label-light-danger'>&blacksquare; " + errors[props][i] + "</span><br>";
                    }
                }

                swal({
                    title: 'Kesalahan',
                    type: 'error',
                    text: 'Coba periksa kembali di password anda!<br>' + '<div style="margin-top: 10px;">' + alerts + '</div>',
                    html: true
                });
            }
        });

        //Masking
        $("#wtelepon").inputmask("+628-9{1,3}-9{1,3}-9{1,4}");
        //check Email
        $('#wemail').blur(function () {
            var email = $('#wemail').val();
            console.log(email);
            email = email.replace("@", "-at-");
            console.log("<?php echo site_url("/Daftar/checkUserEmail/");?>" + email);
            if (!email==""){
                $.ajax({
                    url: "<?php echo site_url("/Daftar/checkUserEmail/");?>" + email,
                    success: function (result) {
                        console.log(result);
                        if (result == "true"){
//                            console.log("200 OK");
                            $('#formGroupEmail').removeClass("validate");
                            $('#formGroupEmail').addClass("has-danger");
                            $('#wemail').addClass("form-control-danger");
                            $('#alertEmail').append("<ul role='alert'><li style='margin-left: -40px;' class='label label-light-danger'>&blacksquare; Email telah digunakan</li></ul>");

                        }else {
                            $('#wemail').removeClass("form-control-danger");
                            $('#formGroupEmail').removeClass("has-danger");
                        }
                    }
                });
            }else {
                $('#wemail').removeClass("form-control-danger");
                $('#formGroupEmail').removeClass("has-danger");
            }
        });


        //File Upload
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
