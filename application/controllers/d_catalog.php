<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_catalog extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("catalog_model","obj_catalog");
        $this->load->model("category_model","obj_category");
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
                "where" => "catalog.status_value = 1",
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
          
         $params = array(
                        "select" =>"category_id,
                                    name",
                "where" => "type = 2 and active = 1",
            );
            //GET DATA COMMENTS
            $obj_category= $this->obj_category->search($params);
            $this->tmp_mastercms->set("obj_category",$obj_category);
            $this->tmp_mastercms->render("dashboard/catalogo/catalog_form");    
    }
    
    public function validate(){
        
        //GET CUSTOMER_ID
        $catalog_id = $this->input->post("catalog_id");
        $name = $this->input->post("name");
        $slug = convert_slug($name);
        $bono_n1 = $this->input->post('bono_n1');
        $bono_n2 = $this->input->post('bono_n2');
        $bono_n3 = $this->input->post('bono_n3');
        $bono_n4 = $this->input->post('bono_n4');
        $bono_n5 = $this->input->post('bono_n5');
        $category_id = $this->input->post('category_id');
        $summary =  $this->input->post('summary');
        $price =  $this->input->post('price');
        $description =  $this->input->post('description');
        $img_2 = $this->input->post("img_2");
        $img_3 = $this->input->post("img_3");
        $img_4 = $this->input->post("img_4");
        $active =  $this->input->post('active');
        
        if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/catalog';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 3000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img = $_FILES["image_file"]["name"];        
                 if($img == ""){
                     $img = $img_2;
                 }else{
                     //eliminar imagenes guardadas
                     unlink("./static/catalog/$img_2");  
                 }   
            }
            
            
          if(isset($_FILES["image_file2"]["name"])){
                $config['upload_path']          = './static/catalog';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file2')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img2 = $_FILES["image_file2"]["name"];        
                 if($img2 == ""){
                     $img2 = $img_3;
                 }else{
                     //eliminar imagenes guardadas
                     unlink("./static/catalog/$img_3");  
                 } 
            }
            
         if(isset($_FILES["image_file3"]["name"])){
                $config['upload_path']          = './static/catalog';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file3')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                    }
                $img3 = $_FILES["image_file3"]["name"];        
                 if($img3 == ""){
                     $img3 = $img_4;
                 }else{
                     //eliminar imagenes guardadas
                     unlink("./static/catalog/$img_4");  
                 }   
            }   
            
        
        if($catalog_id != ""){
             $data = array(
                'name' => $name,
                'slug' => $slug, 
                'summary' => $summary,
                'price' => $price,
                'bono_n1' => $bono_n1,
                'bono_n2' => $bono_n2,
                'bono_n3' => $bono_n3,
                'bono_n4' => $bono_n4,
                'bono_n5' => $bono_n5,
                'category_id' => $category_id,
                'description' => $description,
                'img' => $img,
                'img2' => $img2,
                'img3' => $img3,
                'summary' => $summary,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
                );          
             $this->obj_catalog->update($catalog_id, $data);
        }else{
            $data = array(
                'name' => $name,
                'slug' => $slug, 
                'summary' => $summary,
                'price' => $price,
                'bono_n1' => $bono_n1,
                'bono_n2' => $bono_n2,
                'bono_n3' => $bono_n3,
                'bono_n4' => $bono_n4,
                'bono_n5' => $bono_n5,
                'category_id' => $category_id,
                'description' => $description,
                'img' => $img,
                'img2' => $img2,
                'img3' => $img3,
                'summary' => $summary,
                'date' => date("Y-m-d H:i:s"),  
                'active' => $active,  
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id']
                );          
             $this->obj_catalog->insert($data);        
            //SAVE DATA IN TABLE    
        }    
        redirect(site_url()."dashboard/catalogo");
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