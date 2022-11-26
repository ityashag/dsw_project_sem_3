<?php

//$r=$_FILES['photo']['r'];
$con=mysqli_connect("localhost","root","","mcc");
$image = $_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],"./uploads/$image");
mysqli_query($con,"insert into movie values (3789,'pk',303,'$image')");
$c=mysqli_query($con,"select photo from movie where mid=3789");
$c=mysqli_fetch_array($c);

$k=$c['photo'];

echo "<image src = './uploads/".$k."' height='300' width='300'> ";
?>
