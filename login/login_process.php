<?php
// login_process.php - Handles login POST requests
session_start();
require_once 'db.php';

header('Content-Type: application/json');

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$errors = [];

if (empty($email)) {
    $errors[] = 'Email is required.';
}
if (empty($password)) {
    $errors[] = 'Password is required.';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

$stmt = $conn->prepare('SELECT id, email, password, nom, prenom, role, active FROM users WHERE email = ? LIMIT 1');
if (!$stmt) {
    echo json_encode(['success' => false, 'errors' => ['Database error: ' . $conn->error]]);
    exit;
}
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (!$user['active']) {
        echo json_encode(['success' => false, 'errors' => ['Account is inactive.']]);
        exit;
    }
    if (password_verify($password, $user['password'])) {
        // Set session variables as needed
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = $user['role'];
        echo json_encode(['success' => true, 'user_id' => $user['id']]);
        exit;
    } else {
        echo json_encode(['success' => false, 'errors' => ['Invalid password.']]);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'errors' => ['No user found with this email.']]);
    exit;
}
