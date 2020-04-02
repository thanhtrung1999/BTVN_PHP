<?php
$result = "";

if(isset($_GET['submit'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $gender = isset($_GET['gender']) ? $_GET['gender'] : null;
    $state = isset($_GET['state']) ? $_GET['state'] : null;

    $result = "<p style='color: #4e95ea'>Đăng ký thành công</p>";
    $result .= "<p style='color: #4e95ea'>Thông tin của bạn:</p>";
    $result .= "Firstname: $firstname <br/>";
    $result .= "Lastname: $lastname <br/>";
    switch($gender){
        case 1: $result .= "Gender: Male <br/>"; break;
        case 2: $result .= "Gender: Famale <br/>"; break;
    }
    switch($state){
        case 1: $result .= "State: Johor <br/>"; break;
        case 2: $result .= "State: State 2 <br/>"; break;
        case 3: $result .= "State: State 3 <br/>"; break;
        case 4: $result .= "State: State 4 <br/>"; break;
    }
}

?>

<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bài 4 - Ngày 15</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
    <script rel="stylesheet" type="text/javascript" src="bootstrap.min.js"></script>
    <style>
        .row,.form-group, label{
            margin: 0;
        }
        .title{
            padding: 1rem;
            border: 1px solid #e1e1e1;
            border-radius: 10px 10px 0 0;
            background-color: #fafafa;
            color: #4e95ea;
        }
        .form-content, .exercise-content{
            padding: 1rem;
            border: 1px solid #e1e1e1;
            border-radius: 0px 0px 10px 10px;
            border-top: none;
        }
        #btn{
            margin-top: 2rem;
        }
        .btn-success{
            background-color: #16ab79;
            border: none;
        }
        .btn-secondary{
            background-color: #c6c6c6;
            border: none;
        }
        .exercise-list .title, .exercise-list .exercise-content{
            width: 80%;
        }
        .exercise-content div.bg-primary{
            background-color: #4e95ea!important;
            text-align: center;
            padding: 0.5rem;
            margin: 4px;
            border-radius: 4px;
        }
        .exercise-content div.bg-primary:hover{
            cursor: pointer;
            background-color: #3669ea!important;
        }
        .exercise-content a{
            color: white;
            text-decoration: none;
        }
        @media (max-width: 767px) {
            html, body{
                font-size: 0.8rem;
            }
            h3{
                font-size: 1.3rem;
            }
            h4{
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-10 regis-form mb-3">
            <div class="title">
                <h3>Registration FORM</h3>
            </div>
            <div class="form-content" >
                <form action="" method="get" onsubmit="return submitForm();">
                    <div class="form-group" id="firstname-form">
                        <label for="firstname">Firstname</label>
                        <input id="fn" type="text" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''?>" class="form-control"/>
                    </div>
                    <div class="form-group" id="lastname-form">
                        <label for="lastname">Lastname</label>
                        <input id="ln" type="text" name="lastname" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''?>" class="form-control"/>
                    </div>
                    <div class="form-group" id="gender-form">
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="1"/> Male
                        <input type="radio" name="gender" value="2"/> Famale
                    </div>
                    <div class="form-group" id="state-form">
                        <label for="state">State</label>
                        <select name="state" class="form-control">
                            <option value="1">Johor</option>
                            <option value="2">State 2</option>
                            <option value="3">State 3</option>
                            <option value="4">State 4</option>
                        </select>
                    </div>
                    <div class="form-group" id="btn">
                        <button type="submit" name="submit" class="btn btn-success">Save Record</button>
                        <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <h4 id="error" style="color: red"></h4>
                <h4>
                    <?php echo $result;?>
                </h4>
            </div>
        </div>
        <script rel="stylesheet" type="text/javascript">
            function submitForm() {
                var obj_fname = document.getElementById('fn');
                var fname = obj_fname.value;
                var obj_lname = document.getElementById('ln');
                var lname = obj_lname.value;
                var error = "";

                if(fname == ""){
                    error = "Firstname không được để trống";
                }else if(lname == ""){
                    error = "Lastname không được để trống";
                } else {
                    return true;
                }

                document.getElementById('error').innerHTML = error;
                return false;
            }
        </script>
        <div class="col-md-4 col-sm-10 exercise-list">
            <div class="title">
                <h3>Exercise List</h3>
            </div>
            <div class="exercise-content">
                <div class="bg-primary" id="e1">
                    <a href="#">Home Directory</a>
                </div>
                <div class="bg-primary" id="e2">
                    <a href="#">FORM</a>
                </div>
                <div class="bg-primary" id="e3">
                    <a href="#">operation</a>
                </div>
                <div class="bg-primary" id="e4">
                    <a href="#">array</a>
                </div>
                <div class="bg-primary" id="e5">
                    <a href="#">if-else</a>
                </div>
                <div class="bg-primary" id="e6">
                    <a href="#">Repetition</a>
                </div>
                <div class="bg-primary" id="e7">
                    <a href="#">string</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
