<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_barang',$data);
	}else{
        show_404();
    }
	}
	function tambah_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$fobar = $this->upload_foto('fobar')['file_name'];
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok, $fobar);

		echo $this->session->set_flashdata('msg','<div class="alert alert-success">Barang berhasil ditambah.</div>');
		redirect('admin/barang');
	}else{
       show_404();
    }
	}
	function edit_barang(){
		if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kobar');
		$barang = $this->db->get_where('tbl_barang', ['barang_id' => $kobar])->row_array();
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$fobar = isset($_FILES['fobar']) ? $this->upload_foto('fobar')['file_name'] : $barang['barang_gambar'];
		$this->m_barang->update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok, $fobar);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success">Barang berhasil diedit.</div>');
		redirect('admin/barang');
	}else{
        show_404();
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success">Barang berhasil dihapus.</div>');
		redirect('admin/barang');
	}else{
        show_404();
    }
	}

	public function upload_foto($foto)
	{
		$config['upload_path']          = './images/barang/';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($foto))
		{
			echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Foto gagal diupload.</div>');
			redirect('admin/barang');
		}
		else
		{
			return $this->upload->data('full_path');
		}
	}
}