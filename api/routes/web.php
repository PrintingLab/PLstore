<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('layouts/app');
});
Route::Post('/uploadfile', function () {
	return view('uploadfile');
});
Route::Post('/reset', function () {
	return view('reset');
});
//  Route::get('/tool', function () {
//     return view('tool');
// });
Route::get('/', function () {
	return view('welcome');
});
Route::get('/checkout', 'AuthorizeController@index');
Route::post('Authentication', 'AuthorizeController@chargeCreditCard')->name('Authentication');
Route::post('checkout', 'AuthorizeController@capturePreviouslyAuthorizedAmount')->name('checkout');
Route::post('postDiamond', [
	'as' => 'postDiamond',
	'uses' => 'HomeController@postDiamond'
]);
Route::get('/usuarios-/detalles/{id}', function ($id) {
	return "Detalles del usuario: {$id}";
});
Route::get('posts/{post_id}/comments/{comment_id}', function ($postId, $commentId) {
	return "Este el comentario {$commentId} del post {$postId}";
});
Route::post('icons','DesignerController@callicons')->name('icons');
Route::post('Jsonupload','DesignerController@jsontemplates')->name('Jsonupload');
Route::post('BDJsonupload','DesignerController@BDtemplates')->name('BDJsonupload');
Route::post('tool', 'DesignerController@tool')->name('tool');
Route::post('/upload', 'DesignerController@upload');
Route::get('/deleteimg', 'DesignerController@deleteimg');
Route::get('userimg', 'DesignerController@userimg');
Route::get('/product', 'DesignerController@index');
//Route::get('tool','DesignerController@tool');
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');
Route::get('/','PagesController@Home');
Route::get('/landing-page','PagesController@landingpage');
Route::get('/signage','PagesController@Signage');
Route::get('/handle_login','PagesController@handle_login');
Route::get('/vehicle-graphics','PagesController@VehicleGraphics');
Route::get('/large-format','PagesController@LargeFormat');
Route::get('/trade-shows','PagesController@TradeShows');
Route::get('/custom-apparel','PagesController@CustomApparel');
Route::get('/amazontest','PagesController@amazontest');
Route::get('/contact-us','PagesController@ContactUs');
Route::get('/about-us','PagesController@Aboutus');
Route::get('/returns-and-refund','PagesController@ReturnsRefund');
Route::get('/privacy-policy','PagesController@PrivacyPolicy');
Route::get('/terms-and-conditions','PagesController@TermsConditions');
Route::post('signage','SignageCorreoController@EnviarCorreo')->name('EmailSignage');
Route::post('vehicle-graphics','VehicleCorreoController@EnviarCorreo')->name('EmailVehicle');
Route::post('large-format','LargeCorreoController@EnviarCorreo')->name('EmailLarge');
Route::post('trade-shows','TradeCorreoController@EnviarCorreo')->name('EmailTrade');
Route::post('contact-us','ContactCorreoController@EnviarCorreo')->name('EmailContact');
Route::get('cards','PagesController@Cards');
Route::get('business-cards{id_product}',[ 'uses'=>'BusinessCardsController@StandardBusiness','as'=>'business-cards']);
Route::get('attr1_BC/{id_product?}','BusinessCardsController@attr1');
Route::get('attr2_BC/{id_product?}/{at1?}','BusinessCardsController@attr2');
Route::post('attr3_BC','BusinessCardsController@attr3');
Route::post('attr4_BC','BusinessCardsController@attr4');
Route::post('attr5_BC','BusinessCardsController@attr5');
Route::post('attr10_BC','BusinessCardsController@attr10');
Route::post('attr11_BC','BusinessCardsController@attr11');
Route::get('search_attr1_BC/{id_product?}/{at1?}','BusinessCardsController@size_business_cards');
Route::get('search_attr2_BC/{id_product?}/{at1?}/{at2?}','BusinessCardsController@papertype_business_cards');
Route::get('search_attr6_BC/{id_product?}/{at1?}/{at2?}','BusinessCardsController@color_business_cards');
Route::post('search_attr3_BC','BusinessCardsController@printedside_business_cards');
Route::post('search_attr3_BC_color','BusinessCardsController@printedside_business_cards_color');
Route::post('search_attr4_BC','BusinessCardsController@coating_business_cards');
Route::post('search_attr5_BC','BusinessCardsController@corners_business_cards');
Route::post('search_attr10_BC','BusinessCardsController@quantity_business_cards');
Route::post('search_attr10_BC_color','BusinessCardsController@quantity_business_cards_color');
Route::post('search_attr11_BC','BusinessCardsController@printingtime_business_cards');
Route::post('search_attr11_BC_color','BusinessCardsController@printingtime_business_cards_color');
Route::get('search_attr12_BC_color/{id_product?}/{attr1?}/{attr2?}/{attr3}/{attr4}/{attr5}/{attr6?}/{attr10}/{attr11}','BusinessCardsController@edgecolor_change_businesscards');
Route::post('upload-file', 'UploadFileProductsController@Home')->name('upload-file');;
Route::get('/cart','CarController@home');
Route::post('cart','CarController@CarPost')->name('cart');
Route::Post('desingimg','CarController@uploadesing')->name('desingimg');
Route::post('moveimg','CarController@movefiles')->name('moveimg');
Route::get('/eliminar-product','CarController@Eliminar');
Route::get('consult-update-product/{id_A}','CarController@ConsultUpdate');
Route::post('update-product','CarController@Update')->name('update-product');
Route::post('search_attr10_BC_car','BusinessCardsController@quantity_business_cards_car');
Route::post('Csearch_attr10_BC_car','BusinessCardsController@quantity_business_cards_car2');
Route::get('SetPaymentDetails','CarController@SetPaymentDetails');
Route::post('ConfirmPaymentAndAuthorize','CarController@ConfirmPaymentAndAuthorize')->name('ConfirmPaymentAndAuthorize');
Route::post('ordercomplete','CarController@ordercomplete')->name('ordercomplete');
Route::post('Findordercomplete','CarController@Findordercomplete')->name('Findordercomplete');
Route::post('GetDetails','CarController@GetDetail')->name('GetDetails');
Route::get('placeorder','CarController@placeorderfuntion')->name('placeorder');
Route::get('consult-update-details/{id_A}','CarController@ConsultUpdateDetails');
Route::post('update-product-details','CarController@UpdateDetails')->name('update-product-details');
Route::post('we-designed', 'WeDesignedController@Home')->name('we-designed');
Route::get('/signage-mobile','PagesController@SignageMobile');
Route::get('/vehicle-graphics-mobile','PagesController@VehicleMobile');
Route::get('/large-format-mobile','PagesController@LargeMobile');
Route::get('/trade-shows-mobile','PagesController@TradeMobile');
Route::get('/postcards','PostCardsController@home');
Route::get('attr1_postcards','PostCardsController@attr1');
Route::get('attr2_postcards/{at1}','PostCardsController@attr2');
Route::get('attr3_postcards/{at1}/{at2}','PostCardsController@attr3');
Route::post('attr4_postcards','PostCardsController@attr4');
Route::post('attr5_postcards','PostCardsController@attr5');
Route::post('attr10_postcards','PostCardsController@attr10');
Route::post('attr10_postcards_5','PostCardsController@attr10_5');
Route::post('attr11_postcards','PostCardsController@attr11');
Route::post('attr11_postcards_5','PostCardsController@attr11_5');
Route::get('postcardsattr1/{attr1?}','PostCardsController@postcardsattr1');
Route::get('postcardsattr2/{attr1?}/{attr2?}','PostCardsController@postcardsattr2');
Route::get('postcardsattr3/{attr1?}/{attr2?}/{attr3?}','PostCardsController@postcardsattr3');
Route::post('postcardsattr4','PostCardsController@postcardsattr4');
Route::post('postcardsattr5','PostCardsController@postcardsattr5');
Route::post('postcardsattr10','PostCardsController@postcardsattr10');
Route::post('postcardsattr10_5','PostCardsController@postcardsattr10_5');
Route::post('postcardsattr11','PostCardsController@postcardsattr11');
Route::post('postcardsattr11_5','PostCardsController@postcardsattr11_5');
Route::get('download-template-business','DownloadTemplateController@DownloadBusinesscards')->name('download-template-business');
Route::get('download-template-postcards','DownloadTemplateController@DownloadPostcards')->name('download-template-postcards');

Route::post('search_attr11_postcar','PostCardsController@quantity_car');
Route::post('search_attr11_5postcar','PostCardsController@quantity_car5');


//registro y login laravel
//la primera es la que podemos quitar y se reemplazan por la de abajo
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/exit-count','HomeController@CloseUser');
Route::post('/registeramazonuser','RegisterUsersController@Registeramzomuser')->name('registeramazonuser');
//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//originales
// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset', 'Auth\ResetPasswordController@reset');
//registro y login proio
 // Route::get('/register','RegisterUsersController@ViewRegister');
 // Route::post('/register','RegisterUsersController@Register')->name('register');
 //  Route::get('close-user','CountUserController@CloseUser');
 // Route::get('count-user','CountUserController@Home');
 //
 // Route::get('login',['as'=>'login','uses' => 'CountUserController@ViewLogin']);
 // Route::post('login-validate', ['as'=>'login-validate','uses' => 'CountUserController@Login']);
Route::post('update-user', ['as'=>'update-user','uses' => 'CountUserController@UpdateUser']);
Route::post('update-password', ['as'=>'update-password','uses' => 'CountUserController@UpdatePassword']);
Route::post('delete-count', ['as'=>'delete-count','uses' => 'CountUserController@DeleteCount']);
Route::get('sale-details','CountUserController@details')->name('sale-details');

//Rutas con roles y permisos
Route::middleware(['auth'])->group(function(){
	//Roles
	Route::get('sales','SaleController@index')->name('sales.index')->middleware('permission:sales.index');
	Route::get('details','SaleController@details')->name('sales.details')->middleware('permission:sales.details');
	Route::get('download','SaleController@download')->name('sales.download')->middleware('permission:sales.download');
});
