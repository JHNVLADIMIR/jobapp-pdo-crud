<?php
require_once 'dbConfig.php';
require_once 'models.php';

function f($k) { return trim($_POST[$k] ?? ''); }

if (isset($_POST['insertBtn'])) {
    insertApplication($pdo, f('first_name'), f('last_name'), f('email'), f('phone'), f('position_applied'), (int)f('years_experience'), f('certifications'));
    header("Location: ../index.php?msg=Application+added");
}
if (isset($_POST['updateBtn'])) {
    updateApplication($pdo, (int)$_POST['id'], f('first_name'), f('last_name'), f('email'), f('phone'), f('position_applied'), (int)f('years_experience'), f('certifications'));
    header("Location: ../index.php?msg=Application+updated");
}
if (isset($_POST['deleteBtn'])) {
    deleteApplication($pdo, (int)$_POST['id']);
    header("Location: ../index.php?msg=Application+deleted");
}
?>
