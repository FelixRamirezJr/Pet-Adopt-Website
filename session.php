<?php
    include('login.php');
    include_once 'Utils.php';
?>

<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

//echo "Connected successfully";
//session_start();// Starting Session
// Storing Session
//$username=$_POST['username'];
//$_SESSION['login_user']= $username;

if(isset($_SESSION['login_user']))
{$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"select username from registered_user where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
//header('Location: index.php'); // Redirecting To Home Page
}
}
?>
