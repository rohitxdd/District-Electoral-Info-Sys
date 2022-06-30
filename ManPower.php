<?php
include('connection.php');
include('database.php');
include('menu.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electoral-Manpower</title>
</head>
<body>
    <div class="container" style="height:100vh; overflow:auto; width:70%; margin:auto" >
        <table align="center" class="table table-striped table-bordered">
            <tr>
                <th>Name</th>
                <th>FName</th>
                <th>rAddress</th>
                <th>HomeCons</th>
                <th>cons</th>
                <th>PayScaleCode</th>
                <th>basicPay</th>
                <th>office</th>
                <th>category</th>
                <th>Designation</th>
                <th>sex</th>
                <th>StateCentre</th>
                <th>deptCode</th>
            </tr>
            <?php
                $sql = "SELECT `Name`, `FName`, `rAddress`, `HomeCons`, `cons`, `PayScaleCode`, `basicPay`, `office`, `category`, a.Desigcode,`sex`,`StateCentre`, a.deptcode, b.AC_NAME, c.deptname, d.Designation FROM polling_data a , cons_list b , deptmaster c, designation d where a.HomeCons = b.AC_NO and a.deptcode = c.deptcode and a.Desigcode = d.DesigCode LIMIT 100;";
                $result = mysqli_query($conn, $sql);
                while($rows = $result->fetch_assoc())
                {
                ?>
                
                <tr>
                    <td><?php echo $rows['Name']; ?></td>
                    <td><?php echo $rows['FName']; ?></td>
                    <td><?php echo $rows['rAddress']; ?></td>
                    <td><?php echo $rows['AC_NAME']; ?></td>
                    <td><?php echo $rows['cons']; ?></td>
                    <td><?php echo $rows['PayScaleCode']; ?></td>
                    <td><?php echo $rows['basicPay']; ?></td>
                    <td><?php echo $rows['office']; ?></td>
                    <td><?php echo $rows['category']; ?></td>
                    <td><?php echo $rows['Designation']; ?></td>
                    <td><?php echo $rows['sex']; ?></td>
                    <td><?php echo $rows['StateCentre']; ?></td>
                    <td><?php echo $rows['deptname']; ?></td>
                </tr>

                <?php
                }
                ?>
        </table>
    </div> 
</body>
</html>
