<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_messages extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("messages_model","obj_messages");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            $params = array(
                        "select" =>"comments.comment_id,
                                    comments.name,
                                    comments.comment,
                                    comments.email,
                                    comments.active,
                                    comments.status_value,
                                    comments.date_comment",
                         "order" => "date_comment ASC"
            );
            //GET DATA COMMENTS
            $obj_comments= $this->obj_comments->search($params);
            
            
            /// PAGINADO
            $modulos ='comentarios'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_comments",$obj_comments);
            $this->tmp_mastercms->render("dashboard/comentarios/comments_list");
    }
    
    public function soporte(){
        
        //GET SESSION
        $this->get_session();
        $params = array(
                        "select" =>"messages.messages_id,
                                    customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    messages.date,
                                    messages.answer,
                                    messages.subject,
                                    messages.messages,
                                    messages.img,
                                    messages.active,
                                    ",
                        "where" => "messages.support = 1 and messages.status_value = 1",
                        "order" => "messages_id DESC",
                        "join" => array('customer, customer.customer_id = messages.customer_id')
                                        );
            $obj_message = $this->obj_messages->search($params);
            
            /// PAGINADO
            $modulos ='soporte'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_message",$obj_message);
            $this->tmp_mastercms->render("dashboard/messages/support_list");
    }
    
    public function update(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $message_id = $this->input->post("message_id");
                $message = $this->input->post("message");
                $customer_id = $this->input->post("customer_id");
                
                if(count($message_id) > 0){
                    $data = array(
                        'active' => 0,
                        'answer' => $message,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_messages->update($message_id,$data);
                    
                    //CREATE MESSAGES INFORMATIVO FOR CUSTOMER
                    $data_messages = array(
                        'customer_id' => $customer_id,
                        'date' => date("Y-m-d H:i:s"),
                        'label' => "Soporte",
                        'subject' => "Soporte - Respuesta",
                        'messages' => "Soporte acaba de responder tu solicitud",
                        'type' => 2,
                        'type_send' => 0,
                        'active' => 1,
                        'created_by' => $customer_id,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                    //INSERT MESSAGES    
                    $this->obj_messages->insert($data_messages);
                    
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