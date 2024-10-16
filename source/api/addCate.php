<?php 
    require_once("connection.php");
    $name = $_POST['caName'];
    $res = $db -> query("insert into category(name) values('$name')");
    if($res->exec){
        echo json_encode(array("code" => 1, "message"=>"Thêm thành công"));
    }   
    
?>