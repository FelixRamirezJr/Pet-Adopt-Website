

<?php
//session_start();

include ('session.php');
//session_destroy();

if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}

?>
