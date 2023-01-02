<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<style type="text/css">
		body{
			border: 3px double #000;
		}
		#box{

			padding: 10px;
		}
		table{
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div id="box">
		<center>
			<h1>
				DAFTAR NAMA LANSIA
				<br>
				<?= $label ?>	
			</h1>
			<hr>
		</center>
		<br>
		<div id="tbl">
			<table border="1" cellpadding="14" cellspacing="0">
				<tr>
					<th>Nama</th>
					<th>Tanggal Lahir</th>
					<th>ALamat</th>
					<th>NIK</th>
					<th>Bulan</th>
				</tr>
				<?php foreach($laporan as $row): ?>
				<tr>
					<td><?= $row['nama'] ?></td>
					<td><?= $row['tgl_lahir'] ?></td>
					<td><?= $row['alamat'] ?></td>
					<td><?= $row['NIK'] ?></td>
					<td><?= $row['bulan'] ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
			
		</div>
		
	</div>

</body>
</html>