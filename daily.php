<?php include 'includes/config.php'?>

<?php
/*
If day is passed via GET, show $day's composer
If it's today, show $today's composer
Place a link to show today's composer
*/
if(isset($_GET['day'])){//If day is passed via GET, show $day's composer
    $today = $_GET['day'];
    
}else{//If it's today, show $today's composer
    $today = date('l');
}
  
Switch($today){
    case 'Sunday':
        $composer = 'Johann Sebastian Bach';
        $pic = 'Bach.jpg';
        $alt = 'Johann Sebastian Bach';
        $content = "J. S. Bach (1685-1750) is better known for his compositions on the organ.<br /> Some people consider his work to be the greatest organ music ever.";
    break;
    
    case 'Monday':
        $composer = 'Frédéric Chopin';
        $pic = 'Chopin.jpg';
        $alt = 'Frédéric Chopin';
        $content = "Frédéric Chopin (1810–1849): The Poet of the Piano<br/>It's said that no one understood the piano better than Chopin.<br/> He could make it sound romantic and poetic.";
    break;
    
    case 'Tuesday':
        $composer = 'Franz Liszt';
        $pic = 'Liszt.jpg';
        $alt = 'Franz Liszt';
        $content = 'Franz Liszt (1811–1886) was a Hungarian pianist and composer of enormous influence and originality.<br/> He was renowned in Europe during the Romantic movement.';
    break;
    
    case 'Wednesday':
        $composer = 'Sergei Rachmaninoff';
        $pic = 'Rach.jpg';
        $alt = 'Sergei Rachmaninoff';
        $content = 'Sergei Rachmaninoff (1873 - 1943) was a legendary Russian composer and pianist<br /> who emigrated after the Communist revolution of 1917.<br /> He became one of the most influential pianists of the 20th century.';
    break;
    case 'Thursday':
        $composer = 'Franz Schubert';
        $pic = 'Schubert.jpg';
        $alt = 'Franz Schubert';
        $content = "Franz Schubert (1797–1828) is considered the last of the classical composers and one of the first romantic ones. <br /> His music is notable for its melody and harmony.";
    break;
    case 'Friday':
        $composer = 'Ludwig van Beethoven';
        $pic = 'Beethoven.jpg';
        $alt = 'Ludwig van Beethoven';
        $content = 'Ludwig van Beethoven (1770–1827) was a German composer, the predominant musical figure<br /> in the transitional period between the Classical and Romantic eras.';
    break;
    case 'Saturday':
        $composer = 'Claude Debussy';
        $pic = 'Debussy.jpg';
        $alt = 'Claude Debussy';
        $content = 'Claude Debussy (1862-1918) is sometimes seen as the first Impressionist composer, although he rejected the term.<br /> He was among the most influential composers of the late 19th and early 20th centuries.';
    break;
}
?>

<?php get_header() ?>


<section class="service">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h1><?=$config->pageHeader?></h1> 
        <h3><em><strong><?=$today?>'s featured composer is <?=$composer?></strong></em></h3>
        
    <p><?=$content?></p>
    <img src="images/<?=$config->theme_virtual/pic?>" alt="<?=$alt?>"/><br />
    <p>Click below to learn about other composers of the week:</p> 
    <ul>
        <li><a href="daily.php?day=Sunday">Sunday</a></li>
        <li><a href="daily.php?day=Monday">Monday</a></li>
        <li><a href="daily.php?day=Tuesday">Tuesday</a></li>
        <li><a href="daily.php?day=Wednesday">Wednesday</a></li>
        <li><a href="daily.php?day=Thursday">Thursday</a></li>
        <li><a href="daily.php?day=Friday">Friday</a></li>
        <li><a href="daily.php?day=Saturday">Saturday</a></li>
    </ul>
      </div>
    </div>
				
						
   
</section>

<!-- Service Start -->

<!-- Call to action Start -->

<!-- Content Start -->
    
<?php get_footer()?>

