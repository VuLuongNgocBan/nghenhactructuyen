

<?php 
    require_once("connection.php");
    $name = $_POST['caName'];
    $res = $db -> query("update category set name ='$name' where id =".$_POST['caId']);
    if($res->exec){
        echo json_encode(array("code" => 1, "message"=>"Sửa thành công"));
    }   
    
?>