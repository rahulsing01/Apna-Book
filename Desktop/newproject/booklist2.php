<?php

include './header.php';
include './connection.php';


?>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    body{
        background:#eee
        }
        
        .ratings i
        {font-size: 16px;
        color: red
        }
        .strike-text{
            color: red;
            text-decoration: line-through
            }
            
            .product-image{
                width: 100%
            }
            .dot{
                height: 7px;
                width: 7px;
                margin-left: 6px;
                margin-right: 6px;
                margin-top: 3px;
                background-color: blue;
                border-radius: 50%;
                display: inline-block
                }
                .spec-1{
                    color: #938787;
                    font-size: 15px
                    }
                h5{
                    font-weight: 400
                    }
                .para{
                    font-size: 16px
                    }
</style>

</head>
<body>

<main id="main" class="main">



<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
      <div class="page-header d-flex align-items-center swiper-slide" style="background-image: url('img/portfolio/branding-1.jpg');">
      <div class="swiper-pagination"></div>
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Book Details</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
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


<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">

        <?php
        
            $sql ="SELECT book_details.*, author.Author_Name, publisher.Publisher_Name, edition.Edition_Name, languages.Language_Name, book_price.Book_price, book_quantity.Quantity,
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
        
            Join book_quantity On book_details.Book_id = book_quantity.Book_id
        
            JOIN category ON book_details.Book_id = category.Book_id
        
            JOIN sub_category ON category.category_id = sub_category.category_id";
        
            $result = mysqli_query($conn, $sql);
        
            // Check if any results were returned
            if ($result->num_rows > 0) {
        
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)){
        
                    // Access the columns by their names
                    $isbn=$row['ISBN'];
                    $bookname=$row['Book_Title'];
                    $author=$row['Author_Name'];
                    $publisher=$row['Publisher_Name'];
                    $year=$row['Publication_Year'];
                    $edition=$row['Edition_Name'];
                    $no_of_pages=$row['No_Of_Page'];
                    $language=$row['Language_Name'];
                    $quantity=$row['Quantity'];
                    $price=$row['Book_price'];
                    $category = $row['category_name'];
                    $subcategory = $row['sub_category_name'];
                    $imagedisplay = base64_encode($row['image']);
                
        
    
    
    

                    echo '<div class="row p-2 bg-white border rounded">';

                        echo '<div class="col-md-3 mt-1" style="width:200px" ><img class="img-fluid img-responsive rounded product-image" style="height:250px; width:200px" src = "data:image/jpg;base64,' . $imagedisplay . '"></div>';
                            echo '<div class="col-md-6 mt-1">';
                            echo '<h5><b>'.$bookname.'</b></h5>';
                            echo '<p class="text-justify text-truncate para mb-0"><b>ISBN:</b> '.$isbn.'<br></p>';
                            echo '<p class="text-justify text-truncate para mb-0"><b>Author:</b> '.$author.'<br></p>';
                            echo '<p class="text-justify text-truncate para mb-0"><b>Publisher:</b> '.$publisher.'<br></p>';
                            echo '<p class="text-justify text-truncate para mb-0"><b>Edition:</b> '.$edition.'<br></p>';
                            echo '<p class="text-justify text-truncate para mb-0"><b>Publication year:</b> '.$year.'<br></p>';
                        echo '</div>';

                        echo '<div class="align-items-center align-content-center col-md-3 border-left mt-1">';

                            echo '<div class="d-flex flex-row align-items-center">';
                                echo '<h4 class="mr-1"><b>₹ </b>'.$price.'</h4>';
                            echo '</div>';

                            echo '<div class="d-flex flex-column mt-4">';
                                echo '<a href="bookdetails3.php?bookid= '.$row["Book_id"].' "<button class="btn btn-primary btn-sm" type="button">Details</button></a> ';
                                echo '<button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>';
                            echo '</div>';

                        echo '</div>';

                    echo '</div>';
                    echo '</br>';
                }
        
            } else {
                echo "No results found.";
            }

        ?>

            <!-- <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://i.imgur.com/JvPeqEF.jpg"></div>
                <div class="col-md-6 mt-1">
                    <h5>Quant trident shirts</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                    </div>
                    <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div>
                    <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div>
                    <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">$14.99</h4><span class="strike-text">$20.99</span>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Details</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
                </div>
            </div> -->
        </div>
    </div>
</div>

            
</main>

</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<?php
include './footer.php';

?>