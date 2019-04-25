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
		
		<div class="row">
			<div class="col-sm-2">
				Nasabah ID
			</div>
			<div class="col-sm-9">
				<input type="text" name="nasabah_id" class="full-width" id="nasabah_id">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Lengkap
			</div>
			<div class="col-sm-9">
				<input type="text" name="nama_nasabah" class="full-width" id="nama_nasabah">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Alamat
			</div>
			<div class="col-sm-9">
				<textarea name="alamat" id="ALAMAT" class="full-width"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nomor Telfon
			</div>
			<div class="col-sm-2">
				<input type="text" name="telfon" id="telfon" placeholder="Masukan nama anda">
			</div>
				
			<div class="col-sm-2">
				Jenis Kelamin
			</div>
			<div class="col-sm-2">
				<select name="jenis_kelamin" id="jenis_kelamin">
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
				<input type="text" name="tempatlahir" id="tempatlahir">
			</div>
			
			<div class="col-sm-2">
				Tanggal Lahir
			</div>
			<div class="col-sm-2">
				<input type="date" name="tanggallahir" id="tgllahir">
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
				<select name="jenis_kelamin" id="jenis_kelamin">
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
				<input type="text" name="NO_ID" id="NO_ID">
			</div>
			<div class="col-sm-3">
				<input type="text" name="keterangan" id="keterangan">
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
				<input type="text" name="kode_group1" id="kode_group1">
			</div>
			<div class="col-sm-3">
				<input type="text" name="kode_group2" id="kode_group2">
			</div>
			<div class="col-sm-3">
				<input type="text" name="kode_group3" id="kode_group3">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Agama
			</div>
			<div class="col-sm-9">
				<select name="kode_agama" id="kode_agama" class="full-width">
					<option>-- Pilih --</option>
			<?php
            foreach ($kode_agama as $agama) {
              
             echo'<option value="'.$agama->DESKRIPSI.'">
			 '.$agama->DESKRIPSI.'
			  </option>';
              
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
				<input type="text" name="desa" id="desa">
			</div>
			
			<div class="col-sm-2">
				Kecamatan
			</div>
			<div class="col-sm-2">
				<input type="text" name="kecamatan" id="kecamatan">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Kota/Kab
			</div>
			<div class="col-sm-2">
				<input type="text" name="kota_kab" id="kota_kab">
			</div>
			
			<div class="col-sm-2">
				Provinsi
			</div>
			<div class="col-sm-2">
				<input type="text" name="propinsi" id="propinsi">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Waris
			</div>
			<div class="col-sm-9">
				<input type="text" name="waris_nama" id="waris_nama" class="full-width">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Alamat Waris
			</div>
			<div class="col-sm-9">
				<textarea name="waris_alamat" id="waris_alamat" class="full-width"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nomer Telfon Waris
			</div>
			<div class="col-sm-2">
				<input type="text" name="waris_telp" id="waris_telp">
			</div>
			
			<div class="col-sm-2">
				Verifikasi
			</div>
			<div class="col-sm-2">
				<input type="text" name="verifikasi" id="verifikasi">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				HP
			</div>
			<div class="col-sm-2">
				<input type="text" name="HP" id="HP" >
			</div>
			<div class="col-sm-2">
				Tanggal Registrasi
			</div>
			<div class="col-sm-2">
				<input type="date" name="tgl_registrasi" id="tgl_registrasi">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				No Telfon
			</div>
			<div class="col-sm-2">
				<input type="text" name="nama" placeholder="Masukan nama anda">
			</div>
			<div class="col-sm-2">
				Jenis Kelamin
			</div>
			<div class="col-sm-2">
				<select name='agama'>
					<option value='L'>Laki-laki</option>
					<option value='P'>Perempuan</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Nama Ibu Kandung
			</div>
			<div class="col-sm-2">
				<input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung">
			</div>
			
			<div class="col-sm-2">
				Kode Pos
			</div>
			<div class="col-sm-2">
				<input type="text" name="kode_pos" id="kode_pos">
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2">
				Kode Kantor
			</div>
			<div class="col-sm-2">
				<input type="text" name="kode_kantor" id="kode_kantor">
			</div>
			
			<div class="col-sm-2">
				Masa Berlaku KTP
			</div>
			<div class="col-sm-2">
				<input type="date" name="masa_berlaku_ktp" id="masa_berlaku_ktp">
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
				<input type="text" name="nasabah_alternatif" id="nasabah_alternatif">
			</div>
			<div class="col-sm-3">
				<input type="text" name="lokasi_usaha" id="lokasi_usaha">
			</div>
			<div class="col-sm-3">
				<select name='status_nikah'>
					<option value='00'>Lajang</option>
					<option value='01'>Kawin</option>
					<option value='02'>Belum Kawin</option>
					<option value='04'>Janda</option>
				</select>
			</div>
		</div>
		
			
			<div class="row">
			<div class="col-sm-2">
				<input type="submit" value="Simpan">
			</div>
			<div class="col-sm-2">
				<input type="RESET" value="reset"/>
			</div>
		</div>
			
	</div>
	</div>
</body>
</html>
