<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_invoices extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("kit_model","obj_kit");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                        "select" =>"invoices.invoice_id,
                                    invoices.date,
                                    invoices.img,
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
            
            /// PAGINADO
            $modulos ='facturas'; 
            $seccion = 'Lista';
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
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
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $invoice_id = $this->input->post("invoice_id");
        $kit_id = $this->input->post("kit");
        $img = $this->input->post("img2");
        $date =  $this->input->post('date');
        $active =  $this->input->post('active');
               
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/invoice';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img = $_FILES["image_file"]["name"];        
                 if($img == ""){
                     $img = $this->input->post("img2");
                 }   
            }
        //UPDATE DATA
        $data = array(
                'kit_id' => $kit_id,
                'img' => $img,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_invoices->update($invoice_id, $data);
        redirect(site_url()."dashboard/facturas");
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