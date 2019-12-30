<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_pays extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commission");
        $this->load->model("pay_commission_model","obj_pay_commission");
        $this->load->model("pay_model","obj_pay");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"pay.pay_id,
                                    pay.date,
                                    pay.amount,
                                    pay.descount,
                                    pay.amount_total,
                                    pay.active,
                                    customer.customer_id,
                                    customer.first_name,
                                    customer.username,
                                    customer.bank_id,
                                    customer.last_name",
                        "join" => array('customer, pay.customer_id = customer.customer_id'),
                        "order" => "pay.pay_id DESC"
               );
           //GET DATA FROM CUSTOMER
           $obj_pay= $this->obj_pay->search($params);
           
           /// PAGINADO
            $modulos ='pagos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/pagos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pay",$obj_pay);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_list");
    }
    
    public function pagado(){
        if($this->input->is_ajax_request()){  
            ///GET PAY_ID
            $pay_id = $this->input->post("pay_id");
            //UPDATE FILES PAY
            $data_pay = array(
                        'active' => 2,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $this->obj_pay->update($pay_id,$data_pay);
            $data['message'] = "true";
            echo json_encode($data); 
            exit();
        }
    }
    
    public function devolver(){
        if($this->input->is_ajax_request()){  
            ///GET PAY_ID
            $pay_id = $this->input->post("pay_id");
            
            //UPDATE FILES PAY
            $data_pay = array(
                        'active' => 3,
                        'updated_by' =>  $_SESSION['usercms']['user_id'],
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $this->obj_pay->update($pay_id,$data_pay);
            
            //SELECT COMISSION
            $params = array(
                        "select" =>"commissions_id",
                         "where" => "pay_id = $pay_id",
            ); 
            $obj_pays  = $this->obj_pay_commission->get_search_row($params); 
            $commissions_id = $obj_pays->commissions_id;
            //UPDATE DATE
            $data = array(
                    'amount' => 0,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
            );          
            $this->obj_commission->update($commissions_id, $data);
            
            $data['message'] = "true";
            echo json_encode($data); 
            exit();
        }
    }
    
    public function load($pay_id=NULL){
            /// PARAMETROS PARA EL SELECT 
            $params = array(
                        "select" =>"pay.pay_id,
                                    pay.amount,
                                    pay.descount,
                                    pay.amount_total,
                                    pay.date,
                                    pay.active,
                                    pay.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.username",
                         "where" => "pay_id = $pay_id",
                         "join" => array('customer, pay.customer_id = customer.customer_id'),
            ); 
            $obj_pays  = $this->obj_pay->get_search_row($params); 
            
            $modulos ='pagos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_pays",$obj_pays);
            $this->tmp_mastercms->render("dashboard/pagos/pagos_form");    
    }
    
    public function validate(){
        
        $pay_id =  $this->input->post('pay_id');
        $amount =  $this->input->post('amount');
        $descount =  $this->input->post('descount');
        $amount_total =  $this->input->post('amount_total');
        $date = $this->input->post('date');
        $active =  $this->input->post('active');
        
        //UPDATE DATA PAY
        $data = array(
                'amount' => $amount,
                'descount' => $descount,
                'amount_total' => $amount_total,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_pay->update($pay_id, $data);
            
            //SELECT COMISSION
            $params = array(
                        "select" =>"commissions_id",
                         "where" => "pay_id = $pay_id",
            ); 
            $obj_pays  = $this->obj_pay_commission->get_search_row($params); 
            $commissions_id = $obj_pays->commissions_id;
            
            //UPDATE DATA PAY COMISSION
            $data = array(
                    'amount' => -$amount,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
            );          
            //SAVE DATA IN TABLE    
            $this->obj_commission->update($commissions_id, $data);
        redirect(site_url()."dashboard/pagos");
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