<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

// Check if the cart is not empty
if (!empty($_SESSION["cart_item"])) {
    // Fetch products based on the codes in the cart
    $product_codes = array_keys($_SESSION["cart_item"]);
    $product_query = "SELECT * FROM tblproduct WHERE code IN ('" . implode("','", $product_codes) . "')";
    $products = $db_handle->runQuery($product_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png" alt="Logo Image"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="members.php">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="store.php">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mt-5">
        <h1 class="display-4 mb-4">Verify Your Order</h1>

<!-- Display Order Summary -->

<?php foreach ($products as $product): ?>
    <div>
        <!-- Display product details (you can customize this section) -->
        <img src="<?php echo $product["image"]; ?>" alt="Product Image" style="max-width: 100px;">
        <h2><?php echo $product["name"]; ?></h2>
        <p><?php echo $product["description"]; ?></p>
        <p>Price: R <?php echo $product["price"]; ?></p>
        <p>Quantity: <?php echo $_SESSION["cart_item"][$product["code"]]["quantity"]; ?></p>
    <br>
    <br>
    </div>
<?php endforeach; ?>
<br>
<hr>
<br>
<!-- Add a form for user details and order confirmation -->
<form action="process_order.php" method="post">
    <!-- Billing Information -->
    <h1 class="mb-3">Billing Information</h1>
    <div class="mb-3">
        <label for="billingName">Full Name</label>
        <input type="text" class="form-control" id="billingName" name="billingName" required>
    </div>
    <div class="mb-3">
        <label for="billingAddress">Address</label>
        <input type="text" class="form-control" id="billingAddress" name="billingAddress" required>
    </div>
    <div class="mb-3">
        <label for="billingCity">City</label>
        <input type="text" class="form-control" id="billingCity" name="billingCity" required>
    </div>
    <!-- Add other billing information fields as needed -->

    <!-- Shipping Information -->
    <h1 class="mb-3">Shipping Information</h1>
    <div class="mb-3">
        <label for="shippingName">Full Name</label>
        <input type="text" class="form-control" id="shippingName" name="shippingName" required>
    </div>
    <div class="mb-3">
        <label for="shippingAddress">Address</label>
        <input type="text" class="form-control" id="shippingAddress" name="shippingAddress" required>
    </div>
    <div class="mb-3">
        <label for="shippingCity">City</label>
        <input type="text" class="form-control" id="shippingCity" name="shippingCity" required>
    </div>
    <!-- Add other shipping information fields as needed -->

    <button type="submit" class="btn btn-primary">Confirm Order</button>
</form>
</main>
<br>
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: CTA -->
            <section class="footer-link">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Register for free</span>
                    <button type="button" class="btn btn-outline-light btn-rounded" style="margin-left: 10px; background-color:rgba(0, 0, 0, 0.2); border: none;">
                        <a href="members.php" style="color: white">Sign up!</a>
                    </button>
                </p>
            </section>
            <!-- Section: CTA -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://techspocapetown.co.za/">TechspoCapeTown.co.za</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
} else {
    // Redirect to the store if the cart is empty
    header("Location: store.php");
    exit();
}
?>