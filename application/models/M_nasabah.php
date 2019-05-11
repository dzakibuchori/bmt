<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_nasabah extends CI_Model{
	
    public function search($majelis = '', $petugas = '',$sektor_usaha = '',$kantor = ''){
        $this->db->select('NASABAH_ID as nasabah_id, NAMA_NASABAH as nama_nasabah,
		css_kode_group1.DESKRIPSI_GROUP1 as kode_group1, 
		css_kode_group2.DESKRIPSI_GROUP2 as kode_group2, 
		css_kode_group3.DESKRIPSI_GROUP3 as kode_group3,
		app_kode_kantor.nama_kantor as kode_kantor');
		$this->db->join('css_kode_group1','nasabah.kode_group1=css_kode_group1.kode_group1');
        $this->db->join('css_kode_group2','nasabah.kode_group2=css_kode_group2.kode_group2');
		$this->db->join('css_kode_group3','nasabah.kode_group3=css_kode_group3.kode_group3');
		$this->db->join('app_kode_kantor','css_kode_group1.kode_kantor=app_kode_kantor.kode_kantor');
		
		if ($majelis !== '') {
			$this->db->where('css_kode_group1.DESKRIPSI_GROUP1', $majelis);
		}
		
		if ($petugas !== '') {
			$this->db->where('css_kode_group2.DESKRIPSI_GROUP2',$petugas);
		}
		
		if ($sektor_usaha !== '') {
			$this->db->where('css_kode_group3.DESKRIPSI_GROUP3',$sektor_usaha);
		}
		
		if ($kantor !== '') {
			$this->db->where('app_kode_kantor.nama_kantor',$kantor);
		}
		
		$this->db->group_by('nasabah_id');
		 $this->db->order_by('nasabah_id', 'asc');
        $data = $this->db->get('nasabah');
        return $data->result();
    }
	
	public function getnasabah() {
		$this->db->select('NASABAH_ID, NAMA_NASABAH, ALAMAT, TELPON, jenis_kelamin, TEMPATLAHIR, 
		TGLLAHIR, JENIS_ID, NO_ID, KETERANGAN, kode_group1, kode_group2, kode_group3, KODE_AGAMA,
		DESA, KECAMATAN, kota_kab, propinsi, WARIS_NAMA, WARIS_ALAMAT, WARIS_TELP, VERIFIKASI, 
		HP, TGL_REGISTER, NAMA_IBU_KANDUNG, kodepos, KODE_KANTOR, MASA_BERLAKU_KTP, nasabah_alternatif,
		lokasi_usaha,STATUS_NIKAH ');
        $this->db->from('nasabah');
        
        $data=$this->db->get();
        return $data->result();
	}
	
    public function total_rows() {
		$data = $this->db->get('nasabah');

		return $data->num_rows();
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