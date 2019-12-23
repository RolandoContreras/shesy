<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("catalog_model","obj_catalog");
        $this->load->model("category_model","obj_category");
        $this->load->model("videos_model","obj_videos");
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
            
            //GET NAV
             $data['obj_category_videos'] = $this->nav_videos();
             $data['obj_category_catalog'] = $this->nav_catalogo();
            
            //get catalog
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.description,
                                    catalog.img,
                                    catalog.active,
                                    catalog.date",
                "where" => "catalog.active = 1 and catalog.status_value = 1",
                "order" => "catalog.catalog_id DESC");
            
            $data['catalog'] = $this->obj_catalog->search($params);
            
            //GET COURSES
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.img2,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.type = 1 and videos.active = 1",
                "order" => "videos.video_id DESC",
                "limit" => "5");
            $data['courses'] = $this->obj_videos->search($params);
            
            $this->load->view('home', $data);
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
