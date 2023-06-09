<?php

require_once('fpdf185/fpdf.php');

session_start();

include_once("connection.php");
$con = connection();
// include('book_flight.php');

if(!isset($_SESSION['booking_data'])) {

}

$booking_data = $_SESSION['booking_data'];

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
  <!-- Google Fonts -->

  <title>Flight Booking Site</title>

  <link rel="stylesheet" href="style.css" />
  <style>
    @media (min-width: 992px) {
      html {
        font-size: 93%;
      }

      .container {
        min-height: 100vh;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="mt-4">Booking Successful!</h1>
        <div class="modal-content">
          <div class="modal-header" style="background: #ffa500;
">
            <h5 class="modal-title" id="bookingModalLabel" style="color: #fff;">Your Flight Booking Details</h5>
            <!-- <a href="index.php" class="btn btn-danger">Book another flight</a> -->
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-5">
                <h4>Personal Information:</h4>
                <p><strong>Name:</strong>
                  <?php echo $booking_data['travelers_name']; ?>
                </p>
                <p><strong>Gender:</strong>
                  <?php echo $booking_data['gender']; ?>
                </p>
                <p><strong>Birthdate:</strong>
                  <?php echo $booking_data['birthdate']; ?>
                </p>
                <p><strong>Nationality:</strong>
                  <?php echo $booking_data['nationality']; ?>
                </p>
                <p><strong>Contact Number:</strong>
                  <?php echo $booking_data['contact_number']; ?>
                </p>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col">
                    <h4>Flight Details</h4>
                    <p><strong>Departure Airport:</strong>
                      <?php echo $booking_data['departure_airport']; ?>
                    </p>
                    <p><strong>Destination Airport:</strong>
                      <?php echo $booking_data['destination_airport']; ?>
                    </p>
                    <p><strong>Departure Date:</strong>
                      <?php echo $booking_data['departure_date']; ?>
                    </p>
                  </div>
                  <div class="col">
                    <p><strong>Return Date:</strong>
                      <?php echo $booking_data['return_date']; ?>
                    </p>
                    <p><strong>Cabin Class:</strong>
                      <?php echo $booking_data['cabin_class']; ?>
                    </p>
                    <p><strong>Number of Adults:</strong>
                      '<?php echo $booking_data['passenger_adults']; ?>
                    </p>
                    <p><strong>Number of Children:</strong>
                      <?php echo $booking_data['passenger_children']; ?>
                    </p>
                    <p><strong>Number of Infants:</strong>
                      <?php echo $booking_data['passenger_infants']; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <h4>Passport Information:</h4>
                <p><strong>Passport Number:</strong>
                  <?php echo $booking_data['passport_number']; ?>
                </p>
                <p><strong>Passport Expiration Date:</strong>
                  <?php echo $booking_data['passport_expiration']; ?>
                </p>
                <p><strong>Country of Issue:</strong>
                  <?php echo $booking_data['country_of_issue']; ?>
                </p>
              </div>
              <div class="col-sm-6">
                <h4>Payment Information:</h4>
                <p><strong>Cardholder Name:</strong>
                  <?php echo $booking_data['cardholder_name']; ?>
                </p>
                <p><strong>Card Number:</strong>
                  <?php echo $booking_data['card_number']; ?>
                </p>
                <p><strong>Expiration Date:</strong>
                  <?php echo $booking_data['expiration_date']; ?>
                </p>
                <p><strong>CVV:</strong>
                  <?php echo $booking_data['cvv']; ?>
                </p>
                <p><strong>Billing Address:</strong>
                  <?php echo $booking_data['billing_address']; ?>
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="pdfButton">Print</button>
            <a href="index.php" class="btn btn-danger">Book another flight</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    const pdfButton = document.getElementById('pdfButton');
    pdfButton.addEventListener('click', () => {
      fetch('generate_pdf.php')
        .then(response => response.blob())
        .then(blob => {
          // Create a download link for the PDF
          const url = URL.createObjectURL(blob);
          const link = document.createElement('a');
          link.href = url;
          const filename = '<?php echo $booking_data['travelers_name']; ?>_Flight_Booking_Details.pdf';
          link.download = filename;
          link.click();

          // Clean up the URL object after the download
          URL.revokeObjectURL(url);
        })
        .catch(error => {
          console.error('Error generating PDF:', error);
        });
    });
  </script>
</body>

</html>
<?php
// } else {
//     echo mysqli_error($con);
// }
?>