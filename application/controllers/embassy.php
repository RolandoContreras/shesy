<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embassy extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("catalog_model","obj_catalog");
        $this->load->model("category_model","obj_category");
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
            
            $date =  date("Y-m-d H:i:s");
            $data['date'] = formato_fecha($date);
            
            //GET NAV
             $data['obj_category_videos'] = $this->nav_videos();
             $data['obj_category_catalog'] = $this->nav_catalogo();
            //SEND DATA
            $this->load->view('embassy',$data);
	}
        
        public function nav_videos(){
            $params_category_videos = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "type = 1 and active = 1",
            );
            //GET DATA COMMENTS
            return $obj_category_videos = $this->obj_category->search($params_category_videos);
        }
        
        public function nav_catalogo(){
           $params_category_catalog = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "type = 2 and active = 1",
            );
            //GET DATA CATALOGO
            return $obj_category_catalog = $this->obj_category->search($params_category_catalog);
             
        }
}
