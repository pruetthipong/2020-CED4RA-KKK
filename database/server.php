 <!-- <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newnormal";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

?>  -->

<?php   
  $databaseHost = 'localhost';   
  $databaseName = 'newnormal';   
  $databaseUsername = 'root';   
  $databasePassword = '';   
  
  $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);    

?>    