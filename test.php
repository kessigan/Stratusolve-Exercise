<!DOCTYPE html>
<html>
<body>

<?php
$taskData = file_get_contents('Task_Data.txt');
$taskArray = json_decode($taskData);

	$myObj->TaskId = 1;
	$myObj->TaskName = "toilet";
	$myObj->TaskDescription = "subramanian";
	
	array_push($taskArray,$myObj);
	$taskArray1 = json_encode($taskArray);
	
	$myfile = fopen("Task_Data.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $taskArray1);
	
	
echo $taskArray;
?>

</body>
</html>