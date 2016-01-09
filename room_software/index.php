<?php
require('../model/database.php');
require('../model/room_soft_db.php');
require('../model/room_db.php');

$action = filter_input(INPUT_POST,'action');
	if($action === NULL){
		$action = filter_input(INPUT_GET, 'action');
			if($action ===  NULL){
				$action = 'list_roomSoft';
			}
	}

if($action == 'list_roomSoft'){
	$rooms = get_rooms();
	include('room_software.php');
}