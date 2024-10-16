<?php
    require_once("connection.php");
    $db->set_charset("utf8mb4");
    $res = $db->query("select * from category");
    $categories = [];
    while ($r = $res->fetch_assoc()) {
        $categories[] = ['id'=>$r["id"], "name" => $r["name"]];
    }
    $response = json_encode($categories);
    print_r($response);
?>