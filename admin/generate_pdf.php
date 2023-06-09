<?php
session_start();

include_once("../connection.php");
$con = connection();

require_once('../fpdf185/fpdf.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the booking details from the database based on the ID
    $get_booking = "SELECT * FROM flight_bookings WHERE id = $id";
    $result = $con->query($get_booking);

    if ($result && $result->num_rows > 0) {
        $booking_data = $result->fetch_assoc();

        // Store the booking data in the session
        $_SESSION['booking_data'] = $booking_data;

        // Create PDF object
        $pdf = new FPDF();
        $pdf->AddPage();

        // Set the font style
        $pdf->SetFont('Arial', 'B', 16);

        // Add a title
$pdf->Cell(0, 10, 'Flight Booking Details', 0, 1, 'C');

$pdf->Ln(5); // Add some space

// Set the font style for the table header
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(255, 165, 0); // Set header background color
$pdf->SetTextColor(0,0,0); // Set header text color

// Add the "Personal Information" section title
$pdf->Cell(0, 10, 'Personal Information', 1, 1, 'L', true);

// Set the font style for the section content
$pdf->SetFont('Arial', '', 12);

  // Add the personal information details
  $pdf->Cell(45, 10, 'Name', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['travelers_name'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Gender', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['gender'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Birthdate', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['birthdate'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Nationality', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['nationality'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Contact Number', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['contact_number'], 1, 1, 'L');

  

  // Add the "Flight Details" section title
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->SetFillColor(255, 165, 0); // Set header background color
  $pdf->Cell(0, 10, 'Flight Details', 1, 1, 'L', true);

  // Set the font style for the section content
  $pdf->SetFont('Arial', '', 12);

  // Create a table for the flight details
  $pdf->Cell(45, 10, 'Departure Airport', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['departure_airport'], 1, 0, 'L');
  $pdf->Cell(45, 10, 'Destination Airport', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['destination_airport'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Departure Date', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['departure_date'], 1, 0, 'L');
  $pdf->Cell(45, 10, 'Return Date', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['return_date'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Cabin Class', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['cabin_class'], 1, 0, 'L');
  $pdf->Cell(45, 10, 'Number of Adults', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['passenger_adults'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Number of Children', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['passenger_children'], 1, 0, 'L');
  $pdf->Cell(45, 10, 'Number of Infants', 1, 0, 'L');
  $pdf->Cell(50, 10, $booking_data['passenger_infants'], 1, 1, 'L');

  

  // Set the font style for the table header
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(255, 165, 0); // Set header background color

// Add the "Passport Information" section title
$pdf->Cell(0, 10, 'Passport Information', 1, 1, 'L', true);

// Set the font style for the section content
$pdf->SetFont('Arial', '', 12);

  // Add the passport information details
  $pdf->Cell(45, 10, 'Passport Number', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['passport_number'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Passport Expiration', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['passport_expiration'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'County of Issue', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['country_of_issue'], 1, 1, 'L');

  

  // Set the font style for the table header
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(255, 165, 0); // Set header background color

// Add the "Payment Information" section title
$pdf->Cell(0, 10, 'Payment Information', 1, 1, 'L', true);

// Set the font style for the section content
$pdf->SetFont('Arial', '', 12);

  // Add the payment information details
  $pdf->Cell(45, 10, 'Cardholder Name', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['cardholder_name'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Card Number', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['card_number'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Expiration Date', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['expiration_date'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'CVV', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['cvv'], 1, 1, 'L');

  $pdf->Cell(45, 10, 'Billing Address', 1, 0, 'L');
  $pdf->Cell(0, 10, $booking_data['billing_address'], 1, 1, 'L');

        // Output the PDF
        $filename = $booking_data['travelers_name'] .'Flight Booking Details.pdf';
        $pdf->Output($filename, 'F');

        // Set the Content-Disposition header to force download
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Set the Content-Type header to specify PDF content
        header('Content-Type: application/pdf');

        // Set the Content-Length header
        header('Content-Length: ' . filesize($filename));

        // Send the PDF file to the client
        readfile($filename);

        // Delete the PDF file from the server
        unlink($filename);
        exit();
    }
} else {
    echo 'Booking ID not found.';
}
?>
