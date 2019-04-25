<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_nasabah extends CI_Model{
	
    public function select_listdata(){
        $this->db->select('NASABAH_ID as nasabah_id, NAMA_NASABAH as nama_nasabah,
		css_kode_group1.DESKRIPSI_GROUP1 as kode_group1, 
		css_kode_group2.DESKRIPSI_GROUP2 as kode_group2, 
		css_kode_group3.DESKRIPSI_GROUP3 as kode_group3,
		app_kode_kantor.nama_kantor as kode_kantor');
        $this->db->from('nasabah');
		$this->db->join('css_kode_group1','nasabah.kode_group1=css_kode_group1.kode_group1');
        $this->db->join('css_kode_group2','nasabah.kode_group2=css_kode_group2.kode_group2');
		$this->db->join('css_kode_group3','nasabah.kode_group3=css_kode_group3.kode_group3');
		$this->db->join('app_kode_kantor','app_kode_kantor.kode_kantor=css_kode_group1.kode_kantor');
		$this->db->group_by('nasabah_id');
		 $this->db->order_by('nasabah_id', 'asc');
        $data=$this->db->get();
        return $data->result();
    }
    public function total_rows() {
		$data = $this->db->get('nasabah');

		return $data->num_rows();
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
}