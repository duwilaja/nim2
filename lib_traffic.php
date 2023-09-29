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
	
$yr=date("Y")-1;
?>
</div>
<br />
<div class="row"><div class="col-lg-12 text-center">
<?php for($y=$yr;$y>($yr-2);$y--){
	$ain=array();
	$aout=array();
	?>
	<h3>Year : <?php echo $y?></h3>
	<table width="100%" border="1" style="font-size:12px;">
	<tr style="font-weight:bold;"><td></td>
	<?php $q=1; for($i=1;$i<13;$i++){
		echo '<td>'.date("M",mktime(0, 0, 0, $i, 10)).'('.$i.')</td>';
		if(($i%3)==0) {echo '<td style="background-color:#eeeeee;">Quarter '.$q.'</td>'; $q++;}
	 }?>
	<td style="background-color:#cccccc;">Year</td></tr>
	<tr><td style="font-weight:bold;">In</td>
	<?php $q=1; $tq=0; $ty=0; for($i=1;$i<13;$i++){
		$in=rand(1000,10000);
		$ain[]=$in; $tq+=$in; $ty+=$in;
		echo '<td id="in_'.$y.'_'.$i.'">'.round($in/1000,2).'Gb</td>';
		if(($i%3)==0) {echo '<td id="in_'.$y.'_q_'.$q.'" style="background-color:#eeeeee;">'.round($tq/1000,2).'Gb</td>'; $q++; $tq=0;}
	 }?>
	<td id="tot_in_<?php echo $y?>" style="background-color:#cccccc;"><?php echo round($ty/1000,2)?>Gb</td></tr>
	<tr><td style="font-weight:bold;">Out</td>
	<?php $q=1; $tq=0; $ty=0; for($i=1;$i<13;$i++){
		$out=rand(1000,10000);
		$aout[]=$out; $tq+=$out; $ty+=$out;
		echo '<td id="out_'.$y.'_'.$i.'">'.round($out/1000,2).'Gb</td>';
		if(($i%3)==0) {echo '<td id="out_'.$y.'_q_'.$q.'" style="background-color:#eeeeee;">'.round($tq/1000,2).'</td>'; $q++; $tq=0;}
	 }?>
	<td id="tot_out_<?php echo $y?>" style="background-color:#cccccc;"><?php echo round($ty/1000,2)?>Gb</td></tr>
	<tr><td style="font-weight:bold;">Sum</td>
	<?php $q=1; $s=0; $sq=0; $sy=0; for($i=1;$i<13;$i++){
		$s=$ain[$i-1]+$aout[$i-1]; $sq+=$s; $sy+=$s;
		
		echo '<td id="sum_'.$y.'_'.$i.'">'.round($s/1000,2).'Gb</td>';
		if(($i%3)==0) {echo '<td id="sum_'.$y.'_q_'.$q.'" style="background-color:#eeeeee;">'.round($sq/1000,2).'Gb</td>'; $q++; $sq=0;}
	 }?>
	<td id="tot_sum_<?php echo $y?>" style="background-color:#cccccc;"><?php echo round($sy/1000,2)?>Gb</td></tr>
	</table>
	<br />
<?php } //end year?>
</div></div>
<?php
}else{
	echo "No Interface found.";
}
?>
