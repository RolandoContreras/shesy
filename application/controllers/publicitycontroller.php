<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
class PublicityController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("category_model", "obj_category");
        $this->load->model("publicity_model", "obj_publicity_courses");
        $this->load->model("publicity_catalog_model", "obj_publicity_catalog");
    }

    public function index() {
        //get session customer
        get_session_customer();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category_catalogo = $this->nav_cursos();
        //get data campañas videos
        $obj_publicity_courses = $this->get_all_publicity_course($customer_id);
        //get data campañas catalog
        $obj_publicity_catalog = $this->get_all_publicity_catalog($customer_id);
        //GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //send data
        $this->tmp_publicity->set("obj_profile", $obj_profile);
        $this->tmp_publicity->set("obj_publicity_courses", $obj_publicity_courses);
        $this->tmp_publicity->set("obj_publicity_catalog", $obj_publicity_catalog);
        $this->tmp_publicity->render("publicity/index");
    }

    
    public function new_campana(){   
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //send data
        $this->tmp_publicity->set("obj_profile", $obj_profile);
        $this->tmp_publicity->render("publicity/new_publicity");
	}


    public function save_campana(){  
        if ($this->input->is_ajax_request()) {
            //get publicity catalog by customer
            $customer_id = $_SESSION['customer']['customer_id'];
            $id = $this->input->post("id");
            $type = $this->input->post("type");
            //condition
            if($type == false){
                $type = $this->input->post("type_2");
            }
            if($type == 1){
                //insert on publicity course
                if($id != null){
                    $param = array(
                        'course_id' => $this->input->post("campana"),
                        'name' => $this->input->post("name"),
                        'pexel' => $this->input->post("pexel"),
                    ); 
                    $id = $this->obj_publicity_courses->update($id, $param);
                }else{
                    $param = array(
                        'customer_id' => $customer_id,
                        'course_id' => $this->input->post("campana"),
                        'name' => $this->input->post("name"),
                        'pexel' => $this->input->post("pexel"),
                        'total_view' => 0,
                        'total_sell' => 0,
                        'date' => date("Y-m-d"),
                        'status' => 1,
                    ); 
                    $id = $this->obj_publicity_courses->insert($param);
                }
                if($id != null){
                    $data['status'] = true;    
                }else{
                    $data['status'] = false;    
                }
            }else{
                //insert on publicity course
                if($id != null){
                    $param = array(
                        'catalog_id' => $this->input->post("campana"),
                        'name' => $this->input->post("name"),
                        'pexel' => $this->input->post("pexel"),
                    ); 
                    $id = $this->obj_publicity_catalog->update($id, $param);
                }else{
                    $param = array(
                        'customer_id' => $customer_id,
                        'catalog_id' => $this->input->post("campana"),
                        'name' => $this->input->post("name"),
                        'pexel' => $this->input->post("pexel"),
                        'total_view' => 0,
                        'total_sell' => 0,
                        'date' => date("Y-m-d"),
                        'status' => 1,
                    ); 
                    $id = $this->obj_publicity_catalog->insert($param);
                }
                //insert on publicity catalog
               
                if($id != null){
                    $data['status'] = true;    
                }else{
                    $data['status'] = false;    
                }
            }
            echo json_encode($data);
        }
	}

    public function edit_course($id=null){ 
        //GET PUBLICITY COURSE ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA FROM CUSTOMER
        if($id != null){
            $obj_publicity = $this->get_publicity_course_id($id);
            //get all camapañas
            $obj_campana_type = $this->get_courses();
            $type = 1;
            $this->tmp_publicity->set("obj_publicity", $obj_publicity);
            $this->tmp_publicity->set("obj_campana_type", $obj_campana_type);
            $this->tmp_publicity->set("type", $type);
        }
        $obj_profile = $this->get_profile($customer_id);
        //send data
        $this->tmp_publicity->set("obj_profile", $obj_profile);
        $this->tmp_publicity->render("publicity/new_publicity");
    }
    
    public function edit_catalog($id=null){ 
        //GET PUBLICITY COURSE ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA FROM CUSTOMER
        if($id != null){
            $obj_publicity = $this->get_publicity_catalog_id($id);
            //get all camapañas
            $obj_campana_type = $this->get_catalog();
            $type = 2;
            $this->tmp_publicity->set("obj_publicity", $obj_publicity);
            $this->tmp_publicity->set("obj_campana_type", $obj_campana_type);
            $this->tmp_publicity->set("type", $type);
        }
        $obj_profile = $this->get_profile($customer_id);
        //send data
        $this->tmp_publicity->set("obj_profile", $obj_profile);
        $this->tmp_publicity->render("publicity/new_publicity");
    }

    public function delete_course(){   
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $id = $this->input->post("id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($id != "") {
                $result = $this->obj_publicity_courses->delete($id);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
        }
	}  

    public function delete_catalog(){   
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $id = $this->input->post("id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($id != "") {
                $result = $this->obj_publicity_catalog->delete($id);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
        }
	}  

    public function get_publicity_course_id($id){   
        $params = array( 
            "select" => "publicity.id,
                         publicity.pexel,
                         publicity.course_id,
                         publicity.name",
            "where" => "id = $id");
         $obj_publicity_courses = $this->obj_publicity_courses->get_search_row($params);
         return $obj_publicity_courses; 
	}  

    public function get_publicity_catalog_id($id){   
        $params = array( 
            "select" => "id,
                         pexel,
                         catalog_id,
                         name",
            "where" => "id = $id");
         $obj_publicity_catalog = $this->obj_publicity_catalog->get_search_row($params);
         return $obj_publicity_catalog; 
	}  

    public function get_all_publicity_course($customer_id){   
        $params = array( 
            "select" => "publicity.id,
                         publicity.pexel,
                         publicity.name,
                         publicity.total_view,
                         publicity.total_sell,
                         publicity.date,
                         publicity.status,
                         category.name as category_name,
                         category.slug as category_slug,
                         courses.name as course_name,
                         courses.slug as course_slug,
                         courses.course_id as course_id
                         ",
            "join" => array('customer, publicity.customer_id = customer.customer_id',
                            'courses, publicity.course_id = courses.course_id',
                            'category, category.category_id = courses.category_id'),
            "where" => "publicity.customer_id = $customer_id",
            "order" => "publicity.id DESC");
         $obj_publicity_courses = $this->obj_publicity_courses->search($params);
         return $obj_publicity_courses; 
	}   
        
    public function get_all_publicity_catalog($customer_id){   
        //get publicity catalog by customer
        $params = array( 
            "select" => "publicity_catalog.id,
                         publicity_catalog.name,
                         publicity_catalog.total_view,
                         publicity_catalog.total_sell,
                         publicity_catalog.date,
                         publicity_catalog.status,
                         category.name as category_name,
                         category.slug as category_slug,
                         catalog.name as catalog_name,
                         catalog.slug as catalog_slug,
                         catalog.catalog_id as catalog_id
                         ",
            "join" => array('customer, publicity_catalog.customer_id = customer.customer_id',
                            'catalog, publicity_catalog.catalog_id = catalog.catalog_id',
                            'category, category.category_id = catalog.category_id'),
            "where" => "publicity_catalog.customer_id = $customer_id",
            "order" => "publicity_catalog.id DESC");
        $obj_publicity_catalog = $this->obj_publicity_catalog->search($params);;
        return $obj_publicity_catalog; 
	}

    public function get_campana(){  
        if ($this->input->is_ajax_request()) {
            //get publicity catalog by customer
            $type = $this->input->post("type");
            if($type == 1){
                //get all course
                $obj_courses = $this->get_courses();
                //save data
                $data['status'] = true;
                $data['obj_data'] = $obj_courses;
            }else{
                //get all catalog
                $obj_catalog = $this->get_catalog();
                //save data
                $data['status'] = true;
                $data['obj_data'] = $obj_catalog;
            }
            echo json_encode($data);
        }
	}
    
    public function get_courses(){  
        //get all course
        $params = array( 
            "select" => "course_id as id,
                        name",
            "where" => "active = 1",
            "order" => "name ASC");
        $obj_courses = $this->obj_courses->search($params);
        return $obj_courses;
	}

    public function get_catalog(){  
        //get all course
        $params = array( 
            "select" => "catalog_id as id,
                        name",
            "where" => "active = 1",
            "order" => "name ASC");
        $obj_catalog = $this->obj_catalog->search($params);
        return $obj_catalog;
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

    public function mis_cursos()
	{   
            //get customer id
            $customer_id = $_SESSION['customer']['customer_id'];
            //get cursos comprados
            $obj_courses_by_customer = $this->courses_by_customer($customer_id);
            //GET DATA FROM CUSTOMER
            $obj_profile = $this->get_profile($customer_id);
            //GET NAV CURSOS
            $obj_category_catalogo = $this->nav_cursos();
            //total comission compra
            $obj_total_compra = $this->total_comissions($customer_id);
            $total_compra = $obj_total_compra->total_disponible + $obj_total_compra->total_compra;
            //SEND DATA
            $this->tmp_catalog->set("obj_profile",$obj_profile);
            $this->tmp_catalog->set("total_compra",$total_compra);
            $this->tmp_catalog->set("obj_courses_by_customer", $obj_courses_by_customer);
            $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
            $this->tmp_catalog->render("backoffice/b_mis_cursos");
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
            //set url sell
            $url =  site_url()."cursosporhoy/$obj_courses->category_slug/$obj_courses->slug?d=$customer_id";    
            //SEND DATA
            $this->tmp_catalog->set("obj_profile",$obj_profile);
            $this->tmp_catalog->set("total_compra",$total_compra);
            $this->tmp_catalog->set("obj_category_catalogo",$obj_category_catalogo);
            $this->tmp_catalog->set("obj_courses_all",$obj_courses_all);
            $this->tmp_catalog->set("obj_courses",$obj_courses);
            $this->tmp_catalog->set("url",$url);
            $this->tmp_catalog->render("backoffice/b_cursos_detail");
	}

    public function pay_order() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get nav ctalogo
        $obj_category_catalogo = $this->nav_cursos();
        //Type 1 = pagos de membresia
        //Type 2 = pagos de catalogo
        //Type 3 = pagos de cursos
        $params = array(
            "select" => "invoices.invoice_id,
                                    invoices.type,
                                    invoices.date,
                                    invoices.total,
                                    invoices.active,
                                    customer.first_name,
                                    customer.last_name,",
            "where" => "invoices.customer_id = $customer_id and invoices.type = 3 and invoices.status_value = 1",
            "join" => array('customer, customer.customer_id = invoices.customer_id'),
        );
        $obj_invoices = $this->obj_invoices->search($params);
        ////GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //get curso hotlink
        foreach ($this->cart->contents() as $items){
            $course_id = $items['id'];
        } 
        if($course_id != ""){
            $params = array(
                "select" => "hot_link,
                             price",
                "where" => "course_id = $course_id"
            );
            $obj_courses = $this->obj_courses->get_search_row($params);
            $this->tmp_catalog->set("obj_courses", $obj_courses);
        }
        //total commission compra
        $obj_total_compra = $this->total_comissions($customer_id);
        $total_compra = $obj_total_compra->total_disponible + $obj_total_compra->total_compra;
        //send data
        $this->tmp_catalog->set("obj_total_compra", $obj_total_compra);
        $this->tmp_catalog->set("total_compra", $total_compra);
        $this->tmp_catalog->set("obj_profile", $obj_profile);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->render("backoffice/b_cursos_pay_order");
    }

    public function add_cart() {
        if ($this->input->is_ajax_request()) {
            //GET SESION ACTUALY
            $this->get_session();
            //GET CUSTOMER_ID
            $price = $this->input->post('price');
            $course_id = $this->input->post('course_id');
            $quantity = $this->input->post('quantity');
            $name = $this->input->post('name');
            $slug_ame = convert_slug($name);
            //ADD CART
            $data_param = array(
                'id' => $course_id,
                'qty' => $quantity,
                'price' => $price,
                'name' => "$slug_ame"
            );
            $cart_id = $this->cart->insert($data_param);
            if (isset($cart_id) != "") {
                $data['status'] = "true";
                $data['url'] = site_url() . "backoffice/cursos/pay_order";
            } else {
                $data['status'] = "false";
            }
            echo json_encode($data);
        }
    }

    public function update_cart() {
        if ($this->input->is_ajax_request()) {
            //GET SESION ACTUALY
            $this->get_session();
            //GET CUSTOMER_ID
            $qty = $this->input->post('qty');
            $id = $this->input->post('id');
            //UPDATE CART
            $data = array(
                'rowid' => "$id",
                'qty' => $qty
            );
            $this->obj_invoices->update($invoice_id, $data);
            $data['status'] = true;
            echo json_encode($data);
        }
    }

    public function delete_cart() {

        if ($this->input->is_ajax_request()) {
            //GET SESION ACTUALY
            $this->get_session();
            //GET CUSTOMER_ID

            $id = $this->input->post('id');
            //UPDATE CART
            $data = array(
                'rowid' => "$id",
                'qty' => 0
            );
            $this->cart->update($data);
            $data['status'] = "true";
            echo json_encode($data);
        }
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

    public function courses_by_customer($customer_id) {
        $params_customer_courses = array(
            "select" => "customer_courses.customer_course_id,
                            customer_courses.duration_time,
                                                customer_courses.date_start,
                                                courses.course_id,
                                                courses.category_id,
                                                courses.name,
                                                courses.duration,
                                                courses.free,
                                                courses.slug,
                                                courses.img,
                                                customer_courses.total_video,
                                                customer_courses.certificate,
                                                customer_courses.complete,
                                                customer_courses.total,
                                                customer_courses.quiz_complete,
                                                customer_courses.quiz,
                                                courses.price,
                                                courses.price_del,
                                                courses.date,
                                                customer.customer_id,
                                                category.slug as category_slug,
                                                category.name as category_name",
            "join" => array('customer, customer_courses.customer_id = customer.customer_id',
                'courses, customer_courses.course_id = courses.course_id',
                'category, courses.category_id = category.category_id'),
            "where" => "customer.customer_id = $customer_id",
            "order" => "courses.course_id DESC",
        );
        return $obj_customer_courses = $this->obj_customer_courses->search($params_customer_courses);
    }

    

}
