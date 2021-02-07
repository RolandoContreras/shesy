<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("videos_model", "obj_videos");
        $this->load->model("category_model", "obj_category");
        $this->load->model("modules_model", "obj_modules");
        $this->load->model("courses_model", "obj_courses");
        //$this->load->model("video_message_model", "obj_video_message");
        $this->load->model("customer_courses_model", "obj_customer_courses");
        //$this->load->model("archives_model", "obj_archives");
    }

    public function detail($slug) {
        //GET SESION ACTUALY
        $this->get_session();
        //get customer_id
        $customer_id = $_SESSION['customer']['customer_id'];
        //get slug
        $url = explode("/", uri_string());
        $slug_category = $url[1];
        $slug_2 = $url[2];
        $slug_3 = isset($url[3]) ? $url[3] : "";
        //obtener curso
        $params = array(
            "select" => "courses.course_id,
                                        courses.category_id,
                                        courses.name,
                                        courses.slug,
                                        courses.date,
                                        category.name as category_name,
                                        category.slug as category_slug",
            "join" => array('category, courses.category_id = category.category_id'),
            "where" => "courses.slug = '$slug_2' and category.slug = '$slug_category'");
        $obj_courses = $this->obj_courses->get_search_row($params);
        $course_id = $obj_courses->course_id;
        //obtener modulos por cursos
        $params = array(
            "select" => "module_id,
                                        name",
            "where" => "course_id = $course_id");
        $obj_modules = $this->obj_modules->search($params);
        //establecer modulos id para busqqueda
        $array_data = "";
        foreach ($obj_modules as $value) {
            $array_data .= $value->module_id . ",";
        }
        $array_data = eliminar_ultimo_caracter($array_data);
        //GET videos by course
        $params = array(
            "select" => "videos.video_id,
                                        videos.name,
                                        videos.module_id,
                                        videos.video,
                                        videos.date,
                                        videos.type,
                                        videos.slug,
                                        videos.time",
            "where" => "videos.module_id in ($array_data) and videos.active = 1",
            "order" => "videos.video_id ASC");
        $obj_videos = $this->obj_videos->search($params);
        $total_videos = count($obj_videos);
        //obtener video actual
        if ($slug_3 != "") {
            $where = "and slug = '$slug_3'";
        } else {
            $where = "";
        }
        //GET videos by course
        $params = array(
            "select" => "video_id,
                        slug,
                        name,
                        video,
                        description,
                        (SELECT video_actual FROM customer_courses WHERE customer_id = $customer_id AND course_id = $course_id) as video_actual,
                        time,
                        date",
            "where" => "videos.module_id in ($array_data) $where");
        $obj_courses_overview = $this->obj_videos->get_search_row($params);
        //VIDEO LINK
        $params = array(
            "select" => "slug,
                        name",
            "where" => "videos.module_id in ($array_data) and video_id < $obj_courses_overview->video_id",
            "order" => "video_id DESC");
        $obj_video_ant = $this->obj_videos->get_search_row($params);
        //VIDEO LINK
        $params = array(
            "select" => "slug,
                        name",
            "where" => "videos.module_id in ($array_data) and video_id > $obj_courses_overview->video_id",
            "order" => "video_id ASC");
        $obj_video_next = $this->obj_videos->get_search_row($params);
        //send data
        $this->tmp_course->set("slug", $slug);
        $this->tmp_course->set("course_id", $course_id);
        $this->tmp_course->set("obj_video_ant", $obj_video_ant);
        $this->tmp_course->set("obj_video_next", $obj_video_next);
        $this->tmp_course->set("obj_courses_overview", $obj_courses_overview);
        $this->tmp_course->set("obj_videos", $obj_videos);
        $this->tmp_course->set("total_videos", $total_videos);
        $this->tmp_course->set("obj_modules", $obj_modules);
        $this->tmp_course->set("obj_courses", $obj_courses);
        $this->tmp_course->render("course/c_home");
    }

    public function update_complete() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID por session
            $customer_id = $_SESSION['customer']['customer_id'];
            $course_id = $this->input->post("course_id");
            $video_id = $this->input->post("video_id");
            $total_videos = $this->input->post("total_videos");

            //GET DATA COURSE CUSTOMER
            $params = array(
                "select" => "customer_course_id,
                                        video_actual,
                                        total_video,
                                        total,
                                        complete",
                "where" => "customer_id = $customer_id and course_id = $course_id",
            );
            $curso_actual = $this->obj_customer_courses->get_search_row($params);
            if ($curso_actual->complete != 1) {
                if ($curso_actual->total_video < $total_videos) {
                    //verificar
                    if ($curso_actual->total_video == 0) {
                        //ADD VIDEO_MESSAGE
                        $data = array(
                            'video_actual' => $video_id,
                            'total_video' => 1,
                            'total' => $total_videos,
                        );
                        $result = $this->obj_customer_courses->update_total_video($curso_actual->customer_course_id, $data);
                        if ($result != null) {
                            $data['status'] = true;
                        } else {
                            $data['status'] = false;
                        }
                    } else {
                        if ($curso_actual->video_actual < $video_id) {
                            $total_video = $curso_actual->total_video + 1;
                            //ADD VIDEO_MESSAGE
                            $data = array(
                                'video_actual' => $video_id,
                                'total_video' => $total_video,
                            );
                            $result = $this->obj_customer_courses->update_total_video($curso_actual->customer_course_id, $data);
                            if ($result != null) {
                                $data['status'] = true;
                            } else {
                                $data['status'] = false;
                            }
                        }
                    }
                    //verificar complete
                    $this->verificar_100($curso_actual->customer_course_id, $customer_id);
                }
            }
            //ACTUALIZAR VIDEO
            echo json_encode($data);
        }
    }

    public function verificar_100($customer_course_id, $customer_id) {
        $params = array(
            "select" => "total,
                             total_video",
            "where" => "customer_course_id = $customer_course_id",
        );
        $curso_actual = $this->obj_customer_courses->get_search_row($params);
        $total = $curso_actual->total;
        $total_video = $curso_actual->total_video;
        if ($total == $total_video) {
            //create certificate
            $text = "0000" . $customer_course_id . $customer_id;
            //update complete
            $data = array(
                'complete' => 1,
                'certificate' => $text,
                'date_end' => date("Y-m-d H:i:s"),
            );
            $this->obj_customer_courses->update_total_video($customer_course_id, $data);
            return true;
        } else {
            return false;
        }
    }
    
    public function verify_programa($customer_id) {
        //get data
        $params = array(
            "select" => "customer_course_id",
            "where" => "customer_id = $customer_id and course_id = 3");
        //GET DATA COMMENTS
        $result = $this->obj_customer_courses->total_records($params);
        return $result;
    }

    public function send_message() {
        if ($this->input->is_ajax_request()) {
            //GET CUSTOMER_ID por session
            $customer_id = $_SESSION['customer']['customer_id'];
            $video_id = $this->input->post("video_id");
            $question = $this->input->post("question");
            //GET DATA COURSE CUSTOMER
            $param = array(
                'video_id' => $video_id,
                'customer_id' => $customer_id,
                'message' => $question,
                'date' => date("Y-m-d H:i:s"),
                'active' => 1,
            );
            $result = $this->obj_video_message->insert($param);
            //verify
            if ($result != null) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            //ACTUALIZAR VIDEO
            echo json_encode($data);
        }
    }

    public function get_session() {
        if (isset($_SESSION['customer'])) {
            if ($_SESSION['customer']['logged_customer'] == "TRUE") {
                return true;
            } else {
                redirect(site_url() . 'home');
            }
        } else {
            redirect(site_url() . 'home');
        }
    }

}
