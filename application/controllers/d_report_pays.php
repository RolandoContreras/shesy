<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_report_pays extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("pay_model","obj_pay");
    }   
                
    public function index(){  
            //GER SESSION
            $this->get_session();
            //GET AND COUNT ALL THE CUSTOMER
        
        $params = array(
                        "select" =>"sum(franchise.price) as total_ingreso",
                        "join" => array('franchise, franchise.franchise_id = customer.franchise_id'),
                        "where" => "customer.date_start <> '0000-00-00'"
               );
           //GET DATA FROM CUSTOMER
        $obj_ingreso = $this->obj_customer->get_search_row($params);
        $total_ingreso = number_format($obj_ingreso->total_ingreso,2,".",",");
        
        //TOTAL PAGOS
        
        $params = array("select" =>"(select sum(amount) from pay where status_value = 4) as total_pagado,
                                    (select sum(amount) from pay where status_value = 3) as total_pendiente");
        $obj_pagos = $this->obj_pay->get_search_row($params);
        $total_pagado = number_format($obj_pagos->total_pagado,2,".",",");
        $total_pendiente = number_format($obj_pagos->total_pendiente,2,".",",");
        //GET DECIFIT
        $decifit = $obj_ingreso->total_ingreso - $obj_pagos->total_pagado;
        $decifit = number_format($decifit,2,".",",");
        
        $params = array("select" =>"count(customer_id) as customer_id,
                                    (select count(customer_id) from customer where financy = 1) as financiado,
                                    (select count(customer_id) from customer where active = 1) as activos,
                                    (select count(customer_id) from customer where active = 0) as inactivos,
                                    (select count(customer_id) from customer where financy = 0) as pagados,");
        $obj_customer = $this->obj_customer->get_search_row($params);
        
        //TOTAL FINANCIADOS
        $obj_financiado = $obj_customer->financiado;
        //TOTAL ACTIVOS
        $obj_activos = $obj_customer->activos;
        //TOTAL ACTIVOS
        $obj_inactivos = $obj_customer->inactivos;
        //TOTAL CUSTOMER
        $obj_pagados = $obj_customer->pagados;
        //TOTAL CUSTOMER
        $obj_customer = $obj_customer->customer_id;
        
        //CRECIMIENTO EN EL PRIMER AÑO
        $params_grow = array("select" =>"(select count(customer_id) from customer where franchise_id = 2) as basic,
                                    (select count(customer_id) from customer where franchise_id = 3) as platinium,
                                    (select count(customer_id) from customer where franchise_id = 4) as gold,
                                    (select count(customer_id) from customer where franchise_id = 5) as vip,
                                    (select count(customer_id) from customer where franchise_id = 7) as elite,
                                    (select count(customer_id) from customer where franchise_id = 9) as super_vip,
                                    (select count(customer_id) from customer where franchise_id = 6) as membership,
                                    (select count(customer_id) from customer where franchise_id = 10) as master,
                                    (select count(customer_id) from customer where franchise_id = 2 and active = 1) as basic_active,
                                    (select count(customer_id) from customer where franchise_id = 3 and active = 1) as platinium_active,
                                    (select count(customer_id) from customer where franchise_id = 4 and active = 1) as gold_active,
                                    (select count(customer_id) from customer where franchise_id = 5 and active = 1) as vip_active,
                                    (select count(customer_id) from customer where franchise_id = 7 and active = 1) as elite_active,
                                    (select count(customer_id) from customer where franchise_id = 9 and active = 1) as super_vip_active,
                                    (select count(customer_id) from customer where franchise_id = 10 and active = 1) as master_active,");
        $obj_total_account = $this->obj_customer->get_search_row($params_grow);
        
        //RATIO DE ACTIVOS
        $param_ratio = array("select" =>"customer_id",
                            "where" => "active = 1");
        $obj_active = $this->obj_customer->search($param_ratio);
        
        //for para hallar los activos haciendo la red
        $ratio = 0;
        foreach ($obj_active as $key => $value) {
            
                     $param_ratio_parents = array("select" =>"count(customer_id) as ratio",
                            "where" => "parents_id = $value->customer_id");
        $obj_ratio = $this->obj_customer->get_search_row($param_ratio_parents);
            //IF RATIO > 0 THEN SUM
            if($obj_ratio->ratio > 0 ){
                $ratio = $ratio + 1;
            }
        }
        
        //PROMEDIO RATIO
        $promedio = number_format($obj_activos / $ratio,3);
        $porcentaje_retencion = number_format(($ratio /$obj_activos) * 100,2);
        
        //PROMEDIO RATIO PAGADOS
        $promedio_pagado = number_format($ratio/$obj_pagados ,3);
        $porcentaje_retencion_pagado = number_format(($ratio /$obj_pagados) * 100,2);

        //PROMEDIO RATIO TOTAL
        $promedio_total = number_format($ratio/$obj_customer ,3);
        $porcentaje_retencion_total = number_format(($ratio /$obj_customer) * 100,2);
        
        //MEDIAS ABSOLUTAS
        
        $media_promedio = ( $promedio + $promedio_pagado + $promedio_total) / 3;
        $media_porcentaje = ( $porcentaje_retencion + $porcentaje_retencion_pagado + $porcentaje_retencion_total) / 3;
        
        /// PAGINADO
            $modulos ='reportes/pagos'; 
            $seccion = 'Lista';        
            $link_modulo =  site_url().'dashboard/'.$modulos; 
            /// DATA
            
            /// VISTA
            $this->tmp_mastercms->set('link_modulo',$link_modulo);
            $this->tmp_mastercms->set('modulos',$modulos);
            $this->tmp_mastercms->set('seccion',$seccion);
            
                    
            $this->tmp_mastercms->set("decifit",$decifit);                
            $this->tmp_mastercms->set("total_pagado",$total_pagado);
            $this->tmp_mastercms->set("total_pendiente",$total_pendiente);
                    
            $this->tmp_mastercms->set("total_ingreso",$total_ingreso);
            $this->tmp_mastercms->set("media_promedio",$media_promedio);
            
            $this->tmp_mastercms->set("media_promedio",$media_promedio);
            $this->tmp_mastercms->set("media_porcentaje",$media_porcentaje);
            
            $this->tmp_mastercms->set("promedio_total",$promedio_total);
            $this->tmp_mastercms->set("porcentaje_retencion_total",$porcentaje_retencion_total);
            
            $this->tmp_mastercms->set("promedio_pagado",$promedio_pagado);
            $this->tmp_mastercms->set("porcentaje_retencion_pagado",$porcentaje_retencion_pagado);
            
            $this->tmp_mastercms->set("ratio",$ratio);
            $this->tmp_mastercms->set("promedio",$promedio);
            $this->tmp_mastercms->set("porcentaje_retencion",$porcentaje_retencion);
            $this->tmp_mastercms->set("obj_total_account",$obj_total_account);
            $this->tmp_mastercms->set("obj_activos",$obj_activos);
            $this->tmp_mastercms->set("obj_inactivos",$obj_inactivos);
            $this->tmp_mastercms->set("obj_pagados",$obj_pagados);
            $this->tmp_mastercms->set("obj_customer",$obj_customer);
            $this->tmp_mastercms->set("obj_financiado",$obj_financiado);
            $this->tmp_mastercms->render("dashboard/reporte_pagos/pagos");
    }
    
    public function change_status(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
              $comment_id = $this->input->post("comment_id");
              
                if(count($comment_id) > 0){
                    $data = array(
                        'status_value' => 1,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
    }
    
    public function change_status_no(){
            //UPDATE DATA ORDERS
        if($this->input->is_ajax_request()){   
                $comment_id = $this->input->post("comment_id");
                if(count($comment_id) > 0){
                    $data = array(
                        'status_value' => 0,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $_SESSION['usercms']['user_id'],
                    ); 
                    $this->obj_comments->update($comment_id,$data);
                }
                echo json_encode($data);            
        exit();
            }
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
?>