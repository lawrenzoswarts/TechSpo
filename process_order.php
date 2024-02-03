<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user and order details from the form
    $billingName = $_POST['billingName'];
    $billingAddress = $_POST['billingAddress'];
    $billingCity = $_POST['billingCity'];

    $shippingName = $_POST['shippingName'];
    $shippingAddress = $_POST['shippingAddress'];
    $shippingCity = $_POST['shippingCity'];

    // Fetch products based on the codes in the cart
    $product_codes = array_keys($_SESSION["cart_item"]);
    $product_query = "SELECT * FROM tblproduct WHERE code IN ('" . implode("','", $product_codes) . "')";
    $products = $db_handle->runQuery($product_query);

    // Insert order details into the database (customize this based on your database structure)
    // For example, you might have an 'orders' table and an 'order_items' table

    // Get the database connection
    $database_connection = $db_handle->getConn();

    // Insert into the 'orders' table using prepared statement
    $insert_order_query = "INSERT INTO orders (billing_name, billing_address, billing_city, shipping_name, shipping_address, shipping_city) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_order = $database_connection->prepare($insert_order_query);

    if ($stmt_order === false) {
        die('Error in preparing order statement: ' . $database_connection->error);
    }

    $stmt_order->bind_param("ssssss", $billingName, $billingAddress, $billingCity, $shippingName, $shippingAddress, $shippingCity);

    if (!$stmt_order->execute()) {
        die('Error in executing order statement: ' . $stmt_order->error);
    }

    // Get the order ID
    $order_id = mysqli_insert_id($database_connection);

    // Insert into the 'order_items' table using prepared statement
    $insert_order_item_query = "INSERT INTO order_items (order_id, product_code, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt_order_item = $database_connection->prepare($insert_order_item_query);

    if ($stmt_order_item === false) {
        die('Error in preparing order item statement: ' . $database_connection->error);
    }

    foreach ($products as $product) {
        $product_code = $product['code'];
        $quantity = $_SESSION["cart_item"][$product_code]["quantity"];
        $price = $product['price'];

        $stmt_order_item->bind_param("isid", $order_id, $product_code, $quantity, $price);

        if (!$stmt_order_item->execute()) {
            die('Error in executing order item statement: ' . $stmt_order_item->error);
        }
    }

    // Clear the cart after the order is processed
    unset($_SESSION["cart_item"]);

    // Redirect to a thank you page or order summary page
    header("Location: thank_you.php");
    exit();
} else {
    // Redirect to the store if the form is not submitted
    header("Location: store.php");
    exit();
}
?>
