<div class="col-md-12 row">
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pemeriksa Korban</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pemeriksa</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option>Pilih pemeriksa</option>
                      <?php 
                      $query=mysqli_query($conn, "SELECT * from pemeriksa");
                      while($row=mysqli_fetch_array($query)){
                        echo '<option value="'.$row['id_pemeriksa'].'">'.$row['nm_pemeriksa'].'</option>'
                      }
                      ?>
                    </select>
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
  <!-- data pemeriks -->
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keadaan Umum</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Keadaan</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option>Pilih Jenis</option>
                      <option>Kesadaran</option>
                      <option>Pernapapasan</option>
                      <option>Detak Nadi</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
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
  <!-- data pasien -->
	<div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Benda Benda</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Benda-benda</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option>Penutup Tubuh Korban</option>
                      <option>Pakian Korban</option>
                      <option>Benda Ditubuh korban</option>
                      <option>Perhiasan korban</option>
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
              <h3 class="box-title">Idenntifikasi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="vs.php?page=2" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Identifikasi Umum</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="umum">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Identifikasi Khusus</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Khusus">
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