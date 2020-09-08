<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class B_plan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("kit_model", "obj_kit");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("sell_model", "obj_sell");
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("unilevel_model", "obj_unilevel");
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->model("points_model", "obj_points");
        $this->load->library('culqi');
    }

    public function index() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET PLAN INFORMATION
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //kt_id
        $kit_id = $obj_profile->kit_id;
        $params = array(
            "select" => "kit_id,
                                    name,
                                    price,
                                    point,
                                    description,
                                    img,
                                    active",
            "where" => "active = 1 and status_value = 1",
            "order" => "kit_id ASC",
        );
        $obj_kit = $this->obj_kit->search($params);
        //GET PRICE CURRENCY
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("kit_id", $kit_id);
        $this->tmp_backoffice->set("obj_kit", $obj_kit);
        $this->tmp_backoffice->render("backoffice/b_plan");
    }

    public function recompra() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET PLAN INFORMATION
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //GET PLAN INFORMATION
        $kit_id = $_SESSION['customer']['kit_id'];
        $params = array(
            "select" => "kit_id,
                                    name,
                                    price,
                                    point,
                                    description,
                                    img,
                                    active",
            "where" => "kit_id = 1 and status_value = 1"
        );
        $obj_kit = $this->obj_kit->search($params);
        //GET PRICE CURRENCY
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("kit_id", $kit_id);
        $this->tmp_backoffice->set("obj_kit", $obj_kit);
        $this->tmp_backoffice->render("backoffice/b_recompra");
    }

    public function get_profile($customer_id) {
        $params_profile = array(
            "select" => "customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    kit.kit_id,
                                    customer.img",
            "join" => array('kit, customer.kit_id = kit.kit_id'),
            "where" => "customer.customer_id = $customer_id and customer.active = 1"
        );
        //GET DATA COMMENTS
        return $obj_customer = $this->obj_customer->get_search_row($params_profile);
    }

    public function create_invoice() {
        try {
            date_default_timezone_set('America/Lima');
            //SELECT ID FROM CUSTOMER
            $token = $this->input->post('token');
            $kit_id = trim($this->input->post('kit_id'));
            $email = $this->input->post('email');
            $price = $this->input->post('price');
            $price2 = $this->input->post('price2');
            $customer_id = $_SESSION['customer']['customer_id'];
            //get data customer
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
            //MAKE CHARGE
            $charge = $this->culqi->charge($token, $price, $email, $obj_customer->first_name, $obj_customer->last_name, $obj_customer->address, $obj_customer->phone);
            //INSERT INVOICE
            $data_invoice = array(
                'customer_id' => $customer_id,
                'kit_id' => $kit_id,
                'sub_total' => $price2,
                'igv' => 0,
                'total' => $price2,
                'type' => 1,
                'recompra' => 0,
                'date' => date("Y-m-d H:i:s"),
                'active' => 2,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $customer_id,
            );
            $invoice_id = $this->obj_invoices->insert($data_invoice);
            //get data bonus kit
            $params = array(
                "select" => "bono_n1,
                                        bono_n2,
                                        bono_n3,
                                        bono_n4,
                                        bono_n5",
                "where" => "kit_id = $kit_id"
            );
            //GET DATA FROM BONUS
            $obj_kit = $this->obj_kit->get_search_row($params);
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
                if(!empty($new_parend_id)){
                    //INSERT AMOUNT ON COMMISION TABLE    
                $this->pay_unilevel($ident, $new_parend_id, $invoice_id, $obj_kit->bono_n1, $obj_kit->bono_n2, $obj_kit->bono_n3, $obj_kit->bono_n4, $obj_kit->bono_n5);
                }
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
            $result = $this->obj_customer->update($customer_id, $data);
            //UPDATE SESSION
            if(!empty($result)){
                $data_month = 1;
                $this->update_session_active_month($data_month);
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($charge);
        } catch (Exception $e) {
            $data['status'] = false;
            echo json_encode($e->getMessage());
        }
    }

    public function create_invoice_recompra() {
        try {
            date_default_timezone_set('America/Lima');
            //SELECT ID FROM CUSTOMER
            $token = $this->input->post('token');
            $kit_id = trim($this->input->post('kit_id'));
            $email = $this->input->post('email');
            $price = $this->input->post('price');
            $customer_id = $_SESSION['customer']['customer_id'];

            //get data customer
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

            //MAKE CHARGE
            $charge = $this->culqi->charge($token, $price, $email, $obj_customer->first_name, $obj_customer->last_name, $obj_customer->address, $obj_customer->phone);
            $price2 = $this->input->post('price2');

            //INSERT INVOICE
            $data_invoice = array(
                'customer_id' => $customer_id,
                'kit_id' => $kit_id,
                'sub_total' => $price2,
                'igv' => 0,
                'total' => $price2,
                'type' => 1,
                'recompra' => 1,
                'date' => date("Y-m-d H:i:s"),
                'active' => 2,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $customer_id,
            );
            $invoice_id = $this->obj_invoices->insert($data_invoice);

            //get data bonus kit
            $params = array(
                "select" => "bono_n1,
                                        bono_n2,
                                        bono_n3,
                                        bono_n4,
                                        bono_n5",
                "where" => "kit_id = $kit_id"
            );
            //GET DATA FROM BONUS
            $obj_kit = $this->obj_kit->get_search_row($params);

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
                //INSERT AMOUNT ON COMMISION TABLE    
                $this->pay_unilevel_recompra($ident, $invoice_id, $obj_kit->bono_n1, $obj_kit->bono_n2, $obj_kit->bono_n3, $obj_kit->bono_n4, $obj_kit->bono_n5);
                //INSERT AMOUNT ON COMMISION TABLE    
                $this->add_points($ident, $obj_kit->bono_n1, $obj_kit->bono_n2, $obj_kit->bono_n3, $obj_kit->bono_n4, $obj_kit->bono_n5);
            }
            //add 30 day por next pay
            $date_month = date("Y-m-d", strtotime("+30 day"));
            //UPDATE TABLE CUSTOMER ACTIVE = 1    
            $data = array(
                'active' => 1,
                'date_month' => $date_month,
                'active_month' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $customer_id,
            );
            $this->obj_customer->update($customer_id, $data);
            //UPDATE SESSION
            $data_month = 1;
            $this->update_session_active_month($data_month);
            $data['status'] = "true";
            echo json_encode($charge);
        } catch (Exception $e) {
            $data['status'] = "false";
            echo json_encode($e->getMessage());
        }
    }

    public function pay_unilevel($ident, $new_parend_id, $invoice_id, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5) {
        $new_ident = explode(",", $ident);
        rsort($new_ident);
        //BOUCLE ULTI 5 LEVEL
        for ($x = 0; $x <= 4; $x++) {
            if ($x == 0) {
                //get customer active
                $params = array(
                    "select" => "active_month",
                    "where" => "customer_id = $new_parend_id"
                );
                //GET DATA FROM BONUS
                $obj_customer = $this->obj_customer->get_search_row($params);
                if ($obj_customer->active_month == 1) {
                    //GET 5%
                    //INSERT COMMISSION TABLE
                    $noventa_percent = $bono_n1 * 0.9;
                    $diez_percent = $bono_n1 * 0.1;
                    //insert on table comissión
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
                        'created_by' => $_SESSION['customer']['customer_id'],
                    );
                    $this->obj_commissions->insert($data);
                    //insert commission 10%
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
                        'created_by' => $_SESSION['customer']['customer_id'],
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
                        $obj_customer_sec = $this->obj_customer->get_search_row($params);
                        if ($obj_customer_sec->active_month == 1) {
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
                            //set %
                            $noventa_percent = $amount * 0.9;
                            $diez_percent = $amount * 0.1;
                            //insert table commissión 90%
                            $data = array(
                                'invoice_id' => $invoice_id,
                                'customer_id' => $new_ident[$x],
                                'bonus_id' => 1,
                                'amount' => $noventa_percent,
                                'pago' => 0,
                                'active' => 1,
                                'status_value' => 1,
                                'date' => date("Y-m-d H:i:s"),
                                'created_at' => date("Y-m-d H:i:s"),
                                'created_by' => $_SESSION['customer']['customer_id'],
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
                                'created_by' => $_SESSION['customer']['customer_id'],
                            );
                            $this->obj_commissions->insert($data);
                        }
                    }
                }
            }
        }
    }

    public function pay_unilevel_recompra($ident, $invoice_id, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5) {

        $new_ident = explode(",", $ident);
        rsort($new_ident);

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
                        $data = array(
                            'invoice_id' => $invoice_id,
                            'customer_id' => $new_ident[$x],
                            'bonus_id' => 1,
                            'amount' => $amount,
                            'active' => 1,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['customer']['customer_id'],
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
                        "select" => "active",
                        "where" => "customer_id = $new_ident[$x]"
                    );
                    //GET DATA FROM BONUS
                    $obj_customer = $this->obj_customer->get_search_row($params);

                    if ($obj_customer->active == 1) {
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
                            'created_by' => $_SESSION['customer']['customer_id']
                        );
                        $this->obj_points->insert($data);
                    }
                }
            }
        }
    }

    public function update_session_active_month($data_month) {
        $data_customer_session['customer_id'] = $_SESSION['customer']['customer_id'];
        $data_customer_session['name'] = $_SESSION['customer']['name'];
        $data_customer_session['username'] = $_SESSION['customer']['username'];
        $data_customer_session['email'] = $_SESSION['customer']['email'];
        $data_customer_session['kit_id'] = $_SESSION['customer']['kit_id'];
        $data_customer_session['active_month'] = $data_month;
        $data_customer_session['active'] = $_SESSION['customer']['active'];
        $data_customer_session['logged_customer'] = "TRUE";
        $data_customer_session['status'] = $_SESSION['customer']['status'];
        $_SESSION['customer'] = $data_customer_session;
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
