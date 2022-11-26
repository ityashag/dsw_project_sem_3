<?php

//$r=$_FILES['photo']['r'];

$con=mysqli_connect("localhost","root","","mcc");
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$time = $_POST['time'];
$date = $_POST['data'];
$name=$_POST['name'];
$tid=$_POST['theater'];

$c=mysqli_query($con,"select tname  from theatre where tid='$tid' ");
$c=mysqli_fetch_array($c);
$tname=$c['tname'];

echo "<div>WELCOME ".$tname." </div>";



$c=mysqli_query($con,"select count(*) as ct, mid  from movie where mname like '$name' ");
$c=mysqli_fetch_array($c);
$mid=$c['ct'];
if($mid!=0)
{
    $mid=$c['mid'];
    $c=mysqli_query($con,"delete  from slot where tid='$tid' and dt like '$date' and timing='$time' and mid='$mid' " );
    
}




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

