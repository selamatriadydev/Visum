<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
      <div class="box-body">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jenis Benda</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from jenisbenda");
                echo mysqli_num_rows($query);
                ?>
              </span>
              <a href="vs.php?page=act2" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Jenis Keadaan Umum">Jenis Keadaan Umum</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from jeniskeadaanumum");
                echo mysqli_num_rows($query);
                ?>
              </span>
              <a href="vs.php?page=act3" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Jenis Pemeriksaan Luar">Jenis Pemeriksaan Luar</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from jenispemeriksaanluar");
                echo mysqli_num_rows($query);
                ?>
                </span>
                <a href="vs.php?page=act4" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemeriksa</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from pemeriksa");
                echo mysqli_num_rows($query);
                ?>
              </span>
              <a href="vs.php?page=act9" class="btn btn-success"><i class="fa fa-eye"></i></a>
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

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
      <div class="box-body">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Agama</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from agama");
                echo mysqli_num_rows($query);
                ?>
              </span>
              <a href="vs.php?page=act1" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pekerjaan</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from pekerjaan");
                echo mysqli_num_rows($query);
                ?>
              </span>
              
                <a href="vs.php?page=act8" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kota</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from kota");
                echo mysqli_num_rows($query);
                ?>
                </span>
                <a href="vs.php?page=act7" class="btn btn-success"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-list-ol"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kecamatan</span>
              <span class="info-box-number">
                <?php
                $query=mysqli_query($conn, "select * from kecamatan");
                echo mysqli_num_rows($query);
                ?>
              </span>
              <a href="vs.php?page=act5" class="btn btn-success"><i class="fa fa-eye"></i></a>
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

  

