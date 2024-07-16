<?php
include 'includes/config.php';
include 'includes/session.php';
$dealerId = $_GET['dealer_id'];

// Update the remaining amount for the specified dealer
$sql = "UPDATE purchase SET Remaining_amount = 0 WHERE DealerID = $dealerId";

if ($conn->query($sql) === TRUE) {
    // Successfully updated the remaining amount
    echo "Amount updated successfully";
} else {
    // Error occurred while updating the remaining amount
    echo "Error updating amount: " . $conn->error;
}

?>