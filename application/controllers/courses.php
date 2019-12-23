<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
    public function __construct(){
        parent::__construct();
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
            
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $where = "videos.name like '%$search%' and category.type = 1 and videos.active = 1";
            }else{
                $where = "category.type = 1 and videos.active = 1";
            }
            
            //GET NAV
             $data['obj_category_videos'] = $this->nav_videos();
             $data['obj_category_catalog'] = $this->nav_catalogo();
            
             //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.img2,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => $where);
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("courses"); 
            $config["total_rows"] = $this->obj_videos->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 2;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><span aria-current="page" class="page-numbers current">';
            $config['cur_tag_close']= '</span></li>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $data['obj_pagination'] = $this->pagination->create_links();
            /// DATA
            $data['obj_videos'] = $this->obj_videos->search_data($params, $config["per_page"],$this->uri->segment(2));
            //send total row
            $data['total'] = $config["total_rows"];
           
            //SEND DATA
            $this->load->view('courses',$data);
	}
        public function category($category)
	{
            //GET NAV
            $data['obj_category_videos'] = $this->nav_videos();
            $data['obj_category_catalog'] = $this->nav_catalogo();
            
            //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id",
                "where" => "slug like '%$category%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $where = "videos.name like '%$search%' and category.type = 1 and videos.active = 1";
            }else{
                $where = "videos.category_id = $category_id and category.type = 1 and videos.active = 1";
            }
            
             //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.img2,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => $where);
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("courses"); 
            $config["total_rows"] = $this->obj_videos->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 2;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="active"><span aria-current="page" class="page-numbers current">';
            $config['cur_tag_close']= '</span></li>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $data['obj_pagination'] = $this->pagination->create_links();
            /// DATA
            $data['obj_videos'] = $this->obj_videos->search_data($params, $config["per_page"],$this->uri->segment(2));
            //send total row
            $data['total'] = $config["total_rows"];
           
            //SEND DATA
            $this->load->view('courses',$data);
	}
        public function detail($slug)
	{
            
            $data['obj_category_videos'] = $this->nav_videos();
            $data['obj_category_catalog'] = $this->nav_catalogo();
             
             //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id",
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
             
            $url = explode("/",uri_string());
            $slug_2 = $url[2];
            
            //get catalog
             //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.video,
                                    videos.description,
                                    videos.img2,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.slug = '$slug_2' and videos.category_id = $category_id and videos.active = 1");
            $data['obj_videos'] = $this->obj_videos->get_search_row($params);
            //get catalog relacionado
            
            //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.category_id = $category_id and videos.active = 1",
                "order" => "videos.category_id ASC");
            $obj_videos_all = $this->obj_videos->search($params);
            $data['total'] = count($obj_videos_all);
            $data['obj_videos_all'] = $obj_videos_all;
            //SEND DATA
            
            //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.category_id = $category_id and videos.type = 1 and videos.active = 1",
                "order" => "rand()",
                "limit" => "3");
            $data['obj_videos_rand'] = $this->obj_videos->search($params);
            //SEND DATA
            $this->load->view('courses_detail',$data);
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
