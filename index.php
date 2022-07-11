<!DOCTYPE html>
<?php include './includes/conn.php';
if (isset($_GET['love'])) {
    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("SELECT * FROM invitation WHERE invitation_deleted='0' AND invitation_search_name='" . $_GET['love'] . "'");
        $stmt->execute();
        foreach ($stmt as $row) {
?>
            <html lang="en">

            <head>

                <title><?php echo $row['invitation_name1']; ?> Wedds <?php echo $row['invitation_name2']; ?></title>

                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=Edge">
                <meta name="description" content="">
                <meta name="keywords" content="">
                <meta name="author" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" href="css/font-awesome.min.css">
                <link rel="stylesheet" href="css/aos.css">

                <!-- MAIN CSS -->
                <link rel="stylesheet" href="css/style.css">
            </head>

            <body data-spy="scroll" data-target="#navbarNav" data-offset="50">

                <!-- MENU BAR -->
                <nav class="navbar navbar-expand-lg fixed-top">
                    <div class="container">

                        <a class="navbar-brand" href="">INVITATION</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-lg-auto">
                                <li class="nav-item">
                                    <a href="#home" class="nav-link smoothScroll">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#about" class="nav-link smoothScroll">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#watch_live" class="nav-link smoothScroll">Watch Live</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#gallary" class="nav-link smoothScroll">Gallery</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#contact" class="nav-link smoothScroll">Contact</a>
                                </li>
                            </ul>

                            <ul class="social-icon ml-lg-3">
                                <li><a onclick="streaming_id()" class="fa fa-youtube-play"></a></li>
                                <li><a onclick="streaming_pass()" class="fa fa-lock"></a></li>
                            </ul>
                        </div>

                    </div>
                </nav>

                <!-- HERO -->
                <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

                    <div class="bg-overlay"></div>

                    <div class="container">
                        <div class="row">

                            <div class="col-lg-8 col-md-10 mx-auto col-12">
                                <div class="hero-text mt-5 text-center">



                                    <div class="text" data-aos="fade-right" data-aos-delay="100">
                                        <svg viewbox="0 0 100 20" class="center">
                                            <defs>
                                                <pattern id="wave" x="0" y="0" width="100%" height="100%" patternUnits="userSpaceOnUse">
                                                    <path id="wavePath" d="M-40 9 Q-30 7 -20 9 T0 9 T20 9 T40 9 T60 9 T80 9 T100 9 T120 9 V20 H-40z" mask="url(#mask)" fill="var(--light)">
                                                        <animateTransform attributeName="transform" begin="0s" dur="1.5s" type="translate" from="0,0" to="40,0" repeatCount="indefinite" />
                                                    </path>
                                                </pattern>
                                            </defs>
                                            <text text-anchor="middle" x="50" y="15" fill="url(#wave)" fill-opacity="1" class="liquid"><?php echo $row['invitation_name1']; ?></text>
                                        </svg>
                                    </div>

                                    <h1 data-aos="fade-up" data-aos-delay="200" style="border:0px;margin:0%;" ><b>&#128158;</b></h1>

                                    <div class="text" data-aos="fade-left" data-aos-delay="300">
                                        <svg viewbox="0 0 100 20" class="center">
                                            <defs>
                                                <pattern id="wave" x="0" y="0" width="100%" height="100%" patternUnits="userSpaceOnUse">
                                                    <path id="wavePath" d="M-40 9 Q-30 7 -20 9 T0 9 T20 9 T40 9 T60 9 T80 9 T100 9 T120 9 V20 H-40z" mask="url(#mask)" fill="var(--light)">
                                                        <animateTransform attributeName="transform" begin="0s" dur="1.5s" type="translate" from="0,0" to="40,0" repeatCount="indefinite" />
                                                    </path>
                                                </pattern>
                                            </defs>
                                            <text text-anchor="middle" x="50" y="15" fill="url(#wave)" fill-opacity="1" class="liquid"><?php echo $row['invitation_name2']; ?></text>
                                        </svg>
                                    </div>

                                    <a href="#about" class="btn custom-btn mt-3" style="color:red;" data-aos="fade-up" data-aos-delay="600">Know Us</a>

                                    <a href="#watch_live" class="btn custom-btn bordered mt-3" data-aos="fade-down" data-aos-delay="700">Watch live</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- about us -->
                <section class="about section" id="about">
                    <div class="container">
                        <div class="row">

                            <div class="ml-lg-auto col-lg-3 mb-4 col-md-6 col-12" data-aos="fade-left" data-aos-delay="700">
                                <div class="team-thumb">
                                    <img src="images/<?php echo $row['invitation_single_image1']; ?>" class="img-fluid" alt="single image1">
                                    <div class="team-info d-flex flex-column">
                                        <h3><?php echo $row['invitation_name1']; ?></h3>
                                        <span><?php echo $row['invitation_name1_profession']; ?></span>
                                        <ul class="social-icon mt-3">
                                            <li><a href="<?php echo $row['invitation_name1_social_media1']; ?>" class="fa fa-<?php echo $row['invitation_name1_social_media1_type']; ?>"></a></li>
                                            <li><a href="<?php echo $row['invitation_name1_social_media2']; ?>" class="fa fa-<?php echo $row['invitation_name1_social_media2_type']; ?>"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-lg-0 mb-lg-4 mb-0 col-lg-5 col-md-10 col-12">
                                <h2 class="mb-2" data-aos="fade-right" data-aos-delay="300">We are getting married!</h2>
                                <p data-aos="fade-up" data-aos-delay="400" style="text-align: justify; text-justify: inter-word;">
                                You have always been the most integral part of our lives. Let’s together celebrate the relationship 
                                we share the best through this wedding ceremony! We sincerely invite you to join us with your lovely
                                 family..
                            </p>
                                <p data-aos="fade-down" data-aos-delay="500" style="text-align: justify; text-justify: inter-word;">
                                 Thank you. Be sure to attend the wedding ceremony on</p>
                                <div class="container">
                                    <?php $date_time = explode("_", $row['invitation_date_time']); ?>
                                    <div class="display-date" data-aos="fade-top-bottom" data-aos-delay="700">
                                        <?php echo date("D, d M Y", strtotime($date_time[0])); ?>
                                    </div>
                                    <div class="display-time" data-aos="fade-down" data-aos-delay="400">
                                        <?php echo date("h:i a", strtotime($date_time[1])); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mr-lg-auto mt-2 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-right" data-aos-delay="800">
                                <div class="team-thumb">
                                    <img src="images/<?php echo $row['invitation_single_image2']; ?>" class="img-fluid" alt="single image2">
                                    <div class="team-info d-flex flex-column">
                                        <h3><?php echo $row['invitation_name2']; ?></h3>
                                        <span><?php echo $row['invitation_name2_profession']; ?></span>
                                        <ul class="social-icon mt-3">
                                            <li><a href="<?php echo $row['invitation_name2_social_media1']; ?>" class="fa fa-<?php echo $row['invitation_name2_social_media1_type']; ?>"></a></li>
                                            <li><a href="<?php echo $row['invitation_name2_social_media2']; ?>" class="fa fa-<?php echo $row['invitation_name2_social_media2_type']; ?>"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- watch_live -->
                <section class="feature" id="watch_live" style="padding:2% ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-12 text-center mb-0" style="color:aliceblue;">
                                <h1 data-aos="fade-up" data-aos-delay="200">Watch Live</h1>
                            </div>
                            <div class="col-lg-12 col-12 text-center mb-0 mt-0">
                                <div class="youtebe_video_frame" data-aos="zoom-out-down" data-aos-delay="200"><iframe src="https://www.youtube.com/embed/<?php echo $row['invitation_youtube_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe></div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <!-- gallary -->
                <section class="class section" id="gallary">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-12 col-12 text-center mb-5">
                                <h2 data-aos="fade-up" data-aos-delay="200">Photo Gallery</h2>
                            </div>

                            <div class="wrapper">
                                <div class="gallery">
                                    <div class="gallery__item gallery__item--1" data-aos="fade-up" data-aos-delay="200">
                                        <a class="gallery__link">
                                            <img src="images/<?php echo $row['invitation_sq_image1']; ?>" class="gallery__image" />
                                        </a>
                                    </div>
                                    <div class="gallery__item gallery__item--2" data-aos="fade-left" data-aos-delay="300">
                                        <a class="gallery__link">
                                            <img src="images/<?php echo $row['invitation_sq_image2']; ?>" class="gallery__image" />
                                        </a>
                                    </div>
                                    <div class="gallery__item gallery__item--3" data-aos="fade-right" data-aos-delay="100">
                                        <a class="gallery__link">
                                            <img src="images/<?php echo $row['invitation_long_image1']; ?>" class="gallery__image" />

                                        </a>
                                    </div>
                                    <div class="gallery__item gallery__item--4" data-aos="fade-down" data-aos-delay="400">
                                        <a class="gallery__link" id="gallery__item_id--4">
                                            <img src="images/<?php echo $row['invitation_long_image2']; ?>" class="gallery__image" />
                                        </a>
                                    </div>
                                    <div class="gallery__item gallery__item--5" data-aos="fade-left" data-aos-delay="200">
                                        <a class="gallery__link" id="gallery__item--5">
                                            <img src="images/<?php echo $row['invitation_full_image1']; ?>" class="gallery__image" />
                                        </a>
                                    </div>
                                    <div class="gallery__item gallery__item--6" data-aos="fade-right" data-aos-delay="300">
                                        <a class="gallery__link">
                                            <img src="images/<?php echo $row['invitation_sq_image3']; ?>" class="gallery__image" />

                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <?php try {
                    $stmt1 = $conn->prepare("SELECT * FROM photographer WHERE photographer_id='" . $row['invitation_photographer_id'] . "'");
                    $stmt1->execute();
                    foreach ($stmt1 as $photographer) {
                ?>
                        <!-- SCHEDULE -->
                        <section class="schedule section" id="contact">
                            <div class="container">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="poster_of_photogrpher" data-aos="zoom-out-down" data-aos-delay="200"><img src="photographer_posters/<?php echo $photographer['photographer_banner']; ?>" alt="Poster.." width="100%" height="20%"></div>
                                    </div>

                                </div>
                            </div>
                        </section>


                        <!-- CONTACT -->
                        <section class="contact section">
                            <div class="container">
                                <div class="row">

                                    <div class="ml-auto col-lg-5 col-md-6 col-12">
                                        <h2  data-aos="fade-left" data-aos-delay="600">Contact Us</h2>
                                        <p data-aos="fade-down" data-aos-delay="100"><i class="fa fa-phone mr-1"></i> <?php echo $photographer['photographer_phone']; ?></p>
                                        <p data-aos="fade-up" data-aos-delay="400"><i class="fa fa-envelope mr-1"></i> <?php echo $photographer['photographer_email']; ?></p>
                                        <p data-aos="fade-right" data-aos-delay="700"><i class="fa fa-globe mr-1"></i> <?php echo $photographer['photographer_website']; ?></p>
                                        <h2 class="mb-4" data-aos="fade-left" data-aos-delay="600">Where you can <span>find us</span></h2>
                                        <p data-aos="fade-down" data-aos-delay="400"><i class="fa fa-map-marker mr-1"></i> <?php echo $photographer['photographer_address']; ?></p>

                                    </div>

                                    <div class="mx-auto mt-4 col-lg-5 col-md-6 col-12">
                                        <div data-aos="fade-up" data-aos-delay="500">
                                            <?php echo $photographer['photographer_address_map']; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>


                        <!-- FOOTER -->
                        <footer class="site-footer schedule">
                            <div class="container">
                                <div class="row">

                                    <div class="ml-auto col-lg-4 col-md-5">
                                        <p class="copyright-text">Copyright &copy; 2020 7 Soft Solution.

                                            <br>Design: <a href="https://www.7softsolution.com" style="color: red;">7SoftSolution</a>
                                        </p>
                                    </div>

                                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                                        <p class="mr-4">
                                        <p><i class="fa fa-phone mr-1"></i>+91 95387-67668</p>
                                    </div>

                                </div>
                            </div>
                        </footer>

                <?php     }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                $pdo->close();
                ?>

                <!-- SCRIPTS -->
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/aos.js"></script>
                <script src="js/smoothscroll.js"></script>
                <script src="js/custom.js"></script>
                <script>
                    function streaming_id() {
                        /* Get the text field */
                        var copyText = "<?php echo $row['invitation_streaming_id']; ?>";
                        alert(copyText);
                    }

                    function streaming_pass() {
                        /* Get the text field */
                        var copyText_pass = "<?php echo $row['invitation_streaming_password']; ?>";
                        alert(copyText_pass);
                    }
                </script>
        <?php    }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $pdo->close();
        ?>
            </body>

            </html>
        <?php
    } else { ?>
            <html lang="en">

            <head>

                <title></title>

                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=Edge">
                <meta name="description" content="">
                <meta name="keywords" content="">
                <meta name="author" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" href="css/font-awesome.min.css">
                <link rel="stylesheet" href="css/aos.css">

                <!-- MAIN CSS -->
                <link rel="stylesheet" href="css/style.css">
            </head>

            <body data-spy="scroll" data-target="#navbarNav" data-offset="50">

                <!-- CONTACT -->
                <section class="schedule section">
                    <div class="container">
                        <div class="row">

                            <div class="mt-2 ml-auto col-lg-5 col-md-6 col-12">
                                <h2 class="text-white mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Feel free to ask anything</h2>

                                <form action="send.php" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                                    <input type="text" class="form-control" name="name" placeholder="Name">

                                    <input type="tel" class="form-control" name="phone" placeholder="Phone">

                                    <input type="email" class="form-control" name="email" placeholder="Email">

                                    <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>

                                    <button type="submit" class="form-control" id="submit-button" name="submit" style="background-color: red;">Send
                                        Message</button>
                                </form>
                            </div>

                            <div class="mt-2 mx-auto col-lg-5 col-md-6 col-12">
                                <h2 class="text-white mb-4" data-aos="fade-up" data-aos-delay="500">Where you can <span>find us</span></h2>

                                <p class="text-white" data-aos="fade-up" data-aos-delay="700">
                                    <i class="fa fa-phone mr-1"></i> +9195387-67668
                                </p>
                                <p class="text-white" data-aos="fade-up" data-aos-delay="800">
                                    <i class="fa fa-envelope-o mr-1"></i>
                                    <a>support@streaminginvitation.com</a>
                                <p>

                            </div>

                        </div>
                    </div>
                </section>


                <!-- FOOTER -->
                <footer class="site-footer">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                                <p class="mr-4">Copyright &copy; 2022 7 Soft Solution
                                    <br>Design: <a href="http://www.7softsolution.com" style="color: red;">7SoftSolution.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>

                <!-- SCRIPTS -->
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/aos.js"></script>
                <script src="js/smoothscroll.js"></script>
                <script src="js/custom.js"></script>
            </body>

            </html>
        <?php } ?>