<?php
require_once("../connection.php");
$db->set_charset("utf8mb4");
$res = $db->query("select m.*, s.name as singer_name, c.name as category_name from music_list m, singer s, category c where m.singer_id = s.id and m.category_id = c.id order by id");
$musics = [];
while ($r = $res->fetch_assoc()) {
    $musics[] = [
        'id' => $r["id"],
        "name" => $r["name"],
        "singer_name" => $r['singer_name'],
        "singer_id" => $r['singer_id'],
        "lyric" => $r["lyrics"],
        "description" => $r["description"], 
        "vote" => $r["vote"], 
        "url" => $r["url"], 
        "image" => $r["image"],
        "category_name"=> $r["category_name"],
        "category_id"=> $r["category_id"]
    ];
}
$response = json_encode($musics);
echo $response;
