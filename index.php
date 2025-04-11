<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
include 'includes/header.php';


$sql = "SELECT * FROM pharmacy_items";
$stmt = $conn->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy</title>
    <link rel="stylesheet" href="csss/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<div class="container">

<a href=""><button class="b-search" type="button">Search medicament</button></a>
        <div class="form-group ">
            <input id="search" class="search" type="text" placeholder="Search un medicament....">
        </div>
        <table class="users-table">
            <thead id="myTable">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Date de creation</th>
                    <th>Quantite</th>
                    <th>Purshase</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo ($item['name']); ?></td>
                <td><?php echo ($item['description']); ?></td>
                <td><?php echo ($item['price']); ?></td>
                <td><?php echo ($item['created_at']); ?></td>
                <td><?php echo ($item['quantite']); ?></td>
                <td>
                        <a href="#"><i class="fa-solid fa-cart-plus fa-xl" style="color:rgb(0, 143, 252);"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>


    <script src="csss/main.js"></script>
    </body>
</html>
<?php include 'includes/footer.php'; ?>