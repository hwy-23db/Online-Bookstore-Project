<?php
session_start();
include 'admin/connect.php';
include 'userfunction.php'; 

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
$search = isset($_GET['search_query']) ? $_GET['search_query'] : null;

$perpage = 32; // Change this to 32 for four cards per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $perpage;

$query = "SELECT * FROM products join author on products.authorid = author.authorid WHERE 1=1";

if ($search) {
    $query .= " AND (productname LIKE '%" . $search . "%' OR authorname LIKE '%" . $search . "%')";
}

if ($category_id) {
    $query .= " AND categoryid = '$category_id'";
}

$query .= " LIMIT $start, $perpage";

// Debugging: Log the query
error_log("Product Query: " . $query);

$go_query = mysqli_query($connection, $query);

$total_query = "SELECT COUNT(*) as total FROM products join author on products.authorid = author.authorid WHERE 1=1";

if ($search) {
    $total_query .= " AND (productname LIKE '%" . $search . "%' OR authorname LIKE '%" . $search . "%')";
}

if ($category_id) {
    $total_query .= " AND categoryid = '$category_id'";
}

// Debugging: Log the total query
error_log("Total Product Query: " . $total_query);

$total_result = mysqli_query($connection, $total_query);
$total_row = mysqli_fetch_assoc($total_result);   
$total_products = $total_row['total'];
$num = ceil($total_products / $perpage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books list</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php include 'userheader.php'; ?>
   
  <div class="container ">
  <div class="row">
<div class="col-md-12"><br>
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
          if (mysqli_num_rows($go_query) > 0) {
          $query = "SELECT * FROM products join author on products.authorid = author.authorid LIMIT $start, $perpage";
          while ($out = mysqli_fetch_array($go_query)) {
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
            }
          } else {
              echo "<div class='col-12'><p class='text-center'>No products found.</p></div>";
          }
          ?>

        </div>
      </div>
    </div>
    <ul class="pagination justify-content-center mt-3">
      <?php
     
      for ($i = 1; $i <= $num; $i++) {
        if ($i == $page) 
        {
          echo "<li class='page-item active'><a class='page-link' href='userindex.php?page={$i}'>{$i}</a></li>";
        } 
        else 
        {
          echo "<li class='page-item'><a class='page-link' href='userindex.php?page={$i}'>{$i}</a></li>";
        }
      }
      ?>
    </ul>
    </div>
    <?php include 'userfooter.php' ?>

</body>
</html>
