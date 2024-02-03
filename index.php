<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
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

<section class="welcome-section">
  <div class="container-fluid">
    <br>
    <h1>Welcome to TECHSPO Cape Town 2023</h1>
    <p>We are thrilled to welcome you to the most exciting tech event of the year in beautiful Cape Town. Get ready for an incredible journey into the world of technology and innovation.
    Join us as we explore the latest trends, network with industry leaders, and dive deep into the future of tech. Whether you're a tech enthusiast, a professional, or just curious about the digital world, you're in the right place.
    Don't miss out on this amazing opportunity to connect, learn, and experience the future today. Be part of the TECHSPO community!</p>
    <br>
    <a href="members.php" class="btn btn-primary custom-button">Become a Member</a>
  </div>
  <br>
    <h2>Discover Floor Plans</h2>
    <img class="plan" src="img/floorPlan.jpg" alt="Tech Image">
</section>
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
    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
