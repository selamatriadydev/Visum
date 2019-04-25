
<?php
  $query0=mysqli_query($conn, "SELECT * FROM pemeriksaan");
  while($row0=mysqli_fetch_array($query0)){
    $ambil_id=$row0['id_pemeriksaan'];?>
?>
<div class="modal fade" id="view-pasien<?php echo $ambil_id; ?>">
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
                    <td><?php echo ucwords($row2['jns_klamin'])  ?></td>
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