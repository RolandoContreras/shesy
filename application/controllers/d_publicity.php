<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_publicity extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("publicity_model", "obj_publicity_courses");
        $this->load->model("publicity_catalog_model", "obj_publicity_catalog");
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

    public function load($bonus_id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID

        if ($bonus_id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "*",
                "where" => "bonus_id = $bonus_id",
            );
            $obj_bonus = $this->obj_bonus->get_search_row($params);

            //RENDER
            $this->tmp_mastercms->set("obj_bonus", $obj_bonus);
        }
        $this->tmp_mastercms->render("dashboard/bonus/bonus_form");
    }

    public function validate() {

        //GET CUSTOMER_ID
        $bonus_id = $this->input->post("bonus_id");
        $name = $this->input->post('name');
        $percent = $this->input->post('percent');
        $active = $this->input->post('active');
        if ($bonus_id != "") {
            //UPDATE DATA
            $data = array(
                'bonus_id' => $bonus_id,
                'name' => $name,
                'percent' => $percent,
                'active' => $active,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
            );
            //SAVE DATA IN TABLE    
            $this->obj_bonus->update($bonus_id, $data);
        } else {
                //UPDATE DATA
            $data = array(
                'name' => $name,
                'percent' => $percent,
                'active' => $active,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id']
            );
            //SAVE DATA IN TABLE    
            $this->obj_bonus->insert($data);
        }
        redirect(site_url() . "dashboard/bonos");
    }
}

?>