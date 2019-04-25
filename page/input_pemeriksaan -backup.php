<div class="row">
  <div class="col-md-12 box box-warning">
      <div class="box-body">
         <div class="col-md-6 form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kondisi Korban</label>
            <div class="col-sm-10">
              <select class="form-control select2" id="inputEmail3" name="kondisi" required="required">
                <option value=""> Pilih Kondisi</option>
                <option value="Hidup">Hidup</option>
                <option value="Meninggal">Meninggal</option>
              </select>
            </div>
         </div>
         <div class="col-md-6 form-group">
            <label for="inputEmail32" class="col-sm-2 control-label">Pemeriksa</label>
            <div class="col-sm-10">
              <select class="form-control" id="inputEmail32" name="id_pemeriksa" >
                <option value=""> Pilih pemeriksa</option>
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
   </div>
  <!-- data pemeriks -->
  <div class="col-md-6">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Diri Penyidik/Peminta</h3>
            </div>
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="nm_penyidik" placeholder="Nama peminta" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NRP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="nrp_penyidik" placeholder="NRP Peminta/penyidik" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Instansi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="instansi_penyidik" placeholder="Instansi Peminta/penyidik" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Waktu</label>
                  <div class="col-sm-10">
                   <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker" name="waktu-tgl" required="required">
                  </div>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="time" onchange="onTimeChange()" id="timeInput" class="form-control" required="required">
                    <input type="hidden" name="waktu-jam" id="show">
                  </div>


                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No. Permintaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="No Permintaan" name="no_permintaan" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Perihal" name="perihal" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Penjelasan </label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputPassword3" placeholder="Penjelasan" name="penjelasan" required="required">
                    </textarea>
                  </div>
                </div>
                
               
              </div>
              <!-- /.box-body -->
              <!-- <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div> -->
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
  </div>
  <!-- data pasien -->
	<div class="col-md-6">
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Diri Korban</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">

                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Nama Korban" name="nm_korban" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis kelamin</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Jenis Kelamain" name="jns_klamin" required="required">
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Umur Pasien" name="umur_korban" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Agama" name="agama" required="required">
                      <option value="">Pilih agama</option>
                      <?php
                       global $conn;
                       $query3=mysqli_query($conn, "SELECT * from agama");
                       while ($row3=mysqli_fetch_array($query3)) {?>
                        <option value="<?php echo $row3['id_agama']; ?>"><?php echo $row3['nm_agama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pekerjaan</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Pekerjaan" name="pekerjaan" required="required">
                      <option value="">Pilih Pekerjaan</option>
                      <?php
                       global $conn;
                       $query4=mysqli_query($conn, "SELECT * from pekerjaan");
                       while ($row4=mysqli_fetch_array($query3)) {?>
                        <option value="<?php echo $row4['id_pekerjaan']; ?>"><?php echo $row4['nm_pekerjaan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status Perkawinan</label>
                  <div class="col-sm-10">
                    <select  class="form-control" id="inputPassword3" placeholder="Status Perkawinan" name="status_kawin" required="required">
                      <option value="">Pilih Status Perkawinan</option>
                      <option value="kawin">kawin</option>
                      <option value="belum">Tidak Kawin</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" placeholder="alamat" name="almt_korban" required="required"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Diantar Oleh </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Diantar Oleh" name="diantar" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tempat ditemukan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Ditemukan di" name="tempat_temu" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Waktu ditemukan</label>
                  <div class="col-sm-10">
                    <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker" name="waktu-tgl1" required="required">
                  </div>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="time" onchange="onTimeChange1()" id="timeInput1" class="form-control" required="required">
                    <input type="hidden" name="waktu-jam1" id="show1">
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat Pengantar</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat_pgt" required="required" placeholder="Alamat Pengantar"></textarea>
                    <br>
                    <p style="color: red;">(*) sesuai ktp/sim</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telepon/HP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="telp" placeholder="No Telepon/HP" required="required">
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->
             <!--  <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div> -->
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	</div>
</div>
<script>
var inputEle = document.getElementById('timeInput');


function onTimeChange() {
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  document.getElementById('show').value=(hours + ':' + minutes + ' ' + meridian);
}

var inputEle1 = document.getElementById('timeInput1');


function onTimeChange1() {
  var timeSplit = inputEle1.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  document.getElementById('show1').value=(hours + ':' + minutes + ' ' + meridian);
}


</script>