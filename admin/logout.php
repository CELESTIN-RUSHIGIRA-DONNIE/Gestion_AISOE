<?php
    session_start();
    
    if (isset($_POST['logout'])) {
        session_destroy();
        $_SESSION['message'] = "Vous avez été déconnecté avec succès";
        $_SESSION['msg_type'] = "success";
        header("Location: ../login");
        exit();
    }
?>