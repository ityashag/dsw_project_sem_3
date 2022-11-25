<?php
$con = mysqli_connect('localhost', 'root', '', 'mcc');
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$q = mysqli_query(
    $con,
    "select count(*) as ct ,pass from theatre where phone_no=$phone"
);
$q = mysqli_fetch_array($q);
if ($q['ct'] == 0) {
    echo '<script> alert("Incorrect password") </script>';
    header('Location: dsw_pro_theater.html');
} else {
    $cpass = $q['pass'];
    if ($cpass == $pass) {
    } else {
        header('Location: dsw_pro_theater.html');
    }
}

// add


?>
