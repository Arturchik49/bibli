<?php
// Подключение к базе данных
$pdo = new PDO('pgsql:host=localhost;dbname=biblioteka', 'postgres', '12345');

$email = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = :email AND password = :password";
$statement = $pdo->prepare($query);
$statement->execute([
    'email' => $email,
    'password' => $password
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
if ($user) {
    switch ($user['role']) {
        case 'admin':
            $redirectUrl = '/admin';
            break;
        case 'librarian':
            $redirectUrl = '/libr';
            break;
        case 'client':
            $redirectUrl = '/home';
            break;
        default:
           $redirectUrl = '/error';
           break;
    }
    header("Location: $redirectUrl");
} else {
    header("Location: error.blade.php");
}
