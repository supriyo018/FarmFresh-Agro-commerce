<?php
session_start();
require 'db.php';

$pid = $_GET['pid'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pincode = $_POST['pincode'];
    $addr = $_POST['addr'];
    $quantity = $_POST['quantity']; // Added line to get quantity
    $bid = $_SESSION['id'];
    $mode = $_POST['mode'];

    $price_query = "SELECT price FROM fproduct WHERE pid = '$pid'";
    $price_result = mysqli_query($conn, $price_query);
    if ($price_row = mysqli_fetch_assoc($price_result)) {
        $price = $price_row['price'];

        // Calculate total price based on quantity
        $total_price = $price * $quantity;

        $sql = "INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr, price, quantity,mode)
            VALUES ('$bid', '$pid', '$name', '$city', '$mobile', '$email', '$pincode', '$addr', '$total_price', '$quantity','$mode')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Order Successfully placed! <br /> Thanks for shopping with us!!!";
            header('Location: Login/success.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            //$_SESSION['message'] = "Sorry!<br />Order was not placed";
            //header('Location: Login/error.php');
        }
    } else {
        echo "Error: PID not found in fproduct table";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>FarmFresh: Transaction</title>
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

<body>

    <?php
    require 'menu.php';
    ?>


<section id="main" class="wrapper">
    <div class="container">
        <center>
            <h2>Transaction Details</h2>
        </center>
        <section id="two" class="wrapper style2 align-center">
            <div class="container">
                <center>
                    <form method="post" action="buyNow.php?pid=<?= $pid; ?>" style="border: 1px solid black; padding: 15px;">
                        <center>
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="name" id="name" value="" placeholder="Name" required />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="city" id="city" value="" placeholder="City" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="email" name="email" id="email" value="" placeholder="Email" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="4u 12u$(xsmall)">
                                    <input type="text" name="pincode" id="pincode" value="" placeholder="Pincode" required />
                                </div>
                                <div class="8u 12u$(xsmall)">
                                    <input type="text" name="addr" id="addr" value="" placeholder="Address" style="width:80%" required />
                                </div>
                            </div>
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input type="number" name="quantity" id="quantity" value="" min="1" placeholder="Quantity" required />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <select name="mode" id="mode" required>
                                        <option value="">Select Payment Mode</option>
                                        <option value="COD">Cash on Delivery</option>
                                        <option value="Online">Online Payment</option>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <p>
                                <input type="submit" value="Confirm Order" />
                            </p>
                        </center>
                    </form>
                </center>
            </div>
        </section>
    </div>
</section>
