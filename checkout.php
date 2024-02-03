<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script>
    function validateForm() {
        var billingName = document.getElementById("billingName").value;
        var billingAddress = document.getElementById("billingAddress").value;
        var billingCity = document.getElementById("billingCity").value;

        if (billingName === "" || billingAddress === "" || billingCity === "") {
            alert("Please fill out all billing information fields.");
            return false;
        }
        // If all checks pass, the form will be submitted
        return true;
    }
</script>
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
    <h1 class="display-4 mb-4">Checkout</h1>

<form action="verify_order.php" method="post">
<!-- Step 1: Billing and Shipping information -->
<h2 class="mb-3">Step 1: Billing and Shipping Information</h2>

<!-- Billing Information -->
<div class="mb-3">
    <h4 class="mb-3">Billing Information</h4>

    <!-- Name -->
    <div class="form-group">
        <label for="billingName">Full Name</label>
        <input type="text" class="form-control" id="billingName" name="billingName" required>
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="billingAddress">Address</label>
        <input type="text" class="form-control" id="billingAddress" name="billingAddress" required>
    </div>

    <!-- City -->
    <div class="form-group">
        <label for="billingCity">City</label>
        <input type="text" class="form-control" id="billingCity" name="billingCity" required>
    </div>

    <!-- Other Billing Information Fields (e.g., State, Zip Code, Country, etc.) -->

</div>

<!-- Shipping Information -->
<div class="mb-3">
    <h4 class="mb-3">Shipping Information</h4>

    <!-- Use the same structure as Billing Information for shipping details -->
    <!-- You may also provide an option for the user to use the same information for shipping -->

</div>

<button type="submit" class="btn btn-primary">Review Order</button><br>
    <br>
    </form>
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

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
