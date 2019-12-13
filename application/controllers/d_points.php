<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_points extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("points_model","obj_points");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"points.point_id,
                                    points.customer_id,
                                    points.point,
                                    points.date,
                                    points.active,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name",
                "join" => array( 'customer, points.customer_id = customer.customer_id'),
                "where" => "points.status_value = 1",
                "order" => "points.point_id DESC");
           //GET DATA FROM CUSTOMER
        $obj_points = $this->obj_points->search($params);
        
           /// PAGINADO
            $modulos ='videos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/videos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_points",$obj_points);
            $this->tmp_mastercms->render("dashboard/puntos/points_list");
    }
    
    public function load($point_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($point_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"points.point_id,
                                    points.customer_id,
                                    points.point,
                                    points.date,
                                    points.active,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name",
                "join" => array( 'customer, points.customer_id = customer.customer_id'),
                "where" => "points.point_id = $point_id");
            $obj_points  = $this->obj_points->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_points",$obj_points);
          }
      
            $modulos ='puntos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/puntos/points_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $point_id = $this->input->post("point_id");
        $point = $this->input->post("point");
        $date = formato_fecha_db_mes_dia_ano($this->input->post('date'));
        $active =  $this->input->post('active');
        
            $data = array(
                'point' => $point,
                'date' => $date,
                'active' => $active,  
                'status_value' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            
             $this->obj_points->update($point_id, $data);        
            //SAVE DATA IN TABLE    
         
        redirect(site_url()."dashboard/puntos");
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