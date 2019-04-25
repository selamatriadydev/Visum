
<div class="col-md-12 row">
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemeriksa Korban</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>NRP/NRPTT</th>

                  <th>Nama</th>

                  <th></th>

                  <th></th>

                </tr>

                </thead>

                <tbody>

                  <?php
                  
                  $id_vshmy=$_GET['vshmy'];
                  global $id_vshmy;
                $no=1;

                  $query=mysqli_query($conn, "SELECT * FROM pemeriksaan,  pemeriksa WHERE pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa and pemeriksaan.id_pemeriksaan='".$id_vshmy."'");

                  while($row=mysqli_fetch_array($query)){ 

                ?>

                <tr>

                  <td><?php echo $row['nrp_nrptt']; ?></td>

                  <td><?php echo $row['nm_pemeriksa']; ?></td>



                  <td>

                    <button type="button" class="btn btn-primary" title="Lihat Data" data-toggle="modal" data-target="#view-pasien"><i style="font-size: 20px" class="fa fa-eye"></i></button>

                  </td>

                  <td>

                    <button type="button" class="btn btn-danger" title="Edit"><i style="font-size: 20px" class="fa fa-edit"></i></button>

                  </td>

                </tr>

              <?php } ?>

                </tbody>

                <tfoot>

                <tr>

                  <th>NRP/NRPTT</th>

                  <th>Nama Pemeriksa</th>

                  <th></th>

                  <th></th>

                </tr>

                </tfoot>

              </table>
                
              </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- <a href="vs.php?page=2" class="btn btn-default">Kembali</a> -->
                <button type="button" class="btn btn-info pull-right">Tambah</button>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
  </div>
  <!-- data pemeriks -->
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keadaan Umum</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">

                <table id="" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Jenis</th>

                  <th>Keterangan</th>

                  <th></th>

                  <th></th>

                </tr>

                </thead>

                <tbody>

                  <?php

                $no=1;

                  $query=mysqli_query($conn, "SELECT * FROM keadaanumum, jeniskeadaanumum where keadaanumum.id_jeniskeadaanumum=jeniskeadaanumum.id_jeniskeadaanumum AND keadaanumum.id_pemeriksaan='".$id_vshmy."'");

                  while($row=mysqli_fetch_array($query)){ 

                ?>

                <tr>

                  <td><?php echo $row['nm_jeniskeadaanumum']; ?></td>

                  <td><?php echo $row['keterangan']; ?></td>



                  <td>

                    <button type="button" class="btn btn-primary" title="Lihat Data" data-toggle="modal" data-target="#view-pasien"><i style="font-size: 20px" class="fa fa-eye"></i></button>

                  </td>

                  <td>

                    <button type="button" class="btn btn-danger" title="Edit"><i style="font-size: 20px" class="fa fa-edit"></i></button>

                  </td>

                </tr>

              <?php } ?>

                </tbody>

                <tfoot>

                <tr>

                  <th>Jenis</th>

                  <th>Keterangan</th>

                  <th></th>

                  <th></th>

                </tr>

                </tfoot>

              </table>
                
              </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- <a href="vs.php?page=2" class="btn btn-default">Kembali</a> -->
                <button type="button" class="btn btn-info pull-right">Tambah</button>
              </div>
          </div>
          <!-- /.box -->
  </div>
  <!-- data pasien -->
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Benda Benda</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <table id="" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Jenis</th>

                  <th>Keterangan</th>

                  <th></th>

                  <th></th>

                </tr>

                </thead>

                <tbody>

                  <?php

                $no=1;

                  $query=mysqli_query($conn, "SELECT * FROM benda, jenisbenda where benda.id_jenisbenda=jenisbenda.id_jenisbenda AND benda.id_pemeriksaan='".$id_vshmy."'");

                  while($row=mysqli_fetch_array($query)){ 

                ?>

                <tr>

                  <td><?php echo $row['nm_jenisbenda']; ?></td>

                  <td><?php echo $row['keterangan']; ?></td>



                  <td>

                    <button type="button" class="btn btn-primary" title="Lihat Data" data-toggle="modal" data-target="#view-pasien"><i style="font-size: 20px" class="fa fa-eye"></i></button>

                  </td>

                  <td>

                    <button type="button" class="btn btn-danger" title="Edit"><i style="font-size: 20px" class="fa fa-edit"></i></button>

                  </td>

                </tr>

              <?php } ?>

                </tbody>

                <tfoot>

                <tr>

                  <th>Jenis</th>

                  <th>Keterangan</th>

                  <th></th>

                  <th></th>

                </tr>

                </tfoot>

              </table>
                
              </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- <a href="vs.php?page=2" class="btn btn-default">Kembali</a> -->
                <button type="button" class="btn btn-info pull-right">Tambah</button>
              </div>
          </div>
          <!-- /.box -->
  </div>
</div>



<div class="col-md-12 row">
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Identifikasi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Jenis</th>

                  <th>Keterangan</th>

                  <th></th>

                  <th></th>

                </tr>

                </thead>

                <tbody>

                  <?php

                $no=1;

                  $query=mysqli_query($conn, "SELECT * FROM benda, jenisbenda where benda.id_jenisbenda=jenisbenda.id_jenisbenda AND benda.id_pemeriksaan='".$id_vshmy."'");

                  while($row=mysqli_fetch_array($query)){ 

                ?>

                <tr>

                  <td><?php echo $row['nm_jenisbenda']; ?></td>

                  <td><?php echo $row['keterangan']; ?></td>



                  <td>

                    <button type="button" class="btn btn-primary" title="Lihat Data" data-toggle="modal" data-target="#view-pasien"><i style="font-size: 20px" class="fa fa-eye"></i></button>

                  </td>

                  <td>

                    <button type="button" class="btn btn-danger" title="Edit"><i style="font-size: 20px" class="fa fa-edit"></i></button>

                  </td>

                </tr>

              <?php } ?>

                </tbody>

                <tfoot>

                <tr>

                  <th>Jenis</th>

                  <th>Keterangan</th>

                  <th></th>

                  <th></th>

                </tr>

                </tfoot>

              </table>
                
              </div>
              <!-- /.box-body -->
                <div class="box-footer">
                <!-- <a href="vs.php?page=2" class="btn btn-default">Kembali</a> -->
                <button type="button" class="btn btn-info pull-right">Tambah</button>
              </div>
          </div>
          <!-- /.box -->
  </div>
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemeriksaan Luar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">jenis Pemeriksaan</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option>Pilih Jenis</option>
                      <option>Kepala</option>
                      <option>Dahi</option>
                      <option>Mata</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Keterangan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
               <div class="box-footer">
                <a href="vs.php?page=2" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
  </div>
</div>


<div class="col-md-12 row">
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemeriksaan Tambahan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis Pemeriksaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="jenis">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tujuan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Tujuan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
               <div class="box-footer">
                <a href="vs.php?page=2" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
  </div>
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tindakan dan terapi klinis</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tindakan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Masukan Tindakan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
               <div class="box-footer">
                <a href="vs.php?page=2" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
  </div>


  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Deskripsi Kekerasan di tubuh korban</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Dijumpai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Masukan Deskripsi Kekerasan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
               <div class="box-footer">
                <a href="vs.php?page=2" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
  </div>
  
</div>