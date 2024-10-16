<?php
//folder chứa nhạc và hình
$folderMusics = "../musics/";
$folderImages = "./img/singer/";

//tên file nhạc và hình
$fileImageName = $_FILES['fileImage']["name"];
$fileMusicName = $_FILES['fileMusic']["name"];

//địa chỉ lưu trữ nhạc và hình
$fileMusic = $folderMusics . basename($fileMusicName);
$fileImage = $folderImages . basename($fileImageName);

$isUpload = 1;

//path của file hình và file nhạc
$imageType = strtolower(pathinfo($fileImage,PATHINFO_EXTENSION));
$musicType = strtolower(pathinfo($fileMusic,PATHINFO_EXTENSION));

//check image path
if($imageType != "png" && $imageType != 'jpg' && $imageType !='jpeg'){
  $isUpload = 0;
  $errors = "Chỉ hỗ trợ các loại file ảnh sau: JPG, JPEG, PNG"; 
}

//check music path
elseif($musicType != "mp3"){
  $isUpload = 0;
  $errors = "File âm nhạc lỗi";
}

//Kiểm tra tồn tại trong của file upload trong folder


//chuyển file vào thư mục vào thêm dữ liệu vào data

if($isUpload == 1){

  require_once("connection.php");
  $name = $_POST['songName'];
  $singer = $_POST['song_singerName'];
  $lyrics = $_POST['lyrics'];
  $description = $_POST['description'];
  $category = $_POST['song_category'];
  $url = $fileMusicName;
  $image = $fileImage;
  $res = $db -> query("Select * from music_list where name = '".$name."'");
  if($res->num_rows == 0){
    $res = $db -> prepare("Insert into music_list(name,singer_id,lyrics,description, category_id, url, image)
    values('".$name."',
    ".$singer.",
    '".$lyrics."',
    '".$description."',
    ".$category.",
    '".$url."',
    '".$image."'
    )
  ");
      if($res->execute()){
        if(!file_exists($fileMusic)){
          move_uploaded_file($_FILES["fileMusic"]["tmp_name"], $fileMusic);
        }
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