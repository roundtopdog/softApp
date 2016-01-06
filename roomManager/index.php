<?php 
require('../model/database.php');
require('../model/room_db.php');


$action = filter_input(INPUT_POST, 'action');
if($action === NULL){
	$action = filter_input(INPUT_GET, 'action');
	if($action === NULL){
		$action = 'list_rooms';
	}
}

if($action == 'list_rooms'){
	$rooms = get_rooms();
	include('room_list.php');
}

if($action == 'add_room'){
	 $name = filter_input(INPUT_POST, 'name');
	 
		if ($name == null) {
		    $error = "Please enter a room name";
		    echo $error;
		} else {
		    add_rooms($name);
		   	$rooms = get_rooms(); 
			include('room_list.php');
			
	}
}
?>