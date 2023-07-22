<?php
// Database connection
include '../connection.php'; // Include your database connection file

if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];
  
  // Query to fetch book titles from the book_details table
  $query = "SELECT Book_Title FROM book_details WHERE Book_Title LIKE '%".$searchTerm."%'";
  $result = mysqli_query($conn, $query);

  $bookTitles = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $bookTitles[] = $row['Book_Title'];
  }

  echo json_encode($bookTitles); // Return the book titles as JSON
}
?>
