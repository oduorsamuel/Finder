<html>
<head>
<?php include 'plugins/styles.php';?>
</head>
<body>
    <br><br><br>
<?php
include '../includes/database.php';
$sql="DELETE FROM `item` WHERE `itemId`='$_GET[id]'";
if (mysqli_query($con,$sql))

    // echo '<script>window.location="../index.php";</script>';
    header("refresh:1; url=gallery.php");
else
    echo "Not deleted";

?>

</body>
</html>