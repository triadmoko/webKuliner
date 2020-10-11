<?php
include 'config.php';
	if (isset($_POST['getData'])) {
		
		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$sql = $conn->query("SELECT * FROM rm order by id desc LIMIT $start, $limit ");
		if ($sql->num_rows > 0) {
			$response = "";

			foreach ($sql as $row) {
?>
			<div class="col-lg-4 col-md-6 special-grid">
				<div class="gallery-single fix">
					<a href="">
						<img style="height: 175px; width: 100%" src="admin/img/<?= $row['gambar'] ?>" class="img-fluid" alt="<?= $row['namaRM'] ?>">
					</a>
					<div style="padding: 15px"><a href=""></a>
						<a target="_blank" href="menuRumahMakan.php?getDataMenuRumahMakan=<?= $row['namaRM'] ?>"><h4 style="text-align: center;color: #d65106"><?= $row['namaRM'] ?></h4></a>
						<p>Pemilik Rumah Makan <?= $row['namaRM'] ?> yaitu <?= $row['pemilik'] ?> yang beralamat di <?= $row['alamat'] ?></p>
						
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