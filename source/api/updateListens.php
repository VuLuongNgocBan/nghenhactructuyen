<?php
    if(isset($_POST['musicID'])){
        require_once("connection.php");
        $db->set_charset("utf8mb4");
        $musicID = $_POST['musicID'];
        $res = $db->query("update from music_list set listens = listens + 1 where id =".$musicID);
        $musics = [];
        while ($r = $res->fetch_assoc()) {
            
            $musics[] = ['id'=>$r["id"], "name" => $r["name"], "description" => $r["description"]];
        }
        $response = json_encode($musics);
        print_r($response);
    }
?>