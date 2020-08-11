<?php 
    session_start();
    include('config.php');
    
    $errors = array();
    if (isset($_POST['reg_user'])) {
        $stdid = mysqli_real_escape_string($conn, $_POST['stdid']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($stdid)) {
            array_push($errors, "stdid is required");
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($surname)) {
            array_push($errors, "surname is required");
        }
        if (empty($lastname)) {
            array_push($errors, "lastname is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM user WHERE stdid ='$stdid'OR username = '$username' OR email = '$email'OR surname = '$surname' OR lastname = '$lastname' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['stdid'] === $stdid) {
                array_push($errors, "stdid already exists");
            }
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['surname'] === $surname) {
                array_push($errors, "surname already exists");
            }
            if ($result['lastname'] === $lastname) {
                array_push($errors, "lastname already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (stdid, username, surname,lastname, email, password) VALUES ('$stdid','$username','$surname','$lastname', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Username or Email already exists");
            $_SESSION['error'] = "Username or Email already exists";
            header("location: register.php");
        }
    }

?>