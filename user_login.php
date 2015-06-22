<?php include 'navbar.php'; ?>

<?php
//include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: index.php");
}
?>

<html>
    <head>
        <title>User Registration</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
            label {
                display: inline-block;
                width: 90px;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php echo "The requested URL is " . isset($_SERVER['url']) . ".\n"; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>User Registration</h3>
                        <p style="text-align: center;">Sign Up!</p>
                        <hr>
                        <form action="user_register.php" method="post" enctype="multipart/form-data">
                            <label>Username:</label>
                            <input type="text" name="username" maxlength="30" size="20" required="">
                            <br>
			    <label> First Name:</label>
			    <input type="text" name="firstname" maxlength="30" size="20">
			    <br>
		            <label> Last Name:</label>
                            <input type="text" name="lastname" maxlength="30" size="20">
                            <br>
                            <label>Password:</label>
                            <input type ="password" name="password" maxlength="30" size="20" required="">
                            <br>
                            <label>Confirm Password:</label>
                            <input type ="password" name="password" maxlength="30" size="20" required="">
                            <br>
                            <label>Phone Number:</label>
                            <input type ="text" name="phone_number" maxlength="20" size="20" required="">
                            <br>
                           <label>Secondary Email:</label>
                            <input type ="text" name="sec_email" maxlength="20" size="20">
                            <br>
                            <label>City:</label>
                            <input type ="text" name="city" maxlength="10" size="20">
                            <br>
                            <input type="submit" value="Submit" name="submit">
                        </form>                   
                    </div>

                </div>


                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>Sing in, please sing along.</h3>
                        <p style="text-align: center;">Sign In!</p>
                        <hr>
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            <label>Username:</label>
                            <input type="text" name="username" maxlength="30" size="20" required="">
                            <br>
                            <hr>
                            <label>Password:</label>
                            <input type ="password" name="password" maxlength="30" size="20" required="">
                            <br>
                            <input type="submit" value="Sign In" name="submit">
                        </form> 

                    </div>
                </div>
            </div>
        </div>
<?php
include 'footer.php';
