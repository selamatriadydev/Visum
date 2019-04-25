<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."";
    if (isset($_POST['btn_simpan'])){
        $nm_jeniskeadaanumum = $_POST['nm_jeniskeadaanumum'];
        if(!empty($nm_jeniskeadaanumum)){
            $sql = "INSERT INTO jeniskeadaanumum (nm_jeniskeadaanumum) VALUES('".$nm_jeniskeadaanumum."')";
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nm_jeniskeadaanumum" id="inputEmail3" placeholder="Nama" required="required">
                  </div>
                </div>
                <br>
                <br>
                
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="aksi" value="create">
                    <input type="reset" name="reset" class="btn btn-danger" value="Besihkan"/>
                    <input type="submit" class="btn btn-primary" name="btn_simpan" value="Simpan"  />
                  </div>
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
    $sql = "SELECT * FROM jeniskeadaanumum";
    $query = mysqli_query($conn, $sql);
    
    ?>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Jenis Benda</h3>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th></th>
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
                <td><?php echo $data['nm_jeniskeadaanumum']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_jeniskeadaanumum']; ?>&nm=<?php echo $data['nm_jeniskeadaanumum']; ?>" class="btn btn-primary">Ubah</a> |
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $data['id_jeniskeadaanumum']; ?>" class="btn btn-danger">Hapus</a>
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
        $id = $_POST['id_jeniskeadaanumum'];
        $nm_jeniskeadaanumum = $_POST['nm_jeniskeadaanumum'];
        
        if(!empty($id) && !empty($nm_jeniskeadaanumum) ){
            $perubahan = "nm_jeniskeadaanumum='".$nm_jeniskeadaanumum."'";
            $sql_update = "UPDATE jeniskeadaanumum SET ".$perubahan." WHERE id_jeniskeadaanumum=$id";
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
            <a href="<?php echo $thisURL; ?>&aksi=create" class="btn btn-success"> (+) Tambah Data</a>
            <hr>
            <form action="" method="POST">
            <input type="hidden" name="id_jeniskeadaanumum" value="<?php echo $_GET['id'] ?>"/>
            <fieldset>
                <legend><h2>Edit data</h2></legend>
                
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nm_jeniskeadaanumum" id="inputEmail3" placeholder="Nama" required="required" value="<?php echo $_GET['nm']; ?>">
                  </div>
                </div>
                <br><br>

               <div class="form-group col-sm-8">
                  <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="aksi" value="update">
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $_GET['id'] ?>" class="btn btn-danger"> (x) Hapus data ini</a>
                    <input  type="submit" name="btn_ubah" value="Simpan Perubahan"  class="btn btn-primary"  />
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
        $thisURL="vs.php?page=".$_GET['page']."";
        $id = $_GET['id'];
        $sql_hapus = "DELETE FROM jeniskeadaanumum WHERE id_jeniskeadaanumum=" . $id;
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
        echo '<a href="'.$thisURL.'"> &laquo; Home</a>';
            tambah($conn);
            tampil_data($conn);
    }
} else {
    tambah($conn);
    tampil_data($conn);
}
?>