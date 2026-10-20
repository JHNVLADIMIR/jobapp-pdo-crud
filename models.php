<?php
function h($s) { return htmlspecialchars((string)$s); }
function insertApplication($pdo, $fn, $ln, $email, $phone, $position, $years, $certs) {
    $stmt = $pdo->prepare("INSERT INTO job_applications (first_name, last_name, email, phone, position_applied, years_experience, certifications) VALUES (?,?,?,?,?,?,?)");
    return $stmt->execute([$fn, $ln, $email, $phone, $position, $years, $certs]);
}
function getAllApplications($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM job_applications ORDER BY id DESC");
    return $stmt->execute() ? $stmt->fetchAll() : [];
}
function getApplicationByID($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM job_applications WHERE id = ?");
    return $stmt->execute([$id]) ? $stmt->fetch() : null;
}
function updateApplication($pdo, $id, $fn, $ln, $email, $phone, $position, $years, $certs) {
    $stmt = $pdo->prepare("UPDATE job_applications SET first_name=?, last_name=?, email=?, phone=?, position_applied=?, years_experience=?, certifications=? WHERE id=?");
    return $stmt->execute([$fn, $ln, $email, $phone, $position, $years, $certs, $id]);
}
function deleteApplication($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM job_applications WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
