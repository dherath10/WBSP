<?php
include "../common/dbconfig.php";
include '../model/model.php';
$obm=new getModel();
$r=$obm->getStudent($conn);

$xml = new SimpleXMLElement('<uni/>');
while($row = $r->fetch(PDO::FETCH_ASSOC)){
    $logd = $xml->addChild('student'); 
    foreach ($row as $key => $value) {
    $logd->addChild($key, $value);
    }
}
$header = "Content-Type:text/xml";
header($header);
print $xml->asXML();

?>