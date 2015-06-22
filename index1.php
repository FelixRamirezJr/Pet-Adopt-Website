
<?php
include('session.php');
?>




<?php include 'navbar.php'; ?>

<?php 
if(isset($_SESSION['login_user']))
{
echo "Welcome " . $_SESSION['login_user'] ;
}
?>

<html>
    <head>
        <title>Home</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
            #homelabel 
            {
                display: inline-block;
                width: 90px;
                text-align: right;
            }
        </style>
    </head>
    <body>
 
        <!-- <div class="intro">
             <h1>Give your pet for adoption!</h1>
             <h2>We will help find your pet a new home.</h2>
         </div>-->
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!--<div class="jumbotron"> -->
                            <h1 style="text-align: center;">PetPal Adoptions!</h1>
                            <div class="search" align="center">
                                <h4 style="text-align: center">What type of pet are you looking for? cat, dog, etc...</h4>
                                <form name="PetSearch" action="listing.php" method="get">
                                    <label id="homelabel">Pet Type :</label>
                                    <select name="type" class="Dropdown" id="type"  style="width:160px">
                                        <option value="any">Any</option>
                                        <option value="cat">Cat</option>
                                        <option value="dog">Dog</option>
                                    </select>
                                    <label id="homelabel">Pet Gender :</label>
                                    <select name="gender" class="Dropdown" id="gender" style="width:160px">
                                        <option value="any">Any</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                    <br>
                                    <label id="homelabel">Pet Age :</label>
                                    <select name="age" class="Dropdown" id="age"  style="width:160px">
                                        <option value="any">Any</option>
                                        <option value="baby">Baby</option>
                                        <option value="young">Young</option>
                                        <option value="adult">Adult</option>
                                        <option value="senior">Senior</option> 
                                    </select>
                                    <label id="homelabel">State :</label>
                                    <input type="text" name="state" id="state" style="width:160px" maxlength="20">
                                    <p>
                                        <input type="submit" value="Search for pets" style="font-family: Comic Sans MS; font-size: 25px"/>
                                    </p>
                                </form>


                                <ul class="nav">
                                    <li><a href="user_login.php">New User? Sign up!</a></li>
                                    <li><a href="register_pet.html">Click here to donate a pet!</a></li>
                                </ul>
                            </div> 
                        </div> 
                    <!--</div  End of jumbotron -->

                    <div class="col-md-6">
                                                       <!--style="max-width: 500px; margin: 0 auto" -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style =" margin-bottom: 0px;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="assets/images/asher.jpg" alt="German sheppard dog">

                                </div>

                                <div class="item">
                                    <img src="assets/images/lily.jpg" alt="American shorthair cat">
                                </div>

                                <div class="item">
                                    <img src="assets/images/boba.jpg" alt="Pug dog">

                                </div>

                                <div class="item">
                                    <img src="assets/images/simon.jpg" alt="British shorthair cat">
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div><!--End of container -->
            </div>
    </body>
</html>
<?php
include 'footer.php';
