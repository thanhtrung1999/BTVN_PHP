<?php
$error = "";
$result = "";

if(isset($_POST['register'])){
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $file = $_FILES['avatar'];

    if(empty($userName)){
        $error = "Username không được để trống";
    } else if(empty($email)) {
        $error = "Email không được để trống";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Email sai định dạng";
    }else if(empty($password)) {
        $error = "Password không được để trống";
    } else if(empty($confirm)) {
        $error = "Confirm Password không được để trống";
    } else if($password != $confirm) {
        $error = "Confirm Password bắt buộc phải giống Password";
    } else {
        if($file['error'] == 0) {
            $extension = pathinfo($file['name'],PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $arr_image_extension = ['jpg', 'jpeg', 'png', 'gif'];

            if(!in_array($extension, $arr_image_extension)) {
                $error = "Cần upload ảnh";
            } else {
                $dir_upload = __DIR__ . "\\uploads";
                if(!file_exists($dir_upload)){
                    mkdir($dir_upload);
                }
                $file_name = time() . '-' . $file['name'];
                $is_upload = move_uploaded_file($file['tmp_name'], $dir_upload . "\\" .$file_name);
                if($is_upload){
                    $result = "User name: $userName <br/>";
                    $result .= "Email: $email <br/>";
                    $result .= "Avatar: ";
                    $result .= "<a href='uploads\\$file_name' target='_blank'><img src='uploads\\$file_name' width='200px'/></a>";
                }

            }
        } else {
            $error = "Có lỗi xảy ra, không thể upload ảnh";
        }
    }
}
?>

<!DOCTYPE>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>Bài 3 - Ngày 16</title>
    <style>
        html, body{
            font-size: 1rem;
            font-family: 'Arial';
        }
        .bg{
            background-color: #09014a;
            color: white;
            padding: 1rem 0;
        }
        .container{
            width: 80%;
            margin: auto;
        }
        h2{
            font-weight: 100;
            font-size: 2rem;
        }
        form input.form-control{
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            font-weight: 400;
            color: #c8c8c8;
            background-color: black;
            border: 1px solid #a4a4a4;
            border-radius: .1rem;
        }
        input::placeholder{
            color: #c8c8c8;
        }
        div#upload-file{
            margin: 1rem 0 1.2rem 0;
        }
        .btn-block{
            display: block;
            width: 100%;
            text-align: center;
            padding: 0.5rem 0;
            font-size: 0.9rem;
            font-weight: 400;
            color: white;
            background-color: #3768d0;
            border: none;
            border-radius: 0.2rem;
            box-shadow: 12px 18px 41px 3px rgba(0,0,0,0.75);
            cursor: pointer;
        }
        .btn-block:hover{
            background-color: #2953d0;
            transition: 0.3s;
        }
    </style>
</head>
<body>
<div class="container bg">
    <div class="container">
        <h2>Create an account</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''?>"/>
            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>"/>
            <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>"/>
            <input class="form-control" type="password" name="confirm" placeholder="Confirm Password" value=""/>
            <div id="upload-file">
                <label>Select your avatar: </label>
                <input id="file-input" type="file" name="avatar"/>
            </div>
            <input class="btn-block" type="submit" name="register" value="Register"/>
        </form>
        <h3 style="color: #f91a23">
            <?php echo $error;?>
        </h3>
        <h3 style="color: #eaeaea">
            <?php echo $result;?>
        </h3>
    </div>
</div>
</body>
</html>
