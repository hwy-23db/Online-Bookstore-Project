<?php
session_start();
include 'userheader.php';
include 'admin/connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE userid='$user_id'";
$go_query = mysqli_query($connection, $query);
$out = mysqli_fetch_array($go_query);

$default_profile_picture = "default.jpg"; // Path to your default profile image
$username = $out['username'];
$email = $out['email'];
$phone = $out['phone'];
$address = $out['address'];
$photo = $out['photo'];

$profile_picture = $photo ? "profileImage/$photo" : "profileImage/$default_profile_picture";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>User Profile</title>    
</head>
<body>  
    <div class="container">
        <div class="ms-2">
            <img src="<?php echo $profile_picture; ?>" class="img-thumbnail mt-2" style="width: 200px; height: 200px;" alt="User Profile Picture">
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-2">
            <div class="input-group">
                <input type="file" name="photo" id="photo" class="form-control">
                <input type="submit" value="Upload Image" name="submit" class="btn btn-primary">
            </div>
        </form> 
        <form action="edit.php" method="post" class="mt-2"> 
            <div class="input-group mt-2">
                <label for="username" class="w-100">Name</label>
                <input type="text" name="username" value="<?php echo $username ?>" id="username" class="form-control">
            </div>
            <div class="input-group mt-2">
                <label for="email" class="w-100">Email</label>
                <input type="text" name="email" value="<?php echo $email ?>" id="email" class="form-control">
            </div>
            <div class="input-group mt-2">
                <label for="address" class="w-100">Address</label>
                <input type="text" name="address" value="<?php echo $address ?>" id="address" class="form-control">
            </div>
            <div class="input-group mt-2">
                <label for="phone" class="w-100">Phone</label>
                <input type="text" name="phone" value="<?php echo $phone ?>" id="phone" class="form-control">
            </div>
            <div class="mt-3 text-center">
                <input type="submit" value="Update" name="submit" class="btn btn-primary">
            </div>
        </form>      
    </div>
</body>
</html>
