<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_nasabah extends CI_Model{
	
    public function search($majelis,$petugas, $sektor_usaha, $kantor){
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
		
		$this->db->where('kode_group1',$majelis);
		$this->db->where('kode_group2',$petugas);
		$this->db->where('kode_group2',$sektor_usaha);
		$this->db->where('kode_kantor',$kantor);
		
		$this->db->group_by('nasabah_id');
		 $this->db->order_by('nasabah_id', 'asc');
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
		$this->db->distinct();
		$this->db->select('kode_group2, DESKRIPSI_GROUP2');
		$this->db->from('css_kode_group2');
		$this->db->order_by('kode_group2', 'ASC');
		
		$data=$this->db->get();
        return $data->result();
	}
	
	public function sektor_usaha() {
		$this->db->distinct();
		$this->db->select('kode_group3, DESKRIPSI_GROUP3');
		$this->db->from('css_kode_group3');
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
	
		
		
}