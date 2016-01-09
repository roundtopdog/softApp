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

function detect_room_name(){
	global $db;
	$sql = "Select roomName from rooms where roomName = 'bal'";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	if($data = $stmt->fetch()){
		do{
			echo 1;
		} while($data = $stmt->fetch());
	} else {
		echo 0;
	}

}




?>