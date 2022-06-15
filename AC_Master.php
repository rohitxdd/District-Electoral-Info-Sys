<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designation Master Form</title>
</head>
<body>

<?php  include 'menu.php'; ?>
    <h1>Assembly Constituency Entry form</h1>
    <form action="AC_Action.php" method = "get">
        <table>
            <tr><td> Select District Name </td>
        <?php
$conn = mysqli_connect("localhost", "root", "", "election") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM dist_master order by Dist_Name");
?>
<td>
<select name="dist">
<?php
$i=0;
while($row = mysqli_fetch_array($result)){
?>
<option value="<?=$row["Dist_Code"];?>"><?=$row["Dist_Name"];?></option>
<?php
$i++;
}
?>
</select>
</td>

<?php
mysqli_close($conn);
?>

<tr><td>Enter AC Name</td><td> <input type="text" name="ac"><br>
<tr><td>Enter Remarks</td><td> <input type="text" name="remarks"><br>

</tr>
<tr><td></td><td><button type = "submit"> submit </button></td></tr>


     </form>
     
</body>
</html>