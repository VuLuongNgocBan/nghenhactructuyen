<?php
require_once("connection.php");
$name = "";
$userName = "";
$password = "";
$email = "";
if ($_POST['name'] && $_POST['username'] && $_POST['password'] && $_POST['email']) {
    $id  = $_POST['update-user-id'];
    $name = $_POST['name'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql_email = "SELECT * FROM account WHERE id = $id";
    $result = $db->query($sql_email);
    if ($result->num_rows != 0) {
        $res = $db -> prepare("update account set 
        name = '$name',
        username = '$userName',
        password = '$password',
        email = '$email'
        where id =$id"
        );    
        if($res->execute()){
            echo json_encode(array("code" => 1, "message"=>"Sửa thành công"));
            $success = "Sửa thành công";
            header("Location: ../admin.php?success=".$success);
        }
    } else {
        echo json_encode(array('statusCode' => 400, 'message' => "Username or email đã tồn tại!"));
        $errors = "Sửa không thành công";
        header("Location: ../admin.php?error=".$errors);
    }   
} else {
    echo json_encode(array('statusCode' => 400, 'message' => "Vui lòng điển đầy đủ thông tin!"));
    $errors = "Sửa không thành công";
    header("Location: ../admin.php?error=".$errors);
}
