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
$route['default_controller'] = 'Dashboards';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Auth';
$route['cek-login'] 			= 'Auth/cek_login';
$route['logout'] 				= 'Auth/logout';
$route['profile'] 				= 'Users/profile';
$route['insert-user'] 			= 'Users/insert_user';
$route['delete-user/(:num)'] 	= 'Users/delete_user';
$route['users-list'] 			= 'Users/user_list';
$route['dashboards'] 			= 'Dashboards';
$route['modules-list'] 				= 'Settings/Modules';
$route['set-rows/(:any)'] 			= 'Settings/Roles/set_rows';
$route['roles-management'] 			= 'Settings/Roles';
$route['role-module/(:num)']		= 'Settings/Roles/role_module';
$route['insert-role']				= 'Settings/Roles/insert_role';
$route['insert-role_module/(:num)']	= 'Settings/Roles/insert_role_module';
$route['delete-role/(:num)']		= 'Settings/Roles/delete_role';

$route['items-list'] 				= 'Masterdata/Items';
$route['items-list/(:any)'] 		= 'Masterdata/Items';
$route['insert-item/(:any)'] 		= 'Masterdata/Items/insert';
$route['insert-item-types/(:any)'] 	= 'Masterdata/Items/insert_item_types';
$route['insert-item-brands/(:any)'] = 'Masterdata/Items/insert_item_brands';
$route['insert-item-units/(:any)'] = 'Masterdata/Items/insert_item_units';
$route['edit-item/(:any)'] 			= 'Masterdata/Items/edit';
$route['update-item-img/(:any)'] 	= 'Masterdata/Items/update_item_img';
$route['delete-item-img/(:any)'] 	= 'Masterdata/Items/delete_item_img';
$route['delete-item/(:any)']    	= 'Masterdata/Items/delete';

$route['customers-list'] 			= 'Masterdata/Customers';
$route['customers-list/(:any)'] 	= 'Masterdata/Customers';
$route['edit-customers/(:any)']		= 'Masterdata/Customers/edit';
$route['insert-customers/(:any)']	= 'Masterdata/Customers/insert';
$route['delete-customers/(:any)']	= 'Masterdata/Customers/delete';

$route['suppliers-list'] 			= 'Masterdata/Suppliers';
$route['suppliers-list/(:any)'] 	= 'Masterdata/Suppliers';
$route['edit-suppliers/(:any)']		= 'Masterdata/Suppliers/edit';
$route['insert-suppliers/(:any)']	= 'Masterdata/Suppliers/insert';
$route['delete-suppliers/(:any)']	= 'Masterdata/Suppliers/delete';

$route['sales-list'] 			= 'Masterdata/Sales';
$route['sales-list/(:any)'] 	= 'Masterdata/Sales';
$route['edit-sales/(:any)']		= 'Masterdata/Sales/edit';
$route['insert-sales/(:any)']	= 'Masterdata/Sales/insert';
$route['delete-sales/(:any)']	= 'Masterdata/Sales/delete';

$route['orders-list'] 			= 'Purchase/Orders';
$route['orders-list/(:any)'] 	= 'Purchase/Orders';
$route['edit-orders/(:any)']	= 'Purchase/Orders/edit';
$route['insert-orders/(:any)']	= 'Purchase/Orders/insert';
$route['delete-orders/(:any)']	= 'Purchase/Orders/delete';

$route['purchases-list'] 			= 'Purchase/Purchases';
$route['purchases-list/(:any)'] 	= 'Purchase/Purchases';
$route['edit-purchases/(:any)']		= 'Purchase/Purchases/edit';
$route['insert-purchases/(:any)']	= 'Purchase/Purchases/insert';
$route['delete-purchases/(:any)']	= 'Purchase/Purchases/delete';

$route['debts-list'] 			= 'Purchase/Debts';
$route['debts-list/(:any)'] 	= 'Purchase/Debts';
$route['edit-debts/(:any)']		= 'Purchase/Debts/edit';
$route['insert-debts/(:any)']	= 'Purchase/Debts/insert';
$route['delete-debts/(:any)']	= 'Purchase/Debts/delete';

$route['json/cek-username'] 		= 'Users/json_cek_user';
$route['json/get-user'] 			= 'Users/json_get_user';
$route['json/get-role'] 			= 'Settings/Roles/json_get_role';
$route['json/get-role_module'] 		= 'Settings/Roles/json_get_role_module';
$route['json/get-item_types'] 		= 'Masterdata/Items/json_get_item_types';
$route['json/get-item_brands'] 		= 'Masterdata/Items/json_get_item_brands';
$route['json/get-item_units'] 		= 'Masterdata/Items/json_get_item_units';
$route['json/get-item-list'] 		= 'Masterdata/Items/json_get_item';
$route['json/get-item-kode'] 		= 'Masterdata/Items/json_get_item_kode';
$route['json/add-unit-price']       = 'Masterdata/Items/json_add_price_unit';
$route['json/update-unit-price']    = 'Masterdata/Items/json_update_price_unit';
$route['json/get-unit-price']       = 'Masterdata/Items/json_get_price_units';
