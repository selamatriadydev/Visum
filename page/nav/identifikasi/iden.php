<?php
// --- conn ke database

// --- Fngsi tambah data (Create)
function tambah($conn){
    $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
    if (isset($_POST['btn_simpan'])){
        
        $id_pemeriksaan=$_GET['vshmy'];
        $Khusus=$_POST['Khusus'];
        $umum = $_POST['umum'];
        if(!empty($Khusus) && !empty($id_pemeriksaan) && !empty($umum) ){
            $sql = "UPDATE `pemeriksaan` set identifikasihusus='".$Khusus."', identifikasiumum='".$umum."' where id_pemeriksaan=$id_pemeriksaan";
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Khusus</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;"  name="Khusus"></textarea>
                    </div>
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Umum</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;"  name="umum"></textarea>
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

        $id_pemeriksaan=$_GET['vshmy'];
    $sql = "SELECT * FROM pemeriksaan where id_pemeriksaan=$id_pemeriksaan";
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
                  <th>Khusus</th>
                  <th>Umum</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
    <?php
    $thisURL="vs.php?page=".$_GET['page']."&vshmy=".$_GET['vshmy']."&nav=".$_GET['nav']."";
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $data['identifikasihusus']; ?></td>
                <td><?php echo $data['identifikasiumum']; ?></td>
                <td>
                    <a href="<?php echo $thisURL; ?>&aksi=update&id=<?php echo $data['id_pemeriksaan']; ?>" class="btn btn-primary">Ubah</a>
                </td>
            </tr>
        <?php }
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
        $id = $_POST['id_pemeriksaan'];
        $Khusus=$_POST['Khusus'];
        $umum = $_POST['umum'];
        
        if(!empty($id) && !empty($Khusus) && !empty($umum)){
            $perubahan = "identifikasihusus='".$Khusus."', identifikasiumum='".$umum."'";
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
            <!-- <a href="<?php// echo $thisURL; ?>&aksi=create" class="btn btn-success"> (+) Tambah Data</a> -->
            <hr>
            <form action="" method="POST">
            <input type="hidden" name="id_pemeriksaan" value="<?php echo $_GET['id'] ?>"/>
            <fieldset>
                <legend><h2>Edit data</h2></legend>
                <?php
                        $ambil_id=$_GET['id'];
                        $query_gas0=mysqli_query($conn, "SELECT * from pemeriksaan WHERE id_pemeriksaan='$ambil_id'");
                        $row0=mysqli_fetch_array($query_gas0); ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Khusus</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;"  name="Khusus">
                        <?php echo $row0['identifikasihusus'] ; ?>
                      </textarea>
                    </div>
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Umum</label>
                  <div class="col-sm-10">
                     <div class="form-group">
                      <textarea  class="form-control" style="width: 100%;"  name="umum">
                        <?php echo $row0['identifikasiumum'] ; ?>
                      </textarea>
                    </div>
                  </div>
                </div>
                <br>

               <div class="form-group col-sm-8">
                    <input type="hidden" name="aksi" value="update">
                    
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