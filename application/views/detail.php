<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>Detail Daftar Pemain</title>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #17a158;">  
		<a class="navbar-brand" href="<?php echo site_url('admin/') ?>">
			<img class="td-retina-data" data-retina="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" src="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" alt="" width="127" height="42">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div style="text-align: right;">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo site_url('admin/keluar') ?>">Keluar<span class="sr-only"></span></a>
				</li>
			</ul>
		</div>
	</nav>

	
	<div class="card border-secondary mx-auto" style="margin: 75px; max-width: 800px; min-width: 600px">
		<div class="card-header">
			<center>
				<h1>
					<?php foreach ($tim as $key) {
						echo $key['nama_tim'];
					?>
				</h1>
			</center>
		</div>
		<div class="card-body">
			<a type="submit" class="btn btn-success" href="<?php echo site_url('output/download_info_tim/'.$key['no_punggung']) ?>">Download</a>
			<h2>Info Tim</h2>
			<table class="table">
				<tr>
					<td>Tim</td>
					<td>:</td>
					<td><?=$key['gender'];?></td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td><?=$key['asal_sekolah'];?></td>
				</tr>
				<tr>
					<td>Nama Tim</td>
					<td>:</td>
					<td><?=$key['nama_tim'];?></td>
				</tr>
				<tr>
					<td>Tingkat</td>
					<td>:</td>
					<td><?=$key['tingkat'];?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?=$key['telp'];?></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>:</td>
					<td><?=$key['kecamatan'];?></td>
				</tr>
			</table>
		<?php } ?>
			<h2>Info Anggota Tim</h2>
			<table class="table table-bordered mx-auto " style="margin-top: 20px">
				<thead class="bg-dark text-light">

					<td class="">No.</td>
					<td>Nama</td>
					<td class="mx-auto">Posisi</td>

				</thead>
				<tbody>
					<?php $i=1; foreach ($peserta as $row) { ?>
						<tr>
							<td><?=$i?></td>
							<td><?php echo $row['nama_peserta'];?></td>
							<td><?php echo $row['posisi'];?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>

		<script type="text/javascript">

		</script>

	</body>
	</html>
