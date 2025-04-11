<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
include 'includes/header.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantite = $_POST["quantite"];

    $sql = "UPDATE pharmacy_items SET name = :name, description = :description, price = :price,quantite = :quantite WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM pharmacy_items WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="csss/styles.css">

 
</head>
<body>
<div class="create-model">
<div class="form-wrapper">
  <form class="user-form" method="post" action="update.php?id=<?php echo $id; ?>">
    <h1>Update medicament</h1>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?php echo ($item['name']); ?>" >
    </div>

    <div class="form-group">
      <label for="email">Description:</label>
      <input type="description" id="description" name="description" value="<?php echo ($item['description']); ?>" >
    </div>

    <div class="form-group">
      <label for="mobile">Price</label>
      <input type="text" id="price" name="price" value="<?php echo ($item['price']); ?>">
    </div>
    <div class="form-group">
      <label for="mobile">Quantite</label>
      <input type="text" id="quantite" name="quantite" value="<?php echo ($item['quantite']); ?>">
    </div>
    <button type="submit" class="btn-submit">Update Item</button>
  </form>
</div>

</div>       
<script src="csss/main.js"></script>
</body>
</html>

<?php include 'includes/footer.php'; ?>