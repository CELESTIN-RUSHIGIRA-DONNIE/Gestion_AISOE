<?php
session_start();
if (!isset($_SESSION['auth_user'])) {
    $_SESSION['message'] = "Connectez-vous d'abord !";
    $_SESSION["msg_type"] = "warning";
    header("Location: ../login.php");
    exit(0);
}
include('conf/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>AISOE - Abonnés</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>

            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>


            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav user-menu">

                <li class="nav-item dropdown noti-dropdown me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="assets/img/icons/header-icon-05.svg" alt="">
                    </a>
                </li>

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list">
                        <img src="assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <?php
                            // Vérifie si une image est définie pour l'utilisateur connecté
                            $user_image = !empty($_SESSION['auth_user']['photo'])
                                ? 'assets/uploads/' . $_SESSION['auth_user']['photo']   // Chemin vers la photo uploadée
                                : 'assets/images/default.jpg';             // Image par défaut
                            ?>
                            <img class="rounded-circle" src="<?= htmlspecialchars($user_image); ?>" width="31"
                                alt="profile image">
                            <div class="user-text">
                                <h6><?= $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] ?></h6>
                                <p class="text-muted mb-0"><?= $_SESSION['auth_user']['fonction'] ?></p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <?php
                                // Vérifie si une image est définie pour l'utilisateur connecté
                                $user_image = !empty($_SESSION['auth_user']['photo'])
                                    ? 'assets/uploads/' . $_SESSION['auth_user']['photo']   // Chemin vers la photo uploadée
                                    : 'assets/images/default.jpg';             // Image par défaut
                                ?>
                                <img class="rounded-circle" src="<?= htmlspecialchars($user_image); ?>" width="31"
                                    alt="profile image">
                            </div>
                            <div class="user-text">
                                <h6><?= $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] ?></h6>
                                <p class="text-muted mb-0"><?= $_SESSION['auth_user']['fonction']  ?></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <form action="logout.php" method="POST">
                            <button type="submit" class="dropdown-item" name="logout">Logout</button>
                        </form>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li class="submenu">
                            <a href="index.php"><span> Dashboard</span></a>
                        </li>
                        <li class="submenu ">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Membre</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="liste_membre.php">Liste Membres</a></li>
                                <li><a href="ajouter_membre.php">Ajouter Membres</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Publier</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="activite.php">Activités</a></li>
                                <li><a href="evenement.php">Événements</a></li>
                                <li><a href="temoignage.php">Témoignages</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Management</span>
                        </li>
                        <li class="active">
                            <a href="abonne.php"><i class="fas fa-holly-berry"></i> <span>Subscribes</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Compose un Newsletter</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                                <li class="breadcrumb-item active">Compose</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <ul class="inbox-menu">
                            <li class="active">
                                <a href="#"><i class="fas fa-download"></i> Inbox <span
                                        class="mail-count">(5)</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="far fa-star"></i> Important</a>
                            </li>
                            <li>
                                <a href="#"><i class="far fa-paper-plane"></i> Sent Mail</a>
                            </li>
                            <li>
                                <a href="#"><i class="far fa-file-alt"></i> Drafts <span
                                        class="mail-count">(13)</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="far fa-trash-alt"></i> Trash</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="mes.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" placeholder=" To:" value="à nos abonné(e)s" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject" name="Subject" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control" name="message"
                                            placeholder="Enter your message here"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="text-center">
                                            <button type="submit" name="send_newslatter" class="btn btn-primary"><i class="fas fa-paper-plane m-r-5"></i>
                                                <span>Send</span></button>
                                            <!-- <button class="btn btn-success m-l-5" type="button"> <i
                                                    class="far fa-save m-r-5"></i> <span>Draft</span></button>
                                            <button class="btn btn-danger m-l-5" type="button"> <i
                                                    class="far fa-trash-alt m-r-5"></i><span>Delete</span></button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p>Copyright © <a href="mailto:celestinrushigiradonnie@gmail.com">CELESTIN RUSHIGIRA Donnie</a> <?= date('d/m/Y'); ?></p>
        </footer>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>