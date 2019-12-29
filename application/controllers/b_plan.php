<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_plan extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("kit_model","obj_kit");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("sell_model","obj_sell");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        //GET PLAN INFORMATION
        $params = array(
                        "select" =>"kit_id,
                                    name,
                                    price,
                                    point,
                                    description,
                                    img,
                                    active",
                        "where" => "status_value = 1",
                        "order" => "kit_id ASC",
                        );
        $obj_kit = $this->obj_kit->search($params);
        
        //GET PRICE CURRENCY
        $this->tmp_backoffice->set("obj_kit",$obj_kit);
        $this->tmp_backoffice->render("backoffice/b_plan");
    }
    
    public function create_invoice(){
        if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $kit_id = trim($this->input->post('kit_id'));
               $price = $this->input->post('price');
               $customer_id = $_SESSION['customer']['customer_id'];
               
               //INSERT INVOICE
                $data_invoice = array(
                        'customer_id' => $customer_id,
                        'kit_id' => $kit_id,
                        'sub_total' => $price,
                        'igv' => 0,
                        'total' => $price,
                        'type' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                   $invoce_id = $this->obj_invoices->insert($data_invoice);
                   
               $data['status'] = "true";
               echo json_encode($data); 
        }
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
