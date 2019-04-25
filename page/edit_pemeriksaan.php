<?php
// --- conn ke database
error_reporting();
if(abs(is_numeric($_GET['vshmy']))) {
// --- Fngsi tambah data (Create)


function tambah($conn){

  global $conn;
    $thisURL="vs.php?page=3";
    if (isset($_POST['btn_simpan'])){

        //form atas
        $id_pemeriksaan=$_POST['id_pemeriksaan'];
        $kondisi=$_POST['kondisi'];
        //form penyidik
        $ID=$_POST['id_penyidik'];
        $nm_penyidik=$_POST['nm_penyidik'];
        $nrp_penyidik = $_POST['nrp_penyidik'];
        $pangkat_penyidik = $_POST['pangkat_penyidik'];
        $instansi_penyidik = $_POST['instansi_penyidik'];
        $waktu_penyidik = $_POST['waktu'];
        $no_permintaan = $_POST['no_permintaan'];
        $perihal_penyidik = $_POST['perihal'];
        $penjelasan_penyidik = $_POST['penjelasan'];
       

         if(!empty($id_pemeriksaan) && !empty($ID)){
            $sql = "UPDATE `pemeriksaan` SET `status_korban` = '$kondisi' WHERE `pemeriksaan`.`id_pemeriksaan` = '$id_pemeriksaan'
            ";


      $sqlUpdate = "UPDATE `penyidik`   SET `nm_penyidik` = '$nm_penyidik', `nrp_penyidik` = '$nrp_penyidik', `pangkat_penyidik` = '$pangkat_penyidik', `instansi_penyidik` = '$instansi_penyidik', `tgl_permintaan` = '$waktu_penyidik', `no_permintaan` = '$no_permintaan', `perihal_permintaan` = '$perihal_penyidik', `penjelasan` = '$penjelasan_penyidik' WHERE `penyidik`.`id_penyidik` = '$ID'";

            $simpan = mysqli_query($conn, $sql);
            if($simpan && isset($_POST['aksi'])){
     if($_POST['aksi'] == 'update'){
      
        $simpanUpdate = mysqli_query($conn, $sqlUpdate);
        $thisURL2="vs.php?page=editpemeriksaan&vshmy=".$id_pemeriksaan;
        if($simpanUpdate){
          
        echo '<script type="text/javascript">';
        echo 'swal("Sukses!", "Data berhasil ditambah", "success");</script>';
                }
                echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'. $thisURL2.'"}, 2000)
            </script>';
              }

            
            }
        }
            else {
            $pesan = "<p style='color:red;'>Tidak dapat menyimpan, data belum lengkap!</p>";
        }
    }

    $queryupd=mysqli_query($conn, "SELECT * FROM pemeriksaan , korban, penyidik, pemeriksa WHERE  pemeriksaan.id_pemeriksaan='".$_GET['vshmy']."' order by id_pemeriksaan DESC");
    $barupd=mysqli_fetch_array($queryupd);
$thisURL="vs.php?page=3";
 $thisURL3="vs.php?page=editpemeriksaan2&vshmy=".$_GET['vshmy'];
    ?> 
        <form action="" class="form-horizontal" method="POST">
            <fieldset>
                <legend><h2>Update Pemeriksaan</h2></legend>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                <div class="col-md-12">
               <div class="box box-info">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Pilih Kondisi Korban</h3>
            </div> -->
            <p>
              <div class="box-body">
                <div class="col-md-6">
                  <a href="<?php echo $thisURL; ?>" class="btn btn-danger"> &laquo; Batal</a>
                  </div>
                  <div class="col-md-6">

                    <input type="hidden" name="id_penyidik" value="<?php echo $barupd['id_penyidik']; ?>">
                    <input type="hidden" name="id_pemeriksaan" value="<?php echo $barupd['id_pemeriksaan']; ?>">

                    <a href="<?php echo $thisURL3; ?>" class="btn btn-info" style="float: right;"> Lanjut</a>
                    <input type="submit" class="btn btn-warning" name="btn_simpan" value="Simpan" style="float: right;" />
                  </div>
              <h3>Pilih Kondisi Korban</h3>
                 <div class="form-group" style="background-color: #f39c12;">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <select class="form-control select2" name="kondisi" required="required" style="border-color: #f39c12;">
                      <?php 
                        $kondisiold=$barupd['status_korban'];
                      ?>
                      <option value="">Pilih Kondisi</option>
                      <option value="Hidup" <?php if($kondisiold=='Hidup'){ echo 'selected="selected"';} ?> >Kondisi Hidup</option>
                      <option value="Meninggal" <?php if($kondisiold=='Meninggal'){ echo 'selected="selected"';} ?>>Kondisi Meninggal</option>
                    </select>
                  </div>
                </div>
              <h3>Identitas Permintaaan</h3>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="nm_penyidik" value="<?php echo $barupd['nm_penyidik']; ?>" placeholder="Nama peminta" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['nrp_penyidik']; ?>" name="nrp_penyidik" placeholder="NRP Peminta/penyidik" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pangkat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['pangkat_penyidik']; ?>" name="pangkat_penyidik" placeholder="Pangkat Peminta/penyidik" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instansi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['instansi_penyidik']; ?>" name="instansi_penyidik" placeholder="Instansi Peminta/penyidik" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Waktu</label>
                  <div class="col-sm-10">
                   <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" id="date-format" class="form-control floating-label" value="<?php echo $barupd['tgl_permintaan']; ?>" name="waktu" placeholder="tanggal/jam" required="required">
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No. Permintaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="No Permintaan" value="<?php echo $barupd['no_permintaan']; ?>" name="no_permintaan" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['perihal_permintaan']; ?>" placeholder="Perihal" name="perihal" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Penjelasan </label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputPassword3" placeholder="Penjelasan"  name="penjelasan" required="required">
                    <?php echo $barupd['penjelasan']; ?>
                    </textarea>
                  </div>
                </div>
                <div class="col-md-6">
                    
                  </div>
                  <div class="col-md-6">
                    <input type="hidden" name="aksi" value="update">
                    <a href="<?php echo $thisURL; ?>" class="btn btn-info" style="float: right;"> Lanjut</a>
                    <input type="submit" class="btn btn-warning" name="btn_simpan" value="Simpan" style="float: right;" />
                  </div>
              </div>
              </p>
            </div>
          </div>
            </fieldset>
        </form>
    <?php
}
// --- Tutup Fngsi tambah data
// --- Fungsi Baca Data (Read)

// --- Tutup Fungsi Hapus
// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
  $thisURL="vs.php?page=".$_GET['page']."";
    switch($_GET['aksi']){
        case "create":
            echo '<a href="'.$thisURL.'"> &laquo; Home</a>';
            tambah($conn);
            break;
        default:
            //echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
            tambah($conn);
            //tampil_data($conn);
    }
} else {
    tambah($conn);
    //tampil_data($conn);
}

}//get tidak kosong
else{
  echo '<script type="text/javascript">';
        echo 'swal("warning!", "Halaman yang anda maksud belum tersedia", "warning");</script>';
              

            echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "vs.php?page=3"}, 3000)
            </script>';

}
?>


