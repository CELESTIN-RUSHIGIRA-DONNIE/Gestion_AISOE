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
    <title>AISOE - Activités</title>

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

                        <li class="submenu active">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Publier</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="activite.php" class="active">Activités</a></li>
                                <li><a href="evenement.php">Événements</a></li>
                                <li><a href="temoignage.php">Témoignages</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Management</span>
                        </li>
                        <li>
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
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Activités</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="activite.php">Liste des Activités</a></li>
                                    <li class="breadcrumb-item active">Toutes les activités</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Contenus de l'activité</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['id'])) {
                                    $activite_id = $_GET['id'];
                                    $activite = "SELECT * FROM activite WHERE id ='$activite_id'";
                                    $activite_run = mysqli_query($con, $activite);

                                    if (mysqli_num_rows($activite_run) > 0) {
                                        $activite_row = mysqli_fetch_array($activite_run)
                                ?>
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="activite_id" value="<?= $activite_row['id']; ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Titre :</label>
                                                        <input type="text" b value="<?= $activite_row['titre'] ?>" name="titre" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Description : </label>
                                                        <textarea rows="3" cols="3" class="form-control" name="description" placeholder="Enter description"><?= $activite_row['description'] ?></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Contenu : </label>
                                                        <textarea rows="5" cols="5" class="form-control" name="contenu" placeholder="Enter message"><?= $activite_row['detail'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Image :</label>
                                                        <input type="hidden" name="old_photo" value="<?= $activite_row['photo']; ?>" class="form-control">
                                                        <input type="file" name="new_photo" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Visible : </label>
                                                        <input type="checkbox" name="visible" <?= $activite_row['statut'] == 1 ? 'checked' : '' ?> width="70px" height="70px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" name="edit_activite" class="btn btn-primary">Modifier</button>
                                            </div>
                                        </form>
                                <?php

                                    }
                                }
                                ?>
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