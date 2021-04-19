<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");

class D_sub_industry extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("sub_industry_model", "obj_sub_industry");
        $this->load->model("industry_model", "obj_industry");
    }

    public function index() {
        //GET SESSION
        get_session();
        $params = array(
                        "select" => "sub_industry.id,
                                     sub_industry.name,
                                     industry.type,
                                     industry.name as industry_name,
                                     sub_industry.active",
                        "join" => array('industry, sub_industry.industry_id = industry.id'),
                        "order" => "sub_industry.id DESC",
        );
        //GET DATA COMMENTS
        $obj_sub_industry = $this->obj_sub_industry->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_sub_industry", $obj_sub_industry);
        $this->tmp_mastercms->render("dashboard/sub_industrias/sub_industry_list");
    }

    public function load($id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID
        if ($id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "sub_industry.id,
                            sub_industry.name,
                            industry.type,
                            industry.id as industry_id,
                            sub_industry.active
                            ",
                "where" => "sub_industry.id = $id",
                "join" => array('industry, sub_industry.industry_id = industry.id'),
            );
            $obj_sub_industry = $this->obj_sub_industry->get_search_row($params);
            $type = $obj_sub_industry->type;
            //get industry
            $obj_industry = $this->get_industry($type);
            //RENDER
            $this->tmp_mastercms->set("obj_sub_industry", $obj_sub_industry);
            $this->tmp_mastercms->set("obj_industry", $obj_industry);
        }
        //VISTA
        $this->tmp_mastercms->render("dashboard/sub_industrias/sub_industry_form");
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
                    'industry_id' => $this->input->post('industry_id'),
                    'active' => $this->input->post('active'),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
                );
                //SAVE DATA IN TABLE    
                $result = $this->obj_sub_industry->update($id, $param);
            } else {
                //PARAM DATA SAVE
                $param = array(
                    'name' => $this->input->post('name'),
                    'slug' => convert_slug($this->input->post('name')),
                    'industry_id' => $this->input->post('industry_id'),
                    'active' => $this->input->post('active'),
                    'date' => date("Y-m-d"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $_SESSION['usercms']['user_id'],
                );
                $result = $this->obj_sub_industry->insert($param);
            }
            if ($result != null) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function get_industry($type = null) {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $type = $this->input->post("type");
            if ($type != "") {
                //PARAM DATA
                $params = array(
                    "select" => "id,
                                 name",
                    "where" => "active = 1 and type = $type",
                    "order" => "name ASC",
                );
                //GET DATA COMMENTS
                $obj_sub_industry = $this->obj_industry->search($params);
            }
            if ($obj_sub_industry != null) {
                $data['status'] = true;
                $data['obj_data'] = $obj_sub_industry;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }else{
            $params = array(
                "select" => "id,
                             name",
                "where" => "active = 1 and type = $type",
                "order" => "name ASC",
            );
            //GET DATA COMMENTS
            $obj_sub_industry = $this->obj_industry->search($params);
            return $obj_sub_industry;
        }
    }

    public function delete() {
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $id = $this->input->post("id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($id != "") {
                $result = $this->obj_sub_industry->delete($id);
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