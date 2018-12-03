<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php'?>
<?php get_header()?>


<section class="service">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h1><?=$config->pageHeader?></h1> 
        <h3><?=$config->subHeader?></h3>
        
      </div>
    </div>

    
<?php
$sql = "select * from foreign_films";

//we connect to the db here 
//add error handling from db-test.php
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
 
    //point at each row and get the data from it
    while($row = mysqli_fetch_assoc($result))
    {
     //html and data here:
        
        echo '
    <div class="row ">
      <div class="col-sm-6 col-md-3">
        <div class="service-item">
        
        <h3>Film Name-- 
        <b><ins><em><a href="foreign_film_view.php?id=' . $row['FilmID'] . '">' . $row['Name'] . '</a></b></ins></em></h3>
          <p>Country-- <b>' . $row['Country'] . '</b></br>
        Year Released-- <b>' . $row['Year_Released'] . '</b></br>
        Description-- <b>' . $row['Description'] . '</b></br></p>
        </div>
        </div>
        </div>
        ';
         
    }     
}else{//inform there are no records
    echo '<p>There are currently no movies.</p>';
}


//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
            
?>

      
<?php get_footer()?>

