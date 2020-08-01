<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_network extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("customer_model","obj_customer");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER ACTUALLY
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET REFERIDOS INFORMATION
        $params = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.email,
                                    customer.kit_id,
                                    customer.phone,
                                    customer.created_at,
                                    customer.date_start,
                                    customer.active",
                        "where" => "unilevel.parend_id = $customer_id and unilevel.status_value = 1",
                        "join" => array('customer, customer.customer_id = unilevel.customer_id'),
                        "order" => "unilevel.unilevel_id DESC",
                        );
        $obj_referidos = $this->obj_unilevel->search($params);
        
        //GET PLAN INFORMATION
        $params = array("select" =>"count(*) as total_membership,
                                    (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $customer_id and customer.kit_id = 0) as total_posicion,
                                    (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $customer_id and customer.kit_id = 1) as total_pack_1,
                                    (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $customer_id and customer.kit_id = 2) as total_pack_2
                                    ",
                        "where" => "unilevel.parend_id = $customer_id and customer.kit_id = 1 and customer.status_value = 1",
                                    "join" => array('customer, customer.customer_id = unilevel.customer_id')
                        );
        $obj_total = $this->obj_unilevel->get_search_row($params);
        //GET PRICE CURRENCY
        $this->tmp_backoffice->set("obj_referidos",$obj_referidos);
        $this->tmp_backoffice->set("obj_total",$obj_total);
        $this->tmp_backoffice->render("backoffice/b_referred");
    }
    
    public function unilevel()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET CUSTOMER ACTUALLY
        $customer_id = $_SESSION['customer']['customer_id'];
        //get profile
        $obj_profile = $this->get_profile($customer_id);
        //GET DATA URL
        $url = explode("/",uri_string());
        
        if(isset($url[2])){
            $customer_id = decrypt($url[2]);
        }else{
            $customer_id = $_SESSION['customer']['customer_id'];
        }    
        
        //GET CUSTOMER PRINCIPAL
        $params = array(
                        "select" =>"customer_id,
                                    username,
                                    first_name,
                                    active_month,
                                    last_name,
                                    kit_id,
                                    range_id,
                                    active",
                        "where" => "customer_id = $customer_id and status_value = 1",
                        );
        $obj_customer = $this->obj_customer->get_search_row($params);
        
        //GET CUSTOMER N2
        $params_customer_n2 = array(
                        "select" =>"customer.customer_id,
                                    customer.username,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.active_month,
                                    customer.kit_id,
                                    customer.range_id,
                                    customer.active",
                        "where" => "unilevel.parend_id = $obj_customer->customer_id and customer.status_value = 1",
                        "join" => array('unilevel, unilevel.customer_id = customer.customer_id'),
                        "order" => "unilevel.unilevel_id ASC"
                        );
         $obj_customer_n2 = $this->obj_customer->search($params_customer_n2);
         //TOTAL DIRECT
         $obj_total_direct = count($obj_customer_n2);
         $this->tmp_backoffice->set("obj_customer_n2",$obj_customer_n2);
         $this->tmp_backoffice->set("obj_total_direct",$obj_total_direct);
         
         
         //GET CUSTOMER BY PARENTS_ID 3 LEVEL
         if(count($obj_customer_n2) > 0){
             $customer_id_n2 = "";
                 foreach ($obj_customer_n2 as $key => $value) {
                        $customer_id_n2 .= $value->customer_id.",";
                 }
                 //DELETE LAST CARACTER ON STRING
                 $customer_id_n2 = substr ($customer_id_n2, 0, strlen($customer_id_n2) - 1);
                 if(isset($customer_id_n2) != ""){
                     $params_customer_n3 = array(
                                    "select" =>"customer.customer_id,
                                                customer.username,
                                                customer.first_name,
                                                customer.last_name,
                                                customer.active_month,
                                                customer.kit_id,
                                                customer.range_id,
                                                unilevel.parend_id,
                                                customer.active",
                                "where" => "unilevel.parend_id in ($customer_id_n2) and customer.status_value = 1",
                                "join" => array('unilevel, unilevel.customer_id = customer.customer_id'),
                                "order" => "unilevel.unilevel_id ASC"
                                                );
                 $obj_customer_n3 = $this->obj_customer->search($params_customer_n3);
                 $this->tmp_backoffice->set("obj_customer_n3",$obj_customer_n3);
                 
                 //GET CUSTOMER BY PARENTS_ID 4 LEVEL
                 if(count($obj_customer_n3) > 0){
                    $customer_id_n3 = "";
                    foreach ($obj_customer_n3 as $key => $value) {
                           $customer_id_n3 .= $value->customer_id.",";
                    }
                 //DELETE LAST CARACTER ON STRING
                 $customer_id_n3 = substr ($customer_id_n3, 0, strlen($customer_id_n3) - 1);
                    
                         $params_customer_n3 = array(
                                "select" =>"customer.customer_id,
                                            customer.username,
                                            customer.first_name,
                                            customer.active_month,
                                            customer.last_name,
                                            customer.kit_id,
                                            customer.range_id,
                                            unilevel.parend_id,
                                            customer.active
                                            ",
                                "where" => "unilevel.parend_id in ($customer_id_n3) and customer.status_value = 1",
                                "join" => array('unilevel, unilevel.customer_id = customer.customer_id'),
                                "order" => "unilevel.unilevel_id ASC"
                                                );
                            $obj_customer_n4 = $this->obj_customer->search($params_customer_n3);
                            $this->tmp_backoffice->set("obj_customer_n4",$obj_customer_n4);   
                            
                            //GET CUSTOMER BY PARENTS_ID 5 LEVEL
                            if(count($obj_customer_n4) > 0){
                                $customer_id_n4 = "";
                                foreach ($obj_customer_n4 as $key => $value) {
                                       $customer_id_n4 .= $value->customer_id.",";
                                }
                             //DELETE LAST CARACTER ON STRING
                             $customer_id_n4 = substr ($customer_id_n4, 0, strlen($customer_id_n4) - 1);

                                     $params_customer_n4 = array(
                                            "select" =>"customer.customer_id,
                                                        customer.username,
                                                        customer.first_name,
                                                        customer.active_month,
                                                        customer.last_name,
                                                        customer.kit_id,
                                                        customer.range_id,
                                                        unilevel.parend_id,
                                                        customer.active
                                                        ",
                                            "where" => "unilevel.parend_id in ($customer_id_n4) and customer.status_value = 1",
                                            "join" => array('unilevel, unilevel.customer_id = customer.customer_id'),
                                            "order" => "unilevel.unilevel_id ASC"
                                                            );
                                        $obj_customer_n5 = $this->obj_customer->search($params_customer_n4);
                                        $this->tmp_backoffice->set("obj_customer_n5",$obj_customer_n5);   
                                        
                                        
                                        //GET CUSTOMER BY PARENTS_ID 6 LEVEL
                                        if(count($obj_customer_n5) > 0){
                                            $customer_id_n5 = "";
                                            foreach ($obj_customer_n5 as $key => $value) {
                                                   $customer_id_n5 .= $value->customer_id.",";
                                            }
                                         //DELETE LAST CARACTER ON STRING
                                         $customer_id_n5 = substr ($customer_id_n5, 0, strlen($customer_id_n5) - 1);

                                                 $params_customer_n5 = array(
                                                        "select" =>"customer.customer_id,
                                                                    customer.username,
                                                                    customer.first_name,
                                                                    customer.active_month,
                                                                    customer.last_name,
                                                                    customer.kit_id,
                                                                    customer.range_id,
                                                                    unilevel.parend_id,
                                                                    customer.active
                                                                    ",
                                                        "where" => "unilevel.parend_id in ($customer_id_n5) and customer.status_value = 1",
                                                        "join" => array('unilevel, unilevel.customer_id = customer.customer_id'),
                                                        "order" => "unilevel.unilevel_id ASC"
                                                                        );
                                                    $obj_customer_n6 = $this->obj_customer->search($params_customer_n5);
                                                    $this->tmp_backoffice->set("obj_customer_n6",$obj_customer_n6);   
                                            }
                                }
                    }
                 
                 }
            }
        //GET TOTAL REFERRED
        $params = array(
                        "select" =>"unilevel_id",
                        "where" => "ident like '%$customer_id%'"
                        );
        $obj_total_referidos = $this->obj_unilevel->total_records($params);    
        
        //GET PRICE CURRENCY
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->set("obj_total_referidos",$obj_total_referidos);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_unilevel");
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


    
