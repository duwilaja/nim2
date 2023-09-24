<?php
$redirect=false;
$cleartext=true;

include "inc.common.php";
include "inc.session.php";
include "lib_inc.db.php";

$conn=connect();

$host=post('h',$conn,"");
$device=post('d',$conn,0);
$port=post('p',$conn,0);

$lastday=strtotime("-1 day");
$lastweek=strtotime("-1 week");
$lastmonth=strtotime("-1 month");
$lastyear=strtotime("-1 year");
$dt=strtotime("now");

$dfdt=($df!=''&&$dt!='')?"from=".strtotime("$df 00:00:00")."&to=".strtotime("$dt 23:59:59"):"";

$sql="select ifName,ifDescr from ports where device_id=$device and port_id=$port";
$rs=exec_qry($conn,$sql);
$ports=fetch_alla($rs);

disconnect($conn);

if(count($ports)>0){
	$endpoint="devices/".$host."/ports/";
?>
<center><h5><?php echo $host?> - <?php echo $ports[0]["ifDescr"]; ?></h5></center>
<div class="row">
	<?php
	for($i=0;$i<count($ports);$i++){
		$port=$ports[$i];
		$name=$port['ifName'];
		$desc=$port['ifDescr'];
		//$isdescr=$name==""?"?ifDescr=true":"";
		//$isdescrimg=$name==""?"?ifDescr=true&$dfdt":"?$dfdt";
		$name=$name==""?$desc:$name;
		//$lnk=urlencode(base64_encode($endpoint.urlencode($name).'/port_bits'.$isdescr));
		//$lnkimg=urlencode(base64_encode($endpoint.urlencode($name).'/port_bits'.$isdescrimg));
		//echo base64_decode($lnk);
		
		$dfdt="from=$lastday&to=$dt";
		$isdescrimg=$name==""?"?ifDescr=true&$dfdt":"?$dfdt";
		$lnkimg=urlencode(base64_encode($endpoint.urlencode($name).'/port_bits'.$isdescrimg));
	?>
		<div class="col-lg-6 text-center center">
			<?php echo "Last 1 Day" ?>
			<br />
			<img style="background:white;" width="100%" src="lib_api<?php echo $ext?>?lnk=<?php echo $lnkimg?>" />
		</div>
	<?php
		$dfdt="from=$lastweek&to=$dt";
		$isdescrimg=$name==""?"?ifDescr=true&$dfdt":"?$dfdt";
		$lnkimg=urlencode(base64_encode($endpoint.urlencode($name).'/port_bits'.$isdescrimg));
	?>
		<div class="col-lg-6 text-center center">
			<?php echo "Last 1 Week" ?>
			<br />
			<img style="background:white;" width="100%" src="lib_api<?php echo $ext?>?lnk=<?php echo $lnkimg?>" />
		</div>
	<?php
		$dfdt="from=$lastmonth&to=$dt";
		$isdescrimg=$name==""?"?ifDescr=true&$dfdt":"?$dfdt";
		$lnkimg=urlencode(base64_encode($endpoint.urlencode($name).'/port_bits'.$isdescrimg));
	?>
		<div class="col-lg-6 text-center center">
			<?php echo "Last 1 Month" ?>
			<br />
			<img style="background:white;" width="100%" src="lib_api<?php echo $ext?>?lnk=<?php echo $lnkimg?>" />
		</div>
	<?php
		$dfdt="from=$lastyear&to=$dt";
		$isdescrimg=$name==""?"?ifDescr=true&$dfdt":"?$dfdt";
		$lnkimg=urlencode(base64_encode($endpoint.urlencode($name).'/port_bits'.$isdescrimg));
	?>
		<div class="col-lg-6 text-center center">
			<?php echo "Last 1 Year" ?>
			<br />
			<img style="background:white;" width="100%" src="lib_api<?php echo $ext?>?lnk=<?php echo $lnkimg?>" />
		</div>
		
	<?php
	}
	?>
</div>
<br />
<div class="row"><div class="col-lg-12 text-center">
	<h3>Year : 2022</h3>
	<table width="100%" border="1">
	<tr style="font-weight:bold;"><td></td>
	<td>Jan (1)</td><td>Feb (2)</td><td>Mar (3)</td><td style="background-color:#eeeeee;">Quarter 1</td>
	<td>Apr (4)</td><td>May (5)</td><td>Jun (6)</td><td style="background-color:#eeeeee;">Quarter 2</td>
	<td>Jul (7)</td><td>Aug (8)</td><td>Sep (9)</td><td style="background-color:#eeeeee;">Quarter 3</td>
	<td>Oct (10)</td><td>Nov (11)</td><td>Dec (12)</td><td style="background-color:#eeeeee;">Quarter 4</td>
	<td style="background-color:#cccccc;">Year</td></tr>
	<tr><td style="font-weight:bold;">In</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td style="background-color:#cccccc;">0</td></tr>
	<tr><td style="font-weight:bold;">Out</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td style="background-color:#cccccc;">0</td></tr>
	<tr><td style="font-weight:bold;">Sum</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td style="background-color:#cccccc;">0</td></tr>
	</table>
	<br />
	<h3>Year : 2021</h3>
	<table width="100%" border="1">
	<tr style="font-weight:bold;"><td></td>
	<td>Jan (1)</td><td>Feb (2)</td><td>Mar (3)</td><td style="background-color:#eeeeee;">Quarter 1</td>
	<td>Apr (4)</td><td>May (5)</td><td>Jun (6)</td><td style="background-color:#eeeeee;">Quarter 2</td>
	<td>Jul (7)</td><td>Aug (8)</td><td>Sep (9)</td><td style="background-color:#eeeeee;">Quarter 3</td>
	<td>Oct (10)</td><td>Nov (11)</td><td>Dec (12)</td><td style="background-color:#eeeeee;">Quarter 4</td>
	<td style="background-color:#cccccc;">Year</td></tr>
	<tr><td style="font-weight:bold;">In</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td style="background-color:#cccccc;">0</td></tr>
	<tr><td style="font-weight:bold;">Out</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td style="background-color:#cccccc;">0</td></tr>
	<tr><td style="font-weight:bold;">Sum</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td>0</td><td>0</td><td>0</td><td style="background-color:#eeeeee;">0</td>
	<td style="background-color:#cccccc;">0</td></tr>
	</table>
</div></div>
<?php
}else{
	echo "No Interface found.";
}
?>
