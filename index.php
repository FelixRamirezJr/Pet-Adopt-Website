<?php
include 'navbar.php';
include_once 'Utils.php';
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
        <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
        <!-- Custom CSS -->
        <link href="css/index.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <!--<link href="css/bootStrap.css" rel="stylesheet">-->
    </head>

    <body style="background-color: #CCFFFF;">
        <!-- Carousel
        ================================================== -->
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <img style="height: 100%" src="http://www.murphydogstudios.com/data/photos/1947_1_DSC1462.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            
    
                                <h1><b>PetPal</b></h1>
                                <h3>Pet Donations and Adoptions</h3>
                           
                            <!--<p class="lead">The best Web service for connecting pet owners and pet adopters</p>-->
                            <div class="buttons" style="margin-top:300px">
                                <div class="clearfix"> 
                                    <a href="#search_ui" class="btn btn-primary" id="padding">Click here to start your pet search</a>
                                    <a href="pet_registration.php" class="btn btn-primary" id="padding">Click here to donate a pet</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img style="height: 100%" src="https://www.purina.com/media/490945/08-How-can-I-prevent-obesity-for-my-cat-and-help-her-loose-weight-_hero.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption text-centered">
                            <h1><b>PetPal</b></h1>
                            <h3>Pet Donations and Adoptions</h3>

                            <!--<p class="lead">The best Web service for connecting pet owners and pet adopters</p>-->
                            <div class="buttons" style="margin-top:300px">   
                                <a href="#search_ui" class="btn btn-primary" id="padding">Click here to start your pet search</a>
                                <a href="pet_registration.php" class="btn btn-primary" id="padding">Click here to donate a pet</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img style="height: 100%" src="http://www.3d-hdwallpaper.com//bulk_images/desktop-photography-dogs-dowload.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1><b>PetPal</b></h1>
                            <h3>Pet Donations and Adoptions</h3>
                            <!--<p class="lead">The best Web service for connecting pet owners and pet adopters</p>-->
                            <div class="buttons" style="margin-top:300px;">
                                <a href="#search_ui" class="btn btn-primary" id="padding" >Click here to start your pet search</a>
                                <a href="pet_registration.php" class="btn btn-primary" id="padding" >Click here to donate a pet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel -->
        
        <div class="container-fluid" id="search_ui" style="margin-top: -6%;">
            <div class="row">
                <!--<div class="col-md-12 col-xs-12">-->
                    
                    <div class="search" align="center">
                        <div style="margin-top: 60px">
                        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                                <h1>Pet Search</h1>
                                </div>
                            </div> 
                        </div>
                        </div>
                        <br>
                        <div class="container" style="background-color:#66CCCC; box-shadow: 10px 10px 5px #888888;">
                        <h1>Start your pet search by selecting the options below </h1>
                        <h3>or simply click the <em>"Search for pets"</em> button to search any pet!</h3>
                        <hr>

                        <form name="PetSearch" action="listing.php" method="get">
                            <label id="homelabel">Pet Type :</label>
                            <select name="type" class="Dropdown" id="dmenu"  style="width:160px">
                                <option value="any">Any</option>
                                <option value="cat">Cat</option>
                                <option value="dog">Dog</option>
                            </select>

                            <label id="homelabel">Pet Sex :</label>
                            <select name="gender" class="Dropdown" id="dmenu" style="width:160px">
                                <option value="any">Any</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>

                            <label id="homelabel">Pet Age :</label>
                            <select name="age" class="Dropdown" id="dmenu"  style="width:160px">
                                <option value="any">Any</option>
                                <option value="baby">Baby</option>
                                <option value="young">Young</option>
                                <option value="adult">Adult</option>
                                <option value="senior">Senior</option> 
                            </select>
                            <br>
                            <div class="form-group"> 
                                <br>
                                <input type="submit" value="Search for pets" name="page" class="btn btn-primary">
                            </div>
                        </form>
                        </div> 
                        <br>
                    </div> 
                <!--</div>-->
            </div>
        </div>
        <!--</div><!--wrapper-->
        <!--User Statements -->
<div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3> User Reviews </h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 text-center">
          <img class = "displayed" style="height:150px;width:150px; border-radius:100px; "src="assets/images/Puppyman.jpg" class="img img-responsive">
          <h4>Ref 1</h4>
          <p>I have been a member of PetPals for over 10 years and I love their puppy selection!  <br> -Puppy Dude</p>
      </div>
        
      <div class="col-md-4 text-center">
          <img class = "displayed" style="height:150px;width:150px; border-radius:100px; "src="assets/images/Mark-Twain.jpg" class="img img-responsive">
          <h4>Ref 2</h4>
          <p>It's not the size of the dog in the fight, it is the size of the fight in the dog <br> -Mark Twain</p>
      </div>
        
      <div class="col-md-4 text-center">
          <img class = "displayed" style="height:150px;width:150px; border-radius:100px; "src="assets/images/Obama.jpg" class="img img-responsive">
          <h4>Ref 3</h4>
          <p> I'm Obama and I approve of this site. <br> -Fake Obama</p>
      </div>
    <!--    
      <div class="col-md-3 text-center">
          <img class = "displayed"  style="height:200px;width:200px;"src="assets/images/Cool-dog2.jpg" class="img img-responsive">
          <h4>Privacy</h4>
          <p>All humans have three lives: public, private, and secret. <br> - Gabriel Marquez </p>
      </div>
    -->    
    </div>
  </div>
</div>        
    </body>
    <?php
    include 'footer.php';
    
