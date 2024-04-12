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
<?php include 'partials/footer.php' ?>
<?php include 'classes.php' ?>
<?php session_start(); ?>




    <?php if($_COOKIE['connected'] === '1'){
      

        $idBook = $_GET['idBook'];
        $nameBook = ($_GET['nameBook']);
        $authorsBook = ($_GET['authorBook']);
        $genreBook = ($_GET['genreBook']);
        $imageBook  = ($_GET['imageBook']);


        
        $emailUser = $_SESSION['email'];
        User::addToFavorites($idBook, $nameBook, $authorsBook, $imageBook, $emailUser);
        
    } else {
        header('Location: register.view.php');
        echo'Veuillez vous connecter !';
    } ?>
    <p class = "fav-success" >Votre livre : '<?= $nameBook ?>' a été ajouté aux favoris !</p>

    


    <div class="container"></div>
</body>
</html>