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
$route['default_controller'] = 'customer/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

/*
| -------------------------------------------------------------------------
| REST API Routes
| -------------------------------------------------------------------------
*/

// Authentication
$route['api/login']['POST'] = 'api/user_auth/login';
$route['api/register']['POST'] = 'api/user_auth/register';
$route['api/google']['POST'] = 'api/user_auth/google';

// Product
$route['api/product']['GET'] = 'api/product_listing';
$route['api/product/(:num)']['GET'] = 'api/product_listing/$1';
$route['api/product/search']['GET'] = 'api/product_listing/search';
$route['api/product/search/(:any)/(:any)']['GET'] = 'api/product_listing/search/$1/$2';
$route['api/myproduct']['GET'] = 'api/product_listing/my';
$route['api/myproduct/filter/(:any)/(:any)']['GET'] = 'api/product_listing/filter/$1/$2';

$route['api/product']['POST'] = 'api/product_listing';
$route['api/product']['PUT'] = 'api/product_listing';
$route['api/product/(:num)']['DELETE'] = 'api/product_listing/$1';

// Category
$route['api/category']['GET'] = 'api/category_listing';
$route['api/mycategory']['GET'] = 'api/category_listing/my';

$route['api/category']['POST'] = 'api/category_listing';

// Admin
$route['api/adminlogin']['POST'] = 'api/admin/login';
$route['api/adminproduk']['PUT'] = 'api/admin/produk'; //edit produk as admin
$route['api/adminproduk/(:num)']['DELETE'] = 'api/admin/produk/$1'; //delete produk as admin
$route['api/admintransaksi']['GET'] = 'api/admin/transaksi';//get history transaksi
$route['api/adminmerchant']['GET'] = 'api/admin/merchant';//get list merchant

// Admin Tryout
$route['api/admintryoutlogin']['POST'] = 'api/admin_tryout/login';
$route['api/admintryoutpeserta']['GET'] = 'api/admin_tryout/peserta_tryout';
$route['api/admintryouttransaksi']['GET'] = 'api/admin_tryout/transaksi_tryout';
$route['api/admintryoutstatus']['GET'] = 'api/admin_tryout/status_peserta';
$route['api/admintryoutjumlah']['GET'] = 'api/admin_tryout/total_transaksi';
$route['api/admintryoutpesertauniv']['GET'] = 'api/admin_tryout/universitas_peserta';

// Admin Tryout Univ
$route['api/admintryoutunivlogin']['POST'] = 'api/admin_tryout_univ/login';

// Merchant
$route['api/merchant']['GET'] = 'api/user_crud/merchant';
$route['api/merchantbycat/(:num)']['GET'] = 'api/user_crud/merchant_by_categories/$1';

// CRUD Product
// $route['api/product']['GET'] = 'api/product_crud';
// $route['api/product']['POST'] = 'api/product_crud';
// $route['api/product/(:num)']['GET'] = 'api/product_crud/$1';
// $route['api/product/(:num)']['PUT'] = 'api/product_crud/$1'; 
// $route['api/product/(:num)']['DELETE'] = 'api/product_crud/$1';
// $route['api/product/search/(:any)/(:any)']['GET'] = 'api/product_crud/search/$1/$2'; 

//CRUD User
$route['api/user']['POST'] = 'api/user_crud';
$route['api/user/(:num)']['GET'] = 'api/user_crud/$1';
$route['api/user/(:num)']['PUT'] = 'api/user_crud/$1';

//CRUD Keranjang
$route['api/keranjang']['POST'] = 'api/keranjang_crud';
$route['api/keranjang/(:num)']['GET'] = 'api/keranjang_crud/$1';
$route['api/keranjang/(:num)']['PUT'] = 'api/keranjang_crud/$1';

//CRUD Transaksi
$route['api/transaksi']['POST'] = 'api/transaksi_crud';
$route['api/transaksi/(:num)']['GET'] = 'api/transaksi_crud/$1';
