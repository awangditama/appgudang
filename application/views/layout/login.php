<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <!-- App title -->
        <title>Uplon - Responsive Admin Dashboard Template</title>
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- App CSS -->
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Modernizr js -->
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="account-bg">
                <div class="card-box mb-0">
                    <div class="text-center m-t-20">
                        <a href="index.html" class="logo">
                            <img src="<?php echo base_url(); ?>assets/logo.jpg" width="25%" height="25%"></img>
                        </a>
                    </div>
                    <div class="m-t-10 p-20">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                            </div>
                        </div>
                        <form class="m-t-20" action="<?php echo base_url(); ?>index.php/login/c_login/" method="post">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" required="" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="checkbox checkbox-custom">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center row m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <div class="form-group row m-t-30 mb-0">
                                <div class="col-12">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                        <?php
                        $operasi = $this->session->userdata('operation');
                        if ($operasi != null) {
                        if ($operasi == "gagal") {
                        echo '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert">×</a>
                        <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i></div>';
                        } else if ($operasi == "valisdasi") {
                        echo '<div class="alert alert-error">
                            <a class="close" data-dismiss="alert">×</a>
                        <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i></div>';
                        }
                        }
                        $this->session->unset_userdata('operation');
                        $this->session->unset_userdata('message');
                        ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end card-box-->
        
    </div>
    <!-- end wrapper page -->
    
    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/switchery/switchery.min.js"></script>
    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
</body>
</html>