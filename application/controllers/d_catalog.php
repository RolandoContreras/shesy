<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_catalog extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("catalog_model","obj_catalog");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.price,
                                    catalog.description,
                                    catalog.img,
                                    catalog.active,
                                    catalog.date",
                "where" => "catalog.active = 1 and catalog.status_value = 1",
                "order" => "catalog.catalog_id DESC");
           //GET DATA FROM CUSTOMER
        $obj_catalog = $this->obj_catalog->search($params);
        
            
            /// VISTA
            $this->tmp_mastercms->set("obj_catalog",$obj_catalog);
            $this->tmp_mastercms->render("dashboard/catalogo/catalog_list");
    }
    
    public function load($catalog_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($catalog_id != ""){
            /// PARAM FOR SELECT 
            $where = "catalog_id = $catalog_id";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_catalog  = $this->obj_catalog->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_catalog",$obj_catalog);
          }
            $this->tmp_mastercms->render("dashboard/catalogo/catalog_form");    
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