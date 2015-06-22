<?php
    include 'navbar.php';
    include 'functions.php';
    include_once 'Utils.php';
?>
<!-- Adding The HTML Elements-->
<html>
    <head>
        <title>Contact Owner</title>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <body style="background-color: #CCFFFF;">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                <h1>
                    Contact Owner
                </h1>
                </div>
            </div> 
        </div>
    <br>

<?php
    include 'search.php';
    if (isset($_SESSION['login_user'])):
        $newID = $_GET["pet_id"];
        $query = $dbAccess->petOwner($newID);
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        
        //create pet owner object
        $owner = new user($row['username'], $row['firstname'], $row['lastname'], $row['phone_number'], $row['city'], $row['secondary_email']);
        //display the owner info and Pass in the users Information.
        // Added the Session Login User and The 
        $owner->displayContact($owner,$_SESSION['login_user'],$newID);
        
        
        
        
?>
<?php else: ?>
    <div class="container col-md-offset-2">
        <center><h5 style="text-align:center; font-size: 30px;" >Sorry! You Must be signed in to contact the owner.</h5> 
            <a style = "text-align:center; font-size: 30px;" href="user_register_form.php">Click here to create an account</a></center>
    </div>
<?php endif; ?>              
<?php
include 'footer.php'; ?>


