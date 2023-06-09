<?php

if(!isset($_SESSION)) {
    session_start();
}

include_once("../connection.php");
$con = connection();


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

  <title>Admin Dashboard</title>

  <link rel="stylesheet" href="../style.css" />
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
</head>

<body>
  <div class="container">
    <div class="dashboard">
      <!-- Admin Profile and Bookings Panel -->
      <div class="panel">
        <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="adminProfile-tab" data-toggle="tab" href="#adminProfile" role="tab"
              aria-controls="adminProfile" aria-selected="true">Admin Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="bookings-tab" data-toggle="tab" href="#bookings" role="tab" aria-controls="bookings"
              aria-selected="false">Bookings</a>
          </li>
          <li class="nav-item">
            <a href="../index.php" class="nav-link" id="bookAFlight-tab">Book a Flight</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="adminProfile" role="tabpanel" aria-labelledby="adminProfile-tab">
            <!-- Admin Profile Content -->
            <h2>Admin Profile</h2>
            <p>Name:
              <?php echo $_SESSION['AdminName']; ?>
            </p>
            <div class="d-flex align-items-center gap-2 form-control"
              style="border: none; box-shadow: none; padding:0; margin-bottom:1rem;">
              <p class="m-0">Password: </p>
              <input type="password" readonly style="border:0;outline:0;"
                value="<?php echo $_SESSION['AdminPass']; ?>">
            </div>
            <div class="d-flex justify-content-start">
              <a href="edit_admin_profile.php?ID=<?php echo $_SESSION['AdminId']; ?>"
                class="btn btn-primary me-2">Update Profile</a>
              <form method="POST" action="logout.php">
                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
              </form>
            </div>

          </div>

          <div class="tab-pane fade" id="bookings" role="tabpanel" aria-labelledby="bookings-tab">
            <!-- Bookings Content -->
            <h2>Bookings</h2>

            <?php
            $get_bookings = "SELECT * FROM flight_bookings";
$bookings = $con->query($get_bookings) or die($con->error);
?>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Traveler Name</th>
                    <th>Contact Number</th>
                    <th>Departure Airport</th>
                    <th>Destination Airport</th>
                    <th>Departure Date</th>
                    <th>Return Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
      while ($row = $bookings->fetch_assoc()) {
          ?>
                  <tr
                    onclick="window.location.href='booking_details.php?id=<?php echo $row['id'];?>';"
                    style="cursor: pointer;">
                    <td>
                      <?php echo $row['travelers_name']; ?>
                    </td>
                    <td>
                      <?php echo $row['contact_number']; ?>
                    </td>
                    <td>
                      <?php echo $row['departure_airport']; ?>
                    </td>
                    <td>
                      <?php echo $row['destination_airport']; ?>
                    </td>
                    <td>
                      <?php echo $row['departure_date']; ?>
                    </td>
                    <td>
                      <?php echo $row['return_date']; ?>
                    </td>
                    <td>
                      <a href="update_booking.php?id=<?php echo $row['id']; ?>"
                        class="btn btn-primary btn-sm">Update</a>
                      <a href="delete_booking.php?id=<?php echo $row['id']; ?>"
                        class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  <?php
      }
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>