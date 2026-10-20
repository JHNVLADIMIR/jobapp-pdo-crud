<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
$a = getApplicationByID($pdo, (int)($_GET['id'] ?? 0));
if (!$a) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Application</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="topbar"><div class="wrap">
  <h1>🛡️ Cybersecurity Job Application</h1>
  <p>Editing application #<?= h($a['id']) ?></p>
</div></header>

<main class="wrap">
  <section class="card">
    <h2>Edit Application</h2>
    <form action="core/handleForms.php" method="POST">
      <input type="hidden" name="id" value="<?= h($a['id']) ?>">
      <?php include 'form_fields.php'; ?>
      <div class="actions">
        <button class="btn btn-primary" type="submit" name="updateBtn">Update Application</button>
        <a class="btn btn-ghost" href="index.php">Cancel</a>
      </div>
    </form>
  </section>
</main>
</body>
</html>
