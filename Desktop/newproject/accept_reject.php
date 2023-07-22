<!DOCTYPE html>
    <html>
    <head>
        <title>Accept/Reject Book Donations</title>
    </head>
    <body>
        <?php
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
            $update_query = "UPDATE book SET status = '$status' WHERE id = $book_id";
            if (mysqli_query($conn, $update_query)) {
                echo "Book status updated successfully!";
            } else {
                echo "Error updating book status: " . mysqli_error($conn);
            }
        }

        // Retrieve all pending book donations from the database
        $query = "SELECT * FROM book WHERE status = 'pending'";
        $result = mysqli_query($conn, $query);
        ?>

        <h1>Accept/Reject Book Donations</h1>

        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Publisher</th>
                <th>Description</th>
                <th>Image URL</th>
                <th>Donated By</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['edition']; ?></td>
                    <td><?php echo $row['publisher']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['image_url']; ?></td>
                    <td><?php echo $row['donated_by']; ?></td>
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

        <?php
        // Close database connection
        mysqli_close($conn);
        ?>
    </body>
    </html>
