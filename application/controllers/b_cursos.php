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
        $this->load->model("customer_courses_model", "obj_customer_courses");
        $this->load->model("industry_model", "obj_industry");
        $this->load->model("sub_industry_model", "obj_sub_industry");
    }

    public function index() {
        $this->get_session();
        //GET CUSTOMER_ID
        $kid_id = $_SESSION['customer']['kit_id'];
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        //$obj_category_catalogo = $this->nav_cursos();
        $obj_category_catalogo = $this->nav_industry(2);
        $obj_sub_category = $this->nav_sub_industry($obj_category_catalogo);

        if (isset($_GET['orderby'])) {
            $type = $_GET['orderby'];

            switch ($type) {
                case 'date':
                    $order = "courses.date DESC";
                    break;
                case 'price':
                    $order = "courses.price ASC";
                    break;
                case 'price-desc':
                    $order = "courses.price DESC";
                    break;
                default:
                    $order = "courses.course_id ASC";
                    break;
            }
        } else {
            $order = "courses.course_id DESC";
        }

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
            "where" => "$where",
            "order" => "$order");
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
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_profile", $obj_profile);
        $this->tmp_catalog->set("obj_courses", $obj_courses);
        $this->tmp_catalog->render("backoffice/b_cursos");
    }

    public function sub_category($slug)
	{   

        $url = explode("/", uri_string());
        if (isset($url[3])) {
            $slug_sub_industry = $url[3];
        }
            //GET CUSTOMER_ID
            $customer_id = $_SESSION['customer']['customer_id'];
            //GET NAV CURSOS
            $obj_category_catalogo = $this->nav_industry(2);
            $obj_sub_category = $this->nav_sub_industry($obj_category_catalogo);
            //get data course
            $params = array(
                        "select" =>"id,
                                    name,
                                    slug",
                "where" => "slug = '$slug'");
            $obj_industry = $this->obj_industry->get_search_row($params);
            $industry_id = $obj_industry->id;
            $slug = $obj_industry->slug;
            $category_name = "Cursos - ".$obj_industry->name;
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
                "join" => array('category, category.category_id = courses.category_id',
                                'sub_industry, courses.sub_industry_id = sub_industry.id'), 
                "where" => "sub_industry.industry_id = '$industry_id' and sub_industry.slug = '$slug_sub_industry' and courses.active = 1");
             /// PAGINADO
            $config=array();
            $config["base_url"] = site_url("backoffice/cursos/$slug/$slug_sub_industry"); 
            $config["total_rows"] = $this->obj_courses->total_records($params);  
            $config["per_page"] = 12; 
            $config["num_links"] = 1;
            $config["uri_segment"] = 5;   
            
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
            $obj_courses = $this->obj_courses->search_data($params, $config["per_page"],$this->uri->segment(5));
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
            $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
            $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
            $this->tmp_catalog->set("obj_pagination",$obj_pagination);
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
            $obj_category_catalogo = $this->nav_industry(2);
            $obj_sub_category = $this->nav_sub_industry($obj_category_catalogo);
            //total comission compra
            $obj_total_compra = $this->total_comissions($customer_id);
            $total_compra = $obj_total_compra->total_disponible + $obj_total_compra->total_compra;
            //SEND DATA
            $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
            $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
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
            $obj_category_catalogo = $this->nav_industry(2);
            $obj_sub_category = $this->nav_sub_industry($obj_category_catalogo);
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
            $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
            $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
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
        $obj_category_catalogo = $this->nav_industry(2);
        $obj_sub_category = $this->nav_sub_industry($obj_category_catalogo);
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
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
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

    public function nav_industry($type) {
        $params = array(
            "select" => "id,
                         slug,
                         name",
            "where" => "type = $type and active = 1",
        );
        //GET DATA COMMENTS
        $obj_industry = $this->obj_industry->search($params);
        return $obj_industry;
    }
    
    public function nav_sub_industry($obj_industry) {
        $ids = null;
        foreach ($obj_industry as $key => $value) {
            $ids .= $value->id.",";
        }
        //GET id type  1
        $ids = substr ($ids, 0, strlen($ids) - 1);
        $params = array(
            "select" => "id,
                         name,
                         industry_id,        
                         slug",
            "where" => "industry_id in ($ids) and active = 1",
        );
        //GET DATA CATALOGO
        $obj_sub_industry = $this->obj_sub_industry->search($params);
        return $obj_sub_industry;
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
