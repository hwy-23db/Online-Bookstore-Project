<?php
session_start();
include 'admin/connect.php';
include 'userfunction.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header-custom {
        background-color: #fff;
        border-bottom: 1px solid #dee2e6;
        padding: 1.5rem;
    }
    .card-body-custom {
        background-color: #fff;
        padding: 2rem;
    }
    .card-footer-custom {
        background-color: #fff;
        border-top: 1px solid #dee2e6;
        padding: 1.5rem;
    }
    .btn-custom {
        margin: 0.5rem;
        border-radius: 8px;
    }
    .product-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table thead th {
        border-bottom: 2px solid #dee2e6;
    }
    .table tfoot td {
        border-top: 2px solid #dee2e6;
    }
    .showname {
        font-size: 1.25rem;
        font-weight: bold;
    }
</style>
</head>
<body>
<?php include 'userheader.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
           
              
                <div class="card-body card-body-custom">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header text-center bg-info text-white">
                                    <h2>Shopping Cart</h2>
                                </div>
                                <?php if (!empty($_SESSION['cart'])) : ?>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($_SESSION['cart'] as $id => $qty) {
                                                    $id = mysqli_real_escape_string($connection, $id);
                                                    $result = mysqli_query($connection, "SELECT * FROM products WHERE productid='$id'");

                                                    if ($result) {
                                                        $row = mysqli_fetch_assoc($result);
                                                ?>
                                                        <tr>
                                                            <td><img src="photos/<?php echo $row['photo'] ?>" class="img-thumbnail product-img" /></td>
                                                            <td><?php echo $row['productname'] ?></td>
                                                            <td>
                                                                <span>
                                                                    <a href="change-qty.php?id=<?php echo $id; ?>&action=increase" class="btn btn-outline-success btn-sm"><i class="fas fa-plus"></i></a>
                                                                    <?php echo $qty ?>
                                                                    <a href="change-qty.php?id=<?php echo $id; ?>&action=decrease" class="btn btn-outline-danger btn-sm"><i class="fas fa-minus"></i></a>
                                                                </span>
                                                            </td>
                                                            <td>MMK-<?php echo number_format($row['price'], 2) ?></td>
                                                            <td>MMK-<?php echo number_format($row['price'] * $qty, 2) ?></td>
                                                            <td>
                                                                <a href="remove.php?id=<?php echo $id ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $total += $row['price'] * $qty;
                                                    } else {
                                                        echo "Error in query: " . mysqli_error($connection);
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-end"><b>Total:</b></td>
                                                    <td>MMK-<?php echo number_format($total, 2); ?></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="card-footer card-footer-custom text-center">
                                        <a href="clear.php" class="btn btn-danger btn-custom">Clear Cart</a>
                                        <a href="userindex.php" class="btn btn-secondary btn-custom">Back</a>
                                        <a href="submitorder.php" class="btn btn-primary btn-custom">Submit Order</a>
                                    </div>
                                <?php else : ?>
                                    <div class="card-body text-center">
                                        <h3 class="text-danger lead">You have not selected any products yet!</h3>
                                        <p><a href="userindex.php" class="btn btn-info btn-custom">Shop Now</a></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
