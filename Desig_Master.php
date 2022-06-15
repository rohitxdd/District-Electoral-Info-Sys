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
    <h1>Designation Entry form</h1>
    <form action="Desig_Action.php" method = "get">
        <label for="desig_name"> Enter designation </label><br>
        <input type="text" name="designm"><br>
        
        <label for="Remarks"> Remarks </label><br>
        <input type="textarea" name="Remarks">   <br>
        <button type = "submit"> submit </button>
        
     </form>
     
</body>
</html>