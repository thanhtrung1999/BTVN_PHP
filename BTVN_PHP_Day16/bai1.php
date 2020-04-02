<?php
$result = "";
$error = "";

if(isset($_POST['submit'])){
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $file = $_FILES['upload'];

    if($file['error'] == 0) {
        $extension = pathinfo($file['name'],PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_image_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if(!in_array($extension, $arr_image_extension)) {
            $error = "Cần upload file có định dạng ảnh";
        } else if($file['size'] > 1 * 1024 * 1024){ // 1 MB = 1024 KB = 1024*1024 B
            $error = "File upload không được > 1 MB";
        } else {
            $dir_upload = __DIR__ . "\uploads";

            if(!file_exists($dir_upload)){
                mkdir($dir_upload);
            }

            $file_name = time() . '-' . $file['name'];
            $is_upload = move_uploaded_file($file['tmp_name'], $dir_upload . '\\' . $file_name);
            if($is_upload) {
                $result = "Ảnh vừa upload: ";
                $result .= "<img src='uploads\\$file_name' width='200px'/>";
                $result .= "<br/>";
                $result .= "Tên file: $file_name <br/>";
                $result .= "Định dạng file: $extension";
            }
        }
    } else {
        $error = "Có lỗi gì đó, không thể upload file";
    }
}
?>

<!DOCTYPE>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>Bài 1 - ngày 16</title>
    <style>
        #btn-upload{
            margin-top: 1rem;
            padding: 0.7rem 1rem;
            color: #f9f9f9;
            background-color: #4280ea;
            font-size: 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        #btn-upload:hover{
            background-color: #3263dd;
            transition: 0.5s;
        }
    </style>
</head>
<body>
<h3 style="color: red">
    <?php echo $error;?>
</h3>
<form action="" method="post" enctype="multipart/form-data">
    <b>Select a file to upload</b>
    <br/>
    <input type="file" name="upload" value=""/>
    <br/>
    Only jpg, jpeg, png and gif file with maximum size of 1 MB is allowed
    <br/>
    <input type="submit" name="submit" value="Upload" id="btn-upload"/>
</form>
<h3>
    <?php echo $result;?>
</h3>
</body>
</html>
