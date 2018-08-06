<?php
$host="localhost"; $user="root";$pass=""; $name="uni";
//connect
$link = mysqli_connect($host,$user,$pass,$name);


//get all the tables
$query = 'SHOW TABLES FROM '.$name;
$result = mysqli_query($link,$query) or die('cannot show tables');
if(mysqli_num_rows($result))
{
	//prep output
	$tab = "\t";
	$br = "\n";
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
	$xml.= '<database name="'.$name.'">'.$br;
	
	//for every table...
	while($table = mysqli_fetch_row($result))
	{
		//prep table out
		$xml.= $tab.'<table name="'.$table[0].'">'.$br;
		
		//get the rows
		$query3 = 'SELECT * FROM '.$table[0];
		$records = mysqli_query($link,$query3) or die('cannot select from table: '.$table[0]);
		
		//table attributes
		$attributes = array('name','blob','maxlength','multiple_key','not_null','numeric','primary_key','table','type','default','unique_key','unsigned','zerofill');
		
		
		//stick the records
		$xml.= $tab.$tab.'<records>'.$br;
		while($record = mysqli_fetch_assoc($records))
		{
			$xml.= $tab.$tab.$tab.'<record>'.$br;
			foreach($record as $key=>$value)
			{
				$xml.= $tab.$tab.$tab.$tab.'<'.$key.'>'.htmlspecialchars(stripslashes($value)).'</'.$key.'>'.$br;
			}
			$xml.= $tab.$tab.$tab.'</record>'.$br;
		}
		$xml.= $tab.$tab.'</records>'.$br;
		$xml.= $tab.'</table>'.$br;
	}
	$xml.= '</database>';
	
	//save file
	$handle = fopen($name.'-backup-'.time().'.xml','w+');
	fwrite($handle,$xml);
	fclose($handle);

	if($handle){
		echo "A backup has neen created...";

	}
}
?>
<hr />
<a href="getInfo.php">Back</a>
