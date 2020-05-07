<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_recargas extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("points_model","obj_points");
    }   
                
    public function index(){  
        
           $this->get_session();
            $params = array(
                        "select" =>"points.point_id,
                                    points.customer_id,
                                    points.point,
                                    points.date,
                                    points.active,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name",
                "join" => array( 'customer, points.customer_id = customer.customer_id'),
                "where" => "points.recargas =1 and points.status_value = 1",
                "order" => "points.point_id DESC");
           //GET DATA FROM CUSTOMER
            $obj_points = $this->obj_points->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_points",$obj_points);
            $this->tmp_mastercms->render("dashboard/recargas/recargas_list");
    }

    public function load($recargas_id=NULL){
            //OBTENER CLIENTES INACTIVOS
            if(isset($recargas_id)){
                    $params = array(
                        "select" =>"username,
                                    first_name,
                                    last_name,
                                    dni,
                                    customer_id",
                        "where" => "active = 0",
                    );
                    //GET DATA COMMENTS
                    $obj_customer = $this->obj_customer->search($params);
                    $this->tmp_mastercms->set("obj_customer",$obj_customer);
            }
            $this->tmp_mastercms->render("dashboard/recargas/recargas_form");    
    }
    
    public function validate(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                $customer_id = $this->input->post("customer_id");
                $points = $this->input->post("points");
                
                if($customer_id != null){
                    //CREATE recarga
                    $data_invoice = array(
                        'customer_id' => $customer_id,
                        'point' => $points,
                        'recargas' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                    $invoice_id = $this->obj_points->insert($data_invoice);
                    if($invoice_id != null){
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                    }
                }else{
                    $data['status'] = false;                
                }
                
                echo json_encode($data); 
                exit();
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
            $data['name'] = $customer->first_name." ".$customer->last_name;
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
    
    public function delete(){
         if ($this->input->is_ajax_request()) {
             //OBETENER MARCA_ID
             $point_id = $this->input->post("point_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($point_id != ""){
                $this->obj_points->delete($point_id);
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
        }       
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