<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
     parent::__construct();
     $this->load->model('customer_model','obj_customer');
    } 

    public function index(){
        $data['title'] = "Inicio de Sesión";
        $this->load->view('login', $data);
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
                                        customer.active_month,
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
                    $data_customer_session['active_month'] = $obj_customer->active_month;
                    $data_customer_session['active'] = $obj_customer->active;
                    $data_customer_session['logged_customer'] = "TRUE";
                    $data_customer_session['status'] = $obj_customer->status_value;
                    $_SESSION['customer'] = $data_customer_session; 
                    $data['status'] = "true";
                    
                    //count data cart
                    $cart = count($this->cart->contents());
                    if($cart > 0){
                        $data['status'] = "true2";
                    }else{
                        $data['status'] = "true";
                    }
            }else{
                   $data['status'] = "false";
            }
            echo json_encode($data); 
            exit(); 
    }

    public function forget(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {  
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
            header('Access-Control-Allow-Credentials: true');  
            header('Access-Control-Max-Age: 86400');   
        }

            //GET DATA STRING
            $username = $this->input->post("username");
            //SET PARAMETER
            $params = array("select" =>"customer.customer_id,
                                        customer.first_name,
                                        customer.username,
                                        customer.email,
                                        customer.password,
                                        customer.last_name,
                                        customer.active,
                                        customer.status_value",
                             "where" => "customer.username = '$username' and customer.status_value = 1");
            
            $obj_customer_login = $this->obj_customer->get_search_row($params);
            
            if(count($obj_customer_login) > 0){
                $this->message($obj_customer_login->username, $obj_customer_login->password, $obj_customer_login->first_name, $obj_customer_login->email);
                $data['status'] = "true";
            }else{
                $data['status'] = "false";
            }

            echo json_encode($data); 
            exit(); 
    }
    
    public function validate_cart(){
        if($this->input->is_ajax_request()){
            if(isset($_SESSION['customer'])){
                $data['status'] = "true";
            }else{
                $data['status'] = "false";
            }
            echo json_encode($data); 
            exit(); 
        }
    }
    
     public function message($username, $pass, $name, $email){    
                $img = site_url().'static/page_front/images/logo_header.png';           
                $mensaje = wordwrap("<html>
                    
 <div bgcolor='#E9E9E9' style='background:#fff;margin:0;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
  <table style='background-color:#fff;border-collapse:collapse;margin:0;padding:0' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0'
    align='center'>
    <tbody>
      <tr>
        <td valign='top' align='center'>
          <table style='border-collapse:collapse;margin:0;padding:0;max-width:600px' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
            <tbody>
              <tr>
                <td style='padding:39px 30px 31px;display:block;background:#fafafa'> <img src='$img' alt='bca-logo' style='display:inline-block;padding-right:12px' class='CToWUd'> </td>
              </tr>
              <tr>
                <td style='padding:0 30px;display:block;background:#fafafa'>
                  <p style='padding:32px 32px 0;color:#333333;background:#fff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;line-height:14px;margin:0;font-size:14px;border-radius:5px 5px 0 0'
                    align='left'>Hola $name,</p>
                </td>
              </tr>
              <tr>
                <td style='padding:0 30px;display:block;background:#fafafa'>
                  <table style='width:100%;border-collapse:collapse;padding:0' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
                    <tbody>
                      <tr>
                        <td style='padding:0;background-color:#fff;border-radius:0 0 5px 5px;padding:32px'>
                          <p style='margin:0;padding-bottom:20px;color:#333333;line-height:22px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                           Encuentra aquí tus credenciales de ingreso. </p>
                          <p style='margin:0 0 24px;padding:16px;border-radius:5px;padding-bottom:20px;background:#f7f7f7;color:#333333;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                          <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Usuario: </span><strong>$username</strong></span>
                            <span style='display:block'><span style='width:101px;display:inline-block'>Contraseña: </span><strong>$pass</strong></span>
                          </p> 
                          <a href='https://culturafk.com/login' style='background:#2d6ced;color:#ffffff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px;display:inline-block;padding:12px 17px;text-decoration:none;border-radius:5px'
                            target='_blank'>Iniciar Sesión</a>                          
                          </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style='padding:30px 30px 0;display:block;background:#fafafa'>
                  <table style='width:100%;border-collapse:collapse;padding:0;text-align:center' width='100%' height='100%' cellspacing='0' cellpadding='0'
                    border='0' align='center'>
                    <tbody>
                      <tr>
                        <td style='max-width:290px;display:inline-block;padding:0 19px 30px;box-sizing:border-box;text-align:left'>
                          <p style='margin:0;text-align:center;line-height:20px;color:#888888;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:12px'>
                          Visítanos en  <a href='https://culturafk.com/' style='color:#2d6ced;text-decoration:none' target='_blank'>www.culturafk.com</a></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
                            .</html>", 70, "\n", true);
                    $titulo = "Recuperar Contraseña - [CULTURA FK]";
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                    $headers .= "From: CULTURA FK <contacto@culturafk.com>\r\n";
                    $bool = mail("$email",$titulo,$mensaje,$headers);
                    
    }
        
    
    
    public function logout(){        
        $this->session->unset_userdata('customer');
	$this->session->destroy();
        redirect('home'); 
    }
    
}
