<?php

include './header.php';
include './connection.php';


?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>ApnaBook</span></h2>
          <h2><span><?php 
          error_reporting(0);
          echo "$username";  ?></span></h2>
          <p>Apnabook is an online platform that provides users with access to a vast collection of books in multiple ways. Users can easily search for books from the extensive library collection. Additionally, the platform offers various features such as issuing or returning books, donating books, and creating personalized wishlists.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">


          <?php 
        
            if(isset($_SESSION['email']))
            {
              
            }
            else{
              echo '<a href="registration.php" class="btn-get-started">Register</a>';
            
            }
          ?>

            <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>



             <!-- boxes -->
             <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-book"></i></div>
              <h4 class="title"><a href="donatefillform.php" class="stretched-link">Donate Books</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-book"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Issue Books</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-heart"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Personalised Wishlist</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-alarm"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Get Notification Upadte</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>





</section>
    <!-- End Hero Section -->

    <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>ApnaBook is a system which provides the books to the anyone who ever in need through our website</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>ApnaBook (Book Provider)</h3>
            <!-- <img src="img/about.jpg" class="img-fluid rounded-4 mb-4" alt=""> -->
            <p>The Book Management System is a comprehensive software solution designed to streamline the management and organization of book collections. Whether you are an avid reader, a librarian, or a bookshop owner, this system provides the tools you need to efficiently catalog, track, and maintain your books.</p>
            <p>With the Book Management System, you can effortlessly store and access detailed information about each book in your collection. From essential details like title, author, publisher, and publication date to additional metadata such as genre, subject matter, and keywords, the system ensures that your book database is complete and well-organized</p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
              Here are the key features of the ApnaBook System is its ability to track the status of each book.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> You can easily keep tabs on which books are checked out</li>
                <li><i class="bi bi-check-circle-fill"></i>Which ones are available on the shelves, and if any are on hold.</li>
                <li><i class="bi bi-check-circle-fill"></i> This ensures that you can quickly locate and retrieve any book when needed, minimizing the time spent searching for misplaced items.</li>
              </ul>
              <p>
              The user-friendly interface of the ApnaBook System makes it easy to navigate and perform various tasks. Whether you need to add new books, update existing records, the intuitive interface simplifies these operations, saving you time and effort.
              </p>

              <!-- <div class="position-relative mt-4">
                <img src="img/about-2.jpg" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
              </div> -->
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Us Section -->

   


    


    <!-- ======= Books Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Books</h2>
          <!-- <p>Popular Books</p> -->
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <!-- <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-product">Product</li>
              <li data-filter=".filter-branding">Branding</li>
              <li data-filter=".filter-books">Books</li> -->
              
            </ul> 
          </div>
           <!-- End Portfolio Filters -->

          <div class="row gy-4 portfolio-container">

          <?php 

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          // Perform the SQL query
          $sql = "SELECT book.*, auth.Author_Name
              FROM book_details book
              JOIN book_author ba ON book.Book_id = ba.Book_id
              JOIN author auth ON ba.Author_id = auth.Author_id
              LIMIT 10";

          // $result = $conn->query($sql);
          $result = mysqli_query($conn, $sql);

          // Check if any results were returned
          if ($result->num_rows > 0) {

            // Output data of each row
            while($row = mysqli_fetch_assoc($result)){

                // Access the columns by their names

                $bookTitle = $row["Book_Title"];
                $bookImage = $row["image"];
                $authorName = $row["Author_Name"];
                $imagedisplay = base64_encode($row['image']);

                
                echo '<div class="col-xl-4 col-md-6 portfolio-item filter-books">';
                echo '<div class="portfolio-wrap"style="object-fit:contain; width:100%; height:100%; align-item:center; text-align:center;">';
                echo '<a href="data:image/jpg;base64, '.$imagedisplay.' " data-gallery="portfolio-gallery-app" class="glightbox" style="object-fit:contain; width:100px; height:100px; align-item:center;"><img src = "data:image/jpg;base64,' . $imagedisplay . '" class="img-fluid" style="height:380px;"alt="image"></a>';
                echo '<div class="portfolio-info" style="height:130px;">';
                echo '<h4><a href="bookdetails3.php?bookid='.$row['Book_id'].' " title="More Details">' . $bookTitle . '</a></h4>';
                echo '<p><b>by</b>  '.$authorName.' </p>';
                echo '</div>';
                echo '</div>';
                echo '</div><!-- End Portfolio Item -->';
            }
          } else {
            echo "No results found.";
          }
         
          ?>

          
                </div>
              </div>
            </div>
            

          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section>


     <!-- ======= Our Services Section ======= -->
     <!-- <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <h3>Nesciunt Mete</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->
          <!-- End Service Item -->

          <!-- <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
            <img src="img/about-2.jpg" class="img-fluid rounded-4" alt=""> -->


              <!-- <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div> -->
              <!-- <h3>Eosle Commodi</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->
          <!-- End Service Item -->

          <!-- <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Ledo Markt</h3>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->
          <!-- End Service Item -->

          <!-- <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <h3>Asperiores Commodit</h3>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->
          <!-- End Service Item -->

          <!-- <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <h3>Velit Doloremque</h3>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->
          <!-- End Service Item -->
<!-- 
          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <h3>Dolori Architecto</h3>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->
          
          <!-- End Service Item -->

        <!-- </div>

      </div>
    </section> -->
    
    <!-- End Our Services Section -->


     <!-- ======= Our Team Section ======= -->
     <!-- <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>
          <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
        </div>

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="img/team/team-1.jpg" class="img-fluid" alt="">
              <h4>Walter White</h4>
              <span>Web Development</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div> -->
          
          <!-- End Team Member -->

          <!-- <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="img/team/team-2.jpg" class="img-fluid" alt="">
              <h4>Sarah Jhinson</h4>
              <span>Marketing</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div> -->
          
          <!-- End Team Member -->

          <!-- <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="img/team/team-3.jpg" class="img-fluid" alt="">
              <h4>William Anderson</h4>
              <span>Content</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div> -->
          <!-- End Team Member -->

          <!-- <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <img src="img/team/team-4.jpg" class="img-fluid" alt="">
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div> -->
          <!-- End Team Member -->

        <!-- </div>

      </div>
    </section> -->
    <!-- End Our Team Section -->



 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Send your feedback here</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Open Hours:</h4>
                  <p>Mon-Sat: 11AM - 23PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->
<?php
include './footer.php';

?>