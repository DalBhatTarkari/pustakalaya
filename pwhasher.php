<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pw = $_POST['password'] ?? '';

    if ($pw === '') {
        echo "Password is required.";
        exit;
    }

    echo "Hashed password:<br>";
    echo password_hash($pw, PASSWORD_DEFAULT);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Hasher</title>
</head>
<body>
<form method="POST">
    <label>Password:</label><br>
    <input type="password" name="password" required>
    <br><br>
    <button type="submit">Hash</button>
</form>
</body>
</html>
