<?php
include 'navbar.php';
include_once 'Utils.php';
?>

<html>
    <head>
        <title>Inbox Page</title>    
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link href="css/index.css" rel="stylesheet">
        <link href="css/bootStrap.css" rel="stylesheet">
    </head>
    
 <!--This function is in charge of displaying the -->
    
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$owner = $_POST['owner'];
$user = $_POST['user'];
$petID = $_POST['petid'];



echo '<body>';
echo '<h1>Send a message to: </h1>';
echo '<h1 style = "color:red"> '.$owner.'</h1>';
echo '<form method="post" role="form" form action = "Sent.php">';
echo '<input type = "hidden" name ="user" value = "'.$user.'" >'; // This is sending the User Info
echo '<input type = "hidden" name ="owner" value = "'.$owner.'" >'; // This is sending the Owner info
echo '<input type = "hidden" name ="petid" value = "'.$petID.'" >'; // This is sending the Owner Info
echo '<div class="form-group">';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
echo '<textarea id= "textarea" name="textarea" class="form-control" rows="3" ></textarea>';
echo '</div>';
echo '<button type="submit" value = "send" name="submit" class="btn btn-primary">Send Message</button>';
echo '</form>';
echo '</body>';
