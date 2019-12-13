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
        
        if($kid_id <= 1){
            $limit = "3";
            $order = "video_id Asc";
        }else{
            $limit = "12";
            $order = "video_id Desc";
        }
        
        //GET DATA FOREX VIDEOS
        $params = array(
                        "select" =>"name,
                                    summary,
                                    img,
                                    video,
                                    date",
                "where" => "category_id = 1 and active = 1",
                "order" => $order,
                "limit" => $limit);
        //GET DATA FROM CUSTOMER
        $obj_videos_fx= $this->obj_videos->search($params);
        
        //GET DATA MARKETING VIDEOS
        $params = array(
                        "select" =>"name,
                                    summary,
                                    img,
                                    video,
                                    date",
                "where" => "category_id = 2 and active = 1",
                "order" => $order,
                "limit" => $limit);
        //GET DATA FROM CUSTOMER
        $obj_videos_mkt= $this->obj_videos->search($params);
        
        $this->tmp_course->set("obj_videos_fx",$obj_videos_fx);
        $this->tmp_course->set("obj_videos_mkt",$obj_videos_mkt);
        $this->tmp_course->render("course/c_home");
    }
    
    public function all()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $url = explode("/",uri_string());
        $category = $url[1];
        $module = $url[2];
        
        if($module == "basic"){
            $module_id = 1;
        }elseif($module == "intermediate"){
            $module_id = 2;
        }else{
            $module_id = 3;
        }
        
        //GET ID CATEGORY
        $params = array(
                "select" =>"category_id",
        "where" => "slug like '%$category%'and active = 1",
        "order" => "category_id DESC");
        //GET DATA FROM CUSTOMER
        $obj_category = $this->obj_category->get_search_row($params);
        
        if($obj_category->category_id == 1){
            $text_name = "Forex e Inversiones";
        }else{
            $text_name = "Marketing y redes sociales";
        }
        
        //GET VIDEO DATA
        $params = array(
                "select" =>"name,
                            summary,
                            img,
                            video,
                            date",
        "where" => "category_id = $obj_category->category_id and module = $module_id and active = 1",
        "order" => "video_id DESC");
        //GET DATA FROM CUSTOMER
        $obj_videos = $this->obj_videos->search($params);
        
        $this->tmp_course->set("obj_videos",$obj_videos);
        $this->tmp_course->set("text_name",$text_name);
        $this->tmp_course->render("course/c_all");
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
