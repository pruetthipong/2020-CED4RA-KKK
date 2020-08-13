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
  // including the database connection file  
  include_once("server.php");   
  if(isset($_POST['update']))   
  {      
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $stdid = mysqli_real_escape_string($mysqli, $_POST['stdid']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
    $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    
    // checking empty fields   
    if(empty($stdid) || empty($username) || empty($surname) || empty($lastname) ||empty($email)) {      
       if(empty($stdid)) {   
         echo "<font color='red'>stdid field is empty.</font><br/>";   
       }   
       if(empty($username)) {   
        echo "<font color='red'>username field is empty.</font><br/>";   
      } 
      if(empty($surname)) {   
        echo "<font color='red'>surname field is empty.</font><br/>";   
      } 
      if(empty($lastname)) {   
        echo "<font color='red'>lastname field is empty.</font><br/>";   
      } 
       if(empty($email)) {   
         echo "<font color='red'>email field is empty.</font><br/>";   
       }        
    } else {      
       //updating the table   
       $result = mysqli_query($mysqli, "UPDATE user SET stdid='$stdid',username='$username',surname='$surname',lastname='$lastname',email='$email' WHERE id=$id");   
       //redirectig to the display page. In our case, it is index.php   
       header("Location: index.php");   
    }   
  }   
  ?>   

  <?php   
    //getting id from url   
    $id = $_GET['id'];  
    //echo $id; die;
    //selecting data associated with this particular id   
    $result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");   
    while($res = mysqli_fetch_array($result))   
  {   
    $stdid = $res['stdid'];   
    $username = $res['username'];   
    $surname = $res['surname'];   
    $lastname = $res['lastname'];    
    $email = $res['email'];   
  }   
  ?>   

  <html>   
  <head>      
    <title>Edit Data</title>   
   <!-- Latest compiled and minified CSS -->  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
 <!-- jQuery library -->  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
 <!-- Latest compiled JavaScript -->  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
  </head>   
  <center>   
  <body>   
    <h3><a href="index.php">Go To Home Page!!</a></h3>   
       <form name="form1" method="post" enctype="multipart/form-data" action="edit.php" >
       <table width="25%" border="0">   
         <tr>    
            <td>Student ID</td>   
            <td><br/><input class="form-control" type="text" name="stdid" value="<?php echo $stdid;?>"></td>   
            <!-- <td><input type="text" name="stdid" class="form-control"></td><br>    -->
         </tr>   
         <tr>    
            <td>Username</td>   
            <td><br/><input class="form-control" type="text" name="username" value="<?php echo $username;?>"></td>   
            <!-- <td><br/><input type="text" name="username" class="form-control"></td>    -->
         </tr>   
         <tr>    
            <td>Surname</td>   
            <td><br/><input class="form-control" type="text" name="surname" value="<?php echo $surname;?>"></td>   
            <!-- <td><br/><input type="text" name="surname" class="form-control"></td>    -->
         </tr>   
         <tr>    
            <td>Lastname</td>  
            <td><br/><input class="form-control" type="text" name="lastname" value="<?php echo $lastname;?>"></td>   
            <!-- <td><br/><input type="text" name="lastname" class="form-control"></td>    -->
         </tr>   
         <tr>    
            <td>Email</td>
            <td><br/><input class="form-control" type="text" name="email" value="<?php echo $email;?>"></td>     
            <!-- <td><br/><input type="text" name="lastname" class="form-control"></td>   -->
         </tr>   
         <tr>    
            <td></td>   
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>   
            <td><input type="hidden" name="update" value="1"></td> 
            <center><td><br/><input type="submit" class="btn btn-primary" name="Submit" value="Create Employee"></td></center>   
         </tr>   
       </table>   
    </form>   
  </body>   
  </center>   
  </html>    


