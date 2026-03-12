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

<?php
require 'assets/config/db.php';

$continent = 'Asien';

$stmt = $dbh->prepare("SELECT * FROM postcard WHERE continent = :continent ORDER BY created_at DESC");
$stmt->execute(['continent' => $continent]);
$postcards = $stmt->fetchAll();
?>

<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Vykort från Asien</h1>
            <a href="add_postcard.php" class="btn btn-dark">Ladda upp vykort</a>
        </div>

        <?php if ($postcards): ?>
            <?php foreach ($postcards as $row): ?>
                <div class="card shadow-sm mb-4 p-4">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7">
                            <img src="<?= htmlspecialchars($row['image_path']) ?>"
                                alt="<?= htmlspecialchars($row['title']) ?>"
                                class="img-fluid rounded">
                        </div>

                        <div class="col-lg-5">
                            <h2 class="h4"><?= htmlspecialchars($row['title']) ?></h2>
                            <p class="text-muted">
                                <?= htmlspecialchars($row['city']) ?>, <?= htmlspecialchars($row['country']) ?>
                            </p>
                            <p><?= nl2br(htmlspecialchars($row['message'])) ?></p>

                            <div class="mt-4">
                                <h3 class="h6">Kommentarer</h3>
                                <p class="border-bottom pb-2">Vilket fint ställe!</p>
                                <p class="border-bottom pb-2">Dit vill jag resa.</p>
                                <p class="border-bottom pb-2">Älskar bilden.</p>
                            </div>

                            <p class="small text-muted mt-3 mb-0">
                                Publicerad: <?= htmlspecialchars($row['created_at']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">Det finns inga vykort från Asien ännu.</div>
        <?php endif; ?>
    </div>

</body>

</html>