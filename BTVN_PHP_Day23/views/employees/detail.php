<?php
require "views/layouts/header.php";
?>
<div id="view-record" class="w-50">
    <h2 class="title">View Record</h2>
    <hr>
    <ul style="list-style: none; padding: 0;">
        <li id="id" class="nav-item">
            <b>ID</b>
            <p><?= $employee_by_id[0]['id'];?></p>
        </li>
        <li id="name" class="nav-item">
            <b>Name</b>
            <p><?= $employee_by_id[0]['name'];?></p>
        </li>
        <li id="description" class="nav-item">
            <b>Description</b>
            <p><?= $employee_by_id[0]['description'];?></p>
        </li>
        <li id="salary" class="nav-item">
            <b>Salary</b>
            <p><?= $employee_by_id[0]['salary'];?></p>
        </li>
        <?php
        $value_gender = $employee_by_id[0]['gender'];
        $gender = "";

        switch ($value_gender){
            case 0: {
                $gender = "Famale";
                break;
            }
            case 1: {
                $gender = "Male";
                break;
            }
        }
        ?>
        <li id="gender" class="nav-item">
            <b>Gender</b>
            <p><?= $gender;?></p>
        </li>
        <li id="birthday" class="nav-item">
            <b>Birthday</b>
            <p><?= date('d-m-Y', strtotime($employee_by_id[0]['birthday']));?></p>
        </li>
        <li id="created_at" class="nav-item">
            <b>Created_at</b>
            <p><?= date('d-m-Y', strtotime($employee_by_id[0]['created_at']));?></p>
        </li>
    </ul>
    <div class="btn-back">
        <a class="btn btn-primary" href="index.php?controller=employees">Back</a>
    </div>
</div>
<?php
require "views/layouts/footer.php";
?>