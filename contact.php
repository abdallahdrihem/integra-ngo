<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "integra.ingo@gmail.com";
     
    $email_subject = "in | integra contact";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
 <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- Basic Page Needs
    ================================================== -->
        <meta charset="utf-8">
        <title>in | INTEGRA - Dream of Normal Life</title>
		<link rel="shortcut icon" href="images/favicon.png">
        <meta name="description" content="">
        <!-- Mobile Specific Metas
    ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <!-- CSS
         ================================================== -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <!-- Animation -->
        <link rel="stylesheet" href="css/animate.css" />
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css"/>
         <link rel="stylesheet" href="css/owl.theme.css"/>
         <!-- Pretty Photo -->
         <link rel="stylesheet" href="css/prettyPhoto.css"/>
         <!-- colro style -->
         <link rel="stylesheet" href="css/red.css"/>
         <!-- Bx slider -->
         <link rel="stylesheet" href="css/jquery.bxslider.css"/>

        <!-- Template styles-->
        <link rel="stylesheet" href="css/custom.css" />
        <!-- REsponsive -->
        <link rel="stylesheet" href="css/responsive.css" />
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
    </head>

 <body data-spy="scroll" data-target=".navbar-fixed-top">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <header id="section_header" class="navbar-fixed-top main-nav" role="navigation">
    	<div class="container">
    		<!-- <div class="row"> -->
                 <div class="navbar-header ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="images/logo2.png" alt="" class="img-responsive">
                        </a>
                 </div><!--Navbar header End-->
                 	 
					 <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                        <ul class="nav navbar-nav navbar-right ">
                           	<li class="active"> <a href="#slider_part" >Home </a></li>
							   <li><a href="index.html#about" >About Us </a> </li>
                            <li><a href="index.html#service"  >in | Services</a> </li>
							
							   <li><a href="index.html#about-details"  >in | Mission</a> </li>
                            <li><a href="index.html#portfolio"  >in | Events</a> </li>
                         
						      <li><a href="index.html#isotope-filter"  >in | Pictures</a> </li>
                            <li><a href="index.html#team" >in | Team </a> </li>
                    
                            <li><a href="index.html#contact" >Contact Us</a> </li>
                        </ul>
                     </nav>
                </div><!-- /.container-fluid -->
</header>
   <section id="portfolio_single">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio-header text-center">
                        <h2>
Thank you for contacting us. We will be in touch with you very soon.</h2>
                       <p>
                    </div>
                </div>  <!-- Col-md-12 End -->
            </div>
        </div>
    </section>

	<!-- Footer Area Start -->
<footer>
<section id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Main Menu</h3>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="index.html#about">Home</a></li>
                            <li><a href="index.html#service">in | Service</a></li>
                            <li><a href="index.html#portfolio">in | Event</a></li>
                          
                            <li><a href="index.html#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Useful Links</h3>
                    <div class="footer_menu">
                        <ul>
                            <li><a target="_blank"  href="https://www.generosity.com/community-fundraising/integra-dream-of-normal-life--2/x/14228229">Our Project on INDIEGOGO</a></li>
                          
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Contact us</h3>
                    <div class="footer_menu_contact">
                        <ul>
                            <li> <i class="fa fa-home"></i>
                                <span>Dekenstraat 2, 3000 Leuven</span></li>
                            <li><i class="fa fa-globe"></i>
                                <span>+32 4 83 04 62 56 | +32 4 68 26 97 70</span></li>
                            <li><i class="fa fa-phone"></i>
                                <span> info@integra-ngo.com</span></li>
                            <li><i class="fa fa-map-marker"></i>
                            <span> www.integra-ngo.com</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Tags</h3>
                    <div class="footer_menu tags">
                        <a href="#"> in</a>
                        <a href="#"> INTEGRA</a>
                        <a href="#"> NGO</a>
                        <a href="#"> non-governmental</a>
                        <a href="#"> international</a>
                        <a href="#"> youth citizens</a>
                        <a href="#"> integration </a>
                      
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer_b">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom">
                        <p class="text-block"> &copy; Copyright reserved to <span>INTEGRA Team 2016 </span></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_mid pull-right">
                        <ul class="social-contact list-inline">
                            <li> <a target="_blank"  href="https://www.facebook.com/integra.all"><i class="fa fa-facebook"></i></a></li>
                            <li> <a target="_blank" href="https://twitter.com/NGO_integra"><i class="fa fa-twitter"></i></a></li>
                          <li> <a target="_blank" href="https://www.instagram.com/NGO_integra/"><i class="fa fa-instagram"></i> </a></li>
                            <li> <a target="_blank" href="https://www.youtube.com/channel/UC2gWDpJmbzOtUk0xuCc7P7Q"><i class="fa fa-youtube"></i> </a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/company/10777286?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A10777286%2Cidx%3A2-1-2%2CtarId%3A1465478661154%2Ctas%3Aintegra%20ngo"> <i class="fa fa-linkedin"></i></a></li>
                         
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Footer Area End -->
</footer>
 
<?php
}
die();
?>
