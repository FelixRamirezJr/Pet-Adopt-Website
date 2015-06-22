<?php
include_once('session.php');
include_once('Utils.php');
?>
<!--<p class="copy">&copy; SFSU/Software Engineering Project, Spring 2015. For Demonstration Only.</p>-->

<div id="sign_in" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">Sign In</h4>
            </div>

            <form name="sign_in" action="login.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username" style="text-align: left"> Username</label>
                        <input class="form-control" placeholder="John Doe" type="text" name="username" maxlength="30" size="20" required>  
                    </div>

                    <div class="form-group">
                        <label for="password" style="text-align: left;"> Password</label>
                        <input class="form-control" placeholder="password1234" type="password" name="password" maxlength="30" size="20" required>  
                    </div>    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <input type="submit" value="Sign In" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #003366;">

        <div class="container" style = "background-color: #003366; color:white">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <!--<a class="navbar-brand" href="index.php"><img src="http://i.imgur.com/hEMEk9x.jpg" width="60" height="50">PetPal Adoptions</a>-->
                <a style="color:white" class="navbar-brand" href="index.php">PetPal</a>
                <!--<a><img src="http://i.imgur.com/hEMEk9x.jpg" width="50" height="50"></a>-->
            </div>

            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="nav navbar-nav navbar-left">
                    <li><a style="color:white" href="index.php#search_ui">Adopt a Pet</a></li>
                    <li><a style="color:white" href="pet_registration.php">Donate a Pet</a></li> 
                    <li><a style="color:white" href="pet_care.php">Pet Care</a></li> 
                    <li><a style="color:white" href="about.php">About us</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['login_user'])): ?>
                        <li class="dropdown">
                          <a href="#" style="color:white" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['login_user']; ?><span class="glyphicon glyphicon-user" aria-hidden="true" class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="manage_pet.php?pet_id=null">Manage Pet</a></li>
                            <li class="divider"></li>
                            <?php
                                if ($dbAccess->checkAdminRight($_SESSION['login_user'], $connection)) {
                                    echo '<li><a href="admin_page.php?name=&id=&username=">Administration Page</a></li>';
                                    echo '<li class="divider"></li>';
                                } else 
                                    {
                                    }
                            ?>
                            <li><a href="inbox.php">Inbox</li>
                            <li class ="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                          </ul>
                        </li>

                    <?php else: ?>
                        <li><a style="color:white" href="user_register_form.php">Sign Up</a></li>
                        <li class="divider-vertical"></li>
                        <li><a style="color:white" href="#sign_in" data-toggle="modal" data-target="#sign_in">Sign In</a></li>
                        
                    <?php endif; ?>   
                </ul>
            </div>
        </div>
    </nav>
</header>
