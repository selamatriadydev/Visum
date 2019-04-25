<?php
session_start();
if(!isset($_SESSION['id_admin'])) {
                     echo '<script type="text/javascript">
                      setTimeout(function() {window.location.href = "logout.php"}, 2)
                   </script>';
                 }

$page = isset($_GET['page']) ? $_GET['page'] : null;



include 'fungsi_hari.php';
include 'include/konek.php';

include 'include/header.php';

include 'include/menu.php';
?>
  
  <!-- Full Width Column  berada di include header-->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php if($page=='2') 
                {}
                elseif($page=='2act') 
                {echo "Pemeriksaan Baru";}
                 elseif($page=='3') 
                {echo "Hasil Pemeriksaan";}
                 elseif($page=='4') 
                {echo "Referensi Data Pemeriksaan";}
                elseif($page=='act1') 
                {echo "Lihat Data Agama";}
                elseif($page=='act2') 
                {echo "Lihat Data Jenis Benda";}
                elseif($page=='act3') 
                {echo "Lihat Data Jenis Keadaan Umum";}
                elseif($page=='act4') 
                {echo "Lihat Data Jenis Pemeriksaan Luar";}
                elseif($page=='act5') 
                {echo "Lihat Data Kecamatan";}
                elseif($page=='21act') 
                {echo "Edit Data Pemeriksaan";}
                elseif($page=='act6') 
                {//echo "Pemeiksaan /<a href='vs.php?page=2'> &laquo; kembali</a>/<a href='vs.php?page=3'> &laquo; hasil</a>";
                }


                 //else{echo "Halaman";}?>
          <small></small>
        </h1>
       <!--  <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
      <?php

        //halaman menu
            // $page = isset($_GET['page']) ? $_GET['page'] : null;
            switch ($page) {
                case '1':
                    include "page/slider.php";
                    break;
                case '2':
                    include "page/pemeriksaan.php";
                    break;
                case '2act':
                    include "page/input_pemeriksaan.php";
                    break;

                case '21act':
                    include "page/edit_pemeriksaan.php";
                    break;
                case '3':
                    include "page/hasil_vs.php";
                    break;
                case '4':
                    include "page/referensi_data.php";
                    break;
                case 'act1':
                    include "./page/agama/index.php";
                    break;
                case 'act2':
                    include "./page/jenisBenda/index.php";
                    break;
                case 'act3':
                    include "./page/jenisKeadaanUmum/index.php";
                    break;
                case 'act4':
                    include "./page/jenisPemeriksaanLuar/index.php";
                    break;
                case 'act5':
                    include "./page/kecamatan/index.php";
                    break;
                case 'act6':
                    include "./page/mulai.php";
                    break;
                case 'act7':
                    include "./page/kota/index.php";
                    break;
                case 'act8':
                    include "./page/pekerjaan/index.php";
                    break;
                case 'act9':
                    include "./page/pemeriksa/index.php";
                    break;
                case 'tambahpemeriksaan':
                    include "./addpemeriksaan.php";
                    break;
                case 'editpemeriksaan':
                    include "./page/edit_pemeriksaan.php";
                    break;
                case 'editpemeriksaan2':
                    include "./edit_pemeriksaan.php";
                    break;
                default:
                     include "page/slider.php";
            }

      ?>
      </section>
      <!-- /.content -->
<?php
if($_GET['page']=='3'){
include 'include/footer2.php';
}else{
  include 'include/footer.php';
}
?>