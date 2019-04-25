<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
    if (isset($_POST['btn_simpan'])){
        $id=$_GET['vshmy'];
        $id_pemeriksa = $_POST['id_pemeriksa'];
        
        if(!empty($id) && !empty($id_pemeriksa) ){
             $perubahan = "id_pemeriksa='".$id_pemeriksa."'";
            $sql = "UPDATE pemeriksaan SET ".$perubahan." WHERE id_pemeriksaan='$id'";
            $simpan = mysqli_query($conn, $sql);
            if($simpan && isset($_POST['aksi'])){
     if($_POST['aksi'] == 'create'){
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
            $pesan = "<p style='color:red;'>Tidak dapat menyimpan, data belum lengkap!</p>";
        }
    }
    ?> 
        <form action="" method="POST">
            <fieldset>
                <legend><h2>Tambah data</h2></legend>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pemeriksa</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <select class="form-control select2" style="width: 100%;" required="required" name="id_pemeriksa">
                        <option value="" selected="selected">Pilih Pemeriksa</option>
                        <?php
                        global $conn;
                        $query_gas=mysqli_query($conn, "SELECT * from pemeriksa");
                        while ($row2=mysqli_fetch_array($query_gas)) {
                          $next_id=$row2['id_pemeriksa'];?>
                        <option value="<?php echo $row2['id_pemeriksa']; ?>" ><?php echo $row2['nm_pemeriksa']; ?></option>
                        <?php } ?>
                      </select>
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
    $sql = "SELECT * FROM pemeriksaan, pemeriksa WHERE pemeriksa.id_pemeriksa=pemeriksaan.id_pemeriksa and pemeriksaan.id_pemeriksaan=".$_GET['vshmy']."";
    $query = mysqli_query($conn, $sql);
    
    ?>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keadaan Umum</h3>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Instansi</th>
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
                <td><?php echo $data['nrp_nrptt']; ?></td>
                <td><?php echo $data['nm_pemeriksa']; ?></td>
                <td><?php echo $data['instansi_pemeriksa']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_pemeriksaan']; ?>" class="btn btn-primary">Ubah</a>
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
        $id = $_GET['vshmy'];
        $id_pemeriksa = $_POST['id_pemeriksa'];
        
        if(!empty($id) && !empty($id_pemeriksa) ){
            $perubahan = "id_pemeriksa='".$id_pemeriksa."'";
            $sql_update = "UPDATE pemeriksaan SET ".$perubahan." WHERE id_pemeriksaan=$id";
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
           <!--  <input type="hidden" name="id_keadaanumum" value="<?php //echo $_GET['id'] ?>"/> -->
            <fieldset>
                <legend><h2>Edit data</h2></legend>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pemeriksa</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <select class="form-control select2" style="width: 100%;" required="required" name="id_pemeriksa">
                        <option value="" selected="selected">Pilih Pemeriksa</option>
                        <?php
                        global $conn;
                        $ambil_id=$_GET['id'];
                        $query_gas0=mysqli_query($conn, "SELECT id_pemeriksa from pemeriksaan WHERE id_pemeriksaan='$ambil_id'");
                        $row0=mysqli_fetch_array($query_gas0);
                        $las_id=$row0['id_pemeriksa'];
                        $query_gas=mysqli_query($conn, "SELECT * from pemeriksa");
                        while ($row2=mysqli_fetch_array($query_gas)) {
                          $next_id=$row2['id_pemeriksa'];?>
                        <option value="<?php echo $row2['id_pemeriksa']; ?>" <?php if($las_id==$next_id) echo 'selected="selected"';  ?>><?php echo $row2['nm_pemeriksa']; ?></option>
                        <?php } ?>
                      </select>
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
        $sql_hapus = "DELETE FROM keadaanumum WHERE id_keadaanumum=" . $id;
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