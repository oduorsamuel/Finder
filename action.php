<?php
include 'includes/database.php';
if(isset($_POST["category"])){
	$category_query=("SELECT * FROM category ORDER BY categoryId asc LIMIT 0,10");
	$run_query=mysqli_query($con, $category_query);
    if(mysqli_num_rows($run_query)>0){
        echo"
 <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Sort By</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
     </div>

        ";
        while($row = mysqli_fetch_array($run_query)){
			$cid = $row['categoryId'];
			$cat_name= $row['CategoryName'];
            echo"

      <div class='modal-body nav justify-content-center nav-item'>
		<ul class='nav justify-content-center '>
		  <li class='nav-item'>
            <a class='category' id='nav-link'data-dismiss='modal' href='#gallery1-1x' cid='$cid'>$cat_name</a>
		 </li>
	    </ul>
	</div>


					  
            ";
        }
        echo"
 <div class='modal-footer'>
 <button type='button' class='btn btn-secondary' data-dismiss='modal' >Close</button>
 </div></div></div></div>
        ";
    }

}
	


if(isset($_POST["getItem"])){

    $item_query=("select * FROM lostitems ORDER BY itemid DESC LIMIT 0,100000000");
    $run_query=mysqli_query($con, $item_query);
    if(mysqli_num_rows($run_query)>0){
        while($row=mysqli_fetch_array($run_query)){
            $category=$row['categoryId'];
            $image_link=$row['image_path'];
            $phone=$row['phone'];
			$pickedLocation=$row['pickedLocation'];
            echo"     
        <!-- Filter --><!-- Gallery -->
		<div class='mbr-gallery-item mbr-gallery-item--p1 mbr-gallery-layout-default col-md-2 img-thumbnail'>
		                   <img src='$image_link' alt='not available' class='' id='cover'/>
		                    <span class='icon-focus'></span><span class='mbr-gallery-title mbr-fonts-style display-7'>
                            <p  style='font-family:Courier New;'class='mbr-text mbr-fonts-style display-7'>
							Place found:
							<u>$pickedLocation</u>
							 Contact me at
							<a href='tel:$phone'>$phone</a></p>

                           </span>
		</div>

		<!-- Lightbox -->


					  
            ";
        }
    }

}
if(isset($_POST['get_selected_category'])){
	$cid= $_POST["cat_name"];
	$sql="SELECT * FROM lostitems WHERE categoryId='$cid' ORDER BY itemId DESC LIMIT 0,100000000";
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		
            $categoryId=$row['categoryId'];
            $image_link=$row['image_path'];
            $phone=$row['phone'];
			$pickedLocation=$row['pickedLocation'];
            echo"     
        <!-- Filter --><!-- Gallery -->
		<div class='mbr-gallery-item mbr-gallery-item--p1 mbr-gallery-layout-default col-md-2 img-thumbnail'>
		                   <img src='$image_link' alt='not available' class='' id='cover'/>
		                    <span class='icon-focus'></span><span class='mbr-gallery-title mbr-fonts-style display-7'>
                            <p  style='font-family:Courier New;'class='mbr-text mbr-fonts-style display-7'>
							Place found:
							<u>$pickedLocation</u>
							 Contact me at
							<a href='tel:$phone'>$phone</a></p>

                           </span>
		</div>

		<!-- Lightbox -->


					  
            ";
        
		
	}
}
