<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
class B_cursos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("ranges_model", "obj_ranges");
        $this->load->model("unilevel_model", "obj_unilevel");
        $this->load->model("points_model", "obj_points");
        $this->load->model("commissions_model", "obj_commissions");
        
    }

    public function index() {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //GET RANGE ACTUALLY
        $params = array(
            "select" => "ranges.range_id,
                                    ranges.img,
                                    ranges.name",
            "where" => "customer.customer_id = $customer_id and customer.status_value = 1",
            "join" => array('ranges, customer.range_id = ranges.range_id'),
        );
        $obj_customer = $this->obj_customer->get_search_row($params);

        //GET RANGES
        $params = array(
            "select" => "ranges.range_id,
                                    ranges.name,
                                    ranges.point_grupal,
                                    ranges.img",
            "where" => "ranges.active = 1 and ranges.status_value = 1",
            "order" => "range_id ASC",
        );
        $obj_range = $this->obj_ranges->search($params);
        //GET TOTAL COMMISION
        $params = array(
            "select" => "sum(amount) as total_comissions",
            "where" => "customer_id = $customer_id and pago != 1 and amount > 0");
        //GET DATA FROM CUSTOMER
        $obj_total_commissions = $this->obj_commissions->get_search_row($params);
        $point = $obj_total_commissions->total_comissions;
        $this->tmp_backoffice->set("point", $point);
        $this->tmp_backoffice->set("obj_profile", $obj_profile);
        $this->tmp_backoffice->set("obj_range", $obj_range);
        $this->tmp_backoffice->set("obj_customer", $obj_customer);
        $this->tmp_backoffice->render("backoffice/b_carrera");
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
