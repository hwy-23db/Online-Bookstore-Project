<?php
            session_start();
            include 'userfunction.php';
            include 'admin/connect.php';

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>

<body>
    <?php include 'userheader.php' ?>
    <br>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h3>Welcome ,
                <span class="text-danger">
                    <?php
                        if (!empty($_SESSION['user'])) {
                                    echo $_SESSION['user'];
                        } else {
                                    $_SESSION['user'] = '';
                                     echo "";
                        }
                    ?>
                    
                    </span>
                </h3>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-12 mt-5">
        <div class="row">
          
            <?php 
            $sql = "SELECT * FROM products join author on products.authorid = author.authorid  WHERE description = 'Bestseller' ";
            $result = $connection->query($sql);

            $counter = 0;

            if ($result->num_rows > 0) {
                while ($out = mysqli_fetch_array($result)) {
                    $product_id = $out['productid'];
                    $product_name = $out['productname'];
                    $authorname= $out['authorname'];
                    $price = $out['price'];
                    $photo = $out['photo'];
                    $Qty = $out ['Qty'];
                    ?>
                    <div class="col-md-3 mb-3">
                      <div class="card" style="border:none;">
                        <a href="product_detail.php?id=<?php echo $product_id; ?>" class="ms-2 mt-3">
                          <img src="photos/<?php echo $photo; ?>" class="card-img-top img-fluid" alt="<?php echo $product_name; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product_name; ?></h5>
                            <p class="card-text" style="color:red;"><?php echo $authorname; ?></p>
                            <p class="card-text"><?php echo $price; ?></p>
                            <p class="card-text">Stocks <?php echo $Qty; ?></p>
                    <?php if($Qty==0){?>
                      <a href="index.php" class="btn btn-danger">Out of stock</a>
                    <?php } else { ?>
                      <a href="addtocart.php?id=<?php echo $product_id; ?>" class="btn btn-primary">Add to Cart</a>
                    <?php } ?>
                  </div>
                      </div>
                    </div> 
            <?php
                    $counter++;
                }
            } else {
                echo "<div class='col-12'><p>No Books are found.</p></div>";
            }

            $connection->close();
            ?>
        </div>
    </div>
 </div>
</div>
</div>
<?php include'userfooter.php' ?>
</body>

</html>