<?php

class dbconnection{

public function getConnection(){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$myDB="uni";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
	    return $conn;  
	    
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	}
}

$obdb=new dbconnection();
$conn=$obdb->getConnection();

?>