<?php
// delete.php

// Include the necessary configuration and database connection files
include 'includes/config.php';
include 'includes/session.php';

// Check if the task_id parameter is set
if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    
    // Perform the deletion operation
    $sql = "DELETE FROM sales WHERE SalesID = $task_id";
    $result = mysqli_query($conn, $sql);
}

// Redirect back to the page where the delete link was clicked
if($_SESSION['role'] = 'Admin'){
    header('Location: task-info.php');
}
exit;
?>
