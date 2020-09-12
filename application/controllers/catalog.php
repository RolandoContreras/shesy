<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index($customer = null) {
        
        if(isset($customer)){
            $data_customer_compras['customer_id'] = $customer;
            $_SESSION['compras_customer'] = $data_customer_compras;
        }
        //GET NAV
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        if (isset($_GET['orderby'])) {
            $type = $_GET['orderby'];

            switch ($type) {
                case 'menu_order':
                    $order = "catalog.catalog_id ASC";
                    break;
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
        }

        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.img,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.active = 1",
            "order" => "$order");

        //send url for search
        $data['url'] = site_url() . 'catalogo';
        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("catalogo");
        $config["total_rows"] = $this->obj_catalog->total_records($params);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 2;

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span aria-current="page" class="page-numbers current">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['obj_pagination'] = $this->pagination->create_links();
        /// DATA
        $data['obj_catalog'] = $this->obj_catalog->search_data($params, $config["per_page"], $this->uri->segment(2));
        //send total row
        $data['total'] = $config["total_rows"];

        //SEND DATA
        $data['title'] = "Catalogo";
        $this->load->view('catalog', $data);
    }

    public function category($category) {
        if (isset($_GET['orderby'])) {
            $type = $_GET['orderby'];

            switch ($type) {
                case 'menu_order':
                    $order = "catalog.catalog_id ASC";
                    break;
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
        }
        
        //GET NAV
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();


        //SEND URL FOR SEARCH
        $data['url'] = site_url() . 'catalog/' . $category;

        //get data catalog
        $params_categogory_id = array(
            "select" => "category_id,name",
            "where" => "slug like '%$category%'");
        $obj_category = $this->obj_category->get_search_row($params_categogory_id);
        $category_id = $obj_category->category_id;

        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.img,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.category_id = $category_id and catalog.active = 1",
            "order" => "$order");

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("catalog/$category");
        $config["total_rows"] = $this->obj_catalog->total_records($params);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 3;

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span aria-current="page" class="page-numbers current">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['obj_pagination'] = $this->pagination->create_links();
        /// DATA
        $data['obj_catalog'] = $this->obj_catalog->search_data($params, $config["per_page"], $this->uri->segment(3));
        //send total row
        $data['total'] = $config["total_rows"];
        //send meta title
        $data['title'] = "Catalogo | $obj_category->name";
        /// VISTA
        $this->load->view('catalog', $data);
    }

    public function sub_category($category) {
        $url = explode("/", uri_string());
        $sub_category = $url[2];
        //GET NAV
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        $data['obj_sub_category'] = $this->nav_sub_category();
        //SEND URL FOR SEARCH
        $data['url'] = site_url() . 'catalog/' . $category;

        //get data catalog
        $params_sub_categogory = array(
            "select" => "sub_category_id,
                         name",
            "where" => "slug like '%$sub_category%'");
        $obj_sub_category = $this->obj_sub_category->get_search_row($params_sub_categogory);
        $sub_category_id = $obj_sub_category->sub_category_id;
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                        catalog.summary,
                        catalog.name,
                        catalog.slug,
                        catalog.price,
                        catalog.img,
                        catalog.active,
                        category.slug as category_slug,
                        catalog.date",
            "join" => array('category, category.category_id = catalog.category_id',
                            'sub_category, sub_category.sub_category_id = catalog.sub_category_id'),
            "where" => "catalog.sub_category_id = $sub_category_id and catalog.active = 1",
            "order" => "catalog.catalog_id DESC");
        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("catalog/$category/$sub_category");
        $config["total_rows"] = $this->obj_catalog->total_records($params);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 3;

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span aria-current="page" class="page-numbers current">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['obj_pagination'] = $this->pagination->create_links();
        /// DATA
        $data['obj_catalog'] = $this->obj_catalog->search_data($params, $config["per_page"], $this->uri->segment(3));
        //send total row
        $data['total'] = $config["total_rows"];
        //send meta title
        $data['title'] = "Catalogo | $category | $obj_sub_category->name";
        /// VISTA
        $this->load->view('catalog', $data);
    }

    public function nav_sub_category() {
        $params = array(
            "select" => "name,
                         category_id,        
                         slug",
            "where" => "active = 1",
        );
        //GET DATA CATALOGO
        return $obj_sub_category = $this->obj_sub_category->search($params);
    }

    public function detail($slug) {
        //GET NAV
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        
        $url = explode("/", uri_string());
        $catalog_id = $url[2];
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.stock,
                                    catalog.slug,
                                    catalog.granel,
                                    catalog.price,
                                    catalog.description,
                                    category.name as category_name,
                                    category.slug as category_slug,
                                    catalog.img,
                                    catalog.active,
                                    catalog.date",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.catalog_id = $catalog_id");
        $data['obj_catalog'] = $this->obj_catalog->get_search_row($params);
        $obj_catalog_meta = $data['obj_catalog'];

        //get catalog relacionado
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.price,
                                    catalog.img,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "category.slug = '$slug' and catalog.active = 1",
            "order" => "rand()",
            "limit" => "2");

        $data['obj_catalog_rand'] = $this->obj_catalog->search($params);
        //send meta title
        $data['title'] = "Catalogo | $obj_catalog_meta->category_name | $obj_catalog_meta->name";
        $this->load->view('catalog_detail', $data);
    }

    public function add_cart() {

        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $price = $this->input->post('price');
            $catalog_id = $this->input->post('catalog_id');
            $name = $this->input->post('name');
            //ADD CART
                $data = array(
                    'id' => $catalog_id,
                    'qty' => 1,
                    'price' => $price,
                    'name' => "$name",
                );
                $cart_id = $this->cart->insert($data);
                if ($cart_id != "") {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            echo json_encode($data);
        }
    }
    
    public function add_cart_referencia() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $price = $this->input->post('price');
            $catalog_id = $this->input->post('catalog_id');
            $name = $this->input->post('name');
            $img = $this->input->post('img');
            $quantity = $this->input->post('quantity');
            $talla = $this->input->post('talla');
            $color = $this->input->post('color');
            //ADD CART
                $data = array(
                    'id' => $catalog_id,
                    'qty' => $quantity,
                    'price' => $price,
                    'img' => $img,
                    'name' => "$name",
                    'options' => array('Talla' => "$talla", 'Color' => "$color")
                );
                $cart_id = $this->cart->insert($data);
                if ($cart_id != "") {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            echo json_encode($data);
        }
    }

    public function nav_videos() {
        $params_category_videos = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 1 and active = 1",
        );
        //GET DATA COMMENTS
        return $obj_category_videos = $this->obj_category->search($params_category_videos);
    }

    public function nav_catalogo() {
        $params_category_catalog = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        //GET DATA CATALOGO
        return $obj_category_catalog = $this->obj_category->search($params_category_catalog);
    }

}
