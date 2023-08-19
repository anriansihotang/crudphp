<?php
	$title = 'Daftar Mahasiswa';
	include './layout/header.php';
	// menampilkan data mahasiswa
	$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa ASC");
?>
	<main class="container mt-5">
	<h1>Data Mahasiswa</h1>
	<hr>
	<a href="tambah-barang.php" class="btn btn-primary mb-1">Tambah</a>
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
				<td class="text-center" width="19%">
				<a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-secondary">Detail</a>
				<a href="" class="btn btn-success">Ubah</a>
				<a href="" class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus ? ');">Hapus</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	</main>

<?php
	include './layout/footer.php';
?>