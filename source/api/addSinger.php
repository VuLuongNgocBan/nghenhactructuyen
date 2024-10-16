<?php
//folder chứa nhạc và hình
$folderImages = "./img/singer/";

//tên hình
$fileImageName = $_FILES['fileImage']["name"];

//địa chỉ lưu trữ hình
$fileImage = $folderImages . basename($fileImageName);

$isUpload = 1;

//path của file hình và file nhạc
$imageType = strtolower(pathinfo($fileImage,PATHINFO_EXTENSION));

//check image path
if($imageType != "png" && $imageType != 'jpg' && $imageType !='jpeg'){
  $isUpload = 0;
  $errors = "Chỉ hỗ trợ các loại file ảnh sau: JPG, JPEG, PNG"; 
}


//Kiểm tra tồn tại trong của file upload trong folder


//chuyển file vào thư mục vào thêm dữ liệu vào data

if($isUpload == 1){

  require_once("connection.php");
  $name = $_POST['update-singer-name'];
  $image = $fileImage;
  $res = $db -> query("Select * from singer where name = '".$name."'");
  if($res->num_rows == 0){
    $res = $db -> prepare("Insert into singer(name,image)
    values('$name',
    '$image'
    )
  ");
      if($res->execute()){
        // upload file hình nếu chưa có hình trong thư mục và sẽ lấy hính đó ra sử dụng nếu như đã tồn tại
        if(!file_exists($fileImage)){
          move_uploaded_file($_FILES["fileImage"]["tmp_name"], ".".$fileImage);
         
        }
        echo json_encode(array('code' => 1, 'success' => "Thêm thành công"));
        header("Location: ../admin.php?error=Success");
      }
  }else{
    echo json_encode(array('code' => 0, 'error' => "Nhạc đã có trong hệ thống"));
    header("Location: ../admin.php?error=".$errors);
  }
  
}else{
  echo json_encode(array('code' => 0, 'error' => $errors));
  header("Location: ../admin.php?error=".$errors);
}