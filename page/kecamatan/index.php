<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."";
    if (isset($_POST['btn_simpan'])){
        $id = $_POST['id_kota'];
        $nm_kecamatan = $_POST['nm_kecamatan'];
        if(!empty($id) && !empty($nm_kecamatan)){
            $sql = "INSERT INTO kecamatan (id_kota,nm_kecamatan) VALUES ('".$id."','".$nm_kecamatan."')";
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Kota</label>
                  <div class="col-sm-10">
                    <div class="form-group" name="nm_kota" id="inputEmail3">
                      <select class="form-control select2" name="id_kota" style="width: 100%;" required="required">
                      <option value="">Pilih Kota</option>
                  <?php 
                  $query=mysqli_query($conn, "select * from kota");
                     while ($row=mysqli_fetch_array($query)) { ?>  
                        <option value="<?php echo $row['id_kota'] ?>"><?php echo $row['nm_kota'] ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nm_kecamatan" id="inputEmail3" placeholder="Nama" required="required">
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
    $sql = "SELECT * FROM kecamatan, kota where kecamatan.id_kota=kota.id_kota";
    $query = mysqli_query($conn, $sql);
    
    ?>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kecamatan</h3>
            </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>kota</th>
                  <th>Kecamatan</th>
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
                <td><?php echo $data['nm_kota']; ?></td>
                <td><?php echo $data['nm_kecamatan']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_kecamatan']; ?>" class="btn btn-primary">Ubah</a>
                </td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=delete&id=<?php echo $data['id_kecamatan']; ?>" class="btn btn-danger">Hapus</a>
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
        $id = $_POST['id_kecamatan'];
        $id_kota = $_POST['id_kota'];
        $nm_kecamatan = $_POST['nm_kecamatan'];
        
        if(!empty($id) && !empty($id_kota) && !empty($nm_kecamatan) ){
            $perubahan = "id_kota='".$id_kota."', nm_kecamatan='".$nm_kecamatan."'";
            $sql_update = "UPDATE kecamatan SET ".$perubahan." WHERE id_kecamatan=$id";
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
            <a href="<?php echo $thisURL; ?>" class="btn btn-success">Kembali</a>
            <hr>
            <form action="" method="POST">
            <input type="hidden" name="id_kecamatan" value="<?php echo $_GET['id'] ?>"/>
            <fieldset>
            <?php
              $ambil_id=$_GET['id'];
              $query1=mysqli_query($conn, "SELECT * from kecamatan where id_kecamatan=$ambil_id");
                while($row1=mysqli_fetch_array($query1)){ ?>
                <legend><h2>Edit data</h2></legend>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kota</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="id_kota" required="required">
                      <option value="">Pilih Kota</option>
                      <?php
                        $last_id=$row1['id_kota'];
                          $query2=mysqli_query($conn, "SELECT * from kota");
                          while($row2=mysqli_fetch_array($query2)){ 
                            $next_id=$row2['id_kota']; ?>
                            <option value="<?php echo $row2['id_kota'];?>"  <?php if($last_id==$next_id) {echo 'selected="selected"';} ?>><?php echo $row2['nm_kota'];?></option>
                          <?php } ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nm_kecamatan" id="inputEmail3" value="<?php echo $row1['nm_kecamatan'];?>" placeholder="Nama" required="required">
                  </div>
              </div>
                <br><br>
              <?php } ?>

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
        $sql_hapus = "DELETE FROM jenispemeriksaanluar WHERE id_jenispemeriksaanluar=" . $id;
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