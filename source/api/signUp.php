<?php
require_once("connection.php");
$usernameRegist = "";
$emailRegist = "";
$passwordRegist = "";
$confirmPasswordRegist = "";
if ($_POST['username-regist'] && $_POST['email-regist'] && $_POST['password-regist'] && $_POST['confirm-password-regist']) {
    $usernameRegist = $_POST['username-regist'];
    $emailRegist = $_POST['email-regist'];
    $passwordRegist = $_POST['password-regist'];
    $confirmPasswordRegist = $_POST['confirm-password-regist'];
    $name = $_POST['name-regist'];
    $sql_email = "SELECT * FROM account WHERE email = '$emailRegist' or username = '$usernameRegist'";
    $result = $db->query($sql_email);
    // if (!($result->num_rows == 0)) {

    //     // $usernameCheck = $result->fetch_assoc()['username'];
    // } else {
    //     $usernameCheck = '';
    // }

    if ($result->num_rows == 0) {
        $sql = "insert into account(username, password, email,name) values(?,?,?,?)";
        $stm = $db->prepare($sql);
        $stm->bind_param('ssss', $usernameRegist, $passwordRegist, $emailRegist, $name);

        if (!$stm->execute()) {
            echo json_encode(array('statusCode' => 400, 'message' => 'Thông tin không hợp lệ!'));
        } else {
            echo json_encode(array('statusCode' => 200, 'message' => 'Đăng kí thành công!'));
        }
    } else {
        echo json_encode(array('statusCode' => 400, 'message' => "Email or username đã tồn tại!"));
    }
} else {
    echo json_encode(array('statusCode' => 400, 'message' => "Vui lòng điển đầy đủ thông tin!"));
}
