<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class B_profile extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
    }

    public function index()
    {
        //GET SESION ACTUALY
        $this->get_session();
        /// VISTA
        $customer_id = $_SESSION['customer']['customer_id'];
        //GET DATA PRICE CRIPTOCURRENCY
        $params = array(
                        "select" =>"customer.username,
                                    customer.email,
                                    customer.first_name,
                                    customer.last_name,
                                    customer.bank_id,
                                    customer.bank_number,
                                    customer.bank_account,
                                    customer.bank_number_cci,
                                    customer.created_at,
                                    customer.date_start,
                                    customer.date_month,
                                    customer.address,
                                    customer.phone,
                                    customer.dni,
                                    customer.active,
                                    paises.nombre,
                                    kit.name as kit",
                        "where" => "customer.customer_id = $customer_id and customer.status_value = 1 and paises.id_idioma = 7",
                        "join" => array('kit, customer.kit_id = kit.kit_id',
                                        'paises, customer.country = paises.id'),
                        );

        $obj_customer = $this->obj_customer->get_search_row($params);
        //get data img
        $obj_profile = $this->get_profile($customer_id);
        //GET PRICE CURRENCY
        $this->tmp_backoffice->set("obj_profile",$obj_profile);
        $this->tmp_backoffice->set("obj_customer",$obj_customer);
        $this->tmp_backoffice->render("backoffice/b_profile");
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
    
    public function get_messages_informative(){
            $params = array(
                            "select" =>"",
                             "where" => "active = 1 and status_value = 1 and support = 0",
                            "order" => "position ASC");
                
           $messages_informative = $this->obj_messages->search($params); 
            return $messages_informative;
    }
    
    public function update_password(){
             if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $pass = trim($this->input->post('pass'));
               $new_pass = $this->input->post('new_pass');
               $customer_id = $_SESSION['customer']['customer_id'];
               
               $param_customer = array(
                                "select" => "password",
                                "where" => "customer_id = '$customer_id' and password = '$pass'");
                $customer = count($this->obj_customer->get_search_row($param_customer));
                if($customer > 0){
                    //UPDATE DATA EN CUSTOMER TABLE
                    $data = array(
                        'password' => $new_pass,
                        'updated_by' => $customer_id,
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                    $data['status'] = "true";
                }else{
                    $data['status'] = "false";
                }
               echo json_encode($data); 
            }
    }
    
    public function update_bank(){
             if($this->input->is_ajax_request()){   
                //SELECT ID FROM CUSTOMER
               $bank_id = trim($this->input->post('bank_id'));
               $bank_account = trim($this->input->post('bank_account'));
               $bank_number = trim($this->input->post('bank_number'));
               $back_number_cci = trim($this->input->post('back_number_cci'));
               $customer_id = $_SESSION['customer']['customer_id'];
               
                    //UPDATE DATA EN CUSTOMER TABLE
                    $data = array(
                        'bank_id' => $bank_id,
                        'bank_account' => $bank_account,
                        'bank_number' => $bank_number,
                        'bank_number_cci' => $back_number_cci,
                        'updated_by' => $customer_id,
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
                    $this->obj_customer->update($customer_id,$data);
                    $data['status'] = "true";
               echo json_encode($data); 
            }
    }
    
    public function upload_img() {

        //SELECT ID FROM CUSTOMER
        $img = $_FILES['file'];
        $templocation = $img["tmp_name"];
        $name = $img["name"];
        //get customer_id
        $customer_id = $_SESSION['customer']['customer_id'];
        //create file
        if (!is_dir("./static/backoffice/images/profile/$customer_id")) {
            mkdir("./static/backoffice/images/profile/$customer_id", 0777);
        }
        if (!$templocation) {
            die("No se ha seleccionado ningun archivos");
        }

        $files = glob("./static/backoffice/images/profile/$customer_id/*"); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file); //elimino el fichero
        }
        
        if (move_uploaded_file($templocation, "./static/backoffice/images/profile/$customer_id/$name")) {
            echo "archivos guardos";
            //save on table
            $data = array(
                'img' => $name
            );
            //SAVE DATA IN TABLE    
            $result = $this->obj_customer->update($customer_id, $data);
            if (!empty($result)) {
                echo "guardado";
            } else {
                echo "error";
            }
        } else {
            echo "Error";
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


    
