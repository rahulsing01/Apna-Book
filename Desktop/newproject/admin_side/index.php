<?php 
include './admin-header.php';
include '../connection.php';

?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <!-- <div class="col-lg-8">
          <div class="row"> -->

            <!-- Users Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>

                      <?php
                        $sql = "SELECT * from user_register";

                        if ($result = mysqli_query($conn, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf($rowcount);
                         }
                      ?>
                      </h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <!-- <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li> -->
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Books</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $sql = "SELECT * from book_details";

                        if ($result = mysqli_query($conn, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf($rowcount);
                         }
                      ?>
                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <!-- <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li> -->
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Authors</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6> 
                        <?php
                        $sql = "SELECT * from author";

                        if ($result = mysqli_query($conn, $sql)) {
                        
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf($rowcount);
                         }
                      ?>
                      </h6>
                    

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


             <!-- publisher Card -->
             <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <!-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> -->
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Total Publisher</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6> 
                      <?php
                      $sql = "SELECT * from publisher";

                      if ($result = mysqli_query($conn, $sql)) {
                      
                          // Return the number of rows in result set
                          $rowcount = mysqli_num_rows( $result );
                          
                          // Display result
                          printf($rowcount);
                      }
                    ?>
                    </h6>
                  

                  </div>
                </div>

              </div>
            </div>

            </div><!-- End publisher Card -->
          </div>
        <!-- </div>
      </div> -->
    </section>



  <!-- user table section -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Table</h5>
              <p>Total numbers of users registered in the system</p>

              <?php
              $sql="select * from  user_register";
              $q=mysqli_query($conn,$sql);
              $row=mysqli_num_rows($q);
              
              ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <!-- <th scope="col">Sr.no</th> -->
                    <th scope="col">Username</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Dob</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                  </tr>
                </thead>


                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($q))
                    {
                    echo  "<tr>
                    <td>".$result['Username']."</td>
                    <td>".$result['Gender']."</td>
                    <td>".$result['DOB']."</td>
                    <td>".$result['Email_id']."</td>
                    <td>".$result['Contact']."</td>
                    
                    
                    </tr>";
                
                    
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
  <!-- end user table section -->



  <!-- book details table section -->
  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Book Deatils Table</h5>
              <p>Total numbers of Books registered in the system</p>

              <?php
              $sql="select * from  book_details";
              $q=mysqli_query($conn,$sql);
              $row=mysqli_num_rows($q);
              
              ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Book_id</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Book_Title</th>
                    <th scope="col">No_Of_Page</th>
                    <th scope="col">Publication_Year</th>
                  </tr>
                </thead>


                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($q))
                    {
                    echo  "<tr>
                    <td>".$result['Book_id']."</td>
                    <td>".$result['ISBN']."</td>
                    <td>".$result['Book_Title']."</td>
                    <td>".$result['No_Of_Page']."</td>
                    <td>".$result['Publication_Year']."</td>
                    </tr>";
                
                    
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



  <!-- author table section -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Authors Table</h5>
              <p>Total numbers of authors registered in the system</p>

              <?php
              $sql="select * from  author";
              $q=mysqli_query($conn,$sql);
              $row=mysqli_num_rows($q);
              
              ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Author_id</th>
                    <th scope="col">Author_Name</th>
                  </tr>
                </thead>


                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($q))
                    {
                    echo  "<tr>
                    <td>".$result['Author_id']."</td>
                    <td>".$result['Author_Name']."</td>
                    </tr>";
                
                    
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

  <!-- ends author table section -->



  <!-- publisher table section -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Publisher Table</h5>
              <p>Total numbers of publisher registered in the system</p>

              <?php
              $sql="select * from  publisher";
              $q=mysqli_query($conn,$sql);
              $row=mysqli_num_rows($q);
              
              ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Publisher_id</th>
                    <th scope="col">Publisher_Name</th>
                  </tr>
                </thead>


                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($q))
                    {
                    echo  "<tr>
                    <td>".$result['Publisher_id']."</td>
                    <td>".$result['Publisher_Name']."</td>
                    
                    </tr>";
                
                    
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

  <!-- ends publisher table section -->













           


         
       
    

  </main>
  
  <!-- End #main -->

<?php 

include './admin-footer.php';
?>