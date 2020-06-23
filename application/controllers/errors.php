<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of errors
 *
 * @author Ing. Marcel M. Piña Parma
 * @name errors
 * @version 1.0
 * @date 04 Jul 2013
 *
 * 
 * Description:
 * Clase para poder customizar el error 404 y asi colocarle CSS
 * 
 * */
class Errors extends CI_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
    }

    function error_404() {
        //llamamos a la vista que muestra el error 404 personalizado
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        $data['obj_sub_category'] = $this->nav_sub_category();
        $data['title'] = "Página no encontrada | Cultura Imparable";
        $this->load->view('errors/404',$data);
    }
    
    public function nav_videos() {
        $params_category_videos = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 1 and active = 1",
        );
        //GET DATA COMMENTS
        return $obj_category_videos = $this->obj_category->search($params_category_videos);
    }

    public function nav_catalogo() {
        $params_category_catalog = array(
            "select" => "category_id,
                                    slug,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        //GET DATA CATALOGO
        return $obj_category_catalog = $this->obj_category->search($params_category_catalog);
    }
    
    public function nav_sub_category() {
        $params = array(
            "select" => "name,
                         category_id,        
                         slug",
            "where" => "active = 1",
        );
        //GET DATA CATALOGO
        return $obj_sub_category = $this->obj_sub_category->search($params);
    }

}

/* End of file errors.php */
/* Location: ./application/controllers/errors.php */