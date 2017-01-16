<?php
    $user_id = get_current_user_id() ? get_current_user_id() : false;
    if($user_id) {
       $tasks = Mun_Todo_List::get_user_tasks(get_current_user_id()) ? Mun_Todo_List::get_user_tasks(get_current_user_id()) : FALSE;
    } else {
        $tasks = FALSE;
    }
    
?>
<div class="wrap">
    <?php if($tasks) : ?>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Created</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task) :?>
            <tr>
                <td><?php echo $task->id; ?></td>
                <td><?php echo $task->name; ?></td>
                <td><?php echo $task->description; ?></td>
                <td><?php echo date('j-m-Y H:i:s', $task->created_at); ?></td>
            </tr>                
            <?php endforeach; ?>
        </tbody>     
    </table>
    <?php else : ?>
    <span>No tasks to do.</span>
    <?php endif; ?>
</div>