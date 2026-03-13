<?php
require_once 'assets/config/db.php';
require_once 'assets/includes/header.php';

$continent = 'Asien';

$stmt = $dbh->prepare("SELECT * FROM postcard WHERE continent = :continent ORDER BY created_at DESC");
$stmt->execute(['continent' => $continent]);
$postcards = $stmt->fetchAll();
?>

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
                            class="img-fluid rounded w-100">
                    </div>

                    <div class="col-lg-5 position-relative postcard-back">
                        <div class="stamp-box">
                            <span class="stamp-country"><?= htmlspecialchars($row['country']) ?></span>
                            <span class="stamp-city"><?= htmlspecialchars($row['city']) ?></span>
                        </div>

                        <h2 class="h4 pe-5"><?= htmlspecialchars($row['title']) ?></h2>

                        <p class="text-muted mb-2">
                            <?= htmlspecialchars($row['city']) ?>,
                            <?= htmlspecialchars($row['country']) ?>
                        </p>

                        <p><?= nl2br(htmlspecialchars($row['message'])) ?></p>

                        <p class="small text-muted mt-3 mb-0">
                            Publicerad: <?= htmlspecialchars($row['created_at']) ?>
                        </p>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-outline-dark btn-sm">
                        Kommentera
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info">Det finns inga vykort från Asien ännu.</div>
    <?php endif; ?>
</div>

<?php require_once 'assets/includes/footer.php'; ?>