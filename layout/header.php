<?php
	include './config/app.php';
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title;?></title>
	<!-- boostrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
	<header>
	<nav class="navbar bg-dark border-bottom border-body navbar-expand" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="#">CRUD PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">modal</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	</header>