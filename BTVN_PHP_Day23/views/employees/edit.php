<?php
require "views/layouts/header.php";
?>
<div id="create-record" class="w-50">
    <h2 class="title">Update Record</h2>
    <hr>
    <p>Please edit the input values and submit to update the record.</p>
    <div id="form-create">
        <form action="" method="post">
            <div class="form-group name">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $employee_by_id[0]['name']?>" />
            </div>
            <?= $this->error;?>
            <div class="form-group description">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"><?= $employee_by_id[0]['description']?></textarea>
            </div>
            <div class="form-group salary">
                <label for="salary">Salary</label>
                <input type="number" id="salary" name="salary" class="form-control" value="<?= $employee_by_id[0]['salary']?>"/>
            </div>
            <?php
            $checkedMale = "";
            $checkedFamale = "";

            if(isset($employee_by_id[0]['gender'])){
                switch ($employee_by_id[0]['gender']){
                    case 0:{
                        $checkedFamale = 'checked="checked"';
                        break;
                    }
                    case 1:{
                        $checkedMale = 'checked="checked"';
                        break;
                    }
                }
            }
            ?>
            <div class="form-group gender">
                <label for="gender">Gender</label>
                <br/>
                <input type="radio" id="male" name="gender" value="1" <?= $checkedMale;?>/> Male
                <input type="radio" id="famale" name="gender" value="0" <?= $checkedFamale;?>/> Famale
            </div>
            <div class="form-group birthday">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" name="birthday" class="form-control" value="<?= date('d-m-Y', strtotime($employee_by_id[0]['birthday']));?>" />
            </div>
            <button type="submit" class="btn btn-primary" id="save" name="save">Save</button>
            <a href="index.php?controller=employees" class="btn btn-light" id="cancel" name="cancel">Cancel</a>
        </form>
    </div>
</div>
<?php
require "views/layouts/footer.php";
?>
