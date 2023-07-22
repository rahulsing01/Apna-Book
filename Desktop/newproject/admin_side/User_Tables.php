<?php 
include './admin-header.php';
include '../connection.php';

?>


<main id="main" class="main">

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
                    <th scope="col">Sr.no</th>
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
                    <td>".$result['register_id']."</td>
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

</main>


<?php 

include './admin-footer.php';
?>