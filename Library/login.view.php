


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.login.css">
    <title>Document</title>
</head>
<?php include 'partials/header.php' ?>
<?php include 'partials/footer.php' ?>

    

<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>LOGIN</span>
            <span></span>
            <p id="error-register">
                <?php 

                include 'classes.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  if (isset($_POST['password'], $_POST['email'])) {
                      echo '';
                      $email = $_POST['email'];
                      $password = hash('sha256', $_POST['password']);
              
                      if (empty($email) || empty($password)) {
                          echo "Tous les champs sont obligatoires.";
                      } else {
                          User::login($email, $password);
                          setcookie('connected',true);
                          session_start();
                          $_SESSION['email'] = $email;
                      }
                  }
              }
              
                ?>
            </p>
          </div>
          <div class="app-contact">CONTACT INFO : +62 81 314 928 595</div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <form action="" method="post">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL" name="email">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="PASSWORD" name="password">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">CANCEL</button>
              <button class="app-form-button">SEND</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

</body>
</html>

<?php   




?>