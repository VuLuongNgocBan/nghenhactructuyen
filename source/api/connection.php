<?php 
$db = new mysqli("localhost", "root", "", "online_music");
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    die();
}
?>