<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends AUTH_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_nasabah');
    }
    public function index(){
        $data['userdata'] = $this->userdata;
        $data['dataNasabah']= $this->M_nasabah->select_listdata();

        $data['page'] = "nasabah";
        $data['judul'] = "Nasabah";
        $data['deskripsi'] = "Manage Nasabah";

        //$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

        $this->template->views('nasabah/home', $data);
    }
	
	// menampilkan data di list_data.php
    public function tampil(){
        $data['dataNasabah']= $this->M_nasabah->select_listdata();
        $this->load->view('nasabah/list_data',$data);
    }
	
	// tambah anggota 1 1
	public function tambah() {
		$data['userdata'] = $this->userdata;
		$data['getNasabah'] = $this->M_nasabah->getnasabah();
		
		$data['page'] = "Tambah";
		$data['judul'] = "Data Anggota";
		$data['deskripsi'] = "Manage Data Anggota";
		
		$this->template->views('modals/modal_tambah_anggota', $data);
	}
	
	// update data
	public function update(){
		$nasabah_id = trim($_POST['nasabah_id']);
            $data['getNasabah'] = $this->M_nasabah->getnasabah($nasabah_id);
            $data['userdata'] 	= $this->userdata;
			
			$data['page'] = "Update";
			$data['judul'] = "Data Anggota";
			$data['deskripsi'] = "Manage Data Anggota";
            echo show_my_modal('modals/modal_update_anggota', 'update-Nasabah', $data);
	}
	
	// RegistrasiMasal
	public function do_upload() {
	$fileName                = time();
		$config['upload_path']   = './uploads/';
		$config['file_name']     = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size']      = 20000;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">'.$error['error'].'</div>';
		}
		$media         = $this->upload->data();
		$inputFileName = './uploads/' . $media['file_name'];
		try {
			$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
			$objReader     = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
			$objPHPExcel   = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
		}
		$sheet         = $objPHPExcel->getSheet(0);
		$highestRow    = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		$data          = array();
		for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array
			$rowData  = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
				NULL,
				TRUE,
				FALSE);
			$jsonData = array(
				'nasabah_id'         => $rowData[0][0],
				'nama_nasabah'       => $rowData[0][1],
				'alamat'             => $rowData[0][2],
				'telpon'             => $rowData[0][3],
				'jenis_kelamin'      => $rowData[0][4],
				'tempatlahir'        => $rowData[0][5],
				'tgllahir'           => $rowData[0][6],
				'jenis_id'           => $rowData[0][7],
				'no_id'              => $rowData[0][8],
				'keterangan'         => $rowData[0][9],
				'kode_group1'        => $rowData[0][10],
				'kode_group2'        => $rowData[0][11],
				'kode_group3'        => $rowData[0][12],
				'kode_agama'         => $rowData[0][13],
				'propinsi'           => $rowData[0][17],
				'kota_kab'           => $rowData[0][16],
				'kecamatan'          => $rowData[0][15],
				'desa'               => $rowData[0][14],
				'waris_nama'         => $rowData[0][18],
				'waris_alamat'       => $rowData[0][19],
				'waris_telp'         => $rowData[0][20],
				'verifikasi'         => $rowData[0][21],
				'hp'                 => $rowData[0][22],
				'tgl_register'       => $rowData[0][23],
				'nama_ibu_kandung'   => $rowData[0][24],
				'kodepos'            => $rowData[0][25],
				'kode_kantor'        => $rowData[0][26],
				'masa_berlaku_ktp'   => $rowData[0][27],
				'nasabah_alternatif' => $rowData[0][28],
				'lokasi_usaha'       => $rowData[0][29],
				'status_nikah'       => $rowData[0][30]
			);
			$data[]   = $jsonData;
		}
		$client = new \GuzzleHttp\Client();
		$res    = $client->post('http://180.250.246.107:4000/RegistrasiMasal', array(
			'form_params' => array(
				"Data" => json_encode($data)
			)
		));
		echo $res->getBody();	
	}
    
}

