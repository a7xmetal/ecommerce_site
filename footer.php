<!-- <footer id="htc__footer">
            
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script> -->


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
      <link href='contact.css' rel='stylesheet' type='text/css'>
        
    </head>
    
    <body>


    <!contact section starts>
	



  <?php
  //check is submit post button press or not
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $msg = $_POST['msg'];

      // store values to database
      $csql = "INSERT INTO `contact_us` (`name`, `email`, `comment`, `date`) 
          VALUES ('$name', '$email', '$msg', CURRENT_TIMESTAMP);";
      mysqli_query($con, $csql);
  }
  ?>

<section class = "contact">
  <div class = "container text-center">
    
          <h1 class="text-center text-white">How May We Help You?</h1>
          <div class="">
              <div class="">
                  <div>
                      <h5><i  ></i  >Location</h5>
                      <p class="text-white">Lalitpur</p>
                  </div>
                  <div class="text-white">
                      <h5><i class="f"></i>Phone</h5>
                      <p class="text-white">9860234234</p>
                  </div>
                  <div class="text-white">
                      <h5><i class=""></i>Email</h5>
                      <p class="text-white">bmygmail.com</p>
                  </div>
              </div>
              <div class="">
                  <form method="post">
                      <div class="row" style="margin-bottom:10px">
                          <input type="text" placeholder="Full Name" name="name" id="" required>
                      </div>
                      <div class="row">
                          <input type="email" placeholder="Email" name="email" id="" style="margin-bottom:10px"required>
                      </div>
                      <div class="row">
                          <textarea placeholder="Message" name="msg" id="" cols="30" rows="5"></textarea>
                      </div>
                      <button class="button-primary" style="padding:10px 20px";>Submit</button >
                  </form>
           

  <!-- End of Contact Us -->
    <section class = "footer">
		<h1 id="Contact" class="text-center">
			Contact Us
		</h1>
		<div class = "container text-center">
			All Rights Reserved. Design By :<a href="#">Niraz</a>
		</div>
	</section>
    </body>
    </html>