

<!doctype html>
  <head>
   <title>Theater</title>
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
          position:relative;
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
          top:150px;
          position:absolute;
          width:280px;
          transition:0.5s;
 } 
      .input-field{
       width:100%;
       padding:8px 0;
       margin:5px 0;
       border-left:0;
       border-right:0;
       border-top:0;
       border-bottom:1px solid #99;
       outline:none;
       //background:transparent;
}
     .submit-btn{
          width:85%;
          padding:9px 10px;
          cursor:pointer;
          display:block;
          margin:auto;
          background:linear-gradient(to right,#ff105f,#ffad06);
          border:0;
          outline: none;
          border-radius:25px;
          
          
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
        
.file_upload{
        
      background-image:linear-gradient(#0..747,#012733)  ;
}


 header,footer
{
 font-family:verdana;
 position:absolute;
 background-color:#000;
 width:100%;
 color:white;
 }
header
{
 height:10vh;
}
.headerh2
{
 position:absolute;
 margin-top:15px;
 left:35%;
 font-size:250%;
}
footer
{
 height:10vh;
 bottom:0;
}
footer h2
{
 position:absolute;
 left:40%;
}
.nav a
{
position:relative;
left:80%;
margin-top:20px;
top:40px;
color:white;
text-decoration:none;
}
.btn{
  width:50%;
   padding:9px 10px;
   cursor:pointer;
          display:block;
          margin:auto;
          background:linear-gradient(to right,#ff105f,#ffad06);
          border:0;
          outline: none;
          border-radius:25px;
  margin-top:300px;
}



 </style>
  </head>
<body>
<?php
$con = mysqli_connect('localhost', 'root', '', 'mcc');
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$q = mysqli_query(
    $con,
    "select count(*) as ct ,pass,tname ,tid from theatre where phone_no=$phone"
);
$id=0;
$q = mysqli_fetch_array($q);
if ($q['ct'] == 0) {
    echo '<script> alert("Incorrect password") </script>';
    header('Location: dsw_pro_theater.html');
} else {
  $id=$q['tid'];
    $cpass = $q['pass'];
    if ($cpass == $pass) {
    } else {
        header('Location: dsw_pro_theater.html');
    }
}

// add items


echo '<div class="hero">

            <div class="form-box">
             <h1 id="name">Theater Details</h1>
 <div class="social-icons">
         
           <div id="btn"></div>
           <div class="button-box">
             
              
              <button type= "button" class="toggle-btn" onclick="login()">Add Movie</button>
              <button type= "button" class="toggle-btn" onclick="register()">Delete Movie</button> 
           </div>
         
    </div>
            <form class="input-group" id="login" method="POST" action = "add_slot.php"  enctype="multipart/form-data">
                <input type="text" class="input-field" placeholder="Movie name" name ="name" > 
                <input type="number" class="input-field" placeholder="Ticket Price(in Rs)" name ="price" >
                <input type="file" class="input-field" placeholder="photo" name ="photo" >
                <input type="hidden" name = "theater" value = "'.$id.'" >
                <input type="hidden" name = "phone" value = "'.$phone.'" >
                <input type="hidden" name = "pass" value = "'.$pass.'" >
                <select class="input-field" name="time" id="time"  required>
                <option value="Choose the timings">Choose the timings</option>
                <option value="1">9:00 a.m</option>
                <option value="2">12:00 p.m</option>
                <option value="3">3:00 p.m</option>
                <option value="4">6:00 p.m</option>
                <option value="5">9:00 p.m</option>
                <input type="date" name="data" class="input-field"><span></span>
                <input type="submit" class="submit-btn" value="ADD" onClick="add_slot.php" ></button>
                <br>
              </form>
           <form class="input-group" id="register" method="POST" action = "delete_slot.php">
                <input type="text" class="input-field" placeholder="Movie name" name ="name" required> 
                <input type="date" name ="data" class="input-field"><span></span>
                <input type="hidden" name = "theater" value = "'.$id.'" >
                <input type="hidden" name = "phone" value = "'.$phone.'" >
                <input type="hidden" name = "pass" value = "'.$pass.'" >
                <select class="input-field" name="time" id="time"  required>
                <option value="Choose the timings">Choose the timings</option>
                <option value="1">9:00 a.m</option>
                <option value="2">12:00 p.m</option>
                <option value="3">3:00 p.m</option>
                <option value="4">6:00 p.m</option>
                <option value="5">9:00 p.m</option>
                <input type="submit" class="submit-btn" value="REMOVE"></button>
         	<br>
           </form>
    </div> 

 <footer>
 <h2 class="headerh2">Welcome '.$q["tname"].'</h2>
  <div class="nav"> 
   
    <a href="index.html">Log Out || </a>
    <a href="movies.php"> Movies ||  </a>
    <a href="about_us.html"> About Us || </a>
    <a href="contact_us.html"> Contact Us   </a>
 </footer>';



  ?>
  
  <script>
     var x= document.getElementById("login");
     var y= document.getElementById("register");
     var z= document.getElementById("btn");
     function register(){
       x.style.left="-400px";
       y.style.left="50px";
       z.style.left="110px";
}
    function login(){
       x.style.left="50px";
       y.style.left="450px";
       z.style.left="0";
}
 </script>  



 </body>
</html>