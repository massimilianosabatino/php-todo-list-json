<?php
//Get data stored
$get_task_json = file_get_contents(__DIR__. '/task.json');
$task = json_decode($get_task_json, true);

//Get new task from user
$task_text = isset($_POST['newTask']) ?  $_POST['newTask'] : null;

//Get index of task 
$task_index = isset($_POST['index']) ?  $_POST['index'] : null;





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

//Remove task
if($task_index !== null){
    //Convert index from string to number
    $index = intval($task_index);

    //Remove selected task
    array_splice($task, $index, 1);
    
    //Convert and store data
    $task_to_json = json_encode($task);
    file_put_contents(__DIR__. '/task.json', $task_to_json);
}

// Send back info

header('Content-Type: application/json');
echo json_encode($task);

?>