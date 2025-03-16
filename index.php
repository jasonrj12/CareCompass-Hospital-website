<html>
    <head>
        <title> Care Compass Hospitals</title>
        <!--css-->
        <link rel="stylesheet" href="home.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <body>
      <form action="appointment.php" method="POST">
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
          <i class="fa fa-ambulance" aria-hidden="true"></i>
            <a class="navbar-brand" href="#banner">CARE COMPASS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#banner">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#Appointment">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#protect">Services</a>
                  </li>
	<li class="nav-item">
                    <a class="nav-link" href="Feedback.php">Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#footer">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
              </ul>
            </div>
          </nav>
    </section>
    <!------Banner section-->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="promo-title">WELCOME TO <br> CARE COMPASS HOSPITALS</p>
                    <P class="promo-text">WE ARE HERE TO HELP YOU AND YOUR FAMILY WITH MEDICAL CONSULTANCY</P>
                    <a href="sigin.php" class="btn">Sign-up</a>
                    <a href="login.php" class="btn">Log-in</a>
                    <a href="admin2.php" class="btn">Admin</a>
 <a href="general report.php" class="btn">View-Report</a>
                 </div>
                 <div class="col-md-6 text center">
                   <img src="images/home2.png" class="fluid" >
                 </div>
            </div>
        </div>
        <img src="images/wave1.png" class="bottom">
    </section>
   <!----socialmedia section-->
    <section class="icons" id="pro">
    <div class="box-container">
        <div class="box">
             <i class="fas fa-user-md"></i>
            <h3>140+</h3>
        <p>doctors at work</p>
        </div>
        <div class="box">
           <i class="fas fa-users"></i>
           <h3>1040+</h3>
        <p>satisfied patients</p>
        </div>
        <div class="box">
               <i class="fas fa-procedures"></i>
            <h3>500+</h3>
        <p>bed facility</p>
        </div>
         <div class="box">
               <i class="fas fa-hospital"></i>
            <h3>80+</h3>
        <p>available hospitals</p>
        </div>

    </div>
</section>
<section>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="d1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="d2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="d4.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </section>
    <!--Appointment-->
    <section id="Appointment">
        <div class="container">
            <div class="row">
                 <div class="col-md-10" style="align-content: center;padding-left: 15rem;">
                 <form >
                  <div class="sign">
                     <h3>Book an Appointment</h3>
              <div class="input-row">
                <div class="input-group">
                  <label>Name</label>
                  <input type="text" placeholder="Enter your Name" name="aname" id="name">
                </div>
                <div class="input-group">
                  <label>Date of Birth</label>
                  <input type="date" placeholder="dd/mm/yy" name="adob" id="dob">
                </div>
                <div class="input-group">
                  <label>Phone</label>
                  <input type="text" placeholder="+94" name="anumber" id="number">
                </div>         
                <div class="input-group">
                  <label>Email</label>
                  <input type="email" placeholder="@gmail.com" name="aemail" id="email">
                </div>
                <div class="input-group">
                  <label>Symtoms</label>
                  <input type="text" placeholder="Enter your symptoms" name="asymtoms"  id="asymtoms" "style="border: 1px solid;height:5rem;">
                </div>
              </div>
              <button type="submit">Book Now</button>
            </div>
            </div> 

             </div>
    </section>
<section class="protect" id="protect">
    <h1 class="heading"><span>Our Services</span> </h1>
    <div class="box-container">
        <div class="box">
             <i class="fas fa-notes-medical"></i>
            <h3>free checkups</h3>
            <p>You can get  you full body checkups without have to pay from your pocket.</p>
            <a href="#" class="btn"><span>learn more</span></a>
        </div>
        <div class="box">
           <i class="fas fa-ambulance"></i>
            <h3>24/7 ambulance</h3>
             <p>Always at your service and available 24X7.</p>
            <a href="#" class="btn"><span>learn more</span></a>

        </div>
        <div class="box">
               <i class="fas fa-user-md"></i>
            <h3>expert doctors</h3>
             <p>doctors specialized in many types of diseases and treatments. </p>
            <a href="#" class="btn"><span>learn more</span></a>
        </div>
        <div class="box">
             <i class="fas fa-pills"></i>
            <h3>medicines</h3> 
             <p>Get a variety of medicines and get it at door steps.</p> 
           <a href="#" class="btn"><span>learn more</span></a>
        </div>
        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>bed facility</h3>
             <p>Get to know about beds available in hospitals near you. </p>
            <a href="#" class="btn"><span>learn more</span></a>
        </div>
        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>total care</h3>
           <p>We take your total care and help you become healthy.</p>
           <a href="#" class="btn"><span>learn more</span></a>
        </div>

    </div>
</section>
    <!--footer-->
    <section id="footer">
      <img src="images/wave2.png" class="bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-box">
            <p><i class="fa fa-ambulance"></i><b>CARE COMPASS HOSPITAL</b></p> 
            <p>Subscribe us to get more consultancy by doctors and to keep your health at it best.</p>
          </div>
          <div class="col-md-4 footer-box">
            <p><b>CONTACT US</b></p> 
            <p><i class="fa fa-map-marker"></i>Care Compass Hospitals,<br>Galle Road,Colombo-04</p>
            <p><i class="fa fa-phone"></i>011-255-4561</p>
            <p><i class="fa fa-envelope"></i>carecompass@gmail.com</p>
          </div>

        </div>
          <hr>
          <p class="copyright"><i class="fa fa-copyright"></i>2024 Care Compass Hospital. All Rights Reserved.</p>
      </div>
    </section>
  <script>
    // Select all input elements for varification
const name = document.getElementById("name");
const email = document.getElementById("email");
const number = document.getElementById("number");
const symtoms = document.getElementById("symtoms");


// function for form varification
function formValidation() {
  
  // checking name length
  if (name.value.length < 5 || name.value.length > 20) {
    alert("Name length should be more than 5 and less than 21");
    name.focus();
    return false;
  }

  // checking phone number
  else if (!number.value.match(/^[1-9][0-9]{9}$/)) {
    alert("Phone number must be 10 characters long number and first digit can't be 0!");
    phonenumber.focus();
    return false;
  }
  // checking email
  else if (!email.value.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/)){
    alert("Enter valid email");
    email.focus();
    return false;
  }
  // checking specialization
  else if (symtoms.value.length < 5 || name.value.length > 20) {
    alert("Please enter your symtoms");
   symtoms.focus();
    return false;
  }

  return true;
}
  </script> 

  <!------smooth scroll-->  
    <script src="smooth-scroll.min.js"></script> 
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    </form>
    </body>
</html>