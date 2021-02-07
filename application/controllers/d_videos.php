<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_videos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("videos_model", "obj_videos");
        $this->load->model("modules_model", "obj_modules");
        $this->load->model("courses_model", "obj_courses");
    }

    public function index() {

        $this->get_session();
        $url = explode("/", uri_string());
        $course_id = $url[2];
        $params = array(
            "select" => "videos.video_id,
                                    videos.module_id,
                                    videos.name,
                                    videos.description,
                                    videos.video,
                                    videos.type,
                                    videos.date,
                                    videos.active,
                                    modules.name as module_name,
                                    courses.name as course_name",
            "join" => array('modules, videos.module_id = modules.module_id',
                'courses, modules.course_id = courses.course_id'),
            "where" => "modules.course_id = $course_id",
            "order" => "videos.video_id DESC");
        //GET DATA FROM CUSTOMER
        $obj_videos = $this->obj_videos->search($params);
        //send
        $this->tmp_mastercms->set("obj_videos", $obj_videos);
        $this->tmp_mastercms->set("course_id", $course_id);
        $this->tmp_mastercms->render("dashboard/videos/videos_list");
    }

    public function load($course_id = NULL) {

        //obtener id de curso
        $url = explode("/", uri_string());
        $video_id = isset($url[4]) ? $url[4] : "";
        $course_id = isset($course_id) ? $course_id : $url[2];
        if ($video_id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "videos.video_id,
                                    videos.name,
                                    videos.type,
                                    videos.description,
                                    videos.video,
                                    videos.time,
                                    videos.active,
                                    modules.module_id,
                                    modules.name as module_name,
                                    courses.course_id,
                                    courses.name as course_name",
                "join" => array('modules, videos.module_id = modules.module_id',
                    'courses, modules.course_id = courses.course_id'),
                "where" => "video_id = $video_id",
            );
            $obj_videos = $this->obj_videos->get_search_row($params);
            //RENDER
            $this->tmp_mastercms->set("obj_videos", $obj_videos);
        }
        //obtener curso y nombre
        $params = array(
            "select" => "course_id,
                                    name",
            "where" => "course_id = $course_id and active = 1",
        );
        $obj_courses = $this->obj_courses->get_search_row($params);
        //obtener modulos
        $params = array(
            "select" => "module_id,
                                    name",
            "where" => "course_id = $course_id",
        );
        $obj_modules = $this->obj_modules->search($params);
        //send data
        $this->tmp_mastercms->set("course_id", $course_id);
        $this->tmp_mastercms->set("obj_courses", $obj_courses);
        $this->tmp_mastercms->set("obj_modules", $obj_modules);
        $this->tmp_mastercms->render("dashboard/videos/videos_form");
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $video_id = $this->input->post("video_id");
            if ($video_id != null) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'slug' => convert_slug($this->input->post('name')),
                    'type' => $this->input->post('type'),
                    'time' => $this->input->post('time'),
                    'video' => $this->input->post('video'),
                    'module_id' => $this->input->post('module_id'),
                    'date' => date("Y-m-d H:i:s"),
                    'active' => $this->input->post('active'),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
                );
                $result = $this->obj_videos->update($video_id, $data);
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
                //SAVE DATA IN TABLE    
                $data = array(
                    'name' => $this->input->post('name'),
                    'slug' => convert_slug($this->input->post('name')),
                    'time' => $this->input->post('time'),
                    'type' => $this->input->post('type'),
                    'video' => $this->input->post('video'),
                    'module_id' => $this->input->post('module_id'),
                    'date' => date("Y-m-d H:i:s"),
                    'active' => $this->input->post('active'),
                );
                $result = $this->obj_videos->insert($data);
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            }
            echo json_encode($data);
        }
    }

    public function delete() {
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $video_id = $this->input->post("video_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($video_id != "") {
                $result = $this->obj_videos->delete($video_id);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function verificar_curso() {
        if ($this->input->is_ajax_request()) {
            //OBETENER MARCA_ID
            $course_id = $this->input->post("course_id");
            if ($course_id != "") {
                //seleccionar modulo del curso
                $params = array(
                    "select" => "*",
                    "where" => "course_id = $course_id",
                );
                $obj_modules = $this->obj_modules->search($params);
            }
            $data['obj_modules'] = $obj_modules;
            echo json_encode($data);
        }
    }

    public function get_session() {
        if (isset($_SESSION['usercms'])) {
            if ($_SESSION['usercms']['logged_usercms'] == "TRUE") {
                return true;
            } else {
                redirect(site_url() . 'dashboard');
            }
        } else {
            redirect(site_url() . 'dashboard');
        }
    }

}

?>