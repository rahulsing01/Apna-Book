<?php 
include './admin-header.php';
include '../connection.php';

?>




<main id="main" class="main">

     <!-- book details table section -->
  <section class="section">
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
                    <th scope="col">Book Id</th>
                    <th scope="col">Book Image</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Book_Title</th>
                    <th scope="col">No_Of_Page</th>
                    <th scope="col">Publication_Year</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>


                <tbody>
                <?php
                    $sql="select * from  book_details";
                    $q=mysqli_query($conn,$sql);
                    $row=mysqli_num_rows($q);
                    
                
                    while($result = mysqli_fetch_assoc($q))
                    {
                      $imagedisplay = base64_encode($result['image']);
                    echo  '<tr>
                    <td>'.$result["Book_id"].'</td>
                    <td><img src = "data:image/jpg;base64,' . $imagedisplay . '" width = "60px"</td>
                    <td>'.$result["ISBN"].'</td>
                    <td>'.$result["Book_Title"].'</td>
                    <td>'.$result["No_Of_Page"].'</td>
                    <td>'.$result["Publication_Year"].'</td>
                    <td>
                    <a href="update.php?bookid='.$result["Book_id"].'" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="bi bi-pen"></i></a>
                    <a href="delete.php?bookid='.$result["Book_id"].'" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"> <i class="bi bi-trash"></i></a>
                    </td>
                    
                    </tr>';
                
                    
                    }
                ?>
                </tbody>

            </table>
<!-- End Table with stripped rows -->

</div>
</div>
<td>
                    <!-- <a href="prac.php?bookid=$result[Book_id]"><input type="submit" value="view" class="update"></a></td>
                    <td> -->
</div>
</div>
</section>

    

  <!-- ends book details table section -->
</main>

<?php 

include './admin-footer.php';
?>

