<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("student.xml");
//print $xmlDoc->saveXML();
$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item) {
  print $item->nodeName . " = " . $item->nodeValue . "<br>";
}
echo "<hr />";
$xml=simplexml_load_file("student.xml");
echo $xml->student[0]->s_name;
echo "<br />";
echo $xml->student[1]['s_id'];


?>