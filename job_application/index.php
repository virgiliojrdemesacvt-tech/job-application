<?php require_once 'core/models.php'; $apps = getAllApplications($pdo); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Software Engineer Job Application</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
  <h1>Software Engineer Job Application</h1>

  <?php if (isset($_GET['msg'])): ?>
    <p class="notice">Record <?= htmlspecialchars($_GET['msg']) ?> successfully.</p>
  <?php endif; ?>

  <form action="core/handleForms.php" method="POST" class="card">
    <h2>Apply Now</h2>
    <div class="grid">
      <input type="text" name="first_name" placeholder="First name" required>
      <input type="text" name="last_name" placeholder="Last name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="phone" placeholder="Phone number" required>
      <select name="position_applied" required>
        <option value="">Position</option>
        <option>Junior Software Engineer</option>
        <option>Software Engineer</option>
        <option>Senior Software Engineer</option>
      </select>
      <input type="number" name="years_experience" min="0" placeholder="Years of experience" required>
      <input type="text" name="programming_lang" placeholder="Main programming language(s)" required>
      <input type="number" step="0.01" min="0" name="expected_salary" placeholder="Expected salary" required>
    </div>
    <button type="submit" name="insertBtn">Submit Application</button>
  </form>

  <h2>Submitted Applications</h2>
  <div class="table-wrap">
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Position</th>
      <th>Exp.</th><th>Language</th><th>Salary</th><th>Date Added</th><th>Actions</th>
    </tr>
    <?php foreach ($apps as $a): ?>
    <tr>
      <td><?= $a['application_id'] ?></td>
      <td><?= htmlspecialchars($a['first_name'] . ' ' . $a['last_name']) ?></td>
      <td><?= htmlspecialchars($a['email']) ?></td>
      <td><?= htmlspecialchars($a['phone']) ?></td>
      <td><?= htmlspecialchars($a['position_applied']) ?></td>
      <td><?= $a['years_experience'] ?> yr</td>
      <td><?= htmlspecialchars($a['programming_lang']) ?></td>
      <td><?= number_format($a['expected_salary'], 2) ?></td>
      <td><?= $a['date_added'] ?></td>
      <td class="actions">
        <a class="btn" href="edit.php?id=<?= $a['application_id'] ?>">Edit</a>
        <form action="core/handleForms.php" method="POST" onsubmit="return confirm('Delete this application?');">
          <input type="hidden" name="application_id" value="<?= $a['application_id'] ?>">
          <button type="submit" name="deleteBtn" class="danger">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php if (!$apps): ?><tr><td colspan="10">No applications yet.</td></tr><?php endif; ?>
  </table>
  </div>
</div>
</body>
</html>
