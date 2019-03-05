
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fetching Images</title>

		<!-- CSS -->        
        
	 <?php include 'plugins/styles.php';?>
   <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    
    tr:nth-child(even) {
        background-color: #dddddd;
    }

    #cover {
  object-fit: cover;
  width: 100px;
  height: 70px;
}
    </style>
</head>
<body>
<?php include'plugins/navigation.php';?>
 <div id="page-wrapper">
 <br>
<div class="text-align:center">
</div>
<table>
    <tr>
       <th>Item Image</th>
      <th>Location Picked</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
    <?php
include '../includes/database.php';
$sql="SELECT * FROM lostitems";
$record=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($record)){
    $link =$row['image_path'];
    echo "<tr>";
    echo "<td><img src='../$link' alt='Not available' id='cover'></td>";
    echo "<td>".$row ['pickedLocation']."</td>";
    echo "<td>".$row ['phone']."</td>";
    echo "<td><a href=delete.php?id=".$row ['itemId'].">Delete </a> </td>";

}
?>
</table>
  </div>

<?php include 'plugins/scripts.php'; ?>
</body>
</html>