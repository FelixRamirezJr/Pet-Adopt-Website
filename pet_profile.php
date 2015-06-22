<!-- Page Was Created and Modified by Felix Ramirez-->
<!-- pet_profile.php Displays the Information of the Pet -->

<?php
    include 'navbar.php';
    include_once 'Utils.php';
?>

<html>
    <head>
        <title>Pet Profile</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
       #labelresult 
       {
                display: inline-block;
                width: 500px;
                text-align: left;
                font-family: Comic Sans MS;
                font-size: 25px;
       }
            
        .background
        {
                background-color: #353535;
                border-radius: 10px;
        }
            
        #roundedCorners
        {
        border-radius: 10px;
        background: #EDEDED;
        padding: 20px; 
        }
        
         #roundedCornersForBackground
        {
        border-radius: 25px;
        background: #7888B2;
        padding: 20px; 
        }

        
        #roundedTitle
        {
        background: #A9EDFD;
        padding: 20px;   
            
        }
           p
           {
           color: #FFF;
           text-transform: capitalize;
           }
           
         //Table code
           .tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
           .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
           .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
           .tg .tg-s6z2{text-align:center}
           .tg .tg-vn4c{background-color:#D2E4FC}
           
        </style>
        
            <script src="js/bootstrap.min.js"></script>
        
    
        <!--<h1 id = "roundedTitle">Pet Profile</h1> -->
    </head>
    
    <body style="background-color: #CCFFFF;">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <h1>Pet Profile</h1>
                </div>
            </div> 
        </div>
        <br>
        
        <?php include 'search.php'; ?>
        <script>
            <?php
            function display()
            {
            $newName = $_GET["name"];
            $newGender = $_GET["gender"];
            $newAge = $_GET["age_type"];

            echo "This is Type: " . $newName . "\n";
            echo $newGender;
            echo $newAge;
            }
            ?>
        </script>
        
        <!display();
            
        <?php
            
            $newID = $_GET["pet_id"];
            $query = $dbAccess->petProfile($newID);
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result);
            
            //create a new object pet
            $pet = new pet($row['name'], $row['type'], $row['breed_type'], $row['gender'], $row['age_type'], $row['description'], $row['status'], $newID);
            $pet->setPetPicture($row['thumbnail']);
            
            //create a new object for the pet owner
            $owner = new user(null, $row['firstname'], $row['lastname'], $row['phone_number'], $row['city'], null);
            
            echo '<body>';
            // echo '<h1>Hello, My Name Is: '.$row['name'] . '</h1>';
            echo '<div class="container col-md-offset-2" style="margin-top:-40px;">';

       
            echo '<div class="row">';
            //echo '<div class="col-md-6" style = "width: inherit;">';
            echo '<div class="col-md-6" style = "width: 100%; height 100%; max-width:300px; max-height:500px">';
                echo '<img style="box-shadow: 10px 10px 5px #888888;" class="img-responsive img-rounded" src=data:image/jpeg;base64,' . base64_encode($pet->getImage()) . ' " alt="">';
              //  echo '<h1>Name: '.$row['name'] . '</h1>';
            echo '</div>';
            
            
            echo '<table class="tg" width="50% text-align="center" style="box-shadow: 10px 10px 5px #888888;">';
            echo '    <tr>';           
            echo '        <th class="tg-s6z2" colspan="2">Hi there! I am ' . $pet->getName(). '<br></th>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-031e">Pet ID:</td>';
            echo '        <td class="tg-031e">' . $pet->getID() . '</td>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-vn4c">Status:</td>';
            echo '        <td class="tg-vn4c">' . $pet->getStatus() . '</td>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-031e">Sex:</td>';
            echo '        <td class="tg-031e">' . $pet->getSex() . '</td>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-vn4c">Pet Hometown:</td>';
            echo '        <td class="tg-vn4c">' . $owner->getCity() . '</td>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-031e">Breed:</td>';
            echo '        <td class="tg-031e">' . $pet->getBreed() . '</td>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-vn4c">Age:</td>';
            echo '        <td class="tg-vn4c">' . $pet->getAge() . '</td>';
            echo '    </tr>';
            echo '    <tr>';
            echo '        <td class="tg-031e">About Me:</td>';
            echo '        <td class="tg-031e">' . $pet->getDesc() . '</td>';
            echo '    </tr>';
            echo '</table>';
            
            
            /*
            echo '<div class="col-md-4" id = "roundedCorners">';
                echo '<p style ="font-size:30px;">Name: '.$pet->getName() . '</p>';
                echo '<p style ="font-size:30px;">Status: '.$pet->getStatus() . '</p>';
                echo '<p style ="font-size:30px">Gender: '.$pet->getSex() .'</p>';
                echo '<p style ="font-size:30px">Pet Hometown: '.$owner->getCity() . '</p>';
                echo '<p style ="font-size:30px">Breed: '.$pet->getBreed() . '</p>';
                echo '<p style ="font-size:30px" >Age: '.$pet->getAge() . '</p>';
                echo '<p style ="font-size:30px" >About Me: '.$pet->getDesc() . '</p>';
                echo '<a href="contact_owner.php?pet_id='. $pet->getID() .'" class="btn btn-primary btn-lg">Contact Owner</a>';
            echo '</div>';*/
            
        
        echo '<div class="col-md-6 col-md-offset-4" style = "width: 50%; text-align:center">';
        echo '<br>';
        echo '<a href="contact_owner.php?pet_id='. $pet->getID() .'" class="btn btn-primary btn-lg" style=" margin-left:-160px; box-shadow: 10px 10px 5px #888888;">Contact Owner</a>';
        echo '</div>';       
        echo '</div>';
        echo '</div>';
        echo '<br>';
        //echo '<div class="row"> <p style = "font-size:20px">Hello, Eveyone my name is '.$pet->getName() . ' and below is my summary!</p>';
        // echo '<p> '. $pet->getDesc().'</p>';
        //echo '</div>';
        //echo '</div>';
        ?>
        <p>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'footer.php'; ?>


