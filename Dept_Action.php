<?php

 include 'connection.php';
$deptname=$_GET['deptname'];
$Remarks = $_GET['Remarks'];
//echo $deptname;

$sql = "INSERT INTO dept_master (Dept_Name, Remarks ) VALUES ('$deptname', '$Remarks')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}









$conn->close();

 ?>