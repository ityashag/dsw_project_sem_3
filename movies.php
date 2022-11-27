<style>
    .bloc {
        margin: 15;
        position: relative;
        padding: 0;
        box-sizing: border-box;
        display: inline;
    }

    .first-txt {
        font-size: 20px;
        position: absolute;
        top: 17px;
        left: 42px;
        text-align: center;
        color: white;
    }

    .hero {
        height: 100%;
        width: 100%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(banner.jpg);
        background-position: center;
        background-size: cover;
        position: absolute;
    }

    .hello {
        color: white;
        font-size: 50px;
        top: 28px;
        position: absolute;
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
        margin-bottom: 15px;
        left: 1%;
        font-size: 200%;
    }

    footer {
        height: 10vh;
        bottom: 10;
    }

    footer h2 {
        position: absolute;
        left: 40%;
    }
</style>



<?php

echo '

  <footer>
  <h2 class="headerh2">Welcome, these are the currently screening movies</h2>
   <div class="nav"> 
    
     <a href="index.html">Home || </a>
     <a href="about_us.html"> About Us || </a>
     <a href="contact_us.html"> Contact Us   </a>
  </footer>
    

';
$con = mysqli_connect("localhost", "root", "", "mcc");
$movies = mysqli_query($con, "select mname,photo from movie");
echo '<div class="hero"><br><br><br><br><br>';
$cot = 1;
while ($r = mysqli_fetch_array($movies)) {
    $mname = $r['mname'];
    $photo = $r['photo'];
    if ($cot % 6 == 0)
        echo '<br><br><br><br>';
    $cot++;
    echo '<span class="bloc"> <button name="movie" "><img src="./uploads/' . $photo . '"  width="250" height="250"> <span class="first-txt">' . $mname . '</span></button></span>';
}
echo '</div>';

?>