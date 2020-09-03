<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class D_investment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("investment_model", "obj_investment");
    }

    public function index() {
        //GER SESSION   
        $this->get_session();
        $params = array(
            "select" => "investment_id,
                                        name,
                                        img,
                                        active",
        );
        //GET DATA COMMISSIONS
        $obj_investment = $this->obj_investment->search($params);
        /// RENDER
        $this->tmp_mastercms->set("obj_investment", $obj_investment);
        $this->tmp_mastercms->render("dashboard/investment/investment_list");
    }

    public function load($investment_id = NULL) {
        //VERIFY IF ISSET CUSTOMER_ID
        if ($investment_id != "") {
            /// PARAM FOR SELECT 
            $params = array(
                "select" => "*",
                "where" => "investment_id = $investment_id",
            );
            $obj_investment = $this->obj_investment->get_search_row($params);
            //RENDER
            $this->tmp_mastercms->set("obj_investment", $obj_investment);
        }
        $this->tmp_mastercms->render("dashboard/investment/investment_form");
    }

    public function validate() {
        //GET CUSTOMER_ID
        $investment_id = $this->input->post("investment_id");
        $img = $this->input->post("img2");
        $name = $this->input->post('name');
        $active = $this->input->post('active');

        if (isset($_FILES["image_file"]["name"])) {
            $config['upload_path'] = './static/cms/images/investment';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_file')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<div class="alert alert-danger">' . $error['error'] . '</div>';
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $img = $_FILES["image_file"]["name"];
            if ($img == "") {
                $img = $this->input->post("img2");
            }
        }

        if ($investment_id != "") {
            $data = array(
                'name' => $name,
                'img' => $img,
                'active' => $active,
            );
            $this->obj_investment->update($investment_id, $data);
        } else {
            $data = array(
                'name' => $name,
                'img' => $img,
                'active' => $active,
            );
            $this->obj_investment->insert($data);
        }
        redirect(site_url() . "dashboard/inversiones");
    }

    public function get_session() {
        if (isset($_SESSION['usercms'])) {
            if ($_SESSION['usercms']['logged_usercms'] == "TRUE" && $_SESSION['usercms']['status'] == 1) {
                return true;
            } else {
                redirect(site_url() . 'dashboard');
            }
        } else {
            redirect(site_url() . 'dashboard');
        }
    }

}

?>