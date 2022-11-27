<style>
    .big{
        width: 30px;
        height:30px;
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
    .btn{
        width:220px;
        margin:35px auto;
        position:relative;
        box-shadow:0 0 20px 9px #ff61241f;
        border-radius:30px;
    }
</style>
<?php
    //echo '<div> <imput type="submit" name="submitb" value="Proceed to pay"></div>';
    $sl_id = $_POST['movie'];
    $cid = $_POST['cid'];
    $con = mysqli_connect("localhost", "root", "", "mcc");
    //$a=mysqli_query($con,"select count(*) as ct from booking");
    $name = mysqli_query($con, "select cname from customer where cid=$cid");
    $name = mysqli_fetch_array($name);
    $name = $name['cname'];
    echo '<div class="hero"><div class="hello" >Welcome ' . $name . '</div>';
    echo '<div style="text-align:center">Select the seats that you may like <div>';
    echo '<form method="POST" action="payment.php">';
    $sql="select se_id from booking natural join seat where sl_id=$sl_id";
    $booked=mysqli_query($con,$sql);
    $sts=array();
    while($r=mysqli_fetch_array($booked)){
        $s=$r['se_id'];
        $sts[]=$s;
    }
    echo'<div class="se"><br><br><br><br><br><br>';
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++){
            $a= $i*10+$j+1;
            $b=false;
            foreach($sts as $stst){
                if($stst==$a)
                    $b=true;
            }
            if($b){
                echo '<input type="checkbox" checked="checked" onclick="return false" class="big" name="seats" value="' .$a.'">';
            }
            else{
                echo '<input type="checkbox" class="big" name="seat[]" value="' .$a.'" >';
            }
        }
        echo '<br>';
    }
    echo '</div><input type="hidden" name="sl_id" value="'.$sl_id.'">';
    echo '<input type="hidden" name="cid" value="'.$cid.'">';
    echo '<div> <input type="submit" class="btn" name="submitb" value="Proceed to pay" ></div>';
    echo '</form></div>';
    mysqli_close($con);
    

// $a=mysqli_fetch_array($a);
// $a=$a['ct'];
// $i=0;
// $bookin=mysqli_query($con,"select * from booking");
// $row;
// for($i=0;$i<$a-1;$i++)
//     $row=mysqli_fetch_array($bookin);


?>