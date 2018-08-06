<?php
$s_id=$_REQUEST['s_id'];
include "../common/dbconfig.php";
include '../model/model.php';
$obm=new getModel();
$r=$obm->getLog($s_id,$conn);

$xml = new SimpleXMLElement('<log/>');
while($row = $r->fetch(PDO::FETCH_ASSOC)){
    $logd = $xml->addChild('logdetails'); 
    foreach ($row as $key => $value) {
    $logd->addChild($key, $value);
    }
}

$header = "Content-Type:text/xml";
header($header);
print $xml->asXML();

?>