<?php
include '../connection.php';

// Retrieve records with null Issue Date and Date Expire
$sql = "SELECT * FROM issued_books WHERE issue_date IS NULL AND date_expire IS NULL";
$result = mysqli_query($conn, $sql);

// Check if any records are found
if (mysqli_num_rows($result) > 0) {
    echo "<form method='POST' action='submit.php'>";
    echo "<table class='issued-books-table'>";
    echo "<tr><th>ID</th><th>Book Title</th><th>User Email</th><th>Issue Date</th><th>Date Expire</th><th>Action</th></tr>";

    // Initialize row counter
    $rowNumber = 1;

    // Loop through each row of data and display it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><input type='text' name='id[]' value='" . $row['id'] . "'></td>";
        echo "<td><input type='text' name='book_title[]' value='" . $row['book_title'] . "'></td>";
        echo "<td><input type='text' name='userEmail[]' value='" . $row['userEmail'] . "'></td>";
        echo "<td><input type='date' name='issue_date[]' value='" . date('Y-m-d') . "' readonly></td>";
        echo "<td><input type='date' name='date_expire[]' min='" . date('Y-m-d') . "'></td>";
        echo "<td><button type='submit' name='submit_row[" . $rowNumber . "]'>Submit</button></td>";
        echo "</tr>";

        // Increment row counter
        $rowNumber++;
    }

    echo "</table>";
    echo "</form>";
} else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($conn);
?>

<style>
.issued-books-table {
    width: 100%;
    border-collapse: collapse;
}

.issued-books-table th, .issued-books-table td {
    padding: 8px;
    border: 1px solid #ccc;
}

.issued-books-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.issued-books-table td input[type='text'], .issued-books-table td input[type='date'] {
    width: 100%;
    padding: 4px;
    box-sizing: border-box;
}

.issued-books-table td button {
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

.issued-books-table td button:hover {
    background-color: #45a049;
}
</style>
