<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>purshase medicament</title>
    <link rel="stylesheet" href="csss/styles.css">

</head>
<body>
<div class="container">
<a href=""><button class="b-search" type="button">Add New Comande</button></a>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>Name client</th>
                    <th>Telephone client</th>
                    <th>Name medicament</th>
                    <th>Price</th>
                    <th>Quantite</th>
                    <th>date de comande</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            <tr>
              
            </tr>
       
        </tbody>
        </table>
    </div>


<script src="csss/main.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>