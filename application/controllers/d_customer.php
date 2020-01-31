<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_customer extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("paises_model","obj_paises");
        $this->load->model("ranges_model","obj_ranges");
        $this->load->model("kit_model","obj_kit");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.bank_id,
                                    customer.email,
                                    customer.last_name,
                                    customer.active_month,
                                    customer.created_at,
                                    customer.active,
                                    kit.name as kit,
                                    customer.status_value",
                        "where" =>"customer.status_value = 1",
                        "join" => array('kit, kit.kit_id = customer.kit_id'),
               );
           //GET DATA FROM CUSTOMER
           $obj_customer= $this->obj_customer->search($params);
  
           /// PAGINADO
            $modulos ='clientes'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/clientes'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->render("dashboard/customer/customer_list");
    }
    
    public function validate(){
        
        //fecha inicio de pago
        $date_start = $this->input->post('date_start');
        if($date_start == ""){
           $date_start = null; 
        }else{
            $date_start = $this->input->post('date_start');
        }
        $kit =  $this->input->post('kit');
        $range =  $this->input->post('rango');
        
        //GET CUSTOMER_ID
        $customer_id = $this->input->post("customer_id");
        $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name   ' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'range_id' => $range,
                'email' => $this->input->post('email'),
                'dni' => $this->input->post('dni'),  
                'date_start' => $date_start,  
                'date_month' => $this->input->post('date_month'),  
                'phone' => $this->input->post('phone'),
                'country' => $this->input->post('pais'),
                'kit_id' => $kit,
                'address' => $this->input->post('address'),
                'bank_id' => $this->input->post('bank_id'),
                'bank_account' => $this->input->post('bank_account'),
                'bank_number' => $this->input->post('bank_number'),
                'bank_number_cci' => $this->input->post('bank_number_cci'),
                'active_month' => $this->input->post('active_month'),
                'active' => $this->input->post('active'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_customer->update($customer_id, $data);
        redirect(site_url()."dashboard/clientes");
    }
    
    public function load($obj_customer=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($obj_customer != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "customer.customer_id = $obj_customer";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_customer  = $this->obj_customer->get_search_row($params); 
            
            //RENDER
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
          }
          
            //SELECT PAISES
            $params = array("select" => "",
                            "where" => "id_idioma = 7");
            $obj_paises  = $this->obj_paises->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_paises",$obj_paises);
            
            //SELECT RANGES
            $params = array("select" => "*");
            $obj_ranges  = $this->obj_ranges->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_ranges",$obj_ranges);
            
            //SELECT PAQUETES
            $params = array("select" => "");
            $obj_franchise  = $this->obj_kit->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_kit",$obj_franchise); 
            
            $modulos ='clientes'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/customer/customer_form");    
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