<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_publicity extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("publicity_model", "obj_publicity_courses");
        $this->load->model("publicity_catalog_model", "obj_publicity_catalog");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("catalog_model", "obj_catalog");
    }

    public function index() {
        //GER SESSION   
        get_session();
        //get data campañas videos
        $obj_publicity_courses = $this->get_all_publicity_course();
        //GET DATA COMMISSIONS
        /// VISTA
        $this->tmp_mastercms->set("obj_publicity_courses", $obj_publicity_courses);
        $this->tmp_mastercms->render("dashboard/publicidad/publicity_list");
    }

    public function edit_course($id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID
        if ($id != "") {
            //get course_id
            $obj_publicity_courses = $this->get_all_publicity_course_id($id);
            $obj_courses = $this->get_courses();
            //RENDER
            $this->tmp_mastercms->set("obj_publicity_courses", $obj_publicity_courses);
            $this->tmp_mastercms->set("obj_courses", $obj_courses);
        }
        $this->tmp_mastercms->render("dashboard/publicidad/publicity_form");
    }

    public function catalog() {
        //GER SESSION   
        get_session();
        //get data campañas videos
        $obj_publicity_catalog = $this->get_all_publicity_catalog();
        //GET DATA COMMISSIONS
        /// VISTA
        $this->tmp_mastercms->set("obj_publicity_catalog", $obj_publicity_catalog);
        $this->tmp_mastercms->render("dashboard/publicidad/publicity_catalog_list");
    }
    
    public function get_all_publicity_course(){   
        $params = array( 
            "select" => "publicity.id,
                         publicity.pexel,
                         publicity.name,
                         publicity.total_view,
                         publicity.total_sell,
                         publicity.date,
                         publicity.status,
                         customer.first_name,
                         customer.last_name,
                         category.name as category_name,
                         category.slug as category_slug,
                         courses.name as course_name,
                         courses.slug as course_slug,
                         courses.course_id as course_id
                         ",
            "join" => array('customer, publicity.customer_id = customer.customer_id',
                            'courses, publicity.course_id = courses.course_id',
                            'category, category.category_id = courses.category_id'),
            "order" => "publicity.id DESC");
         $obj_publicity_courses = $this->obj_publicity_courses->search($params);
         return $obj_publicity_courses; 
	}

    public function get_all_publicity_course_id($id){   
        $params = array( 
            "select" => "publicity.id,
                         publicity.pexel,
                         publicity.name,
                         publicity.total_view,
                         publicity.total_sell,
                         publicity.date,
                         publicity.status,
                         customer.first_name,
                         customer.last_name,
                         category.name as category_name,
                         category.slug as category_slug,
                         courses.name as course_name,
                         courses.slug as course_slug,
                         courses.course_id as course_id
                         ",
            "join" => array('customer, publicity.customer_id = customer.customer_id',
                            'courses, publicity.course_id = courses.course_id',
                            'category, category.category_id = courses.category_id'),
            "where" => "publicity.id = $id");
         $obj_publicity_courses = $this->obj_publicity_courses->get_search_row($params);
         return $obj_publicity_courses; 
	}

    public function get_all_publicity_catalog(){   
        //get publicity catalog by customer
        $params = array( 
            "select" => "publicity_catalog.id,
                         publicity_catalog.name,
                         publicity_catalog.total_view,
                         publicity_catalog.total_sell,
                         publicity_catalog.date,
                         publicity_catalog.status,
                         customer.first_name,
                         customer.last_name,
                         category.name as category_name,
                         category.slug as category_slug,
                         catalog.name as catalog_name,
                         catalog.slug as catalog_slug,
                         catalog.catalog_id as catalog_id
                         ",
            "join" => array('customer, publicity_catalog.customer_id = customer.customer_id',
                            'catalog, publicity_catalog.catalog_id = catalog.catalog_id',
                            'category, category.category_id = catalog.category_id'),
            "order" => "publicity_catalog.id DESC");
        $obj_publicity_catalog = $this->obj_publicity_catalog->search($params);;
        return $obj_publicity_catalog; 
	}

    public function get_campana(){  
        if ($this->input->is_ajax_request()) {
            //get publicity catalog by customer
            $type = $this->input->post("type");
            if($type == 1){
                //get all course
                $obj_courses = $this->get_courses();
                //save data
                $data['status'] = true;
                $data['obj_data'] = $obj_courses;
            }else{
                //get all catalog
                $obj_catalog = $this->get_catalog();
                //save data
                $data['status'] = true;
                $data['obj_data'] = $obj_catalog;
            }
            echo json_encode($data);
        }
	}
    
    public function get_courses(){  
        //get all course
        $params = array( 
            "select" => "course_id as id,
                        name",
            "where" => "active = 1",
            "order" => "name ASC");
        $obj_courses = $this->obj_courses->search($params);
        return $obj_courses;
	}

    public function activate_course() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            if ($id != null) {
                //update campaña active 1
                $data = array(
                    'status' => 1,
                );
                //SAVE DATA IN TABLE    
                $result = $this->obj_publicity_courses->update($id, $data);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = true;
                }
            echo json_encode($data);
            exit();
            }

        }
    }

    public function activate_catalog() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            if ($id != null) {
                //update campaña active 1
                $data = array(
                    'status' => 1,
                );
                //SAVE DATA IN TABLE    
                $result = $this->obj_publicity_catalog->update($id, $data);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = true;
                }
            echo json_encode($data);
            exit();
            }

        }
    }

    public function delete_course() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            if ($id != null) {
                //delete campaña course
                $result = $this->obj_publicity_courses->delete($id);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = true;
                }
            echo json_encode($data);
            exit();
            }
        }
    }

    public function delete_catalog() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            if ($id != null) {
                //delete campaña course
                $result = $this->obj_publicity_catalog->delete($id);
                if($result != null){
                    $data['status'] = true;
                }else{
                    $data['status'] = true;
                }
            echo json_encode($data);
            exit();
            }
        }
    }

    public function validate() {
        //GET CUSTOMER_ID
        $id = $this->input->post("id");
        if ($id != "") {
            //UPDATE DATA
            $data = array(
                'name' => $this->input->post("name"),
                'course_id' => $this->input->post("course_id"),
                'status' => $this->input->post("status"),
            );
            //SAVE DATA IN TABLE    
            $result =  $this->obj_publicity_courses->update($id, $data);
            if($result != null){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }
}

?>