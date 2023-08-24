<?php
	session_start();
	// membatasi halaman sebelum login
	if (!isset($_SESSION["login"])){
		echo "<script>
		document.location.href = 'login.php';
		</script>";
		exit;
	}
$title = 'Daftar Barang';
include 'layout/header.php';
$data_barang = select("SELECT * from barang ORDER BY id_barang ASC");
?>
	<main class="container mt-5">
	<h1><i class="fa-solid fa-list"></i> Data Barang</h1>
	<hr>
	<a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fa-solid fa-circle-plus"> </i> Tambah</a>
	<table class="table table-bordered table-striped mt-3" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Tanggal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;?>
			<?php foreach ($data_barang as $barang) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $barang['nama'];?></td>
				<td><?= $barang['jumlah']; ?></td>
				<td>Rp. <?=  number_format($barang['harga'],0,',','.'); ?></td>
				<td><?= date('d/m/Y | H:i:s',strtotime($barang['tanggal'])); ?></td>
				<td width="20%" class="text-center">
				<a href="ubah-barang.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"> </i> ubah</a>
				<a href="hapus-barang.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus ? ');"><i class="fa-solid fa-trash"> </i> hapus</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	</main>
<?php 
include 'layout/footer.php'
?>