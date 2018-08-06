<?php
$header = "Content-Type: application/json";
header($header);
$s_id=$_REQUEST['s_id'];
include "../common/dbconfig.php";
include '../model/model.php';
$obm=new getModel();
$r=$obm->getLog($s_id,$conn);
$data=array();
while($row=$r->fetch(PDO::FETCH_BOTH)){
	array_push($data, $row['log_id'],$row['log_in']);
}
if(!count($data)){
	$data=array("error"=>"No records");
}
print json_encode($data);

?>