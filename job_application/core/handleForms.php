<?php
require_once 'models.php';

function collect() {
    return [
        'first_name'       => trim($_POST['first_name']),
        'last_name'        => trim($_POST['last_name']),
        'email'            => trim($_POST['email']),
        'phone'            => trim($_POST['phone']),
        'position_applied' => trim($_POST['position_applied']),
        'years_experience' => (int) $_POST['years_experience'],
        'programming_lang' => trim($_POST['programming_lang']),
        'expected_salary'  => (float) $_POST['expected_salary'],
    ];
}

if (isset($_POST['insertBtn'])) {
    insertApplication($pdo, collect());
    header("Location: ../index.php?msg=added");
    exit;
}

if (isset($_POST['updateBtn'])) {
    updateApplication($pdo, (int) $_POST['application_id'], collect());
    header("Location: ../index.php?msg=updated");
    exit;
}

if (isset($_POST['deleteBtn'])) {
    deleteApplication($pdo, (int) $_POST['application_id']);
    header("Location: ../index.php?msg=deleted");
    exit;
}
