<?php
    session_start();
    error_reporting(0);
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if(mysqli_num_rows($check_user) > 0) {
      
      $user =  mysqli_fetch_assoc($check_user);

      $_SESSION['user'] = [
        "id" => $user['id'],
        "full_name" => $user['full_name'],
        "avatar" => $user['avatar'],
        "email" => $user['email'],
        "info" => $user['info'],
      ];

      header('Location: ../profile.php');


    } else {
      $_SESSION['message'] = 'Такой пользователь не найден';
      header('Location: ../login.php');
    }

?>