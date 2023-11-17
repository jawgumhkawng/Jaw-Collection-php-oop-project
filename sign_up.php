<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing - Register Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->

    <!-- Header -->


    <!-- Page Content -->



    
    <div class="send-message mt-0 mb-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 class="text-center mt-3">Register <span class="text-danger"> Page</span></h2>
            </div>
          </div>

          <div class="col-md-6">
            <ul class="accordion">
            <div class="right-image ">
              <img src="assets/images/feature-image.jpg" class="shadow" style="border-radius:10px; border:1px solid gray" width="100%" alt="">
            </div>
              <li>
                  <a>Enter To Register</a>
                  <div class="content">
                      <p>Lorem ipsum dolor sit onsectetur similiqu consectetur<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit.Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>
              </li>
            </ul>
          </div>
          <hr class="d-none hr">
          <div class="col-md-6 ">
                    <?php if(isset($_GET['error'])) : ?>
                        <div class="alert alert-warning">
                            <h4>Cannot create account.Please try again!</h4>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_GET['Regerror'])) : ?>
                        <div class="alert alert-warning">
                            <h4>image must be png!!</h4>
                        </div>
                    <?php endif ?>
            <div class="contact-form">
              <form id="contact" action="./_actions/create_user.php" method="post" enctype="multipart/form-data">
                <div class="row">
                 
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="photo" type="file"  id="subject" placeholder="ohoto" required>
                    </fieldset>
                  </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="subject" placeholder="name" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" class="form-control" id="subject" placeholder="password" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="phone" type="tel" class="form-control" id="subject" placeholder="phone" required>
                    </fieldset>
                  </div>
                 
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="address" type="text" class="form-control" id="subject" placeholder="address" required>
                    </fieldset>
                  </div>
                  
                  <div class="col-lg-12 mt-2 mb-4">
                    <fieldset>
                        <p class="d-inline ">Have an account?<a href="sign_in.php">Login Here</a></p>
                      <button type="submit" id="form-submit" class="filled-button float-right shadow">Sgin Up</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
       
        </div>
      </div>
    </div>

    <!-- <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Happy Customers</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel">
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="1">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="2">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="3">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="4">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="5">
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="6">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    
    <!-- <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer> -->


    <!-- Bootstrap core JavaScript -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
