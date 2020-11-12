<?php
require "data/auth.php";
    session_start();
    session_destroy();
    header('location: connexion_admin.php');
    exit;
?>