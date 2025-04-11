<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM pharmacy_items WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: medicament.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>