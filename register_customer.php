<!doctype html>
<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","mcc");
$phone=$_POST['phone'];
$pass=$_POST['pass'];
$name=$_POST['name'];
$email=$_POST['email'];
$c=mysqli_query($con,'select count(*) as ct from customer');
$c=mysqli_fetch_array($c);
$id=$c['ct']+1;
$c=mysqli_query($con,"select count(*) as ct from customer where phone_no='$phone' ");
$c=mysqli_fetch_array($c);
if($c['ct']!=0)
{
    echo '<script> alert("already registered"); </script>';
    header("Location: dsw_pro_customer.html");
}
else
{
    mysqli_query($con,"insert into customer values ('$id','$pass','$name',0,'$email','$phone')");
    header("Location: dsw_pro_customer.html");
}

?>
</body>
</html>