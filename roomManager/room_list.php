<?php include '../view/header.php'; ?>

<div class="row">
	<div class="large-12 colums" id="mainContent">
		<div class="row">
			<div class="medium-4 large-8 columns">
				<main>
					<h1>Room List</h1>
					
					<!-- display the list of rooms -->
					<table>
						<tr>
							<th>Room ID</th>
							<th>Name</th>
							<th>&nbsp;</th>
						</tr>
						<?php foreach ($rooms as $room) : ?>
						<tr>
							<td><?php echo $room['roomID']; ?></td>
							<td><?php echo $room['roomName']; ?></td>

							<td>
								<form action="delete_room.php" method="post">
									<input type="hidden" name="room_id" value="<?php echo $room['roomID']; ?> ">
									<input type="submit" value="delete">
								</form>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</main>
			</div><!-- end medium 8 large 8 columns -->
					
			<div class="small-10 medium-4 large-4 columns ">
				<h1>Add Room</h1>
					<form action="index.php" method="post" id="room_name">
						<input type="hidden" name="action" value="add_room">
						<label>Room Name:</label>
						<input type="text" name="name"  placeholder="Add Room Name">
						<input id="name" type="submit" value="Add">
					</form>
			</div><!-- end medium 4 large 4 columns -->
				
		</div><!-- end row -->
	</div><!-- end large 12 columns -->
</div> <!-- end row -->
<?php include '../view/footer.php'; ?>