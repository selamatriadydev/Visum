  
  <div class="row">
  <!-- data pemeriks -->
  <div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
      <div class="box-body">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user-md"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemeriksa</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from pemeriksa");
                echo mysqli_num_rows($query);
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Penyidik</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from penyidik");
                echo mysqli_num_rows($query);
                ?>
              </span>
              <br>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pasien Meninggal</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "SELECT * FROM pemeriksaan , korban, penyidik, pemeriksa WHERE pemeriksaan.id_korban=korban.id_korban AND pemeriksaan.id_penyidik=penyidik.id_penyidik and pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa and pemeriksaan.status_korban='Meninggal' order by id_pemeriksaan DESC");
                echo mysqli_num_rows($query);
                ?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pasien Hidup</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "SELECT * FROM pemeriksaan , korban, penyidik, pemeriksa WHERE pemeriksaan.id_korban=korban.id_korban AND pemeriksaan.id_penyidik=penyidik.id_penyidik and pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa and pemeriksaan.status_korban='Hidup' order by id_pemeriksaan DESC");
                echo mysqli_num_rows($query);
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
  </div>
</div>
        <div class="box">

            <div class="box-header">

              <h3 class="box-title"></h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>No</th>

                  <th>No. MR</th>

                  <th>Nama Pasien</th>

                  <th>Nama Pemeriksa</th>

                  <th></th>

                </tr>

                </thead>

                <tbody>

                  <?php
                $thisURL="vs.php?page=".$_GET['page'];
                $no=1;
                  
                  $query=mysqli_query($conn, "SELECT * FROM pemeriksaan, korban WHERE pemeriksaan.id_korban=korban.id_korban ORDER by pemeriksaan.id_pemeriksaan DESC");
                  while($row=mysqli_fetch_array($query)){ 
                  //all cuma
                  // $queryall=mysqli_query($conn, "SELECT * FROM pemeriksaan , korban, penyidik, pemeriksa WHERE pemeriksaan.id_korban=korban.id_korban AND pemeriksaan.id_penyidik=penyidik.id_penyidik and pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa order by id_pemeriksaan DESC");
                  // $row1=mysqli_fetch_array($queryall);
                  $queryall=mysqli_query($conn, "SELECT pemeriksaan.id_pemeriksaan, pemeriksaan.id_pemeriksa, pemeriksa.id_pemeriksa, pemeriksa.nm_pemeriksa FROM pemeriksaan, pemeriksa WHERE pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa and  pemeriksaan.id_pemeriksaan=".$row['id_pemeriksaan']);
                  $row1=mysqli_fetch_array($queryall);
                  //kota dan kec
                  $query2=mysqli_query($conn, "SELECT * FROM korban, kota, kecamatan WHERE kota.id_kota=kecamatan.id_kota and korban.id_kota='".$row['id_kota']."' order by id_korban DESC");
                  $row2=mysqli_fetch_array($query2);

                ?>

                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nm_korban']; ?></td>
                  <td><?php echo $row['nm_korban']; ?></td>
                  <td><?php if($row['id_pemeriksa'] == "0"){ echo '<input class="btn btn-warning" value="Belum diperiksa"/>';}else{ echo $row1['nm_pemeriksa'];} ?></td>
                  <td>
                    <a href="vs.php?page=editpemeriksaan&vshmy=<?php echo $row['id_pemeriksaan']; ?>" class="btn btn-warning btn-md" title="Edit" ><i style="font-size: 15px" class="fa fa-edit (alias)"></i></a> 
                    |
                    <a href="<?php echo $thisURL; ?>&page=act6&vshmy=<?php echo $row['id_pemeriksaan']; ?>&nav=1" class="btn btn-primary btn-md" title="Mulai Pemeriksaan"><i style="font-size: 15px;" class="fa fa-user-md"></i></a>
                    |
                    <button type="button" class="btn btn-primary" title="Lihat Data Pasien" data-toggle="modal" 
                    data-target="#view-pasien1<?php echo $row['id_pemeriksaan']; ?>"><i style="font-size: 20px" class="fa fa-eye"></i></button> 
                    |
                    <?php if($row['id_pemeriksa'] != "0"){ echo ' 
                    <a href="cetak.php?&vshmy='.$row['id_pemeriksaan'].'" class="btn btn-danger" title="Download PDF"><i style="font-size: 20px" class="fa fa-file-pdf-o"></i></a>
                    ';}else{ echo '<a href="#" class="btn btn-danger" title="Download PDF belum tersedia"><i style="font-size: 20px" class="fa fa-file-pdf-o"></i></a>';} ?>

                  </td>

                </tr>

              <?php } ?>

                </tbody>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->
<?php  $query0=mysqli_query($conn, "SELECT * FROM pemeriksaan");
  while($row0=mysqli_fetch_array($query0)){
    $ambil_id=$row0['id_pemeriksaan'];?>

<div class="modal fade" id="view-pasien1<?php echo $row0['id_pemeriksaan']; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lihat Data Pasien</h4>
              </div>
              <div class="modal-body">
                <!-- <p>One fine body&hellip;</p> -->
               <div class="box box-info">
              <div class="box-body">
<?php
$query=mysqli_query($conn, "SELECT * FROM pemeriksaan, korban, pemeriksa, penyidik WHERE pemeriksaan.id_pemeriksaan=".$ambil_id." AND pemeriksaan.id_korban=korban.id_korban AND pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa AND pemeriksaan.id_penyidik=penyidik.id_penyidik");
$row=mysqli_fetch_assoc($query);
$query2=mysqli_query($conn, "SELECT * FROM korban, kota, kecamatan, agama, pekerjaan WHERE korban.id_korban=".$row['id_korban']." AND korban.id_kota=kota.id_kota AND korban.id_kecamatan=kecamatan.id_kecamatan AND korban.id_agama=agama.id_agama AND korban.id_pekerjaan=pekerjaan.id_pekerjaan");
$row2=mysqli_fetch_assoc($query2);


?>
<div class="thumbnail">
                <h3 class="text-center">DATA REKAM MEDIS <br> PRA VISUM ET REPERTUM <br> <?php echo strtoupper($row['status_korban'])  ?></h3>
                <hr>
                <strong>Permintaan</strong>
                <p>
                <table border="0" class="table">
                  <tr>
                    <td style="width: 200px">Nama</td>
                    <td style="width: 10px">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['nm_penyidik'])  ?></td>
                  </tr>

                  <tr>
                    <td>NRP</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['nrp_penyidik'])  ?></td>
                  </tr>

                  <tr>
                    <td>Pangkat/jabatan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['pangkat_penyidik'])  ?></td>
                  </tr>

                  <tr>
                    <td>Instansi</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['instansi_penyidik'])  ?></td>
                  </tr>

                  <tr>
                    <td>Waktu Permintaan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo "";
                    $hari= date('l', strtotime($row['tgl_permintaan']));
                    echo hari_ini($hari);
                    echo ", ";
                    echo date('d F Y', strtotime($row['tgl_permintaan']));
                    echo ", ";
                    echo date('H:i:s a', strtotime($row['tgl_permintaan']));  ?></td>
                  </tr>

                  <tr>
                    <td>No. Permintaan(ver)</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['no_permintaan'])  ?></td>
                  </tr>

                  <tr>
                    <td>Perihal</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['perihal_permintaan'])  ?></td>
                  </tr>


                  <tr>
                    <td>Penjelasan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['penjelasan'])  ?></td>
                  </tr>
                </table>
                </p>
                <br>
                <br>

                <strong>Pemeriksa</strong>
                <p>
                <table border="0" class="table">
                  <tr>
                    <td style="width: 200px">Nama</td>
                    <td style="width: 10px">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['nm_pemeriksa'])  ?></td>
                  </tr>

                  <tr>
                    <td>NIP/NRPTT</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['nrp_nrptt'])  ?></td>
                  </tr>

                  <tr>
                    <td>Instansi</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['instansi_pemeriksa'])  ?></td>
                  </tr>

                  <tr>
                    <td>Waktu Pemeriksaan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo "";
                    $hari= date('l', strtotime($row['waktu_pemeriksaan']));
                    echo hari_ini($hari);
                    echo ", ";
                    echo date('d F Y', strtotime($row['waktu_pemeriksaan']));
                    echo ", ";
                    echo date('H:i:s a', strtotime($row['waktu_pemeriksaan']));  ?></td>
                  </tr>

                  <tr>
                    <td>Jenis Pemeriksaan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['jns_pemeriksaan'])  ?></td>
                  </tr>
                </table>
                </p>
                <br>
                <br>

                <strong>Identitas Korban</strong>
                <p>
                <table border="0" class="table">
                  <tr>
                    <td style="width: 200px">Nama</td>
                    <td style="width: 10px">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['nm_korban'])  ?></td>
                  </tr>

                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php if($row2['jns_klamin']=="P"){ echo ucwords('Perempuan'); }else{ echo ucwords('Laki-laki');}   ?></td>
                  </tr>

                  <tr>
                    <td>Umur</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['umur'])  ?></td>
                  </tr>

                  <tr>
                    <td>Agama</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['nm_agama'])  ?></td>
                  </tr>

                  <tr>
                    <td>Pekerjaan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['nm_pekerjaan'])  ?></td>
                  </tr>

                  <tr>
                    <td>Status Perkawinan</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['status_perkawinan'])  ?></td>
                  </tr>

                  <tr>
                    <td>Alamat</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['alamat'])  ?></td>
                  </tr>

                  <tr>
                    <td>Korban diantar oleh</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['diantar_oleh'])  ?></td>
                  </tr>

                  <tr>
                    <td>Korban ditemukan di</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row2['tmpt_penemuan'])  ?></td>
                  </tr>

                  <tr>
                    <td>Waktu</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php
                    date_default_timezone_set('Asia/Jakarta');
                    echo "";
                    $hari= date('l', strtotime($row2['tgl_penemuan']));
                    echo hari_ini($hari);
                    echo ", ";
                    echo date('d F Y', strtotime($row['tgl_penemuan']));
                    echo ", ";
                    echo date('H:i:s a', strtotime($row['tgl_penemuan']))  ?></td>
                  </tr>

                  <tr>
                    <td>Alamat Pengantar</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['alamat_pengantar'])  ?></td>
                  </tr>

                  <tr>
                    <td>No HP</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <td><?php echo ucwords($row['no_hp'])  ?></td>
                  </tr>
                </table>
                </p>
                 
               </div>

             </div>
           </div>

                
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button> -->
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button> 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>

