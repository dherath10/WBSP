<?php
include '../model/model.php';
$obm=new getModel();
include "../common/dbconfig.php";
class getController{
	public function requestLog($s_id,$obm,$conn){			
			$r=$obm->getLog($s_id,$conn);
			return $r;

	}
}
$obc=new getController();
$result=$obc->requestLog($_REQUEST['s_id'],$obm,$conn);
$arr1=array();
$arr2=array();

while($row=$result->fetch(PDO::FETCH_BOTH)){
	array_push($arr1,$row['log_id']);
	array_push($arr2,$row['log_in']);
}

$s1=implode(",", $arr1);
$s2=implode(",", $arr2);
header("Location:../view/viewlog.php?s1=$s1&s2=$s2");

?>