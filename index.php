<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoAppWithPHP</title>
</head>
<body>
    <?php 
        $todos = [];
        if(file_exists('todo.json')){
            $json = file_get_contents('todo.json');
            $todos = json_decode($json,true);
        }

    ?>
    <form action="./newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button>New Todo</button>
    </form>
    <?php foreach($todos as $todoName => $todo ): ?>
        <br>
        <div>
            <form style="display: inline-block;" action="./change_status.php" method="POST">
                <input type="hidden" name="todo_name" value="<?php echo $todoName; ?>">
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''; ?> > 
            </form>
            <?php echo $todoName; ?>
            <form style="display: inline-block;" action="./delete.php" method="post">
                <input type="hidden" name="todo_name" value="<?php echo $todoName; ?>">              
                <button>Delete</button>
            </form>
        </div>
    <?php endforeach ?>
    <script>
        // Vì theo mặc định checkbox không thể submit form nên ta cần thay đổi cho nó có thể submit form đi đc.
        // Nhận về danh sách checkbox
        const checkbox = document.querySelectorAll('input[type=checkbox]');
        checkbox.forEach((element) => { 
            element.onclick = function(){
                // Form.submit
                this.parentNode.submit();
            }
         } )

    </script>
</body>
</html>