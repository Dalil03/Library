<?php

include 'config.php';

class User {
    private $username;
    private $email;
    private $password;
    private static $dbh;


    public function __construct($username, $email, $password){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
}
    public function register(){
        $stmt = self::$dbh->prepare('INSERT INTO Users (name, email, password) VALUES (:name, :email, :password)');
        $stmt->bindParam(':name', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        header("Location: login.view.php");
    }

    public static function setDBH($dbh) {
        self::$dbh = $dbh; 
    }

    static function login($email, $password) {
       $sql = 'SELECT * FROM Users WHERE email = :email;';
       $stmt = self::$dbh->prepare($sql);
       $stmt->bindParam(':email', $email);
       $stmt->execute();
       $user = $stmt->fetch(PDO::FETCH_ASSOC);
       if($password == $user['password']){
            header('Location: index.php');
            session_start();
            $_SESSION['email'] = $email;
            
       } else {
             echo "L'identifiant/mot de passe n'est pas valide";
       }
    }

    static function addToFavorites($idBook, $nameBook, $authorsBook, $imageBook, $emailUser){
        $sql = "INSERT INTO livres(id ,title, authors, user_email, image_book) VALUES(:id, :title, :authors,     :user_email, :image_book )";
        $stmt = self::$dbh->prepare($sql);
        $stmt->bindParam(':id', $idBook);
        $stmt->bindParam(':title', $nameBook);
        $stmt->bindParam(':authors', $authorsBook);
        $stmt->bindParam(':image_book', $imageBook);
        $stmt->bindParam(':user_email', $emailUser);
        $stmt->execute();
    }
    
    static function getFavorites($emailUser){
        $sql = "SELECT * FROM Livres WHERE user_email = :user_email";
        $stmt = self::$dbh->prepare($sql);
        $stmt->bindParam(':user_email', $emailUser);
        $stmt->execute();
        $favoris = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($favoris as $favori){
            echo '
            <div class="fav-book">
            <img src="'. $favori['image_book'] . '" alt="">
            <div class="desc-fav-book">
                <h1>Titre :'.$favori['title'] .' </h1>
                <h2 class ="author-fav-book">Auteur :'. $favori['authors']. ' </h2>
                <button class="delete-fav-btn"><a href="fav.view.php?delete='. $favori['id'] . '"> Supprimer des favoris </a></button>
            </div>        
          </div>';
        }
   
    } 
    
    static function deleteFavorite($idBook){
        $sql = 'DELETE FROM Livres WHERE id = :idBook';
        $stmt = self::$dbh->prepare($sql);
        $stmt->bindParam(':idBook', $idBook);
        $stmt->execute();

    }
}

class Books {
    public $title;
    public $author;
    public $date;
    public $genre;


    function favoriteBooks(){
        
    }

}





?>