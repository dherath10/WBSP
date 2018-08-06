<?php
class getModel{
	public function getLog($s_id,$conn){

	// prepare sql and bind parameters
    $stmt= $conn->prepare("SELECT * FROM log WHERE s_id=:s_id");     
    $stmt->bindParam(':s_id', $s_id);
    $stmt->execute();
    return $stmt;
	}

	public function getStudent($conn){

    $stmt= $conn->prepare("SELECT * FROM student");     
    $stmt->execute();
    return $stmt;
	}
}




?>