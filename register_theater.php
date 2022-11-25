<?php
$con=mysqli_connect("localhost","root","","mcc");
$phone=$_POST['phone'];
$pass=$_POST['pass'];
$name=$_POST['name'];
$city=$_POST['city'];
$c=mysqli_query($con,'select count(*) as ct from theatre');
$c=mysqli_fetch_array($c);
$id=$c['ct']+1;
$c=mysqli_query($con,"select count(*) as ct from theatre where phone_no='$phone' ");
$c=mysqli_fetch_array($c);
if($c['ct']!=0)
{
    echo '<script> alert("already registered"); </script>';
    header("Location: dsw_pro_theater.html");
}
else
{
    mysqli_query($con,"insert into theatre values ('$id','$name','$city','$pass','$phone')");
    header("Location: dsw_pro_theater.html");
}


?>
