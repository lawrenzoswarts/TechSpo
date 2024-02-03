<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Replace these placeholder colors with your website's actual colors -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
            background-color: #f8f9fa; /* Replace with your background color */
        }
        .container {
            background-color: #ffffff; /* Replace with your container background color */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h1 {
            color: #0a4275; /* Replace with your heading color */
        }
        p {
            color: #495057; /* Replace with your paragraph text color */
            font-size: 18px;
        }
        a.btn {
            color: #ffffff !important; /* Replace with your button text color */
        }
        a.btn.btn-warning {
            background-color: red; /* Replace with your warning button color */
            border-color: red; /* Replace with your warning button border color */
        }
        a.btn.btn-danger {
            background-color: #ec008c; /* Replace with your danger button color */
            border-color: #ec008c; /* Replace with your danger button border color */
        }
        a.btn.btn-info {
            background-color: #00aeef; /* Replace with your info button color */
            border-color: #00aeef; /* Replace with your info button border color */
        }
    </style>
</head>
<body>

    <main class="container">
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Cape Town Techspo Exhibition.</h1>
        <p>
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
            <a href="index.php" class="btn btn-info ml-3">Back to Home</a>
        </p>
    </main>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
