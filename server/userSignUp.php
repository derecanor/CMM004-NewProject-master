<?php
session_start();
$errors= array();
include ('connection.php');
if (isset($_POST['userRej'])) {
    $first = mysqli_real_escape_string($db, $_POST['1name']);
    $last = mysqli_real_escape_string($db, $_POST['u2name']);
    $add1 = mysqli_real_escape_string($db, $_POST['add1']);
    $add2 = mysqli_real_escape_string($db, $_POST['add2']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $post_user = mysqli_real_escape_string($db, $_POST['postcode']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass1 = mysqli_real_escape_string($db, $_POST['password0']);
    $pass2 = mysqli_real_escape_string($db, $_POST['password1']);

    //to make sure all or most of the places are filled correctly
    if (empty($username)) {
        array_push($error, "username is required");
    }
    if (empty($email)) {
        array_push($error, "email is required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "postcode is required");
    }
    if (empty($password_1)) {
        array_push($error, "Password is required");
    }
    if ($pass1 != $pass2) {
        array_push($error, "the password do not match");
    }
    if (empty($first)) {
        array_push($error, "First name is required");
    }
    if (empty($last)) {
        array_push($error, "Last name is required");
    }
    if (empty($add1)) {
        array_push($error, "the first line is required");
    }
    if (empty($city)) {
        array_push($error, "city name is required");
    }
    if (empty($post_user)) {
        array_push($error, "postcode is required");

    } else {
        $check_user = "SELECT * FROM login WHERE username= '$username' OR email='$email' ";
        $result = mysqli_query($db, $check_user);
        $get = mysqli_num_rows($result);
        if ($get != 0) {
            array_push($error, "Username or email taken");
        } else {
            $password = password_hash($pass2, PASSWORD_DEFAULT);// HASH the password

            // insert the login data into login table
            $sql = "INSERT INTO login (username,email,password,isTradesman) VALUES ('$username','$email','$password',0)";
            $res = mysqli_query($db, $sql);

            // insert the tradesman data into tradesman table
            $sql_user = "INSERT INTO user (username,firstname,lastname,add1 , add2, city, postcode)
                                      VALUES ('$username', '$first','$last' ,'$add1','$add2', '$city', '$post_user')";
            mysqli_query($db, $sql_user);
            $_SESSION['user'] = $username;
            header('location : ../user.php');
        }
    }
}
