<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AISOE - Register</title>
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
                    <li><a href="evenement">Evenement</a></li>
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

            <a class="btn-getstarted" href="login">Connexion</a>

        </div>
    </header>

    <main class="main">
        <section id="features" class="features section light-background">
            <div class="container-fluid ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="rounded p-5">
                                <h1 class="text-center mb-4">Enregitrez-vous</h1>
                                <?php if (isset($_SESSION['message'])) { ?>
                                    <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show mb-3" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <?php echo $_SESSION['message']; ?>
                                    </div>
                                    <?php unset($_SESSION['message'], $_SESSION['msg_type']); ?>
                                <?php } ?>
                                <form action="code.php" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Entrer votre email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter votre mot de passe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Re-Password</label>
                                        <input type="password" name="confirm_password" class="form-control" id="password"
                                            placeholder="Retapez le mot de passe" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" name="register" class="btn btn-danger btn-block">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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