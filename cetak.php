
<?php
$data='vshmy';
$ambil_pdf=$_GET['vshmy'];
include ("./include/konek.php");
$queryPDF=mysqli_query($conn, "SELECT * FROM pemeriksaan , korban, penyidik, pemeriksa WHERE pemeriksaan.id_korban=korban.id_korban AND pemeriksaan.id_penyidik=penyidik.id_penyidik and pemeriksaan.id_pemeriksa=pemeriksa.id_pemeriksa and pemeriksaan.id_pemeriksaan='$ambil_pdf' order by id_pemeriksaan DESC");
$rowPDF=mysqli_fetch_array($queryPDF);
if($rowPDF['status_korban']=='Meninggal'){ $status_korban='(Alm)';}else{$status_korban='';}
//identitas korban
$querykorban=mysqli_query($conn, "SELECT * FROM korban, Pekerjaan  where korban.id_pekerjaan=pekerjaan.id_pekerjaan and korban.id_korban='".$rowPDF['id_korban']."' order by korban.id_korban DESC");
$rowkorban=mysqli_fetch_array($querykorban);
if($rowkorban['jns_klamin']=='P'){ $jns_klamin='Perempuan';}else{$jns_klamin='Laki-laki';}
//hasil perjumpaan
$queryperjumpaan=mysqli_query($conn, "SELECT * from fisikkekerasan where id_pemeriksaan='".$ambil_pdf."' order by id_fisikkekerasan DESC");
$html = '
<img src="./img/kop/kop.jpg" style="padding:0px; margin:0px;"/>
<h2></h2>

 <table border="0" style="width:100%; height:35mm;">
    <tr >
       <td style=""><b><P style="font-size:17px; margin:0px; padding:0px;">PRO JUSTITIA</P></b></td>
       <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
        <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
        <td style=""><p> &nbsp;  &nbsp;</p></td>
        <td style=""><center><p> &nbsp;  &nbsp;</p></center></td>
    </tr>
     <tr >
       <td style=""><b><P style="font-size:17px; margin:0px; padding:0px;">&nbsp; &nbsp;&nbsp;</P></b></td>
       <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
        <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
        <td style=""><p> &nbsp;  &nbsp;</p></td>
        <td style=""><center><p> <P style="font-size:17px; float:right; margin:0px; padding:0px; text-transform: uppercase;">30/VER/RSHMY/'.$rowPDF['no_permintaan'].'/'.date('Y', strtotime($rowPDF['waktu_pemeriksaan'])).'</P></p></center></td>
    </tr>
    <tr >
       <td style=""><em><P style="font-size:17px; margin:0px; padding:0px;">VISUM ET REVERTUM</P></em></td>
       <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
        <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
        <td style=""><p> &nbsp;  &nbsp;</p></td>
        <td style=""><center><p> <P style="font-size:17px; float:right; margin:0px; padding:0px;">&nbsp;  &nbsp;</P></p></center></td>
    </tr>
</table>



<h5></h5>
<p>Yang bertanda tangan dibawah ini, <b>'.$rowPDF['nm_pemeriksa'].'</b> dokter umum pada Rumah Sakit "Hi. MUHAMMAD YUSUF" atas permintaan dari <b style="text-transform: uppercase;">'.$rowPDF['nm_penyidik'].' NIP. '.$rowPDF['nrp_penyidik'].'</b> tertanggal pada '.date('d F Y', strtotime($rowPDF['waktu_pemeriksaan'])).' <b>'.$rowPDF['pangkat_penyidik'].' :</b>  </p>
<h5></h5>
<p class="margin:20px;">Telah memeriksa :</p>
<h5></h5>
<div>
<table>
    <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><p style="font-size:14px;">Nama</p></td> 
     <td>:</td> 
     <td><p style="font-size:14px;">'.$rowkorban['nm_korban'].' '.$status_korban.'</p></td> 
    </tr>
    <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><p style="font-size:14px;">Jenis Kelamin</p></td> 
     <td>:</td> 
     <td><p style="font-size:14px;">'.$jns_klamin.'</p></td> 
    </tr>
    <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><p style="font-size:14px;">Umur</p></td> 
     <td>:</td> 
     <td><p style="font-size:14px;">'.$rowkorban['umur'].' Tahun</p></td> 
    </tr>
    <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><p style="font-size:14px;">Pekerjaan</p></td> 
     <td>:</td> 
     <td><p style="font-size:14px;">'.$rowkorban['nm_pekerjaan'].'</p></td> 
    </tr>
    <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><p style="font-size:14px;">Tempat Tinggal/Kediaman</p></td> 
     <td>:</td> 
     <td><p style="font-size:14px;">'.$rowkorban['alamat'].'</p></td> 
    </tr>
    <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><p style="font-size:14px;">Waktu Pemeriksaan</p></td> 
     <td>:</td> 
     <td><p style="font-size:14px;">'.date('d F Y', strtotime($rowPDF['waktu_pemeriksaan'])).'</p></td> 
    </tr>
 </table>
 <h5></h5>
<p class="margin:20px;">Hasil pemeriksaan dijumpai sebagai berikut : </p>
<h5></h5>
<table border="0">';

while($rowkekerasan=mysqli_fetch_array($queryperjumpaan))
{
$html .= '
 <tr>
     <td style="width:14%;">&nbsp;</td> 
     <td><b style="font-size:13px; padding:0px;">-</b></td> 
     <td><p style="font-size:13px;"><b>'.$rowkekerasan['keterangan'].' </b></p></td> 
    </tr>';
}
$html .= '
 </table>
  <h5></h5>
<p class="margin:20px;">Demikian surat visum ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>
<h5></h5>
<h5></h5>
<h5></h5>
<h5></h5>
<h5></h5>
<h5></h5>
<h5></h5>
<h5></h5>
</div>

 

        
        
        <table border="0" style="width:100%; height:35mm;">
            <tr>
               <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;</b></center></td>
                <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
               
               <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
                <td style=""><p> &nbsp;  &nbsp;</p></td>
              <td style=""><center><p style="font-size:14px;">Kalibalangan, '.date('d F Y', strtotime($rowPDF['waktu_pemeriksaan'])).'</p></center></td>
            </tr>
            <tr>
               <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;</b></center></td>
                <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
               
               <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
                <td style=""><p> &nbsp;  &nbsp;</p></td>
              <td style=""><center><p style="font-size:14px;">Yang Menyatakan</p></center></td>
            </tr>
            <tr >
               <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;</b></center></td>
                <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
               
               <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
                <td style=""><p> &nbsp;  &nbsp;</p></td>
              <td style=""><center><p style="font-size:14px;"><center><p>&nbsp;</p></center></td>
            </tr>
            <tr >
               <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;</b></center></td>
                <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
               
               <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
                <td style=""><p> &nbsp;  &nbsp;</p></td>
              <td style=""><center><p style="font-size:14px;"><center><p>&nbsp;</p></center></td>
            </tr>
            <tr >
               <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;</b></center></td>
                <td style=""><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;</b></center></td>
               
               <td style=""><center><b> &nbsp;  &nbsp;</b></center></td>
                <td style=""><p> &nbsp;  &nbsp;</p></td>
              <td style=""><center><p style="font-size:14px;"><center><p style="text-decoration:underline;"><b>'.$rowPDF['nm_pemeriksa'].'</b></p></center></td>
            </tr>
        </table>
    </div>




';


//==============================================================
//==============================================================
//==============================================================

include("./mpdf/mpdf.php");

//$mpdf=new mPDF(); 

 $mpdf = new mPDF('utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '');

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('./mpdf/mpdfstyleA4.css');
$stylesheet = file_get_contents('./mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

//$mpdf->Output();
$fileName= date('Y', strtotime($rowPDF['waktu_pemeriksaan'])).'-'.$rowPDF['nrp_penyidik'].'-'.$data;
//$mpdf->Output("files/".date('Y', strtotime($rowPDF['waktu_pemeriksaan']))."-".$rowPDF['nrp_penyidik']."-".$data.".pdf" ,'D');

$mpdf->Output(''.$fileName.'.pdf','D');

exit;
//==============================================================
//==============================================================
//==============================================================

?>