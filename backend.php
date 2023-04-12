<?php
$get_task_json = file_get_contents(__DIR__. '/task.json');
$task = json_decode($get_task_json, true);

$task_text = isset($_POST['newTask']) ?  $_POST['newTask'] : null;



if($task_text != null){
    
    $new_task = [
    'text' => $task_text,
    'done' => false,
    ];
    
    $task[] = $new_task;
};

// Send back info

header('Content-Type: application/json');
echo json_encode($task);

?>