<?php
require_once("connection.php");
session_start();
$idSinger = $_SESSION['idSinger'];
$sql = "SELECT s.name as singer_name, m.* FROM music_list m, singer s WHERE singer_id = '$idSinger' and s.id = m.singer_id";
$result = $db->query($sql);
$singerList = [];
while ($row = $result->fetch_assoc()) {
    $singerList[] = ['id' => $row['id'], 'name' => $row['name'], 'singer_name' => $row['singer_name'], 'lyric' => $row['lyrics'], 'description' => $row['description'], 'category' => $row['category_id'], 'url' => $row['url'], 'image' => $row['image']];
}
$response = json_encode($singerList);
echo $response;
