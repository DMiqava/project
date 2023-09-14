<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Load user data from JSON file
    $users = json_decode(file_get_contents("users.json"), true);

    // Check if the username exists
    if (isset($users[$username])) {
        $hashedPassword = md5($password);

        // Check if the entered password matches the stored password
        if ($hashedPassword == $users[$username]) {
            echo "Login successful. Welcome, $username!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found. Please register first.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
