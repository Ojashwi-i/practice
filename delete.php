<?php include 'connect.php' ?>

<?php

if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    // echo $user_id;
    $sql = "DELETE FROM `information` WHERE Id=$user_id";
    // echo $sql;
    $query= $conn->query($sql);
    if($query){
        header('location:table.php');
    }
}
?>