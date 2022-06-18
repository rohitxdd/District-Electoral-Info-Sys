<?php
include 'connection.php';
$dist_name = $_POST['dist'];
$Remarks = $_POST['Remarks'];

$sql = "INSERT INTO dist_master (Dist_Name, Remarks ) VALUES ('$dist_name', '$Remarks')";

if ($conn -> query($sql) === TRUE){
    header('Location: Dist_Master.php');
}
else{
    echo "Error: ".$sql. "<br>" . $conn -> error;
}
?>


