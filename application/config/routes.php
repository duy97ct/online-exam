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
$route['default_controller'] = 'Controller/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// các page
$route['gioi_thieu'] = 'Controller/page/gioi_thieu';
$route['the_le_cuoc_thi'] = 'Controller/page/the_le_cuoc_thi';
$route['giai_thuong'] = 'Controller/page/giai_thuong';
$route['lien_he'] = 'Controller/page/lien_he';
// $route['gop_y'] = 'Controller/page/gop_y';
// $route['thongbao'] = 'Controller/thongbao';

// end page
$route['index'] = 'Controller/index';



$route['ds_ketqua'] = 'CauhoiController/ds_ketqua';

$route['del_nguoidung/(:num)'] = 'NguoidungController/del_nguoidung/$1';
$route['kiemtra'] = 'CauhoiController/kiemtra';
$route['kiemtra_test'] = 'CauhoiController/kiemtra_test';
$route['kiemtra_traloicauhoi'] = 'CauhoiController/kiemtra_traloicauhoi';
$route['update_kiemtra'] = 'CauhoiController/update_kiemtra';
$route['kiemtra_kq/(:any)'] = 'CauhoiController/kiemtra_kq/$1';
$route['tra_cuu_kq'] = 'CauhoiController/tra_cuu_kq';


$route['admin/xem_kiemtra/(:num)'] = 'CauhoiController/xem_kiemtra/$1';

$route['baiviet/(:any)'] = 'BaivietController/show_baiviet/$1';
$route['chuyenmuc/(:any)'] = 'BaivietController/show_baiviet_theo_category/$1';
$route['page/(:any)'] = 'controller/page/$1';

$route['dangnhap'] = 'LoginController/index';
$route['login'] = 'LoginController/login';
$route['dangxuat'] = 'LoginController/logout';

$route['show_baiviet_theo_category/(:any)'] = 'BaivietController/show_baiviet_theo_category/$1';
$route['tracuu'] = 'CauhoiController/tracuu';
$route['admin'] = 'Controller/index_admin';
$route['admin/ds_cauhoi'] = 'CauhoiController/index';
$route['admin/add_cauhoi'] = 'CauhoiController/add_cauhoi';
$route['admin/sua_cauhoi'] = 'CauhoiController/sua_cauhoi';
$route['admin/xoa_cauhoi/(:num)'] = 'CauhoiController/xoa_cauhoi/$1';
$route['admin/ajax_chitiet_cauhoi/(:num)'] = 'CauhoiController/ajax_chitiet_cauhoi/$1';
$route['admin/ds_nguoidung'] = 'NguoidungController/index';
$route['admin/ds_trunggiai'] = 'NguoidungController/ds_trunggiai';
$route['admin/export_excel_nguoidung'] = 'ExcelController/export_excel_nguoidung';
$route['admin/export_excel_nguoidung/(:any)'] = 'ExcelController/export_excel_nguoidung/$1';

$route['admin/ds_taikhoan'] = 'UserController/index';
$route['admin/ajax_ds_taikhoan'] = 'UserController/ajax_ds_taikhoan';
$route['admin/add_user'] = 'UserController/add_user';
$route['admin/del_user/(:any)'] = 'UserController/del_user/$1';
$route['admin/change_pass_user'] = 'UserController/change_pass_user';
$route['admin/lock_user/(:any)'] = 'UserController/lock_user/$1';
$route['admin/unlock_user/(:any)'] = 'UserController/unlock_user/$1';


$route['admin/ds_baiviet'] = 'BaivietController/index';
$route['admin/add_baiviet'] = 'BaivietController/add_baiviet';
$route['admin/add2_baiviet'] = 'BaivietController/add2_baiviet';
$route['admin/edit_baiviet/(:any)'] = 'BaivietController/edit_baiviet/$1';
$route['admin/edit2_baiviet/(:any)'] = 'BaivietController/edit2_baiviet/$1';
$route['admin/del_baiviet/(:any)'] = 'BaivietController/del_baiviet/$1';

$route['admin/ds_sanpham'] = 'SanphamController/index';
$route['admin/add_sanpham'] = 'SanphamController/add_sanpham';
$route['admin/add2_sanpham'] = 'SanphamController/add2_sanpham';
$route['admin/edit_sanpham/(:any)'] = 'SanphamController/edit_sanpham/$1';
$route['admin/edit2_sanpham/(:any)'] = 'SanphamController/edit2_sanpham/$1';
$route['admin/del_sanpham/(:any)'] = 'SanphamController/del_sanpham/$1';

$route['admin/ds_category'] = 'CategoryController/index';
$route['admin/add_category'] = 'CategoryController/add_category';
$route['admin/ajax_sua_category'] = 'CategoryController/ajax_sua_category';
$route['admin/sua_category'] = 'CategoryController/sua_category';
$route['admin/xoa_category'] = 'CategoryController/xoa_category';

$route['admin/vanban'] = 'VanbanlienquanController/index';
$route['admin/vanban/(:any)'] = 'VanbanlienquanController/$1';


$route['admin/tke_theo_category'] = 'BaivietController/tke_baiviet_theo_category';
$route['admin/ds_baiviet_theo_thang'] = 'BaivietController/ds_baiviet_theo_thang';

$route['(:any)'] = "$1/index";
$route['(:any)/(:any)'] = "$1/$2";
$route['(:any)/(:any)(:any)'] = "$1/$2/$3";
