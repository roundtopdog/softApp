<?php 
require('../model/database.php');
require('../model/software_db.php');


$action = filter_input(INPUT_POST, 'action');
if($action === NULL){
	$action = filter_input(INPUT_GET, 'action');
	if($action === NULL){
		$action = 'list_software';
	}
}

if($action == 'list_software'){
	$softwares = get_software();
	include('software_list.php');
}

if($action == 'add_software'){
	$program = filter_input(INPUT_POST,'software_name');
	if($program == NULL) {
		$error = "PLease enter a software application";
		echo $error;
	}else{
		$detectSoftwareName = detect_software_name($program);
		$softwares = get_software();
		include('software_list.php');
	}
}

if($action == 'delete_software'){
	$software_id = filter_input(INPUT_POST,'software_id');
	delete_software($software_id);
	$softwares = get_software();
	include('software_list.php');
}


?>