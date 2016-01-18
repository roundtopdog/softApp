<?php 
function get_room_name($room_id){
	global $db;
	$query = 'SELECT * FROM rooms WHERE roomID = :room_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':room_id', $room_id);
	$statement->execute();
	$room = $statement->fetch();
	$statement->closeCursor();
	$room_name = $room['roomName'];
	return $room_name;
}

function get_software_by_room($room_id){
	global $db;
	$query = 'SELECT * FROM software
			WHERE software.roomID = :room_id
			ORDER BY softwareID';
	$statement = $db->prepare($query);
	$statement->bindValue(":room_id", $room_id);
	$statement->execute();
	$softwares = $statement->fetchAll();
	$statement->closeCursor();
	return $softwares;
}

// add room id and software id to roomSoft
function get_roomSoft($room_id){
	global $db;
	$query = 'SELECT * FROM inventory
				WHERE roomID = :room_id
				ORDER BY roomID';
	$statement = $db->prepare($query);
	$statement->bindValue(":room_id", $room_id);
	$statement->execute();
	$roomsofts = $statement->fetchAll();
	$statement->closeCursor();
	return $roomsofts;
}

function add_roomsoft_software( $software_id){
	global $db;
	$query = 'INSERT INTO inventory (roomsoftID, roomID, softwareID)
				VALUES 	(NULL, NULL, :softwareID)';
	$statement = $db->prepare($query);
	// $statement->bindValue(':roomID', $room_id);
	$statement->bindValue(':softwareID', $software_id);
	$statement->execute();
	$statement->closeCursor();
}

function get_inventory($room_id){
	global $db;
	$query = 'select rooms.roomName, software.softwareName from rooms 
	join inventory 
	on rooms.roomID = inventory.roomID
	join software
	on software.softwareID = inventory.softwareID 
	WHERE inventory.roomID = 4';
	$statement = $db->prepare($query);
	// $statement->bindValue(':room_id', $room_id);
	$statement->execute();
	// $inventorys = $statement->fetchAll();
	$statement->closeCursor();
	return $statement;
	
}

function get_roomID($room_id){
	global $db;
	$query = 'select * from inventory 
	join software 
	on software.softwareID = inventory.softwareID 
	join rooms
	on rooms.roomID = inventory.roomID
	where inventory.roomID = :room_id';
	$statement2 = $db->prepare($query);
	$statement2->bindValue(':room_id', $room_id);
	$statement2->execute();
	$roomids = $statement2->fetchAll();
	$statement2->closeCursor();
	return $roomids;
	
}

?>