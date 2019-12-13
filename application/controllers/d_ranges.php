<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_ranges extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("ranges_model","obj_ranges");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                            "select" =>"range_id,
                                        name,
                                        point_personal,
                                        point_grupal,
                                        img,
                                        active",
                            );            
            //GET DATA COMMISSIONS
            $obj_ranges= $this->obj_ranges->search($params);
            
            /// PAGINADO
            $modulos ='rangos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_ranges",$obj_ranges);
            $this->tmp_mastercms->render("dashboard/ranges/ranges_list");
    }
    
    public function load($range_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($range_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"*",
                         "where" => "range_id = $range_id",
            ); 
            $obj_ranges  = $this->obj_ranges->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_ranges",$obj_ranges);
          }
      
            $modulos ='rangos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/ranges/ranges_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $range_id = $this->input->post("range_id");
        $name =  $this->input->post('name');
        $img = $this->input->post("img2");
        $point_personal =  $this->input->post('point_personal');
        $point_grupal =  $this->input->post('point_grupal');
        $active =  $this->input->post('active');
        
        
        if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/images/rangos';
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
                'name' => $name,
                'point_personal' => $point_personal,
                'point_grupal' => $point_grupal,
                'img' => $img,
                'active' => $active,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
            //SAVE DATA IN TABLE    
            $this->obj_ranges->update($range_id, $data);
        redirect(site_url()."dashboard/rangos");
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