<?php
include 'navbar.php';
include_once 'Utils.php';
?>

<html>
    <head>
        <title>Send Success</title>    
         
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <!-- CSS for this demo-->
        <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
        <!-- Custom CSS -->
        <link href="css/index.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="css/bootStrap.css" rel="stylesheet">
    </head>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Extracting The needed Information From the Form
$user = $_POST['user'];
$owner = $_POST['owner'];
$petID = $_POST['petid'];
//$owner = $_SESSION['owner'];

//Displaying the successs page to the user.
$sql = new data(); // Making A connection to the Database.
$connection = $sql->accessData(); // Accessing the Database and returning a connection

$email = new Email($owner,$user,htmlspecialchars($_POST['textarea']),$petID);
$email->send($connection);

echo '<body style="background-color: #CCFFFF;">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                    <h1>
                        Message Sent
                    </h1>
                </div>
            </div> 
        </div>
    <br>';

echo '<h1>Hello '. $user . '!';
echo '<br>';
echo 'Your Email Was Successfully Sent ';
//echo '<h1>Message was Succesfully Sent</h1>';
//echo '<p> '.$user.'</p>';
echo 'to: <br>' . $owner .'!</h1>';
//echo '<p>This is the Pet ID '.$petID.'</p>';
//echo '<p> '.htmlspecialchars($_POST['textarea']). ' </p>';
echo '<img class = "displayed" style="height:200px;width:200px; border-radius:100px; "src="assets/images/Cool-dog2.jpg" class="img img-responsive">';
echo '<br>';
echo '<br>';
echo '</body>';
?>

<?php
include 'footer.php';

