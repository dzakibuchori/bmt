<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->model('M_nasabah');
        $this->load->database();
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['userdata'] = $this->userdata;

        $data['page'] = "nasabah";
        $data['judul'] = "Nasabah";
        $data['deskripsi'] = "Manage Nasabah";

        $data['majelis'] = $this->M_nasabah->majelis();
        $data['petugas'] = $this->M_nasabah->petugas();
        $data['sektor_usaha'] = $this->M_nasabah->sektor_usaha();
        $data['kantor'] = $this->M_nasabah->kantor();
        $data['namanasabah'] = $this->M_nasabah->nama_nasabah();

        $data['dataNasabah'] = '';
        $data["links"] = "";

        $this->template->views('nasabah/home', $data);
    }

    public function filter()
    {
        $data['userdata'] = $this->userdata;

        $data['page'] = "nasabah";
        $data['judul'] = "Nasabah";
        $data['deskripsi'] = "Manage Nasabah";

        $data['majelis'] = $this->M_nasabah->majelis();
        $data['petugas'] = $this->M_nasabah->petugas();
        $data['sektor_usaha'] = $this->M_nasabah->sektor_usaha();
        $data['kantor'] = $this->M_nasabah->kantor();
        $data['namanasabah'] = $this->M_nasabah->nama_nasabah();

        $namanasabah = $this->input->post('nama_nasabah');
        $majelis = $this->input->post('majelis');
        $petugas = $this->input->post('petugas');
        $sektor_usaha = $this->input->post('sektor_usaha');
        $kantor = $this->input->post('kantor');

        $this->session->set_userdata('namanasabah',$namanasabah);
        $this->session->set_userdata('majelis',$majelis);
        $this->session->set_userdata('petugas',$petugas);
        $this->session->set_userdata('sektor_usaha',$sektor_usaha);
        $this->session->set_userdata('kantor',$kantor);

        /* -------------------------------------------------------------------------------------------------------------------------- */
        $result = $this->M_nasabah->search($namanasabah, $majelis, $petugas, $sektor_usaha, $kantor);

        $config["base_url"] = base_url()."/nasabah/filter";
        $config["total_rows"] = count($result);
        $config["per_page"] = 10;
        $from = $this->uri->segment(3);

        /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        /* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

        $this->pagination->initialize($config);
        $result = $this->M_nasabah->search($namanasabah, $majelis, $petugas, $sektor_usaha, $kantor, $config["per_page"], $from);
        /* -------------------------------------------------------------------------------------------------------------------------- */

        if (empty($result)) {
            $data['dataNasabah'] = "";
            $data["links"] = "";

        } else {
            $data['dataNasabah'] = $result;
            /* ---------------------------------------------------------------- */
            $data["links"] = $this->pagination->create_links();
			
            /* ---------------------------------------------------------------- */
        }

        $this->template->views('nasabah/home', $data);
    }

    public function searchNasabah()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->post('http://180.250.246.107:4000/InquiryNasabah', $this->_data['nasabah_id']);
        echo $res->getBody();
    }

    // tambah anggota 1 1
    public function tambah()
    {
        $data['userdata'] = $this->userdata;

        $data['page'] = "Tambah";
        $data['judul'] = "Data Nasabah";
        $data['deskripsi'] = "Manage Data Nasabah";

        $data['jenisID'] = $this->M_nasabah->jenisID();

        $data['majelis'] = $this->M_nasabah->majelis();
        $data['petugas'] = $this->M_nasabah->petugas();
        $data['sektor_usaha'] = $this->M_nasabah->sektor_usaha();
        $data['kantor'] = $this->M_nasabah->kantor();
        $data['agama'] = $this->M_nasabah->agama();
        $data['status_nikah'] = $this->M_nasabah->status_nikah();

        $data['desa'] = $this->M_nasabah->desa();
        $data['kecamatan'] = $this->M_nasabah->kecamatan();
        $data['kota_kab'] = $this->M_nasabah->kota_kab();
        $data['provinsi'] = $this->M_nasabah->provinsi();

        $this->template->views('nasabah/tambah_nasabah', $data);
    }

    public function update()
    {
        $data['userdata'] 	= $this->userdata;
			
        $data['page'] = "Update";
        $data['judul'] = "Data Nasabah";
        $data['deskripsi'] = "Manage Data Nasabah";
		
		$data['jenisID'] = $this->M_nasabah->jenisID();
		$data['majelis'] = $this->M_nasabah->majelis();
        $data['petugas'] = $this->M_nasabah->petugas();
        $data['sektor_usaha'] = $this->M_nasabah->sektor_usaha();
        $data['kantor'] = $this->M_nasabah->kantor();
        $data['agama'] = $this->M_nasabah->agama();
        $data['status_nikah'] = $this->M_nasabah->status_nikah();


        $data = array();
        $data['result'] = $this->M_nasabah->getnasabah();

        $data['desa'] = $this->M_nasabah->desa();
        $data['kecamatan'] = $this->M_nasabah->kecamatan();
        $data['kota_kab'] = $this->M_nasabah->kota_kab();
        $data['provinsi'] = $this->M_nasabah->provinsi();
			
        $this->template->views('nasabah/update_nasabah', $data);
    }

    // RegistrasiMasal
    public function do_upload()
    {
        $fileName = time();
        $config['upload_path'] = './uploads/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
        }
        $media = $this->upload->data();
        $inputFileName = './uploads/' . $media['file_name'];
        try {
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
            $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $data = array();
        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE);
            $jsonData = array(
                'nasabah_id' => $rowData[0][0],
                'nama_nasabah' => $rowData[0][1],
                'alamat' => $rowData[0][2],
                'telpon' => $rowData[0][3],
                'jenis_kelamin' => $rowData[0][4],
                'tempatlahir' => $rowData[0][5],
                'tgllahir' => $rowData[0][6],
                'jenis_id' => $rowData[0][7],
                'no_id' => $rowData[0][8],
                'keterangan' => $rowData[0][9],
                'kode_group1' => $rowData[0][10],
                'kode_group2' => $rowData[0][11],
                'kode_group3' => $rowData[0][12],
                'kode_agama' => $rowData[0][13],
                'propinsi' => $rowData[0][17],
                'kota_kab' => $rowData[0][16],
                'kecamatan' => $rowData[0][15],
                'desa' => $rowData[0][14],
                'waris_nama' => $rowData[0][18],
                'waris_alamat' => $rowData[0][19],
                'waris_telp' => $rowData[0][20],
                'verifikasi' => $rowData[0][21],
                'hp' => $rowData[0][22],
                'tgl_register' => $rowData[0][23],
                'nama_ibu_kandung' => $rowData[0][24],
                'kodepos' => $rowData[0][25],
                'kode_kantor' => $rowData[0][26],
                'masa_berlaku_ktp' => $rowData[0][27],
                'nasabah_alternatif' => $rowData[0][28],
                'lokasi_usaha' => $rowData[0][29],
                'status_nikah' => $rowData[0][30]
            );
            $data[] = $jsonData;
        }
        $client = new \GuzzleHttp\Client();
        $res = $client->post('http://180.250.246.107:4000/RegistrasiMasal', array(
            'form_params' => array(
                "Data" => json_encode($data)
            )
        ));
        echo $res->getBody();
    }

    public function updateAnggota()
    {
        $nasabah_id = $this->put('nasabah_id');
        $jsonData = array(
            'nama_nasabah' => $this->_data('nama_nasabah'),
            'alamat' => $this->_data('alamat'),
            'telpon' => $this->_data('telpon'),
            'jenis_kelamin' => $this->_data('jenis_kelamin'),
            'tempatlahir' => $this->_data('tempatlahir'),
            'tgllahir' => $this->_data('tgllahir'),
            'jenis_id' => $this->_data('jenis_id'),
            'no_id' => $this->_data('no_id'),
            'keterangan' => $this->_data('keterangan'),
            'kode_group1' => $this->_data('kode_group1'),
            'kode_group2' => $this->_data('kode_group2'),
            'kode_group3' => $this->_data('kode_group3'),
            'kode_agama' => $this->_data('kode_agama'),
            'propinsi' => $this->_data('propinsi'),
            'kota_kab' => $this->_data('kota_kab'),
            'kecamatan' => $this->_data('kecamatan'),
            'desa' => $this->_data('desa'),
            'waris_nama' => $this->_data('waris_nama'),
            'waris_alamat' => $this->_data('waris_alamat'),
            'waris_telp' => $this->_data('waris_telp'),
            'verifikasi' => $this->_data('verifikasi'),
            'hp' => $this->_data('hp'),
            'tgl_register' => $this->_data('tgl_register'),
            'nama_ibu_kandung' => $this->_data('nama_ibu_kandung'),
            'kodepos' => $this->_data('kodepos'),
            'kode_kantor' => $this->_data('kode_kantor'),
            'masa_berlaku_ktp' => $this->_data('masa_berlaku_ktp'),
            'nasabah_alternatif' => $this->_data('nasabah_alternatif'),
            'lokasi_usaha' => $this->_data('lokasi_usaha'),
            'status_nikah' => $this->_data('status_nikah')
        );
        $client = new \GuzzleHttp\Client();
        $res = $client->put('http://180.250.246.107:4000/updateAnggota', array(
            'form_params' => $jsonData
        ));
        echo $res->getBody();
    }

    public function registrasiAnggota()
    {
        $nasabah_id = $this->post('nasabah_id');
        $jsonData = array(
            'nama_nasabah' => $this->_data('nama_nasabah'),
            'alamat' => $this->_data('alamat'),
            'telpon' => $this->_data('telpon'),
            'jenis_kelamin' => $this->_data('jenis_kelamin'),
            'tempatlahir' => $this->_data('tempatlahir'),
            'tgllahir' => $this->_data('tgllahir'),
            'jenis_id' => $this->_data('jenis_id'),
            'no_id' => $this->_data('no_id'),
            'keterangan' => $this->_data('keterangan'),
            'kode_group1' => $this->_data('kode_group1'),
            'kode_group2' => $this->_data('kode_group2'),
            'kode_group3' => $this->_data('kode_group3'),
            'kode_agama' => $this->_data('kode_agama'),
            'propinsi' => $this->_data('propinsi'),
            'kota_kab' => $this->_data('kota_kab'),
            'kecamatan' => $this->_data('kecamatan'),
            'desa' => $this->_data('desa'),
            'waris_nama' => $this->_data('waris_nama'),
            'waris_alamat' => $this->_data('waris_alamat'),
            'waris_telp' => $this->_data('waris_telp'),
            'verifikasi' => $this->_data('verifikasi'),
            'hp' => $this->_data('hp'),
            'tgl_register' => $this->_data('tgl_register'),
            'nama_ibu_kandung' => $this->_data('nama_ibu_kandung'),
            'kodepos' => $this->_data('kodepos'),
            'kode_kantor' => $this->_data('kode_kantor'),
            'masa_berlaku_ktp' => $this->_data('masa_berlaku_ktp'),
            'nasabah_alternatif' => $this->_data('nasabah_alternatif'),
            'lokasi_usaha' => $this->_data('lokasi_usaha'),
            'status_nikah' => $this->_data('status_nikah')
        );
        $client = new \GuzzleHttp\Client();
        $res = $client->post('http://180.250.246.107:4000/registrasiAnggota', array(
            'form_params' => $jsonData
        ));
        echo $res->getBody();
    }

    public function deleteAnggota()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->delete('http://180.250.246.107:4000/deleteAnggota', $this->_data['nasabah_id']);
        echo $res->getBody();
    }


    // $result = // $this->M_nasabah->search('LEMAH NENDEUT 1','ANNISA NURBAYYINAH','DAGANG MAKANAN','Kantor Cabang Padasuka');
    public function testing()
    {
        $result = $this->M_nasabah->search('AL-HUDA');
//        print_r($result);
        echo count($result);
    }


}
