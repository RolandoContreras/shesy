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

$route['catalog'] = 'catalog';
$route['catalog/([0-9]+)'] = 'catalog/index/$1';
$route['catalog/([0-9a-z_-]+)'] = 'catalog/category/$1';
$route['catalog/([0-9a-z_-]+)/([0-9]+)'] = 'catalog/category/$1';
$route['catalog/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'catalog/detail/$1';

$route['login'] = 'login';
$route['forget'] = 'forget';

$route['courses'] = 'courses';
$route['courses/([0-9]+)'] = 'courses/index/$1';
$route['courses/([0-9a-z_-]+)'] = 'courses/category/$1';
$route['courses/([0-9a-z_-]+)/([0-9]+)'] = 'courses/category/$1';
$route['courses/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'courses/detail/$1';

$route['register/([0-9a-z_-]+)'] = "register/index/$1";
$route['register/validate_username'] = "register/validate_username";
$route['register/validate_username_2'] = "register/validate_username_2";
$route['register/validate'] = "register/validate";

$route['backoffice'] = "b_home";

$route['catalogo'] = "catalogo_home";
$route['catalogo/([0-9]+)'] = 'catalogo_home/index/$1';
$route['catalogo/order'] = "catalogo_home/order";
$route['catalogo/order/([0-9]+)'] = "catalogo_home/order_detail/$1";
$route['catalogo/([0-9a-z_-]+)'] = 'catalogo_home/category/$1';
$route['catalogo/([0-9a-z_-]+)/([0-9]+)'] = 'catalogo_home/category/$1';
$route['catalogo/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'catalogo_home/detail/$1';

$route['catalogo/order/add_cart'] = "catalogo_home/add_cart";

$route['course'] = "c_home";
$route['course/([0-9]+)'] = 'c_home/index/$1';
$route['course/([0-9a-z_-]+)'] = 'c_home/category/$1';
$route['course/([0-9a-z_-]+)/([0-9]+)'] = 'c_home/category/$1';
$route['course/([0-9a-z_-]+)/([0-9a-z_-]+)'] = 'c_home/detail/$1';

$route['backoffice/profile'] = "b_profile";
$route['backoffice/profile/update_password'] = "b_profile/update_password";
$route['backoffice/profile/update_bank'] = "b_profile/update_bank";

$route['backoffice/plan'] = "b_plan";
$route['backoffice/plan/create_invoice'] = "b_plan/create_invoice";

$route['backoffice/referred'] = "b_network";
$route['backoffice/unilevel'] = "b_network/unilevel";
$route['backoffice/unilevel/([0-9a-z_A-Z-=+/]+)'] = "b_network/unilevel/unilevel/$1";

$route['backoffice/history'] = "b_finance";
$route['backoffice/invoice'] = "b_finance/invoice";
$route['backoffice/invoice/upload'] = "b_finance/upload";

$route['backoffice/files'] = "b_files";

$route['backoffice/carrera'] = "b_carrera";

$route['backoffice/pay'] = "b_pay";
$route['backoffice/pay/validate_amount'] = "b_pay/validate_amount";
$route['backoffice/pay/make_pay'] = "b_pay/make_pay";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";
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
$route['dashboard/catalogo/load/([0-9]+)'] = "d_catalog/load/$1";
$route['dashboard/catalogo/validate'] = "d_catalog/validate";

$route['dashboard/videos'] = "d_videos";
$route['dashboard/videos/load'] = "d_videos/load";
$route['dashboard/videos/load/([0-9]+)'] = "d_videos/load/$1";
$route['dashboard/videos/validate'] = "d_videos/validate";

$route['dashboard/bonos'] = "d_bonus"; 
$route['dashboard/bonos/load/([0-9]+)'] = "d_bonus/load/$1";
$route['dashboard/bonos/validate'] = "d_bonus/validate";

$route['dashboard/facturas'] = "d_invoices"; 
$route['dashboard/facturas/load/([0-9]+)'] = "d_invoices/load/$1";
$route['dashboard/facturas/validate'] = "d_invoices/validate";

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

$route['dashboard/categorias'] = "d_category";
$route['dashboard/categorias/load'] = "d_category/load";
$route['dashboard/categorias/load/([0-9]+)'] = "d_category/load/$1";
$route['dashboard/categorias/validate'] = "d_category/validate";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";

$route['dashboard/confirmation_activaciones'] = "d_activate/confirmation";

$route['dashboard/activaciones'] = "d_activate";
$route['dashboard/activaciones/active_customer'] = "d_activate/active_customer";
$route['dashboard/activaciones/active_financy'] = "d_activate/active_financy";
$route['dashboard/activaciones/active'] = "d_activate/active";
$route['dashboard/activaciones/update_confirmation'] = "d_activate/update_confirmation";


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


$route['dashboard/reportes/asociados'] = "d_report_customer";
$route['dashboard/reportes/cuentas'] = "d_report_membership";
$route['dashboard/reportes/pagos'] = "d_report_pays";



$route['salir'] = "login/logout";




/* End of file routes.php */
/* Location: ./application/config/routes.php */