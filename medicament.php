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
    <title>Search medicament</title>
    <link rel="stylesheet" href="csss/styles.css">
    
</head>
<body>
<div class="container">
<a href="create.php"><button class="b-search" type="button">Add New medicament</button></a>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo ($item['name']); ?></td>
                <td><?php echo ($item['description']); ?></td>
                <td><?php echo ($item['price']); ?></td>
                <td><?php echo ($item['quantite']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $item['id']; ?>"><i class="fa-solid fa-pen-to-square" style="color:rgb(0, 127, 245);"></i></a>
                    <a href="delete.php?id=<?php echo $item['id']; ?>"><i class="fa-solid fa-trash" style="color: #f51800;"></i></a>
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