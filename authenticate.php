<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Read the existing users from the JSON file
    $users = json_decode(file_get_contents("users.json"), true);

    // Check if the username exists and the password matches
    if (isset($users[$username]) && $users[$username] === $password) {
        echo "Login successful. Welcome, $username!";
    } else {
        echo "Invalid username or password. <a href='login.php'>Try again</a>";
    }
}
?>
