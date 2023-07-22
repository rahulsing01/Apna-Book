<?php
include './connection.php';

session_start();

// Check if the 'email' session variable is set
if (isset($_SESSION['email'])) {
    // Retrieve the user's email from the session
    $userEmail = $_SESSION['email'];

    // Set the 'userEmail' key in the session
    $_SESSION['userEmail'] = $userEmail;

    // Check if the 'bookTitle' query parameter is set
    if (isset($_GET['bookTitle'])) {
        // Retrieve the book title from the URL query parameter
        $bookTitle = $_GET['bookTitle'];

        // Ensure the book title and user's email are safe to use in a SQL query
        $safeBookTitle = mysqli_real_escape_string($conn, $bookTitle);
        $safeUserEmail = mysqli_real_escape_string($conn, $userEmail);

        // Insert the book title and user's email into the table
        $sql = "INSERT INTO issued_books (book_title, userEmail) 
                VALUES ('$safeBookTitle', '$safeUserEmail')";

        if (mysqli_query($conn, $sql)) {
            echo "<div id='wrapper' class='animated zoomIn'>
                    <h1>
                      <underline>Thank you!</underline>
                    </h1>
                    <h3>
                      For issuing the book request. Enjoy your reading!
                    </h3>
                  </div>";
        } else {
            echo "Error updating book information: " . mysqli_error($conn);
        }
    } else {
        echo "Book title not provided.";
    }
} else {
    echo "User email not found in session.";
}

// Close the database connection
mysqli_close($conn);
?>

<style>
@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

body, html {
  background: #16A085;
}

#wrapper {
  width: 600px;
  margin: 0 auto;
  margin-top: 15%;
}

h1 {
  color: #EEE;
  text-shadow: -1px -2px 3px rgba(17, 17, 17, 0.3);
  text-align: center;
  font-family: "Monsterrat", sans-serif;
  font-weight: 900;
  text-transform: uppercase;
  font-size: 80px;
  margin-bottom: -5px;
}

h1 underline {
  border-top: 5px solid rgba(26, 188, 156, 0.3);
  border-bottom: 5px solid rgba(26, 188, 156, 0.3);
}

h3 {
  width: 570px;
  margin-left: 16px;
  font-family: "Lato", sans-serif;
  font-weight: 600;
  color: #EEE;
}

#wrapper.animated {
  animation: zoomIn 0.5s;
}

@keyframes zoomIn {
  0% {
    transform: scale(0.5);
  }
  100% {
    transform: scale(1);
  }
}

h1:hover {
  animation: pulse 1s infinite;
}
</style>
