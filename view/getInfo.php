<!DOCTYPE html>
<html>
<head>
	<title>Get Student Information</title>
</head>
<body>
	<form action="../controller/controller.php?action=1" method="post">
	<h2>Get Student Log Information (OOP+MVC+DBconnection)</h2>
	<h3>Student ID : <input type="text" name="s_id" required> &nbsp; <input type="submit" name="sub" value="Submit"></h3>
	</form>

	<form action="viewlogjson.php" method="post">
	<h2>Get Student Log Information (JSON)</h2>
	<h3>Student ID : <input type="text" name="s_id" required> &nbsp; <input type="submit" name="sub" value="Submit"></h3>
	</form>

	<form action="viewlogxml.php" method="post">
	<h2>Get Student Log Information (XML)</h2>
	<h3>Student ID : <input type="text" name="s_id" required> &nbsp; <input type="submit" name="sub" value="Submit"></h3>
	</form>
	<p><a href="viewstudents.php">View All Student</a></p>
	<p><a href="createstudentsxml.php">Create Student XML</a></p>

	<p><a href="readingxml.php">Reading Student XML</a></p>

	<p><a href="backstudentxml.php">Backup Student XML</a></p>
	<p>Backup XML
		<?php
$dir    = './';
$files1 = scandir($dir);
$arr1=array();
foreach ($files1 as $key => $value) {
	$arr=explode(".", $value);
	if(strtolower($arr[count($arr)-1])=="xml"){
		//echo $value;
		array_push($arr1, $value);
	}
}
//print_r($arr1);
		?>
		<form action="viewxml.php" method="post">
<select name="xml" required="">
<option value="">Select a XML File</option>
<?php 
foreach ($arr1 as $key1 => $value1) {
	?>
<option value="<?php echo $value1; ?>">
<?php echo $value1; ?>
</option>
<?php	
}

?>
</select>
<input type="submit" value="View">
</form>
	</p>


</body>
</html>