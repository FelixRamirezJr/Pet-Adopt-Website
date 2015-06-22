<?php
include 'navbar.php';
include 'functions.php';
include 'image_resize.php';
include_once 'Utils.php';
?>

<?php
$dbAccess = new data();
$connection = $dbAccess->accessData();
/* if (isset($_SESSION['login_user'])) {
  echo "THIS USER IS (for debugging) " . $_SESSION['login_user'] . ".\n\n";
  } */
$_SESSION['url'] = filter_input(INPUT_SERVER, 'REQUEST_URI');
/* echo "The requested URL is " . $_SESSION['url'] . ".\n"; */

//error variable
$_SESSION['pet_prifile_error'] = "Please make sure all required fields are filled out.";


if (filter_input_array(INPUT_POST)) {
//define variables and set them to the user input contained in the $_POST array
    $name = sanitize_user_input($_POST["name"]);
    $type = sanitize_user_input($_POST["type"]);
    $breed = sanitize_user_input($_POST["breed"]);
    $gender = sanitize_user_input($_POST["gender"]);
    $age = sanitize_user_input($_POST["age"]);
    $description = sanitize_user_input($_POST["description"]);
    $status = sanitize_user_input($_POST["status"]);
    // if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
    
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0 && $_FILES['image']['size'] < 2000000) {
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
            echo "<script type='text/javascript'>alert('Sorry but we can accept JPEG or GIF as upload.')</script>";
            $data = null;
        }
        
    }

    /*if ($connection) {
        echo "Database connection successfully!\n";
    } else {
        echo "Failed to connect to mysql: " . mysqli_connect_error();
        exit(1);
        mysqli_close();
    }*/

    //get session for the current user
    $current_user = $_SESSION['login_user'];

    //make a pet object
    $pet = new pet($name, $type, $breed, $gender, $age, $description, $status, null);

    //insert into pet database
    if ($data == null) {
        
    } else {
        $pet->insertPet($breed, $current_user, $name, $type, $gender, $status, $description, $age, $data, $connection);
    }
}
?>
<html>
    <head>
        <title>Pet Registration</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
            /*label {
                display: inline-block;
                width: 150px;
                text-align: right;
                vertical-align: top;
            }*/

            /*button, select {
                text-transform: none;
                width: 100%;
            }*/
        </style>
    </head>
    <body style="background-color: #CCFFFF;">

        
            <?php if (isset($_SESSION['login_user'])): ?>


        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <h1>Donate Pet</h1>
                </div>
            </div> 
        </div>
            <br>
            
            <div class="container" style="background-color:#66CCCC; box-shadow: 10px 10px 5px #888888;">
            <h1>To donate your pet, please fill out the form below.</h1>
                <h5>* indicates the field is required.</h5>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form-horizontal"  role="form">

                    <div class="form-group">
                        <label class="control-label col-md-6" style=""for="name">Name *</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Pet's name" maxlength="30" size="20" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" style=""for="description">Pet Type *</label>
                        <div class="col-sm-10">
                            <select name="type" required style="width: 495px">
                                <option disabled selected></option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" style=""for="Breed">Breed *</label>
                        <div class="col-sm-10">
                            <input type="text" name="breed" class="form-control" id="breed" placeholder="Pet's Breed" maxlength="30" size="20" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" for="sex">Sex *</label>
                        <div class="col-sm-10">
                            <select name="gender" required style="width: 495px">
                                <option disabled selected></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" style=""for="description">Age *</label>
                        <div class="col-sm-10">
                            <select name="age" required style="width: 495px">
                                <option disabled selected></option>
                                <option value="baby">baby</option>
                                <option value="young">young</option>
                                <option value="adult">adult</option>
                                <option value="senior">senior</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" style=""for="description">Description *</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" placeholder="Enter description here..." rows="3" maxlength="256" required></textarea>&nbsp&nbsp
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" for="photo">Please upload a photo of your pet</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="fileToUpload" required>&nbsp*
                        </div>
                    </div>

                    <div class="form-group" hidden="true">
                        <label class="control-label col-md-6" for="description">Status of the Pet</label>
                        <div class="col-sm-10">
                            <select name="status" required>
                                <option value="pet is available">Pet is Available</option>
                                <option value="pending">Pending</option>
                                <option value="adopted">Pet is Adopted</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group"> 
                        <label class="control-label col-md-6"></label>
                        <div class="col-sm-10">
                                <input type="submit" value="Donate Pet" name="submit" class="btn btn-primary">
                        </div>
                    </div>

                </form>
                <br>
            </div>
            <br>
              
            <?php else: ?>
                  
    

<div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                    <h1>
                        Please Sign In or Sign Up
                    </h1>
                </div>
            </div> 
        </div>
<br>


  <div class="container">
    <div class="row">
      <div class="col-md-5 text-center" style="background-color:#003366; color:white; padding:10px 10px 10px 10px; margin:3%; border-radius:50px; box-shadow: 10px 10px 5px #888888;">
          <br>
          <img class = "displayed" style="height:200px;width:200px;" src="assets/images/Cool-dog2.jpg" class="img img-responsive">
          <hr>
          <br>
          <h3>To Sign In please click <br><a href="#sign_in" data-toggle="modal" data-target="#sign_in">Here!</a></h3>
          <br>
      </div>
        
      <div class="col-md-5 col-md-offset-2 text-center" style="background-color:#003366; color:white; padding:10px 10px 10px 10px; margin:3%; border-radius:50px; box-shadow: 10px 10px 5px #888888;">
          <br>
          <img class = "displayed" style="height:200px;width:200px;" src="assets/images/Cool-dog2.jpg" class="img img-responsive">
          <hr>
          <br>
          <h3>To Sign Up please click <br><a href="user_register_form.php">Here!</a></h3>
          <br>
      </div>
        
        </div>
      </div>
    <br>
    <br>
    <br>
        
                <!--<h5 style="text-align:center">Sign in to donate your pet.</h5>-->
            <?php endif; ?>   
        </div>
        <?php include 'footer.php'; 
 