<?php
require_once("connection.php");
$db->set_charset("utf8mb4");
$res = $db->query("select count(*) as numofS from singer");
$result = $res->fetch_assoc();
$numberOfSinger = $result["numofS"];
$randomID = rand(1, $numberOfSinger);
$res = $db->query("select m.*, s.name as singer_name from music_list m, singer s where m.singer_id = s.id and singer_id = $randomID LIMIT 5");
$musics = [];
while ($r = $res->fetch_assoc()) {
    $musics[] = ['id' => $r["id"], "name" => $r["name"], "singer_name" => $r['singer_name'], "lyric" => $r["lyrics"], "description" => $r["description"], "vote" => $r["vote"], "url" => $r["url"], "image" => $r["image"]];
}
$response = json_encode($musics);
echo $response;
