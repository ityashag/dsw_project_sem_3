
<style>
    *{
           margin:0;
           padding:0;
           font-family:sans-serif;

    }
    .hero{
            height:100%;
            width:100%;
           background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(banner.jpg);
           background-position: center;
           background-size: cover;
           position:absolute;
       }   
    .hello{
         color:white;
         font-size:20px;
         top:28px;
         position:relative;
    }
    .gfg {
        margin: 15;
        position: relative;
        padding: 0;
        box-sizing: border-box;
        display: inline;
    }

    .first-txt {
        font-size: 15px;
        position: absolute;
        top: 17px;
        left: 42px;
        text-align: center;
        color: white;
    }
    .tp{
        top:100px;
        position:absolute;
    }
    .btn{
        width:220px;
        height:50;
        margin:35px auto;
        position:relative;
        box-shadow:0 0 20px 9px #ff61241f;
        border-radius:40px;
    }
    .btn:hover{
        color:red;
    }
    .hello2{
        color:white;
        font-size:30px;
        position:relative;
    }

</style>

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
echo'<div class="hero"><div class="tp">';
echo "<div class='hello2'>WELCOME ".$tname." </div>";
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
    echo "<span class='gfg'><button><image src = './uploads/".$k."' height='250' width='250'><span class='first-txt'>".$mane." ".$date." ".$r['timing']." ".$price."</span></button></span>";

}

echo '</div></div><form method = "POST" action ="check_theater.php" ><input type ="hidden" name="phone" value ="'.$phone.'"><input type ="hidden" name="pass" value ="'.$pass.'"><input type = "submit" class="btn" value = "GO TO PREVIOUS PAGE"></form>';

?>

