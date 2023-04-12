<?php
//Get data stored
$get_task_json = file_get_contents(__DIR__. '/task.json');
$task = json_decode($get_task_json, true);

//Get new task from user
$task_text = isset($_POST['newTask']) ?  $_POST['newTask'] : null;

//Add new task
if($task_text !== null){
    //Create default array for new task
    $new_task = [
        'text' => $task_text,
        'done' => false,
    ];
    
    //Add task to array
    $task[] = $new_task;
    
    //Convert and store data
    $task_to_json = json_encode($task);
    file_put_contents(__DIR__. '/task.json', $task_to_json);
};

//Get index of task 
$task_index = isset($_POST['index']) ?  $_POST['index'] : null;

//Get action type
$task_mark = isset($_POST['mark']) ?  $_POST['mark'] : null;

//Utility variable for check
$remove = false;
$done = false;

//Check task if to remove or mark
if($task_mark === 'remove'){
    $remove = true;
}elseif($task_mark === 'done'){
    $done = true;
}

//Remove task
if($task_index !== null && $remove){
    //Convert index from string to number
    $index = intval($task_index);

    //Remove selected task
    array_splice($task, $index, 1);
    
    //Convert and store data
    $task_to_json = json_encode($task);
    file_put_contents(__DIR__. '/task.json', $task_to_json);
}

//Mark task
if($task_index !== null && $done){
    //Convert index from string to number
    $index = intval($task_index);

    //Switch done state
    $task[$index]['done'] = !$task[$index]['done'];

    //Convert and store data
    $task_to_json = json_encode($task);
    file_put_contents(__DIR__. '/task.json', $task_to_json);
}

// Send back info
header('Content-Type: application/json');
echo json_encode($task);
?>