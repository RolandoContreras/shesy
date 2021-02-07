<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("catalog_model", "obj_catalog");
        $this->load->model("customer_model", "obj_customer");
        $this->load->model("category_model", "obj_category");
        $this->load->model("sub_category_model", "obj_sub_category");
        $this->load->model("invoices_model", "obj_invoices");
        $this->load->model("commissions_model", "obj_commissions");
        $this->load->model("invoice_catalog_model", "obj_invoice_catalog");
        $this->load->model("referencia_compra_Model", "obj_referencia_compra");
        $this->load->library('culqi');
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

    //vista pagos por referencia
    public function pagos_referencia() {
        //GET NAV
        $data['obj_category_videos'] = $this->nav_videos();
        $data['obj_category_catalog'] = $this->nav_catalogo();
        //GET 
        if (isset($_SESSION['compras_customer'])) {
            $username = $_SESSION['compras_customer']['customer_id'];
            $params = array(
                "select" => "first_name,
                            customer_id,
                            last_name",
                "where" => "username = '$username'");
            $data['obj_customer'] = $this->obj_customer->get_search_row($params);
        }
        //SEND DATA
        $data['title'] = "Compras por referencia";
        $this->load->view('pagos_referencia', $data);
    }

    //activacion pagos con tarjeta
    public function create_invoice_referencia() {
        try {
            date_default_timezone_set('America/Lima');
            //SELECT ID FROM CUSTOMER
            $token = $this->input->post('token');
            $email = $this->input->post('email');
            $price = $this->input->post('price');
            $price2 = $this->input->post('price2');

            $name = $this->input->post('name');
            $last_name = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $sponsor_id = $this->input->post('sponsor_id');
            //MAKE CHARGE
            $charge = $this->culqi->charge($token, $price, $email, $name, $last_name, $address, $phone);
            //INSERT INVOICE
            $data_invoice = array(
                'customer_id' => $sponsor_id,
                'kit_id' => 1,
                'sub_total' => $price2,
                'igv' => 0,
                'total' => $price2,
                'type' => 3,
                'recompra' => 0,
                'date' => date("Y-m-d H:i:s"),
                'active' => 2,
                'status_value' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'created_by' => $sponsor_id,
            );
            $invoice_id = $this->obj_invoices->insert($data_invoice);
            foreach ($this->cart->contents() as $items) {
                $option = "";
                if ($this->cart->has_options($items['rowid']) == TRUE) {
                    foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
                        $option .= "$option_name" . ":" . "$option_value" . "&nbsp;";
                    }
                }
                //set catalog_id
                $catalog_id = $items['id'];
                //update stock
                $this->update_stock($catalog_id, $items['qty']);
                //INSERT INVOICE CATALOG    {
                $data_invoice_catalog = array(
                    'invoice_id' => $invoice_id,
                    'catalog_id' => $catalog_id,
                    'price' => $items['price'],
                    'quantity' => $items['qty'],
                    'option' => $option,
                    'sub_total' => $items['subtotal'],
                    'date' => date("Y-m-d H:i:s")
                );
                $this->obj_invoice_catalog->insert($data_invoice_catalog);
                //search bono
                $params = array(
                    "select" => "bono_n1",
                    "where" => "catalog_id = $catalog_id"
                );
                //GET DATA FROM BONUS
                $obj_catalog = $this->obj_catalog->get_search_row($params);
                $bono = $obj_catalog->bono_n1;
                //insert commissión link de compra
                $this->pay_referido_compra($sponsor_id, $invoice_id, $bono, $items['qty']);
                //insert table Referencia
                $data_referencia = array(
                    'invoice_id' => $invoice_id,
                    'name' => $name,
                    'last_name' => $last_name,
                    'phone' => $phone,
                    'address' => $address,
                    'date' => date("Y-m-d H:i:s"),
                    'status' => 1
                );
                //GET DATA FROM BONUS
                $result = $this->obj_referencia_compra->insert($data_referencia);
                //update 30 day more to customer
                if ($sponsor_id != 1) {
                    $this->add_30_day_customer($sponsor_id);
                }
            }
            if (!empty($result)) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            echo json_encode($data);
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    //funcion para verificar stock
    public function update_stock($catalog_id, $qty) {
        $params = array(
            "select" => "stock",
            "where" => "catalog_id = $catalog_id",
        );
        $obj_catalog = $this->obj_catalog->get_search_row($params);
        $stock = $obj_catalog->stock;
        //verify
        $newStock = $stock - $qty;
        //updated stock
        $data_catalog = array(
            'stock' => $newStock,
        );
        $this->obj_catalog->update($catalog_id, $data_catalog);
        return true;
    }

    //proceso de enviar voucer pago por referencia
    public function send_voucher() {
        date_default_timezone_set('America/Lima');
        $name = $this->input->post('name');
        $last_name = $this->input->post('last_name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $sponsor_id = $this->input->post('sponsor_id');
        $price = $this->cart->format_number($this->cart->total());
        //INSERT INVOICE
        $data_invoice = array(
            'customer_id' => $sponsor_id,
            'kit_id' => 1,
            'sub_total' => $price,
            'igv' => 0,
            'total' => $price,
            'type' => 3,
            'recompra' => 0,
            'date' => date("Y-m-d H:i:s"),
            'active' => 1,
            'status_value' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $sponsor_id,
        );
        $invoice_id = $this->obj_invoices->insert($data_invoice);
        foreach ($this->cart->contents() as $items) {
            $option = "";
            if ($this->cart->has_options($items['rowid']) == TRUE) {
                foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
                    $option .= "$option_name" . ":" . "$option_value" . "&nbsp;";
                }
            }
            $catalog_id = $items['id'];
            //GET stock from catalog
            $params = array(
                "select" => "stock",
                "where" => "catalog_id = $catalog_id",
            );
            $obj_catalog = $this->obj_catalog->get_search_row($params);
            $stock = $obj_catalog->stock;
            if ($stock > 0) {
                $newStock = $stock - $items['qty'];
                if ($newStock < 0) {
                    //delete invoice
                    $this->delete_invoice($invoice_id);
                    //sen data
                    $data['status'] = "false2";
                } else {
                    //updated stock
                    $data_catalog = array(
                        'stock' => $newStock,
                    );
                    $this->obj_catalog->update($catalog_id, $data_catalog);
                    //INSERT INVOICE CATALOG
                    $data_invoice_catalog = array(
                        'invoice_id' => $invoice_id,
                        'catalog_id' => $catalog_id,
                        'price' => $items['price'],
                        'quantity' => $items['qty'],
                        'option' => $option,
                        'sub_total' => $items['subtotal'],
                        'date' => date("Y-m-d H:i:s")
                    );
                    $result = $this->obj_invoice_catalog->insert($data_invoice_catalog);
                    //insert archive
                    $archive = $_FILES['file'];
                    $templocation = $archive["tmp_name"];
                    $name_archive = $archive["name"];
                    if ($name_archive != null) {
                        if (!is_dir("./static/cms/images/comprobantes/$invoice_id")) {
                            mkdir("./static/cms/images/comprobantes/$invoice_id", 0777);
                        }
                        if (!$templocation) {
                            die("No se ha seleccionado ningun archivos");
                        }
                        if (move_uploaded_file($templocation, "./static/cms/images/comprobantes/$invoice_id/$name_archive")) {
                            $img = convert_query($name_archive);
                            //insert table Referencia
                            $data_referencia = array(
                                'invoice_id' => $invoice_id,
                                'name' => $name,
                                'last_name' => $last_name,
                                'phone' => $phone,
                                'address' => $address,
                                'date' => date("Y-m-d H:i:s"),
                                'voucher' => 1,
                                'img' => $img,
                                'status' => 1
                            );
                            //SAVE DATA IN TABLE    
                            $result = $this->obj_referencia_compra->insert($data_referencia);
                        }
                    }
                    if (!empty($result)) {
                        $data['status'] = true;
                    } else {
                        $data['status'] = false;
                    }
                }
            } else {
                $data['status'] = "false2";
            }
        }

        echo json_encode($data);
    }

    public function pay_referido_compra($sponsor_id, $invoice_id, $bono, $qty) {
        //INSERT COMMISSION TABLE
        $amount = $bono * $qty;
        $noventa_percent = $amount * 0.9;
        $diez_percent = $amount * 0.1;
        //insert on table comissión 90%
        $data = array(
            'invoice_id' => $invoice_id,
            'customer_id' => $sponsor_id,
            'bonus_id' => 4,
            'amount' => $noventa_percent,
            'active' => 1,
            'pago' => 0,
            'status_value' => 1,
            'date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $sponsor_id,
        );
        $this->obj_commissions->insert($data);
        //insert commission 10%
        $data = array(
            'invoice_id' => $invoice_id,
            'customer_id' => $sponsor_id,
            'bonus_id' => 4,
            'amount' => $diez_percent,
            'active' => 1,
            'pago' => 0,
            'compras' => 1,
            'status_value' => 1,
            'date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $sponsor_id,
        );
        $this->obj_commissions->insert($data);
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
            if (!empty($result)) {
                $data['message'] = true;
            } else {
                $data['message'] = false;
            }
            echo json_encode($data);
        }
    }

    public function delete_invoice($invoice_id) {
        //VERIFY IF ISSET CUSTOMER_ID
        if ($invoice_id != "") {
            $this->obj_invoices->delete($invoice_id);
            return true;
        }
    }
    
    public function add_30_day_customer($customer_id) {
        //add 30 day por next pay
            $date_month = date("Y-m-d", strtotime("+30 day"));
            //UPDATE TABLE CUSTOMER ACTIVE = 1    
            $data_customer = array(
                'active' => 1,
                'date_month' => $date_month,
                'active_month' => 1,
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $customer_id,
            );
            $this->obj_customer->update($customer_id, $data_customer);
        
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
            $explode_data = explode(" ", $value->date);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
        <loc>' . site_url() . "courses/" . $value->category_slug . "/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $date . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
        }
        foreach ($obj_catalog as $value) {
            $explode_data = explode(" ", $value->date);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
        <loc>' . site_url() . "catalog/" . $value->category_slug . "/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $date . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
        }
        foreach ($obj_category_videos as $value) {
            $explode_data = explode(" ", $value->created_at);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
        <loc>' . site_url() . "courses/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $date . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
        }

        foreach ($obj_category_catalog as $value) {
            $explode_data = explode(" ", $value->created_at);
            $date = "$explode_data[0]" . 'T' . $explode_data[1] . "+00:00";
            $codigo .='<url>
        <loc>' . site_url() . "catalog/" . $value->slug;
            $codigo .='</loc>
        <lastmod>' . $date . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>';
        }

        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . '</loc>';
        $codigo .='<lastmod>2021-01-20T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'home' . '</loc>';
        $codigo .='<lastmod>2021-01-20T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'cursos' . '</loc>';
        $codigo .='<lastmod>2021-01-20T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'catalogo' . '</loc>';
        $codigo .='<lastmod>2021-01-20T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'registro' . '</loc>';
        $codigo .='<lastmod>2021-01-20T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'contacto' . '</loc>';
        $codigo .='<lastmod>2021-01-20T19:18:39+00:00</lastmod>';
        $codigo .='<changefreq>weekly</changefreq>
        <priority>0.80</priority>';
        $codigo .='
    </url>';
        $codigo .='<url>';
        $codigo .='<loc>' . site_url() . 'iniciar-sesion' . '</loc>';
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
