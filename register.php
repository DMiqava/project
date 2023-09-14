<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Load existing users from JSON file
    $users = json_decode(file_get_contents("users.json"), true);

    // Check if the username is already taken
    if (isset($users[$username])) {
        echo "Username already taken. Please choose a different one.";
    } else {
        // Hash the password (for simplicity, we're not using proper password hashing here)
        $hashedPassword = md5($password);

        // Add the new user to the array
        $users[$username] = $hashedPassword;

        // Save the updated user data to the JSON file
        file_put_contents("users.json", json_encode($users));

        echo "Registration successful. <a href='login.php'>Login here</a>.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
