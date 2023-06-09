<?php
include_once("../connection.php");
$con = connection();

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    if (isset($_GET['confirm'])) {
        // User confirmed deletion
        $deleteQuery = "DELETE FROM flight_bookings WHERE id = $bookingId";
        $result = mysqli_query($con, $deleteQuery);

        if ($result) {
            $message = "Booking deleted successfully.";
            $status = "success";
        } else {
            $message = "Error deleting booking: " . mysqli_error($con);
            $status = "error";
        }
    } else {
        // Show confirmation pop-up
        echo '
            <!DOCTYPE html>
            <html lang="en">

            <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">

              <!-- Bootstrap CSS -->
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
              <!-- Bootstrap JS -->
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

              <title>Delete Booking</title>
            </head>

            <body>
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <p>Are you sure you want to delete this booking?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="booking_details.php?id=' . $bookingId . '" class="btn btn-primary">Cancel</a>
                        <a href="delete_booking.php?id=' . $bookingId . '&confirm=1" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  var deleteConfirmationModal = new bootstrap.Modal(document.getElementById("deleteConfirmationModal"));
                  deleteConfirmationModal.show();
                </script>
            </body>
            </html>

    ';
        exit;
    }
} else {
    $message = "Invalid booking ID.";
    $status = "error";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <title>Delete Booking</title>

  <script>
    setTimeout(function() {
      window.location.href = "admin_dashboard.php";
    }, 1500);
  </script>
</head>

<body>
  <div class="modal fade border-radius-1" id="deleteResultModal" tabindex="-1" aria-labelledby="deleteResultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body">
          <div class="alert alert-<?php echo $status; ?>" role="alert">
            <?php echo $message; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var deleteResultModal = new bootstrap.Modal(document.getElementById('deleteResultModal'));
    deleteResultModal.show();
  </script>
</body>

</html>
