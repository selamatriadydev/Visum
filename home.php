<?php 
//session_start();

 if(!isset($_SESSION['id_admin'])) {
                     echo '<script type="text/javascript">
                      setTimeout(function() {window.location.href = "logout.php"}, 2)
                   </script>';
                 }   
?>
<?php


include 'include/konek.php';

include 'include/header.php';

include 'include/menu.php';
?>

  
  <!-- Full Width Column  berada di include header-->
  <div class="content-wrapper">

<?php

        //halaman menu
           include "page/slider.php";

      ?>
    <div class="container">
    
      

     <!--  </section> -->

      <!-- /.content -->
<?php
include 'include/footer.php';
?>