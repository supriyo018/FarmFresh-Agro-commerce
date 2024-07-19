<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or display an error message
    header('Location: login.php');
    exit(); // Stop further execution
}

$fid = $_SESSION['id']; // Assuming 'id' is the user ID

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update profile in the database
    $sql = "UPDATE farmer
            SET 
                fname = '$name',
                fusername = '$username',
                femail = '$email',
                fmobile = '$mobile',
                faddress = '$address'
            WHERE
                fid = '$fid'";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Profile updated successfully
        $_SESSION['message'] = "Profile updated successfully!";
        header('Location: Login/success.php');
        exit(); // Stop further execution
    } else {
        // Error occurred while updating profile
        $_SESSION['error'] = "Error updating profile: " . mysqli_error($conn);
        header('Location: Login/error.php');
        exit(); // Stop further execution
    }
}

// If the request is not POST, display the form
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <!-- Your meta tags and CSS/JS links here -->
    <meta lang="eng">
    <meta charset="UTF-8">
    <title>FarmFresh</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="Blog/commentBox.css" />
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
</head>
<body class="subpage">
    <?php require 'menu.php'; ?>
    <section id="post" class="wrapper bg-img" data-bg="banner2.jpg">
        <div class="inner">
            <div class="box">
                <header>
                    <span class="image left">
                        <img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="img-circle img-responsive" height="200px">
                    </span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
                    <h4><?php echo $_SESSION['Username'];?></h4>
                    <br>
                </header>
            </div>
        </div>
    </section>
    <section id="main" class="wrapper">
        <div class="container">
            <center>
                <h2>Update Profile</h2>
            </center>
            <section id="two" class="wrapper style2 align-center">
                <div class="container">
                    <center>
                        <form method="post" action="profileEdit.php">
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="name" id="name" placeholder="Name" required />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="username" id="username" placeholder="Username" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" required />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="email" name="email" id="email" placeholder="Email" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="12u">
                                    <input type="text" name="address" id="address" placeholder="Address" style="width:100%" required />
                                </div>
                            </div>
                            <br />
                            <p>
                                <input type="submit" value="Update Profile" />
                            </p>
                        </form>
                    </center>
                </div>
            </section>
        </div>
    </section>
    <!-- Your script tags here -->
    <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
</body>
</html>
