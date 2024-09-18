<?php include "session_check.php"; ?>
<head>
   <link rel="stylesheet" href="booknow.css">

</head>

<body>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">




    <link rel="stylesheet" href="../style.css" />
    <div>
      <link href="./navbar.css" rel="stylesheet" />
      <header class="navbar-container">
        <header data-thq="thq-navbar" class="navbar-navbar-interactive">
          <img
            alt="Event Agency Logo"
            src="https://i.postimg.cc/Bnq1ShFs/logo.jpg"crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w5MTMyMXwwfDF8c2VhcmNofDMzfHxiYWxsb258ZW58MHx8fHwxNzIyNjc5ODUzfDA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080"
            class="navbar-image1"
          />
          <div data-thq="thq-navbar-nav" class="navbar-desktop-menu">
            <nav class="navbar-links">
              <span class="thq-link thq-body-small"><span> <a href="index.html">Home</a></span>
            </span>
            <span class="thq-link thq-body-small">
              <span> <a href="pricing.html">Packages</a></span>
            </span>
            <span class="thq-link thq-body-small">
              <span> <a href="gallery.html">Gallery</a></span>
            </span>
            <span class="thq-link thq-body-small">
              <span> <a href="contact.html">Contact</a></span>
            </span>
            <span class="thq-link thq-body-small">
              <span> <a href="testimonial.html">Review</a></span>
            </span>
            </nav>
           
          </div>
          <div data-thq="thq-burger-menu" class="navbar-burger-menu">
            <svg viewBox="0 0 1024 1024" class="navbar-icon">
              <path
                d="M128 554.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 298.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667zM128 810.667h768c23.552 0 42.667-19.115 42.667-42.667s-19.115-42.667-42.667-42.667h-768c-23.552 0-42.667 19.115-42.667 42.667s19.115 42.667 42.667 42.667z"
              ></path>
            </svg>
          </div>
          <div data-thq="thq-mobile-menu" class="navbar-mobile-menu">
            <div class="navbar-nav">
              <div class="navbar-top">
                <img
                  alt="Event Agency Logo"
                  src="https://images.unsplash.com/photo-1708368429776-21c4fde7a6f0?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w5MTMyMXwwfDF8c2VhcmNofDMzfHxiYWxsb258ZW58MHx8fHwxNzIyNjc5ODUzfDA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080"
                  class="navbar-logo"
                />
                <div data-thq="thq-close-menu" class="navbar-close-menu">
                  <svg viewBox="0 0 1024 1024" class="navbar-icon2">
                    <path
                      d="M810 274l-238 238 238 238-60 60-238-238-238 238-60-60 238-238-238-238 60-60 238 238 238-238z"
                    ></path>
                  </svg>
                </div>
              </div>
              <nav class="navbar-links1">
                <span class="thq-link thq-body-small"><span>Home</span></span>
                <span class="thq-link thq-body-small">
                  <span>Services</span>
                </span>
                <span class="thq-link thq-body-small">
                  <span>Gallery</span>
                </span>
                <span class="thq-link thq-body-small">
                  <span>Contact</span>
                </span>
                <span class="thq-link thq-body-small"><span>Link5</span></span>
              </nav>
            </div>
            <div class="navbar-buttons1">
              <button class="thq-button-filled">Login</button>
              <!-- <button class="thq-button-outline">Register</button> -->
            </div>
          </div>
        </header>
      </header>
    </div>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
    
    <!-- Form -->
<div class="form-container">
  <form class="form" action="BookEvent.php" method="post">
      <center><h1>BOOK NOW !!</h1></center>
      <div class="flex">
          <label>
              <span>Name</span>
              <input class="input" type="text" placeholder="Enter your name" name="firstname" required>
          </label>

          <label>
              <span>Contact Number</span>
              <input class="input" type="number" placeholder="Contact Number" name="contactnumber" required>
          </label>
      </div>  

      <label>
          <span>Event Type</span>
          <select class="input" name="eventname" required>
              <option value="">--Select Event Type--</option>
              <option value="birthday_party">Birthday Party</option>
              <option value="baby_shower">Baby Shower</option>
              <option value="reception">Reception</option>
              <option value="award_ceremony">Award Ceremony</option>
              <option value="annual_program">Annual Program</option>
          </select>
      </label>

      <label>
          <span>Venue</span>
          <select class="input" name="venue" required>
              <option value="">--Select Venue--</option>
              <option value="party_plot">Party Plot</option>
              <option value="banquet_hall">Banquet Hall</option>
          </select>
      </label>

      <label>
          <span>Event Date</span>
          <input class="input" type="date" required>
      </label>

      <label>
          <span>Event Time</span>
          <input class="input" type="time" required>
      </label>

      <label>
          <span>Select Package</span>
          <select class="input" required>
              <option value="">--Select Package--</option>
              <option value="silver">Basic Plan</option>
              <option value="gold">Standard Plan</option>
              <option value="platinum">Premium Plan</option>
          </select>
      </label>

      <label> Payment Method </label><br><br>
      <div class="flex radio-group">
          <label class="radio-group">
          <label > Credit Card</label>
              <input type="radio" id="credit_card" name="payment_method" value="credit_card" required>
             

          </label>

          <label class="radio-group">
              <label>Debit Card</label>
              <input type="radio" id="paypal" name="payment_method" value="paypal" required>
              
          </label>

          <label class="radio-group">
              <label>Gpay</label>
              <input type="radio" id="gpay" name="payment_method" value="gpay" required>
              
          </label>
      </div>

      <button class="submit">Submit</button>
  </form>
</div>
</body>
