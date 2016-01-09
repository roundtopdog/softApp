<?php 

// get software
function get_software(){
	global $db;
	$query = 'SELECT * FROM software ORDER BY softwareID';
	$statement = $db->prepare($query);
	$statement->execute();
	$softwares = $statement->fetchAll();
	$statement->closeCursor();
	return $softwares;
}

function add_software($program){
	global $db;
	$query = 'INSERT INTO software (softwareID, softwareName)
			VALUES(NULL, :program)';
	$statement = $db->prepare($query);
	$statement->bindValue(':program', $program);
	$statement->execute();
	$statement->closeCursor();
}

function detect_software_name($program){
	global $db;
	$sql = "SELECT softwareName FROM software WHERE softwareName = '$program'";
	$stmt = $db->prepare($sql);
	$stmt->execute();
		if($data = $stmt->fetch()){
			echo "The Software you entered is already in the database, please try another software.";
		}else {
			add_software($program);
		}
		
}

function delete_software($software_id){
	global $db;
	$query = 'DELETE FROM software WHERE softwareID = :software_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':software_id', $software_id);
	$statement->execute();
	$statement->closeCursor();
}