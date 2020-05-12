<?php
    session_start();
    error_reporting(0);
    include('config.php');
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>wegan</title>
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
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include('include/header.php');?>
  
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Roulette</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->


        <form method="post" style="margin-bottom: 100px;">
            <center>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                            <div class="power_controls">
                                <br />
                                <br />
                                <br />

                                <img id="spin_button" src="img/spin_on.png" alt="Spin" onClick="startSpin();" />
                                <br /><br />
                                <h3>Spin to select randomly.</h3>
                                <br /><br />
                                <h3 id="recipe_name" name="recipe_name"></h3>
                                <a id="recipe_btn" style="display: none;" onClick="recipeDetail();" class="line_btn">View Full Recipe</a>
                                <br><br>
                                &nbsp;&nbsp;<a href="#" onClick="location.reload();">Play Again</a><br />
                            </div>
                        </td>
                        <td width="438" height="582" class="the_wheel" align="center" valign="center">
                            <canvas id="canvas" width="434" height="434">
                                <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                            </canvas>
                        </td>
                    </tr>
                </table>
            </center>
        </form>

        <!-- latest_trand     -->
    <div class="latest_trand_area" style="margin-top: 100px;">
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

<!-- link that opens popup -->
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
    <script src="js/Winwheel.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script>
        
        let theWheel = new Winwheel({
                'numSegments'  : 8,     // Specify number of segments.
                'outerRadius'  : 212,   // Set outer radius so wheel fits inside the background.
                'textFontSize' : 15,    // Set font size as desired.
                'segments'     :        // Define segments including colour and text.
                [
                   {'fillStyle' : '#eae56f', 'text' : 'Masala Channa'},
                   {'fillStyle' : '#89f26e', 'text' : 'Hearty Vegetable Lasagna'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Vegetarian Korma'},
                   {'fillStyle' : '#e7706f', 'text' : 'Peanut Butter Pie'},
                   {'fillStyle' : '#eae56f', 'text' : 'Three Berry Pie'},
                   {'fillStyle' : '#89f26e', 'text' : 'Fluffy Pancakes'},
                   {'fillStyle' : '#7de6ef', 'text' : 'Zesty Quinoa Salad'},
                   {'fillStyle' : '#e7706f', 'text' : 'Vegetable Manchurian'}
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,     // Duration in seconds.
                    'spins'    : 8,     // Number of complete spins.
                    'callbackFinished' : alertPrize
                }
            });

            let wheelPower    = 3;
            let wheelSpinning = false;

            function startSpin()
            {
                if (wheelSpinning == false) {
                    
                    theWheel.animation.spins = 15;

                    theWheel.startAnimation();
                    wheelSpinning = true;
                }
            }
            var recipe_name = "";

            function alertPrize(indicatedSegment)
            {
                document.getElementById("recipe_name").innerHTML = indicatedSegment.text;
                document.getElementById("recipe_btn").style.display = "block";
                recipe_name = indicatedSegment.text;
                
            }

            function recipeDetail()
            {
                window.location.href = "recipes_details.php?rname=" + recipe_name;
            }
    </script>

    
</body>
</html>