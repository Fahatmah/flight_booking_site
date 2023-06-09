<?php

if(!isset($_SESSION)) {
    session_start();
}

include_once("../connection.php");
$con = connection();

if(isset($_POST['login'])) {
    $id = $_POST['id'];
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminacc WHERE admin_name = '$admin_name' AND password = '$password'";
    $result = $con->query($sql) or die($con->error);
    $row = $result->fetch_assoc();
    $total_query = $result->num_rows;

    if ($total_query > 0) {
        $_SESSION['AdminId'] = $row['id'];
        $_SESSION['AdminName'] = $row['admin_name'];
        $_SESSION['AdminPass'] = $row['password'];

        $update_login = "UPDATE adminacc SET admin_name = '{$_SESSION['AdminName']}', password = '{$_SESSION['AdminPass']}' WHERE id = '{$_SESSION['AdminId']}'";
        $con->query($update_login) or die($con->error);

        echo header("Location: admin_dashboard.php");
    } else {
        // Invalid credentials, redirect back to login page with error message
        $error_message = "Invalid login credentials. Please try again.";
        echo header("Location: login.php?error=" . urlencode($error_message));
    }
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

  <title>Admin Forms</title>

  <link rel="stylesheet" href="../style.css" />
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
</head>

<body>
  <!-- Section Book Start -->
  <section class="book" id="book">
    <div class="container">
      <div class="main-text">
        <h1><span>B</span>ook Reservation for Travel and Tours</h1>
      </div>

      <!-- Login Form -->
      <!-- <form action="" method="post"> -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <h2 class="text-center">Admin Login</h2>
            <form method="post" action="">
              <div class="form-group">
                <label for="admin_name">Admin Name </label>
                <input type="text" class="form-control" id="admin_name" name="admin_name" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block mt-2" name="login">Login</button>
            </form>
          </div>
        </div>
      </div>
      <!-- </form> -->

      <!-- Sign Up Form -->
      <!-- <form action="signup.php" method="POST">
        <div class="container mt-4">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <h2 class="text-center">Admin Sign Up</h2>
              <form method="POST" action="signup.php">
                <div class="form-group">
                  <label for="signup-fullname">Full Name</label>
                  <input type="text" class="form-control" id="signup-fullname" name="fullname" required>
                </div>
                <div class="form-group">
                  <label for="signup-email">Email</label>
                  <input type="text" class="form-control" id="signup-email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="signup-password">Password</label>
                  <input type="password" class="form-control" id="signup-password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-2">Sign Up</button>
              </form>
            </div>
          </div>
        </div>
      </form> -->
    </div>
  </section>
  <!-- Section Book End -->

  <footer id="footer">
    <h1><span>T</span>ravel</h1>
    <div class="social-links">
      <i class="fa-brands fa-twitter"> </i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-brands fa-instagram"></i>
    </div>
    <div class="copyright">
      <p>&copy;Booking Reservations for Travel and Tours</p>
    </div>
  </footer>


  <script>
    const copyButton = document.getElementById('copyButton')
    copyButton.addEventListener('click', () => {
      let flight_book_details =
        document.getElementsByClassName('modal-body')[0].innerText
      copyToClipboard(flight_book_details)
    })

    function copyToClipboard(text) {
      let tempEl = document.createElement('textarea')
      tempEl.value = text
      document.body.appendChild(tempEl)
      tempEl.select()
      document.execCommand('copy')
      document.body.removeChild(tempEl)
      alert('Flight Book Details : Copied to clipboard')
    }
  </script>
</body>

</html>