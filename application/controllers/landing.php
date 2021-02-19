<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("category_model","obj_category");
        $this->load->model("catalog_model","obj_catalog");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("unilevel_model","obj_unilevel");
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
        if(isset($_GET["id"])){
            $customer_id = $_GET["id"];
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
<<<<<<< HEAD
=======
                                    catalog.img,
                                    catalog.img2,
                                    catalog.img3,
                                    catalog.img4,
                                    catalog.video,
                                    catalog.hot_link,
                                    catalog.date,
>>>>>>> 650aed93c87742d24007b7f5fac9eec450075ddd
                                    catalog.active,
                                    catalog.hot_link,
                                    category.slug as category_slug,
                                    category.name as category_name",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.slug = '$slug' and category.slug = '$category_slug' and catalog.active = 1");
        $data['obj_catalog'] = $this->obj_catalog->get_search_row($params);
        $data['hot_link'] = $data['obj_catalog']->hot_link;
        if($data['obj_catalog']->video != ""){
            $video = $data['obj_catalog']->video;
            $explode =  explode("/",$video);
            $video_id = $explode[3];
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
            $pass = $this->crear_pass_rand();
            $parent_id = $this->input->post("customer_id");
            //create user
            $data_param = array(
                'first_name' => $this->input->post("first_name"),
                'last_name' => $this->input->post("last_name"),
                'kit_id' => 0,
                'range_id' => 0,
                'active_month' => 0,
                'email' => $this->input->post("email"),
                'password' => $pass,
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

public function message($name, $email,  $pass) {
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
