<?php

if (!defined("BASEPATH"))
    exit("No direct script access allowed");

class D_activate_cursos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("customer_courses_model", "obj_customer_courses");
    }

    public function index() {
        get_session();
        $params = array(
            "select" => "courses.name as course_name,
                                    courses.course_id,
                                    customer.customer_id,
                                    customer.email,
                                    customer.name,
                                    customer.last_name,
                                    customer_courses.customer_course_id,
                                    customer_courses.complete,
                                    customer_courses.date_start",
            "join" => array('courses, customer_courses.course_id = courses.course_id',
                'customer, customer_courses.customer_id = customer.customer_id'),
            "order" => "customer_courses.customer_course_id DESC");
        //GET DATA FROM INVOICES
        $obj_customer_courses = $this->obj_customer_courses->search($params);
        //SEND DATA
        $this->tmp_mastercms->set("obj_customer_courses", $obj_customer_courses);
        $this->tmp_mastercms->render("dashboard/activate/activate_list");
    }

    public function load($customer_course_id = null) {
        get_session();
        if ($customer_course_id) {
            $params = array(
                "select" => "customer_courses.customer_course_id,
                                    customer_courses.video_actual,
                                    customer_courses.total_video,
                                    courses.course_id,
                                    courses.name as course_name,
                                    customer.customer_id,
                                    customer.customer_id,
                                    customer.phone,
                                    customer.email,
                                    customer.name,
                                    customer.last_name,
                                    customer_courses.complete,
                                    customer_courses.date_start",
                "join" => array('courses, customer_courses.course_id = courses.course_id',
                    'customer, customer_courses.customer_id = customer.customer_id'),
                "where" => "customer_courses.customer_course_id = $customer_course_id");
            $obj_customer_courses = $this->obj_customer_courses->get_search_row($params);
            $this->tmp_mastercms->set("obj_customer_courses", $obj_customer_courses);
        }

        //OBTENER COURSE ACTIVE
        $params = array(
            "select" => "name,
                                    course_id,
                                    price",
            "where" => "active = 1",
        );
        //GET DATA COMMENTS
        $obj_courses = $this->obj_courses->search($params);
        //send data
        $this->tmp_mastercms->set("obj_courses", $obj_courses);
        $this->tmp_mastercms->render("dashboard/activate/active_form");
    }

    public function active() {
        get_session();
        //ACTIVE CUSTOMER NORMALY
        if ($this->input->is_ajax_request()) {
            //SELECT CUSTOMER_ID
            $customer_course_id = $this->input->post("customer_course_id");
            $customer_id = $this->input->post("customer_id");
            $course_id = $this->input->post("course_id");
            if ($customer_course_id != "") {
                if ($customer_id != "" && $course_id != "") {
                    $data = array(
                        'customer_id' => $this->input->post("customer_id"),
                        'course_id' => $this->input->post("course_id"),
                    );
                    $result = $this->obj_customer_courses->update($customer_course_id, $data);
                    if ($result != null) {
                        $data['status'] = true;
                    } else {
                        $data['status'] = false;
                    }
                }
            } else {
                if ($customer_id != "" && $course_id != "") {
                    //GET DATA FROM TABLE COURSE
                    $params = array(
                        "select" => "price",
                        "where" => "course_id = $course_id"
                    );
                    //GET DATA FROM BONUS
                    $obj_courses = $this->obj_courses->get_search_row($params);
                    //CREATE INVOICE
                    $data_invoice = array(
                        'customer_id' => $customer_id,
                        'course_id' => $course_id,
                        'total' => $obj_courses->price,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 2,
                    );
                    $this->obj_invoices->insert($data_invoice);
                    //CREATE CUSTOMER COURSE
                    //sumar el tiempo de duración
                    $data = array(
                        'customer_id' => $customer_id,
                        'course_id' => $course_id,
                        'date_start' => date("Y-m-d H:i:s"),
                    );
                    $result = $this->obj_customer_courses->insert($data);
                    if ($result != null) {
                        $data['status'] = true;
                    } else {
                        $data['status'] = false;
                    }
                }
            }
            echo json_encode($data);
        }
    }
    
    public function delete(){
        get_session();
         if ($this->input->is_ajax_request()) {
             //OBETENER ID
             $customer_course_id = $this->input->post("customer_course_id");
             $course_id = $this->input->post("course_id");
             $customer_id = $this->input->post("customer_id");
            //VERIFY IF ISSET CUSTOMER_ID
            if ($customer_course_id != null){
                $this->obj_customer_courses->delete($customer_course_id);
                //verificar si existe facturas y eliminar
                $params = array(
                        "select" =>"invoice_id",
                "where" => "course_id = $course_id and customer_id = $customer_id");
                //GET DATA FROM INVOICES
                $obj_invoices = $this->obj_invoices->get_search_row($params);
                    if($obj_invoices != null){
                        //eliminar factura
                      $result =  $this->obj_invoices->delete($obj_invoices->invoice_id);    
                      if($result != null){
                          $data['status'] = true;
                      }else{
                          $data['status'] = false;
                      }
                    }
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
        }       
    }

    public function validate_user() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
            $username = str_to_minuscula(trim($this->input->post('username')));
            $param_customer = array(
                "select" => "customer_id,name,phone",
                "where" => "email = '$username'");
            $customer = $this->obj_customer->get_search_row($param_customer);
            if (isset($customer->customer_id) != "") {
                $data['message'] = "true";
                $data['name'] = $customer->name;
                $data['dni'] = $customer->phone;
                $data['customer_id'] = $customer->customer_id;
                $data['print'] = "Cliente Encontrado!";
            } else {
                $data['message'] = "false";
                $data['print'] = "Cliente no existe!";
            }
            echo json_encode($data);
        }
    }
}

?>