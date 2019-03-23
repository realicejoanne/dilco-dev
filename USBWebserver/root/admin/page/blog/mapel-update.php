<?php

if(isset($_POST["update"])){
    $id = $_POST["id"];
    $idjurusan = $_POST["jurusan_id"];
    $idkelas = $_POST["kelas_id"];
    $mapel = $_POST["mata_pelajaran"];
    mysqli_query($connection, "UPDATE mata_pelajaran SET id = '$id', jurusan_id = '$idjurusan', kelas_id = '$idkelas', mata_pelajaran = '$mapel'
                                WHERE id = '$id'");
    header("location:index.php?mapel");
}

$kode_mapel= $_GET["mapel-update"];

$jurusan = mysqli_query($connection, "SELECT * FROM jurusan ORDER BY id ASC");

$kelas = mysqli_query($connection, "SELECT * FROM kelas ORDER BY id ASC");

$edit = mysqli_query($connection, "SELECT mata_pelajaran.*, jurusan.jurusan, kelas.kelas
                                    FROM mata_pelajaran, jurusan, kelas
                                    WHERE mata_pelajaran.id = '$kode_mapel'
                                    AND mata_pelajaran.jurusan_id = jurusan.id
                                    AND mata_pelajaran.kelas_id = kelas.id
                                    ORDER BY mata_pelajaran.id ASC");

$row_edit = mysqli_fetch_array($edit);

$mapel = mysqli_query($connection, "SELECT mata_pelajaran.*, jurusan.jurusan, kelas.kelas
                                    FROM mata_pelajaran, jurusan, kelas
                                    WHERE mata_pelajaran.jurusan_id = jurusan.id
                                    AND mata_pelajaran.kelas_id = kelas.id
                                    ORDER BY mata_pelajaran.id ASC");
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
                                        <option value="<?php echo $row_jurusan["id"]?>">
											<?php echo $row_jurusan["jurusan"]?>
										</option>
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
                                        <option value="<?php echo $row_kelas["id"]?>">
											<?php echo $row_kelas["kelas"]?>
										</option>
                                        <?php }?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <input class="form-control" type="text" name="mata_pelajaran" value="<?php echo $row_edit["mata_pelajaran"]?>" required/>
                            </div>
                            <button type="submit" name="update" class="btn btn-success">Save</button>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>   
                        <?php if (mysqli_num_rows($mapel)){?>
                        <?php while($row_mapel = mysqli_fetch_array($mapel)){?>
                            <tr>
                                <td><?php echo $row_mapel["id"]?></td>
                                <td><?php echo $row_mapel["jurusan"]?></td>
                                <td><?php echo $row_mapel["kelas"]?></td>
                                <td><?php echo $row_mapel["mata_pelajaran"]?></td>
                                <td class="center">
									<a href="index.php?mapel-update=<?php echo $row_mapel["id"]?>" class="btn btn-warning btn-xs" type="button">Ubah</a>
									<a href="index.php?mapel-delete=<?php echo $row_mapel["id"]?>" class="btn btn-danger btn-xs" type="button">Hapus</a>
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