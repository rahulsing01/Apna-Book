    <?php
    include './admin-header.php';
    include '../connection.php';

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "apnabook");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process form submission
    if (isset($_POST['submit'])) {
        $book_id = $_POST['book_id'];
        $status = $_POST['status'];

        // Update book status in the database
        $update_query = "UPDATE books SET status = '$status' WHERE id = $book_id";
        if (mysqli_query($conn, $update_query)) {
            echo "Book status updated successfully!";
        } else {
            echo "Error updating book status: " . mysqli_error($conn);
        }
    }

    // Retrieve all pending book donations from the database
    $query = "SELECT * FROM books WHERE status = 'pending'";
    $result = mysqli_query($conn, $query);
    ?><main id="main" class="main">
    <h1>Accept/Reject Book Donations</h1>

    <div class="table-container">
        <table class="excel-table">
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Publisher</th>
                <th>Publication Year</th>
                <th>No. of Pages</th>
                <th>Language</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['isbn']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['edition']; ?></td>
                    <td><?php echo $row['publisher']; ?></td>
                    <td><?php echo $row['publication_year']; ?></td>
                    <td><?php echo $row['no_of_pages']; ?></td>
                    <td><?php echo $row['language']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['subcategory']; ?></td>
                    <td>
                        <img src="<?php echo $row['image']; ?>" alt="Book Image" style="max-width: 100px;">
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="book_id" value="<?php echo $row['id']; ?>">
                            <select name="status">
                                <option value="accepted">Accept</option>
                                <option value="rejected">Reject</option>
                            </select>
                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    </main>

    <style>
    .table-container {
        overflow-x: auto;
    }

    .excel-table {
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;
    }

    .excel-table th,
    .excel-table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .excel-table th {
        background-color: #f2f2f2;
        text-align: left;
    }

    .excel-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .excel-table tr:hover {
        background-color: #f2f2f2;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .table-container {
            overflow-x: scroll;
        }

        .excel-table {
            table-layout: fixed;
        }
    }
    </style>
        
    <?php
    // Close database connection
    mysqli_close($conn);
    include './admin-footer.php';
    ?>
