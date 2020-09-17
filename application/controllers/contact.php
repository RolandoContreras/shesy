<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('comments_model', 'obj_comments');
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        $data['obj_sub_category'] = $this->nav_sub_category();
        $params_category_videos = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 1 and active = 1",
        );
        //GET DATA COMMENTS
        $data['obj_category_videos'] = $this->obj_category->search($params_category_videos);

        $params_category_catalog = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        //GET DATA COMMENTS
        $data['obj_category_catalog'] = $this->obj_category->search($params_category_catalog);
        //SEND DATA
        $data['title'] = "Contacto";
        $this->load->view('contact', $data);
    }

    public function send_messages() {
        //GET DATA BY POST

        if ($_POST['google-response-token']) {
            $googleToken = $_POST['google-response-token'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lcff80ZAAAAABeR5cpAa2whczBB7f2s0_VYBCIo&response={$googleToken}");
            $response = json_decode($response);
            $response = (array) $response;
            if ($response['success'] && ($response['score'] && $response['score'] > 0.5)) {
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
                $data['status'] = true;
            } else {
                $data['status'] = "false2";
            }
        } else {
            $data['status'] = "false2";
        }
        echo json_encode($data);
        exit();
    }

    public function nav_videos() {
        $params_category_videos = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 1 and active = 1",
        );
        //GET DATA COMMENTS
        return $obj_category_videos = $this->obj_category->search($params_category_videos);
    }

    public function nav_sub_category() {
        $params = array(
            "select" => "name,
                         category_id,        
                         slug",
            "where" => "active = 1",
        );
        //GET DATA CATALOGO
        return $obj_sub_category = $this->obj_sub_category->search($params);
    }

    public function nav_catalogo() {
        $params_category_catalog = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        //GET DATA CATALOGO
        return $obj_category_catalog = $this->obj_category->search($params_category_catalog);
    }

}
