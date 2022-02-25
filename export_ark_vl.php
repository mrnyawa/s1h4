<?php 
error_reporting(1);
include "header.php"; 
include_once "connect.php";
include "function_tanggal.php"; 
include "niceform.php";
$tanggal=date("d-M-Y");
$now = new T10DateCalc($tanggal);
$session_username=$_SESSION['username'];
$session_provinsi=$_SESSION['provinsi'];
$session_kabupaten=$_SESSION['kabupaten'];
$session_upk=$_SESSION['upk'];
include "enkripsi/funct_enkripsi.php";
	$kunciRahasia = "123987654";

	//$post=base64_encode(serialize($_POST)); // tambahin

?>
<form method="POST" name="export_ark_vl" action="export_result_ark_vl.php" target="_blank">
<fieldset><legend>Export Data Viral Load</legend>
<table  align="left">
	<tr align="left">
	<td width="10%">Periode Awal </td>	
		<td width="1%">:</td>
		<td width="10%"><select name="bln1" id="bln1" style="width:80;">
				<option value="01" <?php if($_POST['bln']=="01") echo "selected";?>>Januari</option>
				<option value="02" <?php if($_POST['bln']=="02") echo "selected";?>>Februari</option>
				<option value="03" <?php if($_POST['bln']=="03") echo "selected";?>>Maret</option>
				<option value="04" <?php if($_POST['bln']=="04") echo "selected";?>>April</option>
				<option value="05" <?php if($_POST['bln']=="05") echo "selected";?>>Mei</option>
				<option value="06" <?php if($_POST['bln']=="06") echo "selected";?>>Juni</option>
				<option value="07" <?php if($_POST['bln']=="07") echo "selected";?>>Juli</option>
				<option value="08" <?php if($_POST['bln']=="08") echo "selected";?>>Agustus</option>
				<option value="09" <?php if($_POST['bln']=="09") echo "selected";?>>September</option>
				<option value="10" <?php if($_POST['bln']=="10") echo "selected";?>>Oktober</option>
				<option value="11" <?php if($_POST['bln']=="11") echo "selected";?>>November</option>
				<option value="12" <?php if($_POST['bln']=="12") echo "selected";?>>Desember</option>
			</select>
	  </td>
		<td><select name="thn1" id="thn1" style="width:90;">
			<?php
				for($i=date('Y')-10;$i<=date('Y');$i++){
					?><option value="<?php echo $i;?>" <?php if($_POST['thn']==$i) echo "selected";?>><?php echo $i;?></option>
					<?php } ?>
			</select>
		</td>
	</tr>
	<tr align="left">
	<td width="10%">Periode Akhir </td>	
		<td width="1%">:</td>
		<td width="10%"><select name="bln2" id="bln2" style="width:80;">
				<option value="01" <?php if($_POST['bln']=="01") echo "selected";?>>Januari</option>
				<option value="02" <?php if($_POST['bln']=="02") echo "selected";?>>Februari</option>
				<option value="03" <?php if($_POST['bln']=="03") echo "selected";?>>Maret</option>
				<option value="04" <?php if($_POST['bln']=="04") echo "selected";?>>April</option>
				<option value="05" <?php if($_POST['bln']=="05") echo "selected";?>>Mei</option>
				<option value="06" <?php if($_POST['bln']=="06") echo "selected";?>>Juni</option>
				<option value="07" <?php if($_POST['bln']=="07") echo "selected";?>>Juli</option>
				<option value="08" <?php if($_POST['bln']=="08") echo "selected";?>>Agustus</option>
				<option value="09" <?php if($_POST['bln']=="09") echo "selected";?>>September</option>
				<option value="10" <?php if($_POST['bln']=="10") echo "selected";?>>Oktober</option>
				<option value="11" <?php if($_POST['bln']=="11") echo "selected";?>>November</option>
				<option value="12" <?php if($_POST['bln']=="12") echo "selected";?>>Desember</option>
			</select>
	  </td>
		<td><select name="thn2" id="thn2" style="width:90;">
			<?php
				for($i=date('Y')-10;$i<=date('Y');$i++){
					?><option value="<?php echo $i;?>" <?php if($_POST['thn']==$i) echo "selected";?>><?php echo $i;?></option>
					<?php } ?>
			</select>
		</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td align="left">
			<input type="submit" name="load" value="Export">
			<input type="submit" name="reset" value="Reset">			
		</td>
	</tr>
</table>
</fieldset>
</form>
<?php
include_once "footer.php";
?>