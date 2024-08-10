<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit();
}

$user = $_SESSION['user'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user); ?></h1>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
    <p>Address: <?php echo htmlspecialchars($address); ?></p>
    
    <!-- Your other HTML and PHP code -->
</body>
</html>
