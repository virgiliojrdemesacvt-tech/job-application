<?php
require_once 'dbConfig.php';

function insertApplication($pdo, $d) {
    $sql = "INSERT INTO applications
            (first_name, last_name, email, phone, position_applied, years_experience, programming_lang, expected_salary)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    return $pdo->prepare($sql)->execute([
        $d['first_name'], $d['last_name'], $d['email'], $d['phone'],
        $d['position_applied'], $d['years_experience'], $d['programming_lang'], $d['expected_salary']
    ]);
}

function getAllApplications($pdo) {
    return $pdo->query("SELECT * FROM applications ORDER BY date_added DESC")->fetchAll();
}

function getApplicationById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM applications WHERE application_id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateApplication($pdo, $id, $d) {
    $sql = "UPDATE applications SET first_name=?, last_name=?, email=?, phone=?,
            position_applied=?, years_experience=?, programming_lang=?, expected_salary=?
            WHERE application_id=?";
    return $pdo->prepare($sql)->execute([
        $d['first_name'], $d['last_name'], $d['email'], $d['phone'],
        $d['position_applied'], $d['years_experience'], $d['programming_lang'], $d['expected_salary'], $id
    ]);
}

function deleteApplication($pdo, $id) {
    return $pdo->prepare("DELETE FROM applications WHERE application_id = ?")->execute([$id]);
}
