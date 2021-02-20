<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model","obj_category");
        $this->load->model("catalog_model","obj_catalog");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->library('culqi');

    }   

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{   
        if(isset($_GET["d"])){
            $customer_id = $_GET["d"];
        }else{
            $customer_id = 1;            
        }
        $data['customer_id'] = $customer_id;
        //get data nav
        $url = explode("/", uri_string());
        $category_slug = $url[1];
        $slug = $url[2];   
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.description,
                                    catalog.video,
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.img4,
                                    catalog.granel,
                                    catalog.price_del,
                                    catalog.price,
                                    catalog.stock,
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.img4,
                                    catalog.video,
                                    catalog.hot_link,
                                    catalog.date,
                                    catalog.active,
                                    catalog.hot_link,
                                    category.slug as category_slug,
                                    category.name as category_name",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.slug = '$slug' and category.slug = '$category_slug' and catalog.active = 1");
        $data['obj_catalog'] = $this->obj_catalog->get_search_row($params);
        $data['hot_link'] = $data['obj_catalog']->hot_link;
        if($data['obj_catalog']->video != null){
            $video = $data['obj_catalog']->video;
            $explode =  explode("/",$video);
            $host = $explode[2];
            $video_id = $explode[3];
            $data['host'] = $host;
            $data['video_id'] = $video_id;
        }
        //SEND DATA
        $this->load->view('landing',$data);
	}

    public function validate_hot(){
        //UPDATE DATA ORDERS
    if($this->input->is_ajax_request()){  
        date_default_timezone_set('America/Lima');
            //set pass
            //create passtowrd rand
            $parent_id = $this->input->post("customer_id");
            //create user
            $data_param = array(
                'first_name' => $this->input->post("first_name"),
                'last_name' => $this->input->post("last_name"),
                'password' => $this->input->post("pass"),
                'kit_id' => 0,
                'range_id' => 0,
                'active_month' => 0,
                'email' => $this->input->post("email"),
                'country' => 89,
                'active' => 0,
                'status_value' => 1,
                'landing' => 1,
                'created_at' => date("Y-m-d H:i:s"),
            );
            $customer_id = $this->obj_customer->insert($data_param);
            //confition
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
            $data_unilevel = array(
                'customer_id' => $customer_id,
                'parend_id' => $parent_id,
                'new_parend_id' => $parent_id,
                'ident' => $new_ident,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $customer_id,
            );
            $this->obj_unilevel->insert($data_unilevel);
            //send message
        //    $this->message($name, $email, $pass);
            //send 
            $data['status'] = true;
            echo json_encode($data);            
    exit();
        }
}

public function create_invoice() {
  try {
      date_default_timezone_set('America/Lima');
      //SELECT ID FROM CUSTOMER
      $token = $this->input->post('token');
      $catalog_id = trim($this->input->post('kit_id'));
      $email = $this->input->post('email');
      $email_nuevo = $this->input->post('email_nuevo');
      $price = $this->input->post('price');
      $price2 = $this->input->post('price2');
      $phone =  $this->input->post("phone");
      $pass =  $this->input->post("pass");
      $qty =  $this->input->post("qty");
      $sub_total = $price2 * $qty;
      //create user
      $parent_id = $this->input->post("customer_id");
      $date_month = date("Y-m-d", strtotime("+30 day"));
      //MAKE CHARGE
      $charge = $this->culqi->charge($token, $price, $email, "", "", "", "");
      //verify customer
      $obj_customer = $this->verify_email($email);
      if (!empty($obj_customer)) {
        //start session
        $customer_id = $obj_customer->customer_id;
    } else {
        //create user
        $data_param = array(
          'first_name' => "Cultura",
          'last_name' => "Emprendedora",
          'password' => $pass,
          'kit_id' => 0,
          'range_id' => 0,
          'phone' => $phone,
          'email' => $email_nuevo,
          'active' => 1,
          'date_start' => date("Y-m-d H:i:s"),
          'date_month' => $date_month,
          'active_month' => 1,
          'country' => 89,
          'status_value' => 1,
          'landing' => 1,
          'created_at' => date("Y-m-d H:i:s"),
      );
      $customer_id = $this->obj_customer->insert($data_param);
      //create unilevel      
      //confition
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
        $data_unilevel = array(
          'customer_id' => $customer_id,
          'parend_id' => $parent_id,
          'new_parend_id' => $parent_id,
          'ident' => $new_ident,
          'status_value' => 1,
          'created_at' => date("Y-m-d H:i:s"),
          'created_by' => $customer_id,
          );
        $this->obj_unilevel->insert($data_unilevel);
        //send message
    }
      //$this->message($email, $pass);
      //INSERT INVOICE
      $data_invoice = array(
        'customer_id' => $customer_id,
        'sub_total' => $sub_total,
        'igv' => 0,
        'total' => $sub_total,
        'type' => 2,
        'delivery' => 0,
        'date' => date("Y-m-d H:i:s"),
        'active' => 0,
        'status_value' => 1,
        'created_at' => date("Y-m-d H:i:s"),
        'created_by' => $customer_id,
    );
    $invoice_id = $this->obj_invoices->insert($data_invoice);
    //create inovice catalog
    $data_invoice_catalog = array(
        'invoice_id' => $invoice_id,
        'catalog_id' => $catalog_id,
        'price' => $price2,
        'quantity' => $qty,
        'sub_total' => $price2,
        'date' => date("Y-m-d H:i:s")
    );
    $result = $this->obj_invoice_catalog->insert($data_invoice_catalog);
      //get productos by invoice_id
      $params = array(
          "select" => "invoice_catalog.quantity,
                      catalog.bono_n1,
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
          $this->pay_unilevel($new_ident, $invoice_id, $obj_invoice_catalog->bono_n1, $obj_invoice_catalog->bono_n2, $obj_invoice_catalog->bono_n3, $obj_invoice_catalog->bono_n4, $obj_invoice_catalog->bono_n5, $customer_id, $obj_invoice_catalog->quantity);
        }
         //iniciar sesion
         $data_customer_session['customer_id'] = $customer_id;
         $data_customer_session['name'] = "Cultura Imparable";
         $data_customer_session['username'] = "";
         $data_customer_session['email'] = $email;
         $data_customer_session['kit_id'] = 0;
         $data_customer_session['active_month'] = 1;
         $data_customer_session['active'] = 1;
         $data_customer_session['logged_customer'] = "TRUE";
         $data_customer_session['status'] = 1;
         $_SESSION['customer'] = $data_customer_session;
      
      echo json_encode($charge);
  } catch (Exception $e) {
      $data['status'] = false;
      echo json_encode($e->getMessage());
  }
}

public function pay_unilevel($ident, $invoice_id, $bono_n1, $bono_n2, $bono_n3, $bono_n4, $bono_n5, $customer_id, $qty) {
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
                  if (isset($obj_customer->active_month) && $obj_customer->active_month == 1) {
                      //INSERT COMMISSION TABLE
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
                      //insert on table commision
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
                          'created_by' => $customer_id,
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
                          'created_by' => $customer_id,
                      );
                      $this->obj_commissions->insert($data_unilevel_2);
                  }
              }
          }
      }
  }
}

public function verify_email($email) {
  $params = array(
      "select" => "customer_id,
                  first_name,
                  last_name",
      "where" => "email = '$email'");
  $obj_customer = $this->obj_customer->get_search_row($params);
  return $obj_customer;
}

public function message($email,  $pass) {
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
                align='left'>Hola Emprendedor,</p>
            </td>
          </tr>
          <tr>
            <td style='padding:0 30px;display:block;background:#fafafa'>
              <table style='width:100%;border-collapse:collapse;padding:0' width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' align='center'>
                <tbody>
                  <tr>
                    <td style='padding:0;background-color:#fff;border-radius:0 0 5px 5px;padding:32px'>
                      <p style='margin:0;padding-bottom:20px;color:#333333;line-height:22px;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                      Tu cuenta ha sido creada exitosamente accede a tu oficina virtual a través del siguiente enlace  <a href='https://culturaemprendedora.online/iniciar-sesion/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://culturaemprendedora.online&amp;source=gmail&amp;ust=1575431368630000&amp;usg=AFQjCNE2bxZM6aRU9Ckhj6hvz9ZXHzwzyA'>culturaemprendedora.online</a> <br/>Encuentra aquí tus credenciales de ingreso. </p>
                      <p style='margin:0 0 24px;padding:16px;border-radius:5px;padding-bottom:20px;background:#f7f7f7;color:#333333;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                        <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Usuario: </span><strong>$email</strong></span>
                      </p> 
                      <p style='margin:0 0 24px;padding:16px;border-radius:5px;padding-bottom:20px;background:#f7f7f7;color:#333333;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px'>
                        <span style='display:block;padding-bottom:8px'><span style='width:101px;display:inline-block'>Contraseña: </span><strong>$pass</strong></span>
                      </p> 
                      <a href='https://culturaemprendedora.online/iniciar-sesion' style='background:#2d6ced;color:#ffffff;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI','Roboto','Oxygen','Ubuntu','Cantarell','Fira Sans','Droid Sans','Helvetica Neue',sans-serif;font-size:14px;display:inline-block;padding:12px 17px;text-decoration:none;border-radius:5px'
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
                      Visítanos en  <a href='https://culturaemprendedora.online' style='color:#2d6ced;text-decoration:none' target='_blank'>www.culturaemprendedora.online</a></p>
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
    $titulo = "Bienvenido - [CULTURA EMPRENDEDORA]";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: CULTURA EMPRENDEDORA <contacto@culturaemprendedora.online>\r\n";
    $bool = mail("$email", $titulo, $mensaje, $headers);
}


public function crear_pass_rand() {
    $longitud = 8; // longitud del password.
    $pass = substr(md5(rand()), 0, $longitud);
    return($pass); // devuelve el password.
}

}
