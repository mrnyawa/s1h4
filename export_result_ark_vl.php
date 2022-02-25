<?php
session_start();
// error_reporting(0);
$session_username=$_SESSION['username'];
$session_provinsi=$_SESSION['provinsi'];
$session_kabupaten=$_SESSION['kabupaten'];
$session_upk=$_SESSION['upk'];
// $session_upk='3171795';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ARK-Data-VL-'.gmdate('d-M-Y H-i-s').'.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header ('Cache-Control: cache, must-revalidate');
header ('Pragma: public');
include_once "connect.php";
include "niceform.php";
include_once ("function.php");
// $tanggal=date("d-M-Y");
$bulan1 = $_POST['bln1'];
$tahun1 = $_POST['thn1'];
$bulan2 = $_POST['bln2'];
$tahun2 = $_POST['thn2'];

// Fungsi konversi tanggal
function ubah_tanggal($excell_date, $format_date = 'Y-m-d')
{
  // $base_day dikurangkan 1 untuk mendapatkan timestamp yang tepat
    $base_timestamp = mktime(0, 0, 0, 1, $excell_date-1, 1900);
  // mengubah format
    return date($format_date, $base_timestamp);
}
$thn_1=date("Y-m",mktime(0,0,0,$bulan1-1,1,$tahun1));
$thn_2=date("Y-m",mktime(0,0,0,$bulan2,1,$tahun2));
$thn1=$thn_1.'-26';
$thn2=$thn_2.'-25';
// echo $thn1." - ".$thn2;
$sqlvl="SELECT * FROM ark_viral_load WHERE kode_UPK='$session_upk'  ORDER BY tgl_tes_VL ASC";
$sql_VL = mysql_query($sqlvl) or die("get Call your developer, querys error");
?>
<table width="100%" border="1">
  <tbody>
    <tr>
      <td scope="col">provinsi</td>
      <td scope="col">kabkota</td>
      <td scope="col">layanan</td>
      <td scope="col">kode_UPK</td>
      <td scope="col">no_reg_nas/no_rm</td>
      <td scope="col">nama</td>
      <td scope="col">jenis_kelamin</td>
      <td scope="col">tanggal_lahir</td>
      <td scope="col">tgl_mulai_art</td>
      <td scope="col">tgl_tes_VL</td>
      <td scope="col">kesimpulan_tes_VL</td>
      <td scope="col">hasil_tes_VL&nbsp;</td>
      <td scope="col">tes_bulan_ke&nbsp;</td>
      <td scope="col">periode_tes&nbsp;</td>
    </tr>
<?php
  while( $row=mysql_fetch_array($sql_VL) ) { 
    if(ubah_tanggal($row['tgl_tes_VL']) >=$thn1 AND ubah_tanggal($row['tgl_tes_VL'])<=$thn2){
?>
    <tr>
      <td><?php echo $row['provinsi'];?></td>
      <td><?php echo $row['kabkota'];?></td>
      <td><?php echo $row['layanan'];?></td>
      <td><?php echo $row['kode_UPK'];?></td>
      <td><?php echo $row['no_reg_nas/no_rm'];?></td>
      <td><?php echo $row['nama'];?></td>
      <td><?php echo $row['jenis_kelamin'];?></td>
      <td><?php echo $row['tanggal_lahir'];?></td>
      <td><?php echo $row['tgl_mulai_art'];?></td>
      <td><?php echo $row['tgl_tes_VL'];?></td>
      <td><?php echo $row['kesimpulan_tes_VL'];?></td>
      <td><?php echo $row['hasil_tes_VL'];?></td>
      <td><?php echo $row['tes_bulan_ke'];?></td>
      <td><?php echo $row['periode_tes'];?></td>
    </tr>
<?php
}else {}
}
?>
  </tbody>
</table>