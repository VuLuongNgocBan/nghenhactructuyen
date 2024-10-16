<?php
require_once("../connection.php");
$db->set_charset("utf8mb4");
$res = $db->query("select * from account where priority_id = 2");
$users = [];
while ($r = $res->fetch_assoc()) {
    $user[] = [
        'id' => $r["id"],
        "name" => $r["name"],
        "username" => $r['username'],
        "password" => $r['password'],
        "email" => $r["email"]
    ];
}
$response = json_encode($user);
echo $response;