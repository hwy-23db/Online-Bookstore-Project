<?php

session_start();
include 'admin/connect.php';
include 'userfunction.php';
if (isset($_POST['register'])) //register button name
{
    $user_name = $_POST['username'];//textbox name
    $password = $_POST['password'];//textbox name
    $confirm_password = $_POST['confirmpassword'];//textbox name
    $email = $_POST['email'];//textbox name
    $phone = $_POST['phone'];//textbox name
    $address = $_POST['address'];//textbox name
 
    $errors = array(
        'username' => '',
        'password' => '',
        'confirm_password' => '',
        'match_password' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
    );
 
    if (empty($user_name)) {
        $errors['username'] = 'User Name must be entered';
    } else {
        if (strlen($user_name) < 3) {
            $errors['username'] = 'User Name needs to be longer';
        }
    }
 
    if (empty($password)) {
        $errors['password'] = 'This field could not be empty';
    } else {
        if (strlen($password) < 3) {
            $errors['password'] = 'Password needs to be longer';
        }
    }
 
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'This Field could not be empty';
    } else {
        if ($password != $confirm_password) {
            $errors['match_password'] = 'Password Do not match';
        }
    }
 
    if (empty($email)) {
        $errors['email'] = 'This field could not be empty';
    }
 
    if (empty($phone)) {
        $errors['phone'] = 'This field could not be empty';
    }
 
    if (empty($address)) {
        $errors['address'] = 'This field could not be empty';
    }
 
    foreach ($errors as $key => $value) {
        if (empty($value)) {
            unset($errors[$key]);
        }
    }
 
    if (empty($errors)) {
        create_accu();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <!-- Font awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Css File Link -->
    <link rel="stylesheet" href="login.css">
</head>

<body>
<div class="box">
    <span class="borderline"></span>
    <form action="" method="post">
    <h2 style="color:aqua">Registeration </h2>
    
        <div class="inputbox">
            <span><label for="username" class="form-label" >User Name</label></span>
            <input type="text" name="username" value="<?php echo isset($user_name) ? $user_name : ''; ?>" placeholder="Enter user name" required>
            <label><?php echo isset($errors['user_name']) ? $errors['user_name'] : ''; ?> </label>
            <i></i>
        </div>

        <div class="inputbox">
        <span><label for="password" class="form-label">Password</label></span>
            <input type="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>" placeholder="Enter password" required="required">
            <label><?php echo isset($errors['password']) ? $errors['password'] : ''; ?> </label>
            <i></i>
        </div>

        <div class="inputbox">
            <span><label for="confirmpassword" class="form-label">Confirm Password</label></span>
            <input type="password" name="confirmpassword" value="<?php echo isset($confirm_password) ? $confirm_password : ''; ?>" placeholder="Enter password" required="required">
            <label><?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : ''; ?> </label>
            <label ><?php echo isset($errors['match_password']) ? $errors['match_password'] : ''; ?></label>
            <i></i>
        </div>
        
        
        <div class="inputbox">
            <span><label for="email" class="form-label">Email</label></span>
            <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"  placeholder="Enter your email" required="required">
            <label><?php echo isset($errors['email']) ? $errors['email'] : ''; ?> </label>
            <i></i>
        </div>

        <div class="inputbox">
            <span><label for="phone" class="form-label">Phone</label></span>
            <input type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Enter your phone" required="required">
            <label><?php echo isset($errors['phone']) ? $errors['phone'] : ''; ?>  </label>
            <i></i>
        </div>
        
        <div class="inputbox">
        <span><label for="address" class="form-label">Address</label></span>
            <input type="textbox" name="address" required="required" placeholder="Your Current Address"<?php echo isset($address) ? $address : ''; ?>
            <lable><?php echo isset($errors['address']) ? $errors['address'] : ''; ?>  </label>
            <i></i>
        </div>
        <Br><br>
        <div class="links">
            <br>
        <input type="submit"  name="register" value="Register"><br> </div>
        <p style="font-size:16px;">Already have an account?&nbsp;
            <button style="font-size:18px; background:none; border:none;"><a href="login.php">Login</a></button></p>
        
       
    
    </form>
    
</div>

<script src="https://kit.fontawesome.com/eedbcd0c96.js" crossorigin="anonymous"></script>
</body>
</html>