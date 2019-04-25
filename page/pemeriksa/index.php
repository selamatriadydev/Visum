<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."";
    if (isset($_POST['btn_simpan'])){
        $nrp = $_POST['nrp'];
        $nm_pemeriksa = $_POST['nm_pemeriksa'];
        $instansi_pemeriksa = $_POST['instansi_pemeriksa'];
        $jenis = $_POST['jenis'];
        $waktu = $_POST['waktu'];
        if(!empty($nrp) && !empty($nm_pemeriksa) && !empty($instansi_pemeriksa) && !empty($jenis) && !empty($waktu)){
            $sql = "INSERT INTO pemeriksa (nm_pemeriksa, nrp_nrptt, instansi_pemeriksa, waktu_pemeriksaan, jns_pemeriksaan) VALUES('".$nrp."','".$nm_pemeriksa."','".$instansi_pemeriksa."','".$waktu."','".$jenis."')";
            $simpan = mysqli_query($conn, $sql);
            if($simpan && isset($_POST['aksi'])){
     if($_POST['aksi'] == 'create'){
                    echo '<script type="text/javascript">';
        echo 'swal("Sukses!", "Data berhasil ditambah", "success").then(function() {
        window.location.href = "'. $thisURL.'";
        });</script>';
                }
                echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'. $thisURL.'"}, 2000)
           </script>';
            }
        } else {
            $pesan = "<p style='color:red;'>Tidak dapat menyimpan, data belum lengkap!</p>";
        }
    }
    ?> 
        <form action="" method="POST">
          <fieldset>
            <legend><h2>Tambah data</h2></legend>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">NRP/NRPTT</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="nrp" id="inputEmail3" placeholder="NRP/NRPTT" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Nama</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="nm_pemeriksa" id="inputEmail3" placeholder="Nama" required="required">
                  </div>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Instansi</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="instansi_pemeriksa" id="inputEmail3" placeholder="instansi pemeriksa" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Jenis Pemeriksaan</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="jenis" id="inputEmail3" placeholder="jenis pemeriksaan" required="required">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Waktu</label>
                  <div class="col-md-10">
                    <input type="text" id="date-format" class="form-control floating-label" name="waktu" placeholder="tanggal/jam" required="required">
                  </div>
                </div>
            </div> 
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">&nbsp;</label>
                  <div class="col-md-10">
                    <input type="hidden" name="aksi" value="create">
                    <input type="reset" name="reset" class="btn btn-danger" value="Besihkan"/>
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Simpan"  />
                  </div>
                </div>
            </div>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
         <br> <br>
    <?php
}
// --- Tutup Fngsi tambah data
// --- Fungsi Baca Data (Read)
function tampil_data($conn){
    $sql = "SELECT * FROM pemeriksa";
    $query = mysqli_query($conn, $sql);
    
    ?>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemeriksa</h3>
              <div class="box-tools">
                <a href="<?php echo $thisURL; ?>&aksi=create" class="btn btn-success" title="Tambah Baru"><i style="font-size: 15px" class="fa fa-plus"></i></a>
              </div>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Instansi</th>
                  <th>Waktu</th>
                  <th>Jenis Pemeriksaan</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
    <?php
    $thisURL="vs.php?page=".$_GET['page']."";
    $no=1;
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nrp_nrptt']; ?></td>
                <td><?php echo $data['nm_pemeriksa']; ?></td>
                <td><?php echo $data['instansi_pemeriksa']; ?></td>
                <td><?php echo $data['waktu_pemeriksaan']; ?></td>
                <td><?php echo $data['jns_pemeriksaan']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_pemeriksa']; ?>" class="btn btn-primary">Ubah</a> | 
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $data['id_pemeriksa']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
   $no++; }
    echo '
    </tbody>
     </table>
     </div>
     <!-- /.box-body -->
  </div>';
}
// --- Tutup Fungsi Baca Data (Read)
// --- Fungsi Ubah Data (Update)
function ubah($conn){
    // ubah data
    if(isset($_POST['btn_ubah'])){
        $thisURL="vs.php?page=".$_GET['page']."";
        $id = $_POST['id_pemeriksa'];
        $nrp = $_POST['nrp'];
        $nm_pemeriksa = $_POST['nm_pemeriksa'];
        $instansi_pemeriksa = $_POST['instansi_pemeriksa'];
        $jenis = $_POST['jenis'];
        $waktu = $_POST['waktu'];
        if(!empty($id) &&!empty($nrp) && !empty($nm_pemeriksa) && !empty($instansi_pemeriksa) && !empty($jenis) && !empty($waktu)){
            $perubahan = "nm_pemeriksa='".$nm_pemeriksa."', nrp_nrptt='".$nrp."',instansi_pemeriksa='".$instansi_pemeriksa."',waktu_pemeriksaan='".$waktu."',jns_pemeriksaan='".$jenis."' ";
            $sql_update = "UPDATE pemeriksa SET ".$perubahan." WHERE id_pemeriksa=$id";
            $update = mysqli_query($conn, $sql_update);
            if($update && isset($_POST['aksi'])){
                if($_POST['aksi'] == 'update'){
                  echo '<script type="text/javascript">';
                    echo 'swal("Sukses!", "Data berhasil diupdate", "success").then(function() {
                    window.location.href = "'. $thisURL.'";
                    });</script>';
            }
             echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'. $thisURL.'"}, 2000)
           </script>';
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    
    // tampilkan form ubah
    if(isset($_GET['id'])){
        $thisURL="vs.php?page=".$_GET['page']."";
        ?>
            <a href="<?php echo $thisURL; ?>" class="btn btn-warning"> (-) Kembali</a>
            
            <form action="" method="POST">
            <input type="hidden" name="id_pemeriksa" value="<?php echo $_GET['id'] ?>"/>
            <fieldset>
                <legend><h2>Edit data</h2></legend>
              <?php
              $ambil_id=$_GET['id'];
                $query11=mysqli_query($conn, "SELECT * from pemeriksa WHERE id_pemeriksa=$ambil_id");
                while($row11=mysqli_fetch_array($query11)){
              ?>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">NRP/NRPTT</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="nrp" id="inputEmail3" placeholder="NRP/NRPTT" value="<?php echo $row11['nrp_nrptt']; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Nama</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="nm_pemeriksa" id="inputEmail3" value="<?php echo $row11['nm_pemeriksa']; ?>" placeholder="Nama" required="required">
                  </div>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Instansi</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="instansi_pemeriksa" id="inputEmail3" value="<?php echo $row11['instansi_pemeriksa']; ?>" placeholder="instansi pemeriksa" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Jenis Pemeriksaan</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="jenis" value="<?php echo $row11['jns_pemeriksaan']; ?>" id="inputEmail3" placeholder="jenis pemeriksaan" required="required">
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">Waktu</label>
                  <div class="col-md-10">
                    <input type="text" id="date-format" class="form-control floating-label" value="<?php echo $row11['waktu_pemeriksaan']; ?>" name="waktu" placeholder="tanggal/jam" required="required">
                  </div>
                </div>
            </div>
            <?php } ?> 
            <hr>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">&nbsp;</label>
                  <div class="col-md-10">
                    <input type="hidden" name="aksi" value="update">
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $_GET['id'] ?>" class="btn btn-danger"> (x) Hapus data ini</a>
                    <input  type="submit" name="btn_ubah" value="Simpan Perubahan"  class="btn btn-primary"  />
                </div>
              </div>
            </div>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
        <br>
            
        <?php
    }
    
}
// --- Tutup Fungsi Update
// --- Fungsi Delete
function hapus($conn){
    if(isset($_GET['id']) && isset($_GET['aksi'])){
        $thisURL="vs.php?page=".$_GET['page']."";
        $id = $_GET['id'];
        $check=mysqli_query($conn, "SELECT * from pemeriksaan WHERE id_pemeriksa=$id");
        $cek=mysqli_num_rows($check);
        if($cek >= 1){
          echo '<script type="text/javascript">';
        echo 'swal("Maaf!", "pemeriksa ini digunakan untuk data pemeriksaan, anda tidak dapat menghapus data ini.", "error").then(function() {
        window.location.href = "'.$thisURL.'";
        });</script>';
        echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'.$thisURL.'"}, 2000)
           </script>';
        }else{
        $sql_hapus = "DELETE FROM pemeriksa WHERE id_pemeriksa=" . $id;
        $hapus = mysqli_query($conn, $sql_hapus);
        if($hapus){
            if($_GET['aksi'] == 'delete'){
             
           echo '<script type="text/javascript">';
        echo 'swal("Sukses!", "Data berhasil dihapus", "success").then(function() {
        window.location.href = "'.$thisURL.'";
        });</script>';
            }
            
            echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'.$thisURL.'"}, 1000)
           </script>';
           } 
        }
    }
    
}
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
        case "read":
            tampil_data($conn);
            break;
        case "update":
            ubah($conn);
            tampil_data($conn);
            break;
        case "delete":
            hapus($conn);
            break;
        default:
            //echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
            tambah($conn);
            tampil_data($conn);
    }
} else {
    tambah($conn);
    tampil_data($conn);
}
?>