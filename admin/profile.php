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
    <title>AISOE | Profile</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
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
                    <a href="#" class="nav-link header-nav-list win-maximize">
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
                        <a class="dropdown-item" href="profile">My Profile</a>
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
                        <li class="submenu active">
                            <a href="index.php"><span> Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Membres</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="liste_membre.php">Liste Membres</a></li>
                                <li><a href="ajouter_membre.php">Ajouter Membre</a></li>
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
                        <li>
                            <a href="abonne.php"><i class="fas fa-holly-berry"></i> <span>Subscribes</span></a>
                        </li>
                        <li>
                            <a href="ajouter_partenaire"><i class="fa fa-handshake" aria-hidden="true"></i> <span>Partenaires</span></a>
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
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Tableau de Bord</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img class="rounded-circle" alt="User Image"
                                            src="assets/uploads/<?= htmlspecialchars($_SESSION['auth_user']['photo']) ?>">
                                    </a>
                                </div>
                                <div class="col ms-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0"><?= $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] . ' ' . $_SESSION['auth_user']['prenom'] ?></h4>
                                    <h6 class="text-muted"><?= $_SESSION['auth_user']['fonction'] ?></h6>
                                    <div class="user-Location"><i class="fas fa-map-marker-alt"></i> <?= $_SESSION['auth_user']['adress'] ?></div>
                                </div>
                                <div class="col-auto profile-btn">
                                    <a href="" class="btn btn-primary">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <div class="tab-pane fade show active" id="per_details_tab">

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if (isset($_SESSION['message'])) { ?>
                                                    <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible fade show mb-3" role="alert">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        <?php echo $_SESSION['message']; ?>
                                                    </div>
                                                    <?php unset($_SESSION['message'], $_SESSION['msg_type']); ?>
                                                <?php } ?>
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Details Personnelle</span>
                                                    <a class="edit-link" data-bs-toggle="modal"
                                                        href="#edit_personal_details"><i
                                                            class="far fa-edit me-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Noms</p>
                                                    <p class="col-sm-9"><?= $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] . ' ' . $_SESSION['auth_user']['prenom'] ?></p>
                                                </div>
                                                <!-- <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Date of
                                                        Birth</p>
                                                    <p class="col-sm-9">24 Jul 1983</p>
                                                </div> -->
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                                    <p class="col-sm-9"><a href="/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="a1cbcec9cfc5cec4e1c4d9c0ccd1cdc48fc2cecc"><?= $_SESSION['auth_user']['email'] ?></a>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-9"><?= $_SESSION['auth_user']['telephone'] ?></p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
                                                    <p class="col-sm-9 mb-0"><?= $_SESSION['auth_user']['adress'] ?><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Status de Compte</span>
                                                    <a class="edit-link" href="#"><i class="far fa-edit me-1"></i>
                                                        Edit</a>
                                                </h5>
                                                <button class="btn btn-success" type="button"><i
                                                        class="fe fe-check-verified"></i> Active</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                            <div id="password_tab" class="tab-pane fade">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Changer le mot de passe</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-12">
                                                <form action="code.php" method="post">
                                                    <div class="form-group">
                                                        <label>Ancien Mot de Passe</label>
                                                        <input type="password" name="ancien_password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nouveau Mot de Passe</label>
                                                        <input type="password" name="nouveau_password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirmer le nouveau mot de passe</label>
                                                        <input type="password" name="confirm_nouveau_password" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" name="save_change" type="submit">Modifier</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>