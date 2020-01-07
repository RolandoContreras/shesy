<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_report_customer extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("comments_model","obj_comments");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("kit_model","obj_kit");
        $this->load->model("ranges_model","obj_ranges");
        $this->load->library("export_excel");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            //GET AND COUNT ALL THE CUSTOMER
        //RATIO DE ACTIVOS
        $param_data = array("select" =>"customer.customer_id,
                                        customer.username,
                                        customer.first_name,
                                        customer.last_name,
                                        customer.dni,
                                        paises.nombre as pais,
                                        customer.date_start,
                                        customer.phone,
                                        customer.active,
                                        kit.name as pack",
            "join" => array('paises, customer.country = paises.id',
                            'kit, customer.kit_id = kit.kit_id'),
            "where" => "paises.id_idioma = 7"
                );
                            
        $obj_customer = $this->obj_customer->search($param_data);
        
        $date_start = "";
        $date_end = "";
        $pack = -1;
        $ranges = -1;
        $active = -1;
        
        //get kit
        $obj_kit = $this->get_kit();
        //get ranges
        $obj_ranges = $this->get_ranges();
        //send data
        $this->tmp_mastercms->set("date_start",$date_start);
        $this->tmp_mastercms->set("date_end",$date_end);
        $this->tmp_mastercms->set("pack",$pack);
        $this->tmp_mastercms->set("ranges",$ranges);
        $this->tmp_mastercms->set("active",$active);
        $this->tmp_mastercms->set("obj_customer",$obj_customer);
        $this->tmp_mastercms->set("obj_kit",$obj_kit);
        $this->tmp_mastercms->set("obj_ranges",$obj_ranges);
        $this->tmp_mastercms->render("dashboard/reporte_customer/report_customer_list");
    }
    
    public function load(){  
            //GER SESSION
            $this->get_session();
            //get kit
            $obj_kit = $this->get_kit();
            //get ranges
            $obj_ranges = $this->get_ranges();
            //send data
            
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $pack = $this->input->post('pack');
            $ranges = $this->input->post('ranges');
            $active = $this->input->post('active');
            
            if($date_start == ""){
                $where_date = "";
            }elseif ($date_end == "") {
                $where_date = "";
            }else{
                $where_date = "customer.created_at BETWEEN '$date_start' AND '$date_end'";
            }
            
            if($pack == -1){
                $where_kit = "";    
            }else{
                $where_kit = "and customer.kit_id = $pack";
            }
            
            if($ranges == -1){
                $where_range = "";    
            }else{
                $where_range = "and customer.range_id = $ranges";    
            }
            
            if($active == -1){
                $where_active = "";    
            }else{
                $where_active = "and customer.active = $active";
            }
                
        $where = "$where_date $where_kit $where_range $where_active";
        $param_data = array("select" =>"customer.customer_id,
                                        customer.username,
                                        customer.first_name,
                                        customer.last_name,
                                        customer.dni,
                                        paises.nombre as pais,
                                        customer.date_start,
                                        customer.phone,
                                        customer.active,
                                        kit.name as pack",
            "join" => array('paises, customer.country = paises.id',
                            'kit, customer.kit_id = kit.kit_id'),
            "where" => "$where and paises.id_idioma = 7"
                );
        $obj_customer = $this->obj_customer->search($param_data);
        
        //send data
        $this->tmp_mastercms->set("date_start",$date_start);
        $this->tmp_mastercms->set("date_end",$date_end);
        $this->tmp_mastercms->set("pack",$pack);
        $this->tmp_mastercms->set("ranges",$ranges);
        $this->tmp_mastercms->set("active",$active);
        $this->tmp_mastercms->set("obj_customer",$obj_customer);
        $this->tmp_mastercms->set("obj_kit",$obj_kit);
        $this->tmp_mastercms->set("obj_ranges",$obj_ranges);
        $this->tmp_mastercms->render("dashboard/reporte_customer/report_customer_list");
    }
    
    public function export(){  
            //GER SESSION
            $this->get_session();
            //send data
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $pack = $this->input->post('pack');
            $ranges = $this->input->post('ranges');
            $active = $this->input->post('active');
            
            if($date_start == ""){
                $where_date = "";
            }elseif ($date_end == "") {
                $where_date = "";
            }else{
                $where_date = "customer.created_at BETWEEN '$date_start' AND '$date_end'";
            }
            
            if($pack == -1){
                $where_kit = "";    
            }else{
                $where_kit = "and customer.kit_id = $pack";
            }
            
            if($ranges == -1){
                $where_range = "";    
            }else{
                $where_range = "and customer.range_id = $ranges";    
            }
            
            if($active == -1){
                $active = "";    
            }else{
                $active = "and customer.active = $active";
            }
              
        
        $where = "$where_date $where_kit $where_range $active";
        $param_data = array("select" =>"customer.customer_id as código,
                                        customer.username as usuario,
                                        customer.first_name as nombres,
                                        customer.last_name as apellidos,
                                        customer.dni as documento,
                                        paises.nombre as pais,
                                        customer.date_start as fecha_activacion,
                                        customer.phone as telefono,
                                        kit.name as pack,
                                        customer.active as estado",
            "join" => array('paises, customer.country = paises.id',
                            'kit, customer.kit_id = kit.kit_id'),
            "where" => "$where and paises.id_idioma = 7"
                );
        $obj_customer = $this->obj_customer->get_search_export($param_data);
        //export excel
        $this->export_excel->to_excel($obj_customer, "REPORTE DE CLIENTES", $date_start,$date_end);
    }
    
    public function get_kit(){  
        $param_kit = array("select" =>"kit_id,
                                        name,
                                        price",
                            "where" => "active = 1 and status_value = 1"
                            );
        $obj_kit = $this->obj_kit->search($param_kit);
        return $obj_kit;                 
    }
    
    public function get_ranges(){  
        $param_ranges = array("select" =>"range_id,
                                        name",
                            "where" => "active = 1 and status_value = 1"
                            );
        $obj_ranges = $this->obj_ranges->search($param_ranges);
        return $obj_ranges;                 
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