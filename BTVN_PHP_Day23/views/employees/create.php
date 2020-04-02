<?php
require "views/layouts/header.php";
?>
<div id="create-record" class="w-50">
    <h2 class="title">Create Record</h2>
    <hr>
    <div id="form-create">
        <form action="" method="post">
            <div class="form-group name">
                <label for="name">Name <span style="color: #ff2132;">*</span></label>
                <input type="text" id="name" name="name" class="form-control" />
            </div>
            <?= $this->error;?>
            <div class="form-group description">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="form-group salary">
                <label for="salary">Salary</label>
                <input type="number" id="salary" name="salary" class="form-control" />
            </div>
            <div class="form-group gender">
                <label for="gender">Gender</label>
                <br/>
                <input type="radio" id="male" name="gender" value="1" /> Male
                <input type="radio" id="famale" name="gender" value="0" /> Famale
            </div>
            <div class="form-group birthday">
                <label for="birthday">Birthday</label>
                <input type="date" id="birthday" name="birthday" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary" id="save" name="save">Save</button>
            <a href="index.php?controller=employees" class="btn btn-light" id="cancel" name="cancel">Cancel</a>
        </form>
    </div>
</div>
<?php
require "views/layouts/footer.php";
?>