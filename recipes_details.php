<?php
    session_start();
    error_reporting(0);
    include('config.php');
    $rname = htmlspecialchars($_GET['rname']);
    if ($_GET['rid'] != "") {
        $rid = intval($_GET['rid']);
    }else if (!empty($_GET["rname"])){
        $rname = htmlspecialchars($_GET['rname']);

        $sql2 = "SELECT * FROM recipetb WHERE recipe_name = '$rname'";
            $ret2 = mysqli_query($con,$sql2);
                while ($row2 = mysqli_fetch_array($ret2))  {
                        $rid = $row2['id'];
                    }
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
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <?php include('include/header.php');?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Recipe Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="recepie_details_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_thumb">
                        <?php
                                $recipe_type = "";
                                $recipe_name = "";
                                $sql1 = "SELECT * FROM recipetb WHERE id = '$rid'";
                                    $result = $con->query($sql1);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc())  {
                                            $recipe_type = $row['recipe_type'];
                                            $recipe_name = $row['recipe_name'];
                            ?>
                        <img style="width: 70%" src="img/recepie/<?php echo $row['recipe_image']; ?>" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_info">
                        <h3><?php echo $row['recipe_name']; ?></h3>
                        <p><?php echo $row['recipe_info']; ?></p>

                        <div class="resepies_details">
                            <ul>
                                <li><p><strong>Time</strong> : <?php echo $row['time']; ?> </p></li>
                                <li><p><strong>Category</strong> : <?php echo $row['recipe_type']; ?> </p></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 40px;margin-top: 40px;">
                <div class="col-xl-12">
                    <div class="recepies_text" style="display: block;">
                        <h1 style="margin-bottom: 20px;">Ingredients: </h1>
                        <?php 
                            $recipe_steps = explode("," , $row['recipe_ingredients']);
                            $i = 0;
                        ?>
                            <p style="margin-bottom: 20px;color: #212529;font-size: 15px;">
                                <?php 
                                    foreach ($recipe_steps as $str) { 
                                    $i++;
                                    echo $i . ": " .$str . ".&nbsp;&nbsp;&nbsp;&nbsp;";
                                    }
                                ?>
                            </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="recepies_text">
                        <h1 style="margin-bottom: 20px;">Steps to make: </h1>
                        <?php 
                            $recipe_steps = explode("." , $row['recipe_steps']);
                            $i = 0;
                            foreach ($recipe_steps as $str) { 
                                $i++;
                        ?>
                        <ul>
                            <li style="list-style-type : disc;margin-bottom: 20px;">
                                <?php echo  "Step ". $i . ": " .$str . "."; ?>
                            </li>
                        </ul>
                        <?php    
                                    }
                                ?>
                    </div>
                </div>
            </div>
            <?php
                                        }
                                    }
                            ?>
        </div>
    </div>
    <!-- recepie_area_start  -->
    <div class="recepie_area inc_padding">
        <div class="container">
            <div class="row">

                <?php
                    $sql1 = "SELECT * FROM recipetb WHERE recipe_type = '$recipe_type'";
                                $ret1 = mysqli_query($con,$sql1);
                                    while ($row1 = mysqli_fetch_array($ret1))  {
                                        if ($recipe_name == $row1['recipe_name']) {
                                            
                                        }else{
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
    <!-- /recepie_area_start  -->

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