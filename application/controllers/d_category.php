<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
    }

    public function index() {
        //GER SESSION
        $this->get_session();
        $params = array(
            "select" => "category_id,
                                    name,
                                    type,
                                    active",
            "where" => "status_value = 1",
        );
        //GET DATA COMMENTS
        $obj_category = $this->obj_category->search($params);

        /// PAGINADO
        $modulos = 'categorias';
        $seccion = 'Lista';
        $link_modulo = site_url() . 'dashboard/' . $modulos;
        /// DATA
        /// VISTA
        $this->tmp_mastercms->set('link_modulo', $link_modulo);
        $this->tmp_mastercms->set('modulos', $modulos);
        $this->tmp_mastercms->set('seccion', $seccion);
        $this->tmp_mastercms->set("obj_category", $obj_category);
        $this->tmp_mastercms->render("dashboard/categorias/category_list");
    }

    public function load($category_id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID

        if ($category_id != "") {
            /// PARAM FOR SELECT 
            $where = "category_id = $category_id";
            $params = array(
                "select" => "*",
                "where" => $where,
            );
            $obj_category = $this->obj_category->get_search_row($params);
            //RENDER
            $this->tmp_mastercms->set("obj_category", $obj_category);
        }

        $modulos = 'categorias';
        $seccion = 'Formulario';
        $link_modulo = site_url() . 'dashboard/' . $modulos;

        $this->tmp_mastercms->set('link_modulo', $link_modulo);
        $this->tmp_mastercms->set('modulos', $modulos);
        $this->tmp_mastercms->set('seccion', $seccion);
        $this->tmp_mastercms->render("dashboard/categorias/category_form");
    }

    public function validate() {

        //GET CUSTOMER_ID
        $category_id = $this->input->post("category_id");

        if ($category_id != "") {
            //PARAM DATA
            $data = array(
                'name' => $this->input->post('name'),
                'slug' => convert_slug($this->input->post('name')),
                'type' => $this->input->post('type'),
                'active' => $this->input->post('active'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
            );
            //SAVE DATA IN TABLE    
            $this->obj_category->update($category_id, $data);
        } else {
            //PARAM DATA SAVE
            $data = array(
                'name' => $this->input->post('name'),
                'slug' => convert_slug($this->input->post('name')),
                'type' => $this->input->post('type'),
                'active' => $this->input->post('active'),
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id'],
            );
            //SAVE DATA IN TABLE    
            $this->obj_category->insert($data);
        }
        redirect(site_url() . "dashboard/categorias");
    }

    public function sub_category($category_id = NULL) {
        //GER SESSION
        $this->get_session();
        $params = array(
            "select" => "sub_category.sub_category_id,
                                    sub_category.name,
                                    sub_category.active,
                                    category.name as category_name",
            "join" => array('category, category.category_id = sub_category.category_id'),
            "where" => "sub_category.category_id = $category_id and sub_category.status_value = 1",
        );
        //GET DATA COMMENTS
        $obj_sub_category = $this->obj_sub_category->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_sub_category", $obj_sub_category);
        $this->tmp_mastercms->set("category_id", $category_id);
        $this->tmp_mastercms->render("dashboard/categorias/sub_category_list");
    }

    public function make_sub_category() {
        //VERIFY IF ISSET CUSTOMER_ID
        $url = explode("/", uri_string());
        $category_id = $url[2];
        $sub_category_id = isset($url[4])?$url[4]:null;
        $params = array(
            "select" => "name as category_name",
            "where" => "category_id = $category_id",
        );
        $obj_category = $this->obj_category->get_search_row($params);
        $category_name = $obj_category->category_name;
        //verify is isset cartegory
        if ($sub_category_id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "sub_category_id,
                             name,
                             active",
                "where" => "sub_category_id = $sub_category_id",
            );
            $sub_category = $this->obj_sub_category->get_search_row($params);
            $this->tmp_mastercms->set("sub_category", $sub_category);
            //RENDER
        }
        $this->tmp_mastercms->set("category_name", $category_name);
        $this->tmp_mastercms->set("category_id", $category_id);
        $this->tmp_mastercms->render("dashboard/categorias/sub_category_form");
    }

    public function validate_sub_category() {
        //GET CUSTOMER_ID
        $category_id = $this->input->post("category_id");
        $sub_category_id = $this->input->post("sub_category_id");
        
        var_dump($sub_category_id);
        die();
        
        if ($sub_category_id != null) {
            //edit table
            //PARAM DATA
            $data = array(
                'name' => $this->input->post('name'),
                'slug' => convert_slug($this->input->post('name')),
                'active' => $this->input->post('active'),
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $_SESSION['usercms']['user_id']
            );
            //SAVE DATA IN TABLE    
            $this->obj_sub_category->update($sub_category_id, $data);
        } else {
            //PARAM DATA SAVE
            $data = array(
                'name' => $this->input->post('name'),
                'slug' => convert_slug($this->input->post('name')),
                'category_id' => $category_id,
                'active' => $this->input->post('active'),
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['usercms']['user_id'],
            );
            //SAVE DATA IN TABLE    
            $this->obj_sub_category->insert($data);
        }
        redirect(site_url() . "dashboard/categorias/$category_id");
    }
    
    public function delete_sub_category() {
        if ($this->input->is_ajax_request()) {
            //OBETENER customer_id
            $sub_category_id = $this->input->post("sub_category_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($sub_category_id != "") {
                $result = $this->obj_sub_category->delete($sub_category_id);
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
    
    public function get_session() {
        if (isset($_SESSION['usercms'])) {
            if ($_SESSION['usercms']['logged_usercms'] == "TRUE" && $_SESSION['usercms']['status'] == 1) {
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