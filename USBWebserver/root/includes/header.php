<?php
	$query=mysqli_query($connection, "SELECT * FROM jurusan ORDER BY id ASC");
?>
	<body>
		<!-- floating menu bar -->
		<div class="navbar navbar-fixed-top x-navbar">
			<div class="container brand">
				<a href="index.php" class="navbar-brand logo"><span class="fa fa-graduation-cap logo"></span> DiLCo</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navHeaderCollapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navHeaderCollapse">
					<ul class="navb navbar-nav navbar-right x-nav">
					<?php while($row = mysqli_fetch_array($query)) {
						$jurusan_id = $row["id"];
						$querysub = mysqli_query($connection, "SELECT * FROM kelas ORDER BY id ASC");
						echo
						'<li>
							<a href="#" class="toscroll scroll dropdown-toggle" data-toggle="dropdown">'.$row["jurusan"].' <b class="caret"></b></a>
							<ul class="dropdown-menu multi-level">';
							while ($rowsub = mysqli_fetch_array($querysub)) {
								$kelas_id = $rowsub["id"];
								$querysubsub = mysqli_query($connection, "SELECT * FROM mata_pelajaran WHERE jurusan_id='$jurusan_id' AND kelas_id='$kelas_id'");
								echo 
								'<li class="dropdown-submenu">
									<a href="#" class="toscroll scroll dropdown-toggle" data-toggle="dropdown">'.$rowsub["kelas"].'</a>';
								//jika ada mapelnya--------
								if($querysubsub->num_rows == null) echo '';
								else {
									echo '<ul class="dropdown-item">';
									while ($rowsubsub = mysqli_fetch_array($querysubsub)) {
										echo 
										'<li>
											<a href="index.php?mapel='.$rowsubsub["id"].'" class="toscroll scroll citem">'.$rowsubsub["mata_pelajaran"].'</a>
										</li>';
									}
									echo '</ul>';
								}
								//--------jika ada mapelnya
									echo
								'</li>';
							}
							echo
							'</ul>
						</li>';
					}?>
					</ul>
				</div>
			</div>
		</div>