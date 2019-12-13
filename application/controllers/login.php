<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model('customer_model','obj_customer');
    } 

    public function index(){
        $this->load->view('login');
    }
        
    public function validate(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {  
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
            header('Access-Control-Allow-Credentials: true');  
            header('Access-Control-Max-Age: 86400');   
        }

            //GET DATA STRING
            $code = $this->input->post("code");
            $pass = $this->input->post("pass");
            //SET PARAMETER
            $params = array("select" =>"customer.customer_id,
                                        customer.first_name,
                                        customer.username,
                                        customer.last_name,
                                        customer.kit_id,
                                        customer.email,
                                        customer.active,
                                        customer.status_value",
                             "where" => "customer.username = '$code' and customer.password = '$pass' and customer.status_value = 1");
            
            $obj_customer_login = $this->obj_customer->total_records($params);
            if ($obj_customer_login > 0){
                    $obj_customer = $this->obj_customer->get_search_row($params);
                    $data_customer_session['customer_id'] = $obj_customer->customer_id;
                    $data_customer_session['name'] = $obj_customer->first_name.' '.$obj_customer->last_name;
                    $data_customer_session['username'] = $obj_customer->username;
                    $data_customer_session['email'] = $obj_customer->email;
                    $data_customer_session['kit_id'] = $obj_customer->kit_id;
                    $data_customer_session['active'] = $obj_customer->active;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $data_customer_session['status'] = $obj_customer->status_value;
                    $_SESSION['customer'] = $data_customer_session; 
                    $data['status'] = "true";
            }else{
                   $data['status'] = "false";
            }
            echo json_encode($data); 
            exit(); 
    }

    public function logout(){        
        $this->session->unset_userdata('customer');
	$this->session->destroy();
        redirect('home'); 
    }
    
}
