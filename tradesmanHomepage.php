<?php
session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include ('server/connection.php');

$username=$_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Tradesman Aberdeen - Tradesman Homepage</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="tradesmanHomepage.css">
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
        </div>

    <div id="title">

        <h2 style="margin-top: 95px; text-align: center"><br>Welcome To Tradesman Aberdeen-Tradesman Home Page</h2>
        <br><br>
    </div>

    <section class = grid-100>
        <div id = "jobsForm">
            <form>
                <h2>Your Current Jobs</h2>
                <table id="currentJobs" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <td>User</td>
                    <td>Needs</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Photo</td>
                </tr>
                </thead>
                <?php
                $profession = "SELECT profession FROM trades_prof WHERE username = '$username'";
                $result = $db->query($profession);
                while ($row = $result -> fetch_assoc()){
                    $profession1 = $row["profession"];
                }
                $sql_query = "SELECT user, needs, title, description, photo FROM event WHERE needs = '$profession1' AND isOpen = true ";
                $results = $db -> query($sql_query);

                while($row = mysqli_fetch_array($results)) {
                    echo "
                        <tr>  
                        <td>".$row["user"]."</td>
                        <td>".$row["needs"]."</td>
                        <td>".$row["title"]."</td>
                        <td>".$row["description"]."</td>
                        <td>".$row["photo"]."</td>
                        </tr> ";
                }
                ?>
                </table>
        </div>
        </form>
        </div>
    </section>
    </div>

    <section class = grid-100>
        <div id = "biddingForm">
            <form>
                <h2>Job Bidding Section</h2>
                <div class="input">
                    <label>What would you like to bid on?</label>
                    <select id = "professionSelect">
                        <option value = "temp">From Open Jobs</option>
                    </select>
                </div>
                <div class="input">
                    <label>Callout Fees</label>
                    <input type="text" name="callout" placeholder="£">
                </div>
                <div class="input">
                    <label>Quote</label>
                    <input type="text" name="quote" placeholder="£">
                </div>
                <div class="input">
                    <label>Comments</label>
                    <textarea name = "Comments" id="comments">
                    Please put in any information you think relevant including the timeframe by which you will be able
                to assist. If you have not been able to quote a price, please say why and give some further information.
                </textarea>
                </div>
                <div class="input">
                    <button type="submit" name="newBid" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </section>
</main>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#currentJobs').DataTable();
    });
</script>

