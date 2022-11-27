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
         font-size:50px;
         top:28px;
         position:absolute;
    }
    .bloc {
        margin: 15;
        position: relative;
        padding: 0;
        box-sizing: border-box;
        display: inline;
    }
    .nav a {
        position: relative;
        left: 75%;
        margin-top: 20px;
        top: 40px;
        color: white;
        text-decoration: none;
        text-indent: 100px;
    }

    nav {
        width: 100%;
        height: 75px;
        line-height: 75px;
        padding: 0px 100px;
        position: fixed;
        background-image: linear-gradient(#0..747, #012733);
    }
    .first-txt {
        font-size: 20px;
        position: absolute;
        top: 17px;
        left: 42px;
        text-align: center;
        color: white;
    }

    .second-txt {
        position: absolute;
        bottom: 20px;
        left: 10px;
    }




    header,
    footer {
        font-family: verdana;
        position: relative;
        background-color: #000;
        width: 100%;
        color: white;
    }

    header {
        height: 10vh;
    }

    .headerh2 {
        position: absolute;
        top:30px;
        margin-bottom: 5px;
        left: 1%;
        font-size: 200%;
    }

    footer {
        height: 10vh;
        bottom: 5;
    }

    footer h2 {
        position: absolute;
        left: 40%;
    }






















</style>

<?php

$con = mysqli_connect("localhost", "root", "", "mcc");
$phone = $_POST["phone"];
$pass = $_POST["pass"];
$q = mysqli_query($con, "select count(*) as ct , pass,cid from customer where phone_no=$phone");
$q = mysqli_fetch_array($q);
if ($q['ct'] == 0) {
    echo '<script> alert("Incorrect password") </script>';
    header("Location: dsw_pro_cutomer.html");
} else {
    $cid=$q['cid'];
    $cpass = $q['pass'];
    if ($cpass == $pass) {
    } else {
        header("Location: dsw_pro_customer.html");
    }
}

$q = mysqli_query($con, "select * from slot");
//$name=mysqli_query($con,"select cname from customer where phone_no=$phone");
//$name=mysqli_fetch_array($name);
//$name=$name['cname'];
$movies=mysqli_query($con,"select mname from movie");
$name=mysqli_query($con,"select cname as t from customer where phone_no=$phone");
$name=mysqli_fetch_array($name);
$name=$name['t'];



    echo'
    
    
    <footer>
    <h2 class="headerh2">Welcome '.$name .'</h2>
     <div class="nav"> 
      
       <a href="index.html">Logout || </a>
       <a href="about_us.html"> About Us || </a>
       <a href="contact_us.html"> Contact Us   </a>
    </footer>
    
    
    
    
    
    
    
    
    ';














//echo '<div class="hero"><div class="hello">Welcome '.$name.'</div>'.'<br><br><br><br><br><br>';

echo'<div class="hero"></div>'.'<br><br><br>';



/*echo'
    <div>
    <select>';
        while($r=mysqli_fetch_array($movies)){
            $m=$r['mname'];
           echo ' <option value="'.$m.'">'.$m.'</option>';
        }
    echo'</select>
    </div>
';*/
$cot=1;
echo '<form method="POST" action="book.php" >';
while ($r = mysqli_fetch_array($q)) {
    $tid = $r['tid'];
    $tname = mysqli_query($con, "select tname as t from theatre where tid=$tid");
    $tname = mysqli_fetch_array($tname);
    $tname = $tname['t'];
    $date = $r['dt'];
    $timing=$r['timing'];
    $sl_id=$r['sl_id'];
    if($timing==1){
        $timing="9:00 A.M.";
    }
    else if($timing==2){
        $timing="12:00 P.M.";
    }
    else if($timing==3){
        $timing="3:00 P.M.";
    }
    else if($timing==4){
        $timing="6:00 P.M.";
    }
    else if($timing==5){
        $timing="9:00 P.M.";
    }
    $mid = mysqli_query($con, "select mid as t from slot where sl_id=$sl_id");
    $mid = mysqli_fetch_array($mid);
    $mid = $mid['t'];
    $photo=mysqli_query($con,"select photo from movie where mid=$mid");
    $photo = mysqli_fetch_array($photo);
    $photo = $photo['photo'];
    if($cot%6==0)
        echo'<br><br><br><br>';
    $cot++;
    echo '<span class="bloc"> <button name="movie" value="'.$sl_id.'"><img src="./uploads/'.$photo.'"  width="250" height="250" onClick="book.php"> <span class="first-txt">' . $tname . ' ' . $date .' '.$timing. '</span></button></span>';
}
echo '<input type ="hidden" name="cid" value="'.$cid.'"> ';
echo '</form></div>';


?>