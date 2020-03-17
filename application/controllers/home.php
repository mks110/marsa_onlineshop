<?php

class home extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');

	}
	// Memunculkan Beberapa data pada index
	public function index() {
		$data['logo'] 			= $this->home_model->GetLogo();
		
		$data['seo'] 			= $this->home_model->GetSeo(); 
		
		$data['produk']			= $this->home_model->GetProduk();
		
		$data['jasapengiriman']	= $this->home_model->GetJasaPengiriman();

		$this->load->view('home/index',$data);
	}
	
//Menampilkan seluruh product pada index
	public function produk () {
		$id_produk = $this->uri->segment(3);

		$data['logo'] 			= $this->home_model->GetLogo();
		$data['kontak'] 		= $this->home_model->GetKontak();
		$data['sosial_media'] 	= $this->home_model->GetSosialMedia();
		$data['seo'] 			= $this->home_model->GetSeo(); 
		$data['bank'] 			= $this->home_model->GetBank(); 
		$data['brand'] 			= $this->home_model->GetBrand(); 
		$data['kategori'] 		= $this->home_model->GetKategori(); 
		$data['jasapengiriman']	= $this->home_model->GetJasaPengiriman();
		$data['random']			= $this->home_model->GetRandomProduk();
		$data['random_active']	= $this->home_model->GetRandomActiveProduk();

		$data['data_produk']= $this->home_model->GetProdukId($id_produk);

		$this->load->view('home/produk',$data);
	}




	
}