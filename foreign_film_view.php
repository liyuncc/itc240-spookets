<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php'?>


    
<?php

//process querystring here
if(isset($_GET['id'])) //?id=5 (the query string)
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id']; 
}else{//redirect to safe page (list page is the entry point of the app)
    header('Location:foreign_film_list.php'); //an absolute or a relative path
}


$sql = "select * from foreign_films where FilmID = $id";

//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);


if(mysqli_num_rows($result) > 0)
{//show records
    while($row = mysqli_fetch_assoc($result))
    {
        $FilmName = stripslashes($row['Name']);
        $Country = stripslashes($row['Country']);
        $YearReleased = stripslashes($row['Year_Released']);
        //$Description = stripslashes($row['Description']);
        $title = "Title page for " . $FilmName; 
        $pageHeader = $FilmName;
        $Feedback = '';//no feedback necessary
    }    
}else{//inform there are no records
    $Feedback = '<p>This movie does not exist</p>';
}
?>

<?php get_header()?>

<section class="well1 well1__ins text-center">

<?php    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'Film Name: <b>' . $FilmName . '</b> <br />'; 
    echo 'Country: <b>' . $Country . '</b> <br />';
    echo 'Year Released: <b>' . $YearReleased . '</b> <br />';
    //echo 'Description: <b>' . $row['Description'] . '</b> '; 
    echo '<img src="uploads/film' . $id . '.jpg" />'; //$id embedded here to let us see the pictures
    
    echo '</p>';
    
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="foreign_film_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>
