<?php
    include 'navbar.php';
    include_once 'Utils.php';
    include 'image_resize.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Pet</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
            #labelPet {
                display: inline-block;
                width: 80px;
                text-align: left;
                font-size: 12px;
                vertical-align: top;
            }
            
            #petSep {
                display: block;
                margin-top: 2px;
                margin-bottom: 2px;
                border-width: 1px;
                border-color: tomato;
                border-style: inset;
                width: 40px;
                text-align: left;
            }
            
            #petMod {
                //background-image: url("assets/images/pawPrint2.jpg");
                //background-color: #003366;
            }
            
        </style>
    </head>
    <body style="background-color: #CCFFFF;">
 
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <h1>Pet Management</h1>
                </div>
            </div> 
        </div>
        
        
        
        <br>
        <?php
        include 'search.php';
        $owner = $_SESSION['login_user'];
        $newID = $_GET["pet_id"];
        //do a query
        $query = $dbAccess->ownerPetSearch($owner);
        
        //Get the result
        $result = mysqli_query($connection, $query);
        ?>
        
        
        
        <!--display pet-->
        <div class="container col-md-offset-3" style="background-color:#66CCCC; margin-top:-40px; margin-right:15%; box-shadow: 10px 10px 5px #888888;">
            <div class="col-md-7">
                <center><h2>Click on the pet you want to edit.</h2></center>
                <hr style="display: block; margin-top: 2px; margin-bottom: 4px; border-width: 2px; border-style: inset;">
                <div class="row" style="margin-bottom: 5px; margin-top: 5px;">
        <?php while ($row = mysqli_fetch_array($result)) {
            $pet = new pet($row['name'], $row['type'], $row['breed_type'], $row['gender'], $row['age_type'], $row['description'], $row['status'], $row['pet_id']);
            $pet->setPetPicture($row['thumbnail']);
            $pet->petShortInfo($pet, $newID);
        }?>
            </div>
        </div>
        
        <?php
        $query = $dbAccess->petProfile($newID);
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
            
        //create a new object pet
        $pet = new pet($row['name'], $row['type'], $row['breed_type'], $row['gender'], $row['age_type'], $row['description'], $row['status'], $newID);
        $pet->setPetPicture($row['thumbnail']);
        ?>
        
        <font style="font-size: 13px;">
        <?php
            if ($newID=="null") {
            } else if ($owner==$row['owner']) {
                    $pet->petMod($connection);
            } else {
                    echo "<script type='text/javascript'>alert('This pet does not belong to you.')</script>";
            }
        ?>
        </font>
        </div>
    </body>
    <br>
</html>


<?php include 'footer.php';