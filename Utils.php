<?php
include 'functions.php';

////////////////////////////////////////////////////////////////////////
// The pet class defines all variable that is needed to retrieve a pet
// from the database.  It will have the id, type, sex and age.
////////////////////////////////////////////////////////////////////////
class pet {
    private $pet_name;
    private $pet_type;
    private $pet_breed;
    private $pet_sex;
    private $pet_age;
    private $pet_description;
    private $pet_status;
    private $pet_id;
    private $pet_image;
    private $pet_thumbnail;
    
    function __construct($newName, $newType, $newBreed, $newSex, $newAge, $newDesc, $newStat, $petNewID) {
        $this->pet_name = $newName;
        $this->pet_type = $newType;
        $this->pet_breed = $newBreed;
        $this->pet_sex = $newSex;
        $this->pet_age = $newAge;
        $this->pet_description = $newDesc;
        $this->pet_status = $newStat;
        $this->pet_id = $petNewID;
    }
    
    //set the status of the pet
    public function setStatus($status) {
        $this->pet_status = $status;
    }
    
    //set the image variable
    public function setPetPicture($newImage) {
        $this->pet_image = $newImage;
    }
    
    //get the thumbnail image of the pet
    public function getImage() {
        return $this->pet_image;
    }
    
    //get the name of the pet
    public function getName() {
        return $this->pet_name;
    }
    
    //get the id of the pet
    public function getID() {
        return $this->pet_id;
    }
    
    //get the type of the pet
    public function getType() {
        return $this->pet_type;
    }
    
    //get the breed of the pet
    public function getBreed() {
        return $this->pet_breed;
    }
    
    //get the sex of the pet
    public function getSex() {
        return $this->pet_sex;
    }
    
    //get the age of the pet
    public function getAge() {
        return $this->pet_age;
    }
    
    //get the description of the pet
    public function getDesc() {
        return $this->pet_description;
    }
    
    //get the status of the pet
    public function getStatus() {
        return $this->pet_status;
    }
    
    //display the pet information after a search is done
    public function getPetSummary() {
        echo '<a href="pet_profile.php?pet_id='. $this->getID() .'" >';
        echo '<div class="col-md-3" style="margin:1%; border-radius: 25px; box-shadow: 10px 10px 5px #888888;';
        if ($this->getSex() == 'male') {
            //echo 'background-color: turquoise;">';
            echo 'background-color: #003366;">';
        } else {
            //echo 'background-color: pink;">';
            echo 'background-color: #FF3366;">';
        }
        echo '<ul>';
        echo '<img class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($this->getImage()) . '" style="height: 170px; width: 170px; margin-top: 15px;">';
        echo '<br>';
        //echo '<table style="font-size: 20px; align:center;">';
        //echo '<tr style="height: 75px; vertical-align: top;">';
        /*
         * echo '<tr><th>Name:&nbsp</th><th>' . $this->getName() . '</th></tr>';
        echo '<tr><td>Type:&nbsp</td><td>' . $this->getType() . '</td></tr>';
        echo '<tr><td>Sex:&nbsp</td><td>'  . $this->getSex()  . '</td>';
        echo '</tr></table></ul></a>';
        echo '</div>';
         * 
         */
        echo '<style type="text/css">';
        echo '.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}';
        echo '.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}';
        echo '.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}';
        echo '.tg .tg-s6z2{text-align:center}';
        echo '.tg .tg-vn4c{background-color:#D2E4FC}';
        echo '.tg {width:100%; 
                   margin-left:-10%; }';
        echo '</style>';
        echo '<table class="tg" text-align="center">';
        echo '    <tr>';
        echo '        <th class="tg-s6z2" colspan = "2">Name: ' . $this->getName() . '</th>';
        //echo '        <th class="tg-031e">' . $this->getName() . '</th>';
        echo '    </tr>';
        echo '    <tr>';
        echo '        <td class="tg-vn4c">Type: </td>';
        echo '        <td class="tg-vn4c">' . $this->getType() . '</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '        <td class="tg-031e">Sex: </td>';
        echo '       <td class="tg-031e">'  . $this->getSex()  . '</td>';
        echo '    </tr>';
        echo '</table>';
        echo '<br>';
        echo '</div></a>';
    }
    
    //display the pet information on the owner's pet management page
    public function petShortInfo($pet, $tempID) {
        echo '<a href="?pet_id='. $pet->getID() .'" >';
        echo '<div class="col-md-3" ';
        if ($tempID==$this->pet_id) {
            echo 'style="border-radius: 25px; border: 4px solid; height: 130;"';
        }
        echo '>';
        echo '<ul>';
        echo '<img class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($pet->getImage()) . '" style="height: 100px; width: 100px; margin-top: 4px;"">';
        echo '<table style="font-size: 12px;"><tr style="height: 55px; vertical-align: top;"><td>Name:&nbsp</td><td>' . $pet->getName() . '</td></tr>';
        echo '</tr></table></ul></div></a>';
    }
    
    //Displays the pet information and allows the administrator to change the status of the pet
    public function adminPetMod($connection, $petOwner, $admin) {
        
        echo '<div class="col-md-8" id="petMod" style="background-size: 100%"><left><br>';
        echo '<img style="box-shadow: 10px 10px 5px #888888;" class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($this->getImage()) . '"">';
        echo '<br>';
        
        echo '<table class="tg" style="box-shadow: 10px 10px 5px #888888;">';
        echo '    <tr>';
        echo '      <th class="tg-s6z2">Name</th>';
        echo '      <th class="tg-031e">'.$this->getName().'</th>';
        echo '    </tr>';
        echo '    <tr>';
        echo '      <td class="tg-vn4c">Type</td>';
        echo '      <td class="tg-vn4c">'.$this->getType().'</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '      <td class="tg-031e">Breed</td>';
        echo '      <td class="tg-031e">'.$this->getBreed().'</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '      <td class="tg-vn4c">Sex</td>';
        echo '      <td class="tg-vn4c">'.$this->getSex().'</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '      <td class="tg-031e">Age</td>';
        echo '      <td class="tg-031e">'.$this->getAge().'</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '      <td class="tg-vn4c">Description</td>';
        echo '      <td class="tg-vn4c">'.$this->getDesc().'</td>';
        echo '    </tr>';
        echo '</table>';
        echo '</br>';
        /*
        echo '<table><tr>';
        echo '<th>Pet Name:</th><th>'.$this->getName().'</th></tr>';
        echo '<th>Pet Type:</th><th>'.$this->getType().'</th></tr>';
        echo '<th>Pet Breed:</th><th>'.$this->getBreed().'</th></tr>';
        echo '<th>Pet Sex:</th><th>'.$this->getSex().'</th></tr>';
        echo '<th>Pet Age:</th><th>'.$this->getAge().'</th></tr>';
        echo '<th>Pet Description:</th><th>'.$this->getDesc().'</th></tr>';
        */
        
        echo '<form method="post">';
        echo '<th>Change Status to:</th><th>';
        echo '<select name="status" style="width:160px">';
        echo '<option value="pet is available" ';
        if ($this->getStatus()=='pet is available') {echo 'selected="selected"';}
        echo'>Pet is Available</option>';
        echo '<option value="pending" ';
        if ($this->getStatus()=='pending') {echo 'selected="selected"';}
        echo'>Pending</option>';
        echo '<option value="adopted" ';
        if ($this->getStatus()=='adopted') {echo 'selected="selected"';}
        echo'>Adopted</option>';
        echo '<option value="locked"';
        if ($this->getStatus()=='locked') {echo 'selected="selected"';}
        echo'>Locked</option></select></th></tr></table>';
        
        echo '<br>';
        echo '<br>';
        echo '<input type="submit" value="Submit" name="adminSubmit" class="btn btn-primary" style="box-shadow: 5px 5px 3px #888888;">'
        . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-primary" style="box-shadow: 5px 5px 3px #888888;" href="admin_page.php?name=&id=&username=">Cancel</a></form><br><br></div>';
        
        if (isset($_POST["adminSubmit"])) {
            $status = sanitize_user_input($_POST["status"]);
            $id = $this->getID();
            
            
            //insert into pet age table
            $query = "UPDATE pet_profile "
            . "SET status='$status' "
            . "WHERE pet_id='$id'";
            mysqli_query($connection, $query);
        
            //check to see if data has been upload
            if (mysqli_commit($connection)) {
                if ($status == 'locked') {
                $message = 'The pet profile has violated the Term of Use. Please'
                        . ' correct the issue and the pet profile will be unlocked. '
                        . 'If you have any questions, please reply to this message '
                        . 'and we will get back to you.';
                $email = new Email($petOwner, $admin, $message, $this->getID());
                $email->send($connection);
                echo "<script type='text/javascript'>alert('Pet status has been changed to ".$status."! A message has been sent to the owner saying the pet profile has violated Term of Use.')</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Pet status has been changed to ".$status."!')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Updated has failed.')</script>";
            }
            
            

            mysqli_close($connection);
        }
    
    }
    
    //display the pet information which can be edit
    public function petMod($connection) {
        echo '<div class="col-md-3" id="petMod" style="background-size: 100%"><left><br>';
        echo '<img class="img-responsive" alt="" src="data:image/jpeg;base64,' . base64_encode($this->getImage()) . '"">';
        if ($this->getStatus()=='locked') {echo '<font size="10" color="red" style="position: absolute; top: 100px; left: 40px;">LOCKED</font>';};
        echo '<h6 style="text-align: left">* indicates the field is required.</h6>';

        //get and display the pet's name
        echo '<form method="post" enctype="multipart/form-data">';
        echo '<br><label id="labelPet">*Pet Name:</label>';
        echo '<input type="text" name="name" value="'.$this->getName().'" style="width:160px" maxlength="20" required>';
        echo '<br>';
        
        //get and display the pet's type
        echo '<br><label id="labelPet">*Pet type:</label>';
        echo '<select name="type" style="width:160px" required>';
        echo '<option value="dog" ';
        if ($this->getType()=='dog') {echo 'selected="selected"';}
        echo'>Dog</option>';
        echo '<option value="cat" ';
        if ($this->getType()=='cat') {echo 'selected="selected"';}
        echo '>Cat</option></select>';
        echo '<br>';
        
        //get and display the pet's breed
        echo '<br><label id="labelPet">*Breed:</label>';
        echo '<input type="text" name="breed" value="'.$this->getBreed().'" style="width:160px" required>';
        echo '<br>';
        
        //get and display the pet's sex
        echo '<br><label id="labelPet">*Sex:</label>';
        echo '<select name="gender" style="width:160px" required>';
        echo '<option value="male" ';
        if ($this->getSex()=='male') {echo 'selected="selected"';}
        echo'>Male</option>';
        echo '<option value="female" ';
        if ($this->getSex()=='female') {echo 'selected="selected"';}
        echo'>Female</option></select>';
        echo '<br>';
        
        //get and display the pet's age
        echo '<br><label id="labelPet">*Age:</label>';
        echo '<select name="age" style="width:160px" required>';
        echo '<option value="baby" ';
        if ($this->getAge()=='baby') {echo 'selected="selected"';}
        echo'>Baby</option>';
        echo '<option value="young" ';
        if ($this->getAge()=='young') {echo 'selected="selected"';}
        echo'>Young</option>';
        echo '<option value="adult" ';
        if ($this->getAge()=='adult') {echo 'selected="selected"';}
        echo'>Adult</option>';
        echo '<option value="senior" ';
        if ($this->getAge()=='senior') {echo 'selected="selected"';}
        echo'>Senior</option></select>';
        echo '<br>';
        
        //get and display the pet's description
        echo '<br><label id="labelPet">Describe your pet in few words:</label>';
        echo '<textarea name="description" rows="10" cols="30" maxlength="256" style="width:160px">'.$this->getDesc().'</textarea>';
        echo '<br>';
        
        //get new picture of the pet
        echo '<br><label id="labelPet" for="photo">Upload new picture:</label>';
        echo '<input type="file" name="image" id="fileToUpload" style="width: 170px">';
        
        //get and display the status of the pet
        echo '<br><label id="labelPet">*Status of the Pet:</label>';
        echo '<select name="status" style="width:160px"';
        if ($this->getStatus()=='locked') {
            echo ' disabled>';
            echo '<option value="locked" disabled';
            if ($this->getStatus()=='locked') {echo 'selected="selected"';}
                echo'>Locked</option></select><br>';
        } else {
            echo '>';
            echo '<option value="pet is available" ';
            if ($this->getStatus()=='pet is available') {echo 'selected="selected"';}
                echo'>Pet is Available</option>';
                echo '<option value="pending" ';
            if ($this->getStatus()=='pending') {echo 'selected="selected"';}
                echo'>Pending</option>';
                echo '<option value="adopted" ';
            if ($this->getStatus()=='adopted') {echo 'selected="selected"';}
                echo'>Adopted</option></select><br>';
        }
        echo '<input type="submit" value="Submit" name="submit" class="btn btn-primary" style="margin-left: 100px;">'
        . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-primary" href="manage_pet.php?pet_id=null">Cancel</a></form></left><br></div>';
        
        if (filter_input_array(INPUT_POST)) {
            $name = sanitize_user_input($_POST["name"]);
            $type = sanitize_user_input($_POST["type"]);
            $breed = sanitize_user_input($_POST["breed"]);
            $gender = sanitize_user_input($_POST["gender"]);
            $age = sanitize_user_input($_POST["age"]);
            $description = sanitize_user_input($_POST["description"]);
            $status = sanitize_user_input($_POST["status"]);
            
            if (isset($_FILES['image']) && $_FILES['image']['size'] < 2000000) {
                $tmp_file = $_FILES['image']['tmp_name'];
                list($width, $height) = getimagesize($tmp_file);
                $newwidth = 250;
                $newheight = 250;
                $imageFileType = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if ($imageFileType == "jpg" || $imageFileType == "gif" || $imageFileType == "jpeg") {
                    switch($imageFileType) {
                    //resize a jpeg
                    case ("jpg"):
                    case ("jpeg"):
                        $source = imagecreatefromjpeg($tmp_file);
                        $thumbsmall = imagecreatetruecolor($newwidth, $newheight);
                        imagecopyresampled($thumbsmall, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                        imagejpeg($thumbsmall,$tmp_file,100);
                        break;
            
                    //resize a gif
                    case ("gif"):
                        $source = imagecreatefromgif($tmp_file);
                        $thumbsmall = imagecreatetruecolor($newwidth, $newheight);
                        imagecopyresampled($thumbsmall, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                        imagegif($thumbsmall,$tmp_file,100);
                        break;
                    }
            
                    $data = get_image($tmp_file);
                    imagedestroy($source);
                    imagedestroy($thumbsmall);
                } else {
                    $data = null;
                }
        
            } else {
                    $data = null;
            }
            
            if ($connection) {
                $pet = new pet($name, $type, $breed, $gender, $age, $description, $status, null);
            $pet->updatePet($this->getID(), $breed, $name, $type, $gender, $status, $description, $age, $data, $connection); 
            } else {
                echo "<script type='text/javascript'>alert('Updated has failed because we could not connect to the database.')</script>";
            exit(1);
            mysqli_close();
            }
            
        }
    }
    
    //insert into pet tables
    public function insertPet($breed, $current_user, $name, $type, $gender, $status, $description, $age, $data, $connection) {
        $query = "INSERT INTO pet_profile (pet_id, owner, name, type, gender, status, "
            . "description, register_date) VALUES (NULL, '$current_user', '$name', "
            . "'$type', '$gender', '$status', '$description', NULL)";
        
        mysqli_autocommit($connection, FALSE);
        
        //retrieve the pet id to be inserted in the other tables
        mysqli_query($connection, $query);
        $pet_id = mysqli_insert_id($connection);
        
        //insert into pet breed table
        $query = "INSERT INTO pet_breed (pet_id, breed_type) VALUES ('$pet_id', '$breed')";
        mysqli_query($connection, $query);
        
        //insert into pet age table
        $query = "INSERT INTO pet_age (pet_id, age_type) VALUES ('$pet_id', '$age')";
        mysqli_query($connection, $query);
        
        //insert into pet image table
        $query = "INSERT INTO pet_image (image_id, pet_id, resized_image, thumbnail) VALUES (1, '$pet_id', '$data', '$data')";
        mysqli_query($connection, $query);
        
        //check to see if data has been upload
        if (mysqli_commit($connection)) {
            echo "Your data has been successfully uploaded.\n";
        } else {
            echo "Smething went really wrong!" . mysqli_error_list($connection) . ".\n";
        }

        mysqli_close($connection);
    }
    
    //update pet
    public function updatePet($pet_id, $breed, $name, $type, $gender, $status, $description, $age, $image, $connection) {
        $query = "UPDATE pet_profile "
            . "SET name='$name', type='$type', gender='$gender', status='$status', description='$description'"
            . "WHERE pet_id='$pet_id'";
        mysqli_query($connection, $query);
        
        //insert into pet breed table
        $query = "UPDATE pet_breed "
            . "SET breed_type='$breed'"
            . "WHERE pet_id='$pet_id'";
        mysqli_query($connection, $query);
        
        //insert into pet age table
        $query = "UPDATE pet_age "
            . "SET age_type='$age'"
            . "WHERE pet_id='$pet_id'";
        mysqli_query($connection, $query);
        
        //insert into pet image table
        if ($image == null) {
        } else {
            $query = "UPDATE pet_image "
                . "SET thumbnail='$image'"
                . "WHERE pet_id='$pet_id' AND image_id='1'";
            mysqli_query($connection, $query);
        }
        
        //check to see if data has been upload
        if (mysqli_commit($connection)) {
            echo "<script type='text/javascript'>alert('Your pet profile has been updated!')</script>";
            echo '<meta http-equiv="refresh" content="0; url=manage_pet.php?pet_id='.$pet_id.'" />';
        } else {
            echo "<script type='text/javascript'>alert('Updated has failed.')</script>";
        }

        mysqli_close($connection);
    }
}

////////////////////////////////////////////////////////////////////////
// The user class defines all variable that is needed to retrieve or create
// a user from the database.  It will have username, first name, last name,
// phone number, and city.
////////////////////////////////////////////////////////////////////////
class user 
{
    private $user_name = null;
    private $user_firstname = null;
    private $user_lastname = null;
    private $user_number = null;
    private $user_city = null;
    private $user_email = null;
    private $user_isAdmin = false;
    
    function __construct($newName, $newFirst, $newLast, $newNumber, $newCity, $newEmail) {
        $this->user_name = $newName;
        $this->user_firstname = $newFirst;
        $this->user_lastname = $newLast;
        $this->user_number = $newNumber;
        $this->user_city = $newCity;
        $this->user_email = $newEmail;
    }
    
    //set the user ID of the selected pet for the pet profile
    public function setUser($newName, $newFirst, $newLast, $newNumber, $newCity) {
        $this->user_name = $newName;
        $this->user_firstname = $newType;
        $this->user_lastname = $newLast;
        $this->user_number = $newNumber;
        $this->user_city = $newCity;
    }
    
    //set the user administrative rights
    public function setAdmin($admin) {
        $this->user_isAdmin = $admin;
    }
    
    //get the username of the user
    public function getName() {
        return $this->user_name;
    }
    
    //get the first name of the user
    public function getFirst() {
        return $this->user_firstname;
    }
    
    //get the last name of the user
    public function getLast() {
        return $this->user_lastname;
    }
    
    //get the phone number of the user
    public function getNumber() {
        return $this->user_number;
    }
    
    //get the email of the user
    public function getEmail() {
        return $this->user_email;
    }
    
    //cehck to see if the user is an admin
    public function getAdmin() {
        return $this->user_isAdmin;
    }
    
    //get the name of the city that the user is originated from
    public function getCity() {
        return $this->user_city;
    }
    
    //update user
    public function updateUser($name, $fname, $lname, $city, $connection) {
        $query = "UPDATE registered_user "
            . "SET firstname='$fname', lastname='$lname', city='$city'"
            . "WHERE username='$name'";
        mysqli_query($connection, $query);
        
        //check to see if data has been upload
        if (mysqli_commit($connection)) {
            echo "<script type='text/javascript'>alert('User profile has been updated! Please reload the page.')</script>";
        } else {
            echo "<script type='text/javascript'>alert('Updated has failed.')</script>";
        }

        mysqli_close($connection);
    }
    
    //display the pet information which can be edit
    public function ownerMod($connection) {
        echo '<div class="col-md-3" id="petMod" style="background-size: 100%"><left><br>';
        echo '<h6 style="text-align: left">* indicates the field is required.</h6>';

        //get and display the pet's name
        echo '<form method="post">';
        echo '<hr id="petSep"><label id="labelPet">*Userame:</label>';
        echo '<input type="text" name="name" value="'.$this->getName().'" style="width:160px" maxlength="20" required>';
        
        //get and display the pet's breed
        echo '<hr id="petSep"><label id="labelPet">*First Name:</label>';
        echo '<input type="text" name="first name" value="'.$this->getFirst().'" style="width:160px" maxlength="20" required>';
        
        //get and display the pet's sex
        echo '<hr id="petSep"><label id="labelPet">*Last Name:</label>';
        echo '<input type="text" name="last name" value="'.$this->getLast().'" style="width:160px" maxlength="20" required>';
        
        //get and display the pet's age
        echo '<hr id="petSep"><label id="labelPet">*City:</label>';
        echo '<input type="text" name="city" value="'.$this->getCity().'" style="width:160px" maxlength="20" required>';
        
        echo '<input type="submit" value="Submit" name="submit" style="margin-left: 100px;">'
        . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="admin_page.php?name=Pet Name&id=Pet ID&username=Username">Cancel</a></form></left></div>';
        
        if (isset($_POST["submit"])) {
            $name = sanitize_user_input($_POST["name"]);
            $fname = sanitize_user_input($_POST["first name"]);
            $lname = sanitize_user_input($_POST["last name"]);
            $city = sanitize_user_input($_POST["city"]);
            
            
            if ($connection) {
                $user = new user($name, $fname, $lname, null, $city, null);
                $user->updateUser($name, $fname, $lname, $city, $connection);
            } else 
           {
                echo "<script type='text/javascript'>alert('Updated has failed because we could not connect to the database.')</script>";
            exit(1);
            mysqli_close();
            }
            
        }
    }
    
    //display the information in contact owner
    //UPDATE: Also allows to send an email VIA TextBox
    public function displayContact($owner,$user,$petID) 
    {
        echo '<div class="container col-md-offset-3" style="background-color: #003366; color: white; margin-top:-40px; box-shadow: 10px 10px 5px #888888; max-width:900px">';        
        echo '<h2> Hello, My name is '. $owner->getFirst() . ' ' . $owner->getLast() .'. I am the owner of this profile!<br>Below you will see my contact information!</h2>';
        //echo '<p>Email: ' . $owner->getEmail() . '</p>';
        //echo '<p>Phone Number: ' . $owner->getNumber() . '</p>';
        echo '<br>';
        echo '<h3 align="left">Name: ' . $owner->getFirst() . ' ' . $owner->getLast() .' </h3>';
        echo '<h3 align="left">City: ' . $owner->getCity() . '</h3>';
        echo '<br>';
        echo '<h3 align="left">Please send me a message. Thank you!</h3>';
        
        // Below Will Go The Sending Email Stuff
        
        // Start Of the Email Box //
        echo ' <div class="well">';
                   echo ' <p align="center">Send a Message: </p>';
                    echo '<form method="post" role="form" form action = "Sent.php">';
                    echo '<input type = "hidden" name ="user" value = "'.$user.'" >'; // This is sending the User Info
                    echo '<input type = "hidden" name ="owner" value = "'.$owner->getName().'" >'; // This is sending the Owner Info
                     echo '<input type = "hidden" name ="petid" value = "'.$petID.'" >'; // This is sending the Owner Info
                        echo '<div class="form-group">';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            echo '<textarea id= "textarea" name="textarea" class="form-control" rows="3" ></textarea>';
                        echo '</div>';
                        echo '<button type="submit" value = "send" name="submit" class="btn btn-primary">Send</button>';
                    echo '</form>';
                echo '</div>';
        // End of the Email Box
   
        echo '</div>'; // End Of The Div
        echo '<br>';
    }
    
}

class Email
{
    public $ownerName;
    public $ownerID;
    public $userName;
    public $userID;
    public $message;
    public $petID;
    
    // Constructor That will get the Correct Data To Sent For the Email Query
    function __construct ($owner,$user,$mess,$pID)
    {
    $this->ownerName = $owner;
    $this->userName = $user;
    $this->message = $mess;
    $this->petID = $pID;
    }
    
    // Should Send the Information The The Database.
    public function send ($connection)
    {
       // echo $this->message;
      
        
        $query = "INSERT INTO user_message (username, sender,pet_id,message,flag_status) VALUES ('$this->ownerName', '$this->userName','$this->petID','$this->message',0)";
        mysqli_query($connection, $query);
    }
    
    public function delete ($connection)
    {
     ini_set('error_reporting', E_ALL|E_STRICT);
     ini_set('display_errors', 1);
    
     $query = "DELETE "
            . "FROM user_message "
            . "WHERE sender='$this->ownerName' AND username='$this->userName' AND pet_id = '$this->petID' AND message='$this->message' ";
     mysqli_query($connection, $query);
    }
    
    
}

////////////////////////////////////////////////////////////////////////
// Administrator class that inherits everything from the user
///////////////////////////////////////////////////////////////////////
class admin extends user {
    
    //changes the rights for this special user
    public function setAdmin() {
        $this->user_isAdmin = true;
    }
}

////////////////////////////////////////////////////////////////////////
// Database access to search for any items of interest
///////////////////////////////////////////////////////////////////////

class data {
    private $DB_Server = "sfsuswe.com";
    private $DB_login = "s15g13";
    private $DB_password = "pawsrus13";
    private $DB_name = "student_s15g13";

    ////////////////////////////////////////////////////////////////////////
    // Check and try to access the database
    ///////////////////////////////////////////////////////////////////////
    public function accessData() 
    {
        $connection = mysqli_connect($this->DB_Server, $this->DB_login, $this->DB_password, $this->DB_name);
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_errno() .
            "(" . mysqli_connect_error() . ")");
        } else {
            return $connection;
        }
    }
    
    ////////////////////////////////////////////////////////////////////////
    // Insert User into the database
    ///////////////////////////////////////////////////////////////////////
    public function insertUser($username, $firstname, $lastname, $password, $encrypt_password, $phone_number, $sec_email, $city, $conn) {
        $sql = "INSERT INTO registered_user 
        VALUES ('$username','$firstname','$lastname', '$encrypt_password', '$phone_number', '$sec_email' , '$city', '0')";
        
        //check to see if the record was created
        if ($conn->query($sql) === TRUE) {
            echo "Welcome to Petpal ".$username."!";
            echo "<br>Your username is: ".$username;
            echo "<br>Your password is: ".$password;
            echo "<br>Please be sure to remember your password.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    ////////////////////////////////////////////////////////////////////////
    // This checks if the sex of the pet was specified
    ///////////////////////////////////////////////////////////////////////
    public function checkType ($type) {
        if($type == "Any" || $type == "any") {
            return false;
        } else {
            return true;    
        }
    }
    
    ///////////////////////////////////////////////////////////////////////
    // This checks if the sex of the pet was specified
    //////////////////////////////////////////////////////////////////////
    public function checkGender($sex) {
        if($sex == "Any" || $sex == "any") {
            return false;
        } else {
            return true;
        }
    }
    
    ///////////////////////////////////////////////////////////////////////
    // This checks if the age of the pet was specified
    //////////////////////////////////////////////////////////////////////
    public function checkAge($age) {
        if($age == "Any" || $age == "any") {
            return false;
        } else {
            return true;
        }
    }
    
    ///////////////////////////////////////////////////////////////////////
    // This checks for the pet's owner information
    //////////////////////////////////////////////////////////////////////
    public function petOwner($id) {
        $query = "SELECT * "
        . "FROM pet_profile "
        . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
        . "WHERE pet_profile.pet_id = '$id'";
        return $query;
    }
    
    ///////////////////////////////////////////////////////////////////////
    //check for user's administrative rights
    ///////////////////////////////////////////////////////////////////////
    public function checkAdminRight($username, $connection) {
        $query = "SELECT * "
            . "FROM registered_user "
            . "WHERE registered_user.username='$username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        return $row['admin'];
    }
    
    ///////////////////////////////////////////////////////////////////////
    // This checks for both user and pet profile so the user can manage the pets
    //////////////////////////////////////////////////////////////////////
    public function petProfileUser($username) {
        $query = "SELECT * "
        . "FROM registered_user "
        . "WHERE username = '$username'";
        return $query;
    }
    
    ///////////////////////////////////////////////////////////////////////
    // This checks for the pet's profile
    //////////////////////////////////////////////////////////////////////
    public function petProfile($id) {
        $query = "SELECT * "
        . "FROM pet_profile "
        . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
        . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
        . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
        . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
        . "WHERE pet_profile.pet_id = '$id'";
        return $query;
    }
    
    ///////////////////////////////////////////////////////////////////////
    // This checks for the pet's profile by name
    //////////////////////////////////////////////////////////////////////
    public function petProfileName($name) {
        $query = "SELECT * "
        . "FROM pet_profile "
        . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
        . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
        . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
        . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
        . "WHERE pet_profile.name = '$name'";
        return $query;
    }
    
    //////////////////////////////////////////////////////////////////////
    // Begin querying database with check for types, gender and age
    //////////////////////////////////////////////////////////////////////
    public function petSearch($dbAccess, $type, $age, $gender) {
        if (($dbAccess->checkType($type) == true) && ($dbAccess->checkGender($gender) == true) && ($dbAccess->checkAge($age) == true)) { //check for age, gender and type
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.type='$type' AND pet_profile.gender = '$gender' AND pet_age.age_type = '$age' AND pet_profile.status = 'Pet is Available'";
        } else if (($dbAccess->checkType($type) == true) && ($dbAccess->checkGender($gender) == true)) {  //check for gender and type
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.type='$type' AND pet_profile.gender = '$gender' AND pet_profile.status = 'Pet is Available'";
        } else if (($dbAccess->checkType($type) == true) && ($dbAccess->checkAge($age) == true)) {  //check for age and type
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.type='$type' AND pet_age.age_type = '$age' AND pet_profile.status = 'Pet is Available'";
        } else if (($dbAccess->checkGender($gender) == true) && ($dbAccess->checkAge($age) == true)) {  //check for gender and age
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.gender = '$gender' AND pet_age.age_type = '$age' AND pet_profile.status = 'Pet is Available'";
        } else if ($dbAccess->checkType($type) == true) {  //check for type only
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.type='$type' AND pet_profile.status = 'Pet is Available'";
        } else if ($dbAccess->checkGender($gender) == true) {  //check for gender only
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.gender = '$gender' AND pet_profile.status = 'Pet is Available'";
        } else if ($dbAccess->checkAge($age) == true) {  //check for age only
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_age.age_type = '$age' AND pet_profile.status = 'Pet is Available'";
        } else {  //list everything
            $query = "SELECT * "
            . "FROM pet_profile "
            . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
            . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
            . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
            . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
            . "WHERE pet_profile.status = 'Pet is Available'"; // This is the Query Statent
        }
        return $query;
    }
    
    //////////////////////////////////////////////////////////////////////
    // The owner search for their own pet's profile
    //////////////////////////////////////////////////////////////////////
    public function ownerPetSearch($owner) 
    {
        $query = "SELECT * "
        . "FROM pet_profile "
        . "INNER JOIN pet_age ON pet_profile.pet_id = pet_age.pet_id "
        . "INNER JOIN pet_breed ON pet_age.pet_id = pet_breed.pet_id "
        . "INNER JOIN pet_image ON pet_breed.pet_id = pet_image.pet_id AND pet_image.image_id = 1 "
        . "INNER JOIN registered_user ON pet_profile.owner = registered_user.username "
        . "WHERE registered_user.username = '$owner'";
        return $query;
    }
    
    public function emailSearch ($owner)
    {
     $query = "SELECT * "
            . "FROM user_message "
            . "WHERE user_message.username='$owner'";
        return $query;
    }
    
    public function deleteEmail ($owner,$user,$petID)
    {
        $query = "DELETE "
            . "FROM user_message "
            . "WHERE user_message.username='$owner' AND user_message.sender='$user' AND user_messsage.pet_id = '$petID' AND user.message.message = '$message'";
        return $query; 
    }
}

//////////////////////////////////////////////////////////////////////
// Creating an object called $data which will access the database
// for all pages with the line -- include_once 'Utils.php';
//////////////////////////////////////////////////////////////////////
$dbAccess = new data();
$connection = $dbAccess->accessData();

?>
