<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="api.js" defer></script>
    <script src="cookie.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>

<?php include 'partials/header.php' ?>
<?php include 'classes.php' ?>
<?php session_start(); 
$emailUser = $_SESSION['email'];
?>


<div class="favoris">
    <?php 
    if($_COOKIE['connected'] === '1'){
        if(isset($_GET['delete'])){
            $idBookDelete = $_GET['delete'];
            User::deleteFavorite ($idBookDelete);
        }
        User::getFavorites($emailUser);
        
    } else {
        header('Location: register.view.php');
    }
    
    ?>
    
</div>



<?php include 'partials/footer.php' ?>

</body>
</html>