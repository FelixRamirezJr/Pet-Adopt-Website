<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$target_dir = "Images/";
//echo $target_dir;
//$description = $_POST["message"];
//echo $description;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo $target_file;


class BobDemo
{
  
    
    
 const DB_HOST = '184.73.174.64';
 const DB_NAME = 'student_s15g13';
 const DB_USER = 's15g13';
 const DB_PASSWORD = 'pawsrus13';
 
 private $conn = null;
 
 /**
 * Open the database connection
 */
 public function __construct(){
 // open database connection
 $connectionString = sprintf("mysql:host=%s;dbname=%s;charset=utf8",
 BobDemo::DB_HOST,
 BobDemo::DB_NAME);
 
 try {
 $this->conn = new PDO($connectionString,
 BobDemo::DB_USER,
 BobDemo::DB_PASSWORD);
 //for prior PHP 5.3.6
 //$conn->exec("set names utf8");
 
 } catch (PDOException $pe) {
 die($pe->getMessage());
 }
 
  echo "Connected to Database";

 }
 
 
 /**
 * close the database connection
 */
 
 
 public function __destruct() {
 // close the database connection
 $this->conn = null;
 
 
 }
 
 public function insertBlob($filePath,$mime){
     echo "Inside function 1";
 $blob = fopen($filePath,'rb');
 
// $sql = "insert into test values ('xyz')";
 //$stmt = $this->conn->prepare($sql);
 
 //$sql = "INSERT INTO petprofile(photo) VALUES(:photo)";
 
 $type = $_POST["type"];
 $age = $_POST["age"];
 $gender = $_POST["gender"];
 $status = $_POST["status"];
 
 $desc = $_POST["description"];
 $nam = $_POST["name"];
 $breed = $_POST["breed"];
 
 echo "This is the Data That was entered: ";
 echo $type . $age . $gender . $status . $desc . $nam . $breed ; 
 echo "This should have gone into the database";
 
 
 $sql = "INSERT INTO petprofile(photo,name,type,breed,gender,age,description,status) VALUES(:photo,'$nam', '$type' , '$breed' , '$gender', '$age', '$desc', '$status')";
 $stmt = $this->conn->prepare($sql);
 
 echo "You Upload Was Succesfull. You may seach for you pet and others can see your pet also.";
 
 //$stmt->bindParam(':mime',$mime);
 $stmt->bindParam(':photo',$blob,PDO::PARAM_LOB);
  echo "Inside the function";
 return $stmt->execute();

}



}


$blobObj = new BobDemo();
 
// test insert gif image
$blobObj->insertBlob($target_file,"image/gif");
        

	
