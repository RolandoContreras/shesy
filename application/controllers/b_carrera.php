<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_carrera extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("ranges_model","obj_ranges");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("points_model","obj_points");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET RANGE ACTUALLY
        //GET DATA CUSTOMER
        $params = array(
                        "select" =>"ranges.range_id,
                                    ranges.img,
                                    ranges.name",
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1",
                        "join" => array('ranges, customer.range_id = ranges.range_id'),
                        );
        $obj_customer = $this->obj_customer->get_search_row($params);
        
        //GET RANGES
        $params = array(
                        "select" =>"ranges.range_id,
                                    ranges.name,
                                    ranges.point_grupal,
                                    ranges.img",
                        "where" => "ranges.active = 1 and ranges.status_value = 1",
                        "order" => "range_id ASC",
                        );
            $obj_range = $this->obj_ranges->search($params);
            
            $params = array(
                        "select" =>"sum(point) as total_point",
                        "where" => "customer_id = $customer_id"
                            );
                    $point_personal = $this->obj_points->get_search_row($params);
                    $point = $point_personal->total_point;
        
        $this->tmp_backoffice->set("point",$point);
        $this->tmp_backoffice->set("obj_range",$obj_range);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_carrera");
    }
    
    public function get_session(){          
        if (isset($_SESSION['customer'])){
            if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']=='1'){               
                return true;
            }else{
                redirect(site_url().'home');
            }
        }else{
            redirect(site_url().'home');
        }
    }
}