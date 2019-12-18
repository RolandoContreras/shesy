<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {
        public function __construct(){
        parent::__construct();
        $this->load->model("catalog_model","obj_catalog");
    }  

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('catalog');
	}
        public function detail()
	{
            //get slug
            $url = explode("/",uri_string());
            $slug = $url[1];
            
            //get catalog
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.description,
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.active,
                                    catalog.date",
                "where" => "catalog.slug = '$slug'");
            $data['obj_catalog'] = $this->obj_catalog->get_search_row($params);
            
            //get catalog relacionado
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.img,
                                    catalog.active",
                "where" => "catalog.active = 1",
                "order" => "rand()",
                "limit" => "4",
                );
            $data['obj_catalog_rand'] = $this->obj_catalog->search($params);
            $this->load->view('catalog_detail',$data);
	}
}
