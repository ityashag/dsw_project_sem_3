<style>
    body{
        text-align: center;
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
        margin-top: 100px;;
         color:white;
         font-size:25px;
         top:28px;
         text-align:center;
         position:relative;
    }
    .btn{
        width:220px;
        height:5%;
        margin:5px auto;
        position:relative;
        box-shadow:0 0 20px 9px #ff61241f;
        border-radius:30px;
    }
    .btn:hover{
        color: red;
    }
</style>
<?php
    $seats=$_POST['seat'];
    $cid=$_POST['cid'];
    $sl_id=$_POST['sl_id'];
    $timing="";
    if($sl_id==1){
        $timing="9:00 A.M.";
    }
    else if($sl_id==2){
        $timing="12:00 P.M.";
    }
    else if($sl_id==3){
        $timing="3:00 P.M.";
    }
    else if($sl_id==4){
        $timing="6:00 P.M.";
    }
    else if($sl_id==5){
        $timing="9:00 P.M.";
    }
    $con=mysqli_connect("localhost","root","","mcc");
    $tid=mysqli_query($con,"select tid from slot where sl_id=$sl_id");
    $tid=mysqli_fetch_array($tid);
    $tid=$tid['tid'];
    $tname=mysqli_query($con,"select tname from theatre where tid=$tid");
    $tname=mysqli_fetch_array($tname);
    $tname=$tname['tname'];
    echo '<div class="hero"><div class="hello">You have successfull book the ticket<br>';
    echo "cid: ".$cid."<br>";
    echo "Time: ".$timing."<br>";
    echo "Theatre: ".$tname."<br>";
    echo "seats: ";
    foreach($seats as $s)
        echo $s." ";
    echo '<br><br><br><br></div>';
    foreach($seats as $s){
        mysqli_query($con,"insert into booking values($cid,$sl_id,$s)");
    }
        
    echo '<div> <form action="index.html"><input type="submit" class="btn" value="Logout"></form></div>';
    $phone=mysqli_query($con,"select phone_no from customer where cid=$cid");
    $phone=mysqli_fetch_array($phone);
    $phone=$phone['phone_no'];
    $pass=mysqli_query($con,"select pass from customer where cid=$cid");
    $pass=mysqli_fetch_array($pass);
    $pass=$pass['pass'];

    echo '
    <form method="POST" action="check_customer.php">
        <input type="hidden" name="phone" value="'.$phone.'">
        <input type="hidden" name="pass" value="'.$pass.'">
        <input type="submit" class="btn" name="submit" value="Continue browsing">
    </form></div>';
?>