
<html>
<head>
<meta charset="utf-8">
<title>create dynamic multilevel menu using php and mysql</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<style>
  aside{
    float: left;
    height: 100%;
    border: 1px solid grey;
    border-top: none;
    border-left: none;
    border-bottom: none;
    padding-right: 10px;
    margin-top: 0;
  }


  .sep{
    margin-bottom: 0;
  }
  
  .navbar-nav{
    color:navy; 
  }

  .nav-item{
    color:navy;
  }

  a{
    color:navy;
  }


</style>
</head>
 
<body>
<?php
include 'database.php';
//$con=mysqli_connect("localhost","root","123","exam");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// Perform queries 
 
function get_menu_tree($parent_id) 
{
	global $con;
	$menu = "";
	$sqlquery = " SELECT * FROM menu where status='1' and parent_id='" .$parent_id . "' ";
	$res=mysqli_query($con,$sqlquery);
    while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) 
	{
      $menu .="<li class = 'nav-item'><a href='".$row['link']."'>".$row['menu_name']."</a>";
		   
		  $menu .= "<ul class='navbar-nav'>".get_menu_tree($row['menu_id'])."</ul>"; //call  recursively
		   
 		  $menu .= "</li>";
 
    }
    
    return $menu;
} 
?>
<h1 align="center"><b><font color = "navy">Welcome To Delhi Electoral Infomartion System</font></align><b><b></h1><hr class="sep">
                        
<aside>
<ul class="main-navigation">
 
<?php echo get_menu_tree(0);//start from root menus having parent id 0 ?>
</ul> 
</aside>

   
</body>
</html>
<?php mysqli_close($con); ?>
