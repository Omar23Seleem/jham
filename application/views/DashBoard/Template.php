<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Peso </title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/sweet/dist/sweetalert2.min.css" type="text/css">  
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" type="text/css"> 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view($sidebar); ?>
      <?php $this->load->view($header); ?>
        <?php $this->load->view($content); ?>
      <?php $this->load->view($footer); ?>
    </div>

   </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="<?php echo base_url();?>assets/sweet/dist/sweetalert2.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/js/tinymce/tinyMCE.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/mask/src/jquery.mask.js"></script>

  <script type="text/javascript">
    $(function(){
       // mask
            // $('#dbirth').mask('00/00/0000');
            $('#dbirth').mask("00-00-0000", {placeholder: "mm-dd-yy"});
            $('#money').mask("#,##0", {reverse: true});
            $('.phone').mask('+630000000000');
            $('.date2').mask("00-00", {placeholder: "mm-yy"});
             $('.date5').mask("0000-00-00", {placeholder: "yyyy-mm-dd"});
             $('.daterange').mask("00-00-00 - 00-00-00", {placeholder: "mm-dd-yy to mm-dd-yy"});
             $('#date3').mask("00-00-00", {placeholder: "mm-dd-yy"});
             $('.date4').mask("00-00-00", {placeholder: "dd-mm-yy"});
    })
  </script>


</body>
