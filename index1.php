<?php 
// git remote add origin https://github.com/roundtopdog/softApp.git
// git push -u origin master

require_once('model/database.php');

// get room ID 
if( !isset( $room_id )){
	$room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT );
	if( $room_id == null || $room_id == false ){
		$room_id = 1;
	}
}

// get name for selected room 
$queryRoom = 'select * from rooms where roomID = 7';
$statement1 = $db->prepare($queryRoom);
$statement1->bindValue(':room_id', $room_id);
$statement1->execute();
$room = $statement1->fetch();
$room_name = $room['roomName'];
$statement1->closeCursor();

$query = 'select * from rooms order by'


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SoftApp</title>
	<link rel="stylesheet" href="main.css">
	<script src="jquery-1.11.1.js" type="text/javascript"></script>
	<script src="softApp.js" type="text/javascript"></script>
</head>
<body>
	<div id="one"><?php echo $room_name ; ?></div>
</body>
</html>