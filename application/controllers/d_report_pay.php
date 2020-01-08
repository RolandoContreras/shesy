<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_report_pay extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("pay_model","obj_pay");
        $this->load->library("export_excel");
    }   
                
    public function index(){  
            //GER SESSION
        $this->get_session();
        $params = array(
                        "select" =>"pay.pay_id,
                                    pay.date,
                                    pay.amount_total,
                                    customer.username,
                                    pay.active,
                                    customer.first_name,
                                    customer.bank_id,
                                    customer.last_name",
                        "join" => array('customer, pay.customer_id = customer.customer_id'),
                        "order" => "pay.pay_id DESC"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay= $this->obj_pay->search($params);

            $date_start = "";
            $date_end = "";
            $active = -1;

            //send data
            $this->tmp_mastercms->set("date_start",$date_start);
            $this->tmp_mastercms->set("date_end",$date_end);
            $this->tmp_mastercms->set("active",$active);
            $this->tmp_mastercms->set("obj_pay",$obj_pay);
            $this->tmp_mastercms->render("dashboard/reporte_pay/report_pay_list");
    }
    
    public function load(){  
            //GER SESSION
            $this->get_session();

            //send data
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $bank_id = $this->input->post('bank_id');
            $active = $this->input->post('active');
            
            if($date_start == "" || $date_end == ""){
                $where_date = "pay.date BETWEEN '2019-01-01' AND '2023-12-01'";
            }else{
                $date_start = formato_fecha_db($date_start);
                $date_end = formato_fecha_db($date_end);
                $where_date = "pay.date BETWEEN '$date_start' AND '$date_end'";
            }
            
            if($bank_id == -1){
                $where_bank = "";    
            }else{
                $where_bank = "and customer.bank_id = $bank_id";
            }
            
            if($active == -1){
                $where_active = "";    
            }else{
                $where_active = "and pay.active = $active";
            }
                
        $where = "$where_date $where_bank $where_active";
        $params = array(
                        "select" =>"pay.pay_id,
                                    pay.date,
                                    pay.amount_total,
                                    customer.username,
                                    pay.active,
                                    customer.first_name,
                                    customer.bank_id,
                                    customer.last_name",
                        "join" => array('customer, pay.customer_id = customer.customer_id'),
                        "where" => "$where",
                        "order" => "pay.pay_id DESC"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay= $this->obj_pay->search($params);
        
        //send data
        $this->tmp_mastercms->set("date_start",$date_start);
        $this->tmp_mastercms->set("date_end",$date_end);
        $this->tmp_mastercms->set("active",$active);
        $this->tmp_mastercms->set("bank_id",$bank_id);
        $this->tmp_mastercms->set("obj_pay",$obj_pay);
        $this->tmp_mastercms->render("dashboard/reporte_pay/report_pay_list");
    }
    
    public function export(){  
            //GER SESSION
            $this->get_session();
            //send data
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $bank_id = $this->input->post('bank_id');
            $active = $this->input->post('active');
            
            if($date_start == "" || $date_end == ""){
                $where_date = "pay.date BETWEEN '2019-01-01' AND '2023-12-01'";
            }else{
                $date_start = formato_fecha_db($date_start);
                $date_end = formato_fecha_db($date_end);
                $where_date = "pay.date BETWEEN '$date_start' AND '$date_end'";
            }
            
            if($bank_id == -1){
                $where_bank = "";    
            }else{
                $where_bank = "and customer.bank_id = $bank_id";
            }
            
            if($active == -1){
                $where_active = "";    
            }else{
                $where_active = "and pay.active = $active";
            }
                
        $where = "$where_date $where_bank $where_active";
        $params = array(
                        "select" =>"pay.pay_id,
                                    pay.date,
                                    pay.amount_total,
                                    customer.username,
                                    pay.active,
                                    customer.first_name,
                                    customer.bank_id,
                                    customer.last_name",
                        "join" => array('customer, pay.customer_id = customer.customer_id'),
                        "where" => "$where",
                        "order" => "pay.pay_id DESC"
               );
            //GET DATA FROM CUSTOMER
        $obj_pay = $this->obj_pay->get_search_export($params);
        //export excel
        $this->export_excel->to_excel($obj_pay, "REPORTE DE PAGOS", $date_start,$date_end);
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
?>