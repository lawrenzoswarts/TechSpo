<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - TECHSPO 2023</title>
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
      <li class="nav-item active">
      <a class="nav-link" href="contact.php">Contact<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<main>
    <div class="container-fluid">
        <h1 class="display-5 mb-3">Contact Us</h1>

        <!-- Event Location and Map Section -->
        <section>
            <h2>Event Location</h2>
            <p style="font-weight: bold;">The TECHSPO 2023 event will take place at the Avenue Conference and Event Venue. See the map below:</p>
        </section>

        <div class="row">
            <div class="col-md-12">
                <!-- Embed Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.285225055543!2d18.417154!3d-33.908058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc675ae0f841bb%3A0x5e1e4b3b2328ac78!2sAvenue%20Conference%20and%20Event%20Venue!5e0!3m2!1sen!2sza!4v1700575260894!5m2!1sen!2sza" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="row">
            <!-- Contact Information Section -->
            <div class="col-md-12">
                <section>
                    <h2>Contact Information</h2>
                    <p>For more information, feel free to contact us:</p>
                    <ul>
                        <li><strong>Email:</strong> info@techspo2023.com</li>
                        <li><strong>Phone:</strong> +1 (123) 456-7890</li>
                    </ul>
                </section>
            </div>
        </div>

        <!-- Google Form Section -->
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <section>
                    <h2>Get in Touch</h2>
                    <p>Use the form below to reach out to us:</p>
                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdZdguof0smI-1yhzi5Gdx-GRhQYex_BottARs9a1F2XHTmzw/viewform?embedded=true" width="640" height="850" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>                
                </section>
            </div>
        </div>
    </div>
</main>
<br>
<section class="">
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
