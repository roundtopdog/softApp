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

					<div>
					<!-- display a table of software associated with the room -->
					<h2>Room Name: <?php echo $room_name; ?></h2>
					<h2>Software Name:
					<ul style="list-style-type: none;">
						
				
						 <?php foreach ($roomids as $roomid) : ?>
						    <li><?php echo $roomid['softwareName']; ?></li>
						<?php endforeach; ?>
					</ul>
					

					
							<h2>Software Name</h2>
						<form action="." method="post">
						<input type="hidden" name="action" value="add_roomsoft_software">
						<select>
						<?php foreach($softwares as $software) : ?>
							<option name="software_id" value="<?php echo $software['softwareID']; ?>"><?php echo $software['softwareName']; ?></option>

						<?php endforeach; ?>
						</select>
						<!-- <input type="text" name="software_id" value="4"> -->
						<input type="submit" value="add">
						</form>




					<!-- 	<form action="." method="post" >
						 <input type="hidden" name="action" value="add_roomsoft_software">
						<select >
					<?php foreach($softwares as $software) : ?>
					<option   value="<?php echo $software['softwarID']; ?>">
					<?php echo $software['softwareName']; ?>

					</option>
				<?php endforeach; ?>
				</select>
				<input type="submit" value="Add">
				</form> -->
				</div>

				
			</div><!-- end medium 4 large 8 -->
		</div><!-- end row -->
	</div><!-- end large-12 -->
</div><!-- end row -->

<?php include '../view/footer.php'; ?>
