<?php
include('connection.php');
$Dist_Code = $_GET['code']; //fetching the query field passed in url
if ($Dist_Code) {
    $sql = "SELECT * FROM dist_master where Dist_code = $Dist_Code";
    $result = mysqli_query($conn, $sql);
    $rows = $result->fetch_assoc();
}


if (isset($_POST['submit'])) { //on update form submission
    $name = $_POST['distName'];
    $remarks = $_POST['remarks'];
    $Dcode = $_POST['distCode'];

    //update query with where condition
    $sql = "UPDATE dist_master SET Dist_Name = '$name', Remarks = '$remarks' WHERE Dist_Code = $Dcode";
    if (mysqli_query($conn, $sql)) {
        header('Location: Dist_Master.php'); //redirecting back to Dist_Master.php
    } else {
        echo "Error updating record: " . $conn->error;
    }
    // header('Location: Dist_Master.php');
}

if (isset($_POST['delete'])){
    $Dcode = $_POST['distCode'];
    $sql = "DELETE FROM dist_master WHERE Dist_Code = $Dcode";
    if (mysqli_query($conn, $sql)) {
        header('Location: Dist_Master.php'); //redirecting back to Dist_Master.php
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District - Update</title>
</head>

<body>
    <?php include('menu.php'); ?>
    <div style="width:70%; height:50vh; display:flex; justify-content:center; align-items:center">
        <form method="POST" action="Dist_update.php">
            <label for="DistName">District Name</label><br>
            <input type="text" class="" id="DistName" name="distName" value="<?php echo ($rows['Dist_Name']); ?>"><br>
            <label for="remarks">Remarks</label><br>
            <input type="text" class="" id="remarks" name="remarks" value="<?php echo ($rows['Remarks']); ?>"><br><br>
            <input type="hidden" name="distCode" value="<?php echo ($rows['Dist_Code']); ?>">
            <button type="submit" class="btn btn-success btn-sm" name="submit">Update</button>
            <button type="submit" class="btn btn-danger btn-sm" name="delete">delete</button>
        </form>
    </div>
</body>
</html>