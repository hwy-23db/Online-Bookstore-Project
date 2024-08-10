<?php
session_start();
include 'admin/connect.php';
include 'userfunction.php';

if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $query =  "SELECT products.*,author.*, product_details.description, product_details.slug,product_details.authorid, product_details.pages 
              FROM products 
              LEFT JOIN product_details product_details ON products.productid = product_details.product_id 
              LEFT JOIN author ON author.authorid = product_details.authorid 
              WHERE products.productid = ?";
  $stmt = $connection->prepare($query);
  $stmt->bind_param('i', $product_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();
} else {
  // Redirect to the homepage or show an error if no product ID is provided
  header("Location: userindex.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $product['slug']; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/style.css"/>
</head>
<body>
  <?php include 'userheader.php'; ?>
  <div class="container mt-5">
    <div class="d-flex flex-row bd-highlight mb-3">
      <div class="p-3 w-50 bd-highlight">
        <div class="row">
          <div class="col-sm-12">
            <div class="card mb-3">
              <img src="photos/<?php echo $product['photo']; ?>" class="card-img-top mt-3" alt="<?php echo $product['productname']; ?>" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
          </div>
          <form action="comment.php" method="post">
              <input type="hidden" name="productid" value="<?php echo isset($product_id) ? $product_id : ''; ?>">
              <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
              <input type="submit" class="btn btn-primary" value="Add New Comment">
              <a href="product_deatil.php" class="btn btn-warning ms-3">View comment</a>
          </form>
          

        </div>
      </div>
      <div class="w-50 p-4 bd-highlight">
        <div class="card-body btn-light">
          <h5 class="card-title">Book's name - <?php echo $product['productname']; ?></h5>
          <p class="card-text"> Price - <?php echo $product['price']."Ks"; ?></p>
          <p class="card-text">Author - <?php echo $product['authorname']; ?></p>
          <p class="card-text">Description - <?php echo $product['description']; ?></p>
          <table class="table table-bordered">
            <tr>
              <td><i>Pages</i></td>
              <td><i><?php echo $product['pages']; ?></i></td>
            </tr>
            
          </table>
          <a href="addtocart.php?id=<?php echo $product['productid']; ?>" class="btn btn-primary w-100">Add to Cart</a>
        </div>  
      </div>
    </div>
  </div>
</body>
</html>
