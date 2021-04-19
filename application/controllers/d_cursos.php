<?php if (!defined("BASEPATH"))exit("No direct script access allowed");

class d_cursos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("category_model", "obj_category");
        $this->load->model("industry_model", "obj_industry");
        $this->load->model("sub_industry_model", "obj_sub_industry");
    }
    public function index() {
        $this->get_session();
        $params = array(
            "select" => "courses.course_id,
                            courses.name,
                            category.name as category,
                            courses.description,
                            courses.img,
                            courses.price,
                            courses.free,
                            courses.active,
                            courses.date",
            "join" => array('category, category.category_id = courses.category_id'),
            "order" => "courses.course_id DESC");
        $obj_courses = $this->obj_courses->search($params);
        /// VISTA
        $this->tmp_mastercms->set("obj_courses", $obj_courses);
        $this->tmp_mastercms->render("dashboard/cursos/cursos_list");
    }

    public function load($id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID

        if ($id != "") {
            /// PARAM FOR SELECT
            $params = array( 
            "select" => "courses.course_id,
                         courses.name,
                         category.category_id,
                         courses.description,
                         courses.img,
                         courses.img2,
                         courses.img3,
                         sub_industry.industry_id,
                         sub_industry.id as sub_industry_id,
                         courses.price,
                         courses.video,
                         courses.price_del,
                         courses.price_del,
                         courses.free,
                         courses.bono_1,
                         courses.bono_2,
                         courses.bono_3,
                         courses.bono_4,
                         courses.bono_5,
                         courses.hot_link,
                         courses.duration,
                         courses.active,
                         courses.date",
            "join" => array('category, category.category_id = courses.category_id',
                            'sub_industry, courses.sub_industry_id = sub_industry.id'),
            "where" => "courses.course_id = $id");
            $obj_courses = $this->obj_courses->get_search_row($params);
            //get sub_industry
            if($obj_courses->industry_id != ""){
                $obj_sub_industry = $this->get_sub_industry($obj_courses->industry_id);
                $this->tmp_mastercms->set("obj_sub_industry", $obj_sub_industry);    
            }
            
            //RENDER
            $this->tmp_mastercms->set("obj_courses", $obj_courses);
            //get data sub category
        }
        //get category
        $params = array(
            "select" => "category_id,
                                    name",
            "where" => "type = 3 and active = 1",
        );
        //GET DATA COMMENTS
        $obj_category = $this->obj_category->search($params);
        //get data industry type = 1 (catalogo)
        $obj_industry = $this->get_industry(2);
        //render
        $this->tmp_mastercms->set("obj_industry", $obj_industry);
        $this->tmp_mastercms->set("obj_category", $obj_category);
        $this->tmp_mastercms->render("dashboard/cursos/cursos_form");
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID
            $course_id = $this->input->post("course_id");
            $img_2 = $this->input->post("img_2");
            $img_3 = $this->input->post("img_3");
            $img_4 = $this->input->post("img_4");
            $name = $this->input->post('name');
            $slug =  convert_slug($this->input->post('name'));
            //upload img  
            if($_FILES["image_file"]["name"] != null){
                if (isset($_FILES["image_file"]["name"])) {
                    $config['upload_path'] = './static/cms/images/cursos';
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
                    if ($img == "") {
                        $img = $img_2;
                    }
                }
            }else{
                $img = $this->input->post("img_2");
            }

            //upload img  
            if($_FILES["image_file2"]["name"] != null){
                if (isset($_FILES["image_file2"]["name"])) {
                    $config['upload_path'] = './static/cms/images/cursos';
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
                    if ($img2 == "") {
                        $img2 = $img_3;
                    }
                }
            }else{
                $img2 = $this->input->post("img_3");
            }

            //upload img  
            if($_FILES["image_file3"]["name"] != null){
                if (isset($_FILES["image_file3"]["name"])) {
                    $config['upload_path'] = './static/cms/images/cursos';
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
                    if ($img3 == "") {
                        $img2 = $img_4;
                    }
                }
            }else{
                $img3 = $this->input->post("img_4");
            }
                //if
                if ($course_id != "") {
                    $data = array(
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $this->input->post('description'),
                        'category_id' => $this->input->post('category_id'),
                        'sub_industry_id' => $this->input->post("sub_industry_id"),
                        'price' => $this->input->post('price'),
                        'price_del' => $this->input->post('price_del'),
                        'img' => $img,
                        'img2' => $img2,
                        'img3' => $img3,
                        'duration' => $this->input->post('duration'),
                        'free' => $this->input->post('free'),
                        'bono_1' => $this->input->post('bono_1'),
                        'bono_2' => $this->input->post('bono_2'),
                        'bono_3' => $this->input->post('bono_3'),
                        'bono_4' => $this->input->post('bono_4'),
                        'video' => $this->input->post('video'),
                        'bono_5 ' => $this->input->post('bono_5'),
                        'hot_link' => $this->input->post('hot_link'),
                        'active' => $this->input->post('active'),
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id']
                    );
                    $this->obj_courses->update($course_id, $data);
                } else {
                    $data = array(
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $this->input->post('description'),
                        'category_id' => $this->input->post('category_id'),
                        'sub_industry_id' => $this->input->post("sub_industry_id"),
                        'price' => $this->input->post('price'),
                        'price_del' => $this->input->post('price_del'),
                        'duration' => $this->input->post('duration'),
                        'img' => $img,
                        'img2' => $img2,
                        'img3' => $img3,
                        'date' => date("Y-m-d"),
                        'free' => $this->input->post('free'),
                        'bono_1' => $this->input->post('bono_1'),
                        'bono_2' => $this->input->post('bono_2'),
                        'bono_3' => $this->input->post('bono_3'),
                        'bono_4' => $this->input->post('bono_4'),
                        'bono_5 ' => $this->input->post('bono_5'),
                        'video' => $this->input->post('video'),
                        'hot_link' => $this->input->post('hot_link'),
                        'active' => $this->input->post('active'),
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id']
                    );
                    $course_id =  $this->obj_courses->insert($data);
                    //SAVE DATA IN TABLE    
                }
                $data['status'] = true;
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

    public function delete_img() {
        if ($this->input->is_ajax_request()) {
            //OBETENER CATALOGO ID
            $course_id = $this->input->post("course_id");
            $img = $this->input->post("img");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($course_id != "") {
                $param = array(
                    "$img" => null,
                );
                $this->obj_courses->update($course_id, $param);
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
        if ($this->input->is_ajax_request()) {
            //OBETENER CATALOGO ID
            $id = $this->input->post("id");
            //VERIFY IF ISSET CUSTOMER_ID
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
        }else{
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