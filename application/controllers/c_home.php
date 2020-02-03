<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $kid_id = $_SESSION['customer']['kit_id'];
        //GET NAV CURSOS
        $obj_category_videos = $this->nav_videos();
        
        if(isset($_GET['search'])){
                $search = $_GET['search'];
                    $where = "videos.name like '%$search%' and category.type = 1 and videos.active = 1";
        }else{
                $where = "category.type = 1 and videos.active = 1";
        }
        $category_name = "Todos los videos";
        
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
            $config["base_url"] = site_url("course"); 
            $config["total_rows"] = $this->obj_videos->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 2;   
            
            $config['first_tag_open'] = '<li class="paginate_button page-item">';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="paginate_button page-item">';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li class="paginate_button page-item">';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class=" paginate_button page-item active"><a class="page-link">';
            $config['cur_tag_close']= '</a></li>';            
            $config['next_tag_open'] = '<li class="paginate_button page-item">';
            $config['next_tag_close'] = '</a></li>';            
            $config['last_tag_open'] = '<li class="paginate_button page-item">';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            /// DATA
            $obj_videos = $this->obj_videos->search_data($params, $config["per_page"],$this->uri->segment(2));
        //GET DATA FROM CUSTOMER
            
        $url = 'course';
        $this->tmp_course->set("url",$url);    
        $this->tmp_course->set("kid_id",$kid_id);
        $this->tmp_course->set("category_name",$category_name);
        $this->tmp_course->set("obj_pagination",$obj_pagination);
        $this->tmp_course->set("obj_category_videos",$obj_category_videos);
        $this->tmp_course->set("obj_videos",$obj_videos);
        $this->tmp_course->render("course/c_home");
    }
    
    public function category($category)
	{
            
            $kid_id = $_SESSION['customer']['kit_id'];
            //GET NAV CURSOS
            $obj_category_videos = $this->nav_videos();
            //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id,
                                    name",
                "where" => "slug like '%$category%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            $category_name = "Videos - ".$obj_category->name;
            
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
                "where" => "videos.category_id = $category_id and category.type = 1 and videos.active = 1");
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("course"); 
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
            $obj_pagination = $this->pagination->create_links();
            /// DATA
            $obj_videos = $this->obj_videos->search_data($params, $config["per_page"],$this->uri->segment(2));
            //send total row
           
            //SEND DATA
            $url = 'course';
            $this->tmp_course->set("url",$url);    
            $this->tmp_course->set("kid_id",$kid_id);
            $this->tmp_course->set("category_name",$category_name);
            $this->tmp_course->set("obj_pagination",$obj_pagination);
            $this->tmp_course->set("obj_category_videos",$obj_category_videos);
            $this->tmp_course->set("obj_videos",$obj_videos);
            $this->tmp_course->render("course/c_home");
	}
    
    public function detail($slug)
	{
            
            //get nav cursos
            $obj_category_videos = $this->nav_videos();
             
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
                                    category.name as category_name,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.slug = '$slug_2' and videos.category_id = $category_id and videos.active = 1");
            $obj_videos = $this->obj_videos->get_search_row($params);
            //get catalog relacionado
            
            //get catalog
            $params = array(
                        "select" =>"videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.img2,
                                    videos.slug,
                                    videos.date,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
                "join" => array( 'category, category.category_id = videos.category_id'),
                "where" => "videos.category_id = $category_id and videos.active = 1",
                "order" => "videos.category_id ASC",
                "limit" => "3");
            $obj_videos_all = $this->obj_videos->search($params);
            //SEND DATA
            
            $this->tmp_course->set("obj_category_videos",$obj_category_videos);
            $this->tmp_course->set("obj_videos_all",$obj_videos_all);
            $this->tmp_course->set("obj_videos",$obj_videos);
            $this->tmp_course->render("course/c_detail");
	}
    
    public function document()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $this->tmp_course->render("course/c_document");
    }
    
    public function profile()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"customer.username,
                                    customer.email,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.btc_address,
                                    customer.created_at,
                                    customer.date_start,
                                    customer.address,
                                    customer.phone,
                                    customer.dni,
                                    customer.active,
                                    paises.nombre,
                                    kit.kit_id,
                                    kit.name as kit",
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1 and paises.id_idioma = 7",
                        "join" => array('kit, customer.kit_id = kit.kit_id',
                                        'paises, customer.country = paises.id'),
                        );

        $obj_customer = $this->obj_customer->get_search_row($params);
        
        $kit = $obj_customer->kit_id;
        if($kit == 1){
            $text_course = "Prueba";
        }elseif($kit == 2){
            $text_course = "Inversiones y Marketing - Módulo Basico";
        }elseif($kit == 3){
            $text_course = "Inversiones y Marketing - Módulo Intermedio";
        }else{
            $text_course = "Inversiones y Marketing - Módulo Avanzando";
        }
        
        $this->tmp_course->set("text_course",$text_course);
        $this->tmp_course->set("obj_customer",$obj_customer);
        $this->tmp_course->render("course/c_profile");
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
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']=='1'){               
                return true;
            }else{
                redirect(site_url().'home');
            }
        }else{
            redirect(site_url().'home');
        }
    }
}
