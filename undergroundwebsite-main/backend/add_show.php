<?php
// Include the database connection file
include('../connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $showName = $_POST['show_name'];
    $producer1 = $_POST['producer_1'];
    $producer2 = $_POST['producer_2'];
    $producer3 = $_POST['producer_3'];
    $producer4 = $_POST['producer_4'];
    $description = $_POST['description'];

    // Prepare the SQL statement to insert the data
    $query = "INSERT INTO SHOW_TABLE (SHOW_NAME, PRODUCER_1, PRODUCER_2, PRODUCER_3, PRODUCER_4, DESCRIPTION) 
              VALUES ('$showName', '$producer1', '$producer2', '$producer3', '$producer4', '$description')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Insertion successful
        echo "Show added successfully.";
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
