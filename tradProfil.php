<?php


//Using PHP to grab trades_id passed to Profile Page
$id=$_SESSION['SESS_TRADES_ID'];


//Display trades_information based on tradesman_id
//Grab trades_row
$Trades_row=mysqli_fetch_array(mysqli_query("SELECT * FROM Tradesman where 'trades_id'='$id'"));


if($Trades_row['id'])
{//if there is an id,tradesman exists
    echo $Trades_row[username];
}else
    echo "Tradesman doesn't exist!";

{
    $fname=$row3['fname'];
    $lname=$row3['lname'];
    $address=$row3['address'];
    $contact=$row3['contact'];
    $picture=$row3['picture'];
    $gender=$row3['gender'];
    $postcode=$row3['postcode'];
    $qualification=$row3['qualification'];
    $AboutYou =$row3['About You'];
    $city=$row3['city'];
    $birthdate=$row3['dob'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <link rel="stylesheet" href="tradProfil.css">
        <link rel="stylesheet" href="unsemantic-grid-responsive-tablet.css">
    </head>

<body>
<main>

    <main class = "grid-container">
        <div class = grid-100>
        </div>
        <div class = "header1">
        </div>
        <div id = "title"><br>
            <h1><b></b>Profile</b> </h1>
            <h2><b>Company Name</b></h2>
            <br><div align="right"><a href="TradesmanHomepage.php">LOGOUT</a></div>
            <img src="server/image/Tradesman.png" height="200" width="200" alt="Image of Tradesman">
        </div>

        <section class="grid-66">
            <br><td width="82" valign="top"><div align="left">Username:Tradesman</div> <td width="165" valign="top"><?php echo $uname ?></td>
            <br><td width="82" valign="top"><div align="left">Firstname:Trades</div> <td width="165" valign="top"><?php echo $fname ?></td>
            <br><td width="82" valign="top"><div align="left">Lastname:Trade</div><td valign="top"><?php echo $lname?></td>
            <br><td valign="top"><div align="left">Birthdate:dd-mm-year</div> </td> <td valign="top"><?php echo $birthdate?></td>
        </section>

        <section>
            <br>
            <td width="82" valign="top"><div align="left">City:City</div><?php echo $city?></td>

            <br><td valign="top"><div align="left">Gender:Gender</div><?php echo $gender?> </td>

            <br><td valign="top"><div align="left">Address:Address</div><?php echo $address?> </td><td valign="top"><?php echo $address?></td>


            <br><td valign="top"><div align="left">Postcode:Postcode</div> </td> <td valign="top"><?php echo $postcode?></td>

            <br><td valign="top"><div align="left">Contact:Contact</div> </td> <td valign="top"><?php echo $Contact?></td>
        </section>

        <section>

            <br><th><strong>Qualifications</strong></th>
            <p>HND Construction</p>
            <p> City in Guilds Plumbing</p>
            <p>CSCS Card Holder</p>
            <p>Health and Safety Certificates</p>
        </section>

        <section>
            <h3><strong>About Me</strong></h3>
            <p>I am a Master craftsmen, with over 40 years experience within the construction industry.<br> The past twenty years i have worked in partnership with my brother and built up an excellent reputation for all works completed.</p>
        </section>

        <section>

            <h4><strong>Skills</strong></h4>
            <ul>
                <li>Plumbing</li>
                <li>Brick-Laying</li>
                <ul>
                    <li>Electrician</li>
                </ul>
            </ul>
        </section>


        <section>
            <h4><b>Photos</b></h4>
            <img src="server/image/bric.jpg" height="150" width="150" alt="Bricklaying">
            <img src="server/image/el.jpg" height="150" width="150" alt=" An electrician">
            <img src="server/image/Elect.jpg" height="150" width="150" alt="Electricals">
            <img src="server/image/pl.jpg" height="150" width="150" alt="Plumbing">
            <img src="server/image/pt.jpg" height="150" width="150" alt="Image of Plumbing">

            <p align="center"><a href="TradesmanHomePage.php"></a> </p>

        </section>

    </main>

    </div>
</main>
</body>
</html>