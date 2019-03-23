<?php

$mapel_id = $_GET["mapel"];
$query = mysqli_query($connection, "SELECT materi.*, mata_pelajaran.mata_pelajaran
                                    FROM materi, mata_pelajaran
                                    WHERE mata_pelajaran.id = materi.mapel_id
                                    AND materi.mapel_id = '$mapel_id'
                                    ORDER BY id ASC")

?>

		<!-- content -->
		<div class="content">
			<h1>Kumpulan Materi</h1><hr> <!-- belom dapet judul pake php -->
			<p class="detail">Klik pada judul file untuk membuka materi. Format yang tersedia terdiri dari HTML, PPT, MP4, dan PDF.</p>
			<p class="detail">Pilih HTML untuk membuka file presentasi yang telah dikonversi menjadi ringan.
			Pilih PPT untuk membuka file presentasi menggunakan Powerpoint.
			Pilih MP4 untuk membuka file video pembelajaran.
			Pilih PDF untuk membuka file modul pelajaran.</p><br><br>
			<div class="materi">
				<div class="container">
					<?php while($row = mysqli_fetch_array($query)) {
						$materi_id = $row["id"];
						$querysub = mysqli_query($connection, "SELECT * FROM materi_file WHERE materi_id='$materi_id'");
						echo
					'<div class="panel panel-default">
						<div class="panel-heading">
							<h3>'.$row["materi"].'</h3>
						</div>
						<div class="panel-body learned">';
							while ($rowsub = mysqli_fetch_array($querysub)) {
								$name = pathinfo($rowsub["konten"], PATHINFO_FILENAME);
								$ext  = pathinfo($rowsub["konten"], PATHINFO_EXTENSION);
									if ($ext == 'html'){
										echo '<img src="assets/images/html.png">';
									}
									else if ($ext == 'mp4'){
										echo '<img src="assets/images/mp4.png">';
									}
									else if ($ext == 'pptx'){
										echo '<img src="assets/images/ppt.png">';
									}
									else if ($ext == 'pdf'){
										echo '<img src="assets/images/pdf.png">';
									}
								echo '&nbsp;&nbsp;<a href="admin/materi/'.$rowsub["konten"].'" target="_blank">'.$name.'</a><br>';
						}
					echo
						'</div>
					</div>';
					}?>
				</div>
			</div>
		</div><br><br><br><br>