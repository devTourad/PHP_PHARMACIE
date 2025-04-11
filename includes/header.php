<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy| LTS Php</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    
</head>
<body>
    <nav>
        <div class="logo">
            <h1>Pharmacie</h1>
        </div>
        <ul id="menuList">
            <li><a href="index.php">Home</a></li>
            <li><a href="medicament.php">Medicaments</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="purshase.php"><i class="fa-solid fa-cart-plus fa-xl" style="color:rgb(255, 255, 255);"></i></a></li>
        </ul>
        <div class="menu-icon">
            <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
        </div>
    </nav>