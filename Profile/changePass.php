<?php
session_start();

require 'db.php';

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = dataFilter($_POST['uname']);
    $currPass = $_POST['currPass'];
    $newPass = $_POST['newPass'];
    $conNewPass = $_POST['conNewPass'];
    $newHash = dataFilter(md5(rand(0, 1000)));

    $sql = "SELECT * FROM members WHERE Username='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        $_SESSION['message'] = "Invalid User Credentials!";
        header("location: error.php");
        exit(); // Stop execution after redirect
    } else {
        $User = $result->fetch_assoc();

        if (password_verify($currPass, $User['Password'])) {
            if ($newPass == $conNewPass) {
                $conNewPass = dataFilter(password_hash($conNewPass, PASSWORD_BCRYPT));
                $currHash = $_SESSION['Hash'];
                $sql = "UPDATE members SET Password='$conNewPass', Hash='$newHash' WHERE Hash='$currHash';";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['message'] = "Password changed Successfully!";
                    header("location: Login/success.php");
                    exit(); // Stop execution after redirect
                } else {
                    $_SESSION['message'] = "Error occurred while changing password<br>Please try again!";
                    header("Location: Login/error.php");
                    exit(); // Stop execution after redirect
                }
            } else {
                $_SESSION['message'] = "New passwords do not match!";
                header("Location: Login/error.php");
                exit(); // Stop execution after redirect
            }
        } else {
            $_SESSION['message'] = "Invalid current password!";
            header("Location: Login/error.php");
            exit(); // Stop execution after redirect
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" required><br><br>
        <label for="currPass">Current Password:</label><br>
        <input type="password" id="currPass" name="currPass" required><br><br>
        <label for="newPass">New Password:</label><br>
        <input type="password" id="newPass" name="newPass" required><br><br>
        <label for="conNewPass">Confirm New Password:</label><br>
        <input type="password" id="conNewPass" name="conNewPass" required><br><br>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>
