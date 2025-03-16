<html>
    <head>
        <title>Care Compass Hospital</title>
        <!--css-->
        <link rel="stylesheet" href="login.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://cdode.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <body>
      <form method="post" action="patient log-in.php">
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
                  <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Log-in</a>
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
           <div class="col-md-6" >
            <h3><i class="fa fa-sign-in"></i>Admin Sign-up</h3>
              <img src="admin2.jpg" class="fluid">
              <div class="col">
              <a href="admin signin.php" class="btn">Sign-up</a>
              </div>
            </div>
            <div class="col-md-6">
              <h3><i class="fa fa-sign-in"></i>Admin Log-in</h3>
              <img src="admin.avif" class="fluid" style="padding-left:6rem; width:25rem;">
              <div class="col">
                <a href="admin log-in.php" class="btn">Log-in</a>
                </div>
            </div>
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
    <script src="smooth-scroll.min.js"></script> 
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    </form>
</body>
</html>