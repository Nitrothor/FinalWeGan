<?php
    session_start();
    error_reporting(0);
    include("config.php"); 

    $Err = "";
        $Invalid = "";
    if(isset($_POST['submit']))
    {
        
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $password = $_POST['password'];
        $likes = "";
        $dislikes = "";
        $conpassword = $_POST['confirm-password'];

        $likes = implode(",", $_POST['check_list']);

        $dislikes = implode(",", $_POST['check_list1']);

        
        if($password != $conpassword){
            $Err = "Your Confirm Password does'n match Password.";
        }
        else {

            $sql1 = "SELECT * FROM logintbl WHERE email = '$username'";

            $result = $con->query($sql1);

            if ($result->num_rows > 0) {
                // output data of each row
                    
                        $Invalid = "Email Id alread Exist.!!";
            }else {
                        $sql = "INSERT INTO logintbl (user_name,email,password,fullname,likes,dislikes) VALUES ('$username','$email','$password','$fullname','$likes','$dislikes')";
                        if(mysqli_query($con, $sql))
                        {
                            $Invalid = "Registration Successful. Please Sign in ..";
                            header("Location:signin.php");
                        }else{
                            $Invalid = "Error " . $con->error;
                        }
                    }

            
            $con->close();
        }
    }

    if (isset($_POST['signin'])) {
        $username = $_POST['user_name'];
        $password = $_POST['user_password'];

        $sql1 = "SELECT * FROM logintbl WHERE email = '$username' and password = '$password' ";
        $result = $con->query($sql1);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_SESSION['likes'] = $row["likes"];
            $_SESSION['dislikes'] = $row["dislikes"];
          }
            $_SESSION['email'] = $username;
            $_SESSION['password'] = $password;
            header("Location:index.php");
        }else {
            $Invalid = "Login Credentials does'n match .";
        }
        $con->close();
    }
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>wegan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

    <?php include('include/header.php');?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Sign In</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container"> 
      <div class="row" id="signin">
        <div class="col-12">
          <h2 class="contact-title text-center">Sign In</h2>
        </div>
        <div class="col-lg-12">
          <form class="form-contact contact_form" method="post" >
            <span class="text-center" style="color: #FF0000"><?php echo $Invalid; ?></span>
            <div class="row">
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="user_name" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'" placeholder = 'User Name' required>
                </div></center>
              </div>
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="user_password" id="email" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" placeholder = 'Password' required>
                </div></center>
              </div>
            </div>
            <div class="form-group mt-3">
              <center><button type="submit" class="button button-contactForm btn_4 boxed-btn" name="signin">Sign In</button>
              </center>
            </div>
            <div class="form-group mt-3">
              <center><h2 class="contact-title text-center" id="notamember"><a href="#" >Not a Member ?</a> </h2></center>
            </div>
          </form>
        </div>
      </div>


      <div class="row" id="signup" style="display: none;">
        <div class="col-12">
          <h2 class="contact-title text-center">Sign Up</h2>
        </div>
        <div class="col-lg-12">
          <form class="form-contact contact_form" method="post">
            <span class="text-center" style="color: #FF0000"><?php echo $Invalid; ?></span>
            <div class="row">
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="username" id="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'" placeholder = 'User Name' required>
                </div></center>
              </div>
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="fullname" id="fullname" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" placeholder = 'Full Name' required>
                </div></center>
              </div>
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="emailid" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Id'" placeholder = 'Email Id' required>
                </div></center>
              </div>
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" placeholder = 'Password' required>
                </div></center>
              </div>
              <div class="col-sm-12">
                <center><div class="form-group col-sm-6">
                  <input class="form-control" name="confirm-password" id="confirm-password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" placeholder = 'Confirm Password' required>
                </div></center>
              </div>
            </div>

              <div>
                <h1>Likes</h1>
                <div class="form-group">
                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="Carrot" name="check_list[]" value="Carrot">
                    <label class="mr-5" for="Carrot" style="font-size: 20px;">Carrot</label>
                  </div>

                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" id="Cabbage" name="check_list[]" style="font-size: 20px;" value="Cabbage">
                    <label for="Cabbage" style="font-size: 20px;">Cabbage</label>  
                  </div>

                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="spinach" name="check_list[]" value="spinach">
                    <label for="spinach" style="font-size: 20px;">spinach</label>
                  </div>

                  <div class="col-sm-2" style="display: inline;"> 
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="fresh strawberries" name="check_list[]" value="fresh strawberries">
                    <label for="fresh strawberries fruit" style="font-size: 20px;">fresh strawberries</label>
                  </div>

              </div>

              <div>
                <h1>Dislikes</h1>
                <div class="form-group">
                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="dried basil" name="check_list1[]" value="dried basil">
                    <label class="mr-5" for="dried basil" style="font-size: 20px;">dried basil</label>
                  </div>

                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" id="Parmesan cheese" name="check_list1[]" style="font-size: 20px;" value="Parmesan cheese">
                    <label for="Parmesan cheese" style="font-size: 20px;">Parmesan cheese</label>  
                  </div>

                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="curry powder" name="check_list1[]" value="curry powder">
                    <label for="curry powder" style="font-size: 20px;">curry powder </label>
                  </div>

                  <div class="col-sm-2" style="display: inline;"> 
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="green bell pepper" name="check_list1[]" value="green bell pepper">
                    <label for="green bell pepper" style="font-size: 20px;">green bell pepper</label>
                  </div>

                  <div class="col-sm-2" style="display: inline;">
                    <input class="mr-2" type="checkbox" style="font-size: 20px;" id="ground cumin" name="check_list1[]" value="ground cumin">
                    <label for="ground cumin" style="font-size: 20px;">ground cumin </label>
                  </div>
                </div>

              </div>

            <div class="form-group mt-3">
              <center><button type="submit" class="button button-contactForm btn_4 boxed-btn" name="submit">Sign Up</button>
              </center>
            </div>
            <div class="form-group mt-3">
              <center><h2 class="contact-title text-center" id="amember"><a  href="#">Already a Member.</a> </h2></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

    <?php include('include/footer.php');?>
  <!-- JS here -->
  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/ajax-form.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/scrollIt.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/nice-select.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/gijgo.min.js"></script>

  <!--contact js-->
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>

  <script src="js/main.js"></script>
</body>

</html>