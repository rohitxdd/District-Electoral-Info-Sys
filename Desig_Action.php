


<?php

include 'connection.php';
$desig_name=$_GET['designm'];
$Remarks = $_GET['Remarks'];
//echo $deptname;

$sql = "INSERT INTO desig_master (Desig_Name, Remarks ) VALUES ('$desig_name', '$Remarks')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}





$con=mysqli_connect("localhost","root","","election");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM desig_master order by Desig_Name");
echo "<table border='1' align = 'center',style = 'width :100%', bordercolor = 'blue'>
<tr>
<th>Designation Code </th>
<th>Designation Name </th>
<th>Remarks</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Desig_Code'] . "</td>";
echo "<td>" . $row['Desig_Name'] . "</td>";
echo "<td>" . $row['Remarks'] . "</td>";
echo "</tr>"; 


}

echo "</table>";

mysqli_close($con);
?>


