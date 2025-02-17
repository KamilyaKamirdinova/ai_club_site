<?php


$conn = mysqli_connect('localhost','root','','registration');

session_start();

if(isset($_POST['submit'])){

    $name=$_POST["name"];
    $last_name=$_POST["last_name"];
    $email=$_POST["email"];
    $password = md5($_POST["password"]);
    $cpassword = md5($_POST["cpassword"]);
    $phone=$_POST["phone"];
    $user_type = $_POST["user_type"];

   $select = " SELECT * FROM club WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page/admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location: user_page/user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>book</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
      
.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background-image: url(images/rm373batch2-05.jpg);
   background-size: cover;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: white;
   color:#4682B4;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: #4682B4;
   color:white;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:#4682B4;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: #4682B4;
   color:white;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
.header .navbarr a{
   font-size: 2rem;
   margin-left: 2rem;
   color:var(--white);
}

   </style>

</head>
<body>
<section class="header" style="background-image: url(images/rm373batch2-05.jpg);  background-size: cover;">
 <div class="image">
     <img src="images/llogo.png" alt="" width = 40px> 
   </div>
   <a href="home.php" class="logo"></a>


   <nav class="navbarr">
   <a href="about.php">ABOUT CLUB    </a>
   <a href="">|</a>
      <a href="home.php">FACTS    </a>
      <a href="">|</a>
      <a href="package.php">JOIN THE TEAM    </a>
      <a href="">|</a>
      <a href="book.php">LOG IN</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
        <a href="about.php"> <i class="fas fa-angle-right"></i> ABOUT CLUB</a>
         <a href="home.php"> <i class="fas fa-angle-right"></i> NEWS</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> JOIN THE TEAM</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> LOG IN</a>
      </div>


      <div class="box">
         <h3>contact info</h3>
        <a href="#"> <i class="fas fa-phone"></i> +996-222-333 </a>
         <a href="#"> <i class="fas fa-envelope"></i> ai.manas.club@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Bishkek, Kyrgyzstan - 720001—720083 </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"><span>2023</span> | Artificial Intelligence </div>

</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>