<body>

    <img src=>
     
</body> 

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
    //echo '<span class="gfg"> <button name="movie" value="'.$sl_id.'"><img src="./uploads/'.$photo.'"  width="300" height="300" onClick="book.php"> <span class="first-txt">' . $tname . ' ' . $date .' '.$timing. '</span></button></span>';
    $movies=mysqli_query($con,"select mname from movie");
    
    echo '<form method="POST" action="book.php" >';
while ($r = mysqli_fetch_array($movies)) {
    $mid = mysqli_query($con, "select mid as t from slot where tid=$tid");
    $mid = mysqli_fetch_array($mid);
    $mid = $mid['t'];
    $photo=mysqli_query($con,"select photo from movie where mid=$mid");
    $photo = mysqli_fetch_array($photo);
    $photo = $photo['photo'];
    $m=$r['mname'];
    echo '<span class="gfg"> <button name="movie" value="'.$m.'"><img src="./uploads/'.$photo.'"  width="300" height="300" onClick="check_customer.php"> <span class="first-txt">' . $m. '</span></button></span>';
}
    /*
    echo'
    <div>
    <select>';
        while($r=mysqli_fetch_array($movies)){
            $m=$r['mname'];
           echo ' <option value="'.$m.'">'.$m.'</option>';
        }
    echo'</select>
    </div>';*/

?>