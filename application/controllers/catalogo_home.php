<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("catalog_model","obj_catalog");
        $this->load->model("category_model","obj_category");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("invoice_catalog_model","obj_invoice_catalog");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $kid_id = $_SESSION['customer']['kit_id'];
        //GET NAV CURSOS
        $obj_category_catalogo = $this->nav_catalogo();
        
        if($kid_id > 0){
            $where = "catalog.active = 1";
        }else{
            $where = "catalog.active = 1";
        }
        
        $category_name = "Todos los Productos";
        
         //get catalog
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.summary,
                                    catalog.description,
                                    catalog.price,
                                    catalog.img,
                                    catalog.date,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
                "join" => array( 'category, category.category_id = catalog.category_id'),
                "where" => $where,
                "order" => "catalog.catalog_id DESC");
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("catalogo"); 
            $config["total_rows"] = $this->obj_catalog->total_records($params);  
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
            $obj_catalog = $this->obj_catalog->search_data($params, $config["per_page"],$this->uri->segment(2));
        //GET DATA FROM CUSTOMER
        
        $this->tmp_catalog->set("category_name",$category_name);
        $this->tmp_catalog->set("obj_pagination",$obj_pagination);
        $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
        $this->tmp_catalog->set("obj_catalog",$obj_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_home");
    }
    
    public function category($category)
	{
            //GET NAV CURSOS
            $obj_category_catalogo = $this->nav_catalogo();
            
            //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id,
                                    name",
                "where" => "slug like '%$category%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
            $category_name = "Productos - ".$obj_category->name;
            
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.summary,
                                    catalog.description,
                                    catalog.price,
                                    catalog.img,
                                    catalog.date,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
                "join" => array( 'category, category.category_id = catalog.category_id'),
                "where" => "catalog.category_id = $category_id and catalog.active = 1",
                "order" => "catalog.catalog_id DESC");
            
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("catalogo/$category"); 
            $config["total_rows"] = $this->obj_catalog->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 3;   
            
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
            $obj_catalog = $this->obj_catalog->search_data($params, $config["per_page"],$this->uri->segment(2));
            //send total row
            
            //SEND DATA
            $this->tmp_catalog->set("category_name",$category_name);
            $this->tmp_catalog->set("obj_pagination",$obj_pagination);
            $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
            $this->tmp_catalog->set("obj_catalog",$obj_catalog);
            $this->tmp_catalog->render("catalogo/catalogo_home");
	}
    
    public function detail($slug)
	{
            
            //get nav cursos
            $obj_category_catalogo = $this->nav_catalogo();
             
             //get data catalog
            $params_categogory_id = array(
                        "select" =>"category_id",
                "where" => "slug like '%$slug%'");
            $obj_category = $this->obj_category->get_search_row($params_categogory_id);
            $category_id = $obj_category->category_id;
             
            $url = explode("/",uri_string());
            $slug_2 = $url[2];
            
             //get catalog
            $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.summary,
                                    catalog.description,
                                    catalog.price,
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.date,
                                    catalog.active,
                                    category.slug as category_slug,
                                    category.name as category_name",
                "join" => array( 'category, category.category_id = catalog.category_id'),
                "where" => "catalog.slug = '$slug_2' and catalog.category_id = $category_id and catalog.active = 1");
            $obj_catalog = $this->obj_catalog->get_search_row($params);

            
             $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.summary,
                                    catalog.description,
                                    catalog.price,
                                    catalog.img,
                                    catalog.date,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
                "join" => array( 'category, category.category_id = catalog.category_id'),
                "where" => "catalog.category_id = $category_id and catalog.active = 1",
                "order" => "rand()",
                "limit" => "6");
            $obj_catalog_all = $this->obj_catalog->search($params);
            //SEND DATA
            
            $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
            $this->tmp_catalog->set("obj_catalog_all",$obj_catalog_all);
            $this->tmp_catalog->set("obj_catalog",$obj_catalog);
            $this->tmp_catalog->render("catalogo/catalogo_detail");
	}
    
    
    public function order()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        
        //get nav ctalogo
        $obj_category_catalogo = $this->nav_catalogo();
        
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.type,
                                    invoices.date,
                                    invoices.total,
                                    invoices.active,
                                    customer.first_name,
                                    customer.last_name,",
                        "where" => "invoices.customer_id = $customer_id and invoices.type = 2 and invoices.status_value = 1",
                        "join" => array('customer, customer.customer_id = invoices.customer_id'),
                        );

        $obj_invoices = $this->obj_invoices->search($params);
        
        $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
        $this->tmp_catalog->set("obj_invoices",$obj_invoices);
        $this->tmp_catalog->render("catalogo/catalogo_order");
    }
    
    public function order_detail($invoice_id)
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        
        //get nav ctalogo
        $obj_category_catalogo = $this->nav_catalogo();
        
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"invoice_catalog.quantity,
                                    invoice_catalog.date,
                                    invoice_catalog.sub_total,
                                    catalog.name,
                                    catalog.price",
                        "where" => "invoice_catalog.invoice_id = $invoice_id",
                        "join" => array('catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
                        );

        $obj_invoice_catalog = $this->obj_invoice_catalog->search($params);
        
        $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
        $this->tmp_catalog->set("obj_invoice_catalog",$obj_invoice_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_order_detail");
    }
    
     public function nav_catalogo(){
            $params_category_catalogo = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "type = 2 and active = 1",
            );
            //GET DATA COMMENTS
            return $obj_category_catalogo = $this->obj_category->search($params_category_catalogo);
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
