<?php

require_once('connection.php');

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

<head>
    <meta charset="UTF-8">
    <title>Tradesman Profile Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="unsemantic-grid-responsive-tablet.css">
</head>
<br>
<header>
    <section>
        <h1><b>Tradesman Profile Page</b></h1>

        <br>
        <div align="right"><a href="TradesmanHomepage.php">logout</a></div>
        </br>

        <p><<img src="server/image/Tradesman.png" alt="Image of Tradesman" width="129" rowspan="5">/><p>
        <h1>Tradesman Company Name</h1>
    </section>
</header>

<main>
    <section>
        <br>
        <br class = "grid-container">
        <br><td width="82" valign="top"><div align="left">Firstname:</div>
        <td width="165" valign="top"><?php echo $fname ?></td></br>
        <br>
        <td width="82" valign="top"><div align="left">Lastname:</div><td valign="top"><?php echo $lname?></td></br>
        <br>
        <td valign="top"><div align="left">Birthdate:</div> </td> <td valign="top"><?php echo $birthdate?></td>
        </br>
    </section>

    <section>
        <br>
        <td width="82" valign="top"><div align="left">City:</div><?php echo $city?></td></br>

        <br><td valign="top"><div align="left">Gender:</div><?php echo $gender?> </td> </br>

        <br><td valign="top"><div align="left">Address:</div><?php echo $address?> </td><td valign="top"><?php echo $address?></td></br>


        <br><td valign="top"><div align="left">Postcode:</div> </td> <td valign="top"><?php echo $postcode?></td></br>

        <br><td valign="top"><div align="left">Contact:</div> </td> <td valign="top"><?php echo $Contact?></td></br>
    </section>


    <section>
        <h5><strong>Qualifications</strong></h5>
        <p>HND Construction</p>
        <p> City in Guilds Plumbing</p>
        <p>CSCS Card Holder</p>
        <p>Health and Safety Certificates</p>
    </section>

    <section>
        <h2><strong>About Me</strong></h2>
        <p>I am a Master craftsmen, with over 40 years experience within the construction industry. The past twenty years i have worked in partnership with my brother and built up an excellent reputation for all works completed. My portfolio on mybuilder has been live since 2009 where the predominant work flow has focused on household works opposed to commerical. With over 200 jobs undertaken for a variety of projects as well sound advice i believe my customer feedback speaks for itself.</p>
    </section>

    <h3><strong>Skills</strong></h3>
    <ul>
        <li>Plumbing</li>
        <li>Brick-Laying</li>
        <ul>
            <li>Electrician</li>
        </ul>
    </ul>
    <h4><b>Photos</b></h4>
    <img src="server/image/el.jpg" alt="Pic of Electrician">
    <img src="server/image/elect.jpg"  alt="Image of Electrician">
    <img src="server/image/plu.jpg" alt="Picture of Plumber">
    <img src="server/image/plum.jpg" alt="Plumber">

    <p align="center"><a href="TradesmanHomePage.php"></a> </p>
    </section>
</main>
