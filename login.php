<?php
session_start();
include 'userfunction.php';
include 'admin/connect.php';
if(isset($_POST['btnuserlogin']))
  {
    user_login();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        hr 	{ border: 1px solid #ccc;
	  width: 200px;
	  margin:20px 100px;}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="login.css">
</head>
<body>


<div class="box login_box">
    <span class="borderline"></span>
    <form action="" method="post">
    <h2 style="color:aqua">Login <br>BOOK PALACE</h2>

        <div class="inputbox">
              <input type="text" name="username" id=""  required>
            <span>Username</span>
            <i></i>
        </div>

        <div class="inputbox">
            <input type="password" name="password" required="required">
            <span>Password</span>
            <i></i>
        </div>

        <input type="submit" class="btn btn-info w-100" value="Login" name="btnuserlogin"><br>
        <div>
        <p style="font-size:16px;">Don't have an account? &nbsp;
            <button type="" style="border:none; font-size:18px; background:none;" ><a href="register.php">Register</a></button></p></div>
    </form>
</div>
<script src="https://kit.fontawesome.com/eedbcd0c96.js" crossorigin="anonymous"></script>
</body>
</html>