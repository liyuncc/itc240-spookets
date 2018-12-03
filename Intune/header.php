<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title><?=$config->title?></title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="<?=$config->theme_virtual?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="<?=$config->theme_virtual?>plugins/Ionicons/css/ionicons.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="<?=$config->theme_virtual?>plugins/animate-css/animate.css">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="<?=$config->theme_virtual?>plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="<?=$config->theme_virtual?>plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="<?=$config->theme_virtual?>plugins/slick-carousel/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?=$config->theme_virtual?>css/style.css">
<?=$config->loadhead?>
</head>

<body id="body">

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- header Nav Start -->
				<nav class="navbar">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="template.php">
								In Tune
							</a>
						</div>
                        
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
							<ul class="nav navbar-nav navbar-right">
                            <?=makeLinks($config->nav1)?>
				
							</ul>
							</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			</div>
			</header><!-- header close -->

<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h1 class="animated fadeInUp"><?=$config->siteName?></h1>
					<p class="animated fadeInUp"><?=$config->slogan?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- header ends here -->
    
<?php            
function makeLinks($nav){
    global $config;
    $myReturn = ''; //add data to this empty string
    foreach($nav as $key => $value){
        
        if(THIS_PAGE == $key)
        {//current page add active class
            $myReturn .= '
         <li class="nav-item ">
              <a class="nav-link active" href="' . $key . ' ">' . $value . ' </a>
         </li>
        '; 
        }else{//add no formatting
            $myReturn .= '
         <li class="nav-item">
              <a class="nav-link" href="' . $key . ' ">' . $value . ' </a>
         </li>
        ';
        }
    }
    return $myReturn;
}

?>
    
<?=showFeedback()?>
         