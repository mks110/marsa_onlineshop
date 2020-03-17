<?php

class home_model extends CI_Model {
	//memanggil logo pada database
	function GetLogo() {
		return $this->db->query("select * from tbl_logo");
	}
	// Memanggil kontak pada database
	
	// memanggil Seo Dari database
	function GetSeo() {
		return $this->db->query("select * from tbl_seo");
	}
	//Memanggil Brand pada database
	function GetBrand() {
		return $this->db->query("select * from tbl_brand order by id_brand desc");
	}
	//Memanggil Product di database
	function GetProduk() {
		return $this->db->query("select a.*,b.*,c.* from tbl_produk a join tbl_brand b on a.brand_id=b.id_brand join tbl_kategori c on a.kategori_id=c.id_kategori order by id_produk desc limit 0,6 ");
	}
	//Jasa Pengiriman
	function GetJasaPengiriman() {
		return $this->db->query("select * from tbl_jasapengiriman order by id_jasapengiriman desc");
	}

}