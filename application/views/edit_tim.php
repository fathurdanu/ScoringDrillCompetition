<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>Hapus Tim </title>

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
		<div class="card-header"><center><h1>Hapus Tim</h1></center></div>
		<div class="card-body">
			SD
			<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>Putra</tr>
					<tr>
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Sekolah</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" >Kecamatan</th>
						<th  class="align-middle" >Telepon</th>
						<th  class="align-middle" >Tgl Daftar</th>
						
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($sd1 as $key){ ?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	
						<td class="align-middle"><?php echo $key['kecamatan']; ?></td>
						<td class="align-middle"><?php echo $key['telp']; ?></td>
						<td class="align-middle"><?php echo $key['tanggal']; ?></td>

						
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<a type="submit" href="<?php echo site_url('admin/detail/'.$key['no_punggung']) ?>" name="detail" class="btn btn-success" id="detail" style="width: 80px;">
									<center>Peserta</center>
								</a>
								<a type="submit" href="<?php echo site_url('admin/hapus/'.$key['no_punggung']) ?>" name="hapus" value="Update" class="btn btn-dark" id="hapus" style="width: 80px;" onClick="return confirm('Anda yakin ingin Menghapus?');">
									Hapus
								</a>
							</div>
						</td>
					
					</tr>
					<?php $i++; } ?>
				</table>
				<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>SD Putri</tr>
					<tr>
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Sekolah</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" >Kecamatan</th>
						<th  class="align-middle" >Telepon</th>
						<th  class="align-middle" >Tgl Daftar</th>
						
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($sd2 as $key){ ?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	
						<td class="align-middle"><?php echo $key['kecamatan']; ?></td>
						<td class="align-middle"><?php echo $key['telp']; ?></td>
						<td class="align-middle"><?php echo $key['tanggal']; ?></td>
						
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<a type="submit" href="<?php echo site_url('admin/detail/'.$key['no_punggung']) ?>" name="detail" class="btn btn-success" id="detail" style="width: 80px;">
									<center>Peserta</center>
								</a>
								<a type="submit" href="<?php echo site_url('admin/hapus/'.$key['no_punggung']) ?>" name="hapus" value="Update" class="btn btn-dark" id="hapus" style="width: 80px;" onClick="return confirm('Anda yakin ingin Menghapus?');">
									Hapus
								</a>
							</div>
						</td>
					
					</tr>
					<?php $i++; } ?>
				</table>


				SMP
			<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>Putra</tr>
					<tr>	
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Sekolah</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" >Kecamatan</th>
						<th  class="align-middle" >Telepon</th>
						<th  class="align-middle" >Tgl Daftar</th>
						
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($smp1 as $key){ ?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	
						<td class="align-middle"><?php echo $key['kecamatan']; ?></td>
						<td class="align-middle"><?php echo $key['telp']; ?></td>
						<td class="align-middle"><?php echo $key['tanggal']; ?></td>
						
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<a type="submit" href="<?php echo site_url('admin/detail/'.$key['no_punggung']) ?>" name="detail" class="btn btn-success" id="detail" style="width: 80px;">
									<center>Peserta</center>
								</a>
								<a type="submit" href="<?php echo site_url('admin/hapus/'.$key['no_punggung']) ?>" name="hapus" value="Update" class="btn btn-dark" style="width: 80px;" onClick="return confirm('Anda yakin ingin Menghapus?');">Hapus
									
								</a>
							</div>
						</td>
					
					</tr>
					<?php $i++; } ?>
				</table>
				<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>SMP Putri</tr>
					<tr>	
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Sekolah</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" >Kecamatan</th>
						<th  class="align-middle" >Telepon</th>
						<th  class="align-middle" >Tgl Daftar</th>
						
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($smp2 as $key){ ?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	
						<td class="align-middle"><?php echo $key['kecamatan']; ?></td>
						<td class="align-middle"><?php echo $key['telp']; ?></td>
						<td class="align-middle"><?php echo $key['tanggal']; ?></td>
						
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<a type="submit" href="<?php echo site_url('admin/detail/'.$key['no_punggung']) ?>" name="detail" class="btn btn-success" id="detail" style="width: 80px;">
									<center>Peserta</center>
								</a>
								<a type="submit" href="<?php echo site_url('admin/hapus/'.$key['no_punggung']) ?>" name="hapus" value="Update" class="btn btn-dark" style="width: 80px;" onClick="return confirm('Anda yakin ingin Menghapus?');">Hapus
								</a>
							</div>
						</td>
					
					</tr>
					<?php $i++; } ?>
				</table>

				SMA
			<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>Putra</tr>
					<tr>
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Sekolah</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" >Kecamatan</th>
						<th  class="align-middle" >Telepon</th>
						<th  class="align-middle" >Tgl Daftar</th>
						
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($sma1 as $key){ ?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	
						<td class="align-middle"><?php echo $key['kecamatan']; ?></td>
						<td class="align-middle"><?php echo $key['telp']; ?></td>
						<td class="align-middle"><?php echo $key['tanggal']; ?></td>
						
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<a type="submit" href="<?php echo site_url('admin/detail/'.$key['no_punggung']) ?>" name="detail" class="btn btn-success" id="detail" style="width: 80px;">
									<center>Peserta</center>
								</a>
								<a type="submit" href="<?php echo site_url('admin/hapus/'.$key['no_punggung']) ?>" name="hapus" value="Update" class="btn btn-dark" id="hapus" style="width: 80px;" onClick="return confirm('Anda yakin ingin Menghapus?');">
									Hapus
								</a>
							</div>
						</td>
					
					</tr>
					<?php $i++; } ?>
				</table>
				<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>SMA Putri</tr>
					<tr>
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Sekolah</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" >Kecamatan</th>
						<th  class="align-middle" >Telepon</th>
						<th  class="align-middle" >Tgl Daftar</th>
						
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($sma2 as $key){ ?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	
						<td class="align-middle"><?php echo $key['kecamatan']; ?></td>
						<td class="align-middle"><?php echo $key['telp']; ?></td>
						<td class="align-middle"><?php echo $key['tanggal']; ?></td>
						
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<a type="submit" href="<?php echo site_url('admin/detail/'.$key['no_punggung']) ?>" name="detail" class="btn btn-success" id="detail" style="width: 80px;">
									<center>Peserta</center>
								</a>
								<a type="submit" href="<?php echo site_url('admin/hapus/'.$key['no_punggung']) ?>" name="hapus" value="Update" class="btn btn-dark" id="hapus" style="width: 80px;" onClick=\"return confirm('Anda yakin ingin Menghapus?');\">
									<center>Hapus</center>
								</a>
							</div>
						</td>
					
					</tr>
					<?php $i++; } ?>
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
