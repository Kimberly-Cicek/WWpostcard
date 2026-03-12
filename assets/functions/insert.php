<?php

if (isset($_POST['create_postcard'])) {
    $title = trim($_POST['title']);
    $message = trim($_POST['message']);
    $continent = trim($_POST['continent']);
    $country = trim($_POST['country']);
    $city = trim($_POST['city']);

    if (
        empty($title) ||
        empty($message) ||
        empty($continent) ||
        empty($country) ||
        empty($city)
    ) {
        echo '<div class="container mt-3"><div class="alert alert-danger">Alla fält måste fyllas i.</div></div>';
    } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
        echo '<div class="container mt-3"><div class="alert alert-danger">Du måste välja en bild.</div></div>';
    } else {
        $uploadDir = 'uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO postcard (title, message, image_path, continent, country, city, created_at)
                    VALUES (:title, :message, :image_path, :continent, :country, :city, NOW())";

            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':message' => $message,
                ':image_path' => $targetFile,
                ':continent' => $continent,
                ':country' => $country,
                ':city' => $city
            ]);

            header('Location: feed.asia.php');
            exit;
        } else {
            echo '<div class="container mt-3"><div class="alert alert-danger">Bilden kunde inte laddas upp.</div></div>';
        }
    }
}
