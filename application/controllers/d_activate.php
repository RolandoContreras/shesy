<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_activate extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("invoice_catalog_model","obj_invoice_catalog");
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
    
    public function activaciones_catalogo(){  
        
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
                                    invoices.active",
                "join" => array('customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.type = 2 and invoices.status_value = 1",
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
            $this->tmp_mastercms->render("dashboard/activate/activate_catalogo_list");
    }
    
    public function order_catalog($invoice_id){  
        
           $this->get_session();
           $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.type,
                                    invoices.date,
                                    invoices.total,
                                    invoices.active,
                                    invoices.sub_total,
                                    invoices.igv,
                                    invoices.total,
                                    customer.email,
                                    customer.phone,
                                    customer.address,
                                    customer.first_name,
                                    customer.last_name,",
                        "where" => "invoices.invoice_id = $invoice_id and invoices.type = 2 and invoices.status_value = 1",
                        "join" => array('customer, customer.customer_id = invoices.customer_id'),
                        );

            $obj_invoices = $this->obj_invoices->get_search_row($params);
            
            //GET DATA PRICE CRIPTOCURRENCY
            $params = array(
                            "select" =>"invoice_catalog.quantity,
                                        invoice_catalog.price,
                                        invoice_catalog.option,
                                        invoice_catalog.sub_total,
                                        invoice_catalog.date,
                                        catalog.name",
                            "where" => "invoice_catalog.invoice_id = $invoice_id",
                            "join" => array('catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
                            );
            $obj_invoice_catalog = $this->obj_invoice_catalog->search($params);
  
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->set("obj_invoice_catalog",$obj_invoice_catalog);
            $this->tmp_mastercms->render("dashboard/activate/activate_catalogo_detail");
    }
    
    
    public function active(){
        //ACTIVE CUSTOMER NORMALY
        if($this->input->is_ajax_request()){  
                date_default_timezone_set('America/Lima');
                //SELECT CUSTOMER_ID
                $invoice_id = $this->input->post("invoice_id");
                $customer_id = $this->input->post("customer_id");
                $kit_id = $this->input->post("kit_id");
                $type = $this->input->post("type");
                
                
                    //GET DATA FROM TABLE KIT
                    $params = array(
                            "select" =>"bono_n1,
                                        bono_n2,
                                        bono_n3,
                                        bono_n4,
                                        bono_n5",
                            "where" => "kit_id = $kit_id"
                    );
                    //GET DATA FROM BONUS
                    $obj_kit = $this->obj_kit->get_search_row($params);
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
                        $this->pay_unilevel($ident,$new_parend_id,$invoice_id, $obj_kit->bono_n1,$obj_kit->bono_n2,$obj_kit->bono_n3,$obj_kit->bono_n4,$obj_kit->bono_n5);
                        //INSERT AMOUNT ON COMMISION TABLE    
                        $this->add_points($ident,$obj_kit->bono_n1,$obj_kit->bono_n2,$obj_kit->bono_n3,$obj_kit->bono_n4,$obj_kit->bono_n5);
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
        
    public function pay_unilevel($ident,$new_parend_id,$invoice_id,$bono_n1,$bono_n2,$bono_n3,$bono_n4,$bono_n5){
                
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
                            //INSERT COMMISSION TABLE
                            $data = array(
                                'invoice_id' => $invoice_id,
                                'customer_id' => $new_parend_id,
                                'bonus_id' => 1,
                                'amount' => $bono_n1,
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
                                          $amount = $bono_n2;      
                                          break;
                                        case 2:
                                          $amount = $bono_n3;      
                                          break;
                                        case 3:
                                          $amount = $bono_n4;      
                                          break;
                                        case 4:
                                          $amount = $bono_n5;      
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
        
    public function add_points($ident,$bono_n1,$bono_n2,$bono_n3,$bono_n4,$bono_n5){
        
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
                                    switch ($x) {
                                        case 0:
                                          $point = $bono_n1;      
                                          break;
                                        case 1:
                                          $point = $bono_n2;      
                                          break;
                                        case 2:
                                          $point = $bono_n3;      
                                          break;
                                        case 3:
                                          $point = $bono_n4;      
                                          break;
                                        case 4:
                                          $point = $bono_n5;      
                                          break;
                                    }
                                    
                                    //INSERT POINTS TABLE
                                       $data = array(
                                          'customer_id' => $new_ident[$x] ,
                                          'point' => $point ,
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