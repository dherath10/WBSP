<?php
include "../common/dbconfig.php";
include '../model/model.php';
$obm=new getModel();
$r=$obm->getStudent($conn);
$returnData=array();
while($row = $r->fetch(PDO::FETCH_ASSOC)){
	$arr1['s_id']=$row['s_id'];
	$arr1['s_name']=$row['s_name'];
	array_push($returnData, $arr1);
}
/*$returnData = array(array("s_id" => 1,
"s_name" => "Amal" ),array("s_id" => 2,
"s_name" => "Kamal")); */

$xml = new DOMDocument();
$studentInfoElement = $xml->createElement("uni");
foreach ($returnData as $key => $value) {
	$studentElement = $xml->createElement("student");

	foreach ($value as $key1 => $value1) {
		$xmlNode = $xml->createElement($key1,$value1);
		$studentElement->appendChild($xmlNode);
	}
	$studentInfoElement->appendChild($studentElement);
}
	$xml->appendChild($studentInfoElement);
/*$xml = new DOMDocument();
$studebtInfoElement = $xml->createElement("studentInfo");
foreach ($returnData as $key => $value) {
$xmlNode = $xml->createElement($key,$value);
$studebtInfoElement->appendChild($xmlNode);
}
$xml->appendChild($studebtInfoElement);*/
$header = "Content-Type:text/xml";
header($header);
print $xml->saveXML();
$xml->save(time()."_student.xml");


?>