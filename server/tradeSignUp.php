<?php
session_start();
include ('connection.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

if (isset($_POST['tradesRej'])) {
    $first = mysqli_real_escape_string($db, $_POST['1name_tr']);
    $last = mysqli_real_escape_string($db, $_POST['u2name_tr']);
    $add1 = mysqli_real_escape_string($db, $_POST['add1_tr']);
    $add2 = mysqli_real_escape_string($db, $_POST['add2_tr']);
    $city = mysqli_real_escape_string($db, $_POST['city_tr']);
    $post_tr = mysqli_real_escape_string($db, $_POST['postcode_tr']);
    $username = mysqli_real_escape_string($db, $_POST['username_tr']);
    $email = mysqli_real_escape_string($db, $_POST['email_tr']);
    $pass1 = mysqli_real_escape_string($db, $_POST['password_tr']);
    $pass2 = mysqli_real_escape_string($db, $_POST['password1_tr']);
    $prof = $_POST['profession'];
    $you = mysqli_real_escape_string($db, $_POST['AboutYou']);
    $que = mysqli_real_escape_string($db, $_POST['qua']);

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
    }
    if (empty($prof)) {
        array_push($error, "You must select a profession");
    }

    else {
        $check_user = "SELECT * FROM login WHERE username= '$username' OR email='$email' ";
        $result = mysqli_query($db, $check_user);
        $get = mysqli_num_rows($result);
        if ($get != 0) {
            array_push($error, "Username or email taken");
        } else {
            $password = password_hash($pass2, PASSWORD_DEFAULT);// HASH the password

            $sql = "INSERT INTO login (username,email,password,isTradesman) VALUES ('$username','$email','$password',1)";
            mysqli_query($db, $sql);

            // insert into tradesman data in to tradesman table
            $sql_t = "INSERT INTO tradesman(username, firstname, lastname, add1, add2, city, postcode, aboutYou, qualifications) VALUES ('$username', '$first','$last' ,'$add1','$add2', '$city', '$post_tr','$you','$que')";
            mysqli_query($db, $sql_t);

            // insert into profession data in to profession table
            if ($prof) {
                foreach ($prof as $p) {
                    mysqli_query($db, "INSERT INTO trades_prof(profession,username) VALUES ('" .
                        mysqli_real_escape_string($db, $p) ."',".$username.")");
                }
                $_SESSION['user'] = $username;
                header('location: ../tradesmanHomepage.php');
            }
        }
    }
}