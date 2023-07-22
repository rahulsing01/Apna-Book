<?php 
include './admin-header.php';
include '../connection.php';

?>


<main id="main" class="main">

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

</main>

<?php 

include './admin-footer.php';
?>