<?php   
  // including the database connection file   
  include_once("config.php");   
  if(isset($_POST['update']))   
  {      
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);   
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);   
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);   
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);      
    // checking empty fields   
    if(empty($name) || empty($age) || empty($email)) {      
       if(empty($name)) {   
         echo "<font color='red'>Name field is empty.</font><br/>";   
       }   
       if(empty($age)) {   
         echo "<font color='red'>Age field is empty.</font><br/>";   
       }   
       if(empty($email)) {   
         echo "<font color='red'>Email field is empty.</font><br/>";   
       }        
    } else {      
       //updating the table   
       $result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");   
       //redirectig to the display page. In our case, it is index.php   
       header("Location: index.php");   
    }   
  }   
  ?>   
  <?php   
  //getting id from url   
  $id = $_GET['id'];   
  //selecting data associated with this particular id   
  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");   
  while($res = mysqli_fetch_array($result))   
  {   
    $name = $res['name'];   
    $age = $res['age'];   
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
    <form name="form1" method="post" action="edit.php">   
       <table border="0">   
         <tr>    
            <td>Name</td>   
            <td><br/><input class="form-control" type="text" name="name" value="<?php echo $name;?>"></td>   
         </tr>   
         <tr>    
            <td>Age</td>   
            <td><br/><input class="form-control" type="text" name="age" value="<?php echo $age;?>"></td>   
         </tr>   
         <tr>    
            <td>Email</td>   
            <td><br/><input class="form-control" type="text" name="email" value="<?php echo $email;?>"></td>   
         </tr>   
         <tr>   
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>   
            <td><br/><input class="btn btn-success" type="submit" name="update" value="Update"></td>   
         </tr>   
       </table>   
    </form>   
  </body>   
  </center>   
  </html>    


