<?php

    session_start();
    require_once 'connect.php';
    
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $error = '';

    if(trim($login) == ''){
      $error = 'Введите Ваш логин';
      echo $error;
      exit;
    }
    if(trim($password) == ''){
      $error = 'Введите Ваш пароль';
      echo $error;
      exit;
    }
    if(strlen($password) < 5){
      $error = 'Ваш пароль должен состоять минимум из 5 символов!';
      echo $error;
      exit;
    }

    if($password === $password_confirm){
      $path = 'uploads/' . time() . $_FILES['avatar']['name'];
      if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке файла';
        header('Location: ../sign-up.php');
      }

      $password = md5($password);
      
      mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
      $_SESSION['message'] = 'Регистрация прошла успешно!';
      header('Location: ../login.php');

      
    } else {
      $_SESSION['message'] = 'Пароли не совпадают';
      header('Location: ../sign-up.php');
    }

?>