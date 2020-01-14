<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_invoices extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("invoice_catalog_model","obj_invoice_catalog");
        $this->load->model("kit_model","obj_kit");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.type,
                                    invoices.total ,
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
            
            /// VISTA
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->render("dashboard/invoices/invoices_list");
    }
    
    public function load($invoice_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($invoice_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.img,
                                    invoices.type,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    kit.price,
                                    kit.kit_id,
                                    invoices.active",
                "join" => array( 'kit, invoices.kit_id = kit.kit_id',
                                 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.invoice_id = $invoice_id");
            //GET DATA FROM CUSTOMER
            $obj_invoices  = $this->obj_invoices->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
          }
          
          //SELECT PAQUETES
            $params = array("select" => "");
            $obj_kit  = $this->obj_kit->search($params);   
            //RENDER TO VIEW
            $this->tmp_mastercms->set("obj_kit",$obj_kit); 
      
            $modulos ='facturas'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/invoices/invoices_form");    
    }
    
    public function catalogo_load($invoice_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($invoice_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.type,
                                    invoices.total,
                                    invoices.delivery,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    invoices.active",
                "join" => array( 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.invoice_id = $invoice_id");
            //GET DATA FROM CUSTOMER
            $obj_invoices  = $this->obj_invoices->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
          }
            $this->tmp_mastercms->render("dashboard/invoices/invoices_form_catalogo");    
    }
    
    public function ver_invoice($invoice_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
         /// PARAM FOR SELECT 
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
            $this->tmp_mastercms->render("dashboard/invoices/invoices_ver");    
    }
    
    public function catalogo(){  
            //GER SESSION   
            $this->get_session();
            //GET DATA INVOICE CATALOGO
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.type,
                                    invoices.total,
                                    invoices.delivery,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    invoices.active",
                "join" => array( 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "invoices.type = 2 and invoices.status_value = 1",
                "order" => "invoices.invoice_id ASC");
            //GET DATA FROM CUSTOMER
            $obj_invoices = $this->obj_invoices->search($params);

            /// PAGINADO
            $modulos ='facturas'; 
            $seccion = 'Lista';
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_invoices",$obj_invoices);
            $this->tmp_mastercms->render("dashboard/invoices/invoices_list_catalogo");
    }
    
    public function catalogo_entregado(){
        if($this->input->is_ajax_request()){
            $invoice_id = $this->input->post("invoice_id");
        //UPDATE DATA
        $data = array(
                'delivery' => 0,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_invoices->update($invoice_id, $data);
            echo json_encode($data);       
       } 
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $invoice_id = $this->input->post("invoice_id");
        $kit_id = $this->input->post("kit");
        $date =  $this->input->post('date');
        $active =  $this->input->post('active');
        //UPDATE DATA
        $data = array(
                'kit_id' => $kit_id,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_invoices->update($invoice_id, $data);
        redirect(site_url()."dashboard/facturas");
    }
    
    public function catalogo_validate(){
        
        //GET CUSTOMER_ID
        $invoice_id = $this->input->post("invoice_id");
        $date =  $this->input->post('date');
        $total =  $this->input->post('total');
        $active =  $this->input->post('active');
   
        //UPDATE DATA
        $data = array(
                'total' => $total,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_invoices->update($invoice_id, $data);
        redirect(site_url()."dashboard/facturas_catalogo");
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