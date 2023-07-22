<?php
include '../connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted data
    $ids = $_POST['id'];
    $issueDates = $_POST['issue_date'];
    $dateExpires = $_POST['date_expire'];

    $updatedRecords = []; // Array to store successfully updated records

    // Loop through each submitted record and update the database
    for ($i = 0; $i < count($ids); $i++) {
        $id = mysqli_real_escape_string($conn, $ids[$i]);
        $issueDate = mysqli_real_escape_string($conn, $issueDates[$i]);
        $dateExpire = mysqli_real_escape_string($conn, $dateExpires[$i]);

        // Validate the date input
        $isValidDate = validateDate($dateExpire);

        // Define $updateResult variable
        $updateResult = false;

        // Update the record in the database if the date is valid
        if ($isValidDate) {
            // Update the record in the database
            $updateSql = "UPDATE issued_books SET issue_date = '$issueDate', date_expire = '$dateExpire' WHERE id = '$id'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($updateResult) {
                $updatedRecords[] = $id; // Store the ID of the successfully updated record
            } else {
                echo "Error updating record with ID $id: " . mysqli_error($conn) . "<br>";
            }
        }

        // Show error message only if update was attempted and the date is invalid
        if (!$isValidDate && $updateResult) {
            echo "Invalid date format: $dateExpire. Record with ID $id not updated.<br>";
        }
    }

    // Display the successfully updated records
    if (!empty($updatedRecords)) {
        echo "Submitted records updated successfully:<br>";
        foreach ($updatedRecords as $recordId) {
            echo "Record with ID $recordId updated successfully.<br>";
        }
    }
}

// Function to validate the date format
function validateDate($date)
{
    $dateFormat = 'Y-m-d';
    $dateObj = DateTime::createFromFormat($dateFormat, $date);
    return $dateObj && $dateObj->format($dateFormat) === $date;
}

// Close the database connection
mysqli_close($conn);
?>
