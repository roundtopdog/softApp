<?php 


// get all rooms
function get_rooms(){ 
	global $db;
	$query = 'Select * from rooms order by roomID';
	$statement = $db->prepare($query);
	$statement->execute();
	$rooms = $statement->fetchAll();
	$statement->closeCursor();
	return $rooms;
}

// Add the room to the database  
function add_rooms($name){
	global $db;
 	$query = 'INSERT INTO rooms (roomID, roomName)
              VALUES (NULL, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

// check for existing room name
function detect_room_name($name){
	global $db;
	$sql = "Select roomName from rooms where roomName = '$name'";
	$stmt = $db->prepare($sql);
	$stmt->execute();
		if($data = $stmt->fetch()){
			echo "The Room Name you entered is already in the database, please try another name.";
		} else {
			add_rooms($name);
		}
}

function delete_room($room_id){
	global $db;
	$query = 'DELETE FROM rooms WHERE roomID = :room_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':room_id', $room_id);
	$statement->execute();
	$statement->closeCursor();
}


?>