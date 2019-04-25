<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
    if (isset($_POST['btn_simpan'])){
        $id= $_POST['id_jenispemeriksaanluar'];
        $id_pemeriksaan=$_GET['vshmy'];
        $ket = $_POST['keterangan'];
        if(!empty($id) && !empty($id_pemeriksaan) && !empty($ket) ){
            $sql = "INSERT INTO `pemeriksaanluar` (`id_jenispemeriksaanluar`, `id_pemeriksaan`, `keterangan`) VALUES ('".$id."', '".$id_pemeriksaan."', '".$ket."')";
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
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <select class="form-control select2" style="width: 100%;" required="required" name="id_jenispemeriksaanluar">
                        <option value="" selected="selected">Pilih Jenis</option>
                        <?php
                        global $conn;
                        $query_gas=mysqli_query($conn, "SELECT * from jenispemeriksaanluar");
                        while ($row2=mysqli_fetch_array($query_gas)) {?>
                        <option value="<?php echo $row2['id_jenispemeriksaanluar']; ?>" ><?php echo $row2['nm_jenispemeriksaanluar']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;" required="required" name="keterangan"></textarea>
                    </div>
                  </div>
                </div>
                <br>

               <div class="form-group col-sm-8">
                    <input type="hidden" name="aksi" value="create">
                    <input type="reset" name="reset" class="btn btn-danger" value="Besihkan"/>
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Simpan" style="float: right;" />
                </div>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
    <?php
}
// --- Tutup Fngsi tambah data
// --- Fungsi Baca Data (Read)
function tampil_data($conn){

    $idper=$_GET['vshmy'];
    $sql = "SELECT * FROM pemeriksaanluar, jenispemeriksaanluar WHERE pemeriksaanluar.id_jenispemeriksaanluar=jenispemeriksaanluar.id_jenispemeriksaanluar and pemeriksaanluar.id_pemeriksaan=$idper";
    $query = mysqli_query($conn, $sql);
    
    ?>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Benda Benda</h3>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Jenis</th>
                  <th>Keterangan</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
    <?php
    $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
    $no=1;
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nm_jenispemeriksaanluar']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_pemeriksaanluar']; ?>&jenis=<?php echo $data['keterangan']; ?>" class="btn btn-primary">Ubah</a> |
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $data['id_pemeriksaanluar']; ?>" class="btn btn-danger">Hapus</a>
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
        $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
        $id = $_POST['id_pemeriksaanluar'];
        $id_jenispemeriksaanluar = $_POST['id_jenispemeriksaanluar'];
        $ket = $_POST['keterangan'];
        
        if(!empty($id) && !empty($id_jenispemeriksaanluar) && !empty($ket)){
            $perubahan = "id_jenispemeriksaanluar='".$id_jenispemeriksaanluar."', keterangan='".$ket."'";
            $sql_update = "UPDATE pemeriksaanluar SET ".$perubahan." WHERE id_pemeriksaanluar=$id";
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
        $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
        ?>
            <a href="<?php echo $thisURL; ?>&aksi=create" class="btn btn-success"> (+) Tambah Data</a>
            <hr>
            <form action="" method="POST">
            <input type="hidden" name="id_pemeriksaanluar" value="<?php echo $_GET['id'] ?>"/>
            <fieldset>
                <legend><h2>Edit data</h2></legend>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <select class="form-control select2" style="width: 100%;" required="required" name="id_jenispemeriksaanluar">
                        <option value="" selected="selected">Pilih Jenis</option>
                        <?php
                        $ambil_id=$_GET['id'];
                        $query_gas0=mysqli_query($conn, "SELECT id_jenispemeriksaanluar from pemeriksaanluar WHERE id_pemeriksaanluar='$ambil_id'");
                        $row0=mysqli_fetch_array($query_gas0);
                        $las_id=$row0['id_jenispemeriksaanluar'];
                        $query_gas=mysqli_query($conn, "SELECT * from jenispemeriksaanluar");
                        while ($row2=mysqli_fetch_array($query_gas)) { 
                          $next_id=$row2['id_jenispemeriksaanluar'];
                          ?>
                        <option value="<?php echo $row2['id_jenispemeriksaanluar']; ?>" <?php if($las_id==$next_id) echo 'selected="selected"';  ?>><?php echo $row2['nm_jenispemeriksaanluar']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;" required="required" name="keterangan"><?php echo $_GET['jenis'] ?></textarea>
                    </div>
                  </div>
                </div>
                <br>

               <div class="form-group col-sm-8">
                    <input type="hidden" name="aksi" value="update">
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $_GET['id'] ?>" class="btn btn-danger"> (x) Hapus data ini</a>
                    <input  type="submit" name="btn_ubah" value="Simpan Perubahan"  class="btn btn-primary"  style="float: right;" />
                </div>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
            
        <?php
    }
    
}
// --- Tutup Fungsi Update
// --- Fungsi Delete
function hapus($conn){
    if(isset($_GET['id']) && isset($_GET['aksi'])){
        $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
        $id = $_GET['id'];
        $sql_hapus = "DELETE FROM pemeriksaanluar WHERE id_pemeriksaanluar=" . $id;
        $hapus = mysqli_query($conn, $sql_hapus);
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
             
           echo '<script type="text/javascript">';
        echo 'swal("Sukses!", "Data berhasil dihapus", "success").then(function() {
        window.location.href = "'.$thisURL.'";
        });</script>';
            }
            
            echo '<script type="text/javascript">
              setTimeout(function() {window.location.href = "'.$thisURL.'"}, 1500)
           </script>';
            
        }
    }
    
}
// --- Tutup Fungsi Hapus
// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
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