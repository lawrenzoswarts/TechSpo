<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");

                // Ensure that the 'description' column is included in the retrieved data
                $itemArray = array($productByCode[0]["code"] => array(
                    'name' => $productByCode[0]["name"],
                    'code' => $productByCode[0]["code"],
                    'quantity' => $_POST["quantity"],
                    'price' => $productByCode[0]["price"],
                    'image' => $productByCode[0]["image"],
                    'description' => $productByCode[0]["description"] // Include description
                ));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css"></head>
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
      <li class="nav-item active">
      <a class="nav-link" href="store.php">Store<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<div id="shopping-cart" class="container-fluid">
    <h1 class="display-5 mb-3">Shopping Cart</h1>

    <a id="btnEmpty" href="store.php?action=empty" class="btn btn-danger mb-3">Empty Cart</a>

    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Code</th>
                        <th scope="col" class="text-right">Quantity</th>
                        <th scope="col" class="text-right">Price</th>
                        <th scope="col" class="text-right">Description</th>
                        <th scope="col" class="text-right">Total</th>
                        <th scope="col" class="text-center">Remove</th>
                        <th scope="col" class="text-center">Checkout</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["price"];
                ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $item["image"]; ?>" class="cart-item-image" style="max-width: 80px;" />
                                    <div>
                                        <strong><?php echo $item["name"]; ?></strong>
                                        <?php if (isset($item["description"])) { ?>
                                            <p class="small"><?php echo $item["description"]; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $item["code"]; ?></td>
                            <td class="text-right"><?php echo $item["quantity"]; ?></td>
                            <td class="text-right"><?php echo "R " . $item["price"]; ?></td>
                            <?php if (isset($item["description"])) { ?>
                <td class="text-right" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo $item["description"]; ?>
                </td>
            <?php } else { ?>
                <td class="text-right"></td>
            <?php } ?>
                            <td class="text-right"><?php echo "R " . number_format($item_price, 2); ?></td>
                            <td class="text-center">
                                <a href="store.php?action=remove&code=<?php echo $item["code"]; ?>"
                                   class="btn btn-danger btn-sm">
                                    Remove Item
                                </a>
                            </td>
                            <td class="text-center">
                            <a href="checkout.php?code=<?php echo $item["code"]; ?>" class="btn btn-primary btn-sm">
                                Checkout
                            </a>
                            </td>
                        </tr>
                        <?php
                        $total_quantity += $item["quantity"];
                        $total_price += $item_price;
                    }
                    ?>

                    <tr>
                    <td colspan="2" class="text-right">Total:</td>
                        <td class="text-right"><?php echo $total_quantity; ?></td>
                        <td class="text-right" colspan="2">
                            <strong><?php echo "R " . number_format($total_price, 2); ?></strong>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-info" role="alert">
            Your Cart is Empty
        </div>
        <?php
    }
    ?>
</div>


<div id="product-grid" class="container-fluid">
    <h2 class="display-5 mb-3">Products</h2>
    <div class="row">
        <?php
        $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="product-item card mb-3">
                        <form method="post"
                              action="store.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                            <img src="<?php echo $product_array[$key]["image"]; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $product_array[$key]["name"]; ?></h6>
                                <p class="card-text small"><?php echo $product_array[$key]["description"]; ?></p>
                                <p class="card-text"><strong>R <?php echo $product_array[$key]["price"]; ?></strong></p>
                                <div class="cart-action">
                                    <input type="text" class="product-quantity form-control" name="quantity" value="1" size="2" />
                                    <button type="submit" class="btn btn-primary btn-sm btnAddAction">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>



 <main>

    </main>
    
    
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
  <!-- Footer -->
</section>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>