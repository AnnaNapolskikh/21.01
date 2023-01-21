<!-- Форма регистрации -->

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
  <title>Registration</title>
  <link rel="stylesheet" href="css/styles.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
</head>
<body class="signup">
  <form action="core/signupreg.php" method="post" enctype="multipart/form-data">
    <label>Your name</label>
    <input type="text" name="full_name" placeholder="Введите имя">
    <label>Login</label>
    <input type="text" name="login" placeholder="Введите логин">
    <label>Email</label>
    <input type="email" name="email" placeholder="Введите адрес своей почты">
    <label>Password</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <label>Confirm password</label>
    <input type="password" name="password_confirm" placeholder="Введите пароль ещё раз">
    <label>Profile picture</label>
    <input type="file" name="avatar" placeholder="Выберите файл">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Join</button>
    
    <p>
      Already have an account? - <a href="login.php">Log in!</a>
    </p>


  </form>
</body>
</html>