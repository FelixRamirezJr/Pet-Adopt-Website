<?php
include_once 'Utils.php';
session_start(); // Starting Session

//handle all URI requests
if (isset($_SESSION['url'])) {
    $url = $_SESSION['url'];
    //trim forward slashes that is added for every page request
    //canonical problem
    $url = trim($url, '/');
} else {
    $url = "~s15g13/index.php";
}

$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        
        $encrypt_password = md5($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);
// Selecting Database
//$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.

        

        /* $servername = "184.73.174.64";
          $username_db = "s15g13";
          $password_db = "pawsrus13";
          $dbname = "student_s15g13";

          // Create connection
          $conn = new mysqli($servername, $username_db, $password_db, $dbname);

          // Check connection
          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          }
          echo "Connected successfully";
         */


        $query = mysqli_query($connection, "select * from registered_user where password='$encrypt_password' and username='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            echo "All right";
            $_SESSION['login_user'] = $username; // Initializing Session
            //shall redirect the user back to the page he just came from
            //in this case return to pet_registration.php
            header("Location: http://www.sfsuswe.com/$url");
            //header("location: index.php"); // Redirecting To Other Page
        } else {
            echo "<script type='text/javascript'>alert('Username or password is incorrect! Redirecting you to the homepage.')</script>";
            echo '<meta http-equiv="refresh" content="0; url=index.php" />';
            $error = "Username or Password is invalid";
        }
        mysqli_close($connection); // Closing Connection
    }
}
?>
