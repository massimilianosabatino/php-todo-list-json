<?php
$get_task_json = file_get_contents(__DIR__. '/task.json');
$task = json_decode($get_task_json, true);


// Send back info
header('Content-Type: application/json');
echo json_encode($task);
?>