<?php
session_start();
include 'admin/conf/dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AISOE - Temoignages</title>
    <meta name="description" content="Découvrez les témoignages inspirants de nos bénéficiaires, partenaires et membres de la communauté AISOE. Ces histoires authentiques illustrent l’impact positif de notre initiative de solidarité étudiante, mettant en lumière les défis surmontés, les réussites académiques et les transformations personnelles rendues possibles grâce à notre soutien. Plongez dans ces récits émouvants qui témoignent de la force de l’entraide et de la résilience des étudiants en difficulté.">
    <meta name="keywords" content="Temoignages, AISOE, Étudiants, Solidarité, Soutien, Histoires inspirantes, Bénéficiaires, Partenaires, Communauté AISOE, Impact positif, Initiative de solidarité étudiante, Défis surmontés, Réussites académiques, Transformations personnelles, Entraide, Résilience des étudiants en difficulté">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <div class="container-fluid bg-danger px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=61572712465423" target="_blank"><i
                            class="bi bi-facebook"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="https://www.youtube.com/@etoiledelouangeUEA" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.tiktok.com/@user74277859514977" target="_blank"><i
                            class="bi bi-tiktok"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle"
                        href="https://www.linkedin.com/in/aide-sociale-%C3%A9tudiant-aisoe-a4164039b/?isSelfProfile=false" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="register"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                    <a href="login"><small class="me-3 text-light"><i
                                class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                </div>
            </div>
        </div>
    </div>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/aisoe_im.jpg" alt="AISOE">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index">Acceuil<br></a></li>
                    <li><a href="evenement">Evenement</a></li>
                    <li><a href="membre">Membres</a></li>
                    <li class="dropdown"><a href="#" class="active"><span>Organisation</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="historique">Historique</a></li>
                            <li><a href="organe">Organes</a></li>
                            <li><a href="activite">Activités</a></li>
                            <li><a href="temoignage" class="active">Temoignages</a></li>
                            <li><a href="login">Login</a></li>
                        </ul>
                    </li>
                    <li><a href="contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="don"><i class="bi bi-currency-dollar"></i> Faire un don</a>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Temoignages</h1>
                            <p class="mb-0">Votre témoignage est une source d’encouragement pour les autres étudiants,
                                pour les partenaires et pour toutes les personnes qui soutiennent la solidarité estudiantine.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="index">Acceuil</a></li>
                        <li class="current">Temoignages</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>temoignages</h2>
                <p>Lire les témoignages</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                },
                                "1200": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 20
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">
                        <?php
                        $homeactivite = "SELECT * FROM temoignage WHERE statut='1' ORDER BY created__at DESC";
                        $homeactivite_run = mysqli_query($con, $homeactivite);
                        if (mysqli_num_rows($homeactivite_run) > 0) {
                            foreach ($homeactivite_run as $homeItems) {
                        ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-wrap">
                                        <div class="testimonial-item">
                                            <img src="admin/assets/uploads/testimonials/<?php echo $homeItems['photo']; ?>" class="testimonial-img" alt="">
                                            <h3><?php echo $homeItems['nom']; ?></h3>
                                            <h4><?php echo $homeItems['email']; ?></h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span><?php echo $homeItems['temoignage']; ?></span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section py-5">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Ajouter ton témoignage</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-chat-left-text flex-shrink-0"></i>
                            <div>
                                <h3>Ranconte</h3>
                                <p>Chez AISOE, chaque histoire compte.</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <p>
                                Si vous avez bénéficié de notre soutien, si vous avez contribué au projet, ou si vous avez vu son impact autour de vous, partagez votre témoignage avec nous.
                                Votre histoire peut encourager d’autres étudiants à garder espoir et à continuer leurs études.
                                <br><br>
                                Avec votre accord, nous pourrons partager votre témoignage sur nos plateformes ou lors de nos activités,
                                afin d’encourager d’autres étudiants à ne pas abandonner leurs études.
                            </p>
                        </div><!-- End Info Item -->
                    </div>

                    <div class="col-lg-8">
                        <?php if (isset($_SESSION['message'])) { ?>
                            <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show mb-3" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?php echo $_SESSION['message']; ?>
                            </div>
                            <?php unset($_SESSION['message'], $_SESSION['msg_type']); ?>
                        <?php } ?>
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Votre Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="file" class="form-control" name="photo" required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Ecrire votre témoignage ici."
                                        required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" name="send_temoignage" class="btn btn-danger btn-block">Soumettre</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer position-relative dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index" class="logo d-flex align-items-center">
                        <span class="sitename" style="color: #db3030">AISOE</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>RD CONGO, UEA bukavu</p>
                        <p class="mt-3"><strong>Phone :</strong> <span>+243 981 418 835</span></p>
                        <p><strong>Email :</strong> <span>aidesocialeetudiantaisoe@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://www.facebook.com/profile.php?id=61572712465423" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-youtube"></i></a>
                        <a href="https://www.tiktok.com/@user74277859514977" target="_blank"><i class="bi bi-tiktok"></i></a>
                        <a href="https://www.linkedin.com/in/aide-sociale-%C3%A9tudiant-aisoe-a4164039b/?isSelfProfile=false" target="_blank"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>liens utiles</h4>
                    <ul>
                        <li><a href="index">Accueil</a></li>
                        <li><a href="evenement">Événements</a></li>
                        <li><a href="membre">Membres</a></li>
                        <li><a href="historique">Historique</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </div>


                <div class="col-lg-6 col-md-12 footer-newsletter">
                    <h4>Notre Newsletter</h4>
                    <p>Abonnez-vous à notre newsletter pour suivre les nouvelles de AISOE, nos projets et nos
                        initiatives en faveur des étudiants</p>
                    <form action="code.php" method="post">
                        <div class="newsletter-form"><input type="email" placeholder="Entrez votre Email" name="email" required><input type="submit" name="newslatter"></div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>AISOE</span> <strong class="px-1 sitename"> Tous droits réservés.</strong>
            <div class="credits">
                Conçu par <a href="mailto:celestinrushigiradonnie@gmail.com">CELESTIN RUSHIGIRA DONNIE</a> | <a href="tel:0979599841">0979599841</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>