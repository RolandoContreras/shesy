<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_pay extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("pay_commission_model","obj_pay_commission");
        $this->load->model("pay_model","obj_pay");
        
    }

    public function index()
    {
        //VERIFIRY GET SESSION    
         $this->get_session();
        //GET CUSTOMER_ID $_SESSION   
        $customer_id = $_SESSION['customer']['customer_id'];
        date_default_timezone_set('America/Lima');
        $params = array(
                        "select" =>"pay.date,
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
        $obj_pay= $this->obj_pay->search($params);
        
        //GET WALLET CUSTOMER
        $params = array(
                "select" =>"bank_id,
                            bank_number, 
                            bank_number_cci",
        "where" => "customer_id = $customer_id");
           //GET DATA FROM CUSTOMER
        $obj_customer = $this->obj_customer->get_search_row($params);
        $bank = $obj_customer->bank_id;
        
        //GET TOTAL COMMISION
        $params = array(
                        "select" =>"sum(amount) as total_comissions,
                                    (select sum(amount) FROM commissions WHERE customer_id = $customer_id AND status_value = 1) as total_disponible",
                        "where" => "customer_id = $customer_id and active = 1");
           //GET DATA FROM CUSTOMER
        $obj_total_commissions = $this->obj_commissions->get_search_row($params);
        
        $total_comisiones = $obj_total_commissions->total_comissions;
        $total_disponible = $obj_total_commissions->total_disponible;
        
        $this->tmp_backoffice->set("bank",$bank);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->set("total_comisiones",$total_comisiones);
        $this->tmp_backoffice->set("total_disponible",$total_disponible);
        $this->tmp_backoffice->set("obj_pay",$obj_pay);
        $this->tmp_backoffice->render("backoffice/b_pay");
    }
    
    public function make_pay() {
            if ($this->input->is_ajax_request()) {
                //SELECT ID FROM CUSTOMER
            $customer_id = $_SESSION['customer']['customer_id'];    
            $amount = trim($this->input->post('amount'));
            $tax = trim($this->input->post('tax'));
            $result = trim($this->input->post('result'));
            $total_disponible = trim($this->input->post('total_disponible'));
            
            $tax = number_format($tax, 2);
            $result = number_format($result, 2);
            
            
            if($amount >= 10){
                //INSERT PAY TABLE
                    $data = array(
                        'customer_id' => $customer_id,
                        'amount' => $amount,
                        'descount' => $tax,
                        'amount_total' => $result,
                        'active' => 1,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    ); 
                    $pay_id = $this->obj_pay->insert($data);
                
                    //INSERT COMMISSION TABLE
                    $data = array(
                        'customer_id' => $customer_id,
                        'amount' => -$amount,
                        'active' => 2,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    ); 
                    $commissions_id = $this->obj_commissions->insert($data);
                    
                //INSERT PAY COMISSIONS TABLE
                    $data = array(
                        'pay_id' => $pay_id,
                        'commissions_id' => $commissions_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    ); 
                    $this->obj_pay_commission->insert($data);    
              $message = 2;   
            }else{
              $message = 1;   
            }
            //SEDN DATA
                $data['status'] = $message;
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
                $data['tax'] = format_number_miles($tax);
                $data['result'] = format_number_miles($result);
            echo json_encode($data);
            }
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


    
