<?php 
    session_start();
    include('server.php');
    
    $errors = array();
    if (isset($_POST['reg_user'])) {
        $stdid = mysqli_real_escape_string($mysqli, $_POST['stdid']);
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $surname = mysqli_real_escape_string($mysqli, $_POST['surname']);
        $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $password_1 = mysqli_real_escape_string($mysqli, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($mysqli, $_POST['password_2']);

        if (empty($stdid)) {
            array_push($errors, "Student ID is required");
        }
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($surname)) {
            array_push($errors, "Surname is required");
        }
        if (empty($lastname)) {
            array_push($errors, "Lastname is required");
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

        $user_check_query = "SELECT * FROM user WHERE stdid='$stdid' OR username = '$username'OR surname='$surname' OR lastname='$lastname' OR email = '$email' LIMIT 1";
        $query = mysqli_query($mysqli, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['stdid'] === $stdid) {
                array_push($errors, "Student ID already exists");
            }
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['surname'] === $surname) {
                array_push($errors, "Surname already exists");
            }
            if ($result['lastname'] === $lastname) {
                array_push($errors, "Lastname already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (stdid,username,surname,lastname, email, password) VALUES ('$stdid','$username','$surname','$lastname', '$email', '$password')";
            mysqli_query($mysqli, $sql);

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