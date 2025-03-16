<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Feedback.css">
    <title>FORMS</title>
</head>

<body>
    <!--sign-in section-->
    <section id="sign-in">
    <form action="fb.php" method="POST">
        <div class="container">
            <div class="row">
            
                 <div class="col-md-6 ">
                 <form >
                  <div class="sign">
                     <h3><i class="fa fa-sign-in"></i>Patient Feedback Form</h3>
              <div class="input-row">
                <div class="input-group">
                  <label>Name</label>
                  <input type="text" placeholder="Full Name" name="fname" id="f">
                </div>
                
                <div class="input-group">
                  <label>Email</label>
                  <input type="email" placeholder="@gmail.com" name="femail" id="e">
                </div>
                
                <div class="input-group">
                  <label>Age</label>
                  <input type="text" placeholder="eg:10 "name="fage" id="a">
                </div>         
            <div>
                <p class="question">1.How was your experience making an appointment ?</p>
                <input type="radio" name="ans1" value="1">Exceptional<br>
                <input type="radio" name="ans1" value="2">Satisfactory<br>
                <input type="radio" name="ans1" value="3">Adequate<br>
                <input type="radio" name="ans1" value="4">Unsatisfactory<br>
            </div>

            <div>
                <p class="question">2.How was your experience during online cosultation ?</p>
                <input type="radio" name="ans2" value="1">Exceptional<br>
                <input type="radio" name="ans2" value="2">Satisfactory<br>
                <input type="radio" name="ans2" value="3">Adequate<br>
                <input type="radio" name="ans2" value="4">Unsatisfactory<br>
            </div>

            <div>
                <p class="question">3.How was your experience with the admin ?</p>
                <input type="radio" name="ans3" value="1">Exceptional<br>
                <input type="radio" name="ans3" value="2">Satisfactory<br>
                <input type="radio" name="ans3" value="3">Adequate<br>
                <input type="radio" name="ans3" value="4">Unsatisfactory<br>
            </div>

            <div>
                <p class="question">4.How was your experience with doctor ?</p>
                <input type="radio" name="ans4" value="1">Exceptional<br>
                <input type="radio" name="ans4" value="2">Satisfactory<br>
                <input type="radio" name="ans4" value="3">Adequate<br>
                <input type="radio" name="ans4" value="4">Unsatisfactory<br>
            </div>

            <label for="feedback" class="comment">How we can improve: </label>
            <div>
                <textarea name="fd" id="feed"></textarea>
            </div>

            <div class="btn">
                <input type="submit" Value="Submit" class="btn">
                <input type="reset" value="Reset" class="btn">
                <!-- Back button -->
                <button type="button" onclick="window.history.back();" class="btn">Back</button>
            </div>
        </div>
        </section>
        <!------smooth scroll-->  
    <script src="smooth-scroll.min.js"></script> 
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
     </div>
</div>
    </form>
</body>

</html>
