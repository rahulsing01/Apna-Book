<?php

include './header.php';
include './connection.php';

?>

<style>.class{
  z-index: 1;
}</style>
<body>
<!-- -------------------------------------------------------------------------------------------- -->

<main id="main" class="main">



<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
      <div class="page-header d-flex align-items-center swiper-slide" style="background-image: url('images/cssbackground.jpeg');">
      <div class="swiper-pagination"></div>
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Wishlist Details</h2>
              <p>This is the list of all the book of your preference</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="wishlist.php">Wishlist Details</a></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    

     <!-- book details table section -->
  <section class="section" style="margin:30px; margin-top:-30px;">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Wishlist Deatils Table</h5>
              <p>Total numbers of Wishlist registered in the system</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <!-- <th scope="col">Book Id</th> -->
                    
                    <th scope="col">ISBN</th>
                    <th scope="col">Book_Title</th>
                    <th scope="col">Book AUTHOR</th>
                    <th scope="col">Publication_Year</th>
                    <th scope="col">usermail</th>
                    
                    <th scope="col">Operations</th>
                    <!-- <th scope="col">Operations</th> -->
                  </tr>
                </thead>


                <tbody>
                <?php
                  if( $_SESSION['email']==true)
                  {
                   $usermail= $_SESSION['email'];
               }else{
                   header('location:login.php');
               }
                    $sql="select * from  wlist where bookemail='$usermail'";
                    $q=mysqli_query($conn,$sql);
                    //$row=mysqli_num_rows($q);
                    
                    // <td>'.$result["Book_id"].'</td>
                
                    while($result = mysqli_fetch_array($q))
                    {
                      
                    echo  '<tr>
                    
                    
                    <td>'.$result["ISBN"].'</td>
                    <td>'.$result["bookname"].'</td>
                    <td>'.$result["author"].'</td>
                    <td>'.$result["year"].'</td>
                    <td>'.$result["bookemail"].'</td>
                    <td>
                   <a href="deletewish.php?bookid='.$result["ISBN"].'" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"> <i class="bi bi-trash"></i></a>
                    
                   ';
                
                    
                    }
                ?>
                </tbody>

</table>
<!-- End Table with stripped rows -->

</div>
</div>

</div>
</div>
</section>

    

  <!-- ends book details table section -->
</main>





















<?php
include './footer.php';

?>