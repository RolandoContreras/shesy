<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
            $url = uri_string();
            $url = explode("/", $url);
            $nav = $url[0];
            
            switch ($nav) {
                case "fund":
                    $this->load->view('fund_invest');
                    break;
                case "course_inversiones":
                    $this->load->view('course');    
                    break;
                case "course_marketing":
                    $this->load->view('course_marketing');
                    break;
                case "club":
                    $this->load->view('club');    
                    break;
                case "investment":
                    $this->load->view('invesment');    
                    break;
                default:
                    $this->load->view('fund_invest');
                    break;
            }
	}
}
