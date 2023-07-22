<?php
session_start();

// Check if the session values exist
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];

  // Display the values
} else {
  echo ""; // Handle the case when the user is not logged in
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ApnaBook</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/main.css" rel="stylesheet">
  
  <style>
  
    </style>

</head>

<body>

 <!-- ======= Header ======= -->
 <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">apnabook@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91 8759657168</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->



  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="img/logo.png" alt="">
        <!-- <h1>Impact<span>.</span></h1> -->
      </a>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="booklist.php">BookList 📑<span class="wish">  <?php  error_reporting(0); include 'connection.php';


$sql="select*from book_details";
$q=mysqli_query($conn,$sql);
$r=mysqli_num_rows($q);
echo $r;
?></span></a></li>

          <li><a href="search.php">Search</a></li>

          <li class="dropdown"><a href="#"><span>Donate Book</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="donatefillform.php">Donate Form</a></li>
              <li><a href="view_donation.php">View Donation</a></li>
            </ul>
          </li>

          <!-- <li><a href="#team">Team</a></li> -->

          <li><a href="wishlist.php">MyWishlist ❤️<span class="wish">  <?php  error_reporting(0); include 'connection.php';
          $email=$_SESSION["email"];

$sql="select*from wlist where bookemail='$email'";
$q=mysqli_query($conn,$sql);
$r=mysqli_num_rows($q);
echo $r;
?></span></a></li>
          
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->
      <?php 
      
      if(isset($_SESSION['email']))
      {
        include 'userprofile.php';
      }
      else{
        echo '<a href="registration.php" class="btn-get-started">Get Started</a>';
      
      }
      ?>

      

    </div>
  </header><!-- End Header -->


  

  <!-- <header id="header" class="header d-grid align-items-center">
    
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
     Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="img/logo.png" alt=""> -->
        <!-- <h1>Impact<span>.</span></h1> -->
      <!-- </a> -->

      <!-- <form action="search.php" method="GET">
		<div class="mydiv">
			<input class="myinput" type="text" name="query" id="query" placeholder="SEARCH BY TITLE, ISBN, AUTHOR, PUBLISHER">
			<button class="btn-get-started" type="submit">Search</button>
		</div> -->
		
		
	</form>

      <?php 
      
      // if(isset($_SESSION['email']))
      // {
      //   include 'userprofile.php';
      // }
      // else{
      //   echo '<a href="registration.php" class="btn-get-started">Get Started</a>';
      
      // }
      ?>
  </div>
      
     




    <!-- <div class="container-fluid container-xl d-flex align-items-center justify-content-between"> -->
      <!-- <a href="index.php" class="logo d-flex align-items-center"> -->
         <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="img/logo.png" alt=""> -->
        <!-- <h1>Impact<span>.</span></h1> -->
      <!-- </a>  -->
      
      <!-- <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="booklist.php">BookList</a></li>
          <li><a href="search.php">Search</a></li>

          <li class="dropdown"><a href="#"><span>Donate Book</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="donatefillform.php">Donate Form</a></li>
              <li><a href="view_donation.php">View Donation</a></li>
            </ul>
          </li>

          <li><a href="#team">Team</a></li> -->

          <!-- <li><a href="#">MyWishlist</a></li>
          
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav> --> 
      <!-- .navbar -->


      <?php 
      
      // if(isset($_SESSION['email']))
      // {
      //   include 'userprofile.php';
      // }
      // else{
      //   echo '<a href="registration.php" class="btn-get-started">Get Started</a>';
      
      // }
      ?>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->