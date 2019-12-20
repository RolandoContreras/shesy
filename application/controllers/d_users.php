<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_Users extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("users_model","obj_users");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array("select" =>"*");
           //GET DATA FROM CUSTOMER
           $obj_users= $this->obj_users->search($params);
  
           /// PAGINADO
            $modulos ='usuarios'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/usuarios'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_users",$obj_users);
            $this->tmp_mastercms->render("dashboard/users/users_list");
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $user_id = $this->input->post("user_id");
        
        if($user_id != ""){
            //PARAM DATA
            $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name   ' => $this->input->post('last_name'),
               'password' => $this->input->post('password'),
               'email' => $this->input->post('email'),
               'privilage' => $this->input->post('privilage'),
               'active' => $this->input->post('active'),
               'updated_at' => date("Y-m-d H:i:s"),
               'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_users->update($user_id, $data);
        }else{
            //PARAM DATA
            $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name   ' => $this->input->post('last_name'),
               'password' => $this->input->post('password'),
               'email' => $this->input->post('email'),
               'privilage' => $this->input->post('privilage'),
               'active' => $this->input->post('active'),
               'created_at' => date("Y-m-d H:i:s"),
               'created_by' => $_SESSION['usercms']['user_id'],
                );          
            //SAVE DATA IN TABLE    
            $this->obj_users->insert($data);
        }
        redirect(site_url()."dashboard/usuarios");
    }
    
    public function load($obj_user=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        if ($obj_user != ""){
            /// PARAMETROS PARA EL SELECT 
            $where = "user_id = $obj_user";
            $params = array(
                        "select" =>"*",
                         "where" => $where,
            ); 
            $obj_users  = $this->obj_users->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_users",$obj_users);
          }
      
            $modulos ='usuarios'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/users/users_form");    
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