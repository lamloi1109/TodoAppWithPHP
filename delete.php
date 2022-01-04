<?php
 $json = file_get_contents('./todo.json');
 // Nhận về obj dưới dạng arr
 $jsonArray = json_decode($json,true);
 // Lấy vè key
 $todoName = $_POST['todo_name'];
 // Dựa vào key để remove nó ra khỏi arr
 unset($jsonArray[$todoName]);
 // Lưu arr vào file todo.json (ghi đè);
 file_put_contents('todo.json',json_encode($jsonArray,JSON_PRETTY_PRINT));
 header('Location: ./index.php');