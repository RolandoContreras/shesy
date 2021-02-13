<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model","obj_category");
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
        if(isset($_GET["id"])){
            $customer_id = decrypt($_GET["id"]);
        }else{
            $customer_id = 1;            
        }
        //get data nav
        $url = explode("/", uri_string());
        $category_slug = $url[1];
        $slug = $url[2];   
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.summary,
                                    catalog.description,
                                    catalog.granel,
                                    catalog.price_del,
                                    catalog.price,
                                    catalog.stock,
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.img4,
                                    catalog.date,
                                    catalog.active,
                                    category.slug as category_slug,
                                    category.name as category_name",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.slug = '$slug' and category.slug = '$category_slug' and catalog.active = 1");
        $data['obj_catalog'] = $this->obj_catalog->get_search_row($params);
        //SEND DATA
        $this->load->view('landing',$data);
	}
}
