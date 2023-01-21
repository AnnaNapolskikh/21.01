<?php
function setBio($id) {
    require("core/connect.php");
    $error = '';
    if(isset($_POST['bioSubmit'])) {
        $info = $_POST['info'];
        $query = "UPDATE users SET info = '$info' WHERE id = $id";
        $result = mysqli_query($connect, $query);
        $_SESSION['user']['info']=$info;
        header('Location: ../profile.php');
    }
}

function getBio($id) {
    require("core/connect.php");
    $query = "SELECT `info` FROM `users` WHERE `id` = $id";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result); 
    echo " <div>".$row['info']."</div>";
    
}
