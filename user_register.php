
<html>
    <head>
        <title>Welcome</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
<?php
include_once 'Utils.php';

$username = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$phone_number = $_POST["phone_number"];
$sec_email = $_POST["sec_email"];
$city = $_POST["city"];

$encrypt_password = md5($password);

$dbAccess->insertUser($username,$firstname,$lastname, $password, $encrypt_password, $phone_number, $sec_email , $city, $connection);

?>
        
<div class="container">
    <div class="col-md-6">
        <p style="text-align: center;">Sign In!</p>
        <form action="login.php" method="post" enctype="multipart/form-data">
        <label>Username:</label>
        <input type="text" name="username" maxlength="30" size="20" required="">
        <br>
        <hr>
        <label>Password:</label>
        <input type ="password" name="password" maxlength="30" size="20" required="">
        <br>
        <input type="submit" value="Sign In" name="submit">
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>