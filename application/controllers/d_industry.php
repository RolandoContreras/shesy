<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_industry extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("industry_model", "obj_industry");
    }

    public function index() {
        //GET SESSION
        get_session();
        $params = array(
                        "select" => "id,
                                    name,
                                    type,
                                    active",
                        "order" => "id DESC",
        );
        //GET DATA COMMENTS
        $obj_industry = $this->obj_industry->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_industry", $obj_industry);
        $this->tmp_mastercms->render("dashboard/industrias/industry_list");
    }

    public function load($id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID
        if ($id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "*",
                "where" => "id = $id",
            );
            $obj_industry = $this->obj_industry->get_search_row($params);
            //RENDER
            $this->tmp_mastercms->set("obj_industry", $obj_industry);
        }
        //VISTA
        $this->tmp_mastercms->render("dashboard/industrias/industry_form");
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $id = $this->input->post("id");
            if ($id != "") {
                //PARAM DATA
                $param = array(
                    'name' => $this->input->post('name'),
                    'slug' => convert_slug($this->input->post('name')),
                    'type' => $this->input->post('type'),
                    'active' => $this->input->post('active'),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
                );
                //SAVE DATA IN TABLE    
                $result = $this->obj_industry->update($id, $param);
            } else {
                //PARAM DATA SAVE
                $param = array(
                    'name' => $this->input->post('name'),
                    'slug' => convert_slug($this->input->post('name')),
                    'type' => $this->input->post('type'),
                    'active' => $this->input->post('active'),
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $_SESSION['usercms']['user_id'],
                );
                $result = $this->obj_industry->insert($param);
            }
            if ($result != null) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function delete() {
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $id = $this->input->post("id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($id != "") {
                $result = $this->obj_industry->delete($id);
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