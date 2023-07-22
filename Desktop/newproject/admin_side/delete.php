


<?php 
include '../connection.php';

$bookid=$_GET['bookid'];

// $sql = "DELETE FROM `book_details` WHERE Book_id = $bookid";
$sql ="DELETE book_details, book_author, book_publisher, book_edition
FROM book_details
JOIN book_author ON book_details.Book_id = book_author.Book_id
JOIN book_publisher ON book_details.Book_id = book_publisher.Book_id
JOIN book_edition ON book_details.Book_id = book_edition.Book_id
WHERE book_details.Book_id = $bookid";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// header('location:Book_Details_Table.php');

print_r($bookid);
?>






