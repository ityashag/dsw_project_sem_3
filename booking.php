<?php
    $seats=$_POST['seat'];
    $cid=$_POST['cid'];
    $sl_id=$_POST['sl_id'];
    $con = mysqli_connect("localhost", "root", "", "mcc");
    $no=count($seats);
    echo "Number of seats selected:".$no;
    $mid=mysqli_query($con,"select mid from slot where sl_id=$sl_id");
    $mid=mysqli_fetch_array($mid);
    $mid=$mid['mid'];
    $price=mysqli_query($con,"select mprice from movie where mid=$mid");
    $price=mysqli_fetch_array($price);
    $price=$price['mprice']*$no;
    echo "<br>Price to pay is: ".$price."<br>";
    for($i=0;$i<$no;$i++){
        echo $cid."  ".$sl_id."  ".$seats[$i]."<br>";
        //$sql="insert into booking values('".$cid."','".$sl_id."','".$seats[$i]."') ";
        //mysqli_query($con,$sql);
    }
?>
