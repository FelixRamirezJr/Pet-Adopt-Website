<?php
    include 'navbar.php';
    include_once 'Utils.php';
?>


<html>
    <head>
        <?php
    
        $query = $dbAccess->petProfileUser($_SESSION['login_user']);
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        
        //if not an admin, redirect the page
        if ($row['admin'] == 0) {
            echo "<script type='text/javascript'>alert('You are not an admin.')</script>";
            echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        }
        ?>
        
        <title>Admin Page</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
            .tg .tg-s6z2{text-align:center}
            .tg .tg-vn4c{background-color:#D2E4FC}
        </style>
        
    </head>
    <body style="background-color: #CCFFFF;">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
                    <h1>Administration Page</h1>
                </div>
            </div> 
        </div>
        <br>
        <br>
        <div class="container">
        <div class="col-md-4">
            <h3>Find pet by name or id.</h3>
            <form name="PetEditSearch" action="admin_page.php" method="get">
                <label style=""for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Pet Name" maxlength="30" style="width:300px">
                <br>
                <label style=""for="name">ID</label>
                <input type="text" name="id" class="form-control" id="id" placeholder="Pet ID" maxlength="30" style="width:300px">
                <br>
        
        <!--<div class="col-md-4 col-md-offset-2">
            <h3>Find user by their username.</h3>
                <label style=""for="name">Username</label>
                <input type="text" name="username" class="form-control" id="name" placeholder="Username" maxlength="30" style="width:300px">
                <br>
        </div>-->
        <center><input type="submit" value="Submit" name="submit" class="btn btn-primary" style ="margin-right:11%; box-shadow: 5px 5px 3px #888888;"></center>
            </form>
                <br>
        </div>

            <div class="col-md-6">
                <?php
                    $pet_name = $_GET["name"];
                    $pet_id = $_GET["id"];
                    //$search_user = $_GET["username"];
                    
                    if ($pet_id != "") {
                        $query = $dbAccess->petProfile($pet_id);
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result);
                        if ($row == null) {
                            echo '<font size="5" color="red"><center>There are no pet with id number '.$pet_id.'. Please check the id and search again.</center></font>';
                        } else {
                        $pet = new pet($row['name'], $row['type'], $row['breed_type'], $row['gender'], $row['age_type'], $row['description'], $row['status'], $row['pet_id']);
                        $pet->setPetPicture($row['thumbnail']);
                        $pet->adminPetMod($connection, $row['owner'], $_SESSION['login_user']);
                        }
                    } else if ($pet_name != "") {
                        $query = $dbAccess->petProfileName($pet_name);
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result);
                        if ($row == null) {
                            echo '<font size="5" color="red"><center>There are no pet with the name '.$pet_name.'. Please check the name and search again.</center></font>';
                        } else {
                        $pet = new pet($row['name'], $row['type'], $row['breed_type'], $row['gender'], $row['age_type'], $row['description'], $row['status'], $row['pet_id']);
                        $pet->setPetPicture($row['thumbnail']);
                        $pet->adminPetMod($connection, $row['owner'], $_SESSION['login_user']);
                        }
                    } else {
                        
                    }
                    /*if ($search_user != "") {
                        $query = $dbAccess->petProfileUser($search_user);
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result);
                        $owner = new user($row['username'], $row['firstname'], $row['lastname'], $row['phone_number'], $row['city'], null);
                        $owner->setAdmin($row['admin']);
                        $owner->ownerMod($connection);
                    }*/
                ?>
            </div>
        </div>
            <br>
        
        
<?php include 'footer.php';?>