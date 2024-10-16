<?php
session_start();
require_once("connection.php");
$userName = '';
$password = '';
if (isset($_POST['userName']) && isset($_POST['password'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $sqlCheck = "SELECT * FROM account WHERE username = '$userName' AND password = '$password'";
    $result = $db->query($sqlCheck);
    if ($result->num_rows == '1') {
        $_SESSION['userName'] = $userName;
        while($r = $result->fetch_assoc()){
            $_SESSION['UserId'] = $r['id'];
        }
        echo json_encode(array("statusCode" => 200, "message" => 'Login successful', "userName" => $userName));
    } else {
        echo json_encode(array("statusCode" => 400, "message" => 'Invalid information'));
    }
} else {
    echo json_encode(array("statusCode" => '101', "message" => 'Please fill full field'));
}
