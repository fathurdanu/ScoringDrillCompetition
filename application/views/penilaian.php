<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>Penilaian Rekap Data </title>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #17a158;">  
		<a class="navbar-brand" href="<?php echo site_url('juri/') ?>">
			<img class="td-retina-data" data-retina="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" src="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" alt="" width="127" height="42">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">

			
			<ul class="navbar-nav mr-auto">
				
			</ul>
		</div>
		<div style="text-align: right;">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text-light" href="<?php echo site_url('juri/keluar') ?>">Keluar<span class="sr-only"></span></a>
				</li>
			</ul>


		</div>
	</nav>

	
	<div class="card border-secondary mx-auto" style="margin: 75px; max-width: 800px; min-width: 600px">
		<div class="card-header"><center><h1>Penilaian</h1></center></div>
		<div class="card-body">
			<table class="mx-auto" style="max-width:700px" >
				<tr>
					<td style="width:40%">
						TINGKAT :
						<?php if($this->session->userdata('posisi_pos') == '1'){ ?>
							<button class="btn btn-success" onclick="location.href='<?php echo site_url('penilaian/index/sd') ?>'" type="button">SD</button>
						<?php } ?>
						<button class="btn btn-success" onclick="location.href='<?php echo site_url('penilaian/index/smp') ?>'" type="button">SMP</button>
						<button class="btn btn-success" onclick="location.href='<?php echo site_url('penilaian/index/sma') ?>'" type="button">SMA</button>
					</td>
					<td style="width: 60%" >	
						<table class="mx-auto">
							<tr>
								<td>
									<center>
										<h5 class="card-title" style="text-align: center;">
											<?php echo $this->session->userdata('nama_juri') ?>

											<br>

											Pos : 
											<?php echo $this->session->userdata('posisi_pos') ?>
										</h5>
									</center>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

			<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr><td colspan="5"><center><h4 class="text-success">Putra</h4></center></td></tr>
					<tr>
						<?php $kategori = $this->session->userdata('kategori');?>	
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" style="text-align: center;">Sekolah</th>
						<?php
						if($kategori == 'kekompakan'){
							?>
							<th class="align-middle" >Kekompakan</th>
						<?php }
						elseif($kategori == 'kerapian'){
							?>
							<th class="align-middle" >Kerapian</th>	
						<?php }
						elseif($kategori == 'teknik'){
							?>
							<th class="align-middle" >Teknik</th>
						<?php }
						elseif($kategori == 'kostum'){
							?>
							<th class="align-middle" >Kostum</th>
						<?php }
						elseif($kategori == 'danton'){
							?>
							<th class="align-middle" >Danton</th>
						<?php }
						elseif($kategori == 'garis'){
							?>
							<th class="align-middle" >Garis</th>
							<?php 
						}
						?>
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($data1 as $key){ 

					echo form_open('penilaian/update/'.$key['no_punggung'], 'class="jsform form-horizontal" id="admin_form"', $hidden = array());
					?>
					
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	

						<?php if($kategori == 'kekompakan'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("kekompakan", set_value('kekompakan', $key['kekompakan'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"kekompakan")); 
								?>	
							</td>
						<?php } elseif($kategori == 'kerapian'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("kerapian", set_value('kerapian', $key['kerapian'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"kerapian_")); 
								?>
							</td>
						<?php } elseif($kategori == 'teknik'){?>
							<td class="align-middle">
								<?php 
								echo form_input("teknik", set_value('teknik', $key['teknik']), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"teknik")); 
								?>
							</td>
						<?php } elseif($kategori == 'kostum'){?>
							<td class="align-middle">
								<?php 
								echo form_input("kostum", set_value('kostum', $key['kostum'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"kostum")); 
								?>
							</td>

						<?php } elseif($kategori == 'danton'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("danton", set_value('danton', $key['danton'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"danton")); 
								?>
							</td>
					
						<?php } elseif($kategori == 'garis'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("garis", set_value('garis', $key['garis'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"garis")); 
								?>
							</td>
						<?php }?>
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<input type="submit" name="update" value="Update" class="btn btn-dark" id="update" style="width: 80px;">
							</div>
						</td>

						<input class="invisible" name="a" value="<?php echo $key['no_punggung']; ?>" >
						<input class="invisible" name="tingkat" value="<?php echo $key['tingkat']; ?>" >
						<?php echo form_close(); ?>
					</tr>
					<?php $i++; } ?>
				</div>
			</div>
		</table>
		<table class="table table-sm table-border mx-auto" style="margin-top: 20px, max-width: 700px">
				<thead class="thead-dark">
					<tr><td colspan="5"><center><h4 class="text-success">Putri</h4></center></td></tr>
					<tr>
						<?php $kategori = $this->session->userdata('kategori');?>	
						<th  class="align-middle" >No</th>
						<th  class="align-middle" >Nama Tim</th>
						<th  class="align-middle" style="text-align: center;">Sekolah</th>
						<?php
						if($kategori == 'kekompakan'){
							?>
							<th class="align-middle" >Kekompakan</th>
						<?php }
						elseif($kategori == 'kerapian'){
							?>
							<th class="align-middle" >Kerapian</th>	
						<?php }
						elseif($kategori == 'teknik'){
							?>
							<th class="align-middle" >Teknik</th>
						<?php }
						elseif($kategori == 'kostum'){
							?>
							<th class="align-middle" >Kostum</th>
						<?php }
						elseif($kategori == 'danton'){
							?>
							<th class="align-middle" >Danton</th>
						<?php }
						elseif($kategori == 'garis'){
							?>
							<th class="align-middle" >Garis</th>
							<?php 
						}
						?>
						<th class="align-middle text-warning" style="text-align: center">Tombol</th>
					</tr>
				</thead>
				<?php $i=1; foreach ($data2 as $key){ 

					echo form_open('penilaian/update/'.$key['no_punggung'], 'class="jsform form-horizontal" id="admin_form"', $hidden = array());
					?>
					<tr>		
						<td class="align-middle"><?php echo $i; ?></td>
						<td class="align-middle"><?php echo $key['asal_sekolah']; ?></td>
						<td class="align-middle"><?php echo $key['nama_tim']; ?></td> 	

						<?php if($kategori == 'kekompakan'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("kekompakan", set_value('kekompakan', $key['kekompakan'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"kekompakan")); 
								?>	
							</td>
						<?php } elseif($kategori == 'kerapian'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("kerapian", set_value('kerapian', $key['kerapian'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"kerapian_")); 
								?>
							</td>
						<?php } elseif($kategori == 'teknik'){?>
							<td class="align-middle">
								<?php 
								echo form_input("teknik", set_value('teknik', $key['teknik']), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"teknik")); 
								?>
							</td>
						<?php } elseif($kategori == 'kostum'){?>
							<td class="align-middle">
								<?php 
								echo form_input("kostum", set_value('kostum', $key['kostum'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"kostum")); 
								?>
							</td>

						<?php } elseif($kategori == 'danton'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("danton", set_value('danton', $key['danton'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"danton")); 
								?>
							</td>
					
						<?php } elseif($kategori == 'garis'){ ?>
							<td class="align-middle">
								<?php 
								echo form_input("garis", set_value('garis', $key['garis'] ), $attributes= array("class" =>"form-control input-lg", "style"=>"width: 60px", "id"=>"garis")); 
								?>
							</td>
						<?php }?>
						<td class="align-middle">
							<div id="button_<?php echo $key['no_punggung']; ?>">
								<input type="submit" name="update" value="Update" class="btn btn-dark" id="update" style="width: 80px;">
							</div>
						</td>

						<input class="invisible" name="a" value="<?php echo $key['no_punggung']; ?>" >
						<input class="invisible" name="tingkat" value="<?php echo $key['tingkat']; ?>" >
						<?php echo form_close(); ?>
					</tr>
					<?php $i++; } ?>
				</div>
			</div>
		</table>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>

		<script type="text/javascript">
			
		</script>

	</body>
	</html>
