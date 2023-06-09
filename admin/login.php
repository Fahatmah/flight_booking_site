<?php


if(!isset($_SESSION)) {
    session_start();
}

include_once("../connection.php");
$con = connection();

if (isset($_POST['login'])) {
    $id = $_POST['id'];
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE id = '$id' AND admin_name = '$admin_name' AND password = '$password'";
    $result = $con->query($sql) or die($con->error);
    $row = $result->fetch_assoc();
    $total_query = $result->num_rows;

    if ($total_query > 0) {
        $_SESSION['AdminId'] = $row['id'];
        $_SESSION['AdminName'] = $row['admin_name'];
        $_SESSION['AdminPass'] = $row['password'];

        $update_login = "UPDATE admin SET admin_name = '{$_SESSION['AdminName']}', password = '{$_SESSION['AdminPass']}' WHERE id = '{$_SESSION['AdminId']}'";
        $con->query($update_login) or die($con->error);

        echo header("Location: admin_dashboard.php");
    } else {
        // Invalid credentials, redirect back to login page with error message
        $error_message = "Invalid login credentials. Please try again.";
        echo header("Location: login.php?error=" . urlencode($error_message));
    }
}

// $stmt = $con->prepare("SELECT * FROM admin WHERE id = ? AND admin_name = ? AND password = ?");
// $stmt->bind_param('sss', $id, $admin_name, $password);
// $stmt->execute();

// $result = $stmt->get_result();
// $admin = $result->fetch_assoc();

// if ($admin) {
//     $_SESSION['id'] = $admin['id'];
//     $_SESSION['admin_name'] = $admin['admin_name'];
//     $_SESSION['password'] = $admin['password'];
//     header("Location: admin_dashboard.php");
//     exit;
// } else {
//     echo "Invalid credentials! Please try again.";
// }
// }
