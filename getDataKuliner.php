<?php
include 'config.php';

	if (isset($_POST['getData'])) {
		
		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT * FROM shop order by id desc LIMIT $start, $limit ");
		if ($sql->num_rows > 0) {
			$response = "";

			foreach ($sql as $row) {
?>
			<div class="col-lg-4 col-md-6 special-grid">
				<div class="gallery-single fix">
					<img style="height: 175px; width: 100%" src="admin/img/<?= $row['gambar'] ?>" class="img-fluid" alt="<?= $row['nama'] ?>">
					<div style="padding: 15px"><a href=""></a>
						<a target="_blank" href="<?= $row['gojek'] ?>"><h4 style="text-align: center;color: #d65106"><?= $row['nama'] ?></h4></a>
						<center><a target="_blank" href="<?= $row['gojek'] ?>"><img title="Order Gofood" width="50" src="images/gofood.png"></a></center>
						<br>
						<h4 style="text-align: center; color: #d65106"><?= $row['harga'] ?></h4>
						<!-- <p><?= $row['deskripsi'] ?></p> -->
						
					</div>
				</div>
			</div>

<?php 
			}

			exit($response);
		} else
			exit('reachedMax');
	}
?>