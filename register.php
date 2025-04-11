<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="csss/style.css">
</head>
<body>
<div class="container">
                <form method="post" action="register.php">
                <h2>Register | page</h2>
                    <div class="input-group">
                        <label >Username</label>
                        <input type="text"  name="username" required>
                    </div>
                    <div class="input-group">
                        <label >Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="input-group">
                        <label >Confirm Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit">Register</button>  
                    <div class="forget" >
                      <small >do you have acount?<a href="login.php">login</a></small>
                    </div> 
                </form>
    </div>
</body>
</html>