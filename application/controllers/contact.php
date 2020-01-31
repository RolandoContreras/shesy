<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();     
        $this->load->model('comments_model','obj_comments');
        $this->load->model("category_model","obj_category");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $params_category_videos = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "type = 1 and active = 1",
            );
            //GET DATA COMMENTS
            $data['obj_category_videos'] = $this->obj_category->search($params_category_videos);
            
            $params_category_catalog = array(
                        "select" =>"category_id,
                                    slug,
                                    name",
                "where" => "type = 2 and active = 1",
            );
            //GET DATA COMMENTS
            $data['obj_category_catalog'] = $this->obj_category->search($params_category_catalog);
            //SEND DATA
            $data['title'] = "Contacto";
            $this->load->view('contact',$data);
	}
        public function send_messages(){
         //GET DATA BY POST
            
         if($this->input->is_ajax_request()){   
                $name = $this->input->post("name");
                $email = $this->input->post("email");
                $subject = $this->input->post("subject");
                $message = $this->input->post("message");

                //SAVE MESSAGES BD
                //status_value 0 means (not read)
                        $data = array(
                            'name' => $name,
                            'email' => $email,
                            'subject' => $subject,
                            'comment' => $message,
                            'date_comment' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                        );
                        $this->obj_comments->insert($data);
                $data['message'] = true;
                echo json_encode($data);            
                exit();
            }
    } 
}
