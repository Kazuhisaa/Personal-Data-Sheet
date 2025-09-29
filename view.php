<?php
// view.php
include './config/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM personal_data_sheet WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>View Person</title>
<style>body{font-family:Arial;background:#f4f4f4;padding:20px}.card{max-width:1000px;margin:auto;background:#fff;padding:20px;border-radius:8px}</style>
</head>
<body>
  <div class="card">
    <h2>View Person</h2>
    <?php if (!$row): ?>
      <p>No record found. <a href="index.php">Back</a></p>
      <?php exit; endif; ?>

    <h3><?= htmlspecialchars(trim($row['first_name'].' '.$row['middle_name'].' '.$row['last_name'].' '.$row['name_extension'])) ?></h3>

    <p><strong>Birth Date:</strong> <?= htmlspecialchars($row['birth_date']) ?></p>
    <p><strong>Sex:</strong> <?= htmlspecialchars($row['sex']) ?></p>
    <p><strong>Height/Weight:</strong> <?= htmlspecialchars($row['height'].' / '.$row['weight']) ?></p>
    <p><strong>Civil Status:</strong> <?= htmlspecialchars($row['civil_status']) ?></p>
    <p><strong>Telephone / Mobile / Email:</strong> <?= htmlspecialchars($row['telephone_no'].' / '.$row['mobile_no'].' / '.$row['email']) ?></p>
    <p><strong>Blood Type:</strong> <?= htmlspecialchars($row['blood_type']) ?></p>
    <p><strong>Citizenship / Dual Country:</strong> <?= htmlspecialchars($row['citizenship_status'].' / '.$row['dual_country']) ?></p>

    <h4>Residential Address</h4>
    <p><?= htmlspecialchars($row['res_house'].' '.$row['res_street'].' '.$row['res_subdivision'].' '.$row['res_barangay'].' '.$row['res_city'].' '.$row['res_province'].' '.$row['res_zip_code']) ?></p>

    <h4>Permanent Address</h4>
    <p><?= htmlspecialchars($row['perm_house'].' '.$row['perm_street'].' '.$row['perm_subdivision'].' '.$row['perm_barangay'].' '.$row['perm_city'].' '.$row['perm_province'].' '.$row['perm_zip_code']) ?></p>

    <h4>Government IDs</h4>
    <p>GSIS: <?= htmlspecialchars($row['gsis_id']) ?> | SSS: <?= htmlspecialchars($row['sss_no']) ?> | PAGIBIG: <?= htmlspecialchars($row['pagibig_id']) ?></p>
    <p>TIN: <?= htmlspecialchars($row['tin_no']) ?> | PHILHEALTH: <?= htmlspecialchars($row['philhealth_id']) ?> | Agency No: <?= htmlspecialchars($row['agency_employee_no']) ?></p>

    <p style="margin-top:16px"><a href="edit.php?id=<?= $row['id'] ?>">✏ Edit</a> | <a href="index.php">⬅ Back</a></p>
  </div>
</body>
</html>
