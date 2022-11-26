<?php
$con=mysqli_connect("localhost","root","","mcc");
$tid=$_POST['theater'];
$c=mysqli_query($con,"select * from slot where tid='$tid'");
while($r=mysqli_fetch_array($c))
{
    $mid=$r['mid'];
    $d=mysqli_query($con,"select photo from movie where mid='$mid'");
    $d=mysqli_fetch_array($d);
    $k=$d['photo'];
    echo "<image src = './uploads/".$k."' height='300' width='300'> ";
}

?>