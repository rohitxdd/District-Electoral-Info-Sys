<!DOCTYPE html>
<html lang="en">
<head>
    <?php

 include 'connection.php';
 include 'menu.php';
 include 'database.php';

 ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Master Form</title>
    <style>
        /* table, tr, td{
            border: 1px solid black;
        } */

        .heading{
            font-size:2rem;
        }
    </style>
</head>
<body>
    <center><h1 class="heading">Department Entry form</h1></center>
    
    <form action="Dept_Action.php" method = "get">
    <table align="center">
             <tr>
                 <td>Enter Department Name</td>
                 <td><input type="text" name="deptname"><br></td>

             </tr>
          
             <tr>
                
                 <td>Remarks</td><td><textarea name="Remarks" id=""  rows="4"></textarea></td>
             </tr>
             <tr><td align="center"><button type = "submit"> submit </button></td></tr>
     </table>

     </form>
     <br>
     </br>
     <?php
     $conn = mysqli_connect("localhost", "root", "", "election") or die("Connection Error: " . mysqli_error($conn));
     $result = mysqli_query($conn, "SELECT * FROM dept_master order by Dept_Name");
    ?>
    <table align="center" border=1>
        <tr>
            <th>S.No.</th>
            <th>Department Name</th>
            
            <th>Remarks</th>
            <th>Update</th>
        </tr>
    <?php
    $i = 1;

    while($rows = $result->fetch_assoc())
    { 
    ?>  
        <tr>
        <td align="center"><?php echo $i;?></td>

            <td><?php echo $rows['Dept_Name'];?></td>
            <td><?php echo $rows['Remarks'];?></td>
            <td align="center"><a href="<?php echo $rows['Dept_Code']?>"> edit </a></td>
        </tr>
    <?php
    $i++;
    }
    mysqli_close($conn); //Make sure to close out the database connection
    ?>
     
     
</body>
</html>