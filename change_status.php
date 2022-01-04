<?php
$json = file_get_contents('./todo.json');
// Nhận về obj dưới dạng arr
$jsonArray = json_decode($json, true);
// Lấy vè key
$todoName = $_POST['todo_name'];
// Thay đổi trạng thái của completed true or false
$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed'];
// Lưu arr vào file todo.json (ghi đè);
file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
header('Location: ./index.php');