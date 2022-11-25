

<?php

$con=mysqli_connect("localhost","root","","mcc");
$phone=$_POST["phone"];
$pass=$_POST["pass"];
$q=mysqli_query($con,"select count(*) as ct ,pass from customer where phone_no=$phone");
$q=mysqli_fetch_array($q);
if($q['ct']==0)
{
    echo '<script> alert("Incorrect password") </script>';

    header("Location: dsw_pro_cutomer.html");
}
$cpass = $q['pass'];
if($cpass==$pass)
{

}
else
{
    header("Location: dsw_pro_cutomer.html");
}

$q=mysqli_query($con,"select * from movie");

echo '<form method="POST" action="check_customer.php">';
while($r=mysqli_fetch_array($q))
{
    echo '<button><img src="Batman.jpg"> </button><br>';

}
echo '</form>';


?>