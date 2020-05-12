<?php
    session_start();
    error_reporting(0);
    include("config.php");
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Wegan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('include/header.php');?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 ">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                Vegetarian Dishes
                                </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="recepie_area">
        <div class="container">
            <div class="row">
                <?php
                    $status = "";
                    $sql = "SELECT * FROM recipetb";

                        $ret=mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($ret))  {

                                $dislike = explode("," ,$_SESSION['dislikes']);
                                $ingredients = explode("," , $row['recipe_ingredients']);
                                $val = "";

                                foreach ($dislike as $val) {
                                    foreach ($ingredients as $val1) {
                                        if ($val == $val1) {
                                            $status = "";
                                            break 2;
                                        }
                                        else {
                                            $status = $row['id'];
                                        }
                                    }
                                }

                                $sql1 = "SELECT * FROM recipetb WHERE id = '$status'";
                                $ret1 = mysqli_query($con,$sql1);
                                    while ($row1 = mysqli_fetch_array($ret1))  {

                    ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/<?php echo $row1['recipe_image']; ?>" alt="">
                        </div>
                        <h3><?php echo $row1['recipe_name']; ?></h3>
                        <span><?php echo $row1['recipe_type']; ?></span>
                        <p>Preparation Time: <?php echo $row1['time'];?></p>
                        <a href="recipes_details.php?rid=<?php echo $row1['id']; ?>" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <?php
                }
            }
    ?>
            </div>
        </div>
    </div>
  

    <div class="latest_trand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                        <p>Thousands of recipes are waiting to be watched</p>
                        <h3>Discover latest trending recipes</h3>
                        <a href="Recipes.php" class="boxed-btn3">View all Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_trand     -->

  
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