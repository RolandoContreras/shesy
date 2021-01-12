<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("paises_model", "obj_paises");
        $this->load->model("unilevel_model", "obj_unilevel");
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        //SELECT URL IF ISSET USERNAME
        $url = explode("/", uri_string());
        if (isset($url[1])) {
            $username = $url[1];
            //Select params
            $params = array(
                "select" => "customer_id,first_name,last_name, username",
                "where" => "username = '$username'");
            $obj_paises['obj_customer'] = $this->obj_customer->get_search_row($params);
        }
        //Select params
        $params = array(
            "select" => "id, nombre",
            "where" => "id_idioma = 7",
            "order" => "nombre ASC"
            );
        $obj_paises['obj_paises'] = $this->obj_paises->search($params);
        /// VIEW
        $obj_paises['title'] = "Registro";
        $this->load->view("register", $obj_paises);
    }

    public function validate_username() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
            $username = str_to_minuscula(trim($this->input->post('username')));
            $param_customer = array(
                "select" => "customer_id",
                "where" => "username = '$username'");
            $customer = $this->obj_customer->get_search_row($param_customer);
            if (isset($customer->customer_id) != "") {
                $data['message'] = "true";
                $data['print'] = "No esta disponible! <i class='fa fa-times-circle-o' aria-hidden='true'></i>";
            } else {
                $data['message'] = "false";
                $data['print'] = "Usuario Disponible! <i class='fa fa-check-square-o' aria-hidden='true'></i>";
            }
            echo json_encode($data);
        }
    }

    public function validate_username_2() {
        if ($this->input->is_ajax_request()) {
            //SELECT ID FROM CUSTOMER
            $username = str_to_minuscula(trim($this->input->post('username')));
            $param_customer = array(
                "select" => "customer_id,
                            first_name,
                            last_name",
                "where" => "username = '$username'");
            $customer = $this->obj_customer->get_search_row($param_customer);

            if (count($customer) > 0) {
                $data['message'] = "true";
                $data['value'] = "$customer->customer_id";
                $data['print'] = "$customer->first_name $customer->last_name <i class='fa fa-check-square-o' aria-hidden='true'></i>";
            } else {
                $data['message'] = "false";
                $data['print'] = "No encontrado! <i class='fa fa-times-circle-o' aria-hidden='true'></i>";
            }
            echo json_encode($data);
        }
    }

    public function validate_username_register($username) {
        //SELECT ID FROM CUSTOMER
        $param_customer = array(
            "select" => "customer_id",
            "where" => "username = '$username'");
        $customer = $this->obj_customer->get_search_row($param_customer);
        if ($customer != null) {
            return 1;
        } else {
            return 0;
        }
    }

    public function validate() {
        if ($this->input->is_ajax_request()) {
            //SET TIMEZONE AMERICA
            date_default_timezone_set('America/Lima');
            //verify recaptcha
            if ($_POST['google-response-token']) {
                $googleToken = $_POST['google-response-token'];
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LedZSkaAAAAAP7fhdf1Y7TF6Yb44bMBqnfKA0ro&response={$googleToken}");
                $response = json_decode($response);
                $response = (array) $response;
                if ($response['success'] && ($response['score'] && $response['score'] > 0.1)) {
                    //get data
                    $username = str_to_minuscula($this->input->post("username"));
                    //VALIDATE USERNAME
                    $result = $this->validate_username_register($username);
                    if ($result == 1) {
                        $data['status'] = "username";
                    } else {
                        $parent_id = $this->input->post("parent_id");
                        $parent_id_2 = $this->input->post("parent_id_2");
                        $name = $this->input->post("name");
                        $last_name = $this->input->post("last_name");
                        $email = $this->input->post("email");
                        $dni = $this->input->post("dni");
                        $phone = $this->input->post("phone");
                        $pass = $this->input->post("pass");
                        $address = $this->input->post("address");
                        $country = $this->input->post("country");
                        //INSERT TABLE CUSTOMER
                        $data = array(
                            'first_name' => $name,
                            'last_name' => $last_name,
                            'kit_id' => 0,
                            'range_id' => 0,
                            'active_month' => 0,
                            'username' => $username,
                            'email' => $email,
                            'password' => $pass,
                            'address' => $address,
                            'phone' => $phone,
                            'dni' => $dni,
                            'country' => $country,
                            'active' => 0,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                        );
                        $customer_id = $this->obj_customer->insert($data);
                        //GET IDENT    
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
                        //CREATE UNILEVEL
                        $data_invoice = array(
                            'customer_id' => $customer_id,
                            'parend_id' => $parent_id,
                            'new_parend_id' => $parent_id_2,
                            'ident' => $new_ident,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        );
                        $this->obj_unilevel->insert($data_invoice);
                        //iniciar sesion
                        $data_customer_session['customer_id'] = $customer_id;
                        $data_customer_session['name'] = $name . ' ' . $last_name;
                        $data_customer_session['username'] = $username;
                        $data_customer_session['email'] = $email;
                        $data_customer_session['kit_id'] = 0;
                        $data_customer_session['active_month'] = 0;
                        $data_customer_session['active'] = 0;
                        $data_customer_session['logged_customer'] = "TRUE";
                        $data_customer_session['status'] = 1;
                        $_SESSION['customer'] = $data_customer_session;
                        //send message
                        $this->message($username, $pass, $name, $email);
                        //count data cart
                        $cart = count($this->cart->contents());
                        if ($cart > 0) {
                            $data['status'] = "true2";
                        } else {
                            $data['status'] = true;
                        }
                    }
                } else {
                    $data['status'] = "false2";
                }
            } else {
                $data['status'] = "false2";
            }
            echo json_encode($data);
        }
    }

    public function message($username, $pass, $name, $email) {
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
                          Tu cuenta ha sido creada exitosamente accede a tu oficina virtual a través del siguiente enlace  <a href='https://culturaimparable.com/iniciar-sesion/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://culturaimparable.com&amp;source=gmail&amp;ust=1575431368630000&amp;usg=AFQjCNE2bxZM6aRU9Ckhj6hvz9ZXHzwzyA'>culturaimparable.com</a> <br/>Encuentra aquí tus credenciales de ingreso. </p>
                          <p style='margin:0 0 24px;padding:16px;border-radius:5px;padding-bottom:20px;background:#f7f7f7;color:#333333;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                          <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Usuario: </span><strong>$username</strong></span>
                            <span style='display:block'><span style='width:101px;display:inline-block'>Contraseña: </span><strong>$pass</strong></span>
                          </p> 
                          <a href='https://culturaimparable.com/iniciar-sesion' style='background:#2d6ced;color:#ffffff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px;display:inline-block;padding:12px 17px;text-decoration:none;border-radius:5px'
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
                          Visítanos en  <a href='https://culturaimparable.com' style='color:#2d6ced;text-decoration:none' target='_blank'>www.culturaimparable.com</a></p>
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
        $titulo = "Bienvenido - [CULTURA IMPARABLE]";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: CULTURA IMPARABLE <contacto@culturafk.com>\r\n";
        $bool = mail("$email", $titulo, $mensaje, $headers);
    }

}
