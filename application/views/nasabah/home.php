<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<div class="row">
   
    <div class="panel panel-flat">
        <div class="panel-heading">
           <h5 class="panel-title">HALAMAN NASABAH</h5>
        </div>
			
		<div class="panel-body">
			<div class="col-md-2">
				<a href="<?php echo base_url('Nasabah/tambah'); ?>">
				<button class="form-control btn btn-success">
				<i class="glyphicon glyphicon-plus-sign"></i> Tambah Nasabah</button>
				</a>
			</div>
					
			<div class="col-md-2">
				<button class="form-control btn btn-success" data-toggle="modal" data-target="#import-nasabah">
				<i class="glyphicon glyphicon-plus-sign"></i> Nasabah Kolektif</button>
			</div>
	
					<br/>
					<br/>
					<br/>
					
			<div class="form-inline">
				<form method="post" action="<?php echo base_url("nasabah/filter")?>">
					<div class="form-group">
					<select name="majelis" id="majelis" class="form-control">
						<option selected="selected" disabled="disabled">Pilih Majelis</option>
						<?php
							foreach ($majelis as $row)
							{
								echo "<option value='".$row->DESKRIPSI_GROUP1."'>".$row->DESKRIPSI_GROUP1."</option>";
							}
						?>
					</select>
					</div>
					
					<div class="form-group">
					<select name="petugas" id="petugas" class="form-control">
						<option selected="selected" disabled="disabled">Pilih Petugas</option>
						<?php
							foreach ($petugas as $row)
							{
								 echo "<option value='".$row->DESKRIPSI_GROUP2."'>".$row->DESKRIPSI_GROUP2."</option>";
							}
						?>
					</select>
					</div>
					
					<div class="form-group">
					<select name="sektor_usaha" id="sektor_usaha" class="form-control">
						<option selected="selected" disabled="disabled">Pilih Sektor Usaha</option>
						<?php
							foreach ($sektor_usaha as $row)
							{
								 echo "<option value='".$row->DESKRIPSI_GROUP3."'>".$row->DESKRIPSI_GROUP3."</option>";
							}
						?>
					</select>
					</div>
					
					<div class="form-group">
					<select name="kantor" id="kantor" class="form-control">
						<option selected="selected" disabled="disabled">Pilih kantor</option>
						<?php
							foreach ($kantor as $row)
							{
								 echo "<option value='".$row->nama_kantor."'>".$row->nama_kantor."</option>";
							}
						?>
					</select>
					</div>
						
					<div class="form-group">
						<button class="btn bg-teal" type="submit" id="search"> Cari</button>
						<button type="button" class="btn btn-danger legitRipple" id="btnClear">Clear</button>
					</div>
				</form>	
			</div>
					
		</div>
	</div>
</div>

<table id="list-data" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Nasabah ID</th>
			<th>Nama Nasabah</th>
			<th>Majelis</th>
			<th>Petugas</th>
			<th>Sektor Usaha</th>
			<th>Kantor</th>
			<th style="text-align: center;">Aksi</th>
		</tr>
	</thead>
		<tbody id="data-nasabah">
			<?php if ($dataNasabah !== "") {?>
				<?php foreach ($dataNasabah as $nasabah){ ?>
					<tr>
					  <td style="min-width:100px;"><?php echo $nasabah->nasabah_id; ?></td>
					  <td ><?php echo $nasabah->nama_nasabah; ?></td>
					  <td><?php echo $nasabah->kode_group1; ?></td>
					  <td><?php echo $nasabah->kode_group2; ?></td>
					  <td><?php echo $nasabah->kode_group3; ?></td>
					  <td><?php echo $nasabah->kode_kantor; ?></td>
					  <td class="text-center" style="min-width:180px;">
						<a href="<?php echo base_url('Nasabah/update'); ?>">
							<button class="btn btn-warning update-dataNasabah" data-id="<?php echo $nasabah->nasabah_id; ?>">
							<i class="glyphicon glyphicon-repeat"></i> Update
							</button>
						</a>
						<a href="<?php echo base_url('Nasabah/deleteAnggota'); ?>">
							<button class="btn btn-danger konfirmasiHapus-nasabah" data-id="<?php echo $nasabah->nasabah_id; ?>">
							<i class="glyphicon glyphicon-remove-sign"></i> Delete
							</button>
						</a>
					  </td>
					</tr>
					
				<?php } ?>
				<?php } else { ?>
					<tr>
						<td class="text-center text-uppercase" colspan="7">tidak ada</td>
					</tr>
				<?php } ?>
		</tbody>
	</table>
	
	<script>
		$('#majelis').select2();
		$('#petugas').select2();
		$('#sektor_usaha').select2();
		$('#kantor').select2();
		
	</script>
   
