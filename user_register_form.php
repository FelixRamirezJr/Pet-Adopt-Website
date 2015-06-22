<?php include 'navbar.php'; ?>

<?php
//include('login.php'); // Includes Login Script

if (isset($_SESSION['login_user'])) {
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
                width: 200px;
                text-align: right;
            }


            /*form {
                margin-bottom: 1em;
            }
            user agent stylesheetform {
                display: block;
                margin-top: 0em;
            }*/


        </style>
    </head>
    
    <body style="background-color: #CCFFFF; ">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                    <h1>
                        User Registration
                    </h1>
                </div>
            </div> 
        </div>
    <br>
        <div class="container" style="box-shadow: 20px 10px 5px #888888;">
            <!--<h1 style="text-align: center">User Registration</h1>
            <p style="text-align: center;">Please fill out the form below to register for a new account!</p>

            <form action="user_register.php" method="post" enctype="multipart/form-data">
                <label>Username:</label>
                <input type="text" name="username" maxlength="30" size="20" required>
                <br>
                <label> First Name:</label>
                <input type="text" name="firstname" maxlength="30" size="20">
                <br>
                <label> Last Name:</label>
                <input type="text" name="lastname" maxlength="30" size="20">
                <br>
                <label>Password:</label>
                <input type ="password" name="password" maxlength="30" size="20" required>
                <br>
                <label>Confirm Password:</label>
                <input type ="password" name="password" maxlength="30" size="20" required>
                <br>
                <label>Phone Number:</label>
                <input type ="text" name="phone_number" maxlength="20" size="20" required>
                <br>
                <label>Secondary Email:</label>
                <input type ="text" name="sec_email" maxlength="20" size="20">
                <br>
                <label>City:</label>
                <input type ="text" name="city" maxlength="10" size="20">
                <br><label>&nbsp</label>
                <input type="checkbox" required>
                <font style="font-size: 13px">I have read and accept the <u>
                    <a><span class="popup" onClick="javascript:window.open('TOC.html', '_blank', 'toolbar=no,width=400,height=450');">
                            Terms and Conditions</span></a></u>.
                </font>
                <br>
                <input type="submit" value="Submit" name="submit">
            </form>-->


            <!--////////////////////////////-->




            <!--
            <h1>User Registration</h1>
            <h3 style="text-align: center;">
                <em>Please fill out the form below to register for a new account!
                </em>
            </h3>

            <form role="form">
                <div class="row" style="margin:0 auto">
                    <div class="form-group col-md-5 ">
                        <label for="code">User Name</label>
                        <input type="text" name="username"class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label for="code">Password</label>
                        <input type="text" name="password"class="form-control input-normal" />
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label for="code">Confirm Password</label>
                        <input type="text" name="password"class="form-control input-normal" />
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label for="code">City</label>
                        <input type="text" name="password"class="form-control input-normal" />
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            -->



            <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->



            <!--<h1>User Registration</h1>--><!--Filled in above-->
            <div class="container" style="background-color:#66CCCC">
            <h1>Please fill out the form below to register for a new account!</h1>
            <h5>* indicates the field is required.</h5>


            <form action="user_register.php" method="post" enctype="multipart/form-data" class="form-horizontal"  role="form">

                <div class="form-group">
                    <label class="control-label col-md-6" style=""for="username">User Name *</label></br>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter user name" maxlength="30" size="20" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-6" for="email">First Name</label><br>
                    <div class="col-sm-10">
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter first name" maxlength="30" size="20">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-6" style="float: left " for="email">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter last name" maxlength="30" size="20">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-6" for="password">Password *</label>
                    <div class="col-sm-10"> 
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" maxlength="30" size="20" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-6" for="passwordconfirmation">Confirm Password *</label>
                    <div class="col-sm-10"> 
                        <input type="password" name="password" class="form-control" id="passwordcofirmation" placeholder="Confirm password" maxlength="30" size="20" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-6" for="Phone number">Phone Number</label>
                    <div class="col-sm-10"> 
                        <input type="text" name="phone_number" class="form-control" id="phone number" placeholder="Enter phone number" maxlength="20" size="20">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-6" for="Phone number">Email</label>
                    <div class="col-sm-10"> 
                        <input type="email" name="sec_email" class="form-control" id="Secondary email" placeholder="Enter email" maxlength="20" size="20">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-6" for="city">City *</label>
                    <div class="col-sm-10"> 
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" maxlength="50" size="20" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label for="terms and conditions">
                            <input type="checkbox" required>
                            I have read and accept the </label>
                        <a><span class="popup" onclick="javascript:window.open('TOC.html', '_blank', 'toolbar=no,width=400,height=450');">
                                Terms and Conditions. *</span></a>
                        </label>
                    </div>
                </div>    


                <div class="form-group"> 
                    <div class="col-md-6">
                        <input type="submit" value="Sign Up" name="submit" class="btn btn-primary">
                    </div>
                </div>

            </form>
            </div>


        </div>
    <br>
        <?php
        include 'footer.php';
        