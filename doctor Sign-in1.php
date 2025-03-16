<html>
    <head>
        <title>Care Compass Hospital</title>
        <!--css-->
        <link rel="stylesheet" href="doctor sign-in.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <body>
      <form name="registration" action="doctor sign-in.php" method="post" onsubmit="return formValidation()">
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
          <i class="fa fa-ambulance" ></i>
            <a class="navbar-brand" href="#banner">Care Compass Hospital</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="doctor login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#footer">Contact Us</a>
                  </li>
              </ul>
            </div>
          </nav>
    </section>
    <!--sign-in section-->
   <section id="sign-in">
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                
                 <div class="col-md-10" style="align-content: center;padding-left: 10rem;">
                 <form >
                  <div class="sign">
                     <h3><i class="fa fa-sign-in"></i>Doctor's Registration</h3>
              <div class="input-row">
                <div class="input-group">
                  <label>Name</label>
                  <input type="text" placeholder="Full Name" name="dname" id="name">
                </div>
                <div class="input-group">
                  <label>Phone</label>
                  <input type="text" placeholder="+94" name="dnumber" id="phonenumber">
                </div>
                <div class="input-group">
                  <label>Email</label>
                  <input type="email" placeholder="@gmail.com" name="demail" id="email">
                </div>
                <div class="input-group">
                  <label>Specialization</label>
                  <input type="text" placeholder="Enter your Specialization" name="dspec" id="spec">
                </div>
                <div class="input-group">
                  <label>Hospital Name</label>
                  <input type="text" placeholder="Enter Hospital Name"name="hname" id="hosp">
                </div>         
                <div class="input-group">
                  <label>Create Password</label>
                  <input type="password" placeholder="Enter password" name="dpass" id="password">
                </div>
              </div>
              <button type="submit" >Register</button>
            </div>
            </div> 
            </div>
          </form>
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
            <p><i class="fa fa-map-marker"></i>Care Compass Hospitals, Galle Road, Colombo 04</p>
            <p><i class="fa fa-phone"></i>011-255-4561</p>
            <p><i class="fa fa-envelope-o"></i>carecompass@gmail.com</p>
          </div>

        </div>
          <hr>
          <p class="copyright"><i class="fa fa-copyright"></i>2024 Care Compass Hospital. All Rights Reserved.</p>
      </div>
    </section>
  <!------smooth scroll--> 
  <script>
    // Select all input elements for varification
const name = document.getElementById("name");
const email = document.getElementById("email");
const password = document.getElementById("password");
const phonenumber = document.getElementById("phonenumber");
const spec = document.getElementById("spec");
const hosp = document.getElementById("hosp");

// function for form varification
function formValidation() {
  
  // checking name length
  if (name.value.length < 5 || name.value.length > 20) {
    alert("Name length should be more than 5 and less than 21");
    name.focus();
    return false;
  }

  // checking phone number
  else if (!phonenumber.value.match(/^[1-9][0-9]{9}$/)) {
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
  else if (name.value.length < 5 || name.value.length > 20) {
    alert("Please enter your specialization");
    return false;
  }
  // checking Hospital
  else if (name.value.length < 5 || name.value.length > 20) {
    alert("Enter your Hospital Name");
    hosp.focus();
    return false;
  }
   // checking password
 else if (!password.value.match(/^.{5,15}$/)) {
    alert("Password length must be between 5-15 characters!");
    password.focus();
    return false;
  }
  return true;
}
  </script> 
    <script src="smooth-scroll.min.js"></script> 
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    </form>
</body>
</html>