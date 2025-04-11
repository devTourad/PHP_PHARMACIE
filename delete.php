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
    $message[] = 'product has been deleted';
 }else{
    header("Location: medicament.php");
    $message[] = 'product could not be deleted';
 };


 if(isset($message)){
    foreach($message as $message){
       echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
 };
 

 
?>