<?php

if (!defined("BASEPATH")) exit("No direct script access allowed");
class D_referencia_compra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("referencia_compra_model", "obj_referencia_compra");
    }

    public function index() {

        $this->get_session();
        $params = array(
            "select" => "invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    invoices.img,
                                    invoices.customer_id as sponsor,
                                    referencia_compra.referencia_compra_id,
                                    referencia_compra.name,
                                    referencia_compra.last_name,
                                    referencia_compra.phone,
                                    referencia_compra.address,
                                    referencia_compra.date,
                                    referencia_compra.voucher,
                                    referencia_compra.img,
                                    referencia_compra.status,
                                    invoices.active",
            "join" => array('referencia_compra, invoices.invoice_id = referencia_compra.invoice_id'),
            "where" => "invoices.type = 3 and invoices.status_value = 1",
            "order" => "invoices.invoice_id ASC");
        //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->render("dashboard/referencia_compra/referencia_compra_list");
    }

    public function order($invoice_id) {
        $this->get_session();
        $params = array(
            "select" => "invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.username,
                                    invoices.img,
                                    invoices.sub_total,
                                    invoices.igv,
                                    invoices.customer_id as sponsor,
                                    referencia_compra.referencia_compra_id,
                                    referencia_compra.name,
                                    referencia_compra.last_name,
                                    referencia_compra.phone,
                                    referencia_compra.address,
                                    referencia_compra.date,
                                    referencia_compra.voucher,
                                    referencia_compra.img,
                                    referencia_compra.status,
                                    invoices.active",
            "join" => array('referencia_compra, invoices.invoice_id = referencia_compra.invoice_id',
                            'customer, invoices.customer_id = customer.customer_id'),
            "where" => "invoices.type = 3 and invoices.status_value = 1",
            "order" => "invoices.invoice_id ASC");
        $obj_invoices = $this->obj_invoices->get_search_row($params);
        //get data product
        $params = array(
            "select" => "invoice_catalog.quantity,
                                        invoice_catalog.price,
                                        invoice_catalog.option,
                                        invoice_catalog.sub_total,
                                        invoice_catalog.date,
                                        catalog.name,
                                        catalog.granel,
                                        catalog.img",
            "where" => "invoice_catalog.invoice_id = $invoice_id",
            "join" => array('catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
        );
        $obj_invoice_catalog = $this->obj_invoice_catalog->search($params);

        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->set("obj_invoice_catalog", $obj_invoice_catalog);
        $this->tmp_mastercms->render("dashboard/referencia_compra/referencia_compra_detail");
    }
    
    public function delete() {
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $invoice_id = $this->input->post("invoice_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($invoice_id != "") {
                $result = $this->obj_invoices->delete($invoice_id);
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

    public function active() {
        //ACTIVE CUSTOMER NORMALY
        if ($this->input->is_ajax_request()) {

            date_default_timezone_set('America/Lima');
            //SELECT CUSTOMER_ID
            $customer_id = $this->input->post("customer_id");
            $invoice_id = $this->input->post("invoice_id");

            //GET DATA CUSTOMER UNILEVEL
            $params = array(
                "select" => "parend_id,
                                    ident,
                                    new_parend_id",
                "where" => "customer_id = $customer_id"
            );
            //GET DATA FROM BONUS
            $obj_unilevel = $this->obj_unilevel->get_search_row($params);
            $ident = $obj_unilevel->ident;
            //get productos by invoice_id
            $params = array(
                "select" => "
                            invoice_catalog.quantity,
                            catalog.bono_n1,
                            catalog.bono_n2,
                            catalog.bono_n3,
                            catalog.bono_n4,
                            catalog.bono_n5",
                "where" => "invoice_catalog.invoice_id = $invoice_id",
                "join" => array('catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
            );
            $obj_invoice_catalog = $this->obj_invoice_catalog->search($params);

            if (isset($obj_unilevel) != "") {
                foreach ($obj_invoice_catalog as $value) {
                    //INSERT AMOUNT ON COMMISION TABLE    
                $this->pay_unilevel($ident, $invoice_id, $value->bono_n1, $value->bono_n2, $value->bono_n3, $value->bono_n4, $value->bono_n5);
                //INSERT AMOUNT ON COMMISION TABLE    
                $this->add_points($ident, $value->bono_n1, $value->bono_n2, $value->bono_n3, $value->bono_n4, $value->bono_n5);
                }
            }

            //add 30 day por next pay
            $date_month = date("Y-m-d", strtotime("+30 day"));
            //UPDATE TABLE CUSTOMER ACTIVE = 1    
            $data_customer = array(
                'active' => 1,
                'date_month' => $date_month,
                'active_month' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $customer_id,
            );
             $this->obj_customer->update($customer_id, $data_customer);
             //update invoce
             $data_invoice = array(
                'active' => 0,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $customer_id,
            );
            $this->obj_invoices->update($invoice_id, $data_invoice);
            $data['status'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function pay_unilevel($ident, $invoice_id, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5) {

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