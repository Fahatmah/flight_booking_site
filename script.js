document.addEventListener('DOMContentLoaded', function () {
  // Get today's date
  var today = new Date().toISOString().split('T')[0]

  // Set the minimum value of the departure date field to today
  document.getElementById('departure_date').setAttribute('min', today)

  // Set the minimum value of the return date field to the selected departure date
  document
    .getElementById('departure_date')
    .addEventListener('change', function () {
      var selectedDepartureDate = this.value
      document
        .getElementById('return_date')
        .setAttribute('min', selectedDepartureDate)
    })
})
