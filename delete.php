<?php
// delete.php
include './config/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("DELETE FROM personal_data_sheet WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
header("Location: index.php");
exit;
