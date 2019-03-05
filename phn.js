if (isset($_POST['submit_firstcontact'])) {
    if(isset($_POST['firstcontact'])){
        $firstcontact=  clean_Input($_POST['firstcontact']);
    }
    
     if(isset($_POST['firstcontact_name'])){
        $firstcontact_name=  clean_Input($_POST['firstcontact_name']);
    }
     if(isset($_POST['firstcontact_school'])){
        $firstcontact_school=  clean_Input($_POST['firstcontact_school']);
    }
     
    if(empty($firstcontact_name)||empty($firstcontact_residence)||empty($firstcontact)){
 
    //$warning="All fields are required please fill them";
      
  } 
   if (!preg_match('#[0-9]#',$firstcontact)||strlen($firstcontact)<10) {
             $warning = "Only digits are allowed and a phone number should contain 10 numbers in the format 07"; 
             $error=1;
         }
  if (!preg_match("/^[a-zA-Z ]*$/",$firstcontact_school)) {
             $warning = "Only letters and white space allowed"; 
              $error=1;
         }
         if (!preg_match("/^[a-zA-Z ]*$/",$firstcontact_name)) {
             $warning = "Only letters and white space allowed"; 
              $error=1;
         }
    
         elseif ($error<1) {
             $user="user_msa";
             $phone=$_COOKIE[$user];
              $insert_query1=$con->query("INSERT INTO `emergencycontacts_details`"
                     . " (`fullname`, `school`, `phone`, `contact`) VALUES"
                     . " ('$firstcontact_name', '$firstcontact_school', '$phone', '$firstcontact'); ");
     
     
     if ($insert_query1) {
         $success_message="You have successfully added your Emergency contacts "
                 . "they will help when you are in danger,";
          
     }

     }
}

  
?>