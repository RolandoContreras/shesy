<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("ranges_model","obj_ranges");
        $this->load->model("commissions_model","obj_commissions");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER_ID
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA CUSTOMER
        $params = array(
                        "select" =>"customer.username,
                                    customer.active,
                                    kit.name as kit,
                                    kit.kit_id,
                                    kit.img as kit_img,
                                    ranges.range_id,
                                    ranges.img,
                                    ranges.name",
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1",
                        "join" => array('kit, customer.kit_id = kit.kit_id',
                                        'ranges, customer.range_id = ranges.range_id'),
                        );
        $obj_customer = $this->obj_customer->get_search_row($params);
        
        //GET NEXT RANGE
        $range_actually =  $obj_customer->range_id;
        if($range_actually != ""){
            //GET NEXT RANGE
            $params = array(
                        "select" =>"ranges.range_id,
                                    ranges.name,
                                    ranges.point_grupal,
                                    ranges.img",
                        "where" => "range_id > $range_actually",
                        "order" => "range_id ASC",
                        );
            $obj_next_range = $this->obj_ranges->get_search_row($params);
        }else{
            $obj_next_range =  (object) array("img"=>"1star.png",
                                    "range_id"=>"1",
                                    "point_grupal"=>"3000",
                                    "name"=>"STAR1",);
        }
        
        //GET TOTAL REFERRED
        $params = array(
                        "select" =>"count(*) as total_referred,
                                    (select count(*) FROM unilevel WHERE ident like '%$customer_id%') as total_register",
                        "where" => "unilevel.parend_id = $customer_id and unilevel.status_value = 1"
                        );
        $obj_total_referidos = $this->obj_unilevel->get_search_row($params);
        //GET DATA COMISION
                $params = array(
                        "select" =>"commissions.amount,
                                    commissions.date,
                                    customer.username,
                                    commissions.status_value,
                                    bonus.name as bonus",
                "join" => array( 'bonus, commissions.bonus_id = bonus.bonus_id',
                                 'invoices, commissions.invoice_id = invoices.invoice_id',
                                 'customer, invoices.customer_id = customer.customer_id'),
                "where" => "commissions.customer_id = $customer_id and commissions.active = 1",
                "order" => "commissions.commissions_id DESC",
                "limit" => "10");
           //GET DATA FROM CUSTOMER
        $obj_commissions = $this->obj_commissions->search($params);
        
        
        //GET MONTH AND YEAR
        $month = date('m');
        $year = date('Y');
        $first_day = first_month_day($month, $year);
        $last_day = last_month_day($month, $year);
        
        //GET TOTAL COMMISION
        $params = array(
                "select" =>"sum(amount) as total_comissions,
                            (select sum(amount) FROM commissions WHERE customer_id = $customer_id AND active = 1 AND date BETWEEN '$first_day' AND '$last_day') as commission_by_date,
                            (select sum(amount) FROM commissions WHERE customer_id = $customer_id AND status_value = 1) as total_disponible",
        "where" => "customer_id = $customer_id and active = 1");
           //GET DATA FROM CUSTOMER
        $obj_total_commissions = $this->obj_commissions->get_search_row($params);
        
        $this->tmp_backoffice->set("obj_total_commissions",$obj_total_commissions);
        $this->tmp_backoffice->set("obj_commissions",$obj_commissions);
        $this->tmp_backoffice->set("obj_next_range",$obj_next_range);
        $this->tmp_backoffice->set("obj_total_referidos",$obj_total_referidos);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_home");
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