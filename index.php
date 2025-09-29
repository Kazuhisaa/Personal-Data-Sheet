<?php
// index.php
include './config/db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PDS - List</title>
  <style>
    body{font-family:Arial;background:#f4f4f4;padding:20px}
    .card{max-width:1200px;margin:auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.08)}
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border:1px solid #e6e6e6;text-align:left}
    th{background:#4285f4;color:#fff}
    .actions a{margin-right:6px;text-decoration:none;padding:6px 8px;border-radius:4px;color:#fff}
    .view{background:#34a853} .edit{background:#fbbc05;color:#111} .del{background:#ea4335}
    .add{display:inline-block;margin-bottom:12px;padding:8px 12px;background:#4285f4;color:#fff;border-radius:6px;text-decoration:none}
  </style>
</head>
<body>
  <div class="card">
    <h2>Personal Data Sheet — List</h2>
    <a class="add" href="add.php">➕ Add New</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Mobile / Email</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
$stmt = $conn->prepare("SELECT id, first_name, middle_name, last_name, mobile_no, email, res_city, res_province FROM personal_data_sheet ORDER BY id DESC");
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()):
    $fullname = trim($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']);
    $address = trim($row['res_city'].' , '.$row['res_province']);
?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($fullname) ?></td>
          <td><?= htmlspecialchars($row['mobile_no'].' / '.$row['email']) ?></td>
          <td><?= htmlspecialchars($address) ?></td>
          <td class="actions">
            <a class="view"   href="view.php?id=<?= $row['id'] ?>">👁 View</a>
            <a class="edit"   href="edit.php?id=<?= $row['id'] ?>">✏ Edit</a>
            <a class="del"    href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')">🗑 Delete</a>
          </td>
        </tr>
<?php endwhile;
$stmt->close();
?>
      </tbody>
    </table>
  </div>
</body>
</html>
