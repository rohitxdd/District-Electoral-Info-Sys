

<?php
include("connection.php");
include("database.php");
include("menu.php");







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container" class="d-flex justify-content-center">
        <form action="multiQueryReport.php" style="width:50%; margin:5rem auto" method="POST">
            <table class="table-striped">
                <tr>
                    <td>Name</td>
                    <td><input class="form-control" type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td>
                        <select class="form-select" name="desig" id="">
                            <option value="" selected>Click to open</option>
                            <?php
                            $sql = "SELECT DesigCode, Designation FROM designation";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $rows['DesigCode']; ?>">
                                    <?php echo $rows['Designation']; ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>
                        <select class="form-select" name="depart" id="">
                            <option value="" selected>Click to open</option>
                            <?php
                            $sql1 = "SELECT deptcode, deptname FROM deptmaster";
                            $result = mysqli_query($conn, $sql1);
                            while ($rows = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $rows['deptcode']; ?>">
                                    <?php echo $rows['deptname']; ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>
                        <select class="form-select" name="class" id="">
                            <option value="" selected>Click to open</option>
                            <?php
                            $sql2 = "SELECT class, `description` FROM class";
                            $result = mysqli_query($conn, $sql2);
                            while ($rows = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $rows['class']; ?>">
                                    <?php echo $rows['description']; ?>
                                </option>
                            <?php
                            } ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary" name="submit" type="submit">Filter</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="container-fluid" style="height:100vh; overflow:auto; width:70%; margin:auto" >
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
            if(isset($_POST['submit'])){
                $conditions='';
                if(isset($_POST['name']) && $_POST['name']!=''){
                    $name = $_POST['name'];
                    $conditions.= " AND a.name LIKE "."'%".$name."%'";
                }
                if(isset($_POST['desig']) && $_POST['desig']!=''){
                    $desig = $_POST['desig'];
                    $conditions.= " AND  d.DesigCode = "."'".$_POST['desig']."'";
                }
                if(isset($_POST['depart']) && $_POST['depart']!=''){
                    $desig = $_POST['depart'];
                    $conditions.= " AND  c.deptcode = "."'".$_POST['desig']."'";
                }
                if(isset($_POST['class']) && $_POST['class']!=''){
                    $desig = $_POST['class'];
                    $conditions.= " AND  a.class = "."'".$_POST['class']."'";
                }
                $sqlMain = "SELECT `Name`, `FName`, `rAddress`, `HomeCons`, `cons`, `PayScaleCode`, `basicPay`, `office`, `category`, a.Desigcode,`sex`,`StateCentre`, a.deptcode, b.AC_NAME, c.deptname, d.Designation FROM polling_data a , cons_list b , deptmaster c, designation d where a.HomeCons = b.AC_NO and a.deptcode = c.deptcode and a.Desigcode = d.DesigCode". $conditions . "LIMIT 100";
            
                $result1 = mysqli_query($conn,$sqlMain);
                if ($result1->num_rows >0){
                    while($rows1 = $result1->fetch_assoc())
                    {
                    ?>
                
                <tr>
                    <td><?php echo $rows1['Name']; ?></td>
                    <td><?php echo $rows1['FName']; ?></td>
                    <td><?php echo $rows1['rAddress']; ?></td>
                    <td><?php echo $rows1['AC_NAME']; ?></td>
                    <td><?php echo $rows1['cons']; ?></td>
                    <td><?php echo $rows1['PayScaleCode']; ?></td>
                    <td><?php echo $rows1['basicPay']; ?></td>
                    <td><?php echo $rows1['office']; ?></td>
                    <td><?php echo $rows1['category']; ?></td>
                    <td><?php echo $rows1['Designation']; ?></td>
                    <td><?php echo $rows1['sex']; ?></td>
                    <td><?php echo $rows1['StateCentre']; ?></td>
                    <td><?php echo $rows1['deptname']; ?></td>
                </tr>

                <?php
                };
                ?>

                <?php
                };
                ?>
                <?php
                };
                ?>

        </table>
    </div> 





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>