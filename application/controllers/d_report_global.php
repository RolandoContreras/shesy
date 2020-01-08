<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 

class D_report_global extends CI_Controller{    
    
    public function __construct(){
        parent::__construct();
        $this->load->model("comments_model","obj_comments");
        $this->load->model("customer_model","obj_customer");
        $this->load->model("invoices_model","obj_invoices");
        $this->load->model("unilevel_model","obj_unilevel");
        $this->load->model("points_model","obj_points");
        $this->load->model("ranges_model","obj_ranges");
    }   
                
    public function index(){  
            //GER SESSION
        $this->get_session();
        date_default_timezone_set('America/Lima');    
         //GET MONTH AND YEARS
        $year_next = date('Y', strtotime('+ 1 year'));
        $year = date('Y');
        $year_last = date('Y', strtotime('- 1 year'));
        $year_last_2 = date('Y', strtotime('-2 year'));
        $year_last_3 = date('Y', strtotime('-3 year'));
        
//        $pass_year = date('Y', strtotime('-1 year')) ;
//        $pass_year_2 = date('Y', strtotime('-2 year')) ;   
            
        $today = date('Y-m-d');
        $nex_today =date("Y-m-d", strtotime("+1 day"));
        
        $primer_dia_ano_next = "$year_next-01-01";
        $primer_dia_ano = "$year-01-01";
        $ultimo_dia_ano_last = "$year_last-01-01";
        $ultimo_dia_ano_last_2 = "$year_last_2-01-01";
        $ultimo_dia_ano_last_3 = "$year_last_3-01-01";
        
        //GET DATE FOR WEEK
        $lunes_semana_actual = first_week_actual();
        $domingo_semana_actual =  last_week_actual(); 
        
        //GET DATE FOR MONTH
        $first_day_month =  first_month_day_actual();
        $last_day_month =  last_month_day_actual();
        
        
                //GET MES
                $params = array(
                        "select" =>"sum(price) as total_mes,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$primer_dia_ano' AND date < '$primer_dia_ano_next' AND invoices.active = 2 ) as sum_total_year_next,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$primer_dia_ano' AND date < '$primer_dia_ano_next' AND invoices.active = 2 and invoices.type = 1) as sum_total_year_pack_next,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$primer_dia_ano' AND date < '$primer_dia_ano_next' AND invoices.active = 2 and invoices.type = 2) as sum_total_year_catalogo_next,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last' AND date < '$primer_dia_ano' AND invoices.active = 2 ) as sum_total_year_last,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last' AND date < '$primer_dia_ano' AND invoices.active = 2 and invoices.type = 1) as sum_total_year_pack_last,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last' AND date < '$primer_dia_ano' AND invoices.active = 2 and invoices.type = 2) as sum_total_year_catalogo_last,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last_2' AND date < '$ultimo_dia_ano_last' AND invoices.active = 2 ) as sum_total_year_last_2,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last_2' AND date < '$ultimo_dia_ano_last' AND invoices.active = 2 and invoices.type = 1) as sum_total_year_pack_last_2,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last_2' AND date < '$ultimo_dia_ano_last' AND invoices.active = 2 and invoices.type = 2) as sum_total_year_catalogo_last_2,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last_3' AND date < '$ultimo_dia_ano_last_2' AND invoices.active = 2 ) as sum_total_year_3,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last_3' AND date < '$ultimo_dia_ano_last_2' AND invoices.active = 2 and invoices.type = 1) as sum_total_year_pack_last_3,
                                    (SELECT sum(total) FROM (invoices) WHERE date >= '$ultimo_dia_ano_last_3' AND date < '$ultimo_dia_ano_last_2' AND invoices.active = 2 and invoices.type = 2) as sum_total_year_catalogo_last_3,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-01-01' AND '$year-01-31' and invoices.active = 2) as sum_ene,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-02-01' AND '$year-02-31' and invoices.active = 2) as sum_feb,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-03-01' AND '$year-03-31' and invoices.active = 2) as sum_mar,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-04-01' AND '$year-04-31' and invoices.active = 2) as sum_abr,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-05-01' AND '$year-05-31' and invoices.active = 2) as sum_may,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-06-01' AND '$year-06-31' and invoices.active = 2) as sum_jun,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-07-01' AND '$year-07-31' and invoices.active = 2) as sum_jul,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-08-01' AND '$year-08-31' and invoices.active = 2) as sum_ago,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-09-01' AND '$year-09-31' and invoices.active = 2) as sum_set,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-10-01' AND '$year-10-31' and invoices.active = 2) as sum_oct,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-11-01' AND '$year-11-31' and invoices.active = 2) as sum_nov,
                                    (SELECT count(total) FROM (invoices) WHERE date BETWEEN '$year-12-01' AND '$year-12-31' and invoices.active = 2) as sum_dic,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-01-01' AND date < '$year-02-01' and invoices.active = 2) as sum_now_ene,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-02-01' AND date < '$year-03-01' and invoices.active = 2) as sum_now_feb,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-03-01' AND date < '$year-04-01' and invoices.active = 2) as sum_now_mar,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-04-01' AND date < '$year-05-01' and invoices.active = 2) as sum_now_abr,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-05-01' AND date < '$year-06-01' and invoices.active = 2) as sum_now_may,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-06-01' AND date < '$year-07-01' and invoices.active = 2) as sum_now_jun,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-07-01' AND date < '$year-08-01' and invoices.active = 2) as sum_now_jul,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-08-01' AND date < '$year-09-01' and invoices.active = 2) as sum_now_ago,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-09-01' AND date < '$year-10-01' and invoices.active = 2) as sum_now_set,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-10-01' AND date < '$year-11-01' and invoices.active = 2) as sum_now_oct,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-11-01' AND date < '$year-12-01' and invoices.active = 2) as sum_now_nov,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$year-12-01' AND date < '$year_next-01-01' and invoices.active = 2) as sum_now_dic,
                                    (SELECT MIN(total) FROM (invoices) WHERE invoices.active = 2) as sum_min,
                                    (SELECT MAX(total) FROM (invoices) WHERE invoices.active = 2) as sum_max,
                                    (SELECT SUM(total) FROM (invoices) WHERE date >= '$today' AND date < '$nex_today' AND invoices.active = 2) as sum_today,
                                    (SELECT count(*) FROM (invoices) WHERE date BETWEEN '$first_day_month' AND '$last_day_month' AND invoices.active = 2) as count_total_mes,
                                    (SELECT sum(total) FROM (invoices) WHERE date BETWEEN '$first_day_month' AND '$last_day_month' AND invoices.active = 2) as sum_total_mes",
                "join" => array( 'kit, invoices.kit_id = kit.kit_id'),
                "where" => "date BETWEEN '$first_day_month' AND '$last_day_month' and invoices.type = 1 and invoices.active = 2");
            //GET DATA FROM CUSTOMER
            $obj_invoices = $this->obj_invoices->get_search_row($params);
            
            if($obj_invoices->sum_now_ene == ""){
                $sum_now_ene = 0;
            }else{
                $sum_now_ene = $obj_invoices->sum_now_ene;
            }
            
            if($obj_invoices->sum_now_feb == ""){
                $sum_now_feb = 0;
            }else{
                $sum_now_feb = $obj_invoices->sum_now_feb;
            }
            
            if($obj_invoices->sum_now_mar == ""){
                $sum_now_mar = 0;
            }else{
                $sum_now_mar = $obj_invoices->sum_now_mar;
            }
            
            if($obj_invoices->sum_now_abr == ""){
                $sum_now_abr = 0;
            }else{
                $sum_now_abr = $obj_invoices->sum_now_abr;
            }
            
            if($obj_invoices->sum_now_may == ""){
                $sum_now_may = 0;
            }else{
                $sum_now_may = $obj_invoices->sum_now_may;
            }
            
            if($obj_invoices->sum_now_jun == ""){
                $sum_now_jun = 0;
            }else{
                $sum_now_jun = $obj_invoices->sum_now_jun;
            }
            
            if($obj_invoices->sum_now_jul == ""){
                $sum_now_jul = 0;
            }else{
                $sum_now_jul = $obj_invoices->sum_now_jul;
            }
            
            if($obj_invoices->sum_now_ago == ""){
                $sum_now_ago = 0;
            }else{
                $sum_now_ago = $obj_invoices->sum_now_ago;
            }
            
            if($obj_invoices->sum_now_set == ""){
                $sum_now_set = 0;
            }else{
                $sum_now_set = $obj_invoices->sum_now_set;
            }
            
            if($obj_invoices->sum_now_oct == ""){
                $sum_now_oct = 0;
            }else{
                $sum_now_oct = $obj_invoices->sum_now_oct;
            }
            
            if($obj_invoices->sum_now_nov == ""){
                $sum_now_nov = 0;
            }else{
                $sum_now_nov = $obj_invoices->sum_now_nov;
            }
            
            if($obj_invoices->sum_now_dic == ""){
                $sum_now_dic = 0;
            }else{
                $sum_now_dic = $obj_invoices->sum_now_dic;
            }
           
            if($obj_invoices->sum_total_year_pack_last_3 == ""){
                $sum_total_year_pack_last_3 = 0;
            }else{
                $sum_total_year_pack_last_3 = $obj_invoices->sum_total_year_pack_last_3;
            }
            if($obj_invoices->sum_total_year_catalogo_last_3 == ""){
                $sum_total_year_catalogo_last_3 = 0;
            }else{
                $sum_total_year_catalogo_last_3 = $obj_invoices->sum_total_year_catalogo_last_3;
            }
            if($obj_invoices->sum_total_year_3 == ""){
                $sum_total_year_3 = 0;
            }else{
                $sum_total_year_3 = $obj_invoices->sum_total_year_3;
            }
            
            if($obj_invoices->sum_total_year_pack_last_2 == ""){
                $sum_total_year_pack_last_2 = 0;
            }else{
                $sum_total_year_pack_last_2 = $obj_invoices->sum_total_year_pack_last_2;
            }
            if($obj_invoices->sum_total_year_catalogo_last_2 == ""){
                $sum_total_year_catalogo_last_2 = 0;
            }else{
                $sum_total_year_catalogo_last_2 = $obj_invoices->sum_total_year_catalogo_last_2;
            }
            if($obj_invoices->sum_total_year_last_2 == ""){
                $sum_total_year_2 = 0;
            }else{
                $sum_total_year_2 = $obj_invoices->sum_total_year_2;
            }
            
            if($obj_invoices->sum_total_year_pack_last == ""){
                $sum_total_year_pack_last = 0;
            }else{
                $sum_total_year_pack_last = $obj_invoices->sum_total_year_pack_last;
            }
            if($obj_invoices->sum_total_year_catalogo_last == ""){
                $sum_total_year_catalogo_last = 0;
            }else{
                $sum_total_year_catalogo_last = $obj_invoices->sum_total_year_catalogo_last;
            }
            if($obj_invoices->sum_total_year_last == ""){
                $sum_total_year_last = 0;
            }else{
                $sum_total_year_last = $obj_invoices->sum_total_year_last;
            }
            
            
            if($obj_invoices->sum_total_year_pack_next == ""){
                $sum_total_year_pack_next = 0;
            }else{
                $sum_total_year_pack_next = $obj_invoices->sum_total_year_pack_next;
            }
            if($obj_invoices->sum_total_year_catalogo_next == ""){
                $sum_total_year_catalogo_next = 0;
            }else{
                $sum_total_year_catalogo_next = $obj_invoices->sum_total_year_catalogo_next;
            }
            if($obj_invoices->sum_total_year_next == ""){
                $sum_total_year_next = 0;
            }else{
                $sum_total_year_next = $obj_invoices->sum_total_year_next;
            }
            
            if($obj_invoices->sum_today == ""){
                $sum_today = 0;
            }else{
                $sum_today = $obj_invoices->sum_today;
            }
            
            if($obj_invoices->sum_min == ""){
                $sum_min = 0;
            }else{
                $sum_min = $obj_invoices->sum_min;
            }
            
            if($obj_invoices->sum_max == ""){
                $sum_max = 0;
            }else{
                $sum_max = $obj_invoices->sum_max;
            }
            
            if($obj_invoices->sum_ene == ""){
                $sum_ene = 0;
            }else{
                $sum_ene = $obj_invoices->sum_ene;
            }
            
            if($obj_invoices->sum_feb == ""){
                $sum_feb = 0;
            }else{
                $sum_feb = $obj_invoices->sum_feb;
            }
            
            if($obj_invoices->sum_mar == ""){
                $sum_mar = 0;
            }else{
                $sum_mar = $obj_invoices->sum_mar;
            }
            
            if($obj_invoices->sum_abr == ""){
                $sum_abr = 0;
            }else{
                $sum_abr = $obj_invoices->sum_abr;
            }
            
            if($obj_invoices->sum_may == ""){
                $sum_may = 0;
            }else{
                $sum_may = $obj_invoices->sum_may;
            }
            
            if($obj_invoices->sum_jun == ""){
                $sum_jun = 0;
            }else{
                $sum_jun = $obj_invoices->sum_jun;
            }
            
            if($obj_invoices->sum_jul == ""){
                $sum_jul = 0;
            }else{
                $sum_jul = $obj_invoices->sum_jul;
            }
            
            if($obj_invoices->sum_ago == ""){
                $sum_ago = 0;
            }else{
                $sum_ago = $obj_invoices->sum_ago;
            }
            
            if($obj_invoices->sum_set == ""){
                $sum_set = 0;
            }else{
                $sum_set = $obj_invoices->sum_set;
            }
            
            if($obj_invoices->sum_oct == ""){
                $sum_oct = 0;
            }else{
                $sum_oct = $obj_invoices->sum_oct;
            }
            
            if($obj_invoices->sum_nov == ""){
                $sum_nov = 0;
            }else{
                $sum_nov = $obj_invoices->sum_nov;
            }
            
            if($obj_invoices->sum_dic == ""){
                $sum_dic = 0;
            }else{
                $sum_dic = $obj_invoices->sum_dic;
            }
        
        $this->tmp_mastercms->set("sum_now_dic",$sum_now_dic);    
        $this->tmp_mastercms->set("sum_now_nov",$sum_now_nov);    
        $this->tmp_mastercms->set("sum_now_oct",$sum_now_oct);    
        $this->tmp_mastercms->set("sum_now_set",$sum_now_set);    
        $this->tmp_mastercms->set("sum_now_ago",$sum_now_ago);    
        $this->tmp_mastercms->set("sum_now_jul",$sum_now_jul);    
        $this->tmp_mastercms->set("sum_now_jun",$sum_now_jun);    
        $this->tmp_mastercms->set("sum_now_may",$sum_now_may);    
        $this->tmp_mastercms->set("sum_now_abr",$sum_now_abr);    
        $this->tmp_mastercms->set("sum_now_mar",$sum_now_mar);    
        $this->tmp_mastercms->set("sum_now_feb",$sum_now_feb);    
        $this->tmp_mastercms->set("sum_now_ene",$sum_now_ene);    
        $this->tmp_mastercms->set("year",$year);
        $this->tmp_mastercms->set("year_last",$year_last);
        $this->tmp_mastercms->set("year_last_2",$year_last_2);
        $this->tmp_mastercms->set("year_last_3",$year_last_3);
        $this->tmp_mastercms->set("sum_today",$sum_today);
        $this->tmp_mastercms->set("sum_max",$sum_max);
        $this->tmp_mastercms->set("sum_min",$sum_min);
        $this->tmp_mastercms->set("sum_ene",$sum_ene);
        $this->tmp_mastercms->set("sum_ene",$sum_ene);
        $this->tmp_mastercms->set("sum_feb",$sum_feb);
        $this->tmp_mastercms->set("sum_mar",$sum_mar);
        $this->tmp_mastercms->set("sum_abr",$sum_abr);
        $this->tmp_mastercms->set("sum_may",$sum_may);
        $this->tmp_mastercms->set("sum_jun",$sum_jun);
        $this->tmp_mastercms->set("sum_jul",$sum_jul);
        $this->tmp_mastercms->set("sum_ago",$sum_ago);
        $this->tmp_mastercms->set("sum_set",$sum_set);
        $this->tmp_mastercms->set("sum_oct",$sum_oct);
        $this->tmp_mastercms->set("sum_nov",$sum_nov);
        $this->tmp_mastercms->set("sum_dic",$sum_dic);
        $this->tmp_mastercms->set("sum_total_year_next",$sum_total_year_next);
        $this->tmp_mastercms->set("sum_total_year_catalogo_next",$sum_total_year_catalogo_next);
        $this->tmp_mastercms->set("sum_total_year_pack_next",$sum_total_year_pack_next);
        $this->tmp_mastercms->set("sum_total_year_last",$sum_total_year_last);
        $this->tmp_mastercms->set("sum_total_year_catalogo_last",$sum_total_year_catalogo_last);
        $this->tmp_mastercms->set("sum_total_year_pack_last",$sum_total_year_pack_last);
        $this->tmp_mastercms->set("sum_total_year_2",$sum_total_year_2);
        $this->tmp_mastercms->set("sum_total_year_catalogo_last_2",$sum_total_year_catalogo_last_2);
        $this->tmp_mastercms->set("sum_total_year_pack_last_2",$sum_total_year_pack_last_2);
        $this->tmp_mastercms->set("sum_total_year_3",$sum_total_year_3);
        $this->tmp_mastercms->set("sum_total_year_catalogo_last_3",$sum_total_year_catalogo_last_3);
        $this->tmp_mastercms->set("sum_total_year_pack_last_3",$sum_total_year_pack_last_3);
        
        $this->tmp_mastercms->render("dashboard/reporte_global/report_global");
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