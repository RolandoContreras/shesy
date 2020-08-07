<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class D_activate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("unilevel_model", "obj_unilevel");
        $this->load->model("kit_model", "obj_kit");
        $this->load->model("bonus_model", "obj_bonus");
        $this->load->model("points_model", "obj_points");
    }

    public function index() {

        $this->get_session();
        $params = array(
            "select" => "invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    invoices.img,
                                    invoices.type,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    kit.kit_id,
                                    kit.price,
                                    kit.name,
                                    invoices.active",
            "join" => array('kit, invoices.kit_id = kit.kit_id',
                'customer, invoices.customer_id = customer.customer_id'),
            "where" => "invoices.status_value = 1",
            "order" => "invoices.invoice_id ASC");
        //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->search($params);

        /// PAGINADO
        $modulos = 'activaciones';
        $seccion = 'Lista';
        $link_modulo = site_url() . 'dashboard/activaciones';

        /// VISTA
        $this->tmp_mastercms->set('link_modulo', $link_modulo);
        $this->tmp_mastercms->set('modulos', $modulos);
        $this->tmp_mastercms->set('seccion', $seccion);
        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }

    public function load() {
        //OBTENER CLIENTES INACTIVOS
        $params = array(
            "select" => "username,
                                    first_name,
                                    last_name,
                                    dni,
                                    customer_id",
            "where" => "active = 0",
        );
        //GET DATA COMMENTS
        $obj_customer = $this->obj_customer->search($params);
        //OBTENER KITS ACTIVOS
        $params = array(
            "select" => "name,
                                    kit_id,
                                    price,
                                    point",
            "where" => "active = 1",
        );
        //GET DATA COMMENTS
        $obj_kit = $this->obj_kit->search($params);

        $this->tmp_mastercms->set("obj_customer", $obj_customer);
        $this->tmp_mastercms->set("obj_kit", $obj_kit);
        $this->tmp_mastercms->render("dashboard/activate/active_kit_form");
    }

    public function activaciones_catalogo() {

        $this->get_session();
        $params = array(
            "select" => "invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    invoices.img,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    invoices.active",
            "join" => array('customer, invoices.customer_id = customer.customer_id'),
            "where" => "invoices.type = 2 and invoices.status_value = 1",
            "order" => "invoices.invoice_id ASC");
        //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->search($params);

        /// PAGINADO
        $modulos = 'activaciones';
        $seccion = 'Lista';
        $link_modulo = site_url() . 'dashboard/activaciones';

        /// VISTA
        $this->tmp_mastercms->set('link_modulo', $link_modulo);
        $this->tmp_mastercms->set('modulos', $modulos);
        $this->tmp_mastercms->set('seccion', $seccion);
        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->render("dashboard/activate/activate_catalogo_list");
    }

    public function order_catalog($invoice_id) {

        $this->get_session();
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

        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->set("obj_invoice_catalog", $obj_invoice_catalog);
        $this->tmp_mastercms->render("dashboard/activate/activate_catalogo_detail");
    }

    public function active() {
        //ACTIVE CUSTOMER NORMALY
        if ($this->input->is_ajax_request()) {
            date_default_timezone_set('America/Lima');
            //SELECT CUSTOMER_ID
//                $invoice_id = $this->input->post("invoice_id");
            $customer_id = $this->input->post("customer_id");
            $kit_id = $this->input->post("kit_id");
            $type = $this->input->post("type");
            //GET DATA FROM TABLE KIT
            $params = array(
                "select" => "bono_n1,
                                    bono_n2,
                                    bono_n3,
                                    bono_n4,
                                    bono_n5,
                                    price",
                "where" => "kit_id = $kit_id"
            );
            //GET DATA FROM BONUS
            $obj_kit = $this->obj_kit->get_search_row($params);
            if ($obj_kit != null) {
                //CREATE INVOICE
                $data_invoice = array(
                    'customer_id' => $customer_id,
                    'kit_id' => $kit_id,
                    'sub_total' => $obj_kit->price,
                    'igv' => 0,
                    'total' => $obj_kit->price,
                    'type' => $type,
                    'recompra' => 0,
                    'date' => date("Y-m-d H:i:s"),
                    'active' => 2,
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                );
                $invoice_id = $this->obj_invoices->insert($data_invoice);
                //GET DATA CUSTOMER UNILEVEL
                $params = array(
                    "select" => "parend_id,
                                        ident,
                                        new_parend_id",
                    "where" => "customer_id = $customer_id"
                );
                //GET DATA FROM BONUS
                $obj_unilevel = $this->obj_unilevel->get_search_row($params);
                if (isset($obj_unilevel) != "") {
                    $ident = $obj_unilevel->ident;
                    $new_parend_id = $obj_unilevel->new_parend_id;
                    //INSERT AMOUNT ON COMMISION TABLE    
                    $this->pay_unilevel($ident, $new_parend_id, $invoice_id, $obj_kit->bono_n1, $obj_kit->bono_n2, $obj_kit->bono_n3, $obj_kit->bono_n4, $obj_kit->bono_n5);
                    //INSERT AMOUNT ON COMMISION TABLE    
//                    $this->add_points($ident, $obj_kit->bono_n1, $obj_kit->bono_n2, $obj_kit->bono_n3, $obj_kit->bono_n4, $obj_kit->bono_n5);
                }

                //add 30 day por next pay
                $date_month = date("Y-m-d", strtotime("+30 day"));
                //UPDATE TABLE CUSTOMER ACTIVE = 1    
                $data = array(
                    'active' => 1,
                    'kit_id' => $kit_id,
                    'date_start' => date("Y-m-d H:i:s"),
                    'date_month' => $date_month,
                    'active_month' => 1,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $customer_id,
                );
                $this->obj_customer->update($customer_id, $data);
                $data['status'] = "true";
            } else {
                $data['status'] = "false";
            }
            echo json_encode($data);
            exit();
        }
    }

    public function pay_unilevel($ident, $new_parend_id, $invoice_id, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5) {

        $new_ident = explode(",", $ident);
        rsort($new_ident);

        //BOUCLE ULTI 5 LEVEL
        for ($x = 0; $x <= 4; $x++) {

            if ($new_parend_id != null) {
                if ($x == 0) {
                    //get customer active
                    $params = array(
                        "select" => "active_month",
                        "where" => "customer_id = $new_parend_id"
                    );
                    //GET DATA FROM BONUS
                    $obj_customer = $this->obj_customer->get_search_row($params);
                    if (isset($obj_customer->active_month) &&  $obj_customer->active_month == 1 ) {
                        //set 90% 10%
                        $noventa_percent = $bono_n1 *0.9;
                        $diez_percent = $bono_n1 *0.1;
                        //INSERT COMMISSION TABLE 90%
                        $data = array(
                            'invoice_id' => $invoice_id,
                            'customer_id' => $new_parend_id,
                            'bonus_id' => 1,
                            'amount' => $noventa_percent,
                            'active' => 1,
                            'pago' => 0,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['usercms']['user_id'],
                        );
                        $this->obj_commissions->insert($data);
                        //INSERT COMMISSION TABLE 90%
                        $data = array(
                            'invoice_id' => $invoice_id,
                            'customer_id' => $new_parend_id,
                            'bonus_id' => 1,
                            'amount' => $diez_percent,
                            'active' => 1,
                            'pago' => 0,
                            'compras' => 1,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['usercms']['user_id'],
                        );
                        $this->obj_commissions->insert($data);
                    }
                } else {
                    if (isset($new_ident[$x])) {
                        if ($new_ident[$x] != "") {
                            //get customer active
                            $params = array(
                                "select" => "active_month",
                                "where" => "customer_id = $new_ident[$x]"
                            );
                            //GET DATA FROM BONUS
                            $obj_customer = $this->obj_customer->get_search_row($params);

                            if (isset($obj_customer->active_month) &&  $obj_customer->active_month == 1 ) {
                                //INSERT COMMISSION TABLE
                                switch ($x) {
                                    case 1:
                                        $amount = $bono_n2;
                                        break;
                                    case 2:
                                        $amount = $bono_n3;
                                        break;
                                    case 3:
                                        $amount = $bono_n4;
                                        break;
                                    case 4:
                                        $amount = $bono_n5;
                                        break;
                                }
                                //set percent
                                $noventa_percent = $amount *0.9;
                                $diez_percent = $amount *0.1;
                                //insert commission 90%
                                $data = array(
                                    'invoice_id' => $invoice_id,
                                    'customer_id' => $new_ident[$x],
                                    'bonus_id' => 1,
                                    'amount' => $noventa_percent,
                                    'active' => 1,
                                    'pago' => 0,
                                    'status_value' => 1,
                                    'date' => date("Y-m-d H:i:s"),
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'created_by' => $_SESSION['usercms']['user_id'],
                                );
                                $this->obj_commissions->insert($data);
                                //insert commission 10%
                                $data = array(
                                    'invoice_id' => $invoice_id,
                                    'customer_id' => $new_ident[$x],
                                    'bonus_id' => 1,
                                    'amount' => $diez_percent,
                                    'active' => 1,
                                    'pago' => 0,
                                    'compras' => 1,
                                    'status_value' => 1,
                                    'date' => date("Y-m-d H:i:s"),
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'created_by' => $_SESSION['usercms']['user_id'],
                                );
                                $this->obj_commissions->insert($data);
                                
                            }
                        }
                    }
                }
            } else {
                if ($new_ident[$x] != "") {
                    //get customer active
                    $params = array(
                        "select" => "active_month",
                        "where" => "customer_id = $new_ident[$x]"
                    );
                    //GET DATA FROM BONUS
                    $obj_customer = $this->obj_customer->get_search_row($params);

                    if (isset($obj_customer->active_month) &&  $obj_customer->active_month == 1 ) {
                        //INSERT COMMISSION TABLE
                        switch ($x) {
                            case 0:
                                $amount = $bono_n1;
                                break;
                            case 1:
                                $amount = $bono_n2;
                                break;
                            case 2:
                                $amount = $bono_n3;
                                break;
                            case 3:
                                $amount = $bono_n4;
                                break;
                            case 4:
                                $amount = $bono_n5;
                                break;
                        }
                        
                        //set percent
                        $noventa_percent = $amount *0.9;
                        $diez_percent = $amount *0.1;
                        //insert commission 90%
                        $data = array(
                            'invoice_id' => $invoice_id,
                            'customer_id' => $new_ident[$x],
                            'bonus_id' => 1,
                            'amount' => $noventa_percent,
                            'active' => 1,
                            'pago' => 0,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['usercms']['user_id'],
                        );
                        $this->obj_commissions->insert($data);
                        //insert commission 10%
                        $data = array(
                            'invoice_id' => $invoice_id,
                            'customer_id' => $new_ident[$x],
                            'bonus_id' => 1,
                            'amount' => $diez_percent,
                            'active' => 1,
                            'compras' => 1,
                            'pago' => 0,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['usercms']['user_id'],
                        );
                        $this->obj_commissions->insert($data);
                    }
                }
            }
        }
    }

    public function add_points($ident, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5) {

        //GET PERCENT FROM BONUS
        $new_ident = explode(",", $ident);
        rsort($new_ident);

        //BOUCLE ULTI 5 LEVEL
        for ($x = 0; $x <= 4; $x++) {
            if (isset($new_ident[$x])) {
                if ($new_ident[$x] != "") {
                    //get customer active
                    $params = array(
                        "select" => "active_month",
                        "where" => "customer_id = $new_ident[$x]"
                    );
                    //GET DATA FROM BONUS
                    $obj_customer = $this->obj_customer->get_search_row($params);

                    if (isset($obj_customer->active_month) &&  $obj_customer->active_month == 1 ) {
                        switch ($x) {
                            case 0:
                                $point = $bono_n1;
                                break;
                            case 1:
                                $point = $bono_n2;
                                break;
                            case 2:
                                $point = $bono_n3;
                                break;
                            case 3:
                                $point = $bono_n4;
                                break;
                            case 4:
                                $point = $bono_n5;
                                break;
                        }

                        //INSERT POINTS TABLE
                        $data = array(
                            'customer_id' => $new_ident[$x],
                            'point' => $point,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['usercms']['user_id']
                        );
                        $this->obj_points->insert($data);
                    }
                }
            }
        }
    }

    public function validate_user() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
            $username = str_to_minuscula(trim($this->input->post('username')));
            $param_customer = array(
                "select" => "customer_id,first_name,last_name,dni",
                "where" => "username = '$username'");
            $customer = $this->obj_customer->get_search_row($param_customer);
            if (isset($customer->customer_id) != "") {
                $data['message'] = "true";
                $data['name'] = $customer->first_name . " " . $customer->last_name;
                $data['dni'] = $customer->dni;
                $data['customer_id'] = $customer->customer_id;
                $data['print'] = "Cliente Encontrado!";
            } else {
                $data['message'] = "false";
                $data['print'] = "Cliente no existe!";
            }
            echo json_encode($data);
        }
    }

    public function get_session() {
        if (isset($_SESSION['usercms'])) {
            if ($_SESSION['usercms']['logged_usercms'] == "TRUE" && $_SESSION['usercms']['status'] == 1) {
                return true;
            } else {
                redirect(site_url() . 'dashboard');
            }
        } else {
            redirect(site_url() . 'dashboard');
        }
    }

}

?>