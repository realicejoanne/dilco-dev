<?php

if(isset($_POST["submit"])){
    $id = $_POST["id"];
	$idjurusan = $_POST["jurusan_id"];
    $idkelas = $_POST["kelas_id"];
    $idmapel = $_POST["mapel_id"];
    $idmateri = $_POST["materi_id"];
    $konten = $_POST["konten"];
	$file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "././materi/" .$file_name);
    mysqli_query($connection, "UPDATE '$id','$idjurusan','$idkelas','$idmapel','$idmateri','$konten')");
    header("location:index.php?file");
}

$kode_file= $_GET["file-update"];

$jurusan = mysqli_query($connection, "SELECT * FROM jurusan ORDER BY id ASC");

$kelas = mysqli_query($connection, "SELECT * FROM kelas ORDER BY id ASC");

$mapel = mysqli_query($connection, "SELECT * FROM mata_pelajaran ORDER BY id ASC");

$materi = mysqli_query($connection, "SELECT * FROM materi ORDER BY id ASC");

$edit = mysqli_query($connection, "SELECT materi_file.*, jurusan.jurusan, kelas.kelas, mata_pelajaran.mata_pelajaran, materi.materi
                                    FROM materi_file, jurusan, kelas, mata_pelajaran, materi
									WHERE materi_file.materi_id = '$kode_file'
                                    AND materi_file.materi_id = materi.id
									AND materi_file.jurusan_id = jurusan.id
									AND materi_file.kelas_id = kelas.id
									AND materi_file.mapel_id = mata_pelajaran.id
									ORDER BY materi_file.id ASC");

$row_edit = mysqli_fetch_array($edit);

$materifile = mysqli_query($connection, "SELECT materi_file.*, jurusan.jurusan, kelas.kelas, mata_pelajaran.mata_pelajaran, materi.materi
											FROM materi_file, jurusan, kelas, mata_pelajaran, materi
											WHERE materi_file.materi_id = materi.id
											AND materi_file.jurusan_id = jurusan.id
											AND materi_file.kelas_id = kelas.id
											AND materi_file.mapel_id = mata_pelajaran.id
											ORDER BY materi_file.id ASC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Database &raquo; File Materi</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="" method="post">
							<div class="form-group">
                                <label>Id</label>
                                <input class="form-control" type="text" name="id" value="<?php echo $row_edit["id"]?>" readonly/>
                            </div>
							<div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan_id" required>
                                    <option value="<?php echo $row_edit["jurusan_id"]?>"> <?php echo $row_edit["jurusan"]?> </option>
                                    <?php if(mysqli_num_rows($jurusan)){?>
                                        <?php while ($row_jurusan=mysqli_fetch_array($jurusan)){?>
                                        <option value="<?php echo $row_jurusan["id"]?>"> <?php echo $row_jurusan["jurusan"]?> </option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas_id" required>
                                    <option value="<?php echo $row_edit["kelas_id"]?>"> <?php echo $row_edit["kelas"]?> </option>
                                    <?php if(mysqli_num_rows($kelas)){?>
                                        <?php while ($row_kelas=mysqli_fetch_array($kelas)){?>
                                        <option value="<?php echo $row_kelas["id"]?>"> <?php echo $row_kelas["kelas"]?> </option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select class="form-control" name="mapel_id" required>
                                    <option value="<?php echo $row_edit["mapel_id"]?>"> <?php echo $row_edit["mata_pelajaran"]?> </option>
                                    <?php if(mysqli_num_rows($mapel)){?>
                                        <?php while ($row_mapel=mysqli_fetch_array($mapel)){?>
                                        <option value="<?php echo $row_mapel["id"]?>"> <?php echo $row_mapel["mata_pelajaran"]?> </option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Materi</label>
                                <select class="form-control" name="materi_id" required>
                                    <option value="<?php echo $row_edit["materi_id"]?>"> <?php echo $row_edit["materi"]?> </option>
                                    <?php if(mysqli_num_rows($materi)){?>
                                        <?php while ($row_materi=mysqli_fetch_array($materi)){?>
                                        <option value="<?php echo $row_materi["id"]?>"> <?php echo $row_materi["materi"]?> </option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <!--file materi di sini-->
							<div class="form-group">
                                <label>File Materi</label>
                                <input class="form-control" name="file" type="file" required/>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
								<th>Id</th>
								<th>Jurusan</th>
								<th>Kelas</th>
								<th>Mata Pelajaran</th>
                                <th>Materi</th>
                                <th>File Materi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>   
                        <?php if (mysqli_num_rows($materifile)){?>
                        <?php while($row_materifile = mysqli_fetch_array($materifile)){?>
                            <tr>
								<td><?php echo $row_materifile["id"]?></td>
								<td><?php echo $row_materifile["jurusan"]?></td>
                                <td><?php echo $row_materifile["kelas"]?></td>
                                <td><?php echo $row_materifile["mata_pelajaran"]?></td>
                                <td><?php echo $row_materifile["materi"]?></td>
                                <td><?php echo $row_materifile["konten"]?></td>
                                <td class="center">
									<a href="index.php?file-update=<?php echo $row_materifile["id"]?>" class="btn btn-warning btn-xs" type="button">Ubah</a>
									<a href="index.php?file-delete=<?php echo $row_materifile["id"]?>" class="btn btn-danger btn-xs" type="button">Hapus</a>
								</td>
                            </tr>
                        <?php }?>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>