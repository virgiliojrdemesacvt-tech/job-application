<?php
require_once 'core/models.php';
$a = getApplicationById($pdo, (int) ($_GET['id'] ?? 0));
if (!$a) { header("Location: index.php"); exit; }
$positions = ['Junior Software Engineer', 'Software Engineer', 'Senior Software Engineer'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Application</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h1>Edit Application #<?= $a['application_id'] ?></h1>
  <form action="core/handleForms.php" method="POST" class="card">
    <input type="hidden" name="application_id" value="<?= $a['application_id'] ?>">
    <div class="grid">
      <input type="text" name="first_name" value="<?= htmlspecialchars($a['first_name']) ?>" required>
      <input type="text" name="last_name" value="<?= htmlspecialchars($a['last_name']) ?>" required>
      <input type="email" name="email" value="<?= htmlspecialchars($a['email']) ?>" required>
      <input type="text" name="phone" value="<?= htmlspecialchars($a['phone']) ?>" required>
      <select name="position_applied" required>
        <?php foreach ($positions as $p): ?>
          <option <?= $p === $a['position_applied'] ? 'selected' : '' ?>><?= $p ?></option>
        <?php endforeach; ?>
      </select>
      <input type="number" name="years_experience" min="0" value="<?= $a['years_experience'] ?>" required>
      <input type="text" name="programming_lang" value="<?= htmlspecialchars($a['programming_lang']) ?>" required>
      <input type="number" step="0.01" min="0" name="expected_salary" value="<?= $a['expected_salary'] ?>" required>
    </div>
    <button type="submit" name="updateBtn">Save Changes</button>
    <a class="btn secondary" href="index.php">Cancel</a>
  </form>
</div>
</body>
</html>
