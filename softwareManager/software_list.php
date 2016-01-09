<?php include '../view/header.php'; ?>

<div class="row">
	<div class="large-12 columns" id="mainContent">
		<div class="row">
			<div class="medium-4 large-8 columns">
				<main>
					<h1>Software List</h1>

					<!-- display a list of software -->
					<table>
						<tr>	
							<th>Software ID</th>
							<th>Software Name</th>
							<th>&nbsp;</th>
						</tr>
						<?php foreach($softwares as $software) : ?>
						<tr>
							<td><?php echo $software['softwareID']; ?> </td>
							<td><?php echo $software['softwareName']; ?> </td>

							<td>
								<form action="." method="post">
									<input type="hidden" name="action" value="delete_software">
									<input type="hidden" name="software_id" value="<?php echo $software['softwareID']; ?> ">
									<input type="submit" value="delete">
								</form>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</main>
			</div><!-- end medium 8 large 8 columns -->

			<div class="small-10 medium-4 large-4 columns">
				<h1>Add Software</h1>
					<form action="index.php" method="post">
						<input type="hidden" name="action" value="add_software">
						<label>Software Name</label>
						<input type="text" name="software_name" placeholder="Add software here">
						<input type="submit" value="Add">
					</form>
			</div><!-- end medium 4 large 4 columns	-->
		</div><!-- end row -->
	</div><!-- end large 12 columns -->
	<?php include '../view/footer.php' ;?>