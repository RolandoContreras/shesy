<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_embassy extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("embassy_model","obj_embassy");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"embassy_id,
                                    name,
                                    last_name,
                                    phone,
                                    email,
                                    date,
                                    active",
                "where" => "status_value = 1",
                "order" => "embassy_id DESC");
           //GET DATA FROM CUSTOMER
        $obj_embassy = $this->obj_embassy->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_embassy",$obj_embassy);
        $this->tmp_mastercms->render("dashboard/embassy/embassy_list");
    }
    
    public function change_status(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
              $comment_id = $this->input->post("embassy_id");
              
                if(count($comment_id) > 0){
                    $data = array(
                        'active' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_embassy->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function change_status_no(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $comment_id = $this->input->post("embassy_id");
                if(count($comment_id) > 0){
                    $data = array(
                        'active' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_embassy->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
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