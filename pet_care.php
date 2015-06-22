<?php include 'navbar.php'; ?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <title>Pet Care</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <style>
            label {
                display: inline-block;
                width: 90px;
                text-align: right;
            }
        </style>
    </head>
    <body style="background-color: #CCFFFF;">

        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <h1>Pet Care</h1>
                </div>
            </div> 
        </div>
        <br>
        <br>
        <br>



<div class="container fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- begin panel group -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                <!-- panel 1 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab1" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingOne"data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2 class="panel-title collapsed" >Dog Tips</h2>
                        </div>
                    </span>
                    
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="box-shadow: 10px 10px 5px #888888;">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        Dogs are a man's best friend. Here are some quick tips to get your bestest buddy to perform his bestest.
                        <hr>
                        1) Feeding
                        <br>
                        Your little buddy needs food, but the question is, how much?
                        <br>
                        In general-
                        <br>
                        - Puppies 8 to 12 weeks old should have about 4 meals a day.
                        <br>
                        - Puppies 3 to 6 months old should have about 3 meals a day.
                        <br>
                        - Puppies 6 months to a year old should have about 2 meals a day.
                        <br>
                        - After your buddy reaches his first birthday, 1 meal a day will usually keep him satisfied.
                        <br>
                        It is to be noted that in some cases, splitting a meal into 2 smaller meals may be the better option.
                        <br>
                        
                        2) Grooming
                        <br>
                        People often neglect grooming, but it is an easy way to keep your dog clean and helps reduce shedding.
                        Dogs don't need to be bathed more than a couple times a year, but when you do wash your dog,
                        make sure to comb or cut out all mats from their coat. Also make sure to get ride of all soap residue as it tends to attract dirt.
                        
                        <br>
                        3) Exercise
                        <br>
                        Exercise is an important aspect of a dog's life. Walking, running, and playing, stimulate both mind and body.
                        It is a good practice to let your dog run free, as it lessens boredom, which is often the cause for destructive behavior.
                        The amount of exercise varies between different breeds, but always remember too much exercise is always better than too little.
                        
                        </div>
                    </div>
                </div> 
                <!-- / panel 1 -->
                
                <!-- panel 2 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab2" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h2 class="panel-title collapsed">Cat Tips</h2>
                        </div>
                    </span>

                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" style="box-shadow: 10px 10px 5px #888888;">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        Cats are a bit more independent, but still are great sources of joy for the more indoor type of person.
                        Here are some tips for your meowing pal.
                        <hr>
                        1) Feeding
                        <br>
                        Make sure to feed your cat a nutritionally balanced meal every day. Cats may vary,
                        so consider asking a veterinarian for meal advice. Always provide a bowl of fresh water.
                        <br>
                        2) Litter box
                        <br>
                        Cats, in general, are naturally clean and will instinctively use a liter box.
                        All you have to do is show them where it is. Do not over sell the liter box by mimicking bathroom gestures,
                        this will usually only bore the cat. Place the litter box is a relatively private place
                        and make sure to clean it every so often.                       
                        <br>
                        3) Grooming
                        <br>
                        Brushing your cat is a good way to keep your cat clean and reduce the amount of hair around your house.
                        Make sure to clip your cat's nails to prevent them from over growing into their paws. 
                        Lastly, grooming is a good way to bond with your cat, so make sure to groom your fluffy pal often.
                        </div>
                    </div>
                </div>
                <!-- / panel 2 -->
                
                <!--  panel 3 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab3" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingThree"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h2 class="panel-title">Other Tips</h2>
                        </div>
                    </span>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" style="box-shadow: 10px 10px 5px #888888;">
                          <div class="panel-body">
                          We do not offer any adoption services for other kinds of pets but we can offer you our advice.
                          
                          <hr>
                          
                          1)Keep track of your pet.
                          <br>
                          Keep good track of your pet. Collars and leashes will help, but always remember to check on your pet's comfort level,
                          especially if it is still young. Collars will stay relatively the same size as your pets grow throughout the weeks,
                          potentially causing an uncomfortable squeeze around the neck. If the pet does not need a collar,
                          make sure its environment is safe and reasonably spacious if possible.
                          
                          <br>
                          2) Feeding
                          <br>
                          Keep track of your pet's food intake. Check up with a veterinarian to understand the correct amount of food
                          you should serve your pet. Malnutrition can lead to complications later in life.
                          
                          </div>
                        </div>
                      </div>
            </div> <!-- / panel-group -->
             
        </div> <!-- /col-md-4 -->
        
        <div class="col-md-6">
            <!-- begin macbook pro mockup -->
            <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                    <!-- content goes here -->                
                        <div class="tab-featured-image">
                            <div class="tab-content">
                                <!--Tab1 Image -->
                                <div class="tab-pane  in active" id="tab1">
                                    
                                        <img style="height:350px;width:500px; box-shadow: 10px 10px 5px #888888;"src="assets/images/Cool-dog2.jpg" class="img img-responsive">
                                        
                                </div>
                                <!--Tab2 Image -->
                                <div class="tab-pane " id="tab2">
                                    
                                        <img style="height:350px;width:500px; box-shadow: 10px 10px 5px #888888;"src="assets/images/simon.jpg" class="img img-responsive">
                                    
                                </div>
                                <!--Tab2 Image -->
                                <div class="tab-pane fade" id="tab3">
                                    
                                        <img style="height:350px;width:500px; box-shadow: 10px 10px 5px #888888;" src="assets/images/asher.jpg" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-base"></div>
            </div> <!-- end macbook pro mockup -->



        </div> <!-- / .col-md-8 -->
    </div> <!--/ .row -->
</div> <!-- end sidetab container -->
<br>
<br>
<br>

<center><div class="container-fluid" style="background-color: #000000" vertical-align="bottom" height="100%">
        <hr style="border-style: inset; color: blueviolet;">
        <nav class="navbar navbar-bottom">
            <ul class="list-inline">
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li> 
            </ul>
        </nav>
        
        <p class="copy">&copy; SFSU/Software Engineering Project, Spring 2015. For Demonstration Only</p>
    </div>
</center>
<!--/footer-->
</body>
</html>

