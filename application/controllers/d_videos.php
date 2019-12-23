<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_videos extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("videos_model","obj_videos");
        $this->load->model("category_model","obj_category");
    }   
                
    public function index(){  
        
           $this->get_session();
           $params = array(
                        "select" =>"videos.video_id,
                                    videos.category_id,
                                    videos.name,
                                    videos.summary,
                                    videos.type,
                                    videos.img2 as img,
                                    videos.video,
                                    videos.date,
                                    videos.active,
                                    category.name as categoria",
                "join" => array( 'category, videos.category_id = category.category_id'),
                "where" => "videos.status_value = 1",
                "order" => "videos.video_id DESC");
           //GET DATA FROM CUSTOMER
        $obj_videos = $this->obj_videos->search($params);
        
           /// PAGINADO
            $modulos ='videos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/videos'; 
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->set("obj_videos",$obj_videos);
            $this->tmp_mastercms->render("dashboard/videos/videos_list");
    }
    
    public function load($video_id=NULL){
        //VERIFY IF ISSET CUSTOMER_ID
        
        if ($video_id != ""){
            /// PARAM FOR SELECT 
            $params = array(
                        "select" =>"*",
                         "where" => "video_id = $video_id",
            ); 
            $obj_videos  = $this->obj_videos->get_search_row($params); 
            //RENDER
            $this->tmp_mastercms->set("obj_videos",$obj_videos);
          }
      
          $params = array(
                        "select" =>"*",
                         "where" => "type = 1 and active = 1",
            ); 
            $obj_category = $this->obj_category->search($params); 
            
            $modulos ='videos'; 
            $seccion = 'Formulario';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 

            $this->tmp_mastercms->set("obj_category",$obj_category);
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            $this->tmp_mastercms->render("dashboard/videos/videos_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $video_id = $this->input->post("video_id");
        $name = $this->input->post("name");
        $slug = convert_slug($name);
        $video =  $this->input->post('video');
        $type =  $this->input->post('type');
        $summary =  $this->input->post('summary');
        $description =  $this->input->post('description');
        $category =  $this->input->post('category');
        $active =  $this->input->post('active');
        
        if(isset($_FILES["image_file_2"]["name"])){
                $config['upload_path']          = './static/course/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file_2')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img_2 = $_FILES["image_file_2"]["name"];        
                 if($img_2 == ""){
                     $img_2 = $this->input->post("img3");
                 }   
            }
        
        if($video_id != ""){
             $data = array(
                'name' => $name,
                'slug' => $slug,
                'img2' => $img_2,
                'type' => $type,
                'video' => $video,
                'summary' => $summary,
                'description' => $description, 
                'category_id' => $category,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
             $this->obj_videos->update($video_id, $data);
        }else{
            $data = array(
                'name' => $name,
                'slug' => $slug,
                'video' => $video,
                'img2' => $img_2,
                'type' => $type,
                'summary' => $summary,
                'description' => $description, 
                'category_id' => $category,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $active,  
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id']
                );          
             $this->obj_videos->insert($data);        
            //SAVE DATA IN TABLE    
        }    
        redirect(site_url()."dashboard/videos");
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