<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
  global $conn;
    
    if (isset($_POST['btn_simpan'])){
        //form atas
        $kondisi=$_POST['kondisi'];
        //form penyidik
        $nm_penyidik=$_POST['nm_penyidik'];
        $nrp_penyidik = $_POST['nrp_penyidik'];
        $pangkat_penyidik = $_POST['pangkat_penyidik'];
        $instansi_penyidik = $_POST['instansi_penyidik'];
        $waktu_penyidik = $_POST['waktu'];
        $no_permintaan = $_POST['no_permintaan'];
        $perihal_penyidik = $_POST['perihal'];
        $penjelasan_penyidik = $_POST['penjelasan'];
        if( !empty($kondisi)){
            $sql2 = "INSERT INTO `penyidik` (`nm_penyidik`, `nrp_penyidik`, `pangkat_penyidik`, `instansi_penyidik`, `tgl_permintaan`, `no_permintaan`, `perihal_permintaan`, `penjelasan`) VALUES ('$nm_penyidik', '$nrp_penyidik', '$pangkat_penyidik', '$instansi_penyidik', '$waktu_penyidik', '$no_permintaan', '$perihal_penyidik', '$penjelasan_penyidik');";
            $simpan = mysqli_query($conn, $sql2);
            if($simpan && isset($_POST['aksi'])){
     if($_POST['aksi'] == 'create'){
      $las=mysqli_insert_id($conn);
      if($las!=""){
      $sql = "INSERT INTO `pemeriksaan` (`id_korban`, `id_pemeriksa`, `id_penyidik`, `identifikasiumum`, `identifikasihusus`, `status_korban`) VALUES ('0', '0', '$las', '', '', '$kondisi')";
      $inser= mysqli_query($conn, $sql);
      if($inser){
        $thisURL2="vs.php?page=tambahpemeriksaan&vshmy=".mysqli_insert_id($conn);
               echo '<script type="text/javascript">
               setTimeout(function() {window.location.href = "'. $thisURL2.'"}, 2)
            </script>';
        //  echo '<script type="text/javascript">';
        // echo 'swal("Sukses!", "Data berhasil ditambah", "success").then(function() {
        // window.location.href = "'. $thisURL.'";
        // });</script>';
      }}
                }

           //      echo '<script type="text/javascript">
           //    setTimeout(function() {window.location.href = "'. $thisURL.'"}, 2)
           // </script>';
            }
        } else {
            $pesan = "<p style='color:red;'>Tidak dapat menyimpan, data belum lengkap!</p>";
        }
    }
    $thisURL="vs.php?page=tambahpemeriksaan";
    ?> 
        <form action="" class="form-horizontal" method="POST">
            <fieldset>
                <legend><h2>Tambah Pemeriksaan</h2></legend>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                <div class="col-md-12">
               <div class="box box-info">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Pilih Kondisi Korban</h3>
            </div> -->
            <p>
              <div class="box-body">
                <div class="col-md-6">
                  
                  </div>
                  <div class="col-md-6">
                    <input type="hidden" name="aksi" value="create">
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Lanjut" style="float: right;" />
                  </div>
              <h3>Pilih Kondisi Korban</h3>
                 <div class="form-group" style="background-color: #f39c12;">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" name="kondisi" required="required" style="border-color: #f39c12;">
                      <option value="">Pilih Kondisi</option>
                      <option value="Hidup">Kondisi Hidup</option>
                      <option value="Meninggal">Kondisi Meninggal</option>
                    </select>
                  </div>
                </div>
              <h3>Identitas Permintaaan</h3>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="nm_penyidik" placeholder="Nama peminta" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="nrp_penyidik" placeholder="NRP Peminta/penyidik" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pangkat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="pangkat_penyidik" placeholder="Pangkat Peminta/penyidik" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instansi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="instansi_penyidik" placeholder="Instansi Peminta/penyidik" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Waktu</label>
                  <div class="col-sm-10">
                   <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" id="date-format" class="form-control floating-label" name="waktu" placeholder="tanggal/jam" required="required">
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No. Permintaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="No Permintaan" name="no_permintaan" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Perihal" name="perihal" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Penjelasan </label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputPassword3" placeholder="Penjelasan" name="penjelasan" required="required">
                    </textarea>
                  </div>
                </div>
                <div class="col-md-6">
                    <input type="reset" name="reset" class="btn btn-danger" value="Bersihkan" />
                  </div>
                  <div class="col-md-6">
                    <input type="hidden" name="aksi" value="create">
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Lanjut" style="float: right;" />
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

?>


