<?php include '../view/header.php'; ?>
<div class="row">
	<div class="large-12 columns" id="mainContent">
		<div class="row">
			<div class="medium-4 large-8 columns">
				<main>
					<h1>Room / Software List</h1>

					<!-- display a list of rooms and software -->
					<h2>Rooms</h2>
					<nav>
						<ul>
						<?php foreach($rooms as $room) : ?>
							<li><a href="?room_id=<?php echo $room['roomID']; ?>">
							<?php echo $room['roomName']; ?>
							<?php echo $room['roomID']; ?>
							</a>
							</li>
						<?php endforeach; ?>
						</ul>
					</nav>	

					<!-- display a table of software associated with the room -->
					<h2>Room Name : <?php echo $room_name; ?></h2>
					
							<h1>Software Name</h1>
						<form action="." method="post" >
						<input type="hidden" name="action" value="add_roomsoft_software">	
						<select>
					<?php foreach($statement as $software) : ?>
					<option value="<?php echo $software['softwarID']; ?>">
					<?php echo $software['softwareName']; ?>
					</option>
				<?php endforeach; ?>
				</select>
				<input type="submit" value="Add">
				</form>
				<table border="1px solid black">
				<tr>
					<!-- <th>Room</th> -->
					<th>software</th>
					<th>Name</th>
					</tr>
					<?php foreach ($roomsofts as $roomsoft) : ?>
						<tr>
						<!-- <td><?php echo $roomsoft['roomID']; ?></td> -->
						<td><?php echo $roomsoft['softwareID']; ?></td>
						<td><?php echo $software['softwareName']; ?></td>
						</tr>
					<?php endforeach; ?>
					</table>
				</main>

				<table border="1px solid black">
					<tr>
						<th>softwareName</th>
						<th>misc</th>
					</tr>
					<?php foreach ($inventorys as $inventory) : ?>
					<tr>
						<td><?php echo $inventory['softwareName']; ?></td>
						<td><?php echo $inventory['roomName']; ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div><!-- end medium 4 large 8 -->
		</div><!-- end row -->
	</div><!-- end large-12 -->
</div><!-- end row -->

<?php include '../view/footer.php'; ?>
