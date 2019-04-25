<?php
// --- conn ke database
error_reporting();
if(abs(is_numeric($_GET['vshmy']))) {
// --- Fngsi tambah data (Create)


    if (isset($_POST['btn_simpan'])){
        
        $id_pemeriksaan= $_POST['id_pemeriksaan'];
        $id_pemeriksa= $_POST['pemeriksa'];
        //form korban
        $id_korban=$_POST['id_korban'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $nm_korban = $_POST['nm_korban'];
        $klamin_korban = $_POST['jns_klamin'];
        $umur_korban = $_POST['umur_korban'];
        $agama_korban = $_POST['agama'];
        $pekerjaan_korban = $_POST['pekerjaan'];
        $status_kawin_korban = $_POST['status_kawin'];
        $almt_korban = $_POST['almt_korban'];
        $diantar_oleh = $_POST['diantar'];
        $tmp_temu = $_POST['tempat_temu'];
        $waktu_temu = $_POST['waktu'];
        $almt_pgt = $_POST['alamat_pgt'];
        $telp_penemu = $_POST['telp'];
        
        if(!empty($id_pemeriksaan) ){
          $sqlUpdate = "UPDATE `pemeriksaan` SET `id_pemeriksa` = '$id_pemeriksa' WHERE `pemeriksaan`.`id_pemeriksaan` = $id_pemeriksaan";

            $sqlUpdate2="UPDATE `korban` SET `id_kota`='$kota', `id_kecamatan`='$kecamatan', `nm_korban` = '$nm_korban', `jns_klamin` = '$klamin_korban',`umur`='$umur_korban', `id_agama` = '$agama_korban', `id_pekerjaan` = '$pekerjaan_korban', `status_perkawinan` = '$status_kawin_korban', `alamat` = '$almt_korban', `diantar_oleh` = '$diantar_oleh', `tmpt_penemuan` = '$tmp_temu', `tgl_penemuan` = '$waktu_temu', `alamat_pengantar` = '$almt_pgt', `no_hp` = '$telp_penemu' WHERE `korban`.`id_korban` = $id_korban;";
            $simpan = mysqli_query($conn, $sqlUpdate);
            if($simpan && isset($_POST['aksi'])){
     if($_POST['aksi'] == 'create'){
      $las=mysqli_insert_id($conn);
      $thisURL="vs.php?page=3";
      //form atas
        
      
        $simpanUpdate = mysqli_query($conn, $sqlUpdate2);
        if($simpanUpdate){

        echo '<script type="text/javascript">';
        echo 'swal("Sukses!", "Data berhasil diupdate", "success");</script>';
                }}

            echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'. $thisURL.'"}, 2000)
            </script>';
            }
        } else {
            $pesan = "<p style='color:red;'>Tidak dapat menyimpan, data belum lengkap!</p>";
        }
    }

    $queryupd=mysqli_query($conn, "SELECT * FROM pemeriksaan, korban WHERE pemeriksaan.id_korban=korban.id_korban and pemeriksaan.id_pemeriksaan='".$_GET['vshmy']."' ORDER by pemeriksaan.id_pemeriksaan DESC");
    $barupd=mysqli_fetch_array($queryupd);

    $queryall=mysqli_query($conn, "SELECT pemeriksaan.id_pemeriksaan, pemeriksaan.id_pemeriksa, pemeriksa.id_pemeriksa, pemeriksa.nm_pemeriksa FROM pemeriksaan, pemeriksa WHERE pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa and  pemeriksaan.id_pemeriksaan=".$_GET['vshmy']);
   $row1=mysqli_fetch_array($queryall);
$thisURL="vs.php?page=3";
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
                    <input type="hidden" name="id_pemeriksaan" value="<?php echo $barupd['id_pemeriksaan']; ?>">
                    <input type="hidden" name="id_korban" value="<?php echo $barupd['id_korban']; ?>">
                    <input type="hidden" name="aksi" value="create">
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Simpan" style="float: right;" />
                  </div>
              <h3>Pilih Pemeriksa</h3>
                <div class="form-group" style="background-color: #f39c12;">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pilih Pemeriksa</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" name="pemeriksa" style="border-color: #f39c12;" >
                      <option value="">Pilih Pemeriksa</option>
                      <?php
                       global $conn;
                       $old_kode=$row1['id_pemeriksa'];
                       $queryPemeriksa=mysqli_query($conn, "SELECT * from pemeriksa");
                       while ($rowPemeriksa=mysqli_fetch_array($queryPemeriksa)) {
                         $new_kode=$rowPemeriksa['id_pemeriksa']; ?>
                        <option value="<?php echo $rowPemeriksa['id_pemeriksa']; ?>" <?php if($old_kode==$new_kode){ echo 'selected="selected"';} ?> ><?php echo $rowPemeriksa['nm_pemeriksa']; ?></option>
                      <?php } ?>
                    </select>
                    <br>
                    <p style="color: white;">(*) Kosongkan jika belum tersedia</p>
                  </div>
                </div>
          <h3>Identitas Korban</h3>
          <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> Kota</label>
                  <div class="col-sm-5">
                   <select id="provinsi" name="kota" class="form-control">
                <option value="">Pilih Kota</option>
                <?php
                $old_kodekota=$barupd['id_kota'];
                $queryKota = mysqli_query($conn, "SELECT * FROM kota ORDER BY nm_kota");
                while ($rowKota = mysqli_fetch_array($queryKota)) {
                $new_kodekota=$rowKota['id_kota'];
                ?>
                    <option value="<?php echo $rowKota['id_kota']; ?>" <?php if($old_kodekota==$new_kodekota){ echo 'selected="selected"';} ?>>
                        <?php echo $rowKota['nm_kota']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            </div>
            <div class="col-sm-5">
            <!--kota-->
            <select id="kota" name="kecamatan" class="form-control">
                <option value="">Pilih kecamatan</option>
                <?php
                $old_kodekec=$barupd['id_kecamatan'];
                $querykecamatan = mysqli_query($conn, "SELECT  * FROM kecamatan
                                    INNER JOIN kota ON kecamatan.id_kota = kota.id_kota ORDER BY nm_kecamatan");
                while ($rowkecamatan = mysqli_fetch_array($querykecamatan)) {
                $new_kodekec=$rowkecamatan['id_kota'];
                ?>
                    <option id="kota" class="<?php echo $rowkecamatan['id_kota']; ?>" value="<?php echo $rowkecamatan['id_kecamatan']; ?>" <?php if($old_kodekec==$new_kodekec){ echo 'selected="selected"';} ?>>
                        <?php echo $rowkecamatan['nm_kecamatan']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
                  </div>
                </div>
          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="<?php echo $barupd['nm_korban']; ?>" placeholder="Nama Korban" name="nm_korban" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis kelamin</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Jenis Kelamain" name="jns_klamin" required="required">
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L" <?php if($barupd['jns_klamin']=='L'){ echo 'selected="selected"';} ?>>Laki-laki</option>
                      <option value="P" <?php if($barupd['jns_klamin']=='P'){ echo 'selected="selected"';} ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['umur']; ?>" placeholder="Umur Pasien" name="umur_korban" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Agama" name="agama" required="required">
                      <option value="">Pilih agama</option>
                      <?php
                       global $conn;
                       $old_kodeagama=$barupd['id_agama'];
                       $sqlAgama=mysqli_query($conn, "SELECT * from agama");
                       while ($rowAgama=mysqli_fetch_array($sqlAgama)) {
                        $new_kodeagama=$rowAgama['id_agama'];
                        ?>
                        <option value="<?php echo $rowAgama['id_agama']; ?>" <?php if($old_kodeagama==$new_kodeagama){ echo 'selected="selected"';} ?>><?php echo $rowAgama['nm_agama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Pekerjaan" name="pekerjaan" required="required">
                      <option value="">Pilih Pekerjaan</option>
                      <?php
                       global $conn;
                       $old_kodepekerjaan=$barupd['id_pekerjaan'];
                       $sqlPekejaan=mysqli_query($conn, "SELECT * FROM `pekerjaan`");
                       while ($rowPekerjaan=mysqli_fetch_array($sqlPekejaan)) {
                        $new_kodepekerjaan=$rowPekerjaan['id_pekerjaan'];
                        ?>
                        <option value="<?php echo $rowPekerjaan['id_pekerjaan']; ?>" <?php if($old_kodepekerjaan==$new_kodepekerjaan){ echo 'selected="selected"';} ?> ><?php echo $rowPekerjaan['nm_pekerjaan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status Perkawinan</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Status Perkawinan" name="status_kawin" required="required">
                      <option value="">Pilih Status Perkawinan</option>
                      <option value="kawin" <?php if($barupd['status_perkawinan']=='kawin'){ echo 'selected="selected"';} ?>>kawin</option>
                      <option value="belum" <?php if($barupd['status_perkawinan']=='belum'){ echo 'selected="selected"';} ?>>Tidak Kawin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" placeholder="alamat" name="almt_korban" required="required">
                      <?php echo $barupd['alamat']; ?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Diantar Oleh </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['diantar_oleh']; ?>" placeholder="Diantar Oleh" name="diantar" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat ditemukan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['tmpt_penemuan']; ?>" placeholder="Ditemukan di" name="tempat_temu" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Waktu ditemukan</label>
                  <div class="col-sm-10">
                    <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                   <input type="text" id="date-format2" class="form-control floating-label" value="<?php echo $barupd['tgl_penemuan']; ?>" name="waktu" placeholder="tanggal/jam" required="required">
                  </div>
                </div>
               </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat Pengantar</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat_pgt" required="required"  placeholder="Alamat Pengantar">
                      <?php echo $barupd['alamat_pengantar']; ?>
                    </textarea>
                    <br>
                    <p style="color: red;">(*) sesuai ktp/sim</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telepon/HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="<?php echo $barupd['no_hp']; ?>" name="telp" placeholder="No Telepon/HP" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                    <input type="reset" name="reset" class="btn btn-danger" value="Bersihkan" />
                  </div>
                  <div class="col-md-6">
                    <input type="hidden" name="aksi" value="create">
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Simpan" style="float: right;" />
                  </div>
              </div>
              </p>
            </div>
          </div>
            </fieldset>
        </form>

  <script type="text/javascript" src="./select/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="./select/jquery.chained.min.js"></script>
<script>
            $("#kota").chained("#provinsi");
        </script>

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