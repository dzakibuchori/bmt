<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.row{
			margin-bottom:10px;
		}
		input{
			width:180px;
		}
		select{
			width:180px;
		}
		.full-width{
			width:572px;
		}
		.col-md-2{
			border:1px solid black;
		}
		.center-table{
			margin-left:20px;
		}
	</style>
</head>
<body>

<div class="box box-body">
	<div class="container" >
		<div class="row">
			<div class="col-sm-12">
				<h1>Registrasi Anggota</h1>
				<hr width="20%" align="left">
				<p>Isilah seluruh kolom registrasi dengan <br />sebenar-benarnya.</p>
			</div>
		</div>
		
	<form action="edit" method="POST" action="<?php echo base_url('nasabah/updateAnggota');?>">
		<div class="row">
			<div class="col-sm-2">
				Nasabah ID
			</div>
			<div class="col-sm-9">
				<input type="text" name="nasabah_id" class="full-width" id="nasabah_id"
				value="<?php echo $result['nasabah_id']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Lengkap
			</div>
			<div class="col-sm-9">
				<input type="text" name="nama_nasabah" class="full-width" id="nama_nasabah"
				value="<?php echo $result['nama_nasabah']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Alamat
			</div>
			<div class="col-sm-9">
				<textarea name="alamat" id="ALAMAT" class="full-width"
				value="<?php echo $result['alamat']; ?>"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nomor Telfon
			</div>
			<div class="col-sm-2">
				<input type="text" name="telpon" id="telpon"
				value="<?php echo $result['telpon']; ?>">
			</div>
				
			<div class="col-sm-2">
				Jenis Kelamin
			</div>
			<div class="col-sm-2">
				<select name="jenis_kelamin" id="jenis_kelamin" 
				value="<?php echo $result['jenis_kelamin']; ?>">
					<option value='L'>Laki-laki</option>
					<option value='P'>Perempuan</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Tempat Lahir
			</div>
			<div class="col-sm-2">
				<input type="text" name="tempatlahir" id="tempatlahir"
				value="<?php echo $result['tempatlahir']; ?>">
			</div>
			
			<div class="col-sm-2">
				Tanggal Lahir
			</div>
			<div class="col-sm-2">
				<input type="date" name="tanggallahir" id="tgllahir"
				value="<?php echo $result['tanggallahir']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3">
				Jenis ID
			</div>
			<div class="col-sm-3">
				No ID
			</div>
			<div class="col-sm-3">
				Keterangan
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<select name="jenis_id" id="jenis_id" class="form-control"
				value="<?php echo $result['jenis_id']; ?>">
					<option selected="selected" disabled="disabled">Pilih Jenis ID</option>
					<?php
						foreach ($jenisID as $row)
							{
								 echo "<option value='".$row->jenis_id."'>".$row->nama_identitas."</option>";
							}
							?>
				</select>
			</div>
			<div class="col-sm-3">
				<input type="text" name="NO_ID" id="NO_ID"
				value="<?php echo $result['NO_ID']; ?>">
			</div>
			<div class="col-sm-3">
				<input type="text" name="keterangan" id="keterangan"
				value="<?php echo $result['keterangan']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3">
				Majelis
			</div>
			<div class="col-sm-3">
				Petugas
			</div>
			<div class="col-sm-3">
				Sektor Usaha
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 ">
			<select name="kode_group1" id="kode_group1" value="<?php echo $result['kode_group1']; ?>">
				<option selected="selected" disabled="disabled">Pilih Majelis</option>
					<?php
						foreach ($majelis as $row)
							{
								 echo "<option value='".$row->kode_group1."'>".$row->DESKRIPSI_GROUP1."</option>";
							}
					?>
			</select>
			</div>
			<div class="col-sm-3">
				<select name="kode_group2" id="kode_group2" value="<?php echo $result['kode_group2']; ?>">
					<option selected="selected" disabled="disabled">Pilih Petugas</option>
					<?php
						foreach ($petugas as $row)
						{
							echo "<option value='".$row->kode_group2."'>".$row->DESKRIPSI_GROUP2."</option>";
						}
					?>
			</select>
			</div>
			<div class="col-sm-3">
				<select name="kode_group3" id="kode_group3" value="<?php echo $result['kode_group3']; ?>">
					<option selected="selected" disabled="disabled">Pilih Sektor Usaha</option>
						<?php
							foreach ($sektor_usaha as $row)
							{
								echo "<option value='".$row->kode_group3."'>".$row->DESKRIPSI_GROUP3."</option>";
							}
						?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3">
				Status Nikah
			</div>
			<div class="col-sm-3">
				Kantor
			</div>
			<div class="col-sm-3">
				Lokasi Usaha
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 ">
			<select name="status_nikah" id="status_nikah" value="<?php echo $result['status_nikah']; ?>">
				<option selected="selected" disabled="disabled">Pilih Status Nikah</option>
				<?php
					foreach ($status_nikah as $row)
					{
						echo "<option value='".$row->kode_status."'>".$row->deskripsi_status."</option>";
					}
				?>
				</select>
			</div>
			<div class="col-sm-3">
				<select name="kode_kantor" id="kode_kantor" value="<?php echo $result['kode_kantor']; ?>">
					<option selected="selected" disabled="disabled">Pilih Kantor</option>
					<?php
						foreach ($kantor as $row)
						{
							echo "<option value='".$row->kode_kantor."'>".$row->nama_kantor."</option>";
						}
					?>
			</select>
			</div>
			<div class="col-sm-3">
				<select name="lokasi_usaha" id="lokasi_usaha" value="<?php echo $result['lokasi_usaha']; ?>">
					<option selected="selected" disabled="disabled">Pilih Lokasi Usaha</option>
						<?php
							foreach ($lokasi_usaha as $row)
							{
								echo "<option value='".$row->kode_group3."'>".$row->DESKRIPSI_GROUP3."</option>";
							}
						?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Agama
			</div>
			<div class="col-sm-9">
				<select name="kode_agama" id="kode_agama" class="full-width" value="<?php echo $result['kode_agama']; ?>">
				<option selected="selected" disabled="disabled">Pilih Agama</option>
				<?php
					foreach ($agama as $row)
					{
						echo "<option value='".$row->deskripsi."'>".$row->deskripsi."</option>";
					}
				?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Desa
			</div>
			<div class="col-sm-2">
				<select name="desa" id="desa" value="<?php echo $result['desa']; ?>">
				<option selected="selected" disabled="disabled">Pilih Desa</option>
				<?php
					foreach ($desa as $row)
					{
						echo "<option value='".$row->deskripsi_kode_kelurahan."'>".$row->deskripsi_kode_kelurahan."</option>";
					}
				?>
				</select>
			</div>
			
			<div class="col-sm-2">
				Kecamatan
			</div>
			<div class="col-sm-2">
				<select name="kecamatan" id="kecamatan" value="<?php echo $result['kecamatan']; ?>">
				<option selected="selected" disabled="disabled">Pilih kecamatan</option>
				<?php
					foreach ($kecamatan as $row)
					{
						echo "<option value='".$row->deskripsi_kode_kecamatan."'>".$row->deskripsi_kode_kecamatan."</option>";
					}
				?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3">
				Kota/Kab
			</div>
			<div class="col-sm-3">
				Provinsi
			</div>
			<div class="col-sm-3">
				Kode Pos
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 ">
			<select name="kota_kab" id="kota_kab" value="<?php echo $result['kota_kab']; ?>">
				<option selected="selected" disabled="disabled">Pilih Kota/Kab</option>
				<?php
					foreach ($kota_kab as $row)
					{
						echo "<option value='".$row->kode_dati."'>".$row->deskripsi_kode_dati."</option>";
					}
				?>
			</select>
			</div>
			<div class="col-sm-3">
				<select name="propinsi" id="propinsi" value="<?php echo $result['propinsi']; ?>">
				<option selected="selected" disabled="disabled">Pilih Provinsi</option>
				<?php
					foreach ($provinsi as $row)
					{
						echo "<option value='".$row->kode_provinsi."'>".$row->nama_provinsi."</option>";
					}
				?>
				</select>
			</div>
			<div class="col-sm-3">
				<input type="text" name="kodepos" id="kodepos" value="<?php echo $result['kodepos']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Masa Berlaku KTP
			</div>
			
			<div class="col-sm-2">
				<input type="date" name="masa_berlaku_ktp" id="masa_berlaku_ktp" 
				value="<?php echo $result['masa_berlaku_ktp']; ?>">
			</div>
			
			<div class="col-sm-2">
				Nasabah Alternatif
			</div>
	
			<div class="col-sm-2 ">
				<input type="text" name="nasabah_alternatif" id="nasabah_alternatif" 
				value="<?php echo $result['nasabah_alternatif']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Ibu Kandung
			</div>
			<div class="col-sm-2">
				<input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="full-width"
				value="<?php echo $result['nama_ibu_kandung']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Waris
			</div>
			<div class="col-sm-9">
				<input type="text" name="waris_nama" id="waris_nama" class="full-width"
				value="<?php echo $result['waris_nama']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Alamat Waris
			</div>
			<div class="col-sm-9">
				<textarea name="waris_alamat" id="waris_alamat" class="full-width"
				value="<?php echo $result['waris_alamat']; ?>"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nomer Telfon Waris
			</div>
			<div class="col-sm-2">
				<input type="text" name="waris_telp" id="waris_telp"
				value="<?php echo $result['waris_telp']; ?>">
			</div>
			
			<div class="col-sm-2">
				Verifikasi
			</div>
			<div class="col-sm-2">
				<input type="text" name="verifikasi" id="verifikasi"
				value="<?php echo $result['verifikasi']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				HP
			</div>
			<div class="col-sm-2">
				<input type="text" name="HP" id="HP" value="<?php echo $result['HP']; ?>">
			</div>
			<div class="col-sm-2">
				Tanggal Registrasi
			</div>
			<div class="col-sm-2">
				<input type="date" name="tgl_registrasi" id="tgl_registrasi" value="<?php echo $result['tgl_registrasi']; ?>">
			</div>
		</div>
		
		<br>
			
			<div class="row">
				<div class="col-sm-2">
					<a href="<?php echo base_url('Nasabah/'); ?>">
					<button type="submit" class="form-control btn btn-primary">
					<i class="glyphicon glyphicon-ok"></i>Simpan</button>
				</div>
			</div>
	</form>	
	</div>
	</div>
</body>
</html>
