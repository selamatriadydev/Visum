<?php
if(abs(is_numeric($_GET['vshmy']))) {
$page = isset($_GET['nav']) ? $_GET['nav'] : null;
$thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy'];
?>
<div class="row">
<div class="col-md-12"></div>
        <div class="col-lg-3">


          <div class="list-group">
    <?php
        $quert=mysqli_query($conn, "select status_korban from pemeriksaan where id_pemeriksaan=".$_GET['vshmy']);
        $break=mysqli_fetch_array($quert);
        if($break['status_korban']=="Meninggal"){?>
            <a href="<?php echo $thisURL; ?>&nav=1"  <?php if($page == "1") {echo "class='active list-group-item'";} ?> class="list-group-item" >Identitas Korban</a>
            <a href="<?php echo $thisURL; ?>&nav=7"  <?php if($page == "7") {echo "class='active list-group-item'";} ?> class="list-group-item">Pemeriksa</a>
            <a href="<?php echo $thisURL; ?>&nav=8"  <?php if($page == "8") {echo "class='active list-group-item'";} ?> class="list-group-item">Benda</a>
            <a href="<?php echo $thisURL; ?>&nav=3"  <?php if($page == "3") {echo "class='active list-group-item'";} ?> class="list-group-item">Keadaan Umum</a>
            <a href="<?php echo $thisURL; ?>&nav=2" <?php if($page == "2") {echo "class='active list-group-item'";} ?> class="list-group-item">Pemeriksaan Luar</a>
            <a href="<?php echo $thisURL; ?>&nav=4"  <?php if($page == "4") {echo "class='active list-group-item'";} ?> class="list-group-item">Pemeriksaan Tambahan</a>
            <a href="<?php echo $thisURL; ?>&nav=6"  <?php if($page == "6") {echo "class='active list-group-item'";} ?> class="list-group-item">Deskripsi Kekerasan</a>
            <a href="<?php echo $thisURL; ?>&nav=5"  <?php if($page == "5") {echo "class='active list-group-item'";} ?> class="list-group-item">Tindakan </a>
            <a href="<?php echo $thisURL; ?>&nav=9"  <?php if($page == "9") {echo "class='active list-group-item'";} ?> class="list-group-item">Identifikasi </a>
         <?php }else{ ?>
            <a href="<?php echo $thisURL; ?>&nav=1"  <?php if($page == "1") {echo "class='active list-group-item'";} ?> class="list-group-item" >Identitas Korban</a>
            <a href="<?php echo $thisURL; ?>&nav=7"  <?php if($page == "7") {echo "class='active list-group-item'";} ?> class="list-group-item">Pemeriksa</a>
            <a href="<?php echo $thisURL; ?>&nav=3"  <?php if($page == "3") {echo "class='active list-group-item'";} ?> class="list-group-item">Keadaan Umum</a>
            <a href="<?php echo $thisURL; ?>&nav=2" <?php if($page == "2") {echo "class='active list-group-item'";} ?> class="list-group-item">Pemeriksaan Luar</a>
            <a href="<?php echo $thisURL; ?>&nav=4"  <?php if($page == "4") {echo "class='active list-group-item'";} ?> class="list-group-item">Pemeriksaan Tambahan</a>
            <a href="<?php echo $thisURL; ?>&nav=6"  <?php if($page == "6") {echo "class='active list-group-item'";} ?> class="list-group-item">Deskripsi Kekerasan</a>
            <a href="<?php echo $thisURL; ?>&nav=5"  <?php if($page == "5") {echo "class='active list-group-item'";} ?> class="list-group-item">Tindakan </a>
         <?php } ?>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
         <!--   <h1 class="my-4">Shop Name</h1> -->
          <?php
            // $page = isset($_GET['nav']) ? $_GET['nav'] : null;
          
            switch ($page) {
                case '7':
                    include "page/nav/pemeriksa/pemeriks.php";
                    break;
                case '2':
                    include "page/nav/luar/luar.php";
                    break;
                case '3':
                    include "page/nav/keadaanumum/keadaanumum.php";
                    break;
                case '4':
                    include "page/nav/tambahan/tambahan.php";
                    break;
                case '5':
                    include "page/nav/tindakan/tindakan.php";
                    break;
                case '6':
                    include "page/nav/fisikkekerasan/fisikkekerasan.php";
                    break;
                case '1':
                    include "page/nav/Korban.php";
                    break;
                case '8':
                    include "page/nav/benda/benda.php";
                    break;
                case '9':
                    include "page/nav/identifikasi/iden.php";
                    break;
                default:
                     include "page/nav/korban.php";
            }

          ?>
        </div>
  
</div>
<?php
}//get tidak kosong
else{
  echo '<script type="text/javascript">';
        echo 'swal("warning!", "Halaman yang anda maksud belum tersedia", "warning");</script>';
              

            echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "vs.php?page=3"}, 3000)
            </script>';

}
?>