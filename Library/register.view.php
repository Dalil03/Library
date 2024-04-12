
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
            <span>REGISTER</span>
            <span></span>
            <p id="error-register">
              <?php 

              include 'classes.php';

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $username = $_POST['name'];
                  $email = $_POST['email'];
                  $password = hash('sha256',$_POST['password']);
                  $password_confirmation = hash('sha256',$_POST['password_confirmation']);

                  

                  if (empty($username) || empty($email) || empty($password) || empty($password_confirmation)) {
                      echo "Tous les champs sont obligatoires.";
                  } elseif ($password !== $password_confirmation) {
                      echo "Les mots de passe ne correspondent pas.";
                  } else {
                      $user = new User($username, $email, $password);
                      $user->register();
                      
                  }
              }


              ?></p>
          </div>
          <div class="app-contact">CONTACT INFO : +62 81 314 928 595</div>
        </div>
        <form action="" method="post">
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
              <input type ="text" class="app-form-control" placeholder="NAME" name="name">
            </div>
            <div class="app-form-group">
              <input type ="email" class="app-form-control" placeholder="EMAIL" name="email">
            </div>
            <div class="app-form-group">
              <input type ="password" class="app-form-control" placeholder="PASSWORD" name="password">
            </div>
            <div class="app-form-group">
              <input type ="password" class="app-form-control" placeholder="PASSWORD_CONFIRM" name="password_confirmation">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">CANCEL</button>
              <button type="submit" class="app-form-button">SEND</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    
  </div>
</div>

</body>
</html>


