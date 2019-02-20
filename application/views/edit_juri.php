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
	
	<table width="100%" >
		<tr>
			<td>
				<form method="POST" action="<?php echo site_url('juri/mendaftar') ?>" style="margin-top: 7rem">
					<center><h3>Pendaftaran Juri</h3></center>
					<center><p class="text-danger">
						<?php
						if ($this->session->userdata('pesan') != '') {
							echo $this->session->userdata('pesan');
							$sess = array(
								'pesan' => '',
							);
							$this->session->set_userdata($sess);
						} 
						?>	
					</p></center>
					<div style="padding-top: 10px" class="col-sm-9 col-md-7 col-lg-5 mx-auto"> 
						<div class="form-group row">
							<label for="NamaWasit" class="col-md-3">Nama Juri</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="NamaWasit" placeholder="Masukan Nama">
							</div>
						</div>

						<div class="form-group row">
							<label for="username"class="col-md-3">Username</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="username" placeholder="Username">

							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-3">Password</label>
							<div class="col-md-7">
								<input type="password" class="form-control" name="password1" placeholder="password">    
								<input style="margin-top: 18px" type="password" class="form-control" name="password2" placeholder="Ulangi password">
							</div>  
						</div>

						<div style="margin-top: 20px" class="form-group row">
							<label for="kategori" class="col-md-3">Kategori</label>
							<div class="col-md-7">	
								<SELECT name="kategori">
									<option value="0">Pilih</option>
									<option value='kekompakan'>Kekompakan</option>";
									<option value='kerapian'>Kerapian</option>";
									<option value='teknik'>Teknik</option>";
									<option value='kostum'>Kostum</option>";
									<option value='danton'>Danton</option>";
									<option value='garis'>Garis</option>";		
								</SELECT>
							</div>
						</div>

						<div style="margin-top: 20px" class="form-group row">
							<label for="pos" class="col-md-3">Pos</label>
							<div class="col-md-7">	
								<SELECT name="pos">
									<option value="0">Pilih</option>
									<?php 
									for($i=1;$i<=4;$i++){
										echo "<option value=$i>$i</option>";
									}
									?>		
								</SELECT>
							</div>
						</div>


						<div style="text-align: center;">
							<input style="padding: 5px 20px 5px 20px;" type="submit" class="btn btn-primary " value="Daftar">
						</div>
					</div>
				</form>
			</td>
			<td>
				
			</td>
		</tr>
	</table>
	<div class="card border-secondary mx-auto" style="margin: 75px; max-width: 800px; min-width: 600px">
		<div class="card-header"><center><h1>Hapus Akun Juri</h1></center></div>
		<div class="card-body">
			
			<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr>
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Nama Juri</th>
						<th  class="align-middle" >Kategori</th>
						<th  class="align-middle" >Posisi Pos</th>
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				
				<?php $i=1; foreach ($data as $key){ ?>
					
					<tr>		
						<td><?=$i?></td>
						<td><?=$key['nama_juri']?></td>
						<td><?=$key['kategori']?></td>
						<td><?=$key['posisi_pos']?></td>
						<td class="align-middle">
							<div>
								<a type="submit" href="<?php echo site_url('admin/hapus_juri/'.$key['id_juri']) ?>" name="hapus" class="btn btn-dark" style="width: 80px;">Hapus		
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
