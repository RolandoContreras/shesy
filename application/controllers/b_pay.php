<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class B_pay extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("pay_commission_model", "obj_pay_commission");
        $this->load->model("pay_model", "obj_pay");
    }

    public function index() {
        //VERIFIRY GET SESSION    
        $this->get_session();
        //GET CUSTOMER_ID $_SESSION   
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        $active_month = $_SESSION['customer']['active_month'];
        date_default_timezone_set('America/Lima');
        $params = array(
            "select" => "pay.date,
                                    pay.amount,
                                    pay.pay_id,
                                    pay.descount,
                                    pay.active,
                                    customer.bank_id,
                                    ",
            "join" => array('customer, pay.customer_id = customer.customer_id'),
            "where" => "pay.customer_id = $customer_id and pay.status_value = 1",
            "order" => "pay.date DESC",
            "limit" => "40");
        //GET DATA FROM CUSTOMER
        $obj_pay = $this->obj_pay->search($params);

        //GET WALLET CUSTOMER
        $params = array(
            "select" => "bank_id,
                            bank_number, 
                            bank_account, 
                            bank_number_cci",
            "where" => "customer_id = $customer_id");
        //GET DATA FROM CUSTOMER
        $obj_customer = $this->obj_customer->get_search_row($params);
        $bank = $obj_customer->bank_id;

        //GET TOTAL COMMISION
        $params = array(
            "select" => "sum(amount) as total_comissions,
                                    (select sum(amount) FROM commissions WHERE customer_id = $customer_id AND compras != 1 and active = 1 and status_value = 1) as total_disponible",
            "where" => "customer_id = $customer_id and status_value = 1 and pago != 1 and amount > 0");
        //GET DATA FROM CUSTOMER
        $obj_total_commissions = $this->obj_commissions->get_search_row($params);

        $total_comisiones = $obj_total_commissions->total_comissions;
        if ($active_month == 0) {
            $total_disponible = 0;
        } else {
            $total_disponible = $obj_total_commissions->total_disponible;
        }
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("bank", $bank);
        $this->tmp_backoffice->set("obj_customer", $obj_customer);
        $this->tmp_backoffice->set("total_comisiones", $total_comisiones);
        $this->tmp_backoffice->set("total_disponible", $total_disponible);
        $this->tmp_backoffice->set("obj_pay", $obj_pay);
        $this->tmp_backoffice->render("backoffice/b_pay");
    }

    public function make_pay() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
            $customer_id = $_SESSION['customer']['customer_id'];
            $amount = trim($this->input->post('amount'));
            $total_disponible = trim($this->input->post('total_disponible'));
            //verify pay
            if (intval($amount) > intval($total_disponible)) {
                $data['status'] = false;
            } else {
                //INSERT PAY TABLE
                $param_pay = array(
                    'customer_id' => $customer_id,
                    'amount' => $amount,
                    'amount_total' => $amount,
                    'active' => 1,
                    'status_value' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                );
                $pay_id = $this->obj_pay->insert($param_pay);
                if(!empty($pay_id)){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }
            }
            echo json_encode($data);
        }
    }

    public function validate_amount() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
            $amount = trim($this->input->post('amount'));
            $tax = 0;
            $result = $amount - $tax;

            //SEDN DATA
            $data['tax'] = $tax;
            $data['result'] = $result;
            echo json_encode($data);
        }
    }

    public function get_profile($customer_id) {
        $params_profile = array(
            "select" => "customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.img,
                                    ",
            "where" => "customer.customer_id = $customer_id and customer.active = 1"
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
