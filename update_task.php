<?php
/**
 * This script is to be used to receive a POST with the object information and then either updates, creates or deletes the task object
 */
require('Task.class.php');
// Assignment: Implement this script

$taskData = file_get_contents('Task_Data.txt');
$taskArray = json_decode($taskData);

	$name = $_POST["TaskName"];
	$description = $_POST["TaskDescription"];
	$event = $_POST["Event"];
	$id = $_POST["TaskId"] - 1;
	
	if ($event == "Add"){
	if ($id == -2){
	$myObj->TaskId = sizeof($taskArray) + 1;
	$myObj->TaskName = $name;
	$myObj->TaskDescription = $description;
	array_push($taskArray,$myObj);
	}else{
	$taskArray[$id]->TaskName = $name;
	$taskArray[$id]->TaskDescription = $description;
	}


	}elseif ($event == "Delete"){
		array_splice($taskArray,$id,1);
		//reinitialise task id
		$count =1;
		
		foreach ($taskArray as $task){
			$task->TaskId = $count;
			$count++;
		}
	}

	
	$taskArray1 = json_encode($taskArray);
	
	$myfile = fopen("Task_Data.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $taskArray1);
?>	