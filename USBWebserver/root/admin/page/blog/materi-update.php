<?php

if(isset($_POST["update"])){
    $id = $_POST["id"];
    $idjurusan = $_POST["jurusan_id"];
    $idkelas = $_POST["kelas_id"];
    $idmapel = $_POST["mapel_id"];
    $materi = $_POST["materi"];
    mysqli_query($connection, "UPDATE materi SET id = '$id', jurusan_id = '$idjurusan', kelas_id = '$idkelas', mapel_id = '$idmapel',  materi = '$materi'
                                WHERE id = '$id'");
    header("location:index.php?materi");
}

$kode_materi= $_GET["materi-update"];

$jurusan = mysqli_query($connection, "SELECT * FROM jurusan ORDER BY id ASC");

$kelas = mysqli_query($connection, "SELECT * FROM kelas ORDER BY id ASC");

$mapel = mysqli_query($connection, "SELECT * FROM mata_pelajaran ORDER BY id ASC");

$edit = mysqli_query($connection, "SELECT materi.*, jurusan.jurusan, kelas.kelas, mata_pelajaran.mata_pelajaran
                                    FROM materi, jurusan, kelas, mata_pelajaran
                                    WHERE materi.id = '$kode_materi'
                                    AND materi.jurusan_id = jurusan.id
                                    AND materi.kelas_id = kelas.id
                                    AND materi.mapel_id = mata_pelajaran.id
                                    ORDER BY materi.id ASC");

$row_edit = mysqli_fetch_array($edit);

$materi = mysqli_query($connection, "SELECT materi.*, jurusan.jurusan, kelas.kelas, mata_pelajaran.mata_pelajaran
                                    FROM materi, jurusan, kelas, mata_pelajaran
                                    WHERE materi.jurusan_id = jurusan.id
                                    AND materi.kelas_id = kelas.id
                                    AND materi.mapel_id = mata_pelajaran.id
                                    ORDER BY materi.id ASC");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Database &raquo; Mata Pelajaran</h1>
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
                                <label>Judul Bab Materi</label>
                                <input class="form-control" type="text" name="materi" value="<?php echo $row_edit["materi"]?>" required/>
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Update</button>
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
                                <th>Bab</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>   
                        <?php if (mysqli_num_rows($materi)){?>
                        <?php while($row_materi = mysqli_fetch_array($materi)){?>
                            <tr>
                                <td><?php echo $row_materi["id"]?></td>
                                <td><?php echo $row_materi["jurusan"]?></td>
                                <td><?php echo $row_materi["kelas"]?></td>
                                <td><?php echo $row_materi["mata_pelajaran"]?></td>
                                <td><?php echo $row_materi["materi"]?></td>
                                <td class="center">
									<a href="index.php?materi-update=<?php echo $row_materi["id"]?>" class="btn btn-warning btn-xs" type="button">Ubah</a>
									<a href="index.php?materi-delete=<?php echo $row_materi["id"]?>" class="btn btn-danger btn-xs" type="button">Hapus</a>
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