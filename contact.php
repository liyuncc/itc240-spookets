<?php include 'includes/config.php' ?>
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
if(isset($_POST['FirstName'])){ //show data
    //echo $_POST['FirstName'];
    $to      = 'liyuncecil@gmail.com';
    $subject = 'InTune Music School Contact Page';
    
    $message = 'Hello from '.$_POST['FirstName'];
    //$message = process_post(); //formhandler
    $replyTo = 'lightly_sarah@yahoo.com.tw'; //client side
    $headers = 'From: noreply@liyuncecilcodes.com' . PHP_EOL .
        'Reply-To: ' . $replyTo . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    echo '
        <div class="container">
        <p>Thanks for contacting us!</p>
        <a href="">Back</a>
        </div>
        '; //feedback



}else{ //show form, no data
    echo '
   <section class="contact-form">
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-6 col-sm-12">
                    <div class="block">
                        
                        <div class="form-group">
                            <input name="FirstName" type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input name="Email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="Subject" type="text" class="form-control" placeholder="Subject">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="block">
                        <div class="form-group-2">
                            <textarea name="Message" class="form-control" rows="3" placeholder="Your Message"></textarea>
                        </div>
                            <button class="btn btn-default" type="submit">Send Message</button>
                    </div>
                </div>
                
            </form>
        </div>
    ';
}
?>   

<?php get_footer() ?>

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
