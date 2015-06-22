
        <style>
            #body {
                display: inline-block;
                width: 60px;
                text-align: left;
                font-size: 20px;
                margin-left: 20px;
            }
            
            #SearchLine {
                display: inline-block;
                border-width: 1px;
                border-style: inset;
                text-align: left;
                min-width: 170px;
                margin-left: 15px;
            }
        </style>
        
<div class="col-md-2" style='background-color:#00CCCC; height: 500px; background-size: 100%; box-shadow: 10px 10px 5px #888888;'>
    <div class="row">
        <div class="container-fluid" style="text-align: center">
            <h1>Search Pets</h1>
        <!--<label style="font-family: Comic Sans MS; font-size: 30px; width: 200px; text-align: center;">Search Pets</label>-->
        <hr style="display: block; margin-top: 0em; margin-bottom: 1em; border-width: 3px; border-style: inset;">
        </div>
        <div>
        <form name="PetSearch" action="listing.php" method="get">
            <!--<label id="body">Type:</label>-->
            <h3 id="body">Type:</h3>
                <select name="type" class="Dropdown" id="dmenu"  style="width:100px">
                    <option value="any" <?php echo isset($_GET["type"]) && $_GET["type"] == "any" ? "selected" : "" ?>>Any</option>
                    <option value="cat" <?php echo isset($_GET["type"]) && $_GET["type"] == "cat" ? "selected" : "" ?>>Cat</option>
                    <option value="dog" <?php echo isset($_GET["type"]) && $_GET["type"] == "dog" ? "selected" : "" ?>>Dog</option>
                </select>
            <br>
            <hr id="SearchLine">
            <br>
            <h3 id="body">Sex:</h3>
                <select name="gender" class="Dropdown" id="dmenu" style="width:100px">
                    <option value="any" <?php echo isset($_GET["gender"]) && $_GET["gender"] == "any" ? "selected" : "" ?>>Any</option>
                    <option value="female" <?php echo isset($_GET["gender"]) && $_GET["gender"] == "female" ? "selected" : "" ?>>Female</option>
                    <option value="male" <?php echo isset($_GET["gender"]) && $_GET["gender"] == "male" ? "selected" : "" ?>>Male</option>
                </select>
            <br>
            <hr id="SearchLine">
            <br>
            <h3 id="body">Age:</h3>
                <select name="age" class="Dropdown" id="dmenu"  style="width:100px">
                    <option value="any" <?php echo isset($_GET["age"]) && $_GET["age"] == "any" ? "selected" : "" ?>>Any</option>
                    <option value="baby" <?php echo isset($_GET["age"]) && $_GET["age"] == "baby" ? "selected" : "" ?>>Baby</option>
                    <option value="young" <?php echo isset($_GET["age"]) && $_GET["age"] == "young" ? "selected" : "" ?>>Young</option>
                    <option value="adult" <?php echo isset($_GET["age"]) && $_GET["age"] == "adult" ? "selected" : "" ?>>Adult</option>
                    <option value="senior <?php echo isset($_GET["age"]) && $_GET["age"] == "senior" ? "selected" : "" ?>">Senior</option> 
                </select>
            <br>
            <hr id="SearchLine">
            <p>
            <input type="submit" value="Search" name="page" class="btn btn-primary" style="margin-left: 100px;"/>
            </p>
        </form>
        </div>
    </div>
</div>
<br>
<br>