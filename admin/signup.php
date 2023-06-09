<?php

include_once("../connection.php");
$con = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $con->prepare("INSERT INTO admin (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $fullname, $email, $password);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error: " . $con->error;
    }
}
