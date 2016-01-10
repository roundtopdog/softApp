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
					<h2><?php echo $room_name; ?></h2>
					<table>
						<tr>
							<th>Software Name</th>
							<th>&nbsp;</th>
						</tr>
					<?php foreach($softwares as $software) : ?>
					<tr>
						<td><?php echo $software['softwareName']; ?></td>
						<td><form action="." method="post">
							<input type="hidden" name="action" value="delete_room">
							<input type="hidden" name="room_id" value="<?php echo $software['roomID']; ?>">
							<input type="hidden" name="software_id" value="<?php echo $software['softwareID']; ?>">
							<input type="submit" value="Delete">
							</form></td>
					</tr>
				<?php endforeach; ?>
				</table>
				</main>
			</div><!-- end medium 4 large 8 -->
		</div><!-- end row -->
	</div><!-- end large-12 -->
</div><!-- end row -->

<?php include '../view/footer.php'; ?>
