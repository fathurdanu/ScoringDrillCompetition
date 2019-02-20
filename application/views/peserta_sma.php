<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Pendaftaran Peserta</title>

	<nav class="navbar navbar-expand-md navbar-dark  " style="background-color: #17a158;">  
		<a class="navbar-brand" href="<?php echo site_url('peserta/') ?>">
			<img class="td-retina-data" data-retina="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" src="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" alt="" width="127" height="42">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="<?php echo site_url('peserta/sd') ?>">SD<span class="sr-only"></span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="<?php echo site_url('peserta/smp') ?>">SMP<span class="sr-only"></span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link active" href="<?php echo site_url('peserta/sma') ?>">SMA<span class="sr-only"></span></a>
				</li>
			</ul>
		</div>
	</nav>
</head>
<body>
	<h1 style="text-align: center;">Pendaftaran Peserta</h1>
	<center><p class="text-danger"><?php
	if ($this->session->userdata('pesan') != '') {
		echo $this->session->userdata('pesan');
		$sess = array(
			'pesan' => '',
		);
		$this->session->set_userdata($sess);
	} 
	?></p></center>

	<div class="card border-secondary col-sm-12 col-md-9 col-lg-10 mx-auto" style="min-width: 70rem">
		<br>
		<div>
			<table>
				<tr>
					<td>
						<table class="table table-borderless table col-md-3" style="margin-right:5rem; width: 450px" >
							<form method="POST" action="<?php echo site_url('peserta/mendaftar') ?>">
								<tr>
									<td>Tingkat</td>
									<td>:</td>
									<td>
										SMA
										<select name="tingkat" class="invisible">
											<option value="sd" >SD</option>
											<option value="smp" >SMP</option>
											<option value="sma" selected="selected">SMA</option>
										</select>
									</td>
								</tr>

								<tr>
									<td>Jenis Kelamin </td>
									<td>:</td>
									<td><select name="gender">
										<option value="">Pilih Jenis Kelamin</option>
										<option value="putra">Putra</option>
										<option value="putri">Putri</option>
									</select></td> 
								</tr>

								<tr>	
									<td>Asal Sekolah</td> 	 
									<td>:</td> 
									<td><input type="text" style="width: 200px" class="form-control input-lg" name="asal_sekolah" placeholder="asal sekolah"></td>
								</tr>

								<tr>	
									<td>Nama Tim</td>
									<td>:</td> 
									<td><input type="text" style="width: 200px" class="form-control input-lg" name="nama_tim" placeholder="Nama Tim"></td>
								</tr>

								<tr>
									<td>No.Telepon </td>
									<td>:</td>
									<td><input type="text" style="width: 200px" class="form-control input-lg" name="no_telp" placeholder="notelp"></td> 
								</tr>

								<tr>
									<td>Kecamatan</td>
									<td>:</td>
									<td><select name="kecamatan">
										<option value="">Pilih Kecamatan</option>
										<option value="berbah">Berbah</option>
										<option value="cangkringan">Cangkringan</option>
										<option value="depok">Depok</option>
										<option value="gamping">Gamping</option>
										<option value="godean">Godean</option>
										<option value="kalasan">Kalasan</option>
										<option value="minggir">Minggir</option>
										<option value="mlati">Mlati</option>
										<option value="moyudan">Moyudan</option>
										<option value="ngaglik">Ngaglik</option>
										<option value="ngemplak">Ngemplak</option>
										<option value="pakem">Pakem</option>
										<option value="prambanan">Prambanan</option>
										<option value="seyegan">Seyegan</option>
										<option value="sleman">Sleman</option>
										<option value="tempel">Tempel</option>
										<option value="turi">Turi</option>
									</select></td>				
								</tr>

								<table class="table" style="max-width: 400px">
									<thead><tr><td class="bg-dark text-light" colspan="3"><center>Danton</center></td></tr></thead>
									<thead>
										<tr>
											<th class="col-xs-1">No</th>
											<th class="col-xs-1">Nama</th>
											<th class="col-xs-1">Posisi</th>
										</tr>
									</thead>
									<tbody>
										<tr class="" >
											<td><?php echo $i=1?></td>
											<td>
												<input type="text" name="nama_<?php echo $i?>">
											</td>
											<td>Danton
												<select name="posisi_<?php echo $i?>" class="invisible">
													<option value="danton"></option>
												</select>
											</td>
										</tr>
									</tbody>
									<thead><tr><td class="bg-dark text-light" colspan="3"><center>Anggota</center></td></tr></thead>
									<thead>
										<tr>
											<th class="col-xs-1">No</th>
											<th class="col-xs-1">Nama</th>
											<th class="col-xs-1">Posisi</th>
										</tr>
									</thead>
									<tbody>
										

										<?php for ($i=2; $i < 41 ; $i++) { ?>

											<tr>
												<td><?php echo $i?></td>
												<td>
													<input type="text" name="nama_<?php echo $i?>">
												</td>
												<td>
													Anggota
													<select name="posisi_<?php echo $i?>" class="invisible">
														<option value="anggota"></option>
													</select>
												</td>
											</tr>

										<?php }?>
									</tbody>
									<thead><tr><td class="bg-dark text-light" colspan="3"><center>Cadangan</center></td></tr></thead>
									<thead>
										<tr>
											<th class="col-xs-1">No</th>
											<th class="col-xs-1">Nama</th>
											<th class="col-xs-1">Posisi</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($i=41; $i < 46 ; $i++) { ?>

											<tr>
												<td><?php echo $i?></td>
												<td>
													<input type="text" name="nama_<?php echo $i?>">
												</td>
												<td>
													Cadangan
													<select name="posisi_<?php echo $i?>" class="invisible">
														<option value="cadangan"></option>
													</select>
												</td>
											</tr>

										<?php }?>

									</tbody>
								

								<tr>
									<td colspan="3">
										<input type="submit" class="btn btn-md btn-success btn-block" name="daftar" value="Daftar" >
									</td>
								</tr>	 	
							</form>							
						</table>
					</td>
					<td style="vertical-align: top;">
						<table class="table-bordered table  mx-auto" style="float: right;" >
							<thead class="thead-dark">
								<tr><th colspan="5"><center>Putra</center></th></tr>
								<tr>
									<th>No.</th>
									<th>Asal Sekolah</th> 	 
									<th>Nama Tim</th>
									<th>Kecamatan</th>
								</tr>
							</thead>

							<?php $i=1; foreach ($data1 as $key) {?>	
								<tr>	
									<td><?=$i?></td>
									<td><?=$key['asal_sekolah']?></td>
									<td><?=$key['nama_tim']?></td>
									<td><?=$key['kecamatan']?></td>
								</tr>
							<?php $i++; } ?>
						</table>
						
						<table class="table-bordered table mx-auto" style="float: right;" >
							<thead class="thead-dark">
								<tr><th colspan="5"><center>Putri</center></th></tr>
								<tr>
									<th>No.</th>
									<th>Asal Sekolah</th> 	 
									<th>Nama Tim</th>
									<th>Kecamatan</th>
								</tr>
							</thead>

							<?php $i=1; foreach ($data2 as $key) {?>	
								<tr>	
									<td><?=$i?></td>
									<td><?=$key['asal_sekolah']?></td>
									<td><?=$key['nama_tim']?></td>
									<td><?=$key['kecamatan']?></td>
								</tr>
							<?php $i++; } ?>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html> 