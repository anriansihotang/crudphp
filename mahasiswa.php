<?php
session_start();
	// membatasi halaman sebelum login
	if (!isset($_SESSION["login"])){
		echo "<script>
		document.location.href = 'login.php';
		</script>";
		exit;
	}
	$title = 'Daftar Mahasiswa';
	include 'layout/header.php';
	// menampilkan data mahasiswa
	$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC");
?>
	<main class="container mt-5">
	<h1><i class="fa-solid fa-users"></i> Data Mahasiswa</h1>
	<hr>
	<a href="tambah-mahasiswa.php" class="btn btn-primary mb-1">Tambah</a>
	<table class="table table-bordered table-striped mt-3" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Prodi</th>
				<th>Jenis Kelamin</th>
				<th>Telepon</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no = 1;?>
			<?php foreach ($data_mahasiswa as $mahasiswa) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $mahasiswa['nama'];?></td>
				<td><?= $mahasiswa['prodi']; ?></td>
				<td><?= $mahasiswa['jenis_kelamin']; ?></td>
				<td><?= $mahasiswa['telepon']; ?></td>
				<td class="text-center" width="30%">
				<a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-secondary"><i class="fa-solid fa-eye"></i> Detail</a>
				<a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"> </i> Ubah</a>
				<a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus ? ');">><i class="fa-solid fa-trash"> </i> Hapus</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	</main>

<?php
	include 'layout/footer.php';
?>