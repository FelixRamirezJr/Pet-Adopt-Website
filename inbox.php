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
        
        <style>
            form {
            width: 500px;
            margin: 0;
           }
            </style>
        <!--
        <style>
        h1 
        {
	color: #fff;
	text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135;
	font: 50px 'ChunkFiveRegular';
        }
        
        h1 span 
        { 
         background-color: #000099; 
        }
        </style>
        -->
    </head>
    <body style="background-color: #CCFFFF;">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                    <h1>Pet Pal Messaging
                        <!--: <?php echo $_SESSION['login_user']; ?>-->
                        </h1>
                </div>
            </div> 
        </div>
        <br>
        <br>
    
 <!--This function is in charge of displaying the -->


<?php
       // Accessing the Database
       $sql = new data(); // Making A connection to the Database.
       $connection = $sql->accessData(); // Accessing the Database and returning a connection
       
       // Getting The Session Stuff
       $owner = $_SESSION['login_user'];
       
       // Accessing the Results
       $query = $dbAccess->emailSearch($owner);
       $result = mysqli_query($connection, $query);
       
       while ($row = mysqli_fetch_array($result)) 
       {
       $owner = $row['username'];
       $petID = $row['pet_id'];
       $sender = $row['sender'];
       $message = $row['message'];
      
       $queryID = $dbAccess->petProfile($petID);
       $resultID = mysqli_query($connection, $queryID);
       $rowID = mysqli_fetch_array($resultID);
       
       $petName = $rowID['name'];
       echo '<div class=container style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">';
       echo ' <h3> Message</h3>';
       echo ' <hr> ';
       echo '<table><tr>';
       echo '<th>From: </th><th>' . $sender . '</th></tr>';
       echo '<th>Pet Name: </th><th>' . $petName . '</th></tr>';
       echo '<th>Message: </th><th>' . $message . '</th></tr></table>';
      
               
                   // This is the Form for the Reply Button
                   
                    // This is the Sending Button... Will Send to the email.
                    echo '<br>';
                    echo '<form method="post" role="form" form action = "MailBox.php" align = "left">';
                    echo '<input type = "hidden" name ="user" value = "'.$owner.'" >'; // This is sending the User Info
                    echo '<input type = "hidden" name ="owner" value = "'.$row['sender'].'" >'; // This is sending the Owner info
                    echo '<input type = "hidden" name ="petid" value = "'.$petID.'" >'; // This is sending the Owner Info
                    echo '<button type="submit" value = "send" name="submit" class="btn btn-primary">Reply</button>';
                    echo '</form>';
                    echo '<br>'; 
                   
                    // This is the Form for the Delete Button.
                    echo '<form method="post" role="form" form action = "Delete.php">';
                    echo '<input type = "hidden" name ="user" value = "'.$owner.'" >'; // This is sending the User Info
                    echo '<input type = "hidden" name ="owner" value = "'.$row['sender'].'" >'; // This is sending the Owner info
                    echo '<input type = "hidden" name ="petid" value = "'.$petID.'" >'; // This is sending the Owner Info
                    echo '<input type = "hidden" name ="message" value = "'.$message.'" >'; // This is sending the Owner Info
                           
                    echo '<button type="submit" value = "send" name="submit" class="btn btn-danger" >Delete</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '<br>';
                    
       
       }
       

?>

<?php include 'footer.php'; ?>
