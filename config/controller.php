<?php
	// fungsi tampil data
	function select($query)
	{
		// panggil koneksi database
		global $db;

		$result = mysqli_query($db,$query);
		$rows= [];

		while ($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		return $rows;
	}

	// fungsi menambahkan data barang
	function create_barang($post){
		global $db;

		$nama = strip_tags($post['nama']);
		$jumlah = strip_tags($post['jumlah']); 
		$harga = strip_tags($post['harga']); 

		// query tambah data
		$query = "INSERT INTO barang VALUES(null,'$nama','$jumlah','$harga', CURRENT_TIMESTAMP())";

		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}

	// fungsi edit barang
	function update_barang($post){
		global $db;

		$id_barang = $post['id_barang'];
		$nama = strip_tags($post['nama']);
		$jumlah = strip_tags($post['jumlah']); 
		$harga = strip_tags($post['harga']); 

		// query ubah data
		$query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah',harga = '$harga' WHERE id_barang = $id_barang";

		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}

	// fungsi menghapus data barang
	function delete_barang($id_barang){
		global $db;

		// query hapus data barang
		$query = "DELETE FROM barang WHERE id_barang = $id_barang";
		
		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}

	// fungsi menambahkan data Mahasiswa
	function create_mahasiswa($post){
		global $db;

		$nama = strip_tags($post['nama']);
		$prodi = strip_tags($post['prodi']); 
		$jenis_kelamin = strip_tags($post['jenis_kelamin']);
		$telepon = strip_tags($post['telepon']);  
		$email = strip_tags($post['email']); 
		$foto = upload_file(); 
		// check upload file
		if (!$foto){
			return false;
		}
		// query tambah data
		$query = "INSERT INTO mahasiswa VALUES(null,'$nama','$prodi','$jenis_kelamin', '$telepon','$email','$foto')";

		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}

	// fungsi mengupload file
	function upload_file(){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$error = $_FILES['foto']['error'];
		$tmpName = $_FILES['foto']['tmp_name'];


		// check file yang diupload
		$extensifileValid = ['jpg', 'jpeg', 'png'];
		$extensifile = explode(".", $namaFile);
		$extensifile = strtolower(end($extensifile));
		// check extensi
		if (!in_array($extensifile, $extensifileValid)) {
			// pesan gagal
			echo "<script>
			alert('Format File Tidak Valid')
			document.location.href = 'tambah-mahasiswa.php'
			</script>";
			die();
		}
		// check ukuran
		if ($ukuranFile > 2048000) {			// pesan gagal
			echo "<script>
			alert('Ukuran File Max 2 MB')
			document.location.href = 'tambah-mahasiswa.php'
			</script>";
			die();		
		}

		// generate nama file baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $extensifile;

		// pindah ke folder
		move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);
		return $namaFileBaru;
	}
	// fungsi menghapus data mahasiswa
	function delete_mahasiswa($id_mahasiswa){
		global $db;

		// query hapus data mahasiswa
		$query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
		
		mysqli_query($db, $query);

		return mysqli_affected_rows($db);
	}
?>