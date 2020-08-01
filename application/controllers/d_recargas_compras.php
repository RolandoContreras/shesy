<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_recargas_compras extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_comission");
    }   
                
    public function index(){  
        
           $this->get_session();
           //get comisiones por recarga
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    bonus.name as bonus,
                                    commissions.amount,
                                    commissions.active,
                                    commissions.date",
                        "join" => array('customer, customer.customer_id = commissions.customer_id',
                                        'bonus, bonus.bonus_id = commissions.bonus_id'),
                        "where" => "commissions.recarga = 1 and commissions.compras = 1"
                );            
            
            //GET DATA COMMISSIONS
            $obj_comission= $this->obj_comission->search($params);
            /// VISTA
            $this->tmp_mastercms->set("obj_comission",$obj_comission);
            $this->tmp_mastercms->render("dashboard/recargas_compras/recargas_compras_list");
    }

    public function load($comission_id=NULL){
            //OBTENER CLIENTES INACTIVOS
            if(isset($comission_id)){
                    
                    $params = array(
                        "select" =>"commissions.commissions_id,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.dni,
                                    bonus.name as bonus,
                                    commissions.amount,
                                    commissions.active,
                                    commissions.date",
                        "join" => array('customer, customer.customer_id = commissions.customer_id',
                                        'bonus, bonus.bonus_id = commissions.bonus_id'),
                        "where" => "commissions.commissions_id = $comission_id and commissions.recarga = 1 and commissions.compras = 1");            
                    //GET DATA COMMISSIONS
                    $obj_comission= $this->obj_comission->get_search_row($params);
                    $this->tmp_mastercms->set("obj_comission",$obj_comission);
            }
            $this->tmp_mastercms->render("dashboard/recargas_compras/recargas_compras_form");    
    }
    
    public function validate(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                $commissions_id = $this->input->post("commissions_id");
                $customer_id = $this->input->post("customer_id");
                $amount = $this->input->post("amount");
                $active = $this->input->post("active");
                if($customer_id != null){
                    if($commissions_id != null){
                        //updated
                        $data_comission = array(
                            'customer_id' => $customer_id,
                            'amount' => $amount,
                            'active' => $active,
                            'status_value' => 1,
                            'updated_at' => date("Y-m-d H:i:s"),
                            'updated_by' => $_SESSION['usercms']['user_id'],
                        );
                        $result = $this->obj_comission->update($commissions_id, $data_comission);
                    }else{
                        //insert
                        $data_comission = array(
                            'customer_id' => $customer_id,
                            'bonus_id' => 2,
                            'amount' => $amount,
                            'recarga' => 1,
                            'compras' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => $active,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        );
                        $result = $this->obj_comission->insert($data_comission);
                    }
                    if($result != null){
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
             $comission_id = $this->input->post("comission_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($comission_id != ""){
                $this->obj_comission->delete($comission_id);
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