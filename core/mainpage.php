<?php
function setComment() {
    session_start();
    require("core/connect.php");
    if(isset($_POST['commentSubmit'])) {
        $deadline = $_POST['deadline'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $title = $_POST['title'];
        $sender=$_POST['sender'];
        $sender_email=$_POST['sender_email'];
        if (!empty($title) && !empty ($text)) {
            $deadline=$_POST['deadline'];
            $date = $_POST['date'];
            $title = $_POST['title'];
            $text = $_POST['text'];
            $sender=$_POST['sender'];
            $sender_email=$_POST['sender_email'];
            $query = "INSERT INTO events (date, title, text, deadline, sender, sender_email) VALUES ('$date', '$title', '$text', '$deadline', '$sender', '$sender_email')";
            $result = mysqli_query($connect, $query);
            
        }
        else {
            echo "<br><b><div class ='comment' margin='0px'>You should fill all the spaces.</div></b>";
        }
    }
}

function getComments($connect) {
    require("core/connect.php");
    $query = "SELECT * FROM events ORDER BY id DESC LIMIT 100";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($result)) {   
        echo "<div class='comment'>
                <div> Sent by <b>".$row["sender"]."(".$row["sender_email"].") </b> <br>Date of the request: <i>".$row['date']."</i><br><br><b>".$row['title']."</b></div>";

        echo " <div>".$row["text"]."</div><br>";
        echo " <div><b>Deadline:</b>".$row["deadline"]."</div>";
        
        echo "</div><br>";
    }
}