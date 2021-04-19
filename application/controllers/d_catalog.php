<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_catalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
        $this->load->model("industry_model", "obj_industry");
        $this->load->model("sub_industry_model", "obj_sub_industry");
        
    }

    public function index() {

        $this->get_session();
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.stock,
                                    catalog.name,
                                    catalog.price,
                                    catalog.granel,
                                    catalog.description,
                                    catalog.img,
                                    catalog.active,
                                    category.name as category_name,
                                    catalog.date",
            "where" => "catalog.status_value = 1",
            "join" => array('category, catalog.category_id = category.category_id'),
            "order" => "catalog.catalog_id DESC");
        //GET DATA FROM CUSTOMER
        $obj_catalog = $this->obj_catalog->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_catalog", $obj_catalog);
        $this->tmp_mastercms->render("dashboard/catalogo/catalog_list");
    }

    public function load($catalog_id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID
        $obj_sub_industry = null;
        if ($catalog_id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "catalog.catalog_id,
                                    catalog.stock,
                                    catalog.name,
                                    catalog.price,
                                    catalog.price_del,
                                    catalog.granel,
                                    catalog.description,
                                    catalog.category_id,
                                    catalog.sub_category_id,
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.img4,
                                    catalog.video,
                                    catalog.hot_link,
                                    catalog.active,
                                    catalog.bono_n1,
                                    catalog.bono_n2,
                                    catalog.bono_n3,
                                    catalog.bono_n4,
                                    catalog.bono_n5,
                                    catalog.date,
                                    sub_industry.industry_id,
                                    sub_industry.id as sub_industry_id",
                "join" => array('sub_industry, catalog.sub_industry_id = sub_industry.id'),
                "where" => "catalog.catalog_id = $catalog_id",
            );
            $obj_catalog = $this->obj_catalog->get_search_row($params);
            //get sub_industry
            if($obj_catalog->industry_id != ""){
                $obj_sub_industry = $this->get_sub_industry($obj_catalog->industry_id);
                $this->tmp_mastercms->set("obj_sub_industry", $obj_sub_industry);    
            }
            $this->tmp_mastercms->set("obj_catalog", $obj_catalog);
            //get data sub category
        }
        //get category
        $params = array(
            "select" => "category_id,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        //get data category
        $obj_category = $this->obj_category->search($params);
        //get data industry type = 1 (catalogo)
        $obj_industry = $this->get_industry(1);
        //get data sub category
            $params = array(
                "select" => "sub_category_id,
                         name",
                "where" => "active = 1",
            );
            //GET DATA COMMENTS
            $obj_sub_category = $this->obj_sub_category->search($params);

        $this->tmp_mastercms->set("obj_category", $obj_category);
        $this->tmp_mastercms->set("obj_industry", $obj_industry);
        $this->tmp_mastercms->set("obj_sub_category", $obj_sub_category);
        $this->tmp_mastercms->render("dashboard/catalogo/catalog_form");
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            $description = $this->input->post('description');
            //GET CUSTOMER_ID
            $catalog_id = $this->input->post("catalog_id");
            $name = $this->input->post("name");
            $slug = convert_slug($name);
            if (isset($_FILES["image_file"]["name"]) && $_FILES["image_file"]["name"] != "") {
                $config['upload_path'] = './static/catalog';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 3000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $img = $_FILES["image_file"]["name"];
            }else{
                $img = $this->input->post("img_2");
            }

            if (isset($_FILES["image_file2"]["name"]) && $_FILES["image_file2"]["name"] != "") {
                $config['upload_path'] = './static/catalog';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 3000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file2')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $img2 = $_FILES["image_file2"]["name"];
            }else{
                $img2 = $this->input->post("img_3");
            }

            if (isset($_FILES["image_file3"]["name"]) && $_FILES["image_file3"]["name"] != "") {
                $config['upload_path'] = './static/catalog';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 3000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file3')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $img3 = $_FILES["image_file3"]["name"];
            }else{
                $img3 = $this->input->post("img_4");
            }

            if (isset($_FILES["image_file4"]["name"]) && $_FILES["image_file4"]["name"] != "") {
                $config['upload_path'] = './static/catalog';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 3000;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_file4')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $img4 = $_FILES["image_file4"]["name"];
            }else{
                $img4 = $this->input->post("img_5");
            }

            if ($catalog_id != "") {
                $param = array(
                    'name' => $name,
                    'slug' => $slug,
                    'price_del' => $this->input->post('price_del'),
                    'price' => $this->input->post('price'),
                    'bono_n1' => $this->input->post('bono_n1'),
                    'bono_n2' => $this->input->post('bono_n2'),
                    'bono_n3' => $this->input->post('bono_n3'),
                    'bono_n4' => $this->input->post('bono_n4'),
                    'bono_n5' => $this->input->post('bono_n5'),
                    'stock' => $this->input->post("stock"),
                    'category_id' => $this->input->post('category_id'),
                    'sub_category_id' => $this->input->post("sub_category_id"),
                    'sub_industry_id' => $this->input->post("sub_industry_id"),
                    'description' => $description,
                    'img' => $img,
                    'img2' => $img2,
                    'img3' => $img3,
                    'img4' => $img4,
                    'video' => $this->input->post('video'),
                    'hot_link' => $this->input->post('hot_link'),
                    'date' => date("Y-m-d H:i:s"),
                    'granel' => $this->input->post('granel'),
                    'active' => $this->input->post('active'),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
                );
                $this->obj_catalog->update($catalog_id, $param);
                //SAVE DATA IN TABLE    
                $data['status'] = true;
            } else {
                $param = array(
                    'name' => $name,
                    'slug' => $slug,
                    'price_del' => $this->input->post('price_del'),
                    'price' => $this->input->post('price'),
                    'bono_n1' => $this->input->post('bono_n1'),
                    'bono_n2' => $this->input->post('bono_n2'),
                    'bono_n3' => $this->input->post('bono_n3'),
                    'bono_n4' => $this->input->post('bono_n4'),
                    'bono_n5' => $this->input->post('bono_n5'),
                    'stock' => $this->input->post("stock"),
                    'category_id' => $this->input->post('category_id'),
                    'sub_category_id' => $this->input->post("sub_category_id"),
                    'sub_industry_id' => $this->input->post("sub_industry_id"),
                    'description' => $description,
                    'img' => $img,
                    'img2' => $img2,
                    'img3' => $img3,
                    'img4' => $img4,
                    'video' => $this->input->post('video'),
                    'hot_link' => $this->input->post('hot_link'),
                    'date' => date("Y-m-d H:i:s"),
                    'granel' => $this->input->post('granel'),
                    'active' => $this->input->post('active'),
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $_SESSION['usercms']['user_id']
                );
                $this->obj_catalog->insert($param);
                //SAVE DATA IN TABLE    
                $data['status'] = true;
        }
        echo json_encode($data);
      }
    }

    public function delete_img() {
        if ($this->input->is_ajax_request()) {
            //OBETENER CATALOGO ID
            $catalog_id = $this->input->post("catalog_id");
            $img = $this->input->post("img");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($catalog_id != "") {
                $param = array(
                    "$img" => null,
                );
                $this->obj_catalog->update($catalog_id, $param);
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function delete() {
        if ($this->input->is_ajax_request()) {
            //OBETENER CATALOGO ID
            $catalog_id = $this->input->post("catalog_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($catalog_id != "") {
                $this->obj_catalog->delete($catalog_id);
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function get_industry($type) {
        $params = array(
            "select" => "id,
                            name",
            "where" => "active = 1 and type = $type",
            "order" => "name ASC",
        );
        //GET DATA COMMENTS
        $obj_industry = $this->obj_industry->search($params);
        return $obj_industry;
    }

    public function get_sub_industry($industry_id) {
        $params = array(
            "select" => "id,
                        name",
            "where" => "active = 1 and industry_id = $industry_id",
            "order" => "name ASC",
        );
        //GET DATA COMMENTS
        $obj_sub_industry = $this->obj_sub_industry->search($params);
        return $obj_sub_industry;
    }

    public function show_sub_category() {
        if ($this->input->is_ajax_request()) {
            //OBETENER CATALOGO ID
            $category_id = $this->input->post("category_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($category_id != null) {
                $params = array(
                    "select" => "sub_category_id,
                                    name",
                    "where" => "category_id = $category_id and active = 1");
                //GET DATA FROM CUSTOMER
                $obj_sub_category = $this->obj_sub_category->search($params);
                $data['status'] = true;
                $data['obj_category'] = $obj_sub_category;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        }
    }

    public function get_sub_category() {
        if ($this->input->is_ajax_request()) {
            //OBETENER CATALOGO ID
            $id = $this->input->post("id");
            if ($id != null) {
                $params = array(
                    "select" => "id,
                                 name",
                    "where" => "industry_id = $id and active = 1");
                //GET DATA FROM CUSTOMER
                $obj_sub_industry = $this->obj_sub_industry->search($params);
                $data['status'] = true;
                $data['obj_data'] = $obj_sub_industry;
            } else {
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