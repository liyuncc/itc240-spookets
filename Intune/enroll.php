<?php include 'config.php' ?>
<?php include 'header.php' ?>


<section class="service">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h1><?=$pageHeader?></h1> 
        <h3><?=$subHeader?></h3>
      </div>
    </div>
						
<?php
if(isset($_POST['FirstName'])){ //show data
    //echo $_POST['FirstName'];
    $to      = 'liyuncecil@gmail.com';
    $subject = 'In Tune Music School Enrollment Page';
    
    //$message = 'Hello from '.$_POST['FirstName'];
    $message = process_post(); //formhandler
    $replyTo = 'lightly_sarah@yahoo.com.tw'; //client side
    $headers = 'From: noreply@liyuncecilcodes.com' . PHP_EOL .
        'Reply-To: ' . $replyTo . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    echo '
        <p>Thanks for contacting us! We will get back to you in 24 hours. </p>
        <a href="">Back</a>
        '; //feedback

}else{ //show form, no data
    echo '
    <form action="" method="post">
        <b>First Name</b>:<br>
        <input type="text" name="FirstName" required ><br>
        
        <b>Last Name</b>:<br>
        <input type="text" name="LastName" required ><br>
        
        <b>Email</b>:<br>
        <input type="email" name="Email" required ><br>
        
        <b>What instrument are you interested in learning?</b><br>
        <input type="checkbox" name="Piano" >  Piano<br>
        <input type="checkbox" name="Guitar" >  Guitar<br>
        <input type="checkbox" name="Violin" >  Violin<br>
        <input type="checkbox" name="Cello" >  Cello<br>
        
        <b>What times during the week work best for you to schedule lessons</b>?<br>
        <input type="checkbox" name="Tuesday Afternoon" >  Tuesday Afternoon<br>
        <input type="checkbox" name="Wednesday Afternoon" >  Wednesday Afternoon<br>
        <input type="checkbox" name="Thursday Afternoon" >  Thursday Afternoon<br>
        <input type="checkbox" name="Friday Afternoon" >  Friday Afternoon<br>
        <input type="checkbox" name="Saturday" >  Saturday<br>
        <input type="checkbox" name="Sunday" >  Sunday<br>
        
        
        <b>Which location is the most convinient for you?</b><br>
        <input type="checkbox" name="Location" value="Green Lake" >  Green Lake<br>
        <input type="checkbox" name="Location" value="West Seattle" >  West Seattle<br>
        <input type="checkbox" name="Location" value="columbia City" >  Columbia City<br>
        
        <b>What size of class works best for you?</b><br>
        <input type="radio" name="size" value="Individual" >  Individual<br>
        <input type="radio" name="size" value="Small Group" >  Small Group: 2~3 people<br>
        <input type="radio" name="size" value="Regular Group" >  Regular Group: 4~5 People<br>
        
        <b>How did you find us?</b><br>
        <input type="radio" name="referral" value="Friends" >  Friends<br>
        <input type="radio" name="referral" value="Search Engine" >  Search Engine<br>
        <input type="radio" name="referral" value="Community Concerts" >  Community Concerts<br>
        <input type="radio" name="referral" value="Flyer" >  Flyer<br>
        
        <b>Questions?</b><br>
        <textarea name="Question" >
        </textarea><br>
        <button class="btn btn-default" type="submit">Submit</button>
    </form>
    ';
}
?>
      
<?php include 'footer.php';?>

<?php
function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}
?>
      
