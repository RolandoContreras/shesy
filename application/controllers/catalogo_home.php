<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo_home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("category_model", "obj_category");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("unilevel_model", "obj_unilevel");
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->model("points_model", "obj_points");
        $this->load->model("contra_entrega_model", "obj_contra_entrega");
        $this->load->model("sub_category_model", "obj_sub_category");
        $this->load->library('culqi');
    }

    public function index() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $kid_id = $_SESSION['customer']['kit_id'];
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();

        if (isset($_GET['orderby'])) {
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
        }

        if ($kid_id > 0) {
            $where = "catalog.active = 1";
        } else {
            $where = "catalog.active = 1";
        }

        $category_name = "Todos los Productos";
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
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
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => $where,
            "order" => "$order");

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("mi_catalogo");
        $config["total_rows"] = $this->obj_catalog->total_records($params);
        $config["per_page"] = 12;
        $config["num_links"] = 1;
        $config["uri_segment"] = 2;

        $config['first_tag_open'] = '<li class="paginate_button page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_button page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="paginate_button page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=" paginate_button page-item"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="paginate_button page-item">';
        $config['next_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li class="paginate_button page-item">';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $obj_pagination = $this->pagination->create_links();
        /// DATA
        $obj_catalog = $this->obj_catalog->search_data($params, $config["per_page"], $this->uri->segment(2));
        //GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //total compra
        $total_compra = $this->total_compra($customer_id);
        $url = 'mi_catalogo';
        $this->tmp_catalog->set("url", $url);
        $this->tmp_catalog->set("total_compra", $total_compra);
        $this->tmp_catalog->set("category_name", $category_name);
        $this->tmp_catalog->set("obj_pagination", $obj_pagination);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_profile",$obj_profile);
        $this->tmp_catalog->set("obj_catalog", $obj_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_home");
    }

    public function category($category) {
        //GET NAV CURSOS
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        if (isset($_GET['orderby'])) {
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
        }

        //get data catalog
        $params_categogory_id = array(
            "select" => "category_id,
                                    name",
            "where" => "slug like '%$category%'");
        $obj_category = $this->obj_category->get_search_row($params_categogory_id);
        $category_id = $obj_category->category_id;
        $category_name = "Productos - " . $obj_category->name;

        $params = array(
            "select" => "catalog.catalog_id,
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
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.category_id = $category_id and catalog.active = 1",
            "order" => "$order");

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("mi_catalogo/$category");
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
        $obj_pagination = $this->pagination->create_links();
        /// DATA
        $obj_catalog = $this->obj_catalog->search_data($params, $config["per_page"], $this->uri->segment(2));
        //GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //total compra
        $total_compra = $this->total_compra($customer_id);
        //SEND DATA
        $url = "mi_catalogo/$category";
        $this->tmp_catalog->set("url", $url);
        $this->tmp_catalog->set("total_compra", $total_compra);
        $this->tmp_catalog->set("obj_profile",$obj_profile);
        $this->tmp_catalog->set("category_name", $category_name);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_pagination", $obj_pagination);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_catalog", $obj_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_home");
    }

    public function sub_category($sub_category) {
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET NAV CURSOS
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();
        
        if (isset($_GET['orderby'])) {
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
        }

        //get data catalog
        $params_sub_categogory = array(
            "select" => "sub_category_id,
                         name",
            "where" => "slug like '%$sub_category%'");
        $obj_sub_category_meta = $this->obj_sub_category->get_search_row($params_sub_categogory);
        $sub_category_id = $obj_sub_category_meta->sub_category_id;
        $category_name = "Productos - " . $obj_sub_category_meta->name;

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
            "order" => $order);

        /// PAGINADO
        $config = array();
        $config["base_url"] = site_url("mi_catalogo/subcategoria/$sub_category");
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
        $obj_pagination = $this->pagination->create_links();
        /// DATA
        $obj_catalog = $this->obj_catalog->search_data($params, $config["per_page"], $this->uri->segment(2));
        ////GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //total compra
        $total_compra = $this->total_compra($customer_id);
        //SEND DATA
        $url = "mi_catalogo/subcategoria/$sub_category";
        $this->tmp_catalog->set("url", $url);
        $this->tmp_catalog->set("total_compra", $total_compra);
        $this->tmp_catalog->set("obj_profile",$obj_profile);
        $this->tmp_catalog->set("category_name", $category_name);
        $this->tmp_catalog->set("obj_pagination", $obj_pagination);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_catalog", $obj_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_home");
    }

    public function detail($slug) {
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get nav cursos
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();
        //get data nav
        $url = explode("/", uri_string());
        $catalog_id = $url[2];
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.summary,
                                    catalog.description,
                                    catalog.granel,
                                    catalog.price,
                                    catalog.img,
                                    catalog.date,
                                    catalog.active,
                                    category.slug as category_slug,
                                    category.name as category_name",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.catalog_id = '$catalog_id' and catalog.active = 1");
        $obj_catalog = $this->obj_catalog->get_search_row($params);

        $params = array(
            "select" => "catalog.catalog_id,
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
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "category.slug = '$slug' and catalog.active = 1",
            "order" => "rand()",
            "limit" => "6");
        $obj_catalog_all = $this->obj_catalog->search($params);
        ////GET DATA FROM CUSTOMER
        $obj_profile = $this->get_profile($customer_id);
        //total compra
        $total_compra = $this->total_compra($customer_id);
        //SEND DATA
        $this->tmp_catalog->set("total_compra", $total_compra);
        $this->tmp_catalog->set("obj_profile",$obj_profile);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_catalog_all", $obj_catalog_all);
        $this->tmp_catalog->set("obj_catalog", $obj_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_detail");
    }

    public function order() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];

        //get nav ctalogo
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();

        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
            "select" => "invoices.invoice_id,
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

        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_invoices", $obj_invoices);
        $this->tmp_catalog->render("catalogo/catalogo_order");
    }

    public function order_detail($invoice_id) {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        //get nav ctalogo
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();

        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
            "select" => "invoices.invoice_id,
                                    invoices.type,
                                    invoices.date,
                                    invoices.total,
                                    invoices.active,
                                    invoices.sub_total,
                                    invoices.igv,
                                    invoices.total,
                                    customer.email,
                                    customer.phone,
                                    customer.address,
                                    customer.first_name,
                                    customer.last_name,",
            "where" => "invoices.invoice_id = $invoice_id and invoices.type = 2 and invoices.status_value = 1",
            "join" => array('customer, customer.customer_id = invoices.customer_id'),
        );

        $obj_invoices = $this->obj_invoices->get_search_row($params);

        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
            "select" => "invoice_catalog.quantity,
                                    invoice_catalog.price,
                                    invoice_catalog.option,
                                    invoice_catalog.sub_total,
                                    invoice_catalog.date,
                                    catalog.name",
            "where" => "invoice_catalog.invoice_id = $invoice_id",
            "join" => array('catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
        );

        $obj_invoice_catalog = $this->obj_invoice_catalog->search($params);

        $this->tmp_catalog->set("obj_invoices", $obj_invoices);
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_invoice_catalog", $obj_invoice_catalog);
        $this->tmp_catalog->render("catalogo/catalogo_order_detail");
    }

    public function pay_order() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get nav ctalogo
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
            "select" => "invoices.invoice_id,
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

        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->set("obj_invoices", $obj_invoices);
        $this->tmp_catalog->render("catalogo/catalogo_pay_order");
    }

    public function contra_entrega() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get nav ctalogo
        $obj_category_catalogo = $this->nav_catalogo();
        $obj_sub_category = $this->nav_sub_category();
        $this->tmp_catalog->set("obj_category_catalogo", $obj_category_catalogo);
        $this->tmp_catalog->set("obj_sub_category", $obj_sub_category);
        $this->tmp_catalog->render("catalogo/catalogo_contra_entrega");
    }

    public function send_invoice() {
        if ($this->input->is_ajax_request()) {
            //GET SESION ACTUALY
            $this->get_session();
            $invoice_id = $this->input->post('invoice_id');
            $customer_id = $_SESSION['customer']['customer_id'];
            if (isset($_FILES["image_file"])) {
                $config['upload_path'] = './static/backoffice/invoice/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                    $data['status'] = "false";
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    $img = $_FILES["image_file"]["name"];
                    // INSERT ON TABLE activation_message
                    //UPDATE DATA EN CUSTOMER TABLE
                    $data = array(
                        'img' => $img,
                        'active' => 1,
                        'updated_by' => $customer_id,
                        'updated_at' => date("Y-m-d H:i:s")
                    );
                    $this->obj_invoices->update($invoice_id, $data);
                    $data['status'] = "true";
                    echo '<div class="alert alert-success" style="text-align: center">Enviado Exitosamente</div>';
                }
            }
            echo json_encode($data);
        }
    }

    public function add_cart() {
        if ($this->input->is_ajax_request()) {
            //GET SESION ACTUALY
            $this->get_session();
            //GET CUSTOMER_ID
            $price = $this->input->post('price');
            $catalog_id = $this->input->post('catalog_id');
            $quantity = $this->input->post('quantity');
            $talla = $this->input->post('talla');
            $color = $this->input->post('color');
            $name = $this->input->post('name');
            //ADD CART
            $data_param = array(
                'id' => $catalog_id,
                'qty' => $quantity,
                'price' => $price,
                'name' => "$name",
                'options' => array('Talla' => "$talla", 'Color' => "$color")
            );
            $cart_id = $this->cart->insert($data_param);

            if (isset($cart_id) != "") {
                $data['status'] = "true";
                $data['url'] = site_url() . "mi_catalogo/pay_order";
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

            $this->cart->update($data);

            $data['status'] = "true";
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

    public function process_pay_invoice() {
        try {
            //GET SESION ACTUALY
            $this->get_session();
            $customer_id = $_SESSION['customer']['customer_id'];
            //SELECT DATA CUSTOMER
            $params_customer = array(
                "select" => "first_name,
                                    last_name,
                                    address,
                                    phone,
                                    active",
                "where" => "customer_id = $customer_id",
            );
            //GET DATA COMMENTS
            $obj_customer = $this->obj_customer->get_search_row($params_customer);
            $active = $obj_customer->active;

            //GET DATA CUSTOMER UNILEVEL
            $params = array(
                "select" => "parend_id,
                                    ident",
                "where" => "customer_id = $customer_id"
            );
            //GET DATA FROM BONUS
            $obj_unilevel = $this->obj_unilevel->get_search_row($params);
            $ident = $obj_unilevel->ident;

            $price_cart = $this->cart->format_number($this->cart->total());
            $price = $this->input->post('price');
            $token = $this->input->post('token');
            $email = $this->input->post('email');
            //make charged
            $charge = $this->culqi->charge($token, $price, $email, $obj_customer->first_name, $obj_customer->last_name, $obj_customer->address, $obj_customer->phone);

            $price_cart = explode(".", $price_cart);
            $price = $price_cart[0];
            $price = quitar_coma_number($price);
            //INSERT INVOICE
            $data_invoice = array(
                'customer_id' => $customer_id,
                'sub_total' => $price,
                'igv' => 0,
                'total' => $price,
                'type' => 2,
                'delivery' => 1,
                'date' => date("Y-m-d H:i:s"),
                'active' => 2,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $customer_id,
            );
            $invoce_id = $this->obj_invoices->insert($data_invoice);
            //INSERT INVOICE CATALOG

            $option = "";
            foreach ($this->cart->contents() as $items) {
                if ($this->cart->has_options($items['rowid']) == TRUE) {
                    foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
                        $option .= "$option_name" . ":" . "$option_value" . "&nbsp;";
                    }
                }

                $data_invoice_catalog = array(
                    'invoice_id' => $invoce_id,
                    'catalog_id' => $items['id'],
                    'price' => $items['price'],
                    'quantity' => $items['qty'],
                    'option' => $option,
                    'quantity' => $items['qty'],
                    'sub_total' => $items['subtotal'],
                    'date' => date("Y-m-d H:i:s")
                );
                $this->obj_invoice_catalog->insert($data_invoice_catalog);
                //insert comission by catalog if customer is active
                if ($active == 1) {
                    //insert comission and points
                    $this->pay_unilevel($ident, $invoce_id, $items['id'], $customer_id, $items['qty']);
                }
            }
            //DESTROY CART
            $this->cart->destroy();
            // Respuesta
            echo json_encode($charge);
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function procesar_contra_entrega() {
        //GET SESION ACTUALY
        $this->get_session();
        //get customer
        $customer_id = $_SESSION['customer']['customer_id'];
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $reference = $this->input->post('reference');
        //conver_price_database
        $price_cart = $this->cart->format_number($this->cart->total());
        $price_cart = explode(".", $price_cart);
        $price = $price_cart[0];
        $price = quitar_coma_number($price);
        //INSERT INVOICE
        $data_invoice = array(
            'customer_id' => $customer_id,
            'sub_total' => $price,
            'igv' => 0,
            'total' => $price,
            'type' => 2,
            'delivery' => 0,
            'date' => date("Y-m-d H:i:s"),
            'active' => 1,
            'status_value' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $customer_id,
        );
        $invoce_id = $this->obj_invoices->insert($data_invoice);
        //INSERT INVOICE CATALOG
        if ($invoce_id != null) {
            foreach ($this->cart->contents() as $items) {
                $data_invoice_catalog = array(
                    'invoice_id' => $invoce_id,
                    'catalog_id' => $items['id'],
                    'price' => $items['price'],
                    'quantity' => $items['qty'],
                    'sub_total' => $items['subtotal'],
                    'date' => date("Y-m-d H:i:s")
                );
                $result = $this->obj_invoice_catalog->insert($data_invoice_catalog);
            }
            if ($result != null) {
                //insert data
                $param = array(
                    'invoice_id' => $invoce_id,
                    'customer' => $name,
                    'phone' => $phone,
                    'address' => $address,
                    'reference' => $reference,
                    'active' => 1,
                    'status_value' => 1,
                );
                $contra_entrega_id = $this->obj_contra_entrega->insert($param);
                if ($contra_entrega_id != null) {
                    $data['status'] = true;
                    $data['message'] = "Pedido creado correctamente el número de factura es #$invoce_id";
                    //DESTROY CART
                    $this->cart->destroy();
                } else {
                    $data['status'] = false;
                }
            } else {
                $data['status'] = false;
            }
        } else {
            $data['status'] = false;
        }

        // Respuesta
        echo json_encode($data);
    }

    public function pay_unilevel($ident, $invoice_id, $catalog_id, $customer_id, $quantity) {

        $new_ident = explode(",", $ident);
        rsort($new_ident);
        //select data catalog
        $params = array(
            "select" => "bono_n1,
                                    bono_n2,
                                    bono_n3,
                                    bono_n4,
                                    bono_n5",
            "where" => "catalog_id = $catalog_id"
        );
        //GET DATA FROM BONUS
        $obj_catalog = $this->obj_catalog->get_search_row($params);

        //BOUCLE ULTI 5 LEVEL
        for ($x = 0; $x <= 4; $x++) {
            if (isset($new_ident[$x])) {
                if ($new_ident[$x] != "") {
                    //get customer active
                    $params = array(
                        "select" => "active",
                        "where" => "customer_id = $new_ident[$x]"
                    );
                    //GET DATA FROM BONUS
                    $obj_customer = $this->obj_customer->get_search_row($params);

                    if ($obj_customer->active == 1) {
                        //INSERT COMMISSION TABLE
                        switch ($x) {
                            case 0:
                                $amount = $obj_catalog->bono_n1 * $quantity;
                                break;
                            case 1:
                                $amount = $obj_catalog->bono_n2 * $quantity;
                                break;
                            case 2:
                                $amount = $obj_catalog->bono_n3 * $quantity;
                                break;
                            case 3:
                                $amount = $obj_catalog->bono_n4 * $quantity;
                                break;
                            case 4:
                                $amount = $obj_catalog->bono_n5 * $quantity;
                                break;
                        }
                        $data = array(
                            'invoice_id' => $invoice_id,
                            'customer_id' => $new_ident[$x],
                            'bonus_id' => 1,
                            'amount' => $amount,
                            'active' => 1,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        );
                        $this->obj_commissions->insert($data);

                        //INSERT POINTS TABLE
                        $data_point = array(
                            'customer_id' => $new_ident[$x],
                            'point' => $amount,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id
                        );
                        $this->obj_points->insert($data_point);
                    }
                }
            }
        }
    }

    public function nav_catalogo() {
        $params_category_catalogo = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        //GET DATA COMMENTS
        return $obj_category_catalogo = $this->obj_category->search($params_category_catalogo);
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
    
    public function total_compra($customer_id){
        $params = array(
            "select" => "sum(amount) as total",
            "where" => "customer_id = $customer_id and compras = 1 and active = 1");
        //GET DATA FROM CUSTOMER
         $obj_total_compra = $this->obj_commissions->get_search_row($params);
         return $obj_total_compra = $obj_total_compra->total;
    }
    
    public function get_profile($customer_id) {
        $params_profile = array(
            "select" => "customer.customer_id,
                                    customer.first_name,
                                    customer.username,
                                    customer.last_name,
                                    customer.img,
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
                redirect(site_url() . 'iniciar-sesion');
            }
        } else {
            redirect(site_url() . 'iniciar-sesion');
        }
    }

}
