<?php
    $seats=$_POST['seat'];
    $cid=$_POST['cid'];
    $sl_id=$_POST['sl_id'];
    echo 'You have successfull book the ticket<br>';
    echo "cid: ".$cid."<br>";
    echo "slot: ".$sl_id."<br>";
    echo "seats: ";
    foreach($seats as $s)
        echo $s." ";
?>