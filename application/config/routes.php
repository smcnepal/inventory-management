<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['login'] = 'Login/index';
$route['login-submit'] = 'Login/verify';
$route['logout'] = 'admin/Admincontrol/logout';
$route['admin'] = 'admin/Admincontrol/index';
$route['admin/view-stock'] = 'admin/Admincontrol/viewstoke';
$route['admin/update-user'] = 'admin/Admincontrol/updateuser';
$route['admin/create-stock'] = 'admin/Admincontrol/createstock';
$route['user/logout'] = 'user/Createstock/logout';
$route['admin/dashboard'] = 'admin/Admincontrol/index';
$route['user/create-stock/dashboard'] = 'user/Createstock/index';
$route['user/add-stoke'] = 'user/Createstock/submitstoke';
$route['user/create-stoke'] = 'user/Createstock/createstoke';
$route['user/view-stoke'] = 'user/Createstock/viewstoke';
$route['user/view-stock/dashboard'] = 'user/Createstock/viewstoke_index';
$route['user/view-stoke/out'] = 'user/Createstock/viewstoke_out';
$route['user/update-stock/'] = 'user/Createstock/updatestock';
$route['user/update-stock/out'] = 'user/Createstock/updatestock_out';

$route['user/view/dashboard'] = 'user/Viewstock';
$route['user/view/stock'] = 'user/Viewstock/viewstoke';
$route['createuser'] = 'admin/Admincontrol/createuser';
$route['register/user'] = 'admin/Admincontrol/save_user';
$route['admin/update-stock'] = 'admin/Admincontrol/editstock';
$route['update/user'] = 'admin/Admincontrol/update_user';
$route['admin/userlist'] = 'admin/Admincontrol/userlist';
$route['admin/transaction/report'] = 'admin/Admincontrol/generate_report';
$route['admin/add-stock'] = 'admin/Admincontrol/createstock';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
