<?php
require_once('../model/database.php');


if (!isset($room_id)) {
    $room_id = filter_input(INPUT_GET, 'room_id', 
            FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $room_id = 1;
    }
}


$queryRoom = 'select software.softwareName, rooms.roomName 
from software JOIN inventory ON software.softwareID = inventory.inventoryID 
JOIN rooms ON rooms.roomID = inventory.roomID WHERE inventory.roomID = 1
order by softwareName ';
$statement = $db->prepare($queryRoom);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$query = 'select roomName from rooms where roomID = 1';
$statement = $db->prepare($query);
	$statement->bindValue(':room_id', $room_id);
	$statement->execute();
	$room = $statement->fetch();
	$statement->closeCursor();
	$room_name = $room['roomName'];

$query = 'select * from software';
$statement = $db->prepare($query);
$statement->execute();
$softwares = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>software</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>

<h2><?php echo $room_name; ?></h2>

 <ul>
 	<?php foreach($categories as $category) : ?>
 		<li><?php echo $category['softwareName']; ?></li>
 		<br>
 	<?php endforeach; ?>
 </ul>

 <label>Software</label>
 <select>
 <?php foreach($softwares as $software) : ?>
 	<option value="<?php echo $software['softwareName']; ?>"><?php echo $software['softwareName']; ?></option>
 <?php endforeach; ?>
 </select>

           
</body>
</html>