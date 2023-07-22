<?php

include './header.php';
include './connection.php';

?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
	<title>Search Books</title>
	<style>
		.book {
            display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			padding: 10px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			width: 300px;
        }
		

		.myinput {
			padding: 10px;
			font-size: 1.2em;
			border: 2px solid #ccc;
			border-radius: 5px;
			width: 600px;                 
		}

		button[type="submit"] {
			padding: 10px 20px;
			background-color: #333;
			color: #fff;
			font-size: 1.2em;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

        .book h2 {
			font-size: 1.5em;
			margin-bottom: 5px;
			color: #333;
		}

        .book p {
			margin: 0;
			font-size: 1.2em;
			font-style: italic;
			color: #666;
		}

        .no-results {
            font-size: 1.5em;
            text-align: center;
            margin-top: 50px;
            color: #999;
        }
		.lbl{
			font-size: 20px;
		}
		h1{
			text-align: center;
			font-family: "Montserrat",sans-serif;
			
		}
		.mydiv{
			text-align: center;

		}
		.errordiv{
			text-align: center;
			font-size: 30px;
		}

	</style>
</head>
<body>
<h1>Search Books</h1>
	<form action="search.php" method="GET">
		<div class="mydiv">
			<input class="myinput" type="text" name="query" id="query" placeholder="SEARCH BY TITLE, ISBN, AUTHOR, PUBLISHER, ">
			<button type="submit">Search</button>

		</div>
		
		
		
	</form>


	<section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">
	  	<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
	  		<div class="row gy-4 portfolio-container">

			  
			


	<?php
		// PHP
		// Check if the form has been submitted
		if (isset($_GET['query'])) {
			// Connect to the database
			$mysqli = new mysqli('localhost', 'root', '', 'apnabook');
			if ($mysqli->connect_errno) {
				echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
				exit();
			}
			
			// Prepare the query
			$query = '%' . $_GET['query'] . '%';
			// $sql = "SELECT DISTINCT book_details.Book_Title, author.Author_Name, edition.Edition_Name, publisher.Publisher_Name, book_details.image 
			// 	FROM book_details,book_author,edition,publisher 
			// 	INNER JOIN book_author ON book_details.Book_id = book_author.Book_id 
			// 	INNER JOIN author ON book_author.Author_id = author.Author_id 
			// 	INNER JOIN book_edition ON book_details.Book_id = book_edition.Book_id 
			// 	INNER JOIN edition ON book_edition.Edition_id = edition.Edition_id 
			// 	INNER JOIN publisher ON book_details.Book_id = publisher.Publisher_id 
			// 	WHERE book_details.Book_Title LIKE '%$query%' 
			// 	OR author.Author_Name LIKE '%$query%' 
			// 	OR edition.Edition_Name LIKE '%$query%' 
			// 	OR publisher.Publisher_Name LIKE '%$query%'";



			// $sql = "SELECT DISTINCT book_details.Book_Title,  book_details.ISBN,  book_details.image, book_details.Publication_Year, author.Author_Name, edition.Edition_Name, publisher.Publisher_Name
			// FROM book_details, author, book_author, edition, book_edition, publisher, book_publisher
			// where book_details.Book_id = book_author.Book_id and author.Author_id = book_author.Author_id
			// and book_edition.Edition_id = edition.Edition_id
			// and book_publisher.Publisher_id = publisher.Publisher_id
			// and (author.Author_Name LIKE '%".$query."%'  OR book_details.Book_Title LIKE '%".$query."%' OR book_details.Publication_Year LIKE '%".$query."%'
			// OR edition.Edition_Name LIKE '%".$query."%' OR book_details.ISBN LIKE '%".$query."%' 
			// OR publisher.Publisher_Name LIKE '%".$query."%') Group By book_details.Book_Title";

			$sql = "SELECT DISTINCT book_details.Book_id, book_details.Book_Title,  book_details.ISBN,  book_details.image, book_details.Publication_Year, author.Author_Name, edition.Edition_Name, publisher.Publisher_Name
			FROM book_details, author, book_author, edition, book_edition, publisher, book_publisher
			where book_details.Book_id = book_author.Book_id and author.Author_id = book_author.Author_id
			and book_edition.Edition_id = edition.Edition_id
			and book_publisher.Publisher_id = publisher.Publisher_id
			and (author.Author_Name LIKE '%".$query."%'  OR book_details.Book_Title LIKE '%".$query."%' OR book_details.Publication_Year LIKE '%".$query."%'
			OR edition.Edition_Name LIKE '%".$query."%' OR book_details.ISBN LIKE '%".$query."%' 
			OR publisher.Publisher_Name LIKE '%".$query."%') Group By book_details.Book_Title";

			$stmt = $mysqli->prepare($sql);
			if (!$stmt) {
				echo 'Error preparing query: ' . $mysqli->error;
				exit();
			}
			if (!$stmt->execute()) {
				echo 'Error executing query: ' . $stmt->error;
				exit();
			}
			$result = $stmt->get_result();
			
			// Check if any results were found
			if ($result->num_rows == 0) {
				echo '<div class="errordiv">No results found.</div>';
			} else {

				// Display the results
				while ($row = $result->fetch_assoc()) {

					$imagedisplay = base64_encode($row['image']);

					// echo '<section id="portfolio" class="portfolio sections-bg">';
					// 	echo ' <div class="container" data-aos="fade-up">';
					// 		echo '<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">';
					// 			echo '<div class="row gy-4 portfolio-container">';


					// 				echo '<div class="book">';
					// 				echo '<img src="' . $row['image'] . '">';
					// 				echo '<h2>' . $row['Book_Title'] . '</h2>';
					// 				echo '<p>By ' . $row['Author_Name'] . '</p>';
					// 				echo '<p>Edition: ' . $row['Edition_Name'] . '</p>';
					// 				echo '<p>Publisher: ' . $row['Publisher_Name'] . '</p>';
					// 				echo '</div>';

									echo'<div class="col-xl-4 col-md-6 portfolio-item filter-books">';
									echo'<div class="portfolio-wrap"style="object-fit:contain; width:100%; height:100%; text-align:center; ">';
									echo'<a href="data:image/jpg;base64, '.$imagedisplay.' " data-gallery="portfolio-gallery-app" class="glightbox" style="object-fit:contain;"><img src = "data:image/jpg;base64,' . $imagedisplay . '" class="img-fluid" style="height:350px;  align-item:center;"alt="image"></a>';
									echo'<div class="portfolio-info" style="text-align:left; height:250px;">';
									echo '<h4><a href="bookdetails3.php?bookid='.$row['Book_id'].'" title="More Details"> '.$row['Book_Title'].' </a></h4>';
									echo '<p><b>ISBN:</b>  ' . $row['ISBN'] . '</p>';
									echo '<p><b>Author:</b>  ' . $row['Author_Name'] . '</p>';
									echo '<p><b>Edition:</b> ' . $row['Edition_Name'] . '</p>';
									echo '<p><b>Publisher:</b> ' . $row['Publisher_Name'] . '</p>';
									echo '<p><b>Publication year:</b>  ' . $row['Publication_Year'] . '</p>';
									echo '<a href="bookdetails3.php?bookid='.$row['Book_id'].'"><button class="btn btn-primary btn-sm mt-2" type="button">Issue Book</button>';
									?>

									
									   <a href="wish.php?bookid=<?php echo $row['ISBN'] ?>&bookname=<?php echo $row['Book_Title']?>&auth=<?php echo $row['Author_Name']?>&year=<?php echo $row['Publication_Year']?>"><button class="btn btn-outline-primary bi-heart-fill btn-sm mt-2" type="button" style="margin-left:10px;"  ></button>
									<?php
									   echo'</div>';
									echo '</div>';
									echo '</div><!-- End Portfolio Item -->';

					// 			echo '</div>';
					// 		echo '</div>';
					// 	echo '</div>';
					// echo '</section>';









				}
			}
			
			// Clean up
			$stmt->close();
			$mysqli->close();
		}
	?>

</div>
		</div>
	  </div>
	</section>
</body>
</html>

<?php
include './footer.php';

?>
