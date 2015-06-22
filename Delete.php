<?php
include 'navbar.php';
include_once 'Utils.php';
?>
<html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$username = $_POST['user'];
$owner = $_POST['owner'];
$petID = $_POST['petid'];
$message = $_POST['message'];
//$owner = $_SESSION['owner'];


echo 'This is the Owdner: ' . $owner;
echo '<br>';

echo 'This is the UserName That is logged In: ' . $username;
echo '<br>';

echo 'This is the PETID:' . $petID;
echo '<br>';

echo 'This is the Message: ' . $message;
echo '<br>';

//Displaying the successs page to the user.
$sql = new data(); // Making A connection to the Database.
$connection = $sql->accessData(); // Accessing the Database and returning a connection

$email = new Email($owner,$username,$message,$petID);
$email->delete($connection);
header('Location: http://www.sfsuswe.com/~s15g13/inbox.php');
?>
</html>
