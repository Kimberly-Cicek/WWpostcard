<?php
require_once 'assets/functions/photo.uploads.php';
require_once 'assets/includes/display_errors.php';
require_once 'assets/config/db.php';
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asien - Vykortsflöde</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<header class="p-3 border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-md">
            <a href="index.html" class="navbar-brand">
                <i class="fa-solid fa-camera"></i>
                <span class="ms-1">Pixie</span>
            </a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Startsidan</a>
                </li>
                <li class="nav-item"><a href="feed.asia.php" class="nav-link">Asien</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Tjänster</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Kontakt</a></li>