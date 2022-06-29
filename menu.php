<html>

<head>
  <meta charset="utf-8">
  <title>create dynamic multilevel menu using php and mysql</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }


    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 1rem;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>
</head>

<body>
  <?php
  include 'database.php';
  //$con=mysqli_connect("localhost","root","123","exam");
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  // Perform queries 

  function get_menu_tree($parent_id)
  {
    global $con;
    $menu = "";
    $sqlquery = " SELECT * FROM menu where status='1' and parent_id='" . $parent_id . "' ";
    $res = mysqli_query($con, $sqlquery);
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
      $menu .= "<a class='sub-menu' href='" . $row['link'] . "'>" . $row['menu_name'] . "</a>";

      $menu .= "" . get_menu_tree($row['menu_id']) . "";
    }

    return $menu;
  }
  ?>

  <nav class="navbar navbar-dark bg-dark" style="padding:16px 16px">
    <span style="font-size:30px;cursor:pointer; color:#cbcbcb" onclick="openNav()">&#9776; MENU</span>
    <h1 style="margin:auto; color:white">
      Welcome To Delhi Electoral Infomartion System
    </h1>
  </nav>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <?php
    echo get_menu_tree(0); //start from root menus having parent id 0 
    ?>
  </div>


  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>

</body>

</html>
<?php mysqli_close($con); ?>