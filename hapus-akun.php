<?php
	include './config/app.php';
	// menerima id Akun
	$id_akun = (int)$_GET['id_akun'];

	if(delete_akun($id_akun) > 0){
		echo "<script>
		alert('Data Akun Berhasil Dihapus');
		document.location.href = 'crud-modal.php';
		</script>";
	}else {
		echo "<script>
		alert('Data Akun Gagal Dihapus');
		document.location.href = 'crud-modal.php';
		</script>";
	}

?>