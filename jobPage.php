<?php
session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include ('server/connection.php');


$username=$_SESSION["user"];

$currentJob = $_POST["myJobs"];

$getJobID = "SELECT eventID FROM event WHERE title = '$currentJob' AND user = '$username' AND isOpen = 1 ";
$idRes = $db->query($getJobID );


if (mysqli_num_rows($idRes)>0) {
    while ($row = mysqli_fetch_assoc($idRes)) {
        $_SESSION['event']= $row['eventID'] ;
    }
}

$event=$_SESSION['event'];

$getNeeds = "SELECT needs FROM event WHERE eventID = $event";
$needs = $db->query($getNeeds);
$getDesc = "SELECT description FROM event WHERE eventID = $event";
$desc = $db->query($getDesc);
$getPhoto = "SELECT photo FROM event WHERE eventID = $event";
$photo = $db->query($getPhoto);


// mo staff
$get = "SELECT * FROM event WHERE eventID = $event";
$n = $db->query($get);


/*
exit();

if (isset($_POST['closeJob'])){
    $get = "SELECT * FROM event WHERE title = '$currentJob' AND user = '$username' AND isOpen = 1 ";
    $n = $db->query($get);
    print_r( $n);

    if (mysqli_num_rows($n)>0){
        while ($row= mysqli_fetch_assoc($n)){
            $user= $row['user'];
            $tit= $row['title'];
            $op= $row['isOpen'];
            $sql= "UPDATE event SET isOpen=0 WHERE user ='$user' AND title = '$tit' AND isOpen = $op ";
            $cke=mysqli_query($db,$sql);
            header('location: ../CMM004-NewProject-master/user.php');

        }
        }
    }*/


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Home Page</title>
    <link rel="stylesheet" href="unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobPage.css">

</head>

<body>

<main class="grid-container">

    <div class="grid-100">

        <header  class="header1">
            <!-- logo will take a place here -->
            <div class="logo">
                <img src="#">
            </div>
            <!-- header start here  -->
            <div><br><br>
                <h2 style="text-align: center;  text-decoration-color: white; text-overflow: revert" >Tradesman Aberdeen</h2>
            </div>

            <div  class="login-txt2">
                <p>You are logged in:<br>
                    <?php
                    echo  $_SESSION['user'];
                    ; ?>
                </p>
                <br><a href="logout.php" style=" text-decoration: none;color: #b90002">Log-out</a>
            </div>

        </header>

        <div id= "jobForm">
            <form class="form1" id = jButton1 method="post" action="closeJob.php">
                <button type= "submit" name = "closeJob" id = "closeJo" class="btn">Close Job</button>

                <?php
               //if ($_POST['closeJob']){
                //$sql= "UPDATE event SET isOpen=0 WHERE title = '$currentJob' AND user = '$username' AND isOpen = 1 ";
              //$cke=mysqli_query($db,$sql);
             // header('location: ../CMM004-NewProject-master/user.php');
               // }
                ?>

            </form>
            <form  class="form1" id = jButton2>
                <button type= "submit" name = "editJob" id = "editJob" class="btn">Edit Job</button>
            </form>
        </div>
    <div id = "jobBox">

<div id = "whitebox">
        <h1><?php echo $currentJob ?> </h1>
</div>
        <div id = "whitebox">
        <h2><?php
            while ($row = $needs->fetch_assoc()) {
                echo "I need a " . $row['needs'];
            } ?>
        </h2>
        </div>
        <div id = "whitebox">
        <p><?php
            while ($row = $desc->fetch_assoc()) {
                echo "Description of my problem: " . "<br>" . $row['description'];
            } ?>
        </p>
        </div>

    </div>


        <form id = "bidBox">
            <h2>Current Bids for this Job</h2>
<select name = "thisBid" id = "thisBid">
    <?php

    ?>
</select>
            <button type="submit" name="acceptBid" class="btn">Accept Bid!</button>
        </form>


    </main>
</body>
</html>