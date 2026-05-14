<?php include "admin/conf/dbcon.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AISOE - Accueil</title>
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

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/aisoe_ac.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">BIENVENUE À AISOE<br>Aide Sociale Étudiants</h2>
        <p data-aos="fade-up" data-aos-delay="200">initiative de solidarité, engagée à soutenir les étudiants en
          difficulté.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="login" class="btn-get-started">Connexion</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/aisoe.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Qui sommes-nous ?</h3>
            <p class="fst-italic">
              AISOE (Aide Sociale Étudiants). une initiative étudiante née au sein de la Faculté de Médecine
              et Santé Communautaire de l’Université Évangélique en Afrique.
              notre objectif est d’apporter un soutien concret aux étudiants confrontés à des difficultés financières
              afin de leur permettre de poursuivre leurs études jusqu’à leur accomplissement.
            </p>
            <p>
              Dans un contexte marqué par l’instabilité, la précarité et les défis sociaux qui touchent plusieurs
              familles de l’Est de la RDC, AISOE se présente comme une réponse de solidarité, d’entraide et d’espoir. Le
              projet mobilise les étudiants, les enseignants, les anciens, les églises, les partenaires et les personnes
              de bonne volonté autour d’une même vision : empêcher qu’un étudiant abandonne ses études faute de moyens.
            </p>
            <!-- <ul>
              <li><i class="bi bi-check-circle"></i> <span>AISOE : la solidarité au service de la réussite étudiante.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Ensemble, aidons les étudiants à aller jusqu’au bout.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>AISOE, un soutien concret pour l’avenir des jeunes.</span></li>
            </ul> -->
            <a href="#" class="read-more"><span>Lire plus</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->


    <!-- But, Objectifs, Mission, Fonctionnements Section -->
    <section id="why-us" class="section why-us light-background">

      <div class="container">

        <div class="row gy-4">
          <div class="col-xl-4 bg-danger" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">

              <i class="bi bi-arrow-up-right-circle"></i>
              <h4>But</h4>
              <p>donner la chance aux étudiants démunis vaillants et ambitieux à risque
                d’abandonner les études, de poursuivre jusqu’à achever leur cursus académique ; et promouvoir
                les valeurs socio-culturelles africaines et entrepreneuriales dans notre champ d’action, ce qui sera
                possible par la formation, l’information, la sensibilisation et la participation massive. </p>
            </div>
          </div><!-- End Icon Box -->
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">


                  <i class="bi bi-bullseye"></i>
                  <h4>Objectifs</h4>
                  <p>identifier les étudiants en risque d’abandon, les soutenir moralement et financièrement,
                    mobiliser des fonds et encourager l’esprit entrepreneurial chez les jeunes.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">

                  <i class="bi bi-rocket"></i>
                  <h4>Mission</h4>
                  <p>prévenir l’abandon scolaire en mobilisant des ressources
                    pour payer ou compléter les frais académiques des étudiants en difficulté. </p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gear"></i>
                  <h4>Fonctionnements</h4>
                  <p>cotisations, dons des enseignants, contributions de personnes de bonne volonté,
                    soutien des églises, dons en ligne, activités académiques et partenariats.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- end But, Objectifs, Mission, Fonctionnements Section -->

    <!-- Partenaires Section -->
    <section id="features" class="features section py-5">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Partenaires</h2>
        <p>Voici nos partenaires</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <!-- <i class="bi bi-eye" style="color: #ffbb2c;"></i> -->
              <img src="assets/img/aisoe.jpg" alt="UEA BUKAVU" class="img-fluid" style="width: 50px; height: 50px;"> 
              <h3><a href="" class="stretched-link">UEA BUKAVU</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item">
              <i class="bi bi-infinity" style="color: #5578ff;"></i>
              <h3><a href="" class="stretched-link">UOB BUKAVU</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item">
              <i class="bi bi-mortarboard" style="color: #e80368;"></i>
              <h3><a href="" class="stretched-link">ISTM BUKAVU</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item">
              <i class="bi bi-nut" style="color: #e361ff;"></i>
              <h3><a href="" class="stretched-link">AUMOPRO UEA</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item">
              <i class="bi bi-shuffle" style="color: #47aeff;"></i>
              <h3><a href="" class="stretched-link">EGLISE SINAI PANZI</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item">
              <i class="bi bi-star" style="color: #ffa76e;"></i>
              <h3><a href="" class="stretched-link">EGLISE SAINT PIERRE</a></h3>
            </div>
          </div><!-- End Feature Item -->

        </div>

      </div>

    </section><!-- end Partenaires Section -->

    <!-- Activities Section -->
    <section id="courses" class="courses section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>voir nos recents activités</h2>
        <p>Les Activités</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">
          <?php
          $homeactivite = "SELECT * FROM activite WHERE statut='1' ORDER BY created__at DESC LIMIT 6";
          $homeactivite_run = mysqli_query($con, $homeactivite);
          if (mysqli_num_rows($homeactivite_run) > 0) {
            foreach ($homeactivite_run as $homeItems) {
          ?>
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="course-item">
                  <div class="image-box">
                    <img src="admin/assets/uploads/activite/<?= $homeItems['photo']; ?>" alt="..." class="img-fluid image-box-img">
                  </div>
                  <div class="course-content">

                    <h3><a href="activite-details.php?id=<?= $homeItems['id']; ?>"><?= $homeItems['titre']; ?></a></h3>
                    <p class="description"><?= $homeItems['description']; ?></p>
                    <div class="trainer d-flex justify-content-between align-items-center">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="activite-details.php?id=<?= $homeItems['id']; ?>" class="category">Lire plus</a>
                      </div>
                      <div class="trainer-rank d-flex align-items-center">
                        <i class="bi bi-calendar-fill"></i>&nbsp;<?= date('d/m/Y', strtotime($homeItems['created__at'])); ?>&nbsp;&nbsp;
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- End Course Item-->
          <?php
            }
          }
          ?>
        </div>

      </div>

    </section><!-- End Activities Section -->

    <!-- Trainers Index Section -->
    <section id="trainers-index" class="section trainers-index ">

      <!-- Membres Section -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Membres du </h2>
        <p> CONSEIL D’ADMINISTRATION</p>
      </div><!-- end Membres Section -->

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Docteur Isaac</h4>
                <span>Coordinateur Provincial</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut
                  aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Sarah Kakule</h4>
                <span>President</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum
                  temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>William Anderson</h4>
                <span>Conseiller</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter-x"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Trainers Index Section -->

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