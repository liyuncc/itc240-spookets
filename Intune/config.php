<?php
/*
    config.php
    stores configuration data for our application
*/

include 'credentials.php'; 

//echo basename($_SERVER['PHP_SELF']);

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
//echo 'the constant is storing: ' . THIS_PAGE;
//die;

//default page values
$siteName = 'In Tune Music School';
$slogan = 'Once you\'re In Tune, you will never be out of tune!';
$title = THIS_PAGE;
$pageHeader = 'The developer forgot to put a page header';
$subHeader = 'The developer forgot to put a sub header';

switch(THIS_PAGE){
    case 'template.php':
        $title= 'My template page';
        $pageHeader = 'Welcome to In Tune Music School!';
        $subHeader = '"Where words fail, music speaks." ― Hans Christian Andersen';
    break;
        
    case 'daily.php':
        $title= 'My daily page';
        $pageHeader = '--Composer of the Day--';
        $subHeader = 'Learn more about a composer daily!';
    break;
        
    case 'db-test.php':
        $title= 'DB Test';
        $pageHeader = 'A list of records';
        $subHeader = 'Test to see if the credentials work';
    break;
        
    case 'foreign_film_list.php':
        $title= 'Foreign Films';
        $pageHeader = 'Best foreign films of the 20th Century';
        $subHeader = 'Watch these films before you die!';
    break;
        
    case 'contact.php':
        $title= 'Contact us';
        $pageHeader = 'Questions? Comments?';
        $subHeader = 'We appreciate your feedback!';
    break; 
        
    case 'enroll.php':
        $title = 'Enroll';
        $pageHeader = "Interested in taking classes? Let's get started!";
        $subHeader = 'We look forward to meeting you in person!';
}

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some sheet music?";
		die();
    }
}

