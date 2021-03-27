<?php if (!defined("BASEPATH"))exit("No direct script access allowed");

class D_activate_hotmart extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("courses_model", "obj_courses");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("customer_courses_model", "obj_customer_courses");
        $this->load->model("commissions_model", "obj_commissions");
    }

    public function index() {
        get_session();
        $params = array(
            "select" => "invoices.invoice_id,
                        invoices.date,
                        invoices.total,
                        customer.customer_id,
                        customer.username,
                        customer.first_name,
                        customer.last_name,
                        invoices.active,
                        catalog.name,
                        invoice_catalog.quantity,
                        invoice_catalog.price,
                        invoices.pending,
                        invoices.parent_id",
            "join" => array('customer, invoices.customer_id = customer.customer_id',
                            'invoice_catalog, invoice_catalog.invoice_id = invoices.invoice_id',
                            'catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
            "where" => "invoices.hotmark = 1 and invoices.status_value = 1",
            "order" => "invoices.invoice_id ASC");
        //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->search($params);
        //SEND DATA
        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->render("dashboard/activate_hotmart/activate_catalog");
    }

    public function hotmart_cursos() {
        get_session();
        $params = array(
            "select" => "invoices.invoice_id,
                        invoices.date,
                        invoices.total,
                        customer.customer_id,
                        customer.username,
                        customer.first_name,
                        customer.last_name,
                        courses.course_id,
                        courses.name,
                        courses.price,
                        invoices.pending,
                        invoices.parent_id",
            "join" => array('customer, invoices.customer_id = customer.customer_id',
                            'courses, invoices.course_id = courses.course_id'),
            "where" => "invoices.hotmark = 1",
            "order" => "invoices.invoice_id ASC");
        //GET DATA FROM CUSTOMER
        $obj_invoices = $this->obj_invoices->search($params);
        //SEND DATA
        $this->tmp_mastercms->set("obj_invoices", $obj_invoices);
        $this->tmp_mastercms->render("dashboard/activate_hotmart/activate_cursos");
    }

    public function active() {
        if ($this->input->is_ajax_request()) {
            get_session();
        //ACTIVE CUSTOMER NORMALY
            $invoice_id = $this->input->post("id");
            $parent_id = $this->input->post("parent_id");
            $qty = $this->input->post("qty");
            //get ident
            if ($parent_id == 1) {
                $new_ident = 1;
            } else {
                $param_customer = array(
                    "select" => "ident",
                    "where" => "customer_id = $parent_id");
                $customer = $this->obj_unilevel->get_search_row($param_customer);
                $ident = $customer->ident;
                $new_ident = $ident . ",$parent_id";
            }
            $params = array(
            "select" => "catalog.bono_n1,
                        catalog.bono_n2,
                        catalog.bono_n3,
                        catalog.bono_n4,
                        catalog.bono_n5",
            "where" => "invoice_catalog.invoice_id = $invoice_id",
            "join" => array('catalog, invoice_catalog.catalog_id = catalog.catalog_id'),
        );
        $obj_invoice_catalog = $this->obj_invoice_catalog->get_search_row($params);
        if(!empty($new_ident)){
            //INSERT AMOUNT ON COMMISION TABLE    
            $this->pay_unilevel($new_ident, $invoice_id, $obj_invoice_catalog->bono_n1, $obj_invoice_catalog->bono_n2, $obj_invoice_catalog->bono_n3, $obj_invoice_catalog->bono_n4, $obj_invoice_catalog->bono_n5, $qty);
        }
        //updated invoice
        $param = array(
            'pending' => 0,
        );
        $result = $this->obj_invoices->update($invoice_id, $param);
        if($result != null){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        echo json_encode($data);
        }
    }

    public function active_cursos() {
        if ($this->input->is_ajax_request()) {
            get_session();
        //ACTIVE CUSTOMER NORMALY
            $invoice_id = $this->input->post("id");
            $parent_id = $this->input->post("parent_id");
            $course_id = $this->input->post("course_id");
            $customer_id = $this->input->post("customer_id");
            $qty = 1;
            //get ident
            if ($parent_id == 1) {
                $new_ident = 1;
            } else {
                $param_customer = array(
                    "select" => "ident",
                    "where" => "customer_id = $parent_id");
                $customer = $this->obj_unilevel->get_search_row($param_customer);
                $ident = $customer->ident;
                $new_ident = $ident . ",$parent_id";
            }
            $params = array(
            "select" => "bono_1,
                        bono_2,
                        bono_3,
                        bono_4,
                        bono_5",
            "where" => "course_id = $course_id"
        );
        $obj_courses = $this->obj_courses->get_search_row($params);
        if(!empty($new_ident)){
            //INSERT AMOUNT ON COMMISION TABLE    
            $this->pay_unilevel($new_ident, $invoice_id, $obj_courses->bono_1, $obj_courses->bono_2, $obj_courses->bono_3, $obj_courses->bono_4, $obj_courses->bono_5, $qty);
        }
        //update invoice
        $param = array(
            'pending' => 0,
        );
        $this->obj_invoices->update($invoice_id, $param);
        //create course_customer
        $param_course = array(
            'customer_id' => $customer_id,
            'course_id' => $course_id,
            'date_start' => date("Y-m-d H:i:s"),
        );
        $result = $this->obj_customer_courses->insert($param_course);
        if($result != null){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        echo json_encode($data);
        }
    }


    public function pay_unilevel($ident, $invoice_id, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5, $qty) {
        //make upline
          $new_ident = explode(",", $ident);
          rsort($new_ident);
          //BOUCLE ULTI 5 LEVEL
          if (!empty($new_ident)) {
              for ($x = 0; $x <= 4; $x++) {
                  if (isset($new_ident[$x])) {
                      if ($new_ident[$x] != "") {
                          //get customer active
                          $params = array(
                              "select" => "active_month",
                              "where" => "customer_id = $new_ident[$x]"
                          );
                          //GET DATA FROM BONUS
                          $obj_customer = $this->obj_customer->get_search_row($params);
                          //set calculate
                          switch ($x) {
                            case 0:
                                $amount = $bono_n1 * $qty;
                                break;
                            case 1:
                                $amount = $bono_n2 * $qty;
                                break;
                            case 2:
                                $amount = $bono_n3 * $qty;
                                break;
                            case 3:
                                $amount = $bono_n4 * $qty;
                                break;
                            case 4:
                                $amount = $bono_n5 * $qty;
                              break;    
                        }
                        $noventa_percent = $amount * 0.9;
                        $diez_percent = $amount * 0.1;
                          if (isset($obj_customer->active_month) && $obj_customer->active_month == 1) {
                              //INSERT COMMISSION TABLE
                              $data_unilevel = array(
                                  'invoice_id' => $invoice_id,
                                  'customer_id' => $new_ident[$x],
                                  'bonus_id' => 3,
                                  'amount' => $noventa_percent,
                                  'active' => 1,
                                  'pago' => 0,
                                  'status_value' => 1,
                                  'date' => date("Y-m-d H:i:s"),
                                  'created_at' => date("Y-m-d H:i:s"),
                              );
                              $this->obj_commissions->insert($data_unilevel);
                              //insert commission 10%
                              $data_unilevel_2 = array(
                                  'invoice_id' => $invoice_id,
                                  'customer_id' => $new_ident[$x],
                                  'bonus_id' => 3,
                                  'amount' => $diez_percent,
                                  'active' => 1,
                                  'pago' => 0,
                                  'compras' => 1,
                                  'status_value' => 1,
                                  'date' => date("Y-m-d H:i:s"),
                                  'created_at' => date("Y-m-d H:i:s"),
                              );
                              $this->obj_commissions->insert($data_unilevel_2);
                          }else{
                            //insert commission 10%
                            $data_unilevel_2 = array(
                              'invoice_id' => $invoice_id,
                              'customer_id' => $new_ident[$x],
                              'bonus_id' => 3,
                              'amount' => $diez_percent,
                              'active' => 1,
                              'pago' => 0,
                              'compras' => 1,
                              'status_value' => 1,
                              'date' => date("Y-m-d H:i:s"),
                              'created_at' => date("Y-m-d H:i:s"),
                              
                            );
                            $this->obj_commissions->insert($data_unilevel_2);
                          }
                      }
                  }
              }
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