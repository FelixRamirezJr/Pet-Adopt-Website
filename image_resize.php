<?php
//handles all the logic to upload images

/*define("DB_Server", "sfsuswe.com");
define("DB_login", "s15g13");
define("DB_password", "pawsrus13");
define("DB_name", "student_s15g13");*/


//$pet_id as param
function get_image($tmp_file) {
   // if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        // Temporary file name stored on the server
        //$tmpName = $_FILES['image_to_upload']['tmp_name'];

        // Read the file 
        $fp = fopen($tmp_file, 'r');
        $data = fread($fp, filesize($tmp_file));
        $data = addslashes($data);
        fclose($fp);
        
        return $data;

        // Create the query and insert
       /* $connection = mysqli_connect(DB_Server, DB_login, DB_password, DB_name);
        if ($connection) {
            echo "Database connection successfully!\n";
        } else {
            echo "Failed to connect to mysql: " . mysqli_connect_error();
            exit(1);
            mysqli_close();
        }
        $pet_id = 46;
        $query = "INSERT INTO pet_image (image_id, pet_id, resized_image, thumbnail) VALUES (NULL, '$pet_id', '$data', '$data')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "Image uploaded successfully";
        } else {
            print "Something went wrong " . mysqli_error($connection) . ".\n";

            // Print results
            print "Thank you, your file has been uploaded.";
            print "No image selected/uploaded";
        }
        */
    }
//}

/*

  $connection = mysqli_connect(DB_Server, DB_login, DB_password, DB_name);
  if ($connection) {
  echo "Database connection successfully!\n";
  } else {
  echo "Failed to connect to mysql: " . mysqli_connect_error();
  exit(1);
  mysqli_close();
  }
  $pet_id = 46;
  $query = "INSERT INTO pet_image (image_id, pet_id, resized_image, thumbnail) VALUES (NULL, '$pet_id', NULL, NULL)";
  $result = mysqli_query($connection, $query);
  if($result){
  echo "Image uploaded successfully";
  }
  else{
  echo "Something went wrong " . mysqli_error($connection) . ".\n";

  } */
?>

<!--<h2>Please Choose a File and click Submit</h2>
<form enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
    <div><input name="image" type="file" /></div>
    <div><input type="submit" value="Image Upload" /></div>
</form>-->
