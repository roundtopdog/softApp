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
	
	$query = 'select * from rooms where roomName = :name';
print_r($query);

	If($query == 0 ){


 	$query = 'INSERT INTO rooms (roomID, roomName)
              VALUES (NULL, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
    return "registered";
   }else{
   	return "Room Name Taken";
   }
	


}








?>