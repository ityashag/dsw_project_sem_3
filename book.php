<style>
    .big{
        width: 30px;
         height:30px;
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
    echo '<div>Welcome ' . $name . '</div>';
    echo '<div style="text-align:center">Select the seats that you may like <div>';
    echo '<form method="POST" action="payment.php">';
    for ($i = 0; $i < 10; $i++) {
        //echo '<span>'.($i+1).'</span>';
        for ($j = 0; $j < 10; $j++){
            echo '<input type="checkbox" class="big" name="seat[]" value="' . $i * 10 + $j. '">';
        }
        echo '<br>';
    }
    echo '<input type="hidden" name="sl_id" value="'.$sl_id.'">';
    echo '<input type="hidden" name="cid" value="'.$cid.'">';
    echo '<div> <input type="submit" name="submitb" value="Proceed to pay" ></div>';
    echo '</form>';
    mysqli_close($con);
    

// $a=mysqli_fetch_array($a);
// $a=$a['ct'];
// $i=0;
// $bookin=mysqli_query($con,"select * from booking");
// $row;
// for($i=0;$i<$a-1;$i++)
//     $row=mysqli_fetch_array($bookin);


?>