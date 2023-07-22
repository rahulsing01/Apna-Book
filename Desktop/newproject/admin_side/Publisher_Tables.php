<?php 
include './admin-header.php';
include '../connection.php';

?>
<main id="main" class="main">

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


<?php 

include './admin-footer.php';
?>