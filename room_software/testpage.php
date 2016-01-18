<?php
require_once('../model/database.php');


if (!isset($room_id)) {
    $room_id = filter_input(INPUT_GET, 'room_id', 
            FILTER_VALIDATE_INT);
    if ($room_id == NULL || $room_id == FALSE) {
        $room_id = 1;
    }
}



$query = 'select * from inventory 
join software 
on software.softwareID = inventory.softwareID 
join rooms
on rooms.roomID = inventory.roomID
where inventory.roomID = 2';
$statement2 = $db->prepare($query);
$statement2->execute();
$roomids = $statement2->fetchAll();
$statement2->closeCursor();

$query = 'select roomName from rooms where roomID = 2';
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

function add_inventory($room_id, $software_id){ 
$query = 'INSERT INTO inventory (inventoryID, roomID, softwareID)
            VALUES( NULL, :room_id, :software_id)';
$statement = $db->prepare($query);
$statement->bindValue(':room_id', $room_id);
$statement->bindValue(':software_id', $software_id);
$statement->execute();
$statement->$closeCursor();
}
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

 
 <ol>
 <?php foreach($roomids as $roomid) : ?>
    <li><?php echo $roomid['softwareID']; ?><?php echo $roomid['softwareName']; ?></li>
<?php endforeach; ?>
</ol>

 <label>Software</label>
 <select>
 <?php foreach($softwares as $software) : ?>
 	<option value="<?php echo $software['softwareName']; ?>"><?php echo $software['softwareName']; ?></option>
 <?php endforeach; ?>
 </select>

           
</body>
</html>
