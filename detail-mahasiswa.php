<?php
session_start();
	// membatasi halaman sebelum login
	if (!isset($_SESSION["login"])){
		echo "<script>
		document.location.href = 'login.php';
		</script>";
		exit;
	}
	$title = 'Detail Mahasiswa';
	include 'layout/header.php';
	// mengambil id mahasiswa
	$id_mahasiswa = (int)$_GET['id_mahasiswa'];
	// menampilkan data mahasiswa
	$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>
	<main class="container mt-5">
	<h1>Data <?= $mahasiswa['nama'];?></h1>
	<hr>
	<table class="table table-bordered table-striped mt-3">
		<tr>
			<td>Nama</td>
			<td>: <?= $mahasiswa['nama'];?></td>
		</tr>
		<tr>
			<td>Program Studi</td>
			<td>: <?= $mahasiswa['prodi'];?></td>
		</tr>
		<tr>
			<td>jenis kelamin</td>
			<td>: <?= $mahasiswa['jenis_kelamin'];?></td>
		</tr>
		<tr>
			<td>telepon</td>
			<td>: <?= $mahasiswa['telepon'];?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>: <?= $mahasiswa['email'];?></td>
		</tr>
		<tr>
			<td width="50%	">Foto</td>
			<td><a href="assets/img/<?= $mahasiswa['foto'];?>">
			<img src="./assets/img/<?= $mahasiswa['foto'];?>" alt="" width="50%">
			</a></td>
		</tr>
	</table>
	<a href="mahasiswa.php"	class="btn btn-secondary btn-sm" style="float: right;">kembali</a>
	
	
	</main>

<?php
	include 'layout/footer.php';
?>