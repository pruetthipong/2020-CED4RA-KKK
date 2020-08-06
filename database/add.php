<html>   
  <head>   
    <title>Add Data</title>   
    <!-- Latest compiled and minified CSS -->  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
 <!-- jQuery library -->  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
 <!-- Latest compiled JavaScript -->  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>   
  </head>   
  <center>   
  <body>   
  <?php   
  //including the database connection file   
  include_once("config.php");   
  if(isset($_POST['Submit'])) {      
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
       //link to the previous page   
       echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";   
    } else {    
       // if all the fields are filled (not empty)    
       //insert data to database      
       $result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");   
       //display success message   
       echo "<font color='green'><h3>Data added successfully.</h3>";   
       echo "<br/><a href='index.php'><h4>View Result</h4></a>";   
    }   
  }   
  ?>   
  </body>   
  </center>   
  </html> 