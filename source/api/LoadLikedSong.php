<?php
session_start();
require_once("connection.php");
$userName = $_SESSION['userName'];
$sql = "SELECT m.*, s.name as singer_name from music_list m, playlist p, singer s where m.singer_id = s.id and p.user_id = (select id from account where username = '$userName') and m.id = p.music_id";
$res = $db->query($sql);
$musics = [];
while ($r = $res->fetch_assoc()) {
    $musics[] = ['id' => $r["id"], "name" => $r["name"], "singer_name" => $r['singer_name'], "lyric" => $r["lyrics"], "description" => $r["description"], "vote" => $r["vote"], "url" => $r["url"], "image" => $r["image"]];
}
$response = json_encode($musics);
echo $response;
?>