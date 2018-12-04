<?php
/*
config.php in includes file is where we need to work on

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'spookets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1"); #Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;
//$config is the cup hook, it's everything (includes data and variables). 
//CHANGE TO MATCH YOUR PAGES
// -> is a connector, 會變成config.nav1

/*$config->nav1['index.php'] = "HOME";
$config->nav1['customers.php'] = "CUSTOMERS";
$config->nav1['contact.php'] = "CONTACT";
$config->nav1['daily.php'] = "DAILY";
*/

//match the new pattern, so it'll be our links and make sure our app matches their design
$config->nav1['template.php']='Template';
$config->nav1['daily.php']='Daily Page';
$config->nav1['foreign_film_list.php']='Foreign Films';
$config->nav1['contact.php']='Contact';
$config->nav1['enroll.php']='Enroll';


//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'spookets/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->title = THIS_PAGE;
$config->loadhead = '';//place items in <head> element



//default page values
$config->siteName = 'In Tune Music School';
$config->slogan = 'Once you\'re In Tune, you will never be out of tune!';
$config->pageHeader = 'The developer forgot to put a page header';
$config->subHeader = 'The developer forgot to put a sub header';


/*
switch(THIS_PAGE){
        
    case 'contact.php':    
        $config->title = 'Contact Page';    
    break;
    
    case 'appointment.php':    
        $config->title = 'Appointment Page';
        $config->banner = 'Widget Appointments!';
    break;
        
   case 'template.php':    
        $config->title = 'Template Page';    
    break;          
}
*/
switch(THIS_PAGE){
     case 'template.php':
        $config->title= 'My template page';
        $config->pageHeader = 'Welcome to In Tune Music School!';
        $config->subHeader = '"Where words fail, music speaks." ― Hans Christian Andersen';
    break;
        
    case 'daily.php':
        $config->title= 'My daily page';
        $config->pageHeader = '--Composer of the Day--';
        $config->subHeader = 'Learn more about a composer daily!';
    break;
        
    case 'foreign_film_list.php':
        $config->title= 'Foreign Films';
        $config->pageHeader = 'Best foreign films of the 20th Century';
        $config->subHeader = 'Watch these films before you die!';
        $config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    break;
        
    case 'contact.php':
        $config->title= 'Contact us';
        $config->pageHeader = 'Questions? Comments?';
        $config->subHeader = 'We appreciate your feedback!';
    break; 
        
    case 'enroll.php':
        $config->title = 'Enroll';
        $config->pageHeader = "Interested in taking classes? Let's get started!";
        $config->subHeader = 'We look forward to meeting you in person!';
    break;
}


//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminSpooket = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminSpooket = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}

/*
    makeLinks() will create nav items from an array
    echo makeLinks($nav1);
    ' . xxx . ' 
*/


?>