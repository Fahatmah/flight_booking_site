<?php
include_once("../connection.php");
$con = connection();

// Assuming you have the booking ID from the URL parameter
$id = $_GET['id'];

// Retrieve the booking details from the database based on the ID
$get_booking = "SELECT * FROM flight_bookings WHERE id = $id";
$result = $con->query($get_booking);

if ($result && $result->num_rows > 0) {
    $booking = $result->fetch_assoc();
    $travelerName = $booking['travelers_name'];
    $gender = $booking['gender'];
    $birthdate = $booking['birthdate'];
    $nationality = $booking['nationality'];
    $contactNumber = $booking['contact_number'];
    $departureAirport = $booking['departure_airport'];
    $destinationAirport = $booking['destination_airport'];
    $departureDate = $booking['departure_date'];
    $returnDate = $booking['return_date'];
    $cabinClass = $booking['cabin_class'];
    $passengerAdults = $booking['passenger_adults'];
    $passengerChildren = $booking['passenger_children'];
    $passengerInfants = $booking['passenger_infants'];
    $passportNumber = $booking['passport_number'];
    $passportExpiration = $booking['passport_expiration'];
    $countryOfIssue = $booking['country_of_issue'];
    $cardholderName = $booking['cardholder_name'];
    $cardNumber = $booking['card_number'];
    $expirationDate = $booking['expiration_date'];
    $cvv = $booking['cvv'];
    $billingAddress = $booking['billing_address'];
} else {
    echo '<p class="text-center">No booking found.</p>';
    exit;
}

// Handle the form submission for updating the booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated values from the form
    $updatedTravelerName = $_POST['travelerName'];
    $updatedGender = $_POST['gender'];
    $updatedBirthdate = $_POST['birthdate'];
    $updatedNationality = $_POST['nationality'];
    $updatedContactNumber = $_POST['contactNumber'];
    $updatedDepartureAirport = $_POST['departureAirport'];
    $updatedDestinationAirport = $_POST['destinationAirport'];
    $updatedDepartureDate = $_POST['departureDate'];
    $updatedReturnDate = $_POST['returnDate'];
    $updatedCabinClass = $_POST['cabinClass'];
    $updatedPassengerAdults = $_POST['passengerAdults'];
    $updatedPassengerChildren = $_POST['passengerChildren'];
    $updatedPassengerInfants = $_POST['passengerInfants'];
    $updatedPassportNumber = $_POST['passportNumber'];
    $updatedPassportExpiration = $_POST['passportExpiration'];
    $updatedCountryOfIssue = $_POST['countryOfIssue'];
    $updatedCardholderName = $_POST['cardholderName'];
    // $updatedCardNumber = $_POST['cardNumber'];
    $updatedExpirationDate = $_POST['expirationDate'];
    $updatedCvv = $_POST['cvv'];
    $updatedBillingAddress = $_POST['billingAddress'];

    // Update the booking details in the database
    $update_booking = "UPDATE flight_bookings SET
    travelers_name = '$updatedTravelerName',
    gender = '$updatedGender',
    birthdate = '$updatedBirthdate',
    nationality = '$updatedNationality',
    contact_number = '$updatedContactNumber',
    departure_airport = '$updatedDepartureAirport',
    destination_airport = '$updatedDestinationAirport',
    departure_date = '$updatedDepartureDate',
    return_date = '$updatedReturnDate',
    cabin_class = '$updatedCabinClass',
    passenger_adults = '$updatedPassengerAdults',
    passenger_children = '$updatedPassengerChildren',
    passenger_infants = '$updatedPassengerInfants',
    passport_number = '$updatedPassportNumber',
    passport_expiration = '$updatedPassportExpiration',
    country_of_issue = '$updatedCountryOfIssue',
    cardholder_name = '$updatedCardholderName',
    
    expiration_date = '$updatedExpirationDate',
    cvv = '$updatedCvv',
    billing_address = '$updatedBillingAddress'
    WHERE id = $id";

    if ($con->query($update_booking) === true) {
        // Redirect to the updated booking details page
        header("Location: booking_details.php?id=$id");
        exit;
    } else {
        echo '<p class="text-center">Failed to update booking.</p>';
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

  <title>Booking Reservation for Travel and Tours</title>

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

    td input {
      padding: 0.3rem;
    }
  </style>

  <title>Booking Details</title>
</head>

<body>
  <div class="container">
    <h2 class="text-center mb-4">Booking Details</h2>



    <form method="POST">

      <div class="text-center mb-2 w-16">
        <input type="submit" class="btn btn-primary" value="Update" />
        <a href="booking_details.php?id=<?php echo $id; ?>"
          class="btn btn-secondary">Back</a>
      </div>
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
              <td>
                <input type="text" name="travelerName"
                  value="<?php echo $travelerName; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Gender</th>
              <td>
                <select name="gender" id="gender" class="form-control">
                  <option value="Male" <?php if ($gender === "Male") {
                      echo "selected";
                  } ?>>Male
                  </option>
                  <option value="Female" <?php if ($gender === "Female") {
                      echo "selected";
                  } ?>>Female
                  </option>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row">Birthdate</th>
              <td>
                <input type="date" name="birthdate"
                  value="<?php echo $birthdate; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Nationality</th>
              <td>
                <input type="text" name="nationality"
                  value="<?php echo $nationality; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Contact Number</th>
              <td>
                <input type="tel" name="contactNumber"
                  value="<?php echo $contactNumber; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Departure Airport</th>
              <td>
                <select id="departure_airport" name="departureAirport" class="form-control">
                  <option value="MNL" <?php if ($departureAirport === "MNL") {
                      echo "selected";
                  } ?>
                    required>
                    Manila Ninoy Aquino International Airport (MNL)
                  </option>
                  <option value="CEB" <?php if ($departureAirport === "CEB") {
                      echo "selected";
                  } ?>>
                    Mactan-Cebu International Airport (CEB)
                  </option>
                  <option value="DVO" <?php if ($departureAirport === "DVO") {
                      echo "selected";
                  } ?>>
                    Francisco Bangoy International Airport (DVO)
                  </option>
                  <option value="CRK" <?php if ($departureAirport === "CRK") {
                      echo "selected";
                  } ?>>
                    Clark International Airport (CRK)
                  </option>
                  <option value="PPS" <?php if ($departureAirport === "PPS") {
                      echo "selected";
                  } ?>>
                    Puerto Princesa International Airport (PPS)
                  </option>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row">Destination Airport</th>
              <td>
                <select id="destination_airport" name="destinationAirport" class="form-control">
                  <optgroup label="France">
                    <option value="CDG" <?php if ($destinationAirport === "CDG") {
                        echo "selected";
                    } ?>
                      required>
                      Charles de Gaulle Airport (CDG)
                    </option>
                    <option value="ORY" <?php if ($destinationAirport === "ORY") {
                        echo "selected";
                    } ?>>
                      Paris Orly Airport (ORY)
                    </option>
                  </optgroup>
                  <optgroup label="Spain">
                    <option value="MAD" <?php if ($destinationAirport === "MAD") {
                        echo "selected";
                    } ?>>
                      Madrid Barajas Airport (MAD)
                    </option>
                    <option value="BCN" <?php if ($destinationAirport === "BCN") {
                        echo "selected";
                    } ?>>
                      Barcelona El Prat Airport (BCN)
                    </option>
                  </optgroup>
                  <optgroup label="United States">
                    <option value="JFK" <?php if ($destinationAirport === "JFK") {
                        echo "selected";
                    } ?>>
                      John F. Kennedy International Airport (JFK)
                    </option>
                    <option value="LAX" <?php if ($destinationAirport === "LAX") {
                        echo "selected";
                    } ?>>
                      Los Angeles International Airport (LAX)
                    </option>
                  </optgroup>
                  <optgroup label="China">
                    <option value="PEK" <?php if ($destinationAirport === "PEK") {
                        echo "selected";
                    } ?>>
                      Beijing Capital International Airport (PEK)
                    </option>
                    <option value="PVG" <?php if ($destinationAirport === "PVG") {
                        echo "selected";
                    } ?>>
                      Shanghai Pudong International Airport (PVG)
                    </option>
                  </optgroup>
                  <optgroup label="India">
                    <option value="DEL" <?php if ($destinationAirport === "DEL") {
                        echo "selected";
                    } ?>>
                      Indira Gandhi International Airport (DEL)
                    </option>
                    <option value="BOM" <?php if ($destinationAirport === "BOM") {
                        echo "selected";
                    } ?>>
                      Chhatrapati Shivaji Maharaj International Airport (BOM)
                    </option>
                  </optgroup>
                  <optgroup label="Pakistan">
                    <option value="ISB" <?php if ($destinationAirport === "ISB") {
                        echo "selected";
                    } ?>>
                      Islamabad International Airport (ISB)
                    </option>
                    <option value="LHE" <?php if ($destinationAirport === "LHE") {
                        echo "selected";
                    } ?>>
                      Allama Iqbal International Airport (LHE)
                    </option>
                  </optgroup>
                  <optgroup label="Italy">
                    <option value="FCO" <?php if ($destinationAirport === "FCO") {
                        echo "selected";
                    } ?>>
                      Leonardo da Vinci International Airport (FCO)
                    </option>
                    <option value="MXP" <?php if ($destinationAirport === "MXP") {
                        echo "selected";
                    } ?>>
                      Milan Malpensa Airport (MXP)
                    </option>
                  </optgroup>
                  <optgroup label="Turkey">
                    <option value="IST" <?php if ($destinationAirport === "IST") {
                        echo "selected";
                    } ?>>
                      Istanbul Ataturk Airport (IST)
                    </option>
                    <option value="SAW" <?php if ($destinationAirport === "SAW") {
                        echo "selected";
                    } ?>>
                      Sabiha Gokcen International Airport (SAW)
                    </option>
                  </optgroup>
                  <optgroup label="Mexico">
                    <option value="MEX" <?php if ($destinationAirport === "MEX") {
                        echo "selected";
                    } ?>>
                      Mexico City International Airport (MEX)
                    </option>
                    <option value="CUN" <?php if ($destinationAirport === "CUN") {
                        echo "selected";
                    } ?>>
                      Cancun International Airport (CUN)
                    </option>
                  </optgroup>
                  <optgroup label="Germany">
                    <option value="FRA" <?php if ($destinationAirport === "FRA") {
                        echo "selected";
                    } ?>>
                      Frankfurt Airport (FRA)
                    </option>
                    <option value="MUC" <?php if ($destinationAirport === "MUC") {
                        echo "selected";
                    } ?>>
                      Munich Airport (MUC)
                    </option>
                  </optgroup>
                  <optgroup label="United Kingdom">
                    <option value="LHR" <?php if ($destinationAirport === "LHR") {
                        echo "selected";
                    } ?>>
                      London Heathrow Airport (LHR)
                    </option>
                    <option value="LGW" <?php if ($destinationAirport === "LGW") {
                        echo "selected";
                    } ?>>
                      London Gatwick Airport (LGW)
                    </option>
                  </optgroup>
                </select>

              </td>
            </tr>
            <tr>
              <th scope="row">Departure Date</th>
              <td>
                <input type="date" name="departureDate" id="departure_date"
                  value="<?php echo $departureDate; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Return Date</th>
              <td>
                <input type="date" name="returnDate" id="return_date"
                  value="<?php echo $returnDate; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Cabin Class</th>
              <td>
                <select id="cabin_class" name="cabinClass" class="form-control" required>
                  <option value="Economy" <?php if ($cabinClass === "Economy") {
                      echo "selected";
                  } ?>>Economy
                  </option>
                  <option value="Business" <?php if ($cabinClass === "Business") {
                      echo "selected";
                  } ?>>Business
                  </option>
                  <option value="First Class" <?php if ($cabinClass === "First Class") {
                      echo "selected";
                  } ?>>First
                    Class</option>
                </select>
              </td>
            </tr>
            <tr>
              <th scope="row">Passenger Adults</th>
              <td>
                <input type="number" name="passengerAdults"
                  value="<?php echo $passengerAdults; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Passenger Children</th>
              <td>
                <input type="number" name="passengerChildren"
                  value="<?php echo $passengerChildren; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Passenger Infants</th>
              <td>
                <input type="number" name="passengerInfants"
                  value="<?php echo $passengerInfants; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Passport Number</th>
              <td>
                <input type="text" name="passportNumber"
                  value="<?php echo $passportNumber; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Passport Expiration</th>
              <td>
                <input type="date" name="passportExpiration"
                  value="<?php echo $passportExpiration; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Country of Issue</th>
              <td>
                <input type="text" name="countryOfIssue"
                  value="<?php echo $countryOfIssue; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Cardholder Name</th>
              <td>
                <input type="text" name="cardholderName"
                  value="<?php echo $cardholderName; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">Card Number</th>
              <td>
                <!--  -->
                <input type="password" class="form-control" readonly
                  value="<?php echo $cardNumber; ?>">
              </td>
            </tr>
            <tr>
              <th scope="row">Expiration Date</th>
              <td>
                <input type="text" name="expirationDate"
                  value="<?php echo $expirationDate; ?>"
                  class="form-control" required />
              </td>
            </tr>
            <tr>
              <th scope="row">CVV</th>
              <td>
                <input type="text" name="cvv"
                  value="<?php echo $cvv; ?>" class="form-control"
                  required />
              </td>
            </tr>
            <tr>
              <th scope="row">Billing Address</th>
              <td>
                <input type="text" name="billingAddress"
                  value="<?php echo $billingAddress; ?>"
                  class="form-control" required />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </form>
  </div>

  <script src="../script.js"></script>
</body>

</html>