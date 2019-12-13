<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_comission extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("commissions_model","obj_comission");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    bonus.name as bonus,
                                    commissions.amount,
                                    commissions.active,
                                    commissions.date",
                        "join" => array('customer, customer.customer_id = commissions.customer_id',
                                        'bonus, bonus.bonus_id = commissions.bonus_id'),
                         "order" => "commissions.commissions_id DESc"              
                                        );            
            
            //GET DATA COMMISSIONS
            $obj_comission= $this->obj_comission->search($params);
            
            /// PAGINADO
            $modulos ='comisiones'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_comission",$obj_comission);
            $this->tmp_mastercms->render("dashboard/comisiones/comission_list");
    }
    
    public function load($commissions_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($commissions_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"commissions.commissions_id,
                                    commissions.customer_id,
                                    commissions.date,
                                    commissions.amount,
                                    commissions.bonus_id,
                                    commissions.active,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.username,",
                         "where" => "commissions_id = $commissions_id",
                         "join" => array('customer, commissions.customer_id = customer.customer_id')
            ); 
            $obj_comission  = $this->obj_comission->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_comission",$obj_comission);
          }
      
            $modulos ='comisiones'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/comisiones/comission_form");    
    }
    
    public function validate(){
        
        $commissions_id =  $this->input->post('commissions_id');
        $amount =  $this->input->post('amount');
        $bonus_id =  $this->input->post('bonus_id');
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $active =  $this->input->post('active');
        
        //UPDATE DATA
        $data = array(
                'commissions_id' => $commissions_id,
                'amount' => $amount,
                'bonus_id' => $bonus_id,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
        
            $this->obj_comission->update($commissions_id, $data);
        redirect(site_url()."dashboard/comisiones");
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