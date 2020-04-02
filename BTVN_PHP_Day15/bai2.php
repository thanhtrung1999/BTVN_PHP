<?php
$error = "";
$result = "";

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $displayName = $_POST['displayName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $accept = isset($_POST['accept']) ? $_POST['accept'] : null;

    $regax = "/^([a-zA-Z])+([a-zA-Z0-9\._-])+([a-zA-Z0-9])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/";

    if (empty($username) || empty($password) || $userType == -1 || empty($displayName) ||
        empty($address) || empty($email) || empty($gender) || empty($accept)) {
        $error = "Bắt buộc phải điền toàn bộ các trường";
    } else if(strlen($displayName) > 24){
        $error = "Display Name không được vượt quá 24 ký tự";
    } else if(!preg_match($regax, $email)){
        $error = "Email sai định dạng";
    } else{
        $result .= "Username: $username <br/>";
        $result .= "Password: $password <br/>";
        switch ($userType){
            case 1: $result .= "User type: Type 1 <br/>"; break;
            case 2: $result .= "User type: Type 2 <br/>"; break;
            case 3: $result .= "User type: Type 3 <br/>"; break;
        }
        $result .= "Display name: $displayName <br/>";
        $result .= "Address: $address <br/>";
        $result .= "Email: $email <br/>";
        switch ($gender){
            case 1: $result .= "Gender: Male <br/>"; break;
            case 2: $result .= "Gender: Famale <br/>"; break;
        }
    }
}
?>

<!DOCTYPE>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>Bài 2 - Ngày 15</title>
    <style>
        table{
            border: 1px solid black;
            color: white;
        }
        th, td{
            padding: 10px 0;
        }
        th{
            background-color: #7596ff;
        }
        td{
            background-color: #86b7ff;
        }
        td:first-child{
            text-align: right;
            padding-left: 40px;
            padding-right: 10px;
        }
        td:last-child{
            padding-left: 10px;
            padding-right: 120px;
        }
    </style>
</head>
<body>
<h3 style="color: red;">
    <?php echo $error;?>
</h3>
<form action="" method="post">
    <table>
        <tr>
            <th colspan="2">Registration Form</th>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>User Type</td>
            <?php
            $selectedType1 = '';
            $selectedType2 = '';
            $selectedType3 = '';
            if(isset($userType)){
                switch ($userType){
                    case 1:
                        $selectedType1 = 'selected="selected"';
                        break;
                    case 2:
                        $selectedType2 = 'selected="selected"';
                        break;
                    case 3:
                        $selectedType3 = 'selected="selected"';
                        break;
                }
            }
            ?>
            <td>
                <select name="userType">
                    <option value="-1">--Select--</option>
                    <option value="1" <?php echo $selectedType1;?>>Type 1</option>
                    <option value="2" <?php echo $selectedType2;?>>Type 2</option>
                    <option value="3" <?php echo $selectedType3;?>>Type 3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Display Name</td>
            <td>
                <input type="text" name="displayName" value="<?php echo isset($_POST['displayName']) ? $_POST['displayName'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <textarea rows="4" name="address"></textarea>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <?php
            $checkedMale = "";
            $checkedFamale = "";
            if(isset($gender)){
                switch ($gender){
                    case 1: {
                        $checkedMale = 'checked="checked"';
                        break;
                    }
                    case 2: {
                        $checkedFamale = 'checked="checked"';
                        break;
                    }
                }
            }
            ?>
            <td>
                <input type="radio" name="gender" value="1" <?php echo $checkedMale;?>/> Male
                <input type="radio" name="gender" value="2" <?php echo $checkedFamale;?>/> Famale
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="checkbox" name="accept"/> I accept Terms and Conditions
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="submit" value="Submit"/>
            </th>
        </tr>
    </table>
</form>
<h4>
    <?php echo $result;?>
</h4>
</body>
</html>
