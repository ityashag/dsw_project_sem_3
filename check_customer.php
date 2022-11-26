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
$q = mysqli_query($con, "select count(*) as ct , pass from customer where phone_no=$phone");
$q = mysqli_fetch_array($q);
$k=0;
if ($q['ct'] == 0) {
    echo '<script> alert("not found") </script>';
    //header("Location: dsw_pro_cutomer.html");
    $k=1;
} else {
    $cpass = $q['pass'];
    if ($cpass == $pass) {
    } else {
        $k=1;
        //header("Location: dsw_pro_cutomer.html");
    }
}
if($k==1)
{
    // session_start();
    // $message = 'f';
    // $_SESSION['message'] = 'success';
    header("Location: dsw_pro_cutomer.html");

}

$q = mysqli_query($con, "select * from slot");

echo '<form method="POST" action="check_customer.php">';
while ($r = mysqli_fetch_array($q)) {
    $tid = $r['tid'];
    $tname = mysqli_query($con, "select tname as t from theatre where tid=$tid");
    $tname = mysqli_fetch_array($tname);
    $tname = $tname['t'];
    $date = $r['dt'];
    $timing=$r['timing'];

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
    else if($timing==4){
        $timing="9:00 P.M.";
    }
    echo '<span class="gfg"> <button><img src="Batman.jpg" name="" width="300" height="300"> <span class="first-txt">' . $tname . ' ' . $date .' '.$timing. '<span/> </button>   </span>';
}
echo '</form>';


?>