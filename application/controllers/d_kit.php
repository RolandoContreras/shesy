<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_kit extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("kit_model","obj_kit");
    }   
                
    public function index(){  
            //GER SESSION   
            $this->get_session();
            $params = array(
                            "select" =>"kit_id,
                                        name,
                                        price,
                                        point,
                                        img,
                                        active,
                                        description,
                                        status_value",
                            );            
            //GET DATA COMMISSIONS
            $obj_kit= $this->obj_kit->search($params);
            
            /// PAGINADO
            $modulos ='membresias'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_kit",$obj_kit);
            $this->tmp_mastercms->render("dashboard/kit/kit_list");
    }
    
    public function load($kit_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($kit_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"kit_id,
                                    name,
                                    price,
                                    point,
                                    img,
                                    bono_n1,
                                    bono_n2,
                                    bono_n3,
                                    bono_n4,
                                    bono_n5,
                                    description,
                                    active,
                                    status_value",
                         "where" => "kit_id = $kit_id",
            ); 
            $obj_kit  = $this->obj_kit->get_search_row($params);
            
            //RENDER
            $this->tmp_mastercms->set("obj_kit",$obj_kit);
          }
          
            $modulos ='membresias'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/kit/kit_form");    
    }
    
    public function validate(){
        //GET CUSTOMER_ID
        $kit_id = $this->input->post("kit_id");
        $img = $this->input->post("img2");
        $name =     $this->input->post('name');
        $price =     $this->input->post('price');
        $point =  $this->input->post('point');
        $description =  $this->input->post('description');
        $active =  $this->input->post('active');
        $bono_n1 = $this->input->post('bono_n1');
        $bono_n2 = $this->input->post('bono_n2');
        $bono_n3 = $this->input->post('bono_n3');
        $bono_n4 = $this->input->post('bono_n4');
        $bono_n5 = $this->input->post('bono_n5');
        
            if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/backoffice/images/plan';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
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
            
            if($kit_id != ""){
                 $data = array(
                            'name' => $name,
                            'price' => $price,
                            'point' => $point,
                            'img' => $img,
                            'bono_n1' => $bono_n1,
                            'bono_n2' => $bono_n2,
                            'bono_n3' => $bono_n3,
                            'bono_n4' => $bono_n4,
                            'bono_n5' => $bono_n5,
                            'description' => $description,
                            'active' => $active,
                            'status_value' => 1,
                            'updated_by' => $_SESSION['usercms']['user_id'],
                            'updated_at' => date("Y-m-d H:i:s")
                        );
                    $this->obj_kit->update($kit_id, $data);
            }else{
                $data = array(
                            'name' => $name,
                            'price' => $price,
                            'point' => $point,
                            'img' => $img,
                            'bono_n1' => $bono_n1,
                            'bono_n2' => $bono_n2,
                            'bono_n3' => $bono_n3,
                            'bono_n4' => $bono_n4,
                            'bono_n5' => $bono_n5,
                            'description' => $description,
                            'active' => $active,
                            'status_value' => 1,
                            'created_by' => $_SESSION['usercms']['user_id'],
                            'created_at' => date("Y-m-d H:i:s")
                        );
                    $this->obj_kit->insert($data);
            }
                
                
            
                    
                    redirect(site_url()."dashboard/membresias");
        
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