<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
$a = [];
$apps = getAllApplications($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cybersecurity Job Application</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="topbar"><div class="wrap">
  <h1>🛡️ Cybersecurity Job Application</h1>
  <p>Submit and manage applications for security roles</p>
</div></header>

<main class="wrap">
  <?php if (isset($_GET['msg'])): ?><div class="msg"><?= h($_GET['msg']) ?></div><?php endif; ?>

  <section class="card">
    <h2>New Application</h2>
    <form action="core/handleForms.php" method="POST">
      <?php include 'form_fields.php'; ?>
      <div class="actions"><button class="btn btn-primary" type="submit" name="insertBtn">Submit Application</button></div>
    </form>
  </section>

  <section class="card">
    <div class="head"><h2>Submitted Applications</h2><span class="count"><?= count($apps) ?> total</span></div>
    <div class="table-scroll">
    <table>
      <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Position</th><th>Yrs Exp</th><th>Certifications</th><th>Date Added</th><th>Actions</th></tr>
      <?php if (!$apps): ?>
        <tr><td colspan="10" class="empty">No applications yet. Submit one above.</td></tr>
      <?php endif; ?>
      <?php foreach ($apps as $row): ?>
      <tr>
        <td><?= h($row['id']) ?></td>
        <td><?= h($row['first_name']) ?></td>
        <td><?= h($row['last_name']) ?></td>
        <td><?= h($row['email']) ?></td>
        <td><?= h($row['phone']) ?></td>
        <td><span class="badge"><?= h($row['position_applied']) ?></span></td>
        <td><?= h($row['years_experience']) ?></td>
        <td><?= h($row['certifications']) ?></td>
        <td><?= h(date('M d, Y h:i A', strtotime($row['date_added']))) ?></td>
        <td><div class="cell-actions">
          <a class="btn btn-edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
          <form action="core/handleForms.php" method="POST" onsubmit="return confirm('Delete this application?')">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button class="btn btn-del" type="submit" name="deleteBtn">Delete</button>
          </form>
        </div></td>
      </tr>
      <?php endforeach; ?>
    </table>
    </div>
  </section>
</main>
</body>
</html>
