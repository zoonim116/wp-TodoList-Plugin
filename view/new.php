<?php
    if($_POST) {
        $result = Mun_Todo_List::add_task($_POST);
//        if($result) wp_redirect('wp-admin/admin.php?page=mun-todo-list/view/list.php');
    }
?>
<div class="wrap">
    <form action="" method="post">
        <label>
            Name
            <input type="text" class="large-text" name="name" required=""/>
        </label>
        <label>
            Description
            <input type="text" class="large-text" name="description" required=""/>
        </label>
        <button class="button-primary">
              Add
        </button>
    </form>
</div>