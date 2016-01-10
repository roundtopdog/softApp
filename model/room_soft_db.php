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

function

?>