<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<?php   
  //including the database connection file   
  include_once("config.php");   
  //fetching data in descending order (lastest entry first)   
  //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated   
  $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead   
  ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKK Sandly Group</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
 <!-- jQuery library -->  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
 <!-- Latest compiled JavaScript -->  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="style.css">

    <style type = "text/css">
        @font-face{
         font-family: 'Mitr';
            src: url(https://fonts.google.com/specimen/Mitr?query=Mitr\Mitr-Medium.ttf)format(truetype);
        }
    </style>

</head>
<body>
    
    <div class="homeheader">
        <h4>KKK Sandly Group</h4>
 
    </div>

    <div class="homeheader2">
    
        <h10>ยินดีต้อนรับ</h10>
    </div>
    <div class="homecontent">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
            
        <h3><a href="add.html" class="btn btn-success">Create New Member Here!!</a></h3>   
    <table class="table table-hover">   
    <tr bgcolor='#CCCCCC'>   
       <td>Name</td>   
       <td>Age</td>   
       <td>Email</td>   
       <td>Update</td>   
    </tr>   
    <?php    
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array    
    while($res = mysqli_fetch_array($result)) {         
       echo "<tr>";   
       echo "<td>".$res['name']."</td>";   
       echo "<td>".$res['age']."</td>";   
       echo "<td>".$res['email']."</td>";      
       echo "<td><a href=\"edit.php?id=$res[id]\" class='btn btn-success'>Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-danger'>Delete</a></td>";        
    }   
    ?>   
    </table> 

<br><br><br>
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>ยินดีต้อนรับ <strong><?php echo $_SESSION['username']; ?></strong></p><br>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>

</body>
</html>


