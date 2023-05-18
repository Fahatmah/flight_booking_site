<?php

include_once("connection.php");
$con = connection();

if(isset($_POST['book_flight'])) {
    $travelers_name = $_POST['travelers_name'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];
    $contact_number = $_POST['contact_number'];
    $departure_airport = $_POST['departure_airport'];
    $destination_airport = $_POST['destination_airport'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $cabin_class = $_POST['cabin_class'];
    $passenger_adults = $_POST['passenger_adults'];
    $passenger_children = $_POST['passenger_children'];
    $passenger_infants = $_POST['passenger_infants'];
    $passport_number = $_POST['passport_number'];
    $passport_expiration = $_POST['passport_expiration'];
    $country_of_issue = $_POST['country_of_issue'];
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];
    $billing_address = $_POST['billing_address'];

    // Insert the data into the flight_bookings table
    $book_flight = "INSERT INTO flight_bookings (travelers_name, gender, birthdate, nationality, contact_number, departure_airport, destination_airport, departure_date, return_date, cabin_class, passenger_adults, passenger_children, passenger_infants, passport_number, passport_expiration, country_of_issue, cardholder_name, card_number, expiration_date, cvv, billing_address) VALUES ('$travelers_name', '$gender', '$birthdate', '$nationality', '$contact_number', '$departure_airport', '$destination_airport', '$departure_date', '$return_date', '$cabin_class', '$passenger_adults', '$passenger_children', '$passenger_infants', '$passport_number', '$passport_expiration', '$country_of_issue', '$cardholder_name', '$card_number', '$expiration_date', '$cvv', '$billing_address')";

    if(mysqli_query($con, $book_flight)) {

        $booking_id = mysqli_insert_id($con);
        $select_query = "SELECT * FROM flight_bookings WHERE id = $booking_id";
        $result = mysqli_query($con, $select_query);
        $booking_data = mysqli_fetch_assoc($result);

        session_start();
        $_SESSION['booking_data'] = $booking_data;

        header("Location: success.php");
        exit();

    } else {
        echo mysqli_error($con);
    }
}
