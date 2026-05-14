<?php include "admin/conf/dbcon.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AISOE - Detail de l'évenement</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

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

    <style>
        .image-box {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .image-box-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/aisoe_im.jpg" alt="AISOE">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index">Acceuil<br></a></li>
                    <li><a href="evenement" class="active">Evenement</a></li>
                    <li><a href="membre">Membres</a></li>
                    <li class="dropdown"><a href="#"><span>Organisation</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="historique">Historique</a></li>
                            <li><a href="organe">Organes</a></li>
                            <li><a href="activite">Activités</a></li>
                            <li><a href="temoignage">Temoignages</a></li>
                            <li><a href="galerie">Galerie</a></li>
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
        <?php
        if (isset($_GET['id'])) {
            $post_id = $_GET['id'];
            $post = "SELECT * FROM evenement WHERE id ='$post_id'";
            $post_run = mysqli_query($con, $post);

            if (mysqli_num_rows($post_run) > 0) {
                $post_row = mysqli_fetch_array($post_run)
        ?>
                <!-- Page Title -->
                <div class="page-title" data-aos="fade">
                    <div class="heading">
                        <div class="container">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-lg-8">
                                    <h1>Événement</h1>
                                    <p class="mb-0"><?= $post_row['titre']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="breadcrumbs">
                        <div class="container">
                            <ol>
                                <li><a href="index">Accueil</a></li>
                                <li class="current">Activités</li>
                            </ol>
                        </div>
                    </nav>
                </div><!-- End Page Title -->

                <!-- Activity Details -->
                <section id="course-details" class="course-details section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <div class="row">
                            <div class="col-lg-8">

                                <!-- Course Header -->
                                <div class="course-header" data-aos="fade-up" data-aos-delay="200">
                                    <div class="course-image">
                                        <img src="admin/assets/uploads/evenement/<?= $post_row['photo']; ?>" alt="Evenement Image" class="img-fluid">
                                    </div>
                                    <div class="course-meta">
                                        <div class="instructor">
                                            <img src="admin/assets/img/favicon.png" alt="Instructor" class="instructor-avatar">
                                            <div class="instructor-info">
                                                <h6>AISOE</h6>
                                                <span>Aide Sociale Étudiants</span>
                                            </div>
                                        </div>
                                        <div class="course-stats">
                                            <div class="instructor-info">
                                                <h6><i>Publié le :</i></h6>
                                                <i class="bi bi-calendar"></i>
                                                <span><?= date('d/m/Y', strtotime($post_row['created__at'])); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Course Header -->

                                <!-- Course Content -->
                                <div class="course-content" data-aos="fade-up" data-aos-delay="300">
                                    <div class="what-you-learn">
                                        <h3><strong><?= $post_row['titre']; ?></strong></h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?= $post_row['description']; ?></p>
                                            </div>
                                             <div class="col-md-12">
                                                <p><?= $post_row['detail']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- End Course Content -->

                            </div>

                            <div class="col-lg-4">

                                <!-- Course Sidebar -->
                                <div class="course-sidebar" data-aos="fade-up" data-aos-delay="200">

                                    <!-- Pricing Card -->
                                    <div class="pricing-card">
                                        <div class="price">
                                            <span class="currency">$</span>
                                            <span class="amount">199</span>
                                            <span class="period">/course</span>
                                        </div>
                                        <div class="original-price">$299</div>

                                        <div class="course-features">
                                            <div class="feature">
                                                <i class="bi bi-clock"></i>
                                                <span>40 hours of content</span>
                                            </div>
                                            <div class="feature">
                                                <i class="bi bi-trophy"></i>
                                                <span>Certificate of completion</span>
                                            </div>
                                            <div class="feature">
                                                <i class="bi bi-phone"></i>
                                                <span>Mobile and desktop access</span>
                                            </div>
                                            <div class="feature">
                                                <i class="bi bi-infinity"></i>
                                                <span>Lifetime access</span>
                                            </div>
                                        </div>
                                        <button class="btn-preview">Faire un Don</button>
                                    </div><!-- End Pricing Card -->
                                </div><!-- End Course Sidebar -->

                            </div>

                        </div>

                    </div>

                </section><!-- /Activité Details Section -->
        <?php

            }
        }
        ?>
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
                        <a href="" target="_blank"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.tiktok.com/@user74277859514977" target="_blank"><i class="bi bi-tiktok"></i></a>
                        <a href="https://www.linkedin.com/in/aide-sociale-%C3%A9tudiant-aisoe-a4164039b/?isSelfProfile=false"
                            target="_blank"><i class="bi bi-linkedin"></i></a>
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
                    <p>Abonnez-vous à notre newsletter pour suivre les nouvelles de AISOE, nos projets et nos initiatives en
                        faveur des étudiants</p>
                    <form action="code.php" method="post">
                        <div class="newsletter-form"><input type="email" placeholder="Entrez votre Email" name="email"><input type="submit" name="newslatter"></div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>AISOE</span> <strong class="px-1 sitename"> Tous droits réservés.</strong>
            <div class="credits">
                Conçu par <a href="https://bootstrapmade.com/">CELESTIN RUSHIGIRA DONNIE</a> | <a
                    href="https://bootstrapmade.com/tools/">0979599841</a>
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