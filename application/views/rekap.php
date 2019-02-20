<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Penilaian Rekap Data </title>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark " style="background-color: #17a158;"> 
		<a class="navbar-brand" href="<?php echo site_url('output/') ?>"> 
			<img class="td-retina-data" data-retina="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" src="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" alt="" width="127" height="42"> 
		</a> 
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> 
			<span class="navbar-toggler-icon"></span> 
		</button> 

		<div class="collapse navbar-collapse" id="navbarsExampleDefault"> 
			<ul class="navbar-nav mr-auto"> 
				<li class="nav-item "> 
					<a class="nav-link" href="<?php echo site_url('output/pos1/smp') ?>">POS 1<span class="sr-only"></span></a> 
				</li> 
				<li class="nav-item "> 
					<a class="nav-link" href="<?php echo site_url('output/pos2/smp') ?>">POS 2<span class="sr-only"></span></a> 
				</li> 
				<li class="nav-item "> 
					<a class="nav-link" href="<?php echo site_url('output/pos3/smp') ?>">POS 3<span class="sr-only"></span></a> 
				</li> 
				<li class="nav-item "> 
					<a class="nav-link" href="<?php echo site_url('output/pos4/smp') ?>">POS 4<span class="sr-only"></span></a> 
				</li> 
				<li class="nav-item "> 
					<a class="nav-link active" href="<?php echo site_url('output/overal/smp') ?>">REKAP<span class="sr-only"></span></a> 
				</li> 
			</ul> 
		</div> 
	</nav>

	<div style="margin-top: 2rem">
		<table>
			<tr>
				<td>
					<div style="margin: 20px 0 20px 5rem">
						TINGKAT :
						<button class="button btn-success" onclick="location.href='<?php echo site_url('output/overal/sd') ?>'">SD</button>
						<button class="button btn-success" onclick="location.href='<?php echo site_url('output/overal/smp') ?>'">SMP</button>
						<button class="button btn-success" onclick="location.href='<?php echo site_url('output/overal/sma') ?>'">SMA</button>
					</div>
				</td>
				<td>
					<div style="margin: 20px 0 20px 5rem">
						Download Excel :
						<button class="button btn-success" onclick="location.href='<?php echo site_url('output/download_rekap/sd') ?>'">SD</button>
						<button class="button btn-success" onclick="location.href='<?php echo site_url('output/download_rekap/smp') ?>'">SMP</button>
						<button class="button btn-success" onclick="location.href='<?php echo site_url('output/download_rekap/sma') ?>'">SMA</button>
					</div>
				</td>
			</tr>
		</table>
		<div class="card border-secondary col-sm-10 col-md-8 col-lg-6 mx-auto" style="min-width: 70rem">
			<div class="card-header" align="center" >REKAP NILAI</div>
			<div class="card-body">
				<table class="table table-lg">
					<tr>Putra</tr>
					<tr>
						<td>
							<table class="table-sm table" style="font-size: 12px; margin-top: 20px">
								<thead class="bg-dark text-light">
									<tr>	
										<th rowspan="2" class="align-middle" >No</th>
										<th rowspan="2" class="align-middle" style="text-align: center;">Asal Sekolah</th>
										<th rowspan="2" class="align-middle" style="text-align: center;">Nama Tim</th>
										<th rowspan="1" class="align-middle" colspan="5" style="text-align: center;">Nilai Total</th>
									</tr>	
									<tr>
										<th rowspan="1" class="align-middle" >Pos 1</th>
										<th rowspan="1" class="align-middle" >Pos 2</th>	
										<th rowspan="1" class="align-middle" >Pos 3</th>
										<th rowspan="1" class="align-middle" >Pos 4</th>
										<th rowspan="1" class="align-middle" >Total</th>
									</tr>

								</thead>
								<?php 
								$i=1;
								foreach ($data1 as $key){ ?>
									<tr>

										<th colspan="1"><?=$i?></th>
										<th colspan="1"><?=$key['asal_sekolah']?></th>
										<th colspan="1"><?=$key['nama_tim']?></th>
										<th colspan="1"><?=$key['total_pos1']?></th>
										<th colspan="1"><?=$key['total_pos2']?></th>
										<th colspan="1"><?=$key['total_pos3']?></th>
										<th colspan="1"><?=$key['total_pos4']?></th>

										<th colspan="1"><?=$key['total_seluruh']?></th>
									</tr>
									<?php $i++; }?>

								</div>
							</div>
						</table>
					</td>
					<td>

						<table class="table-bordered table table-sm" style=" font-size: 12px; margin-top: 20px; margin-left:  10px; margin-right: 10px;">
							<thead class="bg-dark text-light">
								<tr>	
									<th rowspan="2" class="align-middle" >No</th>
									<th rowspan="2" class="align-middle" style="text-align: center;">Sekolah</th>
									<th rowspan="2" class="align-middle" style="text-align: center;">Nama Tim</th>
									<th class="align-middle" style="text-align: center;">Nilai </th>
								</tr>	
								<tr>
									<th rowspan="1" class="align-middle" >Kostum</th>
								</tr>
							</thead>
							<?php 
							$i=1;
							foreach ($kostum1 as $key){ ?>
								<tr>
									<th colspan="1"><?=$i?></th>
									<th colspan="1"><?=$key['asal_sekolah']?></th>
									<th colspan="1"><?=$key['nama_tim']?></th>
									<th colspan="1"><?=$key['total_kostum']?></th>
								</tr>
								<?php $i++; }?>

							</div>
						</div>
					</table>
				</td>
				<td>
					<table class=" table-bordered table table-sm" style="font-size: 12px; margin-top: 20px" >
						<thead class="bg-dark text-light">
							<tr>	
								<th rowspan="2" class="align-middle" >No</th>
								<th rowspan="2" class="align-middle" style="text-align: center;">Sekolah</th>
								<th rowspan="2" class="align-middle" style="text-align: center;">Nama Tim</th>
								<th colspan="5" class="align-middle" style="text-align: center;">Nilai Danton</th>
							</tr>	
							<tr>
								<th rowspan="1" class="align-middle" >Pos 1</th>
								<th rowspan="1" class="align-middle" >Pos 2</th>
								<th rowspan="1" class="align-middle" >Pos 3</th>
								<th rowspan="1" class="align-middle" >Pos 4</th>
								<th rowspan="1" class="align-middle" >Total</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($danton1 as $key){ ?>
							<tr>
								<th colspan="1"><?=$i?></th>
								<th colspan="1"><?=$key['asal_sekolah']?></th>
								<th colspan="1"><?=$key['nama_tim']?></th>
								<th colspan="1"><?=$key['danton_pos1']?></th>
								<th colspan="1"><?=$key['danton_pos2']?></th>
								<th colspan="1"><?=$key['danton_pos3']?></th>
								<th colspan="1"><?=$key['danton_pos4']?></th>
								<th colspan="1"><?=$key['total_danton']?></th>
							</tr>
							<?php $i++; }?>

						</div>
					</div>
				</table>
			</td>
		</tr>
	</table>
	<table class="table table-lg">
					<tr>Putri</tr>
					<tr>
						<td>
							<table class="table-sm table" style="font-size: 12px; margin-top: 20px">
								<thead class="bg-dark text-light">
									<tr>	
										<th rowspan="2" class="align-middle" >No</th>
										<th rowspan="2" class="align-middle" style="text-align: center;">Asal Sekolah</th>
										<th rowspan="2" class="align-middle" style="text-align: center;">Nama Tim</th>
										<th rowspan="1" class="align-middle" colspan="5" style="text-align: center;">Nilai Total</th>
									</tr>	
									<tr>
										<th rowspan="1" class="align-middle" >Pos 1</th>
										<th rowspan="1" class="align-middle" >Pos 2</th>	
										<th rowspan="1" class="align-middle" >Pos 3</th>
										<th rowspan="1" class="align-middle" >Pos 4</th>
										<th rowspan="1" class="align-middle" >Total</th>
									</tr>

								</thead>
								<?php 
								$i=1;
								foreach ($data2 as $key){ ?>
									<tr>

										<th colspan="1"><?=$i?></th>
										<th colspan="1"><?=$key['asal_sekolah']?></th>
										<th colspan="1"><?=$key['nama_tim']?></th>
										<th colspan="1"><?=$key['total_pos1']?></th>
										<th colspan="1"><?=$key['total_pos2']?></th>
										<th colspan="1"><?=$key['total_pos3']?></th>
										<th colspan="1"><?=$key['total_pos4']?></th>

										<th colspan="1"><?=$key['total_seluruh']?></th>
									</tr>
									<?php $i++; }?>

								</div>
							</div>
						</table>
					</td>
					<td>

						<table class="table-bordered table table-sm" style=" font-size: 12px; margin-top: 20px; margin-left:  10px; margin-right: 10px;">
							<thead class="bg-dark text-light">
								<tr>	
									<th rowspan="2" class="align-middle" >No</th>
									<th rowspan="2" class="align-middle" style="text-align: center;">Sekolah</th>
									<th rowspan="2" class="align-middle" style="text-align: center;">Nama Tim</th>
									<th class="align-middle" style="text-align: center;">Nilai </th>
								</tr>	
								<tr>
									<th rowspan="1" class="align-middle" >Kostum</th>
								</tr>
							</thead>
							<?php 
							$i=1;
							foreach ($kostum2 as $key){ ?>
								<tr>
									<th colspan="1"><?=$i?></th>
									<th colspan="1"><?=$key['asal_sekolah']?></th>
									<th colspan="1"><?=$key['nama_tim']?></th>
									<th colspan="1"><?=$key['total_kostum']?></th>
								</tr>
								<?php $i++; }?>

							</div>
						</div>
					</table>
				</td>
				<td>
					<table class=" table-bordered table table-sm" style="font-size: 12px; margin-top: 20px" >
						<thead class="bg-dark text-light">
							<tr>	
								<th rowspan="2" class="align-middle" >No</th>
								<th rowspan="2" class="align-middle" style="text-align: center;">Sekolah</th>
								<th rowspan="2" class="align-middle" style="text-align: center;">Nama Tim</th>
								<th colspan="5" class="align-middle" style="text-align: center;">Nilai Danton</th>
							</tr>	
							<tr>
								<th rowspan="1" class="align-middle" >Pos 1</th>
								<th rowspan="1" class="align-middle" >Pos 2</th>
								<th rowspan="1" class="align-middle" >Pos 3</th>
								<th rowspan="1" class="align-middle" >Pos 4</th>
								<th rowspan="1" class="align-middle" >Total</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($danton2 as $key){ ?>
							<tr>
								<th colspan="1"><?=$i?></th>
								<th colspan="1"><?=$key['asal_sekolah']?></th>
								<th colspan="1"><?=$key['nama_tim']?></th>
								<th colspan="1"><?=$key['danton_pos1']?></th>
								<th colspan="1"><?=$key['danton_pos2']?></th>
								<th colspan="1"><?=$key['danton_pos3']?></th>
								<th colspan="1"><?=$key['danton_pos4']?></th>
								<th colspan="1"><?=$key['total_danton']?></th>
							</tr>
							<?php $i++; }?>

						</div>
					</div>
				</table>
			</td>
		</tr>
	</table>
	</div>
</body>

</html>
