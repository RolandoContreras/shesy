<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_report_invoice extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->library("export_excel");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
        $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.type,
                                    invoices.total,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    invoices.active",
                "join" => array( 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.status_value = 1",
                "order" => "invoices.invoice_id ASC");
            //GET DATA FROM CUSTOMER
            $obj_invoices = $this->obj_invoices->search($params);
            
        $date_start = "";
        $date_end = "";
        $active = -1;
        $type = -1;

        //send data
        $this->tmp_mastercms->set("date_start",$date_start);
        $this->tmp_mastercms->set("date_end",$date_end);
        $this->tmp_mastercms->set("active",$active);
        $this->tmp_mastercms->set("type",$type);
        $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
        $this->tmp_mastercms->render("dashboard/reporte_invoices/report_invoice_list");
    }
    
    public function load(){  
            //GER SESSION
            $this->get_session();

            //send data
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $type = $this->input->post('type');
            $active = $this->input->post('active');
            
            if($date_start == ""){
                $where_date = "";
            }elseif ($date_end == "") {
                $where_date = "";
            }else{
                $where_date = "invoices.date BETWEEN '$date_start' AND '$date_end'";
            }
            
            if($type == -1){
                $where_type = "";    
            }else{
                $where_type = "and invoices.type = $type";
            }
            
            if($active == -1){
                $where_active = "";    
            }else{
                $where_active = "and invoices.active = $active";
            }
            
            
                
        $where = "$where_date $where_type $where_active";
        $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.type,
                                    invoices.total,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    invoices.active",
                "join" => array( 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "$where",
                "order" => "invoices.invoice_id ASC");
            //GET DATA FROM CUSTOMER
            $obj_invoices = $this->obj_invoices->search($params);
            
        
        //send data
        $this->tmp_mastercms->set("date_start",$date_start);
        $this->tmp_mastercms->set("date_end",$date_end);
        $this->tmp_mastercms->set("active",$active);
        $this->tmp_mastercms->set("type",$type);
        $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
        $this->tmp_mastercms->render("dashboard/reporte_invoices/report_invoice_list");
    }
    
    public function export(){  
            //GER SESSION
            $this->get_session();
            //send data
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $type = $this->input->post('type');
            $active = $this->input->post('active');
            
            if($date_start == ""){
                $where_date = "";
            }elseif ($date_end == "") {
                $where_date = "";
            }else{
                $where_date = "invoices.date BETWEEN '$date_start' AND '$date_end'";
            }
            
            if($type == -1){
                $where_type = "";    
            }else{
                $where_type = "and invoices.type = $type";
            }
            
            if($active == -1){
                $where_active = "";    
            }else{
                $where_active = "and invoices.active = $active";
            }
                
        $where = "$where_date $where_type $where_active";
        
        if($where == ""){
            $where = "";
        }else{
            $where = 'where'.' => '."'$where'";
        }
        
        $param_data = array(
                        "select" =>"invoices.invoice_id as codigo,
                                    invoices.date as fecha,
                                    invoices.type as tipo,
                                    invoices.total,
                                    customer.customer_id id_cliente,
                                    customer.username as usuario,
                                    customer.first_name as nombre,
                                    customer.last_name as apellido,
                                    invoices.active as estado",
                "join" => array( 'customer, invoices.customer_id = customer.customer_id'),
                $where,
                "order" => "invoices.invoice_id ASC");
            //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->get_search_export($param_data);
        //export excel
        $this->export_excel->to_excel($obj_invoices, "REPORTE DE COMPRAS", $date_start,$date_end);
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