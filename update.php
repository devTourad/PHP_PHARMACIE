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
    <style>
          .create-model{
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  }
    .form-wrapper {
     background-color: #ffffff;
     padding: 40px;
     border-radius: 8px;
     box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
     width: 100%;
     max-width: 500px;
   }

   .user-form h1 {
     font-size: 24px;
     margin-bottom: 25px;
     color: #333;
   }

   .form-group {
     margin-bottom: 20px;
   }

   .form-group label {
     display: block;
     margin-bottom: 6px;
     font-weight: 600;
     color: #333;
   }

   .form-group input {
     width: 100%;
     padding: 10px;
     font-size: 14px;
     border: 1px solid #ccc;
     border-radius: 4px;
     transition: border-color 0.3s ease;
   }

   .form-group input:focus {
     border-color: #007bff;
     outline: none;
     box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
   }

   .btn-submit {
     width: 100%;
     padding: 10px;
     background-color: #007bff;
     color: white;
     font-size: 16px;
     border: none;
     border-radius: 4px;
     cursor: pointer;
     transition: background-color 0.3s ease;
   }

   .btn-submit:hover {
     background-color: #0056b3;
   }
   </style>
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
</body>
</html>

<?php include 'includes/footer.php'; ?>