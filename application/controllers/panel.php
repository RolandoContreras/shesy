<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Panel extends CI_Controller{
    public function __construct() {
        parent::__construct();    
        $this->load->model("comments_model","obj_comments");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("points_model","obj_points");
        $this->load->model("ranges_model","obj_ranges");
        $this->load->library("export_excel");
    }
    
    public function index(){
        //GET THE SESSION
        $this->get_session();

         //GET PENDING ROWS
        $params = array("select" =>"count(*) as pending_comments,
                                    (select count(*) from pay where active = 1) as pending_pay,
                                    (select count(*) from invoices where delivery = 1 and type = 2 and active = 2) as pending_invoices_catalog,
                                    (select count(*) from embassy where active = 1 and status_value = 1) as pending_embassy",
                        "where" => "active = 1");
        $obj_pending = $this->obj_comments->get_search_row($params);
        
        //GET DATE FOR MONTH
        $first_day_month =  first_month_day_actual();
        $last_day_month =  last_month_day_actual();
        
        //GET MONTH AND YEARS
        $year = date('Y');
        $pass_year = date('Y', strtotime('-1 year')) ;
        $pass_year_2 = date('Y', strtotime('-2 year')) ;
        
        $month = date('m');
        $mes_actual = mostrar_mes($month);
        
        $primer_dia_ano = "$year-01-01";
        $ultimo_dia_ano = "$year-12-31";
        
        //GET DATE FOR WEEK
        $lunes_semana_actual = first_week_actual();
        $domingo_semana_actual =  last_week_actual(); 
        
                //GET MES
                $params = array(
                        "select" =>"sum(price) as total_mes,
                                    (SELECT sum(total) FROM (invoices) WHERE invoices.active = 2) as sum_total_invoice,
                                    (SELECT sum(total) FROM (invoices) WHERE invoices.type = 1 and invoices.active = 2) as sum_total_pack,
                                    (SELECT count(*) FROM (embassy) WHERE status_value = 1) as sum_total_embassy,
                                    (SELECT sum(total) FROM (invoices) WHERE invoices.type = 2 and invoices.active = 2) as sum_total_catalog,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-01-01' AND '$year-01-31' and invoices.active = 2) as sum_ene,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-02-01' AND '$year-02-31' and invoices.active = 2) as sum_feb,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-03-01' AND '$year-03-31' and invoices.active = 2) as sum_mar,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-04-01' AND '$year-04-31' and invoices.active = 2) as sum_abr,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-05-01' AND '$year-05-31' and invoices.active = 2) as sum_may,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-06-01' AND '$year-06-31' and invoices.active = 2) as sum_jun,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-07-01' AND '$year-07-31' and invoices.active = 2) as sum_jul,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-08-01' AND '$year-08-31' and invoices.active = 2) as sum_ago,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-09-01' AND '$year-09-31' and invoices.active = 2) as sum_set,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-10-01' AND '$year-10-31' and invoices.active = 2) as sum_oct,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-11-01' AND '$year-11-31' and invoices.active = 2) as sum_nov,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$year-12-01' AND '$year-12-31' and invoices.active = 2) as sum_dic,
                                    (SELECT count(*) FROM (invoices) WHERE date BETWEEN '$lunes_semana_actual' AND '$domingo_semana_actual' AND invoices.type = 2 and invoices.active = 2) as total_invoice_catalog_week_active,
                                    (SELECT count(*) FROM (invoices) WHERE date BETWEEN '$lunes_semana_actual' AND '$domingo_semana_actual' AND invoices.type = 2) as total_invoice_catalog_week,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$lunes_semana_actual' AND '$domingo_semana_actual' AND invoices.active = 2 ) as sum_total_week_invoice,
                                    (SELECT count(*) FROM (invoices) WHERE date BETWEEN '$first_day_month' AND '$last_day_month' AND invoices.active = 2) as count_total_mes,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$first_day_month' AND '$last_day_month' AND invoices.active = 2) as sum_total_mes,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$primer_dia_ano' AND '$ultimo_dia_ano' AND invoices.active = 2) as total_year",
                "join" => array( 'kit, invoices.kit_id = kit.kit_id'),
                "where" => "date BETWEEN '$first_day_month' AND '$last_day_month' and invoices.type = 1 and invoices.active = 2");
            //GET DATA FROM CUSTOMER
            $obj_invoices = $this->obj_invoices->get_search_row($params);
            
                //GET SEMANA    
                $params = array(
                        "select" =>"sum(price) as total_semana",
                "join" => array( 'kit, invoices.kit_id = kit.kit_id'),
                "where" => "date BETWEEN '$lunes_semana_actual' AND '$domingo_semana_actual' AND invoices.type = 1 and invoices.active = 2");
            //GET DATA FROM CUSTOMER
            $obj_invoices_semana = $this->obj_invoices->get_search_row($params);
            $total_semana = $obj_invoices_semana->total_semana;
            
            
        //GET TOTAL ROWS
        $params = array("select" =>"count(comment_id) as total_comments,
                                    (select count(*) from customer) as total_customer, 
                                    (select count(*) from customer where kit_id > 0 and active = 1) as total_activos,
                                    (select count(*) from customer where kit_id = 0) as total_position,
                                    (select count(*) from category) as total_category,
                                    (select count(*) from kit) as total_kit,
                                    (select count(*) from invoices) as total_invoices,
                                    (select count(*) from ranges) as total_ranges,
                                    (select count(*) from pay) as total_pay");
        $obj_total = $this->obj_comments->get_search_row($params);
        
        $this->tmp_mastercms->set('year',$year);
        $this->tmp_mastercms->set('pass_year',$pass_year);
        $this->tmp_mastercms->set('pass_year_2',$pass_year_2);
        $this->tmp_mastercms->set('mes_actual',$mes_actual);
        $this->tmp_mastercms->set('lunes_semana_actual',$lunes_semana_actual);
        $this->tmp_mastercms->set('domingo_semana_actual',$domingo_semana_actual);
        $this->tmp_mastercms->set('obj_invoices',$obj_invoices);
        $this->tmp_mastercms->set('total_semana',$total_semana);
        $this->tmp_mastercms->set('obj_pending',$obj_pending);
        $this->tmp_mastercms->set('obj_total',$obj_total);
        $this->tmp_mastercms->render('panel');
     }
     
    public function cron_range(){
         
         //GET DATA CUSTOMER ACTIVE
         $params = array(
                        "select" =>"customer_id,
                                    range_id",
                        "where" => "active = 1 and status_value = 1",
            );
        $obj_customer = $this->obj_customer->search($params);
        
        foreach ($obj_customer as $value_pricipal) {
            //GET DATA CUSTOMER REFERREL UNILEVEL
             $params = array(
                            "select" =>"customer_id",
                            "where" => "parend_id = $value_pricipal->customer_id"
                );
            $obj_customer_unilevel = $this->obj_unilevel->search($params);
            
            if(count($obj_customer_unilevel) > 1){
                foreach ($obj_customer_unilevel as $key => $value) {
                    //GET DATA CUSTOMER REFERREL UNILEVEL
                     $params = array(
                                    "select" =>"sum(point) as total_point",
                                    "where" => "customer_id = $value->customer_id"
                        );
                        $obj_points[$key] = $this->obj_points->get_search_row($params);
                }
                //GET MAX VALUE
                $array = "";
                $total_registros = count($obj_customer_unilevel);
                for ($i = 0; $i <= $total_registros -1; $i++) {
                       $point = $obj_points[$i]->total_point;
                       $array .= $point.",";
                }
                
                //DELETE LAST ,
                $array = delete_last_caracter($array);
                $array = explode(",", $array);
                //ORDER ARRAY MAX TO MIN
                arsort($array);
                $cuenta = 0;
                foreach ($array as $value) {
                    $cuenta++;
                    if($cuenta == 1){
                        $max = $value;
                    }elseif ($cuenta == 2) {
                         $max_sec = $value;
                    }
                }
                
                if($max_sec != ""){
                    //GET DATA RANGES
                    $params = array(
                                    "select" =>"range_id",
                                    "where" => "point_grupal <= $max and point_personal <= $max_sec",
                                    "order" => "range_id DESC"
                            );
                            $obj_ranges = $this->obj_ranges->get_search_row($params);
                            $obj_ranges_id = $obj_ranges->range_id;
                            //get ranges customer actually
                            $range_customer_id = $value_pricipal->range_id;

                        if($obj_ranges_id > $range_customer_id){
                            //UPDATE DATA EN CUSTOMER TABLE
                            $data = array(
                                'range_id' => $obj_ranges_id
                            ); 
                            $this->obj_customer->update($value_pricipal->customer_id,$data);

                        }
                }
            }
        }
         
     }
     
    public function masive_messages(){
                //GET TITLE AND MESSAGES
                $title = $this->input->post("title");
                $message_content = $this->input->post("message_content");
                
                if(isset($_FILES["image_file"]["name"])){
                $config['upload_path']          = './static/cms/images/masive';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2000;
                $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('image_file')){
                         $error = array('error' => $this->upload->display_errors());
                          echo '<div class="alert alert-danger">'.$error['error'].'</div>';
                    }else{
                        $data = array('upload_data' => $this->upload->data());
                        $img = $_FILES["image_file"]["name"];
                        // INSERT ON TABLE activation_message
                        $data_message = array(
                                'date' => date("Y-m-d"),
                                'content' => $message_content,
                                'title' => $title,
                                'active' => 1,
                                'status_value' => 1,    
                                'img' => $img,
                                'created_by' => $_SESSION['usercms']['user_id'],
                                'created_at' => date("Y-m-d H:i:s")
                            ); 
                           $this->obj_message_masive->insert($data_message);
                           
                           //GET EMAIL
                            $params = array(
                                    "select" =>"email",
                                    "where" => "status_value = 1"
                           );
                            //GET DATA FROM CUSTOMER
                            $obj_customer= $this->obj_customer->search($params);

                            $array_email = "";
                                foreach ($obj_customer as $key => $value) {
                                    $array_email .= "$value->email".",";
                                }

                            $images = "static/cms/images/masive/$img";
                            $img_path = "<img src='".site_url().'/'.$images."' alt='".$title."' height='600' width='300'/>";
//                            //SEND EMAIL
//                            $mensaje = wordwrap("<html><body><center><h1>Nueva Activación</h1><p>$img_path</p><br/><p>Tenemos una nueva activación procesarla.</p></center></body></html>", 70, "\n", true);
//                            $headers = "MIME-Version: 1.0\r\n"; 
//                            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//                            $headers .= "From: 3T Company: Travel - Training - Trade < noreplay@my3t.club >\r\n";
//                            $bool = mail("software.contreras@gmail.com,software.contreras1@gmail.com, irvingsong_5@hotmail.com,pastorolandoc@hotmail.com",$title,$message_content,$headers);
                            
                            
                            
                            
                            
                            $to = 'software.contreras@gmail.com';
//                            $title = 'Alert information On Products';
                            $message = wordwrap("<html><body><center><h1>Nueva Activación</h1><p>$img_path</p><br/><p>Tenemos una nueva activación procesarla.</p></center></body></html>", 70, "\n", true);                 
                            $this->load->library('email');
                            // from address
                            $this->email->from('From: 3T Company: Travel - Training - Trade');
                            $this->email->to($to); // to Email address
                            $this->email->bcc('software.contreras@gmail.com,software.contreras1@gmail.com,irvingsong_5@hotmail.com'); 
                            $this->email->subject($title); // email Subject
                            $this->email->message($message);
                            $this->email->send();
                            
                            
                            echo '<div class="alert alert-success" style="text-align: center">Publicado Exitosamente</div>';
                        
                    }
                }
                
    } 
    
    public function cambiar_status(){
        if($this->input->is_ajax_request()){   
              $comment_id = $this->input->post("comment_id");
              
                if(count($comment_id) > 0){
                    $data = array(
                        'active' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
        }
    } 
    
    public function export(){
        //GET C
        $params = array("select" =>"*");
        
        $this->db->select('*');
        $this->db->from('customer');
        $query = $this->db->get();
        
//        $obj_customer = $this->obj_customer->get_search_row($params);
        
        
        
        $this->export_excel->to_excel($query, "lista de personas");
        
        
    }
     
    public function mensaje(){
                            echo "mensaje enviado";
                            $to = 'software.contreras@gmail.com';
                             $title = 'Prueba de mensaje';
//                            $title = 'Alert information On Products';
                            $message = "Hola 123";                 
                            $this->load->library('email');
                            // from address
                            $this->email->from('From: 3T Company: Travel - Training - Trade');
                            $this->email->to($to); // to Email address
                            $this->email->bcc('software.contreras@gmail.com,software.contreras1@gmail.com,irvingsong_5@hotmail.com'); 
                            $this->email->subject($title); // email Subject
                            $this->email->message($message);
                            $this->email->send();
    }
    
    public function get_session(){          
        if (isset($_SESSION['usercms'])){
            if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['status']==1){               
                return true;
            }else{
                redirect(site_url().'dashboard');
            }
        }else{
            redirect(site_url().'dashboard');
        }
    }
}
