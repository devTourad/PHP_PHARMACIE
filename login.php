<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
        $error[] = 'incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="csss/style.css">
 

</head>
<body>
    <div class="container">
                <form method="post" action="login.php">
                <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
                    <h2>Login | page</h2>
                    <div class="input-group">
                        <label >Username</label>
                        <input type="text"  name="username" required>
                    </div>
                    <div class="input-group">
                        <label >Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit">Login</button>
                    <div class="forget" >
                      <small >dont have acount?<a href="register.php">Register</a></small>
                    </div>
                    
                    
                </form>
    </div>
</body>
</html>