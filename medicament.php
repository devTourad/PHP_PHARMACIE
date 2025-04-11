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
    <style>
         .message{
  background-color:#2177d48c;
  position: sticky;
  top:0; left:0;
  z-index: 1;
  border-radius: .5rem;
  padding:1.5rem 2rem;
  margin:0 auto;
  max-width: 1200px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap:1.5rem;
}

.message span{
  font-size: 16px;
  color:#333;
}

.message i{
  font-size: 2rem;
  color:#333;
  cursor: pointer;
}

.message i:hover{
  color:red;
}

    </style>
</head>
<body>
<?php
 $message[] = 'product has been deleted';
 if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

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
                    <a href="update.php?id=<?php echo $item['id']; ?>"><i class="fa-solid fa-pen-to-square" style="color:rgb(0, 127, 245);" ></i></a>
                    <a href="delete.php?id=<?php echo $item['id']; ?>"><i class="fa-solid fa-trash" style="color: #f51800;"   onclick="return confirm('are your sure you want to delete this?');"></i></a>
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