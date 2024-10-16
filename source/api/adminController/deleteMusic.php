<?php 
    require_once("../connection.php");
    $res = $db -> query("delete from music_list where id =".$_POST['songId']);
    echo json_encode(array("code" => 1, "message"=>"Xóa thành công"))
?>