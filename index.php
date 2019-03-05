<!DOCTYPE html>
<?php

	include 'includes/database.php';
	$message = "";
	$email=$username=$error="";
	
	if(isset($_POST['subscribe'])){
		

		$email=$con->real_escape_string($_POST['email']);

		
		if(empty($email )){
			
			 $error="Please fill in all fields";
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
               
              $error="Invalid email format";  
               
           }
		else{
               
             $check_user="SELECT email FROM subscribers WHERE email='$email'";
             $cq=  mysqli_query($con, $check_user);
             
             $exists=  mysqli_num_rows($cq);
             
             if($exists){
               
             $error="User with this email already exists";
                 
             }
	
		else{
		
		 
		      $query="INSERT INTO subscribers (email) VALUES ('$email')";
		      $run_query=mysqli_query($con,$query);
		  
		  if($run_query== true){
			 // $this->session->set_flashdata('success_msg','success');
			  $message = 'subscription Successful!';
			// header('location:index.php');
			// if(isset($_GET['success'])) print 'message sent';
			  
		  }
		
		}
		}
		
	}
	
	

?>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.5.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/lg.png" type="image/x-icon">
  <meta name="description" content="">
  <title>LostFinder</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<section class="menu cid-qQcKSTkilH" once="menu" id="menu1-1n">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm" >
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
             <span class="secondary"></span>
             <span class="secondary"></span>
             <span class="secondary"></span>
             <span class="secondary"></span>

            </div>
        </button>
		    <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                
                </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="">
                       
                    </a>
                </span>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="index.php">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="index.php">
                        <span class="mbri-register mbr-iconfont mbr-iconfont-btn"></span>
                        Register Item
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="admin/login.php">
                        <span class="mbri-register mbr-iconfont mbr-iconfont-btn"></span>
                        Admin
                    </a>
                </li>
	            <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="#subscribe">
                        <span class="mbri-search  mbr-iconfont mbr-iconfont-btn"></span>
                        Subscribe
                    </a>
                </li>

            </ul>
            <div class="navbar-buttons mbr-section-btn" >
                <a class="btn btn-sm btn-primary display-4" href="https://play.google.com/store/apps/details?id=com.HIVFactsheet">
                    <span class="mbri-save mbr-iconfont mbr-iconfont-btn "></span>
                    Download App
                </a>
            </div>
        </div>
    </nav>
</section>

<section class="engine"><a href="#">Get ur website @ soduor15@yahoo.com</a></section><section class="header5 cid-qQcMmlNAI0 mbr-fullscreen" id="header5-1s">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <label style="color:red;"><?=$error?></label><br>
            <label style="color:green;"><?=$message?></label><br>
            <div class="mbr-white col-md-10">
               <!--<h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">&nbsp; &nbsp; &nbsp;&nbsp;</h1>
               <p class="mbr-text align-center display-5 pb-3 mbr-fonts-style display-2">Lost finder one of &nbsp;the world largest online lost and found page that helps you find your lost item or discover the owner.</p>-->
                <div class="mbr-section-btn align-center">

                        <a class="btn btn-md btn-secondary display-4" href="reportitem.php">FOUND SOMETHING</a>
                        <a class="btn btn-md btn-white-outline display-4" data-toggle="modal" data-target="#exampleModal"  href="#gallery1-1x" >LOST SOMETHING</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#gallery1-1x">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<!-- Modal -->
<div id="get_category"></div>
<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sort By</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="get_category">
     <!--   <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link disabled"  href="#">ID</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Smartcard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Child</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Keys</a>
  </li>
    <li class="nav-item">
    <a class="nav-link disabled" href="#">Exarcard</a>
  </li>
    <li class="nav-item">
    <a class="nav-link disabled" href="#">Phones</a>
  </li>
      <li class="nav-item">
    <a class="nav-link disabled" href="#">Others</a>
  </li>
</ul>-->

 <!--     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>-->



  <!--Uploading images-->	
  <div class="container-fluid" id="gallery1-1x">


    <div class="row" id="get_items">

    </div>

</div>

 <!--End Uploading images-->


<section class="footer3 cid-qQcLEZUkHF" id="subscribe" style='background-color:black'>

    

    

    <div class="container">
        <div class="footer-lower" >
		<div class="media-container-row">
		   <div class="col-md-4"></div>
            <div class="col-md-4"  >


                <p class="mbr-text form-text mbr-fonts-style display-7">
                    Get monthly updates and free resources.
                </p>
                <div class="media-container-column" data-form-type="formoid">

                    <form class="form-inline"  action="<?php echo htmlspecialChars($_SERVER ['PHP_SELF'])?>" method="post">

                        
                        <div class="form-group">
                            <input type="email" class="form-control input-sm input-inverse my-2" value="<?=$email?>" name="email" required="" data-form-field="Email" placeholder="Email" id="email-footer3-1r">
                        </div>
                        <div class="input-group-btn m-2">
                            <button  class="btn btn-primary display-4" type="submit"  name="subscribe"role="button">Subscribe</button>
                        </div>
                    </form>
                </div>

            </div>
		   <div class="col-md-4"></div>
		</div>
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2018 millicent Chelagat 0790648600- All Rights Reserved
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://mobile.twitter.com" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://m.facebook.com" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://plus.google.com" target="_blank">
                                <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.behance.net" target="_blank">
                                <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   <script src="assets/popper/popper3.js"></script>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/masonry/masonry.pkgd.min.js"></script>
  <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/gallery/player.min.js"></script>
  <script src="assets/gallery/script.js"></script>
  <script src="assets/slidervideo/script.js"></script>
  <script src="main.js"></script>
  
  
  <input name="animation" type="hidden">
  </body>
</html>