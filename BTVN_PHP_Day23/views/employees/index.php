<?php
require "views/layouts/header.php";
?>
<div class="row">
    <h3 class="col-9 mt-2 title">Employees List</h3>
    <div class="col-3 btn-create">
        <a title="Create Record" class="btn btn-success float-right mt-2" href="index.php?controller=employees&action=create">+ Add New Employee</a>
    </div>
</div>
<h3 style="color: #1d17ff;">
    <?php
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<h3 class="error">
    <?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<hr>
<div class="content mt-4">
    <table class="w-100" id="table-content" border="1" cellpadding="5" cellspacing="2">
        <thead class="header">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Salary</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="main-content">
        <?php if (empty($employees)): ?>
            <tr>
                <td colspan="8">
                    <h2>Không có Nhân viên nào</h2>
                </td>
            </tr>
        <?php else: ?>
            <?php foreach($employees as $employee): ?>
                <tr>
                    <td>
                        <?= $employee['id'];?>
                    </td>
                    <td>
                        <?= $employee['name'];?>
                    </td>
                    <td>
                        <?= $employee['description'];?>
                    </td>
                    <td>
                        <?= $employee['salary'];?>
                    </td>
                    <?php
                    $value_gender = $employee['gender'];
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
                    <td>
                        <?= $gender;?>
                    </td>
                    <td>
                        <?= date('d-m-Y', strtotime($employee['birthday']));?>
                    </td>
                    <td>
                        <?= date('d-m-Y H:i:s', strtotime($employee['created_at']));?>
                    </td>
                    <td>
                        <span class="mr-3 btn-detail">
                            <a title="View Record" href="index.php?controller=employees&action=detail&id=<?= $employee['id'];?>"><i class="fa fa-eye"></i></a>
                        </span>
                        <span class="mr-3 btn-edit">
                            <a title="Update Record" href="index.php?controller=employees&action=edit&id=<?= $employee['id'];?>"><i class="fas fa-pencil-alt"></i></a>
                        </span>
                        <span class="btn-delete">
                            <a title="Delete Record" href="index.php?controller=employees&action=delete&id=<?= $employee['id'];?>" onclick="confirm('Are you sure delete?')"><i class="fas fa-trash-alt"></i></a>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
        </tbody>
    </table>
</div>
<?php
require "views/layouts/footer.php";
?>