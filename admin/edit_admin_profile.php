<?php


if(!isset($_SESSION)) {
    session_start();
}


include_once("../connection.php");
$con = connection();

// $admin_access_id = $_SESSION['id'];

if(isset($_POST['update_admin'])) {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    $update_admin_profile = "UPDATE adminacc SET admin_name = '$admin_name', password = '$password' WHERE id = '{$_SESSION['AdminId']}'";
    $con->query($update_admin_profile) or die($con->error);

    $_SESSION['AdminName'] = $admin_name;
    $_SESSION['AdminPass'] = $password;

    echo header('Location: admin_dashboard.php?ID='.$_SESSION['AdminId']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Bootstrap Link -->

  <!-- Font Awesome Cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- Font Awesome Cdn -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet" />
  <!-- dm sans font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
  <!-- Google Fonts -->

  <title> <?php echo $admin_name ?> Edit Admin Profile</title>

  <link rel="stylesheet" href="../style.css" />
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
</head>

<body>

  <!-- Edit Admin Profile Form -->
  <div class="container-fluid">
    <h2 class="text-center">Edit Admin Profile</h2>
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <form method="post">
          <div class="form-group">
            <label for="admin_name">Full Name:</label>
            <input type="text" class="form-control" name="admin_name"
              value="<?php echo $_SESSION['AdminName']; ?>"
              required>
          </div>
          <div class="form-group mb-2">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password"
              value="<?php echo $_SESSION['AdminPass']; ?>"
              required>
          </div>
          <button type="submit" class="btn btn-primary" name="update_admin">Update</button>
          <a href="admin_dashboard.php?ID=<?php echo $_SESSION['AdminId']; ?>" type="submit" class="btn btn-danger">Cancel</a>
        </form>
      </div>
    </div>
  </div>


</html>