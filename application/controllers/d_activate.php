<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("kit_model","obj_kit");
        $this->load->model("sell_model","obj_sell");
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
                "where" => "invoices.type = 1 and invoices.status_value = 1",
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
    
    public function active_financy(){
        //ACTIVE CUSTOMER FINANCADO
        if($this->input->is_ajax_request()){ 
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $invoice_id = $this->input->post("invoice_id");
                $customer_id = $this->input->post("customer_id");
                $kit_id = $this->input->post("kit_id");
                //GET DATA TODAY
                $today = date('Y-m-j');
                
                if(count($invoice_id) > 0){
                //UPDATE TABLE CUSTOMER ACTIVE = 1    
                    $data = array(
                        'active' => 1,
                        'kit_id' => $kit_id,
                        'date_start' => $today,
                        'financy' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                    
                 //UPDATE TABLE INVOICE ACTIVE = 2 (PROCESADO)    
                    $data_invoice = array(
                        'active' => 2,
                        'financy' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_invoices->update($invoice_id,$data_invoice);   
                }
                echo json_encode($data); 
                exit();
            }
    }
    
    public function active(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $invoice_id = $this->input->post("invoice_id");
                $customer_id = $this->input->post("customer_id");
                $kit_id = $this->input->post("kit_id");
                $price = $this->input->post("price");
                //GET DATA TODAY
                $today = date('Y-m-j');
                //insert data on sell table
                    $data = array(
                        'invoice_id' => $invoice_id,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $sell_id = $this->obj_sell->insert($data);
                    
                if($kit_id > 1){
                    
                    //GET DATA PARENT
                    $params = array(
                            "select" =>"parend_id",
                            "where" => "customer_id = $customer_id"
                    );
                    //GET DATA FROM BONUS
                    $obj_unilevel = $this->obj_unilevel->get_search_row($params);
                    $parend_id = $obj_unilevel->parend_id;
                    
                    //GET DATA CUSTOMER
                    $params = array(
                            "select" =>"active",
                            "where" => "customer_id = $parend_id"
                    );
                    //GET DATA FROM BONUS
                    $obj_customer = $this->obj_customer->get_search_row($params);
                    $active = $obj_customer->active;
                    
                    //INSERT AMOUNT ON COMMISION TABLE    
                    $this->pay_directo($customer_id,$price,$parend_id,$sell_id,$active);
                    //INSERT AMOUNT ON COMMISION TABLE    
                    $this->pay_unilevel_maching($customer_id,$price,$parend_id,$sell_id,$active);
                    //INSERT AMOUNT ON COMMISION TABLE    
                    $this->add_points($customer_id,$price);
                }
                
                //UPDATE TABLE CUSTOMER ACTIVE = 1    
                    $data = array(
                        'active' => 1,
                        'kit_id' => $kit_id,
                        'date_start' => $today,
                        'financy' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                    
                 //UPDATE TABLE INVOICE ACTIVE = 2 (PROCESADO)    
                    $data_invoice = array(
                        'active' => 2,
                        'financy' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_invoices->update($invoice_id,$data_invoice);   
                
                    
                echo json_encode($data); 
                exit();
            }
    }
 
    public function pay_directo($customer_id,$price,$parend_id,$sell_id,$active){
        
                //GET PERCENT FROM BONUS
                $params = array(
                        "select" =>"percent",
                        "where" => "bonus_id = 1 and active = 1"
               );
                //GET DATA FROM BONUS
                $obj_bonus= $this->obj_bonus->get_search_row($params);
                $percet = $obj_bonus->percent;
                //CALCULE % AMOUNT
                $amount = ($price  * $percet) / 100;
                
                //INSERT SELL TABLE
                    if($active == 1){
                        //INSERT COMMISSION TABLE
                        $data = array(
                            'sell_id' => $sell_id,
                            'customer_id' => $parend_id,
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
        
    public function pay_unilevel_maching($customer_id,$price,$parend_id,$sell_id,$active){
            
                //GET PERCENT FROM BONUS UNILEVEL
                $params = array(
                        "select" =>"percent,
                                    (select percent from bonus where bonus_id = 3) as percent_maching",
                        "where" => "bonus_id = 2 and active = 1"
                );
                $obj_bonus= $this->obj_bonus->get_search_row($params);
                $percet = $obj_bonus->percent;
                $percent_maching = $obj_bonus->percent_maching;
                
                //CALCULE % AMOUNT
                $amount = ($price  * $percet) / 100;
                $amount_maching = ($amount  * $percet) / 100;
                
                //insert table 10 level
                if(count($customer_id) > 0){
                    //VERIFY IF ACTIVE
                    if($active == 1){
                        $data = array(
                            'sell_id' => $sell_id,
                            'customer_id' => $parend_id,
                            'bonus_id' => 2,
                            'amount' => $amount,
                            'active' => 1,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $_SESSION['usercms']['user_id'],
                        ); 
                        $this->obj_commissions->insert($data); 
                        $no_insert =  0;
                    }else{
                        $no_insert =  1;
                    }
                    
                    for ($x = 1; $x <= 9; $x++) {
                        //GET DATA PARENT
                        if($parend_id != ""){
                            $params = array(
                                    "select" =>"parend_id",
                                    "where" => "customer_id = $parend_id"
                            );
                            
                            //GET DATA FROM BONUS
                            $obj_unilevel = $this->obj_unilevel->get_search_row($params);

                            if(count($obj_unilevel) > 0){
                                $parend_id = $obj_unilevel->parend_id;
                                
                                    $params = array(
                                                    "select" =>"active",
                                                    "where" => "customer_id = $parend_id"
                                                    );
                                    //GET DATA FROM customer
                                    $obj_customer = $this->obj_customer->get_search_row($params);
                                    $active = $obj_customer->active;
                                    
                                        if($active == 1){
                                            //INSERT COMMISSION TABLE
                                                $data = array(
                                                    'sell_id' => $sell_id,
                                                    'customer_id' => $parend_id,
                                                    'bonus_id' => 2,
                                                    'amount' => $amount,
                                                    'active' => 1,
                                                    'status_value' => 1,
                                                    'date' => date("Y-m-d H:i:s"),
                                                    'created_at' => date("Y-m-d H:i:s"),
                                                    'created_by' => $_SESSION['usercms']['user_id'],
                                                ); 
                                                $this->obj_commissions->insert($data);
                                                
                                                if($no_insert == 0){
                                                    $data_maching = array(
                                                                        'sell_id' => $sell_id,
                                                                        'customer_id' => $parend_id,
                                                                        'bonus_id' => 3,
                                                                        'amount' => $amount_maching,
                                                                        'active' => 1,
                                                                        'status_value' => 1,
                                                                        'date' => date("Y-m-d H:i:s"),
                                                                        'created_at' => date("Y-m-d H:i:s"),
                                                                        'created_by' => $_SESSION['usercms']['user_id'],
                                                                        ); 
                                                    $this->obj_commissions->insert($data_maching);
                                                }
                                                $no_insert = 0;
                                        }else{
                                            $no_insert = 1;
                                        }
                                }
                        }
                    }
                    if($parend_id != ""){
                        //GET LAST PAREND
                        $params = array(
                                    "select" =>"parend_id",
                                    "where" => "customer_id = $parend_id"
                            );
                        $obj_unilevel = $this->obj_unilevel->get_search_row($params);
                            //GET DATA FROM BONUS
                            if(count($obj_unilevel) > 0){
                                $parend_id = $obj_unilevel->parend_id;
                                    $params = array(
                                                    "select" =>"active",
                                                    "where" => "customer_id = $parend_id"
                                                    );
                                    //GET DATA FROM customer
                                    $obj_customer = $this->obj_customer->get_search_row($params);
                                    $active = $obj_customer->active;
                                        if($active == 1){
                                            if($no_insert == 0){
                                                //INSERT COMMISSION TABLE MACHING
                                                    $data_maching = array(
                                                        'sell_id' => $sell_id,
                                                        'customer_id' => $parend_id,
                                                        'bonus_id' => 3,
                                                        'amount' => $amount_maching,
                                                        'active' => 1,
                                                        'status_value' => 1,
                                                        'date' => date("Y-m-d H:i:s"),
                                                        'created_at' => date("Y-m-d H:i:s"),
                                                        'created_by' => $_SESSION['usercms']['user_id'],
                                                    ); 
                                                    $this->obj_commissions->insert($data_maching);
                                            }
                                        }
                                }
                    }
                }
        }    
        
    public function add_points($customer_id,$price){
        
                //GET PERCENT FROM BONUS
                $params = array(
                        "select" =>"ident",
                        "where" => "customer_id = $customer_id"
               );
               $obj_unilevel = $this->obj_unilevel->get_search_row($params);
               $ident = $obj_unilevel->ident;
               $iden_id = explode(",", $ident);
               $date = date("Y-m-d H:i:s");
               
               foreach ($iden_id as $key => $value) {
                   $data = array(
                      'customer_id' => $value ,
                      'point' => $price ,
                      'date' => $date,
                      'active' => 1,
                      'status_value' => 1
                   );
                   $this->obj_points->insert($data);
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