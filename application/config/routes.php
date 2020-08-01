<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = 'errors/error_404';

$route['home'] = 'home';
$route['home/sitemap'] = 'home/sitemap';

$route['catalogo'] = 'catalog';
$route['catalog/order/add_cart'] = 'catalog/add_cart';
$route['catalogo/([0-9]+)'] = 'catalog/index/$1';
$route['catalogo/([0-9a-z_-]+)'] = 'catalog/category/$1';
$route['catalogo/subcategoria/([a-z_-]+)'] = 'catalog/sub_category/$1';
$route['catalogo/([0-9a-z_-]+)/([0-9]+)'] = 'catalog/category/$1';
$route['catalogo/([0-9a-z_-]+)/([0-9]+)/([0-9a-z_-]+)'] = 'catalog/detail/$1';

$route['contacto'] = 'contact';
$route['registro'] = 'register';

$route['iniciar-sesion'] = 'login';
$route['forget'] = 'forget';

$route['cursos'] = 'courses';
$route['cursos/([0-9]+)'] = 'courses/index/$1';
$route['cursos/([0-9a-z_-]+)'] = 'courses/category/$1';
$route['cursos/([0-9a-z_-]+)/([0-9]+)'] = 'courses/category/$1';
$route['cursos/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'courses/detail/$1';

$route['registro/([0-9a-z_-]+)'] = "register/index/$1";
$route['registro/validate_username'] = "register/validate_username";
$route['registro/validate_username_2'] = "register/validate_username_2";
$route['registro/validate'] = "register/validate";

$route['embassy'] = "embassy";

$route['backoffice'] = "b_home";

$route['mi_catalogo'] = "catalogo_home";
$route['mi_catalogo/([0-9]+)'] = 'catalogo_home/index/$1';
$route['mi_catalogo/order'] = "catalogo_home/order";

$route['mi_catalogo/pay_order'] = "catalogo_home/pay_order";
$route['mi_catalogo/contra_entrega'] = "catalogo_home/contra_entrega";
$route['mi_catalogo/procesar_contra_entrega'] = "catalogo_home/procesar_contra_entrega";
$route['mi_catalogo/pay_order/update_cart'] = "catalogo_home/update_cart";
$route['mi_catalogo/pay_order/delete_cart'] = "catalogo_home/delete_cart";
$route['mi_catalogo/pay_order/process_pay_invoice'] = "catalogo_home/process_pay_invoice";

$route['mi_catalogo/order/([0-9]+)'] = "catalogo_home/order_detail/$1";
$route['mi_catalogo/([0-9a-z_-]+)'] = 'catalogo_home/category/$1';
$route['mi_catalogo/([0-9a-z_-]+)/([0-9]+)'] = 'catalogo_home/category/$1';
$route['mi_catalogo/subcategoria/([a-z_-]+)'] = 'catalogo_home/sub_category/$1';
$route['mi_catalogo/([0-9a-z_-]+)/([0-9]+)/([0-9a-z_-]+)'] = 'catalogo_home/detail/$1';




$route['mi_catalogo/order/add_cart'] = "catalogo_home/add_cart";
$route['mi_catalogo/order/send_invoice'] = "catalogo_home/send_invoice";

$route['course'] = "c_home";
$route['course/([0-9]+)'] = 'c_home/index/$1';
$route['course/([0-9a-z_-]+)'] = 'c_home/category/$1';
$route['course/([0-9a-z_-]+)/([0-9]+)'] = 'c_home/category/$1';
$route['course/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'c_home/detail/$1';

$route['backoffice/profile'] = "b_profile";
$route['backoffice/profile/update_password'] = "b_profile/update_password";
$route['backoffice/profile/update_bank'] = "b_profile/update_bank";
$route['backoffice/profile/upload_img'] = "b_profile/upload_img";

$route['backoffice/plan'] = "b_plan";
$route['backoffice/plan/create_invoice'] = "b_plan/create_invoice";

$route['backoffice/recompra'] = "b_plan/recompra";
$route['backoffice/plan/create_invoice_recompra'] = "b_plan/create_invoice_recompra";

$route['backoffice/referred'] = "b_network";
$route['backoffice/unilevel'] = "b_network/unilevel";
$route['backoffice/unilevel/([0-9a-z_A-Z-=+/]+)'] = "b_network/unilevel/unilevel/$1";

$route['backoffice/history'] = "b_finance";
$route['backoffice/invoice'] = "b_finance/invoice";
$route['backoffice/invoice/upload'] = "b_finance/upload";

$route['backoffice/files'] = "b_files";
$route['backoffice/files/show_information'] = "b_files/show_information";

$route['backoffice/carrera'] = "b_carrera";

$route['backoffice/pay'] = "b_pay";
$route['backoffice/pay/validate_amount'] = "b_pay/validate_amount";
$route['backoffice/pay/make_pay'] = "b_pay/make_pay";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";

$route['dashboard/panel/export'] = "panel/export";

$route['dashboard/panel/guardar_btc'] = "panel/guardar_btc";
$route['dashboard/panel/cambiar_status'] = "panel/cambiar_status";
$route['dashboard/panel/masive_messages'] = "panel/masive_messages";

$route['dashboard/comisiones'] = "d_comission";
$route['dashboard/comisiones/load/([0-9]+)'] = "d_comission/load/$1";
$route['dashboard/comisiones/validate_customer'] = "d_comission/validate_customer";
$route['dashboard/comisiones/validate'] = "d_comission/validate";

$route['dashboard/noticias'] = "d_news";
$route['dashboard/noticias/load'] = "d_news/load";
$route['dashboard/noticias/load/([0-9]+)'] = "d_news/load/$1";
$route['dashboard/noticias/validate'] = "d_news/validate";

$route['dashboard/catalogo'] = "d_catalog";
$route['dashboard/catalogo/load'] = "d_catalog/load";
$route['dashboard/catalogo/show_sub_category'] = "d_catalog/show_sub_category";
$route['dashboard/catalogo/load/([0-9]+)'] = "d_catalog/load/$1";
$route['dashboard/catalogo/validate'] = "d_catalog/validate";
$route['dashboard/catalogo/delete'] = "d_catalog/delete";

$route['dashboard/videos'] = "d_videos";
$route['dashboard/videos/load'] = "d_videos/load";
$route['dashboard/videos/load/([0-9]+)'] = "d_videos/load/$1";
$route['dashboard/videos/validate'] = "d_videos/validate";
$route['dashboard/videos/delete'] = "d_videos/delete";

$route['dashboard/bonos'] = "d_bonus"; 
$route['dashboard/bonos/load/([0-9]+)'] = "d_bonus/load/$1";
$route['dashboard/bonos/validate'] = "d_bonus/validate";

$route['dashboard/facturas'] = "d_invoices"; 
$route['dashboard/facturas/load/([0-9]+)'] = "d_invoices/load/$1";
$route['dashboard/facturas/validate'] = "d_invoices/validate";

$route['dashboard/facturas_catalogo'] = "d_invoices/catalogo"; 
$route['dashboard/facturas_catalogo/load/([0-9]+)'] = "d_invoices/catalogo_load/$1";
$route['dashboard/facturas_catalogo/validate'] = "d_invoices/catalogo_validate";
$route['dashboard/facturas/ver/([0-9]+)'] = "d_invoices/ver_invoice/$1"; 
$route['dashboard/facturas_catalogo/entregado'] = "d_invoices/catalogo_entregado"; 

$route['dashboard/correos'] = "d_messages_masive"; 

$route['dashboard/rangos'] = "d_ranges";
$route['dashboard/rangos/load'] = "d_ranges/load";
$route['dashboard/rangos/load/([0-9]+)'] = "d_ranges/load/$1";
$route['dashboard/rangos/validate'] = "d_ranges/validate";

$route['dashboard/membresias'] = "d_kit";
$route['dashboard/membresias/load'] = "d_kit/load";
$route['dashboard/membresias/load/([0-9]+)'] = "d_kit/load/$1";
$route['dashboard/membresias/validate'] = "d_kit/validate";

$route['dashboard/puntos'] = "d_points"; 
$route['dashboard/puntos/load/([0-9]+)'] = "d_points/load/$1";
$route['dashboard/puntos/validate_customer'] = "d_points/validate_customer";
$route['dashboard/puntos/validate'] = "d_points/validate";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/financiados'] = "d_customer/financiados";
$route['dashboard/clientes/active_customer'] = "d_customer/active_customer";
$route['dashboard/clientes/no_active_customer'] = "d_customer/no_active_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";
$route['dashboard/clientes/delete'] = "d_customer/delete";

$route['dashboard/categorias'] = "d_category";
$route['dashboard/categorias/load'] = "d_category/load";
$route['dashboard/categorias/([0-9]+)'] = "d_category/sub_category/$1";
$route['dashboard/categorias/([0-9]+)/make_sub_category'] = "d_category/make_sub_category";
$route['dashboard/categorias/([0-9]+)/make_sub_category/([0-9]+)'] = "d_category/make_sub_category/$1";
$route['dashboard/categorias/load/([0-9]+)'] = "d_category/load/$1";
$route['dashboard/categorias/validate'] = "d_category/validate";
$route['dashboard/categorias/validate_sub_category'] = "d_category/validate_sub_category";
$route['dashboard/categorias/delete_sub_category'] = "d_category/delete_sub_category";


$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/embassy'] = "d_embassy";
$route['dashboard/embassy/cambiar_status'] = "d_embassy/change_status";
$route['dashboard/embassy/cambiar_status_no'] = "d_embassy/change_status_no";

$route['dashboard/recargas'] = "d_recargas";
$route['dashboard/recargas/load'] = "d_recargas/load";
$route['dashboard/recargas/load/([0-9]+)'] = "d_recargas/load/$1";
$route['dashboard/recargas/validate'] = "d_recargas/validate";
$route['dashboard/recargas/delete'] = "d_recargas/delete";

$route['dashboard/recargas_comisiones'] = "d_recargas_comisiones";
$route['dashboard/recargas_comisiones/load'] = "d_recargas_comisiones/load";
$route['dashboard/recargas_comisiones/load/([0-9]+)'] = "d_recargas_comisiones/load/$1";
$route['dashboard/recargas_comisiones/validate'] = "d_recargas_comisiones/validate";
$route['dashboard/recargas_comisiones/delete'] = "d_recargas_comisiones/delete";


$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";

$route['dashboard/confirmation_activaciones'] = "d_activate/confirmation";

$route['dashboard/activaciones'] = "d_activate";
$route['dashboard/activaciones/load'] = "d_activate/load";
$route['dashboard/activaciones/validate_user'] = "d_activate/validate_user";
$route['dashboard/activaciones/active_customer'] = "d_activate/active_customer";
$route['dashboard/activaciones/active'] = "d_activate/active";
$route['dashboard/activaciones/update_confirmation'] = "d_activate/update_confirmation";

$route['dashboard/contra-entrega'] = "d_contra_entrega";
$route['dashboard/contra-entrega/([0-9]+)'] = "d_contra_entrega/order/$1";
$route['dashboard/contra-entrega/validate_user'] = "d_activate/validate_user";
$route['dashboard/contra-entrega/active'] = "d_contra_entrega/active";
$route['dashboard/contra-entrega/delete'] = "d_contra_entrega/delete";

$route['dashboard/activaciones_catalogo'] = "d_activate/activaciones_catalogo";
$route['dashboard/activaciones_catalogo/([0-9]+)'] = "d_activate/order_catalog/$1";
$route['dashboard/activaciones_catalogo/active_catalogo'] = "d_activate/active_catalogo";

$route['dashboard/activar_pagos'] = "d_active_pays";
$route['dashboard/activar_pagos/pagado'] = "d_active_pays/pagado";
$route['dashboard/activar_pagos/devolver'] = "d_active_pays/devolver";


$route['dashboard/pagos'] = "d_pays";
$route['dashboard/pagos/pagado'] = "d_pays/pagado";
$route['dashboard/pagos/load/([0-9]+)'] = "d_pays/load/$1";
$route['dashboard/pagos/devolver'] = "d_pays/devolver";
$route['dashboard/pagos/load/([0-9]+)'] = "d_pays/load/$1";
$route['dashboard/pagos/validate_customer'] = "d_pays/validate_customer";
$route['dashboard/pagos/validate'] = "d_pays/validate";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";


$route['dashboard/report_customer'] = "d_report_customer";
$route['dashboard/report_customer/load'] = "d_report_customer/load";
$route['dashboard/report_customer/export'] = "d_report_customer/export";

$route['dashboard/report_invoice'] = "d_report_invoice";
$route['dashboard/report_invoice/load'] = "d_report_invoice/load";
$route['dashboard/report_invoice/export'] = "d_report_invoice/export";

$route['dashboard/report_pay'] = "d_report_pay";
$route['dashboard/report_pay/load'] = "d_report_pay/load";
$route['dashboard/report_pay/export'] = "d_report_pay/export";

$route['dashboard/report_global'] = "d_report_global";



$route['salir'] = "login/logout";




/* End of file routes.php */
/* Location: ./application/config/routes.php */