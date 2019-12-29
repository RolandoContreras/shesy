<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("kit_model","obj_kit");
        $this->load->model("bonus_model","obj_bonus");
        $this->load->model("points_model","obj_points");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.total,
                                    invoices.img,
                                    invoices.type,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    kit.kit_id,
                                    kit.price,
                                    kit.name,
                                    invoices.active",
                "join" => array( 'kit, invoices.kit_id = kit.kit_id',
                                 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.status_value = 1",
                "order" => "invoices.invoice_id ASC");
           //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->search($params);
           
           /// PAGINADO
            $modulos ='activaciones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/activaciones'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }
    
    public function active(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $invoice_id = $this->input->post("invoice_id");
                $customer_id = $this->input->post("customer_id");
                $kit_id = $this->input->post("kit_id");
                $total = $this->input->post("total");
                $type = $this->input->post("type");
                
                    //GET DATA CUSTOMER UNILEVEL
                    $params = array(
                            "select" =>"parend_id,
                                        ident,
                                        new_parend_id",
                            "where" => "customer_id = $customer_id"
                    );
                    //GET DATA FROM BONUS
                    $obj_unilevel = $this->obj_unilevel->get_search_row($params);
                    
                    if(count($obj_unilevel) > 0){
                        $ident = $obj_unilevel->ident;
                        $new_parend_id = $obj_unilevel->new_parend_id;
                        
                        //INSERT AMOUNT ON COMMISION TABLE    
                        $this->pay_unilevel($total,$ident,$new_parend_id,$invoice_id);
                        //INSERT AMOUNT ON COMMISION TABLE    
                        $this->add_points($total,$ident);
                    }
                    
                    //verify if type = 1 "activayte kit" or type = 2 "buy catalog" 
                   if($type == 1){
                       //UPDATE TABLE CUSTOMER ACTIVE = 1    
                        $data = array(
                            'active' => 1,
                            'kit_id' => $kit_id,
                            'date_start' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s"),
                            'updated_by' => $_SESSION['usercms']['user_id'],
                        ); 
                        $this->obj_customer->update($customer_id,$data);
                   } 
                    
                 //UPDATE TABLE INVOICE ACTIVE = 2 (PROCESADO)    
                    $data_invoice = array(
                        'active' => 2,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_invoices->update($invoice_id,$data_invoice);   
                
                echo json_encode($data); 
                exit();
            }
    }
        
    public function pay_unilevel($total,$ident,$new_parend_id,$invoice_id){
                
                $new_ident = explode(",", $ident);
                rsort($new_ident);

                //BOUCLE ULTI 5 LEVEL
                for ($x = 0; $x <= 4; $x++) {
                    if($x == 0){
                        //get customer active
                        $params = array(
                                "select" =>"active",
                                "where" => "customer_id = $new_parend_id"
                        );
                        //GET DATA FROM BONUS
                        $obj_customer = $this->obj_customer->get_search_row($params);
                        
                        if($obj_customer->active == 1){
                            //GET 5%
                            $total_0 = $total * 0.05; 
                            //INSERT COMMISSION TABLE
                            $data = array(
                                'invoice_id' => $invoice_id,
                                'customer_id' => $new_parend_id,
                                'bonus_id' => 1,
                                'amount' => $total_0,
                                'active' => 1,
                                'status_value' => 1,
                                'date' => date("Y-m-d H:i:s"),
                                'created_at' => date("Y-m-d H:i:s"),
                                'created_by' => $_SESSION['usercms']['user_id'],
                            ); 
                            $this->obj_commissions->insert($data);
                        }
                    }else{
                        if(isset($new_ident[$x])){
                            if($new_ident[$x] != ""){
                                //get customer active
                                $params = array(
                                        "select" =>"active",
                                        "where" => "customer_id = $new_ident[$x]"
                                );
                                //GET DATA FROM BONUS
                                $obj_customer = $this->obj_customer->get_search_row($params);

                                if($obj_customer->active == 1){
                                    //INSERT COMMISSION TABLE
                                    switch ($x) {
                                        case 1:
                                          $amount = $total * 0.04;      
                                          break;
                                        case 2:
                                          $amount = $total * 0.03;      
                                          break;
                                        case 3:
                                          $amount = $total * 0.02;      
                                          break;
                                        case 4:
                                          $amount = $total * 0.01;      
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
        }    
        
    public function add_points($total,$ident){
        
                //GET PERCENT FROM BONUS
               $new_ident = explode(",", $ident);
               rsort($new_ident);
               
               //BOUCLE ULTI 5 LEVEL
                for ($x = 0; $x <= 4; $x++) {
                        if(isset($new_ident[$x])){
                            if($new_ident[$x] != ""){
                                //get customer active
                                $params = array(
                                        "select" =>"active",
                                        "where" => "customer_id = $new_ident[$x]"
                                );
                                //GET DATA FROM BONUS
                                $obj_customer = $this->obj_customer->get_search_row($params);

                                if($obj_customer->active == 1){
                                    //INSERT POINTS TABLE
                                       $data = array(
                                          'customer_id' => $new_ident[$x] ,
                                          'point' => $total ,
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