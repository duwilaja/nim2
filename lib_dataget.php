<?php
$redirect=false;
include 'inc.common.php';
include 'inc.session.php';
include 'lib_inc.db.php';

$conn = connect();

$q=post('q',$conn);
$id=post('id',$conn,'0');

$sql="";
$code="200";
$ttl="OK";

switch($q){
	case 'ports': $sql="select port_id as v,ifName as t from ports where device_id='$id'"; break;	
}

//echo $sql;
if($sql==""){
	$code="404";
	$ttl="Error";
	$output="Query not found";
}else{
	$result = exec_qry($conn,$sql);
	if(db_error($conn)==''){
		$output = fetch_alla($result);
	}else{
		$output = db_error($conn);
		if($production){$output="System Error. Please contact admin.";}
		$ttl = "Error";
		$code= "505";
	}
}

disconnect($conn);

echo json_encode(array('code'=>$code,'ttl'=>$ttl,'msgs'=>$output));
?>