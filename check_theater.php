<!DOCTYPE HTML>
<html>
  <head>
   <title>THEATER</title>
   <style>
      *{
           margin:0;
           padding:0;
           font-family:sans-serif;

}   
    
     .hero{
            height:100%;
            width:100%;
           background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(banner.jpg);
           background-position: center;
           background-size: cover;
           position:absolute;
       }
     .form-box{
           width:380px;
           height:480px;
           position:relative;
           margin:6% auto;
           background: #fff;
           padding:5px;
           overflow:hidden;
} 
     .button-box{
          width:220px;
          margin:35px auto;
          poistion:relative;
          box-shadow:0 0 20px 9px #ff61241f;
          border-radius:30px;
          }
      .toggle-btn{
          
          padding:10px 30px;
          cursor:pointer;
          background:transparent;
          border:0;
          outline:none;
          position:relative;
         }
      #btn{
         top:0; 
         left:0;
         position:absolute;
         width:110px;
         height:100%;
         
         }
        .social-icons{
          margin: 30px auto;
          text-align:center;
         }
         .social-icons img{
          width:50px;
          
         }
       #name{
         text-align:center;
         margin:0 12px;
         box-shadow:0 0 20px 0 #7f7f7f3d;
         cursor:pointer;
         border-radius:50%;
}
       .input-group{
          top:180px;
          position:absolute;
          width:280px;
          transition:0.5s;
 } 
      .input-field{
       width:100%;
       padding:10px 0;
       margin:5px 0;
       border-left:0;
       border-right:0;
       border-top:0;
       border-bottom:1px solid #99;
       outline:none;
       background:transparent;
}
     .submit-btn{
          width:85%;
          padding:10px 30px;
          cursor:pointer;
          display:block;
          margin:auto;
          background:linear-gradient(to right,#ff105f,#ffad06);
          border:0;
          outline: none;
          border-radius:30px;
          
          
}
   .check-box{
      margin:30px 10px 30px 0;
      }
   span{
         color:#777;
         font-size:12px;
         bottom:68px;
         position:absolute;
        }
   #login{
         left:50px;
   

}
  #register{
         left:450px;
   

}
  nav{
      width:100%;
      height:75px;
      line-height:75px;
      padding:0px 100px;
      position:fixed;
      background-image:linear-gradient(#0..747,#012733)  ;
 }
 .top{
     font-size:30px;
     font-weight:bold;
     float:left;
     color:white;
     text-transform:uppercase;
     letter-spacing:1.5px;
     cursor:pointer;
  }
        


 </style>
  </head>
<body>

<?php
$con = mysqli_connect('localhost', 'root',"", 'mcc');
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$q = mysqli_query(
    $con,
    "select count(*) as ct ,pass,tname from theatre where phone_no=$phone"
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

// add items
//echo "Welcome".$q['tname'];

?>

    <div class="hero">
            <div class="form-box">
             <h1 id="name">Theater Deatails</h1>
 <div class="social-icons">
         
           <div id="btn"></div>
           <div class="button-box">
             
              
              <button type= "button" class="toggle-btn" onclick="login()">Movie details</button>
              
           </div>
         
    </div>
            <form class="input-group" id="login" method="POST" action = "test.php" enctype="multipart/form-data">
                <input type="text" class="input-field" placeholder="Movie name" name ="Mname" required> 
                <input type="number" class="input-field" placeholder="Ticket Price(in Rs)" name ="phone" required> 
                <input type="file" class="input-field" placeholder="photo" name ="photo" required>
                <select class="input-field" name="time" id="time"  required>
                <input type="hidden" name = "theater" value = ".$pass." >
                <option value="Choose the timings">Choose the timings</option>
                <option value="9:00 a.m">9:00 a.m</option>
                <option value="12:00 p.m">12:00 p.m</option>
                <option value="3:00 p.m">3:00 p.m</option>
                <option value="6:00 p.m">6:00 p.m</option>
                <option value="9:00 p.m">9:00 p.m</option>
                </select>
                <input type="date" class="input-field"><span></span>
                <input type="submit" class="submit-btn" value="SUBMIT"></button>
           </form>
    </div>
  </div>
  


 </body>
</html>