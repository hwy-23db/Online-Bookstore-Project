<?php
session_start();
include 'admin/connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['content'], $_POST['productid'])) {
    // Retrieve form data
    $product_id = $_POST['productid'];
    $content = $_POST['content'];

    // Validate form data
    if (!empty($content) && !empty($product_id)) {
        // Sanitize form data
        $product_id = intval($product_id);
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

        // Insert comment into the database
        $query = "INSERT INTO comments (productid, content) VALUES (?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('is', $product_id, $content);

        if ($stmt->execute()) {
            // Redirect to product detail page
            header("Location: product_detail.php?id=$product_id");
            exit();
        } else {
            // Check for errors
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Check for missing form data
        echo "Please fill in all fields.";
    }
} else {
    // Redirect to homepage if not a POST request
    header("Location: userindex.php");
    exit();
}

$connection->close();
?>