<?php
// add.php
include './config/db.php';

// helper to keep old values after submit
function old($k){ return $_POST[$k] ?? ''; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect fields (sanitize lightly; prepared statement protects SQL)
    $f = [
        $_POST['first_name'] ?? '',
        $_POST['middle_name'] ?? '',
        $_POST['last_name'] ?? '',
        $_POST['name_extension'] ?? '',
        $_POST['birth_date'] ?? null,
        $_POST['sex'] ?? '',
        $_POST['height'] ?? '',
        $_POST['weight'] ?? '',
        $_POST['civil_status'] ?? '',
        $_POST['telephone_no'] ?? '',
        $_POST['mobile_no'] ?? '',
        $_POST['email'] ?? '',
        $_POST['blood_type'] ?? '',
        $_POST['citizenship_status'] ?? '',
        $_POST['dual_country'] ?? '',
        $_POST['res_house'] ?? '',
        $_POST['res_street'] ?? '',
        $_POST['res_subdivision'] ?? '',
        $_POST['res_barangay'] ?? '',
        $_POST['res_city'] ?? '',
        $_POST['res_province'] ?? '',
        $_POST['res_zip_code'] ?? '',
        $_POST['perm_house'] ?? '',
        $_POST['perm_street'] ?? '',
        $_POST['perm_subdivision'] ?? '',
        $_POST['perm_barangay'] ?? '',
        $_POST['perm_city'] ?? '',
        $_POST['perm_province'] ?? '',
        $_POST['perm_zip_code'] ?? '',
        $_POST['gsis_id'] ?? '',
        $_POST['sss_no'] ?? '',
        $_POST['pagibig_id'] ?? '',
        $_POST['tin_no'] ?? '',
        $_POST['philhealth_id'] ?? '',
        $_POST['agency_employee_no'] ?? ''
    ];

    // Prepared INSERT (35 fields)
    $placeholders = implode(',', array_fill(0, count($f), '?'));
    $sql = "INSERT INTO personal_data_sheet (
        first_name, middle_name, last_name, name_extension, birth_date, sex, height, weight,
        civil_status, telephone_no, mobile_no, email, blood_type, citizenship_status, dual_country,
        res_house, res_street, res_subdivision, res_barangay, res_city, res_province, res_zip_code,
        perm_house, perm_street, perm_subdivision, perm_barangay, perm_city, perm_province, perm_zip_code,
        gsis_id, sss_no, pagibig_id, tin_no, philhealth_id, agency_employee_no
    ) VALUES ($placeholders)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) { die("Prepare failed: " . $conn->error); }

    // create types string and bind
    $types = str_repeat('s', count($f));
    $stmt->bind_param($types, ...$f);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        $error = $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Person - PDS</title>
  <style>
    body{font-family:Arial;background:#f4f4f4;padding:20px}
    .card{max-width:1000px;margin:auto;background:#fff;padding:20px;border-radius:8px}
    .row{display:flex;gap:10px;margin-bottom:12px}
    .row>div{flex:1}
    label{display:block;font-weight:bold;margin-bottom:6px}
    input,select,textarea{width:100%;padding:8px;border:1px solid #ccc;border-radius:4px}
    .btn{background:#4285f4;color:#fff;padding:10px 18px;border:none;border-radius:6px;cursor:pointer}
    .btn:hover{background:#3367d6}
    .back{margin-left:10px;text-decoration:none;color:#333}
    .error{color:#a00}
  </style>
</head>
<body>
  <div class="card">
    <h2>Add New Person</h2>
    <?php if (!empty($error)): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form method="post">
      <div class="row">
        <div><label>First Name</label><input name="first_name" value="<?= htmlspecialchars(old('first_name')) ?>" required></div>
        <div><label>Middle Name</label><input name="middle_name" value="<?= htmlspecialchars(old('middle_name')) ?>"></div>
        <div><label>Last Name</label><input name="last_name" value="<?= htmlspecialchars(old('last_name')) ?>" required></div>
        <div><label>Extension</label><input name="name_extension" value="<?= htmlspecialchars(old('name_extension')) ?>"></div>
      </div>

      <div class="row">
        <div><label>Birth Date</label><input type="date" name="birth_date" value="<?= htmlspecialchars(old('birth_date')) ?>"></div>
        <div><label>Sex</label>
          <select name="sex">
            <option value="">Select</option>
            <option value="Male" <?= old('sex')=='Male' ? 'selected':'' ?>>Male</option>
            <option value="Female" <?= old('sex')=='Female' ? 'selected':'' ?>>Female</option>
          </select>
        </div>
        <div><label>Height (cm)</label><input name="height" value="<?= htmlspecialchars(old('height')) ?>"></div>
        <div><label>Weight (kg)</label><input name="weight" value="<?= htmlspecialchars(old('weight')) ?>"></div>
      </div>

      <div class="row">
        <div><label>Civil Status</label>
          <select name="civil_status">
            <option value="">Select</option>
            <?php foreach(['Single','Married','Widowed','Separated','Annulled','Other'] as $opt): ?>
              <option value="<?= $opt ?>" <?= old('civil_status')==$opt ? 'selected':'' ?>><?= $opt ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div><label>Telephone</label><input name="telephone_no" value="<?= htmlspecialchars(old('telephone_no')) ?>"></div>
        <div><label>Mobile</label><input name="mobile_no" value="<?= htmlspecialchars(old('mobile_no')) ?>"></div>
        <div><label>Email</label><input type="email" name="email" value="<?= htmlspecialchars(old('email')) ?>"></div>
      </div>

      <div class="row">
        <div><label>Blood Type</label><input name="blood_type" value="<?= htmlspecialchars(old('blood_type')) ?>"></div>
        <div><label>Citizenship</label><input name="citizenship_status" value="<?= htmlspecialchars(old('citizenship_status')) ?>"></div>
        <div><label>If Dual Citizenship — Country</label><input name="dual_country" value="<?= htmlspecialchars(old('dual_country')) ?>"></div>
      </div>

      <div class="section-title"><strong>Residential Address</strong></div>
      <div class="row">
        <div><label>House/Lot No.</label><input name="res_house" value="<?= htmlspecialchars(old('res_house')) ?>"></div>
        <div><label>Street</label><input name="res_street" value="<?= htmlspecialchars(old('res_street')) ?>"></div>
        <div><label>Subdivision</label><input name="res_subdivision" value="<?= htmlspecialchars(old('res_subdivision')) ?>"></div>
      </div>
      <div class="row">
        <div><label>Barangay</label><input name="res_barangay" value="<?= htmlspecialchars(old('res_barangay')) ?>"></div>
        <div><label>City/Municipality</label><input name="res_city" value="<?= htmlspecialchars(old('res_city')) ?>"></div>
        <div><label>Province</label><input name="res_province" value="<?= htmlspecialchars(old('res_province')) ?>"></div>
        <div><label>Zip Code</label><input name="res_zip_code" value="<?= htmlspecialchars(old('res_zip_code')) ?>"></div>
      </div>

      <div class="section-title"><strong>Permanent Address</strong></div>
      <div class="row">
        <div><label>House/Lot No.</label><input name="perm_house" value="<?= htmlspecialchars(old('perm_house')) ?>"></div>
        <div><label>Street</label><input name="perm_street" value="<?= htmlspecialchars(old('perm_street')) ?>"></div>
        <div><label>Subdivision</label><input name="perm_subdivision" value="<?= htmlspecialchars(old('perm_subdivision')) ?>"></div>
      </div>
      <div class="row">
        <div><label>Barangay</label><input name="perm_barangay" value="<?= htmlspecialchars(old('perm_barangay')) ?>"></div>
        <div><label>City/Municipality</label><input name="perm_city" value="<?= htmlspecialchars(old('perm_city')) ?>"></div>
        <div><label>Province</label><input name="perm_province" value="<?= htmlspecialchars(old('perm_province')) ?>"></div>
        <div><label>Zip Code</label><input name="perm_zip_code" value="<?= htmlspecialchars(old('perm_zip_code')) ?>"></div>
      </div>

      <div class="section-title"><strong>Government IDs</strong></div>
      <div class="row">
        <div><label>GSIS ID No.</label><input name="gsis_id" value="<?= htmlspecialchars(old('gsis_id')) ?>"></div>
        <div><label>SSS No.</label><input name="sss_no" value="<?= htmlspecialchars(old('sss_no')) ?>"></div>
        <div><label>PAGIBIG ID No.</label><input name="pagibig_id" value="<?= htmlspecialchars(old('pagibig_id')) ?>"></div>
      </div>
      <div class="row">
        <div><label>TIN No.</label><input name="tin_no" value="<?= htmlspecialchars(old('tin_no')) ?>"></div>
        <div><label>PHILHEALTH No.</label><input name="philhealth_id" value="<?= htmlspecialchars(old('philhealth_id')) ?>"></div>
                <div><label>Agency Employee No.</label><input name="agency_employee_no" value="<?= htmlspecialchars(old('agency_employee_no')) ?>"></div>

      </div>

      <div style="margin-top:18px">
        <button class="btn" type="submit">Save</button>
        <a class="back" href="index.php">⬅ Back to list</a>
      </div>
    </form>
  </div>
</body>
</html>
