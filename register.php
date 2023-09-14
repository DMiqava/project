<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Read the existing users from the JSON file
    $users = json_decode(file_get_contents("users.json"), true);

    // Check if the username already exists
    if (array_key_exists($username, $users)) {
        echo "Username already exists. Please choose a different one.";
    } else {
        // Add the new user to the JSON data
        $users[$username] = $password;

        // Save the updated data back to the JSON file
        file_put_contents("users.json", json_encode($users));

        echo "Registration successful. <a href='login.php'>Login</a>";
    }
}
?>
