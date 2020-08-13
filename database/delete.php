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
  
  include("server.php");   
  //getting id of the data from url   
  $id = $_GET['id'];   
  //deleting the row from table   
  $result = mysqli_query($mysqli, "DELETE FROM user WHERE id=$id");   
  //redirecting to the display page (index.php in our case)   
  header("Location:index.php");   
  ?>   