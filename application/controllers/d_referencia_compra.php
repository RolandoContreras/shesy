<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_referencia_compra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("commissions_model", "obj_commissions");
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
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function marcar_enviado() {
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $referencia_compra_id = $this->input->post("referencia_compra_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($referencia_compra_id != "") {
                //update invoice
                $param_referencia_compra = array(
                    'status' => 0
                );
                $result = $this->obj_referencia_compra->update($referencia_compra_id, $param_referencia_compra);
                //send result
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
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
            $sponsor_id = $this->input->post("customer_id");
            $invoice_id = $this->input->post("invoice_id");
            $referencia_compra_id = $this->input->post("referencia_compra_id");
            //get data fron catalog invoice
            $params = array(
                "select" => "invoice_catalog.catalog_id,
                             invoice_catalog.quantity",
                "join" => array('invoice_catalog, invoices.invoice_id = invoice_catalog.invoice_id'),
                "where" => "invoices.invoice_id = $invoice_id");
            //GET DATA FROM CUSTOMER
            $obj_catalog = $this->obj_invoices->search($params);
            foreach ($obj_catalog as $value) {
                //search bono
                $params = array(
                    "select" => "bono_n1",
                    "where" => "catalog_id = $value->catalog_id"
                );
                //GET DATA FROM BONUS
                $obj_bono = $this->obj_catalog->get_search_row($params);
                $bono_1 = $obj_bono->bono_n1;
                //pay comission by enlace de compra
                $this->pay_referido_compra($sponsor_id, $invoice_id, $bono_1, $value->quantity);
            }
            //update invoice
            $param_invoice = array(
                'active' => 2
            );
            $this->obj_invoices->update($invoice_id, $param_invoice);
            //update enlace referencia status
            $param_referencia = array(
                'status' => 0
            );
            $result = $this->obj_referencia_compra->update($referencia_compra_id, $param_referencia);
            if ($result === true) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        }
    }

    public function pay_referido_compra($sponsor_id, $invoice_id, $bono, $qty) {
        //INSERT COMMISSION TABLE
        $amount = $bono * $qty;
        $noventa_percent = $amount * 0.9;
        $diez_percent = $amount * 0.1;
        //insert on table comissión 90%
        $data = array(
            'invoice_id' => $invoice_id,
            'customer_id' => $sponsor_id,
            'bonus_id' => 4,
            'amount' => $noventa_percent,
            'active' => 1,
            'pago' => 0,
            'status_value' => 1,
            'date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $sponsor_id,
        );
        $this->obj_commissions->insert($data);
        //insert commission 10%
        $data = array(
            'invoice_id' => $invoice_id,
            'customer_id' => $sponsor_id,
            'bonus_id' => 4,
            'amount' => $diez_percent,
            'active' => 1,
            'pago' => 0,
            'compras' => 1,
            'status_value' => 1,
            'date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $sponsor_id,
        );
        $this->obj_commissions->insert($data);
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
                    if (isset($obj_customer->active_month) && $obj_customer->active_month == 1) {
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

                    if (isset($obj_customer->active_month) && $obj_customer->active_month == 1) {
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