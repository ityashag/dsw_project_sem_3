<?php

//$r=$_FILES['photo']['r'];
$con=mysqli_connect("localhost","root","","mcc");
$image = $_FILES['photo']['name'];
$time = $_POST['time'];
$date = $_POST['data'];
$price=$_POST['price'];
$name=$_POST['name'];
$tid=$_POST['theater'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];

$c=mysqli_query($con,"select tname  from theatre where tid='$tid' ");
$c=mysqli_fetch_array($c);
$tname=$c['tname'];

echo "<div>WELCOME ".$tname." </div>";

move_uploaded_file($_FILES['photo']['tmp_name'],"./uploads/$image");

$c=mysqli_query($con,"select count(*) as ct from movie where mname ='$name' ");
$c=mysqli_fetch_array($c);
$mid=$c['ct'];
if($mid==0)
{
    $c=mysqli_query($con,"select count(*) as ct from movie ");
    $c=mysqli_fetch_array($c);
    $mid=$c['ct']+1;
    mysqli_query($con,"insert into movie values ('$mid','$name','$price','$image')");
}


$c=mysqli_query($con,"select count(*) as ct from slot ");
$c=mysqli_fetch_array($c);
$sid=$c['ct']+1;
mysqli_query($con,"insert into slot values ('$sid','$tid','$time','$date','$mid')");

$tid=$_POST['theater'];
$c=mysqli_query($con,"select * from slot where tid='$tid'");
while($r=mysqli_fetch_array($c))
{
    $mid=$r['mid'];
    $d=mysqli_query($con,"select photo from movie where mid='$mid'");
    $d=mysqli_fetch_array($d);
    $k=$d['photo'];
    $g=mysqli_query($con,"select mname , mprice from movie where mid='$mid'");
    $g=mysqli_fetch_array($g);
    $mane=$g['mname'];
    $price=$g['mprice'];
    echo "<span><image src = './uploads/".$k."' height='300' width='300'>".$mane."||".$date."||".$r['timing']."||".$price."</span>";

}
echo '<form method = "POST" action ="check_theater.php" ><input type ="hidden" name="phone" value ="'.$phone.'"><input type ="hidden" name="pass" value ="'.$pass.'"><input type = "submit" value = "GO TO PREVIOUS PAGE"></form>';
?>
