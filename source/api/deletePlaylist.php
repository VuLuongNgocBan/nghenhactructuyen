<?php
session_start();
require_once("connection.php");
if (isset($_SESSION['userName']) && isset($_POST['songName'])) {
    $res = $db->query("
            select * from playlist where music_id = (select id from music_list where name = '" . $_POST['songName'] . "') and user_id = (select id from account where username ='".$_SESSION['userName']."')
        ");
    if ($res->num_rows != 0) {
        $res = $db->query("
            delete from playlist where music_id =
                (select id from music_list where name = '" . $_POST['songName'] . "')
                and user_id =
                (select id from account where username = '".$_SESSION['userName']."')
            ");
            echo "Remove song successful";
    }else{
        echo "Song existed";
    }

    
}else{
    echo "Chưa đăng nhập";
}
