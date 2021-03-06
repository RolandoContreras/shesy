<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crone extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("commissions_model","obj_commissions");
        
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
	public function index(){
        date_default_timezone_set('America/Lima');
         //ACTIVE RANGE
         $params = array(
                        "select" =>"customer_id,
                                    range_id",
                        "where" => "active = 1 and status_value = 1",
            );
        $obj_customer = $this->obj_customer->search($params);
        foreach ($obj_customer as $value) {
            //GET DATA CUSTOMER COMISSION 
            $params = array(
            "select" => "sum(amount) as total_comissions",
            "where" => "customer_id = $value->customer_id and pago != 1 and amount > 0");
            //GET DATA FROM CUSTOMER
            $obj_total = $this->obj_commissions->get_search_row($params);
            $point = $obj_total->total_comissions;
            //verify
            if(!empty($point)){
                if($point >= 125 and $point < 515){
                    $range_id = 1;
                }elseif($point >= 515 and $point < 1690){
                    $range_id = 2;
                }elseif($point >= 1690 and $point < 5590){
                    $range_id = 3;
                }elseif($point >= 5590 and $point < 15350){
                    $range_id = 4;
                }elseif($point >= 15350 and $point < 18430){
                    $range_id = 5;
                }elseif($point >= 18430 and $point < 21500){
                    $range_id = 6;
                }elseif($point >= 21500){
                    $range_id = 8;
                }else{
                    $range_id = 0;
                }
                
                //verify range
                if($range_id > $value->range_id){
                    //UPDATE DATA EN CUSTOMER TABLE
                    $data = array(
                        'range_id' => $range_id
                    ); 
                    $this->obj_customer->update($value->customer_id,$data);
                }
            }
        }
        echo "Verificacion de Rangos";
    }
}
