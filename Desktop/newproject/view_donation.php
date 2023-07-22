<?php
include './header.php';
include './connection.php';

$conn = mysqli_connect("localhost", "root", "", "apnabook");

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];
    $publication_year = $_POST['publication_year'];
    $no_of_pages = $_POST['no_of_pages'];
    $language = $_POST['language'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $image = $_POST['image'];
    $donated_by = $_POST['donated_by'];

    // Prepare the SQL statement to insert data into the books table
    $sql = "INSERT INTO books (isbn, title, author, edition, publisher, publication_year, no_of_pages, language, quantity, category, subcategory, image, donated_by) 
            VALUES ('$isbn', '$title', '$author', '$edition', '$publisher', '$publication_year', '$no_of_pages', '$language', '$quantity', '$category', '$subcategory', '$image', '$donated_by')";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        $bookId = mysqli_insert_id($conn);
        echo "Book donated successfully!<br>";
        echo "Book ID: " . $bookId . "<br>";

        // Fetch the status of the book
        $statusSql = "SELECT status FROM books WHERE id = '$bookId'";
        $result = mysqli_query($conn, $statusSql);
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        echo "Status: " . $status;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <style>
        table {
            overflow: hidden;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<main id="main">
<body>
    <h1>Books Donation Request</h1>
    <table>
        <thead>
            <tr>
                <th>ISBN Number*</th>
                <th>Title</th>
                <th>Author Name*</th>
                <th>Edition Name</th>
                <th>Publisher Name</th>
                <th>Publication Year</th>
                <th>No. of Pages</th>
                <th>Language</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Image URL</th>
                <!-- <th>Donated By</th> -->
                <!-- <th>Donation Date</th> -->
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database credentials
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'apnabook';

            // Create connection
            $conn = new mysqli($host, $user, $pass, $db);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if session is not already active
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Retrieve the user's email from the session
            $email = $_SESSION['email'];

            // SQL query
            $sql = "SELECT * FROM books WHERE donated_by = '$email'";

            // Execute query
            $result = $conn->query($sql);

            // Loop through the data and display it in table rows
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['isbn']."</td>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['author']."</td>";
                    echo "<td>".$row['edition']."</td>";
                    echo "<td>".$row['publisher']."</td>";
                    echo "<td>".$row['publication_year']."</td>";
                    echo "<td>".$row['no_of_pages']."</td>";
                    echo "<td>".$row['language']."</td>";
                    echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['subcategory']."</td>";
                    echo "<td><img src='".$row['image']."' alt='Book Image' style='max-width: 100px;'></td>";
                    // echo "<td>".$row['donated_by']."</td>";
                    // echo "<td>".$row['donation_date']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='15'>No results</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</main>
</html>

<?php
include './footer.php';
?>
