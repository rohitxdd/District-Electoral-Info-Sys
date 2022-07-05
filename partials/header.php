<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Electoral System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2370d802c3.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin-top: 0px;
            background-color: #fff;
            font-family: Arial, sans-serif;
            font-size: 14px;
            letter-spacing: 0.01em;
            color: #39464e;
        }

        .navbar-default {
            background-color: #fff;
            margin-left: 200px;
        }

        /*main side bar*/
        .msb {
            width: 200px; 
            background-color: #f5f7f9;
            position: fixed;
            left: 0;
            top: 0;
            right: auto;
            min-height: 100%;
            overflow-y: auto;
            white-space: nowrap;
            height: 100%;
            z-index: 1;
            border-right: 1px solid #ddd;
        }

        .msb .navbar {
            border: none;
            margin-left: 0;
            background-color: inherit;
        }

        .msb .navbar-header {
            width: 100%;
            border-bottom: 1px solid #e7e7e7;
            margin-bottom: 20px;
            background: #fff;
        }

        .msb .navbar-nav .panel {
            border: 0 none;
            box-shadow: none;
            margin: 0;
            background: inherit;
        }

        .msb .navbar-nav li {
            display: block;
            width: 100%;
        }

        .msb .navbar-nav li a {
            padding: 15px;
            color: #5f5f5f;
        }

        .msb .navbar-nav li a .glyphicon,
        .msb .navbar-nav li a .fa {
            margin-right: 8px;
        }

        .msb .nb {
            padding-top: 5px;
            padding-left: 10px;
            margin-bottom: 30px;
            overflow: hidden;
        }

        ul.nv,
        ul.ns {
            position: relative;
            padding: 0;
            list-style: none;
        }
        .nv li {
            display: block;
            position: relative;
        }

        .nv li::before {
            clear: both;
            content: "";
            display: table;
        }

        .nv li a {
            color: #444;
            padding: 10px 25px;
            display: block;
        }

        .nv li a .ic {
            font-size: 16px;
            margin-right: 5px;
            font-weight: 300;
            display: inline-block;
        }

        .nv .ns li a {
            padding: 10px 50px;
        }

        /*main content wrapper*/
        .mcw {
            margin-left: 200px;
            position: relative;
            min-height: 100%;
            /*content view*/
        }

        /*globals*/
        a,
        a:focus,
        a:hover {
            text-decoration: none;
        }

        .inbox .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .inbox ul,
        .inbox li {
            margin: 0;
            padding: 0;
        }

        .inbox ul li {
            list-style: none;
        }

        .inbox ul li a {
            display: block;
            padding: 10px 20px;
        }
        *, html{
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <?php
    include("connection.php");
    //$con=mysqli_connect("localhost","root","123","exam");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries 

    //   function get_menu_tree($parent_id)
    //   {
    //     global $con;
    //     $menu = "";
    //     $sqlquery = " SELECT * FROM menu where status='1' and parent_id='" . $parent_id . "' ";
    //     $res = mysqli_query($con, $sqlquery);
    //     while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    //       $menu .= "<a class='sub-menu' href='" . $row['link'] . "'>" . $row['menu_name'] . "</a>";

    //       $menu .= "" . get_menu_tree($row['menu_id']) . "";
    //     }

    //     return $menu;
    //   }

    function check_child($id){
        global $conn;
        $sqlChild = "Select * from menu where parent_id =". $id;
        $result = mysqli_query($conn, $sqlChild);
        return $result;
    }




    function menu(){
        global $conn;
        $menuStr = "";
        $sql = "Select * from menu where parent_id = 0";
        $res = mysqli_query($conn, $sql);
        while($row = $res->fetch_assoc()){
            $child = check_child($row['menu_id']);
            if($child->num_rows >0){
                $menuStr .= "<li class='panel panel-default' id='dropdown'><a data-toggle='collapse' href='#dropdown-lvl".$row['menu_id']."'><i class='".$row['icon']."'></i>".$row['menu_name']."<span class='caret'></span></a><!-- Dropdown level 1 --><div id='dropdown-lvl".$row['menu_id']."' class='panel-collapse collapse'><div class='panel-body'><ul class='nav navbar-nav'>";
                while($childRow = $child->fetch_assoc()){
                    // var_dump($child);
                    $menuStr .= "<li><a href='".$childRow['link']."'>". $childRow['menu_name']."</a></li>";
                }
                $menuStr .= "</ul></div></div></li>";
            }else{
                $menuStr.= "<li><a href='".$row['link']."'><i class='". $row['icon']."'></i>". $row['menu_name']."</a></li>";
            }
        }
        return $menuStr;
    }
    ?>


    <!--msb: main sidebar-->
    <div class="msb" id="msb">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Brand -->
                    <div class="brand-name-wrapper">
                        <h3>MENU</h3>
                    </div>
                </div>
            </div>



            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    <?php echo menu();?>
<!-- 
                    <li><a href="./menu.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-puzzle-piece"></i> Components</a></li>
                    <li><a href="#"><i class="fa fa-heart"></i> Extras</a></li>


                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1">
                            <i class="fa fa-diamond"></i> Apps
                            <span class="caret"></span>
                        </a>

                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Mail</a></li>
                                    <li><a href="#">Calendar</a></li>
                                    <li><a href="#">Ecommerce</a></li>
                                    <li><a href="#">User</a></li>
                                    <li><a href="#">Social</a></li>
                                </ul>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
    <!--main content wrapper-->
    <div class="mcw">
        <!--navigation here-->
        <!--main content view-->
        <div class="cv">
            <h1 style="text-align: center;">DELHI ELECTORAL INFORMATION SYSYTEM</h1>
            <hr>
        
