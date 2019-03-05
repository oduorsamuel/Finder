<!DOCTYPE html>
<?php
	include 'includes/database.php';
	$image_link=$description=$phone=$message=$category=$location=$error=$errorr=$target="";

	if(isset($_POST['register']))
	{
		$phone=$con->real_escape_string($_POST['phone']);
		$location=$con->real_escape_string($_POST['location']);
		$category=$con->real_escape_string($_POST['category']);

            if(preg_match("!image!", $_FILES['file']['type']))
            {
                if($_FILES['file']['size']<=20000000)
                {

                    $image_path = $con->real_escape_string("images/".$_FILES['file']["name"]);
                    $image_link = $con->real_escape_string("images/".$_FILES['file']["name"]);
                    $image_file = $_FILES['file']['tmp_name'];

                        if(move_uploaded_file($image_file,$image_path))
                        {
                          //saving image file to database

                            if (empty( $image_link && $phone && $category && $location))
							                {
        			                 $errorr="please fill all the fields";

        		                  }
							//               else if(!preg_match("/^[0-9]*$/", $phone))
							//                 {

                            //   $errorr="Invalid phone number";
                            //       }
                                //   from here
                                  else if(!preg_match('#[0-9]#',$phone)||strlen($phone)<10||strlen($phone)>10)
                                  {

                                     $errorr="Phone number should contain 10 numbers in the format 07";
                        }
                        // end
                           else
						                  {
  		                        $query="INSERT INTO lostitems (image_path,phone,categoryId,pickedLocation) VALUES ('$image_link','$phone','$category','$location')";
    			                     $run_query=mysqli_query($con,$query);

      		                     if($run_query== true)
							      {
                                   echo '<script>window.location="index.php";</script>';
							      }
                            else{
                                 $errorr="unsuccsesful";
                                }
				                  }     
                        }
                    else
				                {
                         $errorr="Please choose smaller image size";
                        }
                  }
                  else
		              {
                    $errorr="Please choose a smaller image size";
                  }
	             }
                else
                  {
                      $errorr="Please select a valid image, consider editing";
                  }

}

//subscription
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

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
		    <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                <button class="btn btn-outline-secondary  my-2 my-sm-0" type="submit"><b style="color:white;">LostFinders</b></button>
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle link text-white display-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Frequent Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

            </ul>
            <div class="navbar-buttons mbr-section-btn pull-right">
                <a class="btn btn-sm btn-primary display-4" href="https://play.google.com/store/apps/details?id=com.HIVFactsheet">
                    <span class="mbri-save mbr-iconfont mbr-iconfont-btn "></span>
                    Download App
                </a>
            </div>
        </div>
    </nav>
</section> <br/><br/>

<section class="engine"><a href="#">Get ur website @ soduor15@yahoo.com </a></section><section class="mbr-section form1 cid-qQcWZtBbyO" id="form1-1u">
<br/><br/><br/>

	
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    
            
                    <form class="mbr-form" action="<?php echo htmlspecialChars($_SERVER ['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
			  	    <label style="color:red;"><?=$error?></label><br>
					<label style="color:red;"><?=$errorr?></label><br>
				    <label style="color:green;"><?=$message?></label><br>

			  <div class="row">

					<!--image display-->
						<script type='text/javascript'>
						function preview_image(event) 
						{
						 var reader = new FileReader();
						 reader.onload = function()
						 {
						  var output = document.getElementById('output_image');
						  output.src = reader.result;
						 }
						 reader.readAsDataURL(event.target.files[0]);
						}
						</script>
						<div id="wrapper">&nbsp;&nbsp;&nbsp;
						<label class="mbri-camera mbr-iconfont mbr-iconfont-btn  link text-success display-1"> <input type="file" name="file" accept="image/*" onchange="preview_image(event)" style="display:none;" value="<?=$image_link?>" ></label>
						 <img id="output_image" width="100px" class="img-responsive"/>
						</div>
	                <!--End image display-->
              </div> <br/><br/>
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-1u">Select Category</label>
                      <select class="form-control" name='category' required='' onChange="getConst(this.value);">
                       <option value="" selected disabled="true">select Category</option>
                       <?php
                       $querry="SELECT * FROM category";
                       $run_querry= mysqli_query($con, $querry);
   
                       while ($row_querry = mysqli_fetch_array($run_querry)) {
                        $CategoryName=$row_querry['CategoryName'];
                        ?>
                       <option id="" value="<?php echo $row_querry['categoryId'];?>"><?php echo $CategoryName?> </option>
                     <?php
                     }   
                    ?>
         </select>
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="message">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Place Found</label>
                                    <input type="text" class="form-control" placeholder="picked where?" name="location" value="<?=$location?>" id="location">
                                </div>

                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="phone">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-1u">Your Contact</label>
                                    <input type="tel" class="form-control" name="phone" value="<?=$phone?>" id="phone">
                                </div>
                            </div>
                        </div>
                          <br/><br/>
            
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4" name="register" >UPLOAD</button>
                        </span>
                    </form>
            </div>
        </div>
    </div><br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/>
</section>

<section class="footer3 cid-qQcLEZUkHF" id="subscribe" style='background-color:black;'>





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
                                <button href="" class="btn btn-primary display-4" type="submit" name="subscribe"role="button">Subscribe</button>
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
                        © Copyright 2018 Millicent Chelagat - All Rights Reserved
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
  
  
  <input name="animation" type="hidden">
  </body>
</html>