<?php
require_once("connection.php");
session_start();
if (isset($_SESSION['userName']) && isset($_POST['songName'])) {
    $res = $db->query("
            select * from playlist 
            where music_id = (select id from music_list where name = '" . $_POST['songName'] . "') 
            and user_id  =(select id from account where username = '". $_SESSION['userName'] ."')");
    if ($res->num_rows != 0) {
        echo "true";
    }else{
        echo "false";
    }
}else{
    echo "false";
}
