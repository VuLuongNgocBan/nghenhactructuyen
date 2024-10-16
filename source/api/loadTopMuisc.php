<?php
session_start();
require_once("connection.php");

$sql = "SELECT s.name as singer_name,m.* FROM music_list m, singer s WHERE s.id = m.singer_id LIMIT 12;";
$result = $db->query($sql);
$rows = [];
while ($r = $result->fetch_assoc()) {
    $rows[] = ["name" => $r["name"], "image" => $r['image'], "url" => $r['url'], "singer_name" => $r['singer_name'], "id" => $r['id']];
}
$response = json_encode($rows);
echo $response;
