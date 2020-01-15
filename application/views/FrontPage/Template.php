<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JHAM </title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" type="text/css">
    <link href="<?php echo base_url();?>assets/font-awesome/css/all.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/Css/ekko-lightbox.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/aos.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/jquery-ui/jquery-ui.css" type="text/css">   
    <link rel="stylesheet" href="<?php echo base_url();?>assets/sweet/dist/sweetalert2.min.css" type="text/css">    

</head>

<body id="top">
    <div class="body-class">
        
    

    <!-- Js Plugins -->
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-ui/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/aos.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/js/ekko-lightbox.min.js"></script>
    <script src="<?php echo base_url();?>assets/sweet/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/js/tinymce/tinyMCE.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/mask/src/jquery.mask.js"></script>

    <?php 
    $this->load->view($header);

    $this->load->view($content);

    $this->load->view($footer); 
    ?>
    </div>


    <script>

        $(document).ready(function(){
            $.ajax({ 
                    url: '<?php echo site_url('Authentication/delete_c'); ?>',
                    context: document.body,
                    success: function(){
                    }});
            });


        $(function() {
            $('#login_submit').click(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('Authentication/Login'); ?>',
                    data: $('#login_form').serialize(),
                    success: function(data){
                        if (data == 2) {
                            Swal.fire({
                                  position: 'top',
                                  title: 'Fail to Login, Your Account are Denied!',
                                  animation: true,
                                  customClass: {
                                    popup: 'animated tada'
                                  }
                                })
                        }else{
                            if (data == 1) {
                                Swal.fire({
                                  position: 'top',
                                  type: 'success',
                                  title: 'Successfuly Login',
                                  showConfirmButton: false,
                                })
                                window.setTimeout(function() {
                                     window.location.href = '/jham/index.php/Dashboard';
                                }, 2000);
                               
                            }else{
                                Swal.fire({
                                  position: 'top',
                                  title: 'Fail to Login, Incorrect Email/Password!',
                                  animation: true,
                                  customClass: {
                                    popup: 'animated tada'
                                  }
                                })
                            }
                        }
                        
                    }
                })
            });

            // mask
            // $('#dbirth').mask('00/00/0000');
            $('#dbirth').mask("00-00-0000", {placeholder: "mm-dd-yyyy"});
            $('#money').mask("#", {reverse: true});
            $('.number').mask("#", {reverse: true});
            $('.phone').mask('+630000000000');
            $('.date2').mask("00-00", {placeholder: "mm-yy"});
            $('.daterange').mask("00-00-00 - 00-00-00", {placeholder: "mm-dd-yy to mm-dd-yy"});
            $('.date3').mask("00-00-0000", {placeholder: "mm-dd-yy"});
        });


    </script>
   
</body>

</html>