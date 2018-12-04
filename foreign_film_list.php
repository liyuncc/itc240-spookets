<?php
//film_list.php - shows a list of foreign films
?>
<?php include 'includes/config.php'?>
<?php include 'includes/Pager.php'?>
<?php get_header()?>


<section class="service">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h3><?=$config->pageHeader?></h3> 
        <h4><?=$config->subHeader?></h4>
      </div>
    </div>

    
<?php
#reference images for pager
//$prev = '<img src="images/arrow_prev.gif" border="0" />';
//$next = '<img src="images/arrow_next.gif" border="0" />';
$prev = '<i class="fa fa-chevron-circle-left"></i>'; //A10
$next = '<i class="fa fa-chevron-circle-right"></i>'; //A10    

$sql = "select * from foreign_films";

//we connect to the db here 
//add error handling from db-test.php
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));


# Create instance of new 'pager' class
$myPager = new Pager(5,'',$prev,$next,'');
                 
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset //A10

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));


if(mysqli_num_rows($result) > 0)
{#records exist - process
    //echo $myPager->showNAV();//show pager if enough records 
	if($myPager->showTotal()==1){$itemz = "film";}else{$itemz = "films";}  //deal with plural
    echo '<p align="center">We currently have ' . $myPager->showTotal() . ' ' . $itemz . ', click on film names below to learn more: </p>';
	while($row = mysqli_fetch_assoc($result))
	{# process each row
         echo '<p align="center">
            <a href="foreign_film_view.php?id=' . (int)$row['FilmID'] . '">' . $row['Name'] . '</a>
            </p>';
	}
	//the showNAV() method defaults to a div, which blows up in our design
    echo $myPager->showNAV();//show pager if enough records 
    
    //the version below adds the optional bookends to remove the div design problem
    //echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>What! No movies?  There must be a mistake!!</p>";	
}


//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
            
?>

      
<?php get_footer()?>

