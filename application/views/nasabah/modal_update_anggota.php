<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.row{
			margin-bottom:10px;
			text-align:center;
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

<?php echo form_open_multipart('nasabah/do_upload');?>
<div class="box box-body">
	<div class="container" >
		<div class="row">
			<div class="col-sm-12">
				<h1>Update Anggota</h1>
				<hr width="20%" align="left">
				<p>Isilah seluruh kolom registrasi dengan <br />sebenar-benarnya.</p>
			</div>
		</div>
		
		<div class="row" align="center">
			<div class="col-sm-2">
				Nasabah ID
			</div>
			<div class="col-sm-9">
				<input type="hidden" name="nasabah_id" class="full-width" id="nasabah_id" 
				value="<?php echo $getNasabah->nasabah_id; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Lengkap
			</div>
			<div class="col-sm-9">
				<input type="text" name="nama_nasabah" class="full-width" id="nama_nasabah"
				value="<?php echo $getNasabah->nama_nasabah; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Alamat
			</div>
			<div class="col-sm-9">
				<textarea name="alamat" id="ALAMAT" class="full-width"
				value="<?php echo $getNasabah->alamat; ?>"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nomor Telfon
			</div>
			<div class="col-sm-2">
				<input type="text" name="telfon" id="telfon" value="<?php echo $getNasabah->telfon; ?>">
			</div>
				
			<div class="col-sm-2">
				Jenis Kelamin
			</div>
			<div class="col-sm-2">
				<select name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $getNasabah->jenis_kelamin;?>">
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
				value="<?php echo $getNasabah->tempatlahir; ?>">
			</div>
			
			<div class="col-sm-2">
				Tanggal Lahir
			</div>
			<div class="col-sm-2">
				<input type="date" name="tanggallahir" id="tgllahir" value="<?php echo $getNasabah->tanggallahir; ?>">
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
				<select name="jenis_id" id="jenis_id" value="<?php echo $getNasabah->jenis_id;?>">
					<option value='1'>SIM</option>
					<option value='2'>KTP</option>
					<option value='3'>KTM</option>
					<option value='4'>NRP</option>
					<option value='5'>NIP</option>
					<option value='6'>DOMISILI</option>
					<option value='7'>PASSPORT</option>
					<option value='8'>LAINNYA</option>
					<option value='9'>BPJS</option>
				</select>
			</div>
			<div class="col-sm-3">
				<input type="text" name="NO_ID" id="NO_ID" value="<?php echo $getNasabah->NO_ID;?>">
			</div>
			<div class="col-sm-3">
				<input type="text" name="keterangan" id="keterangan" value="<?php echo $getNasabah->keterangan;?>">
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
				<input type="text" name="kode_group1" id="kode_group1" value="<?php echo $getNasabah->kode_group1;?>">
			</div>
			<div class="col-sm-3">
				<input type="text" name="kode_group2" id="kode_group2" value="<?php echo $getNasabah->kode_group2;?>">
			</div>
			<div class="col-sm-3">
				<input type="text" name="kode_group3" id="kode_group3" value="<?php echo $getNasabah->kode_group3;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Agama
			</div>
			<div class="col-sm-9">
				<select name="kode_agama" id="kode_agama" class="full-width" value="<?php echo $getNasabah->kode_agama;?>">
					<option>-- Pilih --</option>
					<option value='Islam'>Islam</option>
					<option value='Katholik'>Katholik</option>
					<option value='Kong Hu Chu'>Kong Hu Chu</option>
					<option value='Hindu'>Hindu</option>
					<option value='Budha'>Budha</option>
					<option value='Protestan'>Protestan</option>
					<option value='Lain2 Kepercayaan'>Lain2 Kepercayaan</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Desa
			</div>
			<div class="col-sm-2">
				<input type="text" name="desa" id="desa" value="<?php echo $getNasabah->desa;?>">
			</div>
			
			<div class="col-sm-2">
				Kecamatan
			</div>
			<div class="col-sm-2">
				<input type="text" name="kecamatan" id="kecamatan" value="<?php echo $getNasabah->kecamatan;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Kota/Kab
			</div>
			<div class="col-sm-2">
				<input type="text" name="kota_kab" id="kota_kab" value="<?php echo $getNasabah->kota_kab;?>">
			</div>
			
			<div class="col-sm-2">
				Provinsi
			</div>
			<div class="col-sm-2">
				<input type="text" name="propinsi" id="propinsi" value="<?php echo $getNasabah->propinsi;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Waris
			</div>
			<div class="col-sm-9">
				<input type="text" name="waris_nama" id="waris_nama" class="full-width"
				value="<?php echo $getNasabah->waris_nama;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Alamat Waris
			</div>
			<div class="col-sm-9">
				<textarea name="waris_alamat" id="waris_alamat" class="full-width" 
				value="<?php echo $getNasabah->waris_alamat;?>"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nomer Telfon Waris
			</div>
			<div class="col-sm-2">
				<input type="text" name="waris_telp" id="waris_telp" value="<?php echo $getNasabah->waris_telp;?>">
			</div>
			
			<div class="col-sm-2">
				Verifikasi
			</div>
			<div class="col-sm-2">
				<input type="text" name="verifikasi" id="verifikasi" value="<?php echo $getNasabah->verifikasi;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				HP
			</div>
			<div class="col-sm-2">
				<input type="text" name="HP" id="HP" value="<?php echo $getNasabah->HP;?>">
			</div>
			<div class="col-sm-2">
				Tanggal Registrasi
			</div>
			<div class="col-sm-2">
				<input type="date" name="tgl_registrasi" id="tgl_registrasi" value="<?php echo $getNasabah->tgl_registrasi;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Ibu Kandung
			</div>
			<div class="col-sm-2">
				<input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" value="<?php echo $getNasabah->nama_ibu_kandung;?>">
			</div>
			
			<div class="col-sm-2">
				Kode Pos
			</div>
			<div class="col-sm-2">
				<input type="text" name="kode_pos" id="kode_pos" value="<?php echo $getNasabah->kode_pos;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Kode Kantor
			</div>
			<div class="col-sm-2">
				<input type="text" name="kode_kantor" id="kode_kantor" value="<?php echo $getNasabah->kode_kantor;?>">
			</div>
			
			<div class="col-sm-2">
				Masa Berlaku KTP
			</div>
			<div class="col-sm-2">
				<input type="date" name="masa_berlaku_ktp" id="masa_berlaku_ktp" value="<?php echo $getNasabah->masa_berlaku_ktp;?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3">
				Anggota Alternatif
			</div>
			<div class="col-sm-3">
				Lokasi Usaha
			</div>
			<div class="col-sm-3">
				Status Nikah
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 ">
				<input type="text" name="nasabah_alternatif" id="nasabah_alternatif" value="<?php echo $getNasabah->nasabah_alternatif;?>">
			</div>
			<div class="col-sm-3">
				<input type="text" name="lokasi_usaha" id="lokasi_usaha" value="<?php echo $getNasabah->lokasi_usaha;?>">
			</div>
			<div class="col-sm-3">
				<select name='status_nikah' value="<?php echo $getNasabah->status_nikah;?>">
					<option value='00'>Lajang</option>
					<option value='01'>Kawin</option>
					<option value='02'>Belum Kawin</option>
					<option value='04'>Janda</option>
				</select>
			</div>
		</div>
		
			<tr>
				<td colspan="2"><input type="submit" value="Simpan"></td>
			</tr>
	</div>
	</div>
</body>
</html>

