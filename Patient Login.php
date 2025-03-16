<html>
    <head>
        <title>Care Compass Hospital</title>
        <!--css-->
        <link rel="stylesheet" href="patient log-in.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <body>
      <form name="registration" method="post" action="patient log-in.php"  onsubmit="return formValidation()">
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
          <i class="fa fa-ambulance"></i>
            <a class="navbar-brand" href="#banner">Care Compass</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="patient sign-in.php">Sign-up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#footer">Contact Us</a>
                  </li>
              </ul>
            </div>
          </nav>
    </section>
    <!--log-in section-->
    <section id="sign-in">
        <div class="container">
        <div class="row">
            <div class="col-md-8" style="align-content: center;padding-left: 22rem;">
              <h3><i class="fa fa-sign-in"></i>Patient Log-in</h3>
                <form>
                    <div  class="name">	
                        <label >Username</label>
                        <input type="text" placeholder="Enter Username"name="pname" id="name">
                        <label >Password</label>
                        <input type="password" placeholder="Enter Password" name="ppass" id="password">
                        <button type="submit" name="login">LOGIN </button>
                        </div>
                        <div class="forgot" >
                      <a href="forgotpassword.php">Forgot password?</a>
                        </div>
                </form>
            </div>
           
          
     </section>
      <!--footer-->
    <section id="footer">
      <img src="images/wave2.png" class="bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-box">
            <p><i class="fa fa-ambulance"></i><b>CARE COMPASS</b></p> 
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
const password = document.getElementById("password");
// function for form varification
function formValidation() {
  
  // checking name length
  if (name.value.length < 5|| name.value.length > 20) {
    alert("Name and email length should be more than 5 and less than 21");
    name.focus();
    return false;
  }
  // checking password
  if (!password.value.match(/^.{5,15}$/)) {
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