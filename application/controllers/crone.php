<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crone extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("customer_model","obj_customer");
        $this->load->model("points_model","obj_points");
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
            //GET DATA CUSTOMER REFERREL UNILEVEL
            $params = array(
                            "select" =>"sum(point) as total_point",
                            "where" => "customer_id = $value->customer_id and active = 1"
                        );
            $obj_points = $this->obj_points->get_search_row($params);
            
            if($obj_points->total_point != ""){
                $point = $obj_points->total_point;
                
                if($point >= 400 and $point < 1650){
                    $range_id = 1;
                }elseif($point >= 1650 and $point < 5400){
                    $range_id = 2;
                }elseif($point >= 5400 and $point < 17900){
                    $range_id = 3;
                }elseif($point >= 17900 and $point < 49150){
                    $range_id = 4;
                }elseif($point >= 49150){
                    $range_id = 5;
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
        echo exito;
    }
}
