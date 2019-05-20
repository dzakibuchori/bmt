<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_nasabah extends CI_Model{
	
    public function search($nasabah = null, $majelis = null, $petugas = null, $sektor_usaha = null, $kantor = null, $limit = "", $offset = ""){
        $this->db->select('nasabah.NASABAH_ID as nasabah_id, nasabah.NAMA_NASABAH as nama_nasabah,
		css_kode_group1.DESKRIPSI_GROUP1 as kode_group1,
		css_kode_group2.DESKRIPSI_GROUP2 as kode_group2,
		css_kode_group3.DESKRIPSI_GROUP3 as kode_group3,
		app_kode_kantor.nama_kantor as kode_kantor');

		$this->db->join('css_kode_group1','nasabah.kode_group1 = css_kode_group1.kode_group1' , 'LEFT');
        $this->db->join('css_kode_group2','nasabah.kode_group2 = css_kode_group2.kode_group2', 'LEFT');
		$this->db->join('css_kode_group3','nasabah.kode_group3 = css_kode_group3.kode_group3', 'LEFT');
		$this->db->join('app_kode_kantor','nasabah.kode_kantor = app_kode_kantor.kode_kantor ', 'LEFT');
	
		if ($nasabah !== null) {
			$this->db->where('nasabah.NAMA_NASABAH', $nasabah);
		}

		if ($majelis !== null) {
			$this->db->where('css_kode_group1.DESKRIPSI_GROUP1', $majelis);
		}

		if ($petugas !== null) {
			$this->db->where('css_kode_group2.DESKRIPSI_GROUP2', $petugas);
		}

		if ($sektor_usaha !== null) {
			$this->db->where('css_kode_group3.DESKRIPSI_GROUP3', $sektor_usaha);
		}

		if ($kantor !== null) {
			$this->db->where('app_kode_kantor.nama_kantor', $kantor);
		}

		$this->db->group_by('nasabah_id');
        $this->db->order_by('nasabah.NASABAH_ID', 'asc');
        $query = $this->db->get('nasabah', $limit, $offset);
        return $query->result();
    }
	
	public function getnasabah() {
		$this->db->select('NASABAH_ID as nasabah_id, NAMA_NASABAH as nama_nasabah, 
		ALAMAT as alamat, TELPON as telpon, jenis_kelamin, TEMPATLAHIR as tempatlahir, 
		TGLLAHIR as tanggallahir, 
		css_kode_jenis_identitas.nama_identitas as jenis_id, 
		NO_ID, nasabah.KETERANGAN as keterangan, 
		css_kode_group1.DESKRIPSI_GROUP1 as kode_group1,
		css_kode_group2.DESKRIPSI_GROUP2 as kode_group2,
		css_kode_group3.DESKRIPSI_GROUP3 as kode_group3,
		css_kode_agama.deskripsi as kode_agama, 
		css_kode_kelurahan.deskripsi_kode_kelurahan as desa, 
		css_kode_kecamatan.deskripsi_kode_kecamatan as kecamatan, 
		css_kode_dati.deskripsi_kode_dati as kota_kab, 
		css_kode_propvinsi.nama_provinsi as propinsi, 
		WARIS_NAMA as waris_nama, 
		WARIS_ALAMAT as waris_alamat, WARIS_TELP as waris_telp, VERIFIKASI as verifikasi, 
		HP, TGL_REGISTER as tgl_registrasi, NAMA_IBU_KANDUNG as nama_ibu_kandung, 
		nasabah.kodepos, 
		app_kode_kantor.nama_kantor as kode_kantor, 
		MASA_BERLAKU_KTP as masa_berlaku_ktp, 
		nasabah_alternatif, lokasi_usaha,STATUS_NIKAH as status_nikah ');
        $this->db->from('nasabah');
        
		$this->db->join('css_kode_jenis_identitas','nasabah.jenis_id = css_kode_jenis_identitas.jenis_id' , 'LEFT');
        $this->db->join('css_kode_group1','nasabah.kode_group1 = css_kode_group1.kode_group1' , 'LEFT');
        $this->db->join('css_kode_group2','nasabah.kode_group2 = css_kode_group2.kode_group2', 'LEFT');
		$this->db->join('css_kode_group3','nasabah.kode_group3 = css_kode_group3.kode_group3', 'LEFT');
		$this->db->join('css_kode_agama','nasabah.kode_agama = css_kode_agama.deskripsi', 'LEFT');
		$this->db->join('css_kode_kelurahan','nasabah.desa = css_kode_kelurahan.kode_kelurahan', 'LEFT');
		$this->db->join('css_kode_kecamatan','nasabah.kecamatan = css_kode_kecamatan.kode_kecamatan', 'LEFT');
		$this->db->join('css_kode_dati','nasabah.kota_kab = css_kode_dati.kode_dati', 'LEFT');
		$this->db->join('css_kode_propvinsi','nasabah.propinsi = css_kode_propvinsi.kode_provinsi', 'LEFT');
		$this->db->join('app_kode_kantor','nasabah.kode_kantor = app_kode_kantor.kode_kantor ', 'LEFT');
		$data=$this->db->get();
        return $data->row();
	}
	
    public function total_rows() {
		$data = $this->db->get('nasabah');

		return $data->num_rows();
	}
	
	public function nama_nasabah() {
		$this->db->select('nasabah_id, nama_nasabah');
		$this->db->from('nasabah');
		$this->db->order_by('nasabah_id', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function majelis() {
		$this->db->select('kode_group1, DESKRIPSI_GROUP1');
		$this->db->from('css_kode_group1');
		$this->db->order_by('kode_group1', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function petugas() {
		$this->db->select('kode_group2, DESKRIPSI_GROUP2');
		$this->db->from('css_kode_group2');
		$this->db->group_by('kode_group2', 'asc');
		$this->db->order_by('kode_group2', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function sektor_usaha() {
		$this->db->select('kode_group3, DESKRIPSI_GROUP3');
		$this->db->from('css_kode_group3');
		$this->db->group_by('kode_group3', 'asc');
		$this->db->order_by('kode_group3', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function kantor() {
		$this->db->select('kode_kantor, nama_kantor');
		$this->db->from('app_kode_kantor');
		$this->db->order_by('kode_kantor', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function jenisID() {
		$this->db->select('jenis_id, nama_identitas');
		$this->db->from('css_kode_jenis_identitas');
		$this->db->order_by('jenis_id', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function agama() {
		$this->db->select('deskripsi');
		$this->db->from('css_kode_agama');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function desa() {
		$this->db->select('deskripsi_kode_kelurahan');
		$this->db->from('css_kode_kelurahan');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function kecamatan() {
		$this->db->select('deskripsi_kode_kecamatan');
		$this->db->from('css_kode_kecamatan');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function kota_kab() {
		$this->db->select('kode_dati, deskripsi_kode_dati');
		$this->db->from('css_kode_dati');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function provinsi() {
		$this->db->select('kode_provinsi, nama_provinsi');
		$this->db->from('css_kode_propvinsi');
		
		$data=$this->db->get();
        return $data->result();
	}	
	
	public function status_nikah() {
		$this->db->distinct();
		$this->db->select('kode_status, deskripsi_status');
		$this->db->from('css_kode_status_nikah');
		$this->db->order_by('kode_status', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function kode_kantor() {
		$this->db->select('kode_kantor, nama_kantor');
		$this->db->from('app_kode_kantor');
		$this->db->order_by('kode_kantor', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
		
}