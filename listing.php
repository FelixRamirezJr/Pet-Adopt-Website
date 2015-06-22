<?php
    include 'navbar.php';
    include_once 'Utils.php';
?>

<!--================================================================== -->
<!-- The Following HTML code extracts the data from the previous page -->
<!--===================================================================-->

<html>
    <head>
        <title>Search Results</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- CSS for this demo-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
            #labelresult {
                display: inline-block;
                width: 500px;
                text-align: left;
                font-size: 25px;
            }
            
            #labelName {
                display: inline-block;
                width: 500px;
                text-align: center;
                font-size: 25px;
            }
        </style>
    </head>
    <body style="background-color: #CCFFFF;">
        <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <div style="background-color:#00CCCC; color:white; padding:10px 10px 10px 10px; ">
                <div style="background-color:#003366; color:white; padding:10px 10px 10px 10px; ">
            <h1>Pet Search Results</h1>
                </div>
            </div> 
        </div>
        <br>

<?php
include 'search.php';

///////////////////
// Check the page number for the passing of the $page variable. If
// no $page integer variable was found, $page will be set to 1.
///////////////////
$page = $_GET["page"];
if(!$page || $page == 0 || !is_numeric($page)){  
    $page = 1;                  // set the page to 1 if no $page integer
    }
    $limit = 9;                 // number of pets to display
    $begin = ($page-1)*$limit;  // variable use to indicate which row in the table to begin

//////////////////////////////////////////////////////////////////////
// retrieve the variables $type, $gender, $age from the search.php or the homepage
//////////////////////////////////////////////////////////////////////
$newType = $_GET["type"];
$newGender = $_GET["gender"];
$newAge = $_GET["age"];

///////////////////
// Convert the variables $type, $gender, $age to lowercase for SQL Statement
///////////////////
$type = strtolower($newType); // Creating it to Lower case So it can get into the SQL Statement Properly
$gender = strtolower($newGender); // Creating it to Lower case so it can get into the SQL statement Properly
$age = strtolower($newAge); // Creating it to Lower case so it can get into the SQL statement Properly

///////////////////
// Begin query with check for types, gender and age
///////////////////
$query = $dbAccess->petSearch($dbAccess, $type, $age, $gender);

///////////////////
// Display the number of result found for the search
///////////////////
$result = mysqli_query($connection, $query);
$numberFound = mysqli_num_rows($result);
$pagenumber = ($numberFound/$limit) + 1;
echo '<div class="col-md-10" style="margin-top:-20px">';
echo '<label id="labelresult">Number of pets found: ' . $numberFound . '</label>';
echo '</div>';
if ($numberFound === 0) 
{
    echo '<br>';
    echo '<label id="labelresult">Unfortunately, our records do not match your criterias...Please Try Again!</label>';
    die(mysql_error()); // TODO: better error handling
}

//////////////////////////////////////////////////////////////////////
// Append the $query with LIMIT $begin, $limit to limit the search result
//////////////////////////////////////////////////////////////////////
$query .= " LIMIT " . $begin . "," . $limit;
$resultfind = mysqli_query($connection, $query);
?>

    <div class="container col-md-offset-2">
    <div class="row">
<?php
//////////////////////////////////////////////////////////////////////
// Diplay the result of the search in 1x3 grid with picture and name
//////////////////////////////////////////////////////////////////////
while ($row = mysqli_fetch_array($resultfind)) {
    $pet = new pet($row['name'], $row['type'], $row['breed_type'], $row['gender'], $row['age_type'], $row['description'], $row['status'], $row['pet_id']);
    $pet->setPetPicture($row['thumbnail']);
    $pet->getPetSummary();
    
}
?>
    </div></div>
    <footer><center>
    
            <label style="font-size: 25px; text-align: center;">Page:&nbsp&nbsp
    <?php
    //////////////////////////////////////////////////////////////////////
    // Set the page numbers
    //////////////////////////////////////////////////////////////////////
    if (($pagenumber>0) && ($page!=1))
   {
        $temppage = $page-1;
    echo '<a href="?type=' . $newType . '&gender=' . $newGender . '&age=' . $newAge . '&page=' . $temppage . '">Prev</a>&nbsp&nbsp';
    } else 
    {
        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    }
    for ($x = 1; $x < $pagenumber; $x++) {
        if ($page==$x) {
            echo '' . $x . '&nbsp&nbsp';
        } else 
        {
            echo '<a href="?type=' . $newType . '&gender=' . $newGender . '&age=' . $newAge . '&page=' . $x . '">' . $x .  '</a>&nbsp&nbsp';
        }
    }
    
    if (($pagenumber>0) && ($page<($pagenumber-1))){
        $temppage = $page+1;
    echo '<a href="?type=' . $newType . '&gender=' . $newGender . '&age=' . $newAge . '&page=' . $temppage . '">Next</a>';
    } else {
        echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    }
    ?>
    </label>
    </center>
    </footer>
<?php include 'footer.php'; ?>





    
    
