<?php
$s1=$_GET['s1'];
$s2=$_GET['s2'];

$arr1=explode(",", $s1);
$arr2=explode(",", $s2);

?>
<!DOCTYPE html>
<html>
<head>
<title>View Student Log Information</title>
</head>
<body>
<?php if($s1!=""){ ?>	
<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>Log ID</th>
		<th>Log In</th>
	</tr>
<?php foreach($arr1 as $k=>$v) { ?>
	<tr>
		<td><?php echo $v; ?></td>
		<td><?php echo $arr2[$k]; ?></td>
	</tr>
<?php } ?>
</table><?php } else{ 
echo "No Records";

} ?>
</body>
</html>