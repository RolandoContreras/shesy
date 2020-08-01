<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class B_files extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("customer_model", "obj_customer");
    }

    public function index() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->render("backoffice/b_files");
    }

    public function show_information() {
        if ($this->input->is_ajax_request()) {
            //GET SESION ACTUALY
            $this->get_session();
            $catalog_id = $this->input->post('catalog_id');
                
            //get data
            $params = array(
                        "select" =>"catalog_id,
                                    name,
                                    price,
                                    bono_n1,
                                    bono_n2,
                                    bono_n3,
                                    bono_n4,
                                    bono_n5,
                                    img",
                        "where" => "catalog_id = $catalog_id and active = 1",
                        );
            $obj_catalog = $this->obj_catalog->get_search_row($params);
            if(!empty($obj_catalog)){
                $data['obj_catalog'] = $obj_catalog;
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        }
    }
    
    public function get_profile($customer_id) {
        $params_profile = array(
            "select" => "customer.customer_id,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.img,
                                    ",
            "where" => "customer.customer_id = $customer_id and customer.active = 1"
        );
        //GET DATA COMMENTS
        return $obj_customer = $this->obj_customer->get_search_row($params_profile);
    }

    public function get_session() {
        if (isset($_SESSION['customer'])) {
            if ($_SESSION['customer']['logged_customer'] == "TRUE" && $_SESSION['customer']['status'] == '1') {
                return true;
            } else {
                redirect(site_url() . 'home');
            }
        } else {
            redirect(site_url() . 'home');
        }
    }

}
