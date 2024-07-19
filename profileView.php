<?php
    session_start();

    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
    {
        $_SESSION['message'] = "You have to Login to view this page!";
        header("Location: Login/error.php");
    }

    require 'db.php';

    // Fetch farmer information for the logged-in user
    $userId = $_SESSION['id'];
    $farmer_query = "SELECT fid,fname,fusername, femail, fmobile, faddress FROM farmer WHERE fid = '$userId'";
    $farmer_result = mysqli_query($conn, $farmer_query);

    // Check if farmer information is fetched successfully
    if(mysqli_num_rows($farmer_result) > 0) {
        $farmer_info = mysqli_fetch_assoc($farmer_result);
        // Store farmer information in session variables
        $_SESSION['fid'] = $farmer_info['fid'];
        $_SESSION['fname'] = $farmer_info['fname'];
        $_SESSION['fusername'] = $farmer_info['fusername'];
        $_SESSION['femail'] = $farmer_info['femail'];
        $_SESSION['fmobile'] = $farmer_info['fmobile'];
        $_SESSION['faddress'] = $farmer_info['faddress'];
    } else {
        // Handle case where farmer information is not found
        $_SESSION['message'] = "Farmer information not found!";
        header("Location: Login/error.php");
        exit(); // Stop further execution
    }
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<body>

<?php
    require 'menu.php';
?>

<section id="one" class="wrapper style1 align">
    <div class="inner">
        <div class="box">
            <header>
                <center>
                    <span><img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="image-circle" class="img-responsive" height="200%"></span>
                    <br>
                    <h2><?php echo $_SESSION['Name'];?></h2>
            
                    <br>
                </center>
            </header>
            <div class="row">
                <!-- Display user information -->
                <center>
                
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="d-flex flex-wrap">
                <div class="col-sm-4" style="background-color: #333; padding: 10px; margin-bottom: 10px; margin-right: 10px; border-radius: 5px;">
                    <b style="color: #fff; display: block;">Farmer ID:</b>
                    <span style="color: #ccc;"><?php echo $_SESSION['fid']; ?></span>
                </div>
                <div class="col-sm-4" style="background-color: #333; padding: 10px; margin-bottom: 10px; margin-right: 10px; border-radius: 5px;">
                    <b style="color: #fff; display: block;">Name:</b>
                    <span style="color: #ccc;"><?php echo $_SESSION['fname']; ?></span>
                </div>
                <div class="col-sm-4" style="background-color: #333; padding: 10px; margin-bottom: 10px;margin-right: 10px; border-radius: 5px;">
                    <b style="color: #fff; display: block;">Username:</b>
                    <span style="color: #ccc;"><?php echo $_SESSION['fusername']; ?></span>
                </div>
                <div class="col-sm-4" style="background-color: #333; padding: 10px; margin-bottom: 10px; margin-right: 10px; border-radius: 5px;">
                    <b style="color: #fff; display: block;">Email:</b>
                    <span style="color: #ccc;"><?php echo $_SESSION['femail']; ?></span>
                </div>
                <div class="col-sm-4" style="background-color: #333; padding: 10px; margin-bottom: 10px; margin-right: 10px; border-radius: 5px;">
                    <b style="color: #fff; display: block;">Mobile:</b>
                    <span style="color: #ccc;"><?php echo $_SESSION['fmobile']; ?></span>
                </div>
                <div class="col-sm-4" style="background-color: #333; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
                    <b style="color: #fff; display: block;">Address:</b>
                    <span style="color: #ccc;"><?php echo $_SESSION['faddress']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>


 


  
</center>

                
            </div>
            <br />
            <div class="row">
                <!-- Display user ratings, email, mobile, address, etc. -->
            </div>
            <div class="12u$">
                <center>
                    <div class="row uniform">
                        
                        <div class="3u 12u$(large)">
                            <a href="profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a>
                        </div>
                        <div class="3u 12u$(xsmall)">
                            <a href="uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">Upload Product</a>
                        </div>
                        <div class="3u 12u$(large)">
                            <a href="Login/logout.php" class="btn btn-danger" style="text-decoration: none;">LOG OUT</a>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</section>

<!-- Display transaction history -->
<section id="transactions" class="wrapper">
    <div class="container">
        <h2>Transaction History</h2>
        <?php
            require 'db.php';

            // Fetch transactions for the logged-in user
            $userId = $_SESSION['id'];
            $sql = "SELECT t.tid, t.pid, t.quantity, t.name, t.city, t.mobile, t.email, t.pincode, t.addr, t.price,t.mode, p.product 
                    FROM transaction t
                    INNER JOIN fproduct p ON t.pid = p.pid
                    WHERE t.bid = '$userId'";
            $result = mysqli_query($conn, $sql);

            // Display transactions in a table
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Transaction ID</th><th>Payment Mode</th><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Name</th><th>City</th><th>Mobile</th><th>Email</th><th>Pincode</th><th>Address</th><th>Amount</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['tid']."</td>";
                    echo "<td>".$row['mode']."</td>";
                    echo "<td>".$row['pid']."</td>";
                    echo "<td>".$row['product']."</td>";
                    echo "<td>".$row['quantity']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['city']."</td>";
                    echo "<td>".$row['mobile']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['pincode']."</td>";
                    echo "<td>".$row['addr']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No transactions found.</p>";
            }

            // Close database connection
            mysqli_close($conn);
        ?>
    </div>
</section>


<!-- Add your footer and any other scripts here -->

</body>
</html>
