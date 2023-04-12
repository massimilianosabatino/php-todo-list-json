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
    $task_to_json = json_encode($task);
    file_put_contents(__DIR__. '/task.json', $task_to_json);
};

// Send back info

header('Content-Type: application/json');
echo json_encode($task);

?>