<?php

class admin_model extends CI_Model {

	//Memeriksa apakah username dan password cocok pada database
	function CekAdminLogin($username,$password) {

		

		$ceklogin = $this->db->query("select * from tbl_admin where username='$username' and password='$password'");

		if (count($ceklogin->result())>0) {

			foreach ($ceklogin->result() as $value) {
				$sess_data['logged_in'] 	= 'LoginOke';
				$sess_data['id_admin']  	= $value->id_admin;
				$sess_data['nama_admin']  	= $value->nama_admin;
				$sess_data['username']  	= $value->username;
				$sess_data['password']  	= $value->password;
				$sess_data['email']  		= $value->email;
				$sess_data['phone']  		= $value->phone;
				$sess_data['hak_akses']  	= $value->hak_akses;

				$this->session->set_userdata($sess_data);

			}
			redirect("adminweb/home");
		}
		else {
			$this->session->set_flashdata("error","Username atau Password Anda Salah!");
			redirect('adminweb/index');
		}

	}
	//Menampilkan data logo pada database
	function GetLogo() {
		return $this->db->query("select * from tbl_logo");
	}
	//Awal Seo
	function GetSeo() {
		return $this->db->query("select * from tbl_seo");
	}
	//mengupdate Seo
	function UpdateSeo($id_seo,$tittle,$keyword,$description){
		return $this->db->query("update tbl_seo set tittle='$tittle',keyword='$keyword',description='$description' where id_seo='$id_seo'");
	}
	

	
	//Menampilkan kategori pada database
	function GetKategori() {
		return $this->db->query("select * from tbl_kategori order by id_kategori desc");
	}
	//
	function KategoriSama($nama_kategori) {
		return $this->db->query("select * from tbl_kategori where binary(nama_kategori)='$nama_kategori' ");
	}
	//Menyimpan kategori pada database baru
	function KategoriSimpan($nama_kategori) {
		return $this->db->query("insert into tbl_kategori values('','$nama_kategori')");
	}
	//menghapus kategori
	function DeleteKategori($id_kategori) {
		return $this->db->query("delete from tbl_kategori where id_kategori='$id_kategori'");
	}
	//Mengedit Kategori
	function GetEditKategori($id_kategori) {
		return $this->db->query("select * from tbl_kategori where id_kategori='$id_kategori'");
	}
	//mengupdate kategori di database
	function KategoriUpdate($id_kategori,$nama_kategori) {
		return $this->db->query("update tbl_kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori'");
	}
	//Akhir Kategori

	//Memanggil Brand pada database
	function GetBrand() {
		return $this->db->query("select * from tbl_brand order by id_brand desc");
	}
	//
	function BrandSama($nama_brand) {
		return $this->db->query("select * from tbl_brand where binary(nama_brand)='$nama_brand' ");
	}
	//Menyimpan Brand 
	function BrandSimpan($nama_brand) {
		return $this->db->query("insert into tbl_brand values('','$nama_brand')");
	}
	//Menghapus Brand
	function DeleteBrand($id_brand) {
		return $this->db->query("delete from tbl_brand where id_brand='$id_brand'");
	}
	//mengedit brand
	function GetEditBrand($id_brand) {
		return $this->db->query("select * from tbl_brand where id_brand='$id_brand'");
	}
	//Update Brand
	function BrandUpdate($id_brand,$nama_brand) {
		return $this->db->query("update tbl_brand set nama_brand='$nama_brand' where id_brand='$id_brand'");
	}
	//Akhir Brand



	//Akhir admin

	//Awal produk
	// memabnggil Seluruh product
	function GetProduk() {
		return $this->db->query("select a.*,b.nama_brand,c.nama_kategori from tbl_produk a join tbl_brand b on a.brand_id=b.id_brand join tbl_kategori c on a.kategori_id=c.id_kategori order by a.id_produk desc");
	}
	//Memilih kode prodcut terbaru
	function GetMaxKodeProduk() {

		$query = $this->db->query("select MAX(RIGHT(kode_produk,5)) as kode_produk from tbl_produk");
		$kode ="";
		if($query->num_rows()>0) {
			foreach ($query->result() as $tampil) {
				$kd = ((int)$tampil->kode_produk)+1;
				$kode = sprintf("%05s",$kd);
			}
		}
		else {
			$kode="00001";
		}
		return "AMX".$kode;
	}
	//menghapus product
	function DeleteProduk($id_produk) {
		return $this->db->query("delete from tbl_produk where id_produk='$id_produk' ");
	}
	//mengedit product
	function EditProduk($id_produk){
		return $this->db->query("select * from tbl_produk where id_produk='$id_produk' ");
	}
	//Akhir Produk

	
}