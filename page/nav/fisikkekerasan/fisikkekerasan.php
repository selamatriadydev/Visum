<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
    if (isset($_POST['btn_simpan'])){
        $id_pemeriksaan=$_GET['vshmy'];
        $ket = $_POST['keterangan'];
        if( !empty($id_pemeriksaan) && !empty($ket) ){
            $sql = "INSERT INTO `fisikkekerasan` (`id_pemeriksaan`, `keterangan`) VALUES ('".$id_pemeriksaan."', '".$ket."')";
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Dijumpai</label>
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
    $sql = "SELECT * FROM fisikkekerasan where id_pemeriksaan=$idper";
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
                  <th>Deskripsi</th>
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
                <td><?php echo $data['keterangan']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_fisikkekerasan']; ?>&ket=<?php echo $data['keterangan']; ?>" class="btn btn-primary">Ubah</a> |
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $data['id_fisikkekerasan']; ?>" class="btn btn-danger">Hapus</a>
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
        $id = $_POST['id_fisikkekerasan'];
        $ket = $_POST['keterangan'];
        
        if(!empty($id) &&  !empty($ket)){
            $perubahan = " keterangan='".$ket."'";
            $sql_update = "UPDATE fisikkekerasan SET ".$perubahan." WHERE id_fisikkekerasan=$id";
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
            <input type="hidden" name="id_fisikkekerasan" value="<?php echo $_GET['id'] ?>"/>
            <fieldset>
                <legend><h2>Edit data</h2></legend>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Dijumpai</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;" required="required" name="keterangan"><?php echo $_GET['ket'] ?></textarea>
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
        $sql_hapus = "DELETE FROM fisikkekerasan WHERE id_fisikkekerasan=" . $id;
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