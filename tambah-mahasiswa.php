<?php 
	$title = 'Tambah Mahasiswa';
	include './layout/header.php';

	// check apakah tombol tambah ditekan
	if(isset($_POST['tambah'])){
		if(create_mahasiswa($_POST) > 0){
			echo "<script>
			alert('Data Mahasiswa Berhasil Ditambahkan');
			document.location.href = 'mahasiswa.php';
			</script>";
		}else {
			echo "<script>
			alert('Data Mahasiswa Gagal Ditambahkan');
			document.location.href = 'mahasiswa.php';
			</script>";
		}
	}
?>
	<main class="container mt-5">
		<h1>Tambah Mahasiswa</h1>
		<hr>

		<form action="" method="post">
			<div class="mb-3">
				<label for="nama" class="form-label">Nama Mahasiswa</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa..." required>
			</div>
			<div class="row">
				<div class="mb-3 col-6">
					<label for="prodi" class="form-label">Program Studi</label>
					<select name="prodi" id="prodi" class="form-control" required>
						<option value="">-- Pilih Prodi --</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik Listrik">Teknik Listrik</option>
						<option value="Teknik Mesin">Teknik Mesin</option>
					</select>
				</div>
				<div class="mb-3 col-6">
					<label for="jenis_kelamin" class="form-label">Program Studi</label>
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
						<option value="">-- Pilih Jenis Kelamin --</option>
						<option value=" Laki Laki"> Laki Laki</option>
						<option value=" Perempuan"> Perempuan</option>
					</select>
				</div>
			</div>
			<div class="mb-3">
				<label for="telepon" class="form-label">Telepon</label>
				<input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
			</div>
			<div class="mb-3">
				<label for="foto" class="form-label">Foto</label>
				<input type="text" class="form-control" id="foto" name="foto" placeholder="Foto..." required>
			</div>
			<button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
		</form>
	</main>
<?php 
	include './layout/footer.php';
?>