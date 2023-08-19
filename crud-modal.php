<?php
$title = 'Daftar Akun';
include './layout/header.php';
$data_akun = select("SELECT * from akun");
// jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
	if (create_akun($_POST) > 0) {
		echo "<script>
		alert('Data Akun Berhasil Ditambahkan');
		document.location.href = 'crud-modal.php';
		</script>";
	}else {
		echo "<script>
		alert('Data Akun Gagal Ditambahkan');
		document.location.href = 'crud-modal.php';
		</script>";
	}
}
// jika tombol ubah ditekan
if (isset($_POST['ubah'])) {
	if (update_akun($_POST) > 0) {
		echo "<script>
		alert('Data Akun Berhasil Diubah');
		document.location.href = 'crud-modal.php';
		</script>";
	}else {
		echo "<script>
		alert('Data Akun Gagal Diubah');
		document.location.href = 'crud-modal.php';
		</script>";
	}
}
?>
	<main class="container mt-5">
	<h1>Data Akun</h1>
	<hr>
	<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
	<table class="table table-bordered table-striped mt-3" id="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Password</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($data_akun as $akun) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $akun['nama']; ?></td>
				<td><?= $akun['username']; ?></td>
				<td><?= $akun['email']; ?></td>
				<td>Password Ter-enkripsi</td>
				<td class="text-center">
					<button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?=$akun['id_akun'];?>">Ubah</button>
					<button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?=$akun['id_akun'];?>">Hapus</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	</main>
	<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
			<div class="mb-3">
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="username">username</label>
				<input type="text" name="username" id="username" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="email">email</label>
				<input type="email" name="email" id="email" class="form-control" required>
			</div>
			<div class="mb-3">
				<label for="password">password</label>
				<input type="password" name="password" id="password" class="form-control" required minlength="6">
			</div>
			<div class="mb-3">
				<label for="level">level</label>
				<select name="level" id="level" class="form-control" required>
					<option value="">-- Pilih Level--</option>
					<option value="1">Admin</option>
					<option value="2">Operator</option>
				</select>
			</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
      </div>
	  </form>
    </div>
  </div>	
</div>
<!-- Modal Ubah -->
<?php foreach($data_akun as $akun):?>
	<div class="modal fade" id="modalUbah<?= $akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
			<input type="hidden" name="id_akun" value="<?= $akun['id_akun'];?>">
			<div class="mb-3">
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']?>" required>
			</div>
			<div class="mb-3">
				<label for="username">username</label>
				<input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']?>" required>
			</div>
			<div class="mb-3">
				<label for="email">email</label>
				<input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']?>" required>
			</div>
			<div class="mb-3">
				<label for="password">password<small>(Masukkan Password baru/lama)</small></label>
				<input type="password" name="password" id="password" class="form-control" required minlength="6">
			</div>
			<div class="mb-3">
				<label for="level">level</label>
				<select name="level" id="level" class="form-control" required>
					<?php $level = $akun['level'];?>
					<option value="1" <?= $level == '1' ? 'selected' : null?>>Admin</option>
					<option value="2" <?= $level == '2' ? 'selected' : null?>>Operator</option>
				</select>
			</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
      </div>
	  </form>
    </div>
  </div>	
</div>
<?php endforeach;?>
<!-- Modal Hapus -->
<?php foreach($data_akun as $akun):?>
	<div class="modal fade" id="modalHapus<?=$akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header bg-danger text-white">
			<h1 class="modal-title fs-5" id="exampleModalLabel">hapus Akun</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<p>Yakin Ingin Menghapus Akun : <?= $akun['nama'];?></p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
			<a href="hapus-akun.php?id_akun=<?=$akun['id_akun'];?>"class="btn btn-danger">Hapus</a>
		</div>
		</div>
	</div>	
	</div>
	<?php endforeach ?>
<?php 
include './layout/footer.php'
?>