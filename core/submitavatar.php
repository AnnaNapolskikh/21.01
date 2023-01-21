<?php
  session_start();
  require_once 'connect.php';
  
  $error = '';
  $id=intval($_POST['id']);
  $path = 'uploads/' . time() . $_FILES['avatar']['name'];
  if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
    $_SESSION['message'] = 'Ошибка при загрузке файла';
    header('Location: ../profile.php');
  }
  $temp= "UPDATE users SET avatar = '$path' WHERE id = $id";
  $result=mysqli_query($connect, $temp);
  $_SESSION['user']['avatar']=$path;
  header('Location: ../profile.php');
?>