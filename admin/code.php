<?php

session_start();
include("conf/dbcon.php");

if (isset($_POST["add_member"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    // // Générer un code_agent unique
    // do {
    //     $code_agent = 'AG' . date('YmdHis') . rand(10, 99);
    //     $check_code_query = "SELECT code_agent FROM agents WHERE code_agent = '$code_agent'";
    //     $check_code_run = mysqli_query($con, $check_code_query);
    // } while (mysqli_num_rows($check_code_run) > 0);

    $nom = mysqli_real_escape_string($con, $_POST['first_name']);
    $postnom = mysqli_real_escape_string($con, $_POST['last_name']);
    $prenom = mysqli_real_escape_string($con, $_POST['middle_name']);
    $genre = mysqli_real_escape_string($con, $_POST['gender']);
    $telephone = mysqli_real_escape_string($con, $_POST['phone_number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $institution = mysqli_real_escape_string($con, $_POST['institution']);
    $faculte = mysqli_real_escape_string($con, $_POST['faculty']);
    $promotion = mysqli_real_escape_string($con, $_POST['promotion']);
    $civil_status = mysqli_real_escape_string($con, $_POST['civil_status']);
    $profession = mysqli_real_escape_string($con, $_POST['profession']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $function = mysqli_real_escape_string($con, $_POST['function']);
    $type_membre = mysqli_real_escape_string($con, $_POST['type_membre']);
    $presentation = mysqli_real_escape_string($con, $_POST['presentation']);

    $image = $_FILES['photo']['name'];
    $image_tmp = $_FILES['photo']['tmp_name'];

    // Vérification de l'image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
        header("Location: add-profile.php");
        exit;
    }

    $check_membre_query = "SELECT email FROM membre WHERE email='$email'";
    $check_membre_query_run = mysqli_query($con, $check_membre_query);

    if (mysqli_num_rows($check_membre_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Ce membre existe déjà.'];
        header("Location: ajouter_membre.php");
        exit;
    } else {
        $insert_query = "INSERT INTO membre (nom, postnom, prenom, sexe, telephone, email, institution, faculte, promotion, etat_civil, profession, adress, fonction, type_membre, photo,presentation) 
        VALUES ('$nom', '$postnom', '$prenom', '$genre', '$telephone', '$email', '$institution', '$faculte', '$promotion', '$civil_status', '$profession', '$address', '$function', '$type_membre', '$image','$presentation')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) {
            move_uploaded_file($image_tmp, "assets/uploads/" . $image);
            $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Membre ajouté avec succès.'];
            header("Location: ajouter_membre.php");
            exit;
        } else {
            $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de l\'ajout du membre.'];
            header("Location: ajouter_membre.php");
            exit;
        }
    }
} else if (isset($_POST["edit_member"])) {

    $member_id = mysqli_real_escape_string($con, $_POST['member_id']);

    $nom = mysqli_real_escape_string($con, $_POST['first_name']);
    $postnom = mysqli_real_escape_string($con, $_POST['last_name']);
    $prenom = mysqli_real_escape_string($con, $_POST['middle_name']);
    $genre = mysqli_real_escape_string($con, $_POST['gender']);
    $telephone = mysqli_real_escape_string($con, $_POST['phone_number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $institution = mysqli_real_escape_string($con, $_POST['institution']);
    $faculte = mysqli_real_escape_string($con, $_POST['faculty']);
    $promotion = mysqli_real_escape_string($con, $_POST['promotion']);
    $civil_status = mysqli_real_escape_string($con, $_POST['civil_status']);
    $profession = mysqli_real_escape_string($con, $_POST['profession']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $function = mysqli_real_escape_string($con, $_POST['function']);
    $type_membre = mysqli_real_escape_string($con, $_POST['type_membre']);
    $presentation = mysqli_real_escape_string($con, $_POST['presentation']);

    $old_filename = $_POST['old_photo'];
    $image = $_FILES['new_photo']['name'];

    $new_filename = $old_filename;

    if (!empty($image)) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
            header("Location: edit_membre.php?id=$member_id");
            exit;
        }

        $upload_dir = "assets/uploads/";

        if (!empty($old_filename) && file_exists($upload_dir . $old_filename)) {
            unlink($upload_dir . $old_filename);
        }

        $new_filename = time() . '_' . basename($image);
        move_uploaded_file($_FILES['new_photo']['tmp_name'], $upload_dir . $new_filename);
    }

    $query = "UPDATE membre SET nom='$nom', postnom='$postnom', prenom='$prenom', sexe='$genre', 
    telephone='$telephone', email='$email', institution='$institution', faculte='$faculte', promotion='$promotion', 
    etat_civil='$civil_status', profession='$profession', adress='$address', fonction='$function', type_membre='$type_membre',
    photo='$new_filename', presentation='$presentation' WHERE id='$member_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Membre mis à jour avec succès.'];
        header("Location: edit_membre.php?id=$member_id");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de la mise à jour du membre.'];
        header("Location: edit_membre.php?id=$member_id");
        exit;
    }
} else if (isset($_POST['delete_membre'])) {
    $member_id = $_POST['delete_membre'];

    $query = "UPDATE membre SET status='0' WHERE id='$member_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Membre supprimé avec succès.'];
        header("Location: liste_membre.php");
        exit(0);
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de la suppression du membre.'];
        header("Location: liste_membre.php");
        exit(0);
    }
}

// Activité

else if (isset($_POST["add_activite"])) {

    $titre = mysqli_real_escape_string($con, $_POST['titre']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $contenu = mysqli_real_escape_string($con, $_POST['contenu']);
    $visible = isset($_POST['visible']) ? 1 : 0;

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Vérification de l'image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
        header("Location: activite.php");
        exit;
    }

    $insert_query = "INSERT INTO activite (titre, description, detail, photo, statut) 
                     VALUES ('$titre', '$description', '$contenu', '$image', '$visible')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
        move_uploaded_file($image_tmp, "assets/uploads/activite/" . $image);
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Activité ajoutée avec succès.'];
        header("Location: activite.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de l\'ajout de l\'activité.'];
        header("Location: activite.php");
        exit;
    }
} else if (isset($_POST["edit_activite"])) {

    $activite_id = mysqli_real_escape_string($con, $_POST['activite_id']);

    $titre = mysqli_real_escape_string($con, $_POST['titre']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $contenu = mysqli_real_escape_string($con, $_POST['contenu']);
    $visible = isset($_POST['visible']) ? 1 : 0;

    $old_filename = $_POST['old_photo'];
    $image = $_FILES['new_photo']['name'];

    $new_filename = $old_filename;

    if (!empty($image)) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
            header("Location: edit_activite.php?id=$activite_id");
            exit;
        }

        $upload_dir = "assets/uploads/activite/";

        if (!empty($old_filename) && file_exists($upload_dir . $old_filename)) {
            unlink($upload_dir . $old_filename);
        }

        $new_filename = time() . '_' . basename($image);
        move_uploaded_file($_FILES['new_photo']['tmp_name'], $upload_dir . $new_filename);
    }

    $query = "UPDATE activite SET titre='$titre', description='$description', detail='$contenu', 
              photo='$new_filename', statut='$visible' WHERE id='$activite_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Activité mise à jour avec succès.'];
        header("Location: edit_activite.php?id=$activite_id");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de la mise à jour de l\'activité.'];
        header("Location: edit_activite.php?id=$activite_id");
        exit;
    }
} else if (isset($_POST['delete_activite'])) {
    $activite_id = $_POST['delete_activite'];

    $check_img_query = "SELECT * FROM activite WHERE id='$activite_id' LIMIT 1";
    $img_res = mysqli_query($con, $check_img_query);
    $res_data = mysqli_fetch_array($img_res);
    $image = $res_data['photo'];

    $query = "DELETE FROM activite WHERE id='$activite_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('assets/uploads/activite/' . $image)) {
                unlink("assets/uploads/activite/" . $image);
            }
        }
        $_SESSION['message'] = "Activité supprimée avec succès";
        header('Location: liste_activite.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: liste_activite.php');
        exit(0);
    }
}

//Evenement

else if (isset($_POST["add_evenement"])) {

    $titre = mysqli_real_escape_string($con, $_POST['titre']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $contenu = mysqli_real_escape_string($con, $_POST['contenu']);
    $visible = isset($_POST['visible']) ? 1 : 0;

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Vérification de l'image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
        header("Location: evenement.php");
        exit;
    }

    $insert_query = "INSERT INTO evenement (titre, description, detail, photo, statut) 
                     VALUES ('$titre', '$description', '$contenu', '$image', '$visible')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
        move_uploaded_file($image_tmp, "assets/uploads/evenement/" . $image);
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Evenement ajouté avec succès.'];
        header("Location: evenement.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de l\'ajout de l\'evenement.'];
        header("Location: evenement.php");
        exit;
    }
} else if (isset($_POST["edit_evenement"])) {

    $evenement_id = mysqli_real_escape_string($con, $_POST['evenement_id']);

    $titre = mysqli_real_escape_string($con, $_POST['titre']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $contenu = mysqli_real_escape_string($con, $_POST['contenu']);
    $visible = isset($_POST['visible']) ? 1 : 0;

    $old_filename = $_POST['old_photo'];
    $image = $_FILES['new_photo']['name'];

    $new_filename = $old_filename;

    if (!empty($image)) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Format d\'image non valide.'];
            header("Location: edit_evenement.php?id=$evenement_id");
            exit;
        }

        $upload_dir = "assets/uploads/evenement/";

        if (!empty($old_filename) && file_exists($upload_dir . $old_filename)) {
            unlink($upload_dir . $old_filename);
        }

        $new_filename = time() . '_' . basename($image);
        move_uploaded_file($_FILES['new_photo']['tmp_name'], $upload_dir . $new_filename);
    }

    $query = "UPDATE evenement SET titre='$titre', description='$description', detail='$contenu', 
              photo='$new_filename', statut='$visible' WHERE id='$evenement_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success', 'message' => 'Evenement mis à jour avec succès.'];
        header("Location: edit_evenement.php?id=$evenement_id");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error', 'message' => 'Erreur lors de la mise à jour de l\'evenement.'];
        header("Location: edit_evenement.php?id=$evenement_id");
        exit;
    }
} else if (isset($_POST['delete_evenement'])) {
    $evenement_id = $_POST['delete_evenement'];

    $check_img_query = "SELECT * FROM evenement WHERE id='$evenement_id' LIMIT 1";
    $img_res = mysqli_query($con, $check_img_query);
    $res_data = mysqli_fetch_array($img_res);
    $image = $res_data['photo'];

    $query = "DELETE FROM evenement WHERE id='$evenement_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('assets/uploads/evenement/' . $image)) {
                unlink("assets/uploads/evenement/" . $image);
            }
        }
        $_SESSION['message'] = "Evenement supprimé avec succès";
        header('Location: liste_evenement.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: liste_evenement.php');
        exit(0);
    }
}

// Validation Temoignage

else if (isset($_POST['validation_temoignage'])) {
    $temoignage_id = $_POST['validation_temoignage'];

    $query = "UPDATE temoignage SET statut='1' WHERE id='$temoignage_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Temoignage validé avec succès.";
        $_SESSION['msg_type'] = "success";
        header("Location: temoignage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Erreur lors de la validation du temoignage.";
        $_SESSION['msg_type'] = "danger";
        header("Location: temoignage.php");
        exit(0);
    }
} else if (isset($_POST['rejet_temoignage'])) {
    $temoignage_id = $_POST['rejet_temoignage'];

    $query = "UPDATE temoignage SET statut='2' WHERE id='$temoignage_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Temoignage rejeté avec succès.";
        $_SESSION['msg_type'] = "success";
        header("Location: temoignage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Erreur lors du rejet du temoignage.";
        $_SESSION['msg_type'] = "danger";
        header("Location: temoignage.php");
        exit(0);
    }
}

//Partenaire
else if (isset($_POST["Enregistrer_partenaire"])) {

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $visible = isset($_POST['visible']) ? 1 : 0;

    $image = $_FILES['photo']['name'];
    $image_tmp = $_FILES['photo']['tmp_name'];

    // Vérification de l'image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['message'] = "Format d'image non valide.";
        $_SESSION['msg_type'] = "danger";
        header('Location: partenaire.php');
        exit;
    }

    $check_membre_query = "SELECT nom FROM partenaire WHERE nom='$nom'";
    $check_membre_query_run = mysqli_query($con, $check_membre_query);

    if (mysqli_num_rows($check_membre_query_run) > 0) {

        $_SESSION['message'] = "Ce partenaire existe déjà.";
        $_SESSION['msg_type'] = "danger";
        header('Location: partenaire');
        exit;
    } else {
        $insert_query = "INSERT INTO partenaire (nom,adresse,description,photo,status) 
        VALUES ('$nom','$adresse','$description','$image','$visible')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if ($insert_query_run) {
            move_uploaded_file($image_tmp, "assets/uploads/partenaire/" . $image);
            $_SESSION['message'] = "Partenaire Ajouter Avec Succès";
            $_SESSION['msg_type'] = "success";
            header('Location: partenaire');
            exit;
        } else {
            $_SESSION['message'] = "Erreur lors de l'enregistrement";
            $_SESSION['msg_type'] = "danger";
            header('Location: partenaire');
            exit;
        }
    }
} else if (isset($_POST["Modifier_partenaire"])) {

    $member_id = mysqli_real_escape_string($con, $_POST['member_id']);

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $visible = isset($_POST['visible']) ? 1 : 0;

    $old_filename = $_POST['old_photo'];
    $image = $_FILES['new_photo']['name'];

    $new_filename = $old_filename;

    if (!empty($image)) {
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            $_SESSION['message'] = "Format d'image non valide.";
            $_SESSION['msg_type'] = "danger";
            header('Location: edit_partenaire.php?id=$member_id');
            exit;
        }

        $upload_dir = "assets/uploads/partenaire/";

        if (!empty($old_filename) && file_exists($upload_dir . $old_filename)) {
            unlink($upload_dir . $old_filename);
        }

        $new_filename = time() . '_' . basename($image);
        move_uploaded_file($_FILES['new_photo']['tmp_name'], $upload_dir . $new_filename);
    }

    $query = "UPDATE partenaire SET nom='$nom', adresse='$adresse', description='$description', status='$visible', photo='$new_filename' WHERE id='$member_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Partenaire mis à jour avec succès.";
        $_SESSION['msg_type'] = "success";
        header('Location: ajouter_partenaire.php');
        exit;
    } else {
        $_SESSION['message'] = "Erreur lors de la mise à jour du partenaire.";
        $_SESSION['msg_type'] = "danger";
        header("Location: edit_partenaire.php?id=$member_id");
        exit;
    }
} else if (isset($_POST['save_change'])) {

    $agent_id = (int) $_SESSION['auth_user']['id'];
    $old_password = $_POST['ancien_password'] ?? '';
    $new_password = $_POST['nouveau_password'] ?? '';
    $new_password_confirm = $_POST['confirm_nouveau_password'] ?? '';

    // 1. Vérifier que les deux nouveaux mots de passe sont identiques
    if ($new_password !== $new_password_confirm) {
        $_SESSION['message'] = "Les deux nouveaux mots de passe ne correspondent pas";
        $_SESSION['msg_type'] = "danger";
        header("Location: profile.php");
        exit;
    }

    // 2. Récupérer le mot de passe actuel en base
    $stmt = $con->prepare("SELECT password FROM membre WHERE id = ?");
    $stmt->bind_param('i', $agent_id);
    $stmt->execute();
    $stmt->bind_result($password_hash_db);
    if (!$stmt->fetch()) {
        $_SESSION['message'] = "Membre introuvable";
        $_SESSION['msg_type'] = "danger";
        header("Location: profile.php");
        exit;
    }
    $stmt->close();

    // 3. Vérifier l'ancien mot de passe
    if (!password_verify($old_password, $password_hash_db)) {
        $_SESSION['message'] = "Ancien mot de passe incorrect.";
        $_SESSION['msg_type'] = "danger";
        header("Location: profile.php");
        exit;
    }

    // 4. Hacher le nouveau mot de passe
    $new_hash = password_hash($new_password, PASSWORD_DEFAULT);

    // 5. Mettre à jour en base
    $stmt = $con->prepare("UPDATE membre SET password = ? WHERE id = ?");
    $stmt->bind_param('si', $new_hash, $agent_id);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Mot de passe modifié avec succès.";
        $_SESSION["msg_type"] = "success";
        header("Location: profile.php");
        exit;
    } else {

        $_SESSION['message'] = "Erreur lors de la mise à jour.";
        $_SESSION["msg_type"] = "success";
        header("Location: profile.php");
        exit;
    }
}
