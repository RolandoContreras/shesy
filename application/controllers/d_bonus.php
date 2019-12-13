<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_bonus extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("bonus_model","obj_bonus");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                            "select" =>"bonus_id,
                                        name,
                                        percent,
                                        active,
                                        status_value",
                            );            
            //GET DATA COMMISSIONS
            $obj_bonus= $this->obj_bonus->search($params);
            
            /// PAGINADO
            $modulos ='bonos'; 
            $seccion = 'Lista';
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_bonus",$obj_bonus);
            $this->tmp_mastercms->render("dashboard/bonus/bonus_list");
    }
    
    public function load($bonus_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($bonus_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"*",
                         "where" => "bonus_id = $bonus_id",
            ); 
            $obj_bonus  = $this->obj_bonus->get_search_row($params); 
                       
            //RENDER
            $this->tmp_mastercms->set("obj_bonus",$obj_bonus);
          }
      
            $modulos ='bonos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/bonus/bonus_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $bonus_id = $this->input->post("bonus_id");
        $name =  $this->input->post('name');
        $percent =  $this->input->post('percent');
        $active =  $this->input->post('active');
        
        //UPDATE DATA
        $data = array(
                'bonus_id' => $bonus_id,
                'name' => $name,
                'percent' => $percent,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_bonus->update($bonus_id, $data);
        redirect(site_url()."dashboard/bonos");
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