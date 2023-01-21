<!-- Форма авторизации -->
<?php
  session_start();
  error_reporting(0);

  if($_SESSION['user']){
    header('Location: profile.php');
  }
?>


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Authorization</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/styles.css" />
  
</head>

   
<body class = "text-center">
  <div class = "centered">
<form class="form-signin" action="core/authorization.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
    <input type="text" name="login" class="form-control" placeholder="Введите логин" required="" autofocus="">
    <input type="password" name="password" class="form-control" placeholder="Введите пароль" required="">
    <p>
          Don't have an account? <a href="sign-up.php">Create new!</a>
    </p>
    <?php
          if($_SESSION['message']){
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
          }
          unset($_SESSION['message']);
    ?>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
  </form>
  </div>
</body>


</html>
