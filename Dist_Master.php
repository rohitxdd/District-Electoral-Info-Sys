<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Master Form</title>
    <style>
        form {
            margin-bottom: 10px;
        }

        .heading {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <?php include 'menu.php';
    include 'connection.php'; ?>
    <center>
        <h1 class="heading">District Master Entry form</h1>
    </center>
    <form action="Dist_Action.php" method="post">
        <table align="center">
            <tr>
                <td>Enter District</td>
                <td><input type="text" name="dist"><br><br></td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td><textarea name="Remarks" id="" rows="4"></textarea></td>
            </tr>
            <tr>
                <td align="center"><button type="submit"> submit </button></td>
            </tr>
        </table>
    </form>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM dist_master order by Dist_Name");
    ?>
    <table align="center" border=1>
        <tr>
            <th>S.No.</th>
            <th>District Name</th>
            <th>Remarks</th>
            <th>Update</th>
        </tr>
        <?php
        $i = 1;

        while ($rows = $result->fetch_assoc()) {
        ?>
            <tr>
                <td align="center"><?php echo $i; ?></td>
                <td><?php echo $rows['Dist_Name']; ?></td>
                <td><?php echo $rows['Remarks']; ?></td>
                <td align="center"><a href="Dist_update.php?code=<?php echo $rows['Dist_Code'] ?>"> edit </a></td>
            </tr>
        <?php
            $i++;
        }
        mysqli_close($conn); //Make sure to close out the database connection
        ?>
</body>
</html>