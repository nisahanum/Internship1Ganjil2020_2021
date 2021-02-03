<?php
include 'functions.php';
if (empty($_SESSION['login']))
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="favicon.ico" />

	<title>Sistem Informasi Korporat</title>
	<link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/datatables/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/datatables/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable').DataTable();
		});
	</script>
	<style type="text/css">
		.c50_tree {
			margin: 0;
			padding: 0;
		}

		.c50_tree li {
			list-style: none;
		}

		.c50_tree ul li {
			margin: 10px;
			position: relative;
		}

		.c50_tree li:before {
			content: "";
			position: absolute;
			top: -10px;
			left: -20px;
			border-left: 2px solid black;
			border-bottom: 2px solid black;
			border-radius: 0 0 0 0;
			width: 20px;
			height: 20px;
		}

		.c50_tree li::after {
			position: absolute;
			content: "";
			top: 8px;
			left: -20px;
			border-left: 2px solid black;
			border-top: 2px solid black;
			border-radius: 0 0 0 0;
			width: 20px;
			height: 100%;
		}

		.c50_tree a {
			min-width: 80px;
		}

		.c50_tree li:last-child::after {
			display: none
		}

		.c50_tree li:last-child:before {
			border-radius: 0 0 0 5px
		}

		ul.c50_tree>li:first-child::before {
			display: none
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">HOME</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?= is_hidden('user') ?>"><a href="?m=user">User</a></li>
					<li class="<?= is_hidden('perusahaan') ?>"><a href="?m=perusahaan">Perusahaan</a></li>
					<li class="<?= is_hidden('jenis') ?>"><a href="?m=jenis">Jenis</a></li>
					<li class="<?= is_hidden('transaksi') ?>"><a href="?m=transaksi">Transaksi</a></li>
					<li class="dropdown <?= is_hidden('c50') ?>">
						<a href="?m=dataset" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Perhitungan C50 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="<?= is_hidden('dataset') ?>"><a href="?m=dataset">Dataset</a></li>
							<li class="<?= is_hidden('akurasi') ?>"><a href="?m=akurasi">Akurasi</a></li>
							<li class="<?= is_hidden('konsultasi') ?>"><a href="?m=konsultasi">Konsultasi</a></li>
							<li class="<?= is_hidden('testing') ?>"><a href="?m=testing">Testing</a></li>
							<li class="<?= is_hidden('hitung') ?>"><a href="?m=hitung">Hitung Testing</a></li>
						</ul>
					</li>
					<li class="<?= is_hidden('password') ?>"><a href="?m=password">Password</a></li>
					<li class="<?= is_hidden('logout') ?>"><a href="aksi.php?act=logout">Logout</a></li>
					<li class="<?= is_hidden('login') ?>"><a href="?m=login">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
	<footer class="footer bg-success">
		<div class="container">
			<p>Copyright &copy; <?= date('Y') ?> FannyShafiraDamayanti <em class="pull-right">Updated 08 Januari 2021</em></p>
		</div>
	</footer>
</body>

</html>