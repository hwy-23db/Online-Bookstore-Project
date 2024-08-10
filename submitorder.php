<?php 
session_start();
include 'admin/connect.php';
if (!empty($_SESSION['user'])) {

    $user_name = $_SESSION['user'];

    $query = "select * from user where username='$user_name'";

    $go_query = mysqli_query($connection, $query);

    while ($out = mysqli_fetch_array($go_query)) {

        $user_id = $out['userid'];

        $user_name = $out['username'];

        $email = $out['email'];

        $phone = $out['phone'];

        $address = $out['address'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>

<?php include 'userheader.php' ?>

<div class="container mt-5">
    <div class="row">
    <div class="col-sm-6">
      
        <h3>Welcome ,
         <span class="text-danger">
            <?php
            if (!empty($_SESSION['user'])) {
              echo $_SESSION['user'];
            } else {
              $_SESSION['user'] = '';
            }
            ?>
          </span>
        </h3>
     
    </div>
    </div>
     <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="submit.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" value="<?php if(isset($user_name)){echo $user_name;}?>" name="username" class="form-control" />
                </div>

                <div class="mb-3">

                    <label for="email" class="form-label">Email</label>

                    <input type="text" value="<?php if(isset($email)){echo $email;}?>" name="email" class="form-control" />

                </div>

                <div class="mb-3">

                    <label for="phone" class="form-label">Phone</label>

                    <input type="text" value="<?php if(isset($phone)){echo $phone;}?>" name="phone" class="form-control" />

                </div>

                <div class="mb-3">

                    <label for="address" class="form-label">Address</label>

                    <textarea name="address" class="form-control"><?php if(isset($address)){echo $address;}?></textarea>

                </div>

                <div class="mb-3">

                    <label for="payment_type" class="form-label">Payment Type</label>

                    <select name="payment_type" class="form-select">

                        <option value="Master Card">Master Card</option>

                        <option value="Visa Card">Visa Card</option>

                        <option value="Credit Card">KBZ Pay</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label for="cardno" class="form-label">CardNo:/Phone No:</label>

                    <input type="text" name="cardno" class="form-control" />

                </div>

                <input type="hidden" value="<?php echo $user_id ?>" name="userid" />

                <input type="submit" name="submit" value="Submit" class="btn btn-primary" />

            </form>

        </div>

    </div>

</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
