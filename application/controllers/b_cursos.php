<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
class B_cursos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("category_model", "obj_category");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("unilevel_model", "obj_unilevel");
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->model("points_model", "obj_points");
        $this->load->model("contra_entrega_model", "obj_contra_entrega");
        
    }

    public function index() {
        $this->get_session();
        //GET CUSTOMER_ID
        $kid_id = $_SESSION['customer']['kit_id'];
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category_catalogo = $this->nav_cursos();

        /*if (isset($_GET['orderby'])) {
            $type = $_GET['orderby'];

            switch ($type) {
                case 'date':
                    $order = "catalog.date DESC";
                    break;
                case 'price':
                    $order = "catalog.price ASC";
                    break;
                case 'price-desc':
                    $order = "catalog.price DESC";
                    break;
                default:
                    $order = "catalog.catalog_id ASC";
                    break;
            }
        } else {
            $order = "catalog.catalog_id DESC";
        }*/

        if (isset($_GET['search'])) {
            $word = $_GET['search'];
            $where = "courses.name like '%$word%' and courses.active = 1";
        } else {
            $where = "courses.active = 1";
        }
        $category_name = "Todos los Cursos";
        //get catalog
        $params = array( 
            "select" => "courses.course_id,
                         courses.name,
                         courses.slug,
                         category.category_id,
                         category.slug as category_slug,
                         courses.description,
                         courses.img,
                         courses.price,
                         courses.price_del,
                         courses.free,
                         courses.duration,
                         courses.active,
                         courses.date",
            "join" => array('category, category.category_id = courses.category_id'),
            "where" => "$where");
        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("backoffice/cursos");
        $config["total_rows"] = $this->obj_courses->total_records($params);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 3;

        $config['first_tag_open'] = '<li class="paginate_button page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_button page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="paginate_button page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open']= '<li class="page-item active"><span aria-current="page" class="page-link page-numbers current">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="paginate_button page-item">';
        $config['next_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li class="paginate_button page-item">';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $obj_pagination = $this->pagination->create_links();
        /// DATA
        $obj_courses = $this->obj_courses->search_data($params, $config["per_page"], $this->uri->segment(3));
        //GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //total comission compra
        $obj_total_compra = $this->total_comissions($customer_id);
        $total_compra = $obj_total_compra->total_disponible + $obj_total_compra->total_compra;
        //send data
        $url = 'backoffice/cursos';
        $this->tmp_catalog->set("url", $url);
        $this->tmp_catalog->set("total_compra", $total_compra);
        $this->tmp_catalog->set("obj_total_compra", $obj_total_compra);
        $this->tmp_catalog->set("category_name", $category_name);
        $this->tmp_catalog->set("obj_pagination", $obj_pagination);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_profile", $obj_profile);
        $this->tmp_catalog->set("obj_courses", $obj_courses);
        $this->tmp_catalog->render("backoffice/b_cursos");
    }

    public function category($category)
	{   
            //GET CUSTOMER_ID
            $customer_id = $_SESSION['customer']['customer_id'];
            //GET NAV CURSOS
            $obj_category_catalogo = $this->nav_cursos();
            //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id,
                                    name,
                                    slug",
                "where" => "slug like '%$category%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            $slug = $obj_category->slug;
            $category_name = "Cursos - ".$obj_category->name;
             //get catalog
            $params = array(
                "select" => "courses.course_id,
                            courses.name,
                            courses.slug,
                            category.category_id,
                            category.name as category_name,
                            category.slug as category_slug,
                            courses.description,
                            courses.img,
                            courses.price,
                            courses.price_del,
                            courses.free,
                            courses.duration,
                            courses.active,
                            courses.date",
                "join" => array('category, category.category_id = courses.category_id'), 
                "where" => "courses.category_id = $category_id and courses.active = 1");
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("backoffice/cursos/$slug"); 
            $config["total_rows"] = $this->obj_courses->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 4;   
            
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';            
            $config['num_tag_open']='<li>';
            $config['num_tag_close'] = '</li>';            
            $config['cur_tag_open']= '<li class="page-item active"><span aria-current="page" class="page-link page-numbers current">';
            $config['cur_tag_close']= '</span></li>';            
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';            
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);        
            $obj_pagination = $this->pagination->create_links();
            /// DATA
            $obj_courses = $this->obj_courses->search_data($params, $config["per_page"],$this->uri->segment(4));
            //GET DATA FROM CUSTOMER
            $obj_profile = $this->get_profile($customer_id);
            //total comission compra
            $obj_total_compra = $this->total_comissions($customer_id);
            $total_compra = $obj_total_compra->total_disponible + $obj_total_compra->total_compra;
            //SEND DATA
            $url = 'backoffice/cursos';
            $this->tmp_catalog->set("url",$url);    
            $this->tmp_catalog->set("total_compra",$total_compra);    
            $this->tmp_catalog->set("category_name",$category_name);
            $this->tmp_catalog->set("obj_pagination",$obj_pagination);
            $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
            $this->tmp_catalog->set("obj_courses",$obj_courses);
            $this->tmp_catalog->render("backoffice/b_cursos");
	}
    
    public function detail($slug)
	{   
            //GET CUSTOMER_ID
            $kid_id = $_SESSION['customer']['kit_id'];
            //GET CUSTOMER_ID
            $customer_id = $_SESSION['customer']['customer_id'];
            //GET NAV CURSOS
            $obj_category_catalogo = $this->nav_cursos();
            $url = explode("/",uri_string());
            //get course_id
            $category_slug = $url[2];
            //get course_id
            $course_id = $url[3];
             //get course
             $params = array( 
                "select" => "courses.course_id,
                             courses.name,
                             courses.slug,
                             category.category_id,
                             category.name as category_name,
                             category.slug as category_slug,
                             courses.description,
                             courses.img,
                             courses.price,
                             courses.price_del,
                             courses.free,
                             courses.duration,
                             courses.active,
                             courses.date",
                "join" => array('category, category.category_id = courses.category_id'),
                "where" => "courses.course_id = $course_id");
            $obj_courses = $this->obj_courses->get_search_row($params);
            //get catalog
            $params = array(
                "select" => "courses.course_id,
                            courses.name,
                            courses.slug,
                            category.category_id,
                            category.name as category_name,
                            category.slug as category_slug,
                            courses.img,
                            courses.price,
                            courses.price_del,
                            courses.free,
                            courses.active,
                            courses.date",
                "join" => array( 'category, category.category_id = courses.category_id'),
                "where" => "category.slug = '$category_slug' and courses.active = 1",
                "order" => "courses.course_id DESC",
                "limit" => "3");
            $obj_courses_all = $this->obj_courses->search($params);
            //GET DATA FROM CUSTOMER
            $obj_profile = $this->get_profile($customer_id);
            //total comission compra
            $obj_total_compra = $this->total_comissions($customer_id);
            $total_compra = $obj_total_compra->total_disponible + $obj_total_compra->total_compra;
            //SEND DATA
            $this->tmp_catalog->set("obj_profile",$obj_profile);
            $this->tmp_catalog->set("total_compra",$total_compra);
            $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
            $this->tmp_catalog->set("obj_courses_all",$obj_courses_all);
            $this->tmp_catalog->set("obj_courses",$obj_courses);
            $this->tmp_catalog->render("backoffice/b_cursos_detail");
	}


    public function nav_cursos() {
        $params_category_catalogo = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 3 and active = 1",
        );
        //GET DATA COMMENTS
        return $obj_category_catalogo = $this->obj_category->search($params_category_catalogo);
    }


    public function total_comissions($customer_id) {
        //GET TOTAL COMMISION
        $params = array(
            "select" => "sum(amount) as total_comissions,
                            (select sum(amount) FROM commissions WHERE customer_id = $customer_id AND compras != 1 and active = 1 and status_value = 1) as total_disponible,
                            (select sum(amount) FROM commissions WHERE customer_id = $customer_id AND compras = 1 and status_value = 1) as total_compra",
            "where" => "customer_id = $customer_id and status_value = 1 and pago != 1");
        //GET DATA FROM CUSTOMER
        $obj_total_commissions = $this->obj_commissions->get_search_row($params);
        return $obj_total_commissions;
    }

    public function get_profile($customer_id) {
        $params_profile = array(
            "select" => "customer.customer_id,
                                    customer.first_name,
                                    customer.username,
                                    customer.last_name,
                                    customer.img,
                                    customer.active_month,
                                    customer.active,
                                    ",
            "where" => "customer.customer_id = $customer_id"
        );
        //GET DATA COMMENTS
        return $obj_customer = $this->obj_customer->get_search_row($params_profile);
    }


    public function get_session() {
        if (isset($_SESSION['customer'])) {
            if ($_SESSION['customer']['logged_customer'] == "TRUE" && $_SESSION['customer']['status'] == '1') {
                return true;
            } else {
                redirect(site_url() . 'home');
            }
        } else {
            redirect(site_url() . 'home');
        }
    }

}
