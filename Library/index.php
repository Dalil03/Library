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




    <div class="searchDiv">
        <img src="assets/realistic book.png"  class="index-image" alt="">
        <!-- <input type="text" placeholder="Entrez le nom d'un livre ..." class = "searchInput">
        <input type="submit" value="Go !" class="searchButton"> -->
        <input class="c-checkbox" type="checkbox" id="checkbox" >
        <div class="c-formContainer">
            <form class="c-form" action="">
                <input class="searchInput" placeholder="Entrez le nom d'un livre ..." type="text" >
                <label class="c-form__buttonLabel" for="checkbox">
                <button class="searchButton" type="button">Go !</button>
                </label>
            <label class="c-form__toggle" for="checkbox" data-title="Chercher un livre"></label>
            </form>
        </div>
    </div>


    <div class="container"> 
         </div>
</body>
</html>