<?php

include './header.php';
include './connection.php';

?>


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
              <h2>Book Details</h2>
              <p>All the books stored in the database are shown here</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="booklist.php">Book Details</a></li>
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
              <h5 class="card-title">Book Deatils Table</h5>
              <p>Total numbers of Books registered in the system</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <!-- <th scope="col">Book Id</th> -->
                    <th scope="col">Book Image</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Book_Title</th>
                    <th scope="col">No_Of_Page</th>
                    <th scope="col">Publication_Year</th>
                    <th scope="col">Operations</th>
                    <!-- <th scope="col">Operations</th> -->
                  </tr>
                </thead>


                <tbody>
                <?php
                    $sql="select * from  book_details";
                    $q=mysqli_query($conn,$sql);
                    //$row=mysqli_num_rows($q);
                    
                    // <td>'.$result["Book_id"].'</td>
                
                    while($result = mysqli_fetch_array($q))
                    {
                      $imagedisplay = base64_encode($result['image']);
                    echo  '<tr>
                    
                    <td><img src = "data:image/jpg;base64,' . $imagedisplay . '" width = "60px"</td>
                    <td>'.$result["ISBN"].'</td>
                    <td>'.$result["Book_Title"].'</td>
                    <td>'.$result["No_Of_Page"].'</td>
                    <td>'.$result["Publication_Year"].'</td>
                    <td>
                    <a href="bookdetails3.php?bookid='.$result["Book_id"].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="View">View</a>
                    </td> 
                    </tr>';
                
                    
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