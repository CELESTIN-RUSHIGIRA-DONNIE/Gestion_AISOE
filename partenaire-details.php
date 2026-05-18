<?php include('admin/conf/dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AISOE - Details partenaire</title>

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
        /* Style des cartes */
        .course-item {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Ombre douce */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            /* Ombre plus forte au hover */
        }

        /* Image */
        .image-box {
            width: 100%;
            height: 220px;
            overflow: hidden;
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Contenu */
        .course-content {
            padding: 15px;
        }

        .course-content h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Bouton Lire plus */
        .course-content .category {
            display: inline-block;
            padding: 8px 15px;
            background-color: #db3030;
            /* Rouge Bootstrap */
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .course-content .category:hover {
            background-color: #db3030;
            /* Rouge plus foncé au hover */
            color: #fff;
        }

        .member-photo {
            width: 450px;
            /* largeur fixe */
            height: 450px;
            /* hauteur fixe */
            object-fit: cover;
            /* garde le ratio et coupe si nécessaire */
            border-radius: 8px;
            /* optionnel : coins arrondis */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* optionnel : ombre douce */
        }
    </style>
</head>

<body class="index-page">

    <div class="container-fluid bg-danger px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=61572712465423" target="_blank"><i
                            class="bi bi-facebook"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="https://www.youtube.com/@Aidesociale%C3%A9tudiantAISOE" target="_blank"><i class="bi bi-youtube"></i></a>
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
                    <li><a href="index" class="active">Acceuil<br></a></li>
                    <li><a href="evenement">Evenement</a></li>
                    <li><a href="membre">Membres</a></li>
                    <li class="dropdown"><a href="#"><span>Organisation</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="historique">Historique</a></li>
                            <li><a href="organe">Organes</a></li>
                            <li><a href="activite">Activités</a></li>
                            <li><a href="temoignage">Temoignages</a></li>
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

        <?php
        if (isset($_GET['id'])) {
            $partenaire_id = $_GET['id'];
            $partenaire = "SELECT * FROM partenaire WHERE id ='$partenaire_id'";
            $partenaire_run = mysqli_query($con, $partenaire);

            if (mysqli_num_rows($partenaire_run) > 0) {
                $membre_row = mysqli_fetch_array($partenaire_run)
        ?>
                <!-- Page Title -->
                <div class="page-title" data-aos="fade">
                    <div class="heading bg-fac_med">
                        <div class="container">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-lg-8">
                                    <h1><?= $membre_row['nom'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="breadcrumbs">
                        <div class="container">
                            <ol>
                                <li><a href="index">Acceuil</a></li>
                                <li class="current">Partenaire</li>
                            </ol>
                        </div>
                    </nav>
                </div><!-- End Page Title -->

                <!-- Detail Membre -->
                <section id="about" class="about section">

                    <div class="container">

                        <div class="row gy-4">

                            <div class="col-lg-6 order-1 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <img src="admin/assets/uploads/partenaire/<?= $membre_row['photo']; ?>" class="img-fluid member-photo" alt="<?= $membre_row['nom']; ?>">
                            </div>

                            <div class="col-lg-6 order-2 order-lg-2 content" data-aos="fade-up" data-aos-delay="200">
                                <h3><?= $membre_row['nom'] ?></h3>
                                <p class="fst-italic">
                                    <?= $membre_row['adresse'] ?>
                                </p>
                                <p>
                                    <?= $membre_row['description'] ?>
                                </p>
                            </div>

                        </div>

                    </div>

                </section><!-- /About Section -->
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
                        <a href="https://www.youtube.com/@Aidesociale%C3%A9tudiantAISOE" target="_blank"><i class="bi bi-youtube"></i></a>
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