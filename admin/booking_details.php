<?php
include_once("../connection.php");
$con = connection();

// Assuming you have the booking ID from the URL parameter
$id = $_GET['id'];

// Retrieve the booking details from the database based on the ID
$get_booking = "SELECT * FROM flight_bookings WHERE id = $id";
$result = $con->query($get_booking);

if ($result && $result->num_rows > 0) {
    $booking_data = $result->fetch_assoc();
    // Retrieve the booking details and assign them to variables
    // ...

    // Generate the PDF link with the correct ID
    $pdf_link = "generate_pdf.php?id=" . $id;
    // Update link
    $update_link = "update_booking.php?id=" . $id;
    // Delete link
    $delete_link = "delete_booking.php?id=" . $id;
} else {
    echo '<p class="text-center">No booking found.</p>';
    exit;
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

  <link rel="stylesheet" href="../style.css" />
  <style>
    body {
      padding-top: 40px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    .btn-back {
      margin-top: 20px;
    }
  </style>

  <title>Booking Details</title>
</head>

<body>
  <div class="container">
    <h2 class="text-center mb-4">Booking Details</h2>
    <div class="d-flex align-items-center justify-content-center mb-3 gap-3">
      <!-- <button type="button" class="btn btn-primary" id="pdfButton">Print</button> -->
      <a href="generate_pdf.php?id=<?php echo $id; ?>"
        class="btn btn-success">Print</a>
      <a href="update_booking.php?id=<?php echo $id; ?>"
        class="btn btn-primary">Update</a>
      <a href="delete_booking.php?id=<?php echo $id; ?>"
        class="btn btn-danger">Delete</a>
      <a href="admin_dashboard.php" class="btn btn-secondary btn-back m-0">Back to Dashboard</a>
    </div>

    <?php

// Assuming you have the booking ID from the URL parameter
$id = $_GET['id'];

// Retrieve the booking details from the database based on the ID
$get_booking = "SELECT * FROM flight_bookings WHERE id = $id";
$result = $con->query($get_booking);

if ($result && $result->num_rows > 0) {
    $booking_data = $result->fetch_assoc();
    $travelerName = $booking_data['travelers_name'];
    $gender = $booking_data['gender'];
    $birthdate = $booking_data['birthdate'];
    $nationality = $booking_data['nationality'];
    $contactNumber = $booking_data['contact_number'];
    $departureAirport = $booking_data['departure_airport'];
    $destinationAirport = $booking_data['destination_airport'];
    $departureDate = $booking_data['departure_date'];
    $returnDate = $booking_data['return_date'];
    $cabinClass = $booking_data['cabin_class'];
    $passengerAdults = $booking_data['passenger_adults'];
    $passengerChildren = $booking_data['passenger_children'];
    $passengerInfants = $booking_data['passenger_infants'];
    $passportNumber = $booking_data['passport_number'];
    $passportExpiration = $booking_data['passport_expiration'];
    $countryOfIssue = $booking_data['country_of_issue'];
    $cardholderName = $booking_data['cardholder_name'];
    $cardNumber = $booking_data['card_number'];
    $expirationDate = $booking_data['expiration_date'];
    $cvv = $booking_data['cvv'];
    $billingAddress = $booking_data['billing_address'];
} else {
    echo '<p class="text-center">No booking found.</p>';
    exit;
}
?>

    <h4 class="text-center mb-4"><?php echo $travelerName; ?></h4>


    <div class="table-responsive">
      <table class="table">
        <tbody>
          <tr>
            <th scope="row">ID</th>
            <td><?php echo $id; ?></td>
          </tr>
          <tr>
            <th scope="row">Traveler Name</th>
            <td><?php echo $travelerName; ?></td>
          </tr>
          <tr>
            <th scope="row">Gender</th>
            <td><?php echo $gender; ?></td>
          </tr>
          <tr>
            <th scope="row">Birthdate</th>
            <td><?php echo $birthdate; ?></td>
          </tr>
          <tr>
            <th scope="row">Nationality</th>
            <td><?php echo $nationality; ?></td>
          </tr>
          <tr>
            <th scope="row">Contact Number</th>
            <td><?php echo $contactNumber; ?></td>
          </tr>
          <tr>
            <th scope="row">Departure Airport</th>
            <td><?php echo $departureAirport; ?></td>
          </tr>
          <tr>
            <th scope="row">Destination Airport</th>
            <td><?php echo $destinationAirport; ?></td>
          </tr>
          <tr>
            <th scope="row">Departure Date</th>
            <td><?php echo $departureDate; ?></td>
          </tr>
          <tr>
            <th scope="row">Return Date</th>
            <td><?php echo $returnDate; ?></td>
          </tr>
          <tr>
            <th scope="row">Cabin Class</th>
            <td><?php echo $cabinClass; ?></td>
          </tr>
          <tr>
            <th scope="row">Passenger Adults</th>
            <td><?php echo $passengerAdults; ?></td>
          </tr>
          <tr>
            <th scope="row">Passenger Children</th>
            <td><?php echo $passengerChildren; ?></td>
          </tr>
          <tr>
            <th scope="row">Passenger Infants</th>
            <td><?php echo $passengerInfants; ?></td>
          </tr>
          <tr>
            <th scope="row">Passport Number</th>
            <td><?php echo $passportNumber; ?></td>
          </tr>
          <tr>
            <th scope="row">Passport Expiration</th>
            <td><?php echo $passportExpiration; ?></td>
          </tr>
          <tr>
            <th scope="row">Country of Issue</th>
            <td><?php echo $countryOfIssue; ?></td>
          </tr>
          <tr>
            <th scope="row">Cardholder Name</th>
            <td><?php echo $cardholderName; ?></td>
          </tr>
          <tr>
            <th scope="row">Card Number</th>
            <td>
              <div class="form-control" style="border: none; box-shadow: none; background:none;">
                <input type="password" readonly style="border:0;outline:0;"
                  value="<?php echo $cardNumber; ?>">
              </div>
            </td>
          </tr>
          <tr>
            <th scope="row">Expiration Date</th>
            <td><?php echo $expirationDate; ?></td>
          </tr>
          <tr>
            <th scope="row">CVV</th>
            <td><?php echo $cvv; ?></td>
          </tr>
          <tr>
            <th scope="row">Billing Address</th>
            <td><?php echo $billingAddress; ?></td>
          </tr>
        </tbody>
      </table>
    </div>


  </div>

  
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>