<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
        $this->load->model("videos_model", "obj_videos");
        $this->load->model("embassy_model", "obj_embassy");
    }

    public function index() {

        //GET NAV
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        $data['obj_sub_category'] = $this->nav_sub_category();
        //get catalog
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.summary,
                                    catalog.name,
                                    catalog.slug,
                                    category.slug as category_slug,
                                    catalog.price,
                                    catalog.description,
                                    catalog.img,
                                    catalog.active,
                                    catalog.date",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.active = 1 and catalog.status_value = 1",
            "order" => "catalog.catalog_id DESC",
            "limit" => "7");

        $data['catalog'] = $this->obj_catalog->search($params);

        //GET COURSES
        $params = array(
            "select" => "videos.video_id,
                                    videos.summary,
                                    videos.type,
                                    videos.name,
                                    videos.slug,
                                    videos.img2,
                                    videos.active,
                                    category.slug as category_slug,
                                    videos.date",
            "join" => array('category, category.category_id = videos.category_id'),
            "where" => "videos.type = 1 and videos.active = 1",
            "order" => "videos.video_id DESC",
            "limit" => "5");
        $data['courses'] = $this->obj_videos->search($params);
        //SEND META TITLE 
        $data['title'] = "Inicio";
        $this->load->view('home', $data);
    }

    public function postula() {
        //GET 
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
            //SEND META TITLE 
            $data['title'] = "Postula a la embajada";
            $this->load->view('postula', $data);
    }


    public function embassy() {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post("name");
            $last_name = $this->input->post("last_name");
            $email = $this->input->post("email");
            $phone = $this->input->post("phone");
            $param = array(
                'name' => $name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'active' => 1,
                'status_value' => 1,
                'date' => date("Y-m-d H:i:s")
            );
            $result = $this->obj_embassy->insert($param);
            if(!empty($result)){
                $data['message'] = true;
            }else{
                $data['message'] = false;
            }
            echo json_encode($data);
        }
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

    public function sitemap() {
        //get data courses category
        $params_category_videos = array(
            "select" => "category_id,
                                    slug,
                                    created_at,
                                    name",
            "where" => "type = 1 and active = 1",
        );
        $obj_category_videos = $this->obj_category->search($params_category_videos);
        //get data catalog category
        $params_category_catalog = array(
            "select" => "category_id,
                                    slug,
                                    created_at,
                                    name",
            "where" => "type = 2 and active = 1",
        );
        $obj_category_catalog = $this->obj_category->search($params_category_catalog);
        //get all couses active
        $params = array(
            "select" => "videos.video_id,
                                    videos.name,
                                    videos.slug,
                                    category.slug as category_slug,
                                    videos.date",
            "join" => array('category, category.category_id = videos.category_id'),
            "where" => "category.type = 1 and videos.active = 1");
        $obj_videos = $this->obj_videos->search($params);
        //get all catalog active
        $params = array(
            "select" => "catalog.catalog_id,
                                    catalog.name,
                                    catalog.slug,
                                    catalog.active,
                                    category.slug as category_slug,
                                    catalog.date",
            "join" => array('category, category.category_id = catalog.category_id'),
            "where" => "catalog.active = 1",
            "order" => "catalog.catalog_id DESC");
        $obj_catalog = $this->obj_catalog->search($params);

        $codigo = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    ';
    foreach ($obj_videos as $value) {
    $codigo .='<url>
        <loc>' . site_url() . "courses/" . $value->category_slug . "/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $value->date . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
    }
    foreach ($obj_catalog as $value) {
    $codigo .='<url>
        <loc>' . site_url() . "catalog/" . $value->category_slug . "/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $value->date . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
    }
    foreach ($obj_category_videos as $value) {
    $codigo .='<url>
        <loc>' . site_url() . "courses/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $value->created_at . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
    }

    foreach ($obj_category_catalog as $value) {
    $codigo .='<url>
        <loc>' . site_url() . "catalog/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $value->created_at . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
    }

    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'home' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'courses' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'catalog' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'register' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'contact' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'login' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'forget' . '</loc>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
    $codigo .='</urlset>';
$path = "sitemap.xml";
$modo = "w+";

if ($fp = fopen($path, $modo)) {
fwrite($fp, $codigo);
echo "Se realizo con Exito";
} else {
echo "Error";
}
}

}