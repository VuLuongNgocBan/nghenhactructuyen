<?php 
    require_once("../connection.php");
    $res = $db -> query("delete from account where id =".$_POST['userId']);
    echo json_encode(array("code" => 1, "message"=>"Xóa thành công"))
?>