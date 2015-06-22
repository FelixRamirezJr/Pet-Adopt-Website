<?php include 'navbar.php'; ?>
<?php include 'functions.php'; ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Adding The HTML Elements-->
<html>
    <head>
        <title>PetPal About Page</title>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <body>
        <hr>
        <h1> Contact The Owner </h1>
        <hr>
    </body>
        
    </html>

<?php include 'search.php'; 
echo '<br>'?>
    
    
<?php if (isset($_SESSION['login_user'])): ?>
<?php
define("DB_Server", "sfsuswe.com");
            define("DB_login", "s15g13");
            define("DB_password", "pawsrus13");
            define("DB_name", "student_s15g13");
            $connection = mysqli_connect(DB_Server, DB_login, DB_password, DB_name);
            if (!$connection) {
                die("Database connection failed: " . mysqli_connect_errno() .
                "(" . mysqli_connect_error() . ")");
            }
            $newID = $_GET["pet_id"];
            
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.pet_id = '$newID'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result);
            

 echo '<div class="container">';
    echo '<body>';
        echo '<h2> Hello, My name is '. $row['firstname'] . ' ' . $row['lastname'] .' I am the owner of this profile! Below you will see my contact information!</h2>';
        echo '<p>Email: ' . $row['secondary_email'] . '</p>';
        echo '<p>Phone Number: ' . $row['phone_number'] . '</p>';
        echo '<p>Name: ' . $row['firstname'] . ' ' . $row['lastname'] .' </p>';
        echo '<p>City: ' . $row['city'] . '</p>';
        echo '<p>Please I prefer e-mail, So email first, if I do not answer within 2 days you can try calling me, Thank you!</p>';
        
        
    
echo '</div>';

               

?>
<?php else: ?>
    <div class="container">
                <h5 style="text-align:center; font-size: 30px;" >Sorry! You Must be signed in to contact the owner.</h5> 
                <a style = "text-align:center; font-size: 30px;" href="user_register_form.php">Click here to create an account</a>
    </div>
<?php endif; ?>   
    
<?php

include 'footer.php';


