<style>
    
    .gfg {
        margin: 3%;
        position: relative;
    }

    .first-txt {
        font-size: 15px;
        position: absolute;
        top: 17px;
        left: 50px;
        text-align: center;
        color: black;
    }

    .second-txt {
        position: absolute;
        bottom: 20px;
        left: 10px;
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
    //header("Location: dsw_pro_cutomer.html");
} else {
    $cid=$q['cid'];
    $cpass = $q['pass'];
    if ($cpass == $pass) {
    } else {
        header("Location: dsw_pro_cutomer.html");
    }
}

$q = mysqli_query($con, "select * from slot");
$name=mysqli_query($con,"select cname from customer where phone_no=$phone");
$name=mysqli_fetch_array($name);
$name=$name['cname'];
echo '<div>Welcome '.$name.'</div>';
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
    echo '<span class="gfg"> <button name="movie" value="'.$sl_id.'"><img src="Batman.jpg"  width="300" height="300" onClick="book.php"> <span class="first-txt">' . $tname . ' ' . $date .' '.$timing. '</span></button></span>';
}
echo '<input type ="hidden" name="cid" value="'.$cid.'"> ';
echo '</form>';


?>