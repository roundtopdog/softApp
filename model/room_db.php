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
	if($name == roomName){
		echo 'The name is a duplicate';
	}else{
		
	
 	$query = 'INSERT INTO rooms (roomID, roomName)
              VALUES (NULL, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
   
}

}








?>