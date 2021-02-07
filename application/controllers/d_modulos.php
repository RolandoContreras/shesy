<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_modulos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("modules_model", "obj_modules");
        $this->load->model("courses_model", "obj_courses");
    }

    public function index() {
        //get session
        get_session();
        //obtener course_id
        $url = explode("/", uri_string());
        $course_id = $url[2];
        $params = array(
            "select" => "modules.name,
                                    modules.module_id,
                                    modules.date,
                                    courses.name as course_name",
            "join" => array('courses, modules.course_id = courses.course_id'),
            "where" => "modules.course_id = $course_id");
        //GET DATA FROM CUSTOMER
        $obj_modules = $this->obj_modules->search($params);
        //send
        $this->tmp_mastercms->set("obj_modules", $obj_modules);
        $this->tmp_mastercms->set("course_id", $course_id);
        $this->tmp_mastercms->render("dashboard/modulos/module_list");
    }

    public function load($module_id = NULL) {
        //get session
        get_session();
        //obtener id de curso
        $url = explode("/", uri_string());
        $module_id = isset($url[4]) ? $url[4] : "";
        $course_id = isset($course_id) ? $course_id : $url[2];

        if ($module_id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "modules.module_id,
                                    modules.name",
                "where" => "module_id = $module_id",
            );
            $obj_modules = $this->obj_modules->get_search_row($params);
            $this->tmp_mastercms->set("obj_modules", $obj_modules);
        }
        //obtener curso y nombre
        $params = array(
            "select" => "course_id,
                                    name",
            "where" => "course_id = $course_id and active = 1",
        );
        $obj_courses = $this->obj_courses->get_search_row($params);
        //send data
        $this->tmp_mastercms->set("course_id", $course_id);
        $this->tmp_mastercms->set("obj_courses", $obj_courses);
        $this->tmp_mastercms->render("dashboard/modulos/module_form");
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $module_id = $this->input->post("module_id");
            $url = explode("/", uri_string());
            $course_id = $url[2];
            if ($module_id != null) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'course_id' => $course_id,
                    'date' => date("Y-m-d H:i:s"),
                );
                $result = $this->obj_modules->update($module_id, $data);
                if ($result != null) {
                    $data['status'] = true;
                } else {
                    $data['status'] = false;
                }
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'course_id' => $course_id,
                    'date' => date("Y-m-d H:i:s"),
                );
                $result = $this->obj_modules->insert($data);
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
            $module_id = $this->input->post("module_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($module_id != "") {
                $result = $this->obj_modules->delete($module_id);
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
}

?>