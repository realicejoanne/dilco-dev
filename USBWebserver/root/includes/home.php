<?php

	$query = mysqli_query($connection, "SELECT * FROM mata_pelajaran order by RAND() LIMIT 6")

?>

		<!-- hot -->
        <div class="toTopHome" id="top"></div>
		<div class="hot">
			<div class="slides slideanimate">
				<img src="assets/images/a.jpeg" class="slideimg">
			</div>
			<div class="slides slideanimate">
				<img src="assets/images/b.jpeg" class="slideimg">
			</div>
			<div class="slides slideanimate">
				<img src="assets/images/c.jpeg" class="slideimg">
			</div>

			<button class="slidebtn slidebtn-left" onclick="plusDivs(-1)">&#10094;</button>
			<button class="slidebtn slidebtn-right" onclick="plusDivs(1)">&#10095;</button>
		</div>
        
		<!-- selected course -->
        <div class="selected">
            <div class="container">
				<h1 class="selectedheader">MATA PELAJARAN FAVORIT</h1>
                <div class="allgrids">
                    <a href="index.php?mapel=2"><div class="col-md-4 layout-grid">
                        <div class="layoutdetail-grid selected-grid1">
                            <div class="grid-text">
                                <h3>Passive Voice</h3>
                                <h4>Mata pelajaran: Bahasa Inggris</h4>
                            </div>
                        </div>
                    </div></a>
                    <a href="index.php?mapel=4"><div class="col-md-4 layout-grid">
                        <div class="layoutdetail-grid selected-grid2">
                            <div class="grid-text">
                                <h3>UU Keperawatan</h3>
                                <h4>Mata pelajaran: UU Keperawatan</h4>
                            </div>
                        </div>
                    </div></a>
                    <a href="index.php?mapel=3"><div class="col-md-4 layout-grid">
                        <div class="layoutdetail-grid selected-grid3">
                            <div class="grid-text">
                                <h3>Pengambilan Gambar</h3>
                                <h4>Mata pelajaran: Teknik Fotografi</h4>
                            </div>
                        </div> 
                    </div></a>
                </div>
				<br>
				<div class="allgrids">
                    <a href="index.php?mapel=1"><div class="col-md-4 layout-grid">
                        <div class="layoutdetail-grid selected-grid4">
                            <div class="grid-text">
                                <h3>Sejarah Islam Modern</h3>
                                <h4>Mata pelajaran: Agama Islam</h4>
                            </div>
                        </div>
                    </div></a>
                    <a href="index.php?mapel=3"><div class="col-md-4 layout-grid">
                        <div class="layoutdetail-grid selected-grid5">
                            <div class="grid-text">
                                <h3>Videografi</h3>
                                <h4>Mata pelajaran: Teknik Fotografi</h4>
                            </div>
                        </div>
                    </div></a>
                    <a href="index.php?mapel=3"><div class="col-md-4 layout-grid">
                        <div class="layoutdetail-grid selected-grid6">
                            <div class="grid-text">
                                <h3>Fotografi</h3>
                                <h4>Mata pelajaran: Teknik Fotografi</h4>
                            </div>
                        </div> 
                    </div></a>
                </div>
            </div>
        </div>
