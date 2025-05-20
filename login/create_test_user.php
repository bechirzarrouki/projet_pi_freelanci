<?php
// create_test_user.php - Insert a test user with known credentials
require_once 'db.php';

$email = 'testuser@example.com';
$password_plain = 'test1234';
$password_hash = password_hash($password_plain, PASSWORD_BCRYPT);
$nom = 'Test';
$prenom = 'User';
$role = 'admin';
$active = 1;

// Check if user already exists
$stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    $stmt->close();
    $stmt = $conn->prepare('INSERT INTO users (email, password, nom, prenom, role, active) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssi', $email, $password_hash, $nom, $prenom, $role, $active);
    if ($stmt->execute()) {
        echo "Test user created!<br>Email: $email<br>Password: $password_plain";
    } else {
        echo "Error creating user: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Test user already exists!<br>Email: $email<br>Password: $password_plain";
}
$conn->close();
?>
