<?php $this->load->view('layout/template/includes/header_start'); ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/morris/morris.css">
<?php $this->load->view('layout/template/includes/header_end.php'); ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <?php echo $content; ?>
            <!-- end row -->
            
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
            <!-- End content-page -->
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            <?php $this->load->view('layout/template/includes/footer_start.php'); ?>
            <!--Morris Chart-->
            <script src="<?php echo base_url();?>/assets/plugins/morris/morris.min.js"></script>
            <script src="<?php echo base_url();?>/assets/plugins/raphael/raphael-min.js"></script>
            <!-- Page specific js -->
            <script src="<?php echo base_url();?>/assets/pages/jquery.dashboard.js"></script>
            <?php $this->load->view('layout/template/includes/footer_end.php'); ?>