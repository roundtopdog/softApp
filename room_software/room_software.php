<?php include '../view/header.php'; ?>
<div class="row">
	<div class="large-12 columns" id="mainContent">
		<div class="row">
			<div class="medium-4 large-8 columns">
				<main>
					<h1>Room / Software List</h1>

					<!-- display a list of rooms and software -->
					<table>
						<tr>
						<th>Room ID</th>
						<th>Room Name</th>
						<th>&nbsp;</th>
						</tr>
						<?php foreach($rooms as $room) : ?>
							<tr>
								<td><?php echo $room['roomID']; ?></td>
								<td><?php echo $room['roomName']; ?></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</main>
			</div><!-- end medium 4 large 8 -->
		</div><!-- end row -->
	</div><!-- end large-12 -->
</div><!-- end row -->

<?php include '../view/footer.php'; ?>
