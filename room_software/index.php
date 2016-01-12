<?php
require('../model/database.php');
require('../model/room_soft_db.php');
require('../model/room_db.php');
require('../model/software_db.php');

$action = filter_input(INPUT_POST,'action');
	if($action === NULL){
		$action = filter_input(INPUT_GET, 'action');
			if($action ===  NULL){
				$action = 'list_roomSoft';
			}
	}

if($action == 'list_roomSoft'){
	$room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);
	if($room_id == NULL || $room_id == FALSE){
		$room_id = 1;
	}
	$room_name = get_room_name($room_id);
	$rooms = get_rooms();
	//$softwares = get_software_by_room($room_id);
	$softwares = get_software();
	$roomsofts = get_roomSoft($room_id);
	include('room_software.php');
} else if ($action == 'delete_software'){
	$software_id = filter_input(INPUT_POST, 'software_id', FILTER_VALIDATE_INT);
	$room_id = filter_input(INPUT_POST,'room_id', FILTER_VALIDATE_INT);
	if($room_id == NULL || $room_id == FALSE || $software_id == NULL || $software_id == FALSE){
		$error = "Missing or incorrect product id";
	} else {
		delete_software($software_id);
		header("Location: .?software_id=$software_id");
	}
} else if ($action == 'add_roomsoft_software'){
	$room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);
	if($room_id == NULL || $room_id == FALSE){
		$room_id = 1;
	}
	$room_name = get_room_name($room_id);$inventorys = get_inventory($room_id);
	$rooms = get_rooms();
	$software_id = filter_input(INPUT_POST, 'softwareID', FILTER_VALIDATE_INT);
	add_roomsoft_software( $software_id);
	
	include('room_software.php');
}