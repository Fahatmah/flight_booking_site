<?php
include_once("connection.php");
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

  <title>Booking Reservation for Travel and Tours</title>

  <link rel="stylesheet" href="style.css" />
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html" id="logo"><span>T</span>ravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span><i class="fa-solid fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#book">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#packages">Packages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallary">Gallary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
        </ul>
        <form class="d-flex">
          <input required class="form-control me-2" type="text" placeholder="Search" />
          <button class="btn btn-primary" type="button">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Home Section Start -->
  <div class="home">
    <div class="content">
      <h5>Welcome To World</h5>
      <h1>Visit <span class="changecontent"></span></h1>
      <p>Book Now</p>
      <a href="#book">Book Place</a>
    </div>
  </div>
  <!-- Home Section End -->

  <!-- Section Book Start -->
  <section class="book" id="book">
    <div class="container">
      <div class="main-text">
        <h1><span>B</span>ook</h1>
      </div>

      <!-- <div class="row"> -->
      <div class="col-md-12 py-3 py-md-0">
        <form action="book_flight.php" method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="personal-info form-control p-4">
                <h3>Personal Information</h3>
                <!-- Traveler's Full Name -->
                <div class="field">
                  <label for="travelers_name">Full Name <span class="required">*</span></label>
                  <input required type="text" name="travelers_name" id="travelers_name" class="form-control" />
                </div>
                <br />
                <!-- Gender -->
                <div class="field">
                  <label for="gender">Gender <span class="required">*</span></label>
                  <select name="gender" id="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <br />
                <!-- Birthdate -->
                <div class="field">
                  <label for="birthdate">Birthday <span class="required">*</span></label>
                  <input required type="date" name="birthdate" id="birthdate" class="form-control" />
                </div>
                <br />
                <!-- Nationality -->
                <div class="field">
                  <label for="nationality">Nationality <span class="required">*</span></label>
                  <input required type="text" name="nationality" id="nationality" class="form-control" />
                </div>
                <br />
                <!-- Contact -->
                <div class="field">
                  <label for="contact_number">Contact Number <span class="required">*</span></label>
                  <input required type="tel" name="contact_number" id="contact_number" class="form-control" />
                </div>
                <br />
              </div>
            </div>
            <br />
            <div class="col-sm-6">
              <div class="flight-details form-control p-4">
                <h3>Flight Details</h3>
                <!-- Departure Airport -->
                <div class="field">
                  <label for="departure_airport">Departure Airport <span class="required">*</span></label>
                  <select id="departure_airport" name="departure_airport" class="form-control">
                    <option value="MNL">
                      Manila Ninoy Aquino International Airport (MNL)
                    </option>
                    <option value="CEB">
                      Mactan-Cebu International Airport (CEB)
                    </option>
                    <option value="DVO">
                      Francisco Bangoy International Airport (DVO)
                    </option>
                    <option value="CRK">
                      Clark International Airport (CRK)
                    </option>
                    <option value="PPS">
                      Puerto Princesa International Airport (PPS)
                    </option>
                  </select>
                </div>
                <br />
                <!-- Destination Airport -->
                <div class="field">
                  <label for="destination_airport">Destination Airport <span class="required">*</span></label>
                  <select id="destination_airport" name="destination_airport" class="form-control">
                    <optgroup label="France">
                      <option value="CDG">
                        Charles de Gaulle Airport (CDG)
                      </option>
                      <option value="ORY">Paris Orly Airport (ORY)</option>
                    </optgroup>
                    <optgroup label="Spain">
                      <option value="MAD">
                        Madrid Barajas Airport (MAD)
                      </option>
                      <option value="BCN">
                        Barcelona El Prat Airport (BCN)
                      </option>
                    </optgroup>
                    <optgroup label="United States">
                      <option value="JFK">
                        John F. Kennedy International Airport (JFK)
                      </option>
                      <option value="LAX">
                        Los Angeles International Airport (LAX)
                      </option>
                    </optgroup>
                    <optgroup label="China">
                      <option value="PEK">
                        Beijing Capital International Airport (PEK)
                      </option>
                      <option value="PVG">
                        Shanghai Pudong International Airport (PVG)
                      </option>
                    </optgroup>
                    <optgroup label="India">
                      <option value="DEL">
                        Indira Gandhi International Airport (DEL)
                      </option>
                      <option value="BOM">
                        Chhatrapati Shivaji Maharaj International Airport
                        (BOM)
                      </option>
                    </optgroup>
                    <optgroup label="Pakistan">
                      <option value="ISB">
                        Islamabad International Airport (ISB)
                      </option>
                      <option value="LHE">
                        Allama Iqbal International Airport (LHE)
                      </option>
                    </optgroup>
                    <optgroup label="Italy">
                      <option value="FCO">
                        Leonardo da Vinci International Airport (FCO)
                      </option>
                      <option value="MXP">
                        Milan Malpensa Airport (MXP)
                      </option>
                    </optgroup>
                    <optgroup label="Turkey">
                      <option value="IST">
                        Istanbul Ataturk Airport (IST)
                      </option>
                      <option value="SAW">
                        Sabiha Gokcen International Airport (SAW)
                      </option>
                    </optgroup>
                    <optgroup label="Mexico">
                      <option value="MEX">
                        Mexico City International Airport (MEX)
                      </option>
                      <option value="CUN">
                        Cancun International Airport (CUN)
                      </option>
                    </optgroup>
                    <optgroup label="Germany">
                      <option value="FRA">Frankfurt Airport (FRA)</option>
                      <option value="MUC">Munich Airport (MUC)</option>
                    </optgroup>
                    <optgroup label="United Kingdom">
                      <option value="LHR">
                        London Heathrow Airport (LHR)
                      </option>
                      <option value="LGW">
                        London Gatwick Airport (LGW)
                      </option>
                    </optgroup>
                  </select>
                </div>
                <br />
                <!-- Departure Date -->
                <div class="field departure-date">
                  <label for="departure_date">Departure Date <span class="required">*</span></label>
                  <input required type="date" name="departure_date" id="departure_date" class="form-control" />
                </div>
                <br />
                <!-- Return Date -->
                <div class="field return-date">
                  <label for="return_date">Return Date <span class="required">*</span></label>
                  <input required type="date" name="return_date" id="return_date" class="form-control" />
                </div>
                <br />
                <!-- Preferred Cabin Class -->
                <div class="field preffered-cabin-class">
                  <label for="cabin_class">Preferred Cabin Class: <span class="required">*</span></label>
                  <select id="cabin_class" name="cabin_class" class="form-control">
                    <option value="economy">Economy</option>
                    <option value="business">Business</option>
                    <option value="first-class">First Class</option>
                  </select>
                </div>
                <br />
                <!-- Number of Passengers -->
                <div class="field adult-passengers">
                  <label for="passenger_adults">Number of Adults: <span class="required">*</span></label>
                  <input required type="number" id="passenger_adults" name="passenger_adults" min="0" value="1"
                    class="form-control" />
                </div>
                <br />
                <!-- Number of Children -->
                <div class="field children-passengers">
                  <label for="passenger_children">Number of Children: <span class="required">*</span></label>
                  <input required type="number" id="passenger_children" name="passenger_children" min="0" value="0"
                    class="form-control" />
                </div>
                <br />
                <!-- Number of Infants -->
                <div class="field infants-passengers">
                  <label for="passenger_infants">Number of Infants: <span class="required">*</span></label>
                  <input required type="number" id="passenger_infants" name="passenger_infants" min="0" value="0"
                    class="form-control" />
                </div>
                <br />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="passport-info form-control p-4">
                <h3>Passport Info</h3>
                <div class="field">
                  <label for="passport_number">Passport Number: <span class="required">*</span></label>
                  <input required type="text" id="passport_number" name="passport_number" class="form-control" />
                </div>
                <br />
                <div class="field">
                  <label for="passport_expiration">Passport Expiration Date: <span class="required">*</span></label>
                  <input required type="date" id="passport_expiration" name="passport_expiration" class="form-control" />
                </div>
                <br />
                <div class="field">
                  <label for="country_of_issue">Country of Issue: <span class="required">*</span></label>
                  <input required type="text" id="country_of_issue" name="country_of_issue" class="form-control" />
                </div>
                <br />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="payment-info form-control p-4">
                <h3>Payment Info</h3>
                <div class="field">
                  <label for="cardholder_name">Cardholder Name: <span class="required">*</span></label>
                  <input required type="text" id="cardholder_name" name="cardholder_name" class="form-control" />
                </div>
                <br />
                <div class="field">
                  <label for="card_number">Card Number: <span class="required">*</span></label>
                  <input required type="text" id="card_number" name="card_number" class="form-control" />
                </div>
                <br />
                <div class="field">
                  <label for="expiration_date">Expiration Date: <span class="required">*</span></label>
                  <input required type="text" id="expiration_date" name="expiration_date" class="form-control" />
                </div>
                <br />
                <div class="field">
                  <label for="cvv">CVV: <span class="required">*</span></label>
                  <input required type="text" id="cvv" name="cvv" class="form-control" />
                </div>
                <br />
                <div class="field">
                  <label for="billing_address">Billing Address: <span class="required">*</span></label>
                  <textarea id="billing_address" name="billing_address" class="form-control"></textarea>
                </div>
                <br />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
              <button type="submit" id="book_flight" name="book_flight" class="submit btn btn-primary">Book Now</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Section Book End -->

  <!-- Section Packages Start -->
  <section class="packages" id="packages">
    <div class="container">
      <div class="main-txt">
        <h1><span>P</span>ackages</h1>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/uk.png" alt="" />
            <div class="card-body">
              <h3>United Kingdom</h3>
              <p>Hello, it's really a pain to be followed. So, pains!</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>$500</strong></h6>
              <a href="#book">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/france.png" alt="" />
            <div class="card-body">
              <h3>France</h3>
              <p>Hello, it's really a pain to be followed. So, pains!</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>$500</strong></h6>
              <a href="#book">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/pakistan.png" alt="" />
            <div class="card-body">
              <h3>Pakistan</h3>
              <p>Hello, it's really a pain to be followed. So, pains!</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>$500</strong></h6>
              <a href="#book">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/italy.png" alt="" />
            <div class="card-body">
              <h3>Italy</h3>
              <p>Hello, it's really a pain to be followed. So, pains!</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>$100</strong></h6>
              <a href="#book">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/india.png" alt="" />
            <div class="card-body">
              <h3>India</h3>
              <p>Hello, it's really a pain to be followed. So, pains!</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>$100</strong></h6>
              <a href="#book">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/us.png" alt="" />
            <div class="card-body">
              <h3>United States</h3>
              <p>Hello, it's really a pain to be followed. So, pains!</p>
              <div class="star">
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
                <i class="fa-solid fa-star checked"></i>
              </div>
              <h6>Price: <strong>$100</strong></h6>
              <a href="#book">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="services" id="services">
    <div class="container">
      <div class="main-txt">
        <h1><span>S</span>ervices</h1>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <i class="fas fa-hotel"></i>
            <div class="card-body">
              <h3>Affordable Hotel</h3>
              <p>The company itself is a very successful company.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <i class="fas fa-utensils"></i>
            <div class="card-body">
              <h3>Food & Drinks</h3>
              <p>The company itself is a very successful company.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <i class="fas fa-bullhorn"></i>
            <div class="card-body">
              <h3>Safty Guide</h3>
              <p>The company itself is a very successful company.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <i class="fas fa-globe-asia"></i>
            <div class="card-body">
              <h3>Around The World</h3>
              <p>The company itself is a very successful company.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <i class="fas fa-plane"></i>
            <div class="card-body">
              <h3>Fastest Travel</h3>
              <p>The company itself is a very successful company.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <i class="fas fa-hiking"></i>
            <div class="card-body">
              <h3>Adventures</h3>
              <p>The company itself is a very successful company.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="gallary" id="gallary">
    <div class="container">
      <div class="main-txt">
        <h1><span>G</span>allary</h1>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g1.png" alt="" height="230px" />
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g2.png" alt="" height="230px" />
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g3.png" alt="" height="230px" />
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g4.png" alt="" height="230px" />
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g5.png" alt="" height="230px" />
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="./images/g6.png" alt="" height="230px" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about" id="about">
    <div class="container">
      <div class="main-txt">
        <h1>About <span>Us</span></h1>
      </div>

      <div class="row" style="margin-top: 50px">
        <div class="col-md-6 py-3 py-md-0">
          <div class="card">
            <img src="./images/about-img.png" alt="" />
          </div>
        </div>

        <div class="col-md-6 py-3 py-md-0">
          <h2>How Travel Agency Work</h2>
          <p>
            The company itself is a very successful company. They provide for the
            suffering of pain, but never for the sake of being born with blissful
            pleasure, they often forsake the practice, which is easier than you
            can see, but the least of these rights. For those who praise the
            opening of life, there are no other harsher things, and nothing will
            happen to bear them.
          </p>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <h1><span>T</span>ravel</h1>
    <p>The company itself is a very successful company.</p>
    <div class="social-links">
      <i class="fa-brands fa-twitter"> </i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-brands fa-instagram"></i>
    </div>
    <div class="copyright">
      <p>&copy;Flight Booking Travel and Tours</p>
    </div>
  </footer>


  <script src="script.js"></script>
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