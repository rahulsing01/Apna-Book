<?php


include './donationheader.php';
// include './connection.php';

session_start();
   if( $_SESSION['email']==true)
   {
    $usermail= $_SESSION['email'];
}else{
    header('location:login.php');
}
?>

<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "apnabook");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];
$year = $_POST['publication_year'];
$no_of_pages = $_POST['no_of_pages'];
$language = $_POST['language'];
$quantity = $_POST['quantity'];

$image_url = $_POST['image'];
$donated_by = $_SESSION['email'];
$sql ="INSERT INTO `books`(`isbn`, `title`, `author`, `edition`, `publisher`, `publication_year`, `no_of_pages`, `language`, `quantity`,`image`, `donated_by`) VALUES 
('$isbn','$title','$author','$edition', '$publisher','$year','$no_of_pages','$language','$quantity','$image_url','$donated_by')";

// Insert data into database
// $sql = "INSERT INTO books (title, author, edition, publisher,  image_url, donated_by) VALUES ('$title', '$author', '$edition', '$publisher', '$image_url', '$donated_by')";
if (mysqli_query($conn, $sql)) {
    // Retrieve book status from the database
    $book_id = mysqli_insert_id($conn);
    $status_query = "SELECT status FROM book WHERE id = $book_id";
    $status_result = mysqli_query($conn, $status_query);
    $status_row = mysqli_fetch_assoc($status_result);
    $status = $status_row['status'];
    
    // Display book status
    if ($status == 'accepted') {
        echo "Book donated successfully and accepted!";
    } elseif ($status == 'rejected') {
        echo "Book donation rejected.";
    } else {
        echo "Book donated successfully but pending review.";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
