<?php

include './header.php';
include './connection.php';

?>
<head>

</head>
<style>
    .myimage{
        height: 40rem;
        width: 32rem;
    }

    .rightdiv{
        margin-left: -40px;
        /* font-size: 0; */
        padding-left: 0px;
    }

    .btn{
        height: 50px;
        width: 150px;
        margin-bottom: 10px;
    }
    .btnprice{
        background-color: #f85a40;
        border-color: #f85a40;
        font-size: 25px;
        height: 55px;
        width: auto;
    }
    .issuediv{
        display: inline-grid;
    }
    .issuediv a{
        font-size: 20px;
        padding-top: 8px;
        text-align: center;
    }
</style>

<?php 
    include './connection.php';
    $book_id=$_GET['bookid'];

    // $sql ="SELECT book_details.*, author.Author_Name, publisher.Publisher_Name, edition.Edition_Name, languages.Language_Name, book_price.Book_price, 
    //     FROM book_details
    //     JOIN book_author ON book_details.Book_id = book_author.Book_id 
    //     JOIN author ON book_author.Author_id = author.Author_id
        
    //     JOIN book_publisher ON book_details.Book_id = book_publisher.Book_id
    //     JOIN publisher ON book_publisher.Publisher_id = publisher.Publisher_id
        
    //     JOIN book_edition ON book_details.Book_id = book_edition.Book_id
    //     JOIN edition ON book_edition.Edition_id = edition.Edition_id

    //     JOIN book_language ON book_details.Book_id = book_language.Book_id
    //     JOIN languages ON book_language.language_id = languages.Language_id

    //     Join book_price On book_details.Book_id= book_price.Book_id


    //     WHERE book_details.Book_id = $book_id";


$sql = "SELECT book_details.*, author.Author_Name, publisher.Publisher_Name, edition.Edition_Name, languages.Language_Name, book_price.Book_price,
        sub_category.sub_category_id, sub_category.sub_category_name, category.category_id, category.category_name
        FROM book_details

        JOIN book_author ON book_details.Book_id = book_author.Book_id 
        JOIN author ON book_author.Author_id = author.Author_id

        JOIN book_publisher ON book_details.Book_id = book_publisher.Book_id
        JOIN publisher ON book_publisher.Publisher_id = publisher.Publisher_id
        
        JOIN book_edition ON book_details.Book_id = book_edition.Book_id
        JOIN edition ON book_edition.Edition_id = edition.Edition_id
        
        JOIN book_language ON book_details.Book_id = book_language.Book_id
        JOIN languages ON book_language.Language_id = languages.Language_id
        
        JOIN book_price ON book_details.Book_id = book_price.Book_id

        JOIN category ON book_details.Book_id = category.Book_id
        
        JOIN sub_category ON category.category_id = sub_category.category_id
        
        WHERE book_details.Book_id = $book_id";


           

        
        // $sql = "select * from book_details where Book_id = $book_id";

        $record = mysqli_query($conn, $sql);

        if ($record) {
            if (mysqli_num_rows($record) > 0) {
                $row = mysqli_fetch_assoc($record);
                
                $id = $row['Book_id'];
                $isbn = $row['ISBN'];
                $bookname = $row['Book_Title'];
                $no_of_pages = $row['No_Of_Page'];
                $year = $row['Publication_Year'];
                $author = $row['Author_Name'];
                $publisher = $row['Publisher_Name'];
                $edition = $row['Edition_Name'];
                $language = $row['Language_Name'];
                $price = $row['Book_price'];
                $category = $row['category_name'];
                $subcategory = $row['sub_category_name'];
        
                $imagedisplay = base64_encode($row['image']);
            } else {
                echo "No records found.";
            }
        } else {
            // Query execution failed
            $errorMessage = mysqli_error($conn);
            echo "Query Error: " . $errorMessage;
        }
        
            
                
    ?>



<div class="breadcrumbs">
      <!-- <div class="page-header d-flex align-items-center" style="background-image: url('./images/0_aT9-nA8YKeHL43V9.jpg');"> -->
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <!-- <h2>Blog</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
             -->
            </div>
          </div>
        </div>
      <!-- </div> -->
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="booklist.php">Book Details</a></li>
            <li><?php echo "$category"; ?> </li>
            <li><?php echo "$subcategory"; ?> </li>
            <li><?php echo "$bookname"; ?> </li>
          </ol>
        </div>
      </nav>
</div><!-- End Breadcrumbs -->


   
        <!-- Product section-->
    
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">

                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="myimage card-img-top mb-5 mb-md-0" src="data:image/jpg;base64, <?php echo "$imagedisplay"?> " alt="..." /></div>
                    
                    <div class="rightdiv col-md-6">
                        <!-- <div class="small mb-1"><?php echo "<b>ID:</b> $id "; ?> </div> -->
                        <h1 class="display-5 fw-bolder"><?php echo "$bookname"; ?> </h1>
                        
                        <div class="fs-5 mb-5">
                            <!-- <span class="text-decoration-line-through">$45.00</span> -->
                            <button type="button" class="btn btnprice btn-primary">
                                <span><?php echo "<b>Special Price:</b> $price "; ?></span>
                            </button>
                        </div>

                        <p class="fs-5 mb-5"><?php echo "<b>ISBN:</b> $isbn "; ?></br>
                            <?php echo "<b>Author:</b> $author "; ?></br>
                            <?php echo "<b>Publisher:</b> $publisher "; ?></br>
                            <?php echo "<b>Edition:</b> $edition "; ?></br>
                            <?php echo "<b>Publication Year:</b> $year"; ?></br>
                            <?php echo "<b>No Of Pages:</b> $no_of_pages"; ?></br>
                            <?php echo "<b>Language:</b> $language "; ?></p>
                            
                        
                        <div class="issuediv">
                            <!-- <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" style="max-width: 3rem" /> -->
                            <a href="issuebook.php?bookTitle=<?php echo urlencode($bookname); ?>" class="btn btn-primary flex-shrink-0">Issue Book</a>
                            <a href="wish.php?bookid=<?php echo $row['ISBN'] ?>&bookname=<?php echo $row['Book_Title']?>&auth=<?php echo $row['Author_Name']?>&year=<?php echo $row['Publication_Year']?>" class="btn btn-primary flex-shrink-0"><i class="bi bi-heart me-1"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </section>


        
        <!-- Related items section-->

        <?php 
        // $sql = "SELECT book_details.Book_Title, book_price.Book_price, category.category_name, sub_category.sub_category_name
        //         FROM book_details 
        //         JOIN book_price ON book_details.Book_id = book_price.Book_id
        //         JOIN category ON book_details.Book_id = category.Book_id
        //         JOIN sub_category ON category.category_id = sub_category.category_id
        //         WHERE sub_category.sub_category_name = $subcategory";

                // $sql ="SELECT sub_category.sub_category_name, category.category_name FROM sub_category 
                // JOIN category ON sub_category.category_id = category.category_id
                //  where sub_category.category_id = '5' ";
                

        // $sql = "SELECT book_details.Book_Title, book_price.Book_price, category.category_name, sub_category.sub_category_name
        //         FROM book_details
        //         JOIN book_price ON book_details.Book_id = book_price.Book_id
        //         JOIN category ON book_details.Book_id = category.Book_id
        //         WHERE category.category_name = (SELECT categoyr.category_name book_details.Book_id FROM category WHERE book_details.Book_id = $book_id)
        //         AND book_details.Book_id <> $book_id
        //         LIMIT 4;";

                $record = mysqli_query($conn, $sql);

                if ($record) {
                    if (mysqli_num_rows($record) > 0) {
                        $row = mysqli_fetch_assoc($record);
                       
                        

                    } else {
                        echo "No records found.";
                    }
                } else {
                    // Query execution failed
                    $errorMessage = mysqli_error($conn);
                    echo "Query Error: " . $errorMessage;
                }
        ?>


        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related Books</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">FullStack React</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a> <i class="fa fa-heart"></i> </button></div>
                            </div>
                        </div>
                    </div>


                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                    $18.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Sale Item</h5>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                    $25.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Popular Item</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    $40.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
    </body>
</html>


<?php

include './footer.php';

?>

