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
    return redirect('/login');

});


//Route::auth();

// Admin middleware
Route::group(['middleware'=>'admin', 'as' => 'admin.'], function(){

	Route::get('/admin', function(){
		return view('admin.index');
	});
	Route::resource('/admin/users', 'AdminUsersController');
	//Route::get('admin/media/upload',['as'=>'admin.media.upload', 'uses'=>'AdminMediasController@store']);
	
});

// Business Owner middleware
Route::group(['middleware'=>'bowner', 'as' => 'bowner.'], function(){

	// Homepage
	Route::get('/bowner', function(){
		return view('bowner.index');
	});

	// Human Resource route
	Route::resource('/bowner/humans', 'BownerHumansController');

	// Salary route
	Route::post('/bowner/salaries', 'BownerSalariesController@index');
	Route::post('/bowner/salaries/store', [
		'uses' => 'BownerSalariesController@store',
		'as' => 'salaries.store' ]);
	Route::resource('/bowner/salaries', 'BownerSalariesController', ['except'=>['store']]);

	// Leave route
	Route::resource('/bowner/leaves', 'LeavesController');
	
	// Chart route
	Route::get('bowner/chart', [
		'uses' => 'ChartController@index',	
		'as' =>'chart.index'
	]);

	// Customer route
	Route::resource('bowner/customer', 'CustomerController', ['except'=>['store']]);

	// Order route
	Route::get('order_delete/{order_id}',[
		'uses' => 'OrderController@destroy',
		'as' => 'orders.destroy',
	]);
	Route::get('order_complete/{order_id}',[
		'uses' => 'OrderController@complete',
		'as' =>'orders.complete',
	]);
	Route::get('order_submit/{order_id}', [
		'uses' => 'OrderController@submit',
		'as' => 'orders.submit',
	]);
	Route::get('order_deliver/{order_id}', [
		'uses' => 'OrderController@deliver',
		'as' => 'orders.deliver',
	]);

	// Performances Route
	Route::get('/calculator', 'CalculatorController@index');
	Route::get('/calculator/inputdriver', 'CalculatorController@inputdriver');
	Route::get('/calculator/inputstaff', 'CalculatorController@inputstaff');
	Route::post('/calculator/store', 'CalculatorController@calculator');
	Route::post('/calculator/storedrive', 'CalculatorController@calculatordriver');
	//Route::get('calculator.store', 'CalculatorController@store');
	Route::get('/calculator/tamp', 'CalculatorController@tamp');
	Route::get('/calculator/tampdrive', 'CalculatorController@tampdrive');
	Route::get('/calculator/tampstaff', 'CalculatorController@tampstaff');
	Route::post('/calculator/storestaff', 'CalculatorController@calculatorstaff');
	Route::get('/calculator/choice', 'CalculatorController@choice');
	Route::get('/calculator/cari', 'CalculatorController@cari');
	Route::get('/calculator/caristaff', 'CalculatorController@caristaff');
	Route::get('/calculator/caridriver', 'CalculatorController@caridriver');


	/*
	Route::get('bowner/inventories/material/purchase', [
		'uses' => 'MaterialPurchaseController@index',
		'as' => 'purchase.index'
	]);
	Route::get('bowner/inventories/material/purchase/create', [
		'uses' => 'MaterialPurchaseController@create',
		'as' => 'purchase.create'
	]);
	Route::post('bowner/inventories/material/purchase/store', [
		'uses' => 'MaterialPurchaseController@store',
		'as' => 'purchase.store'
	]);
	*/
});

// Order route
/*
Route::group(['middleware'=>'auth'], function(){
	Route::resource('/orders', 'OrderController', ['except'=>['destroy']]);
	Route::get('/delete_order/{order_id}',[
		'uses' => 'OrderController@destroy',
		'as' => 'orders.destroy',
	]);
	Route::get('/complete_order/{order_id}',[
		'uses' => 'OrderController@complete',
		'as' =>'orders.complete',
	]);
*/
// BusinessOwner_Manager middleware


	Route::group(['middleware' => 'bowner_manager', 'as' => 'bowner.'], function() {

	Route::get('manager', function(){
		return view('bowner.index');
	});

	Route::resource('bowner/customer', 'CustomerController', ['except'=>['store']]);
	// Production route
	Route::resource('bowner/production', 'ProductionController');
	Route::get('bowner/complete_production/{o_qty}/{p_id}/{p_qty}',[
		'uses' => 'ProductionController@complete',
		'as' =>'production.complete',
	]);

	// Inventories route
	Route::resource('bowner/inventories', 'InventoryController');

	Route::get('bowner/inventories/product/edit/{product_id}', [
		'uses' => 'InventoryController@editProduct',
		'as' => 'inventories.product.edit'
	]);
	Route::get('bowner/inventories/material/edit/{material_id}', [
		'uses' => 'InventoryController@editMaterial',
		'as' => 'inventories.material.edit'
	]);
	Route::patch('bowner/inventories/product/update/{product_id}', [
		'uses' => 'InventoryController@updateProduct',
		'as' => 'inventories.product.update'
	]);
	Route::patch('bowner/inventories/material/update/{material_id}', [
		'uses' => 'InventoryController@updateMaterial',
		'as' => 'inventories.material.update'
	]);

	// Purchasing route
	Route::resource('bowner/inventories/material/purchase', 'MaterialPurchaseController', ['except'=>'destroy']);
	Route::get('bowner/inventories/material/purchase/delete/{purchase_id}', [
		'uses' => 'MaterialPurchaseController@destroy',
		'as' => 'purchase.destroy'
	]);
	Route::get('bowner/inventories/material/purchase/complete/{purchase_id}', [
		'uses' => 'MaterialPurchaseController@complete',
		'as' => 'purchase.complete'
	]);

	// Supplier route
	Route::resource('bowner/supplier', 'SupplierController');

});

// Employee_BusinessOwner middleware
	Route::group(['middleware' => 'bowner_employee'], function() {

	// Order route
	Route::resource('orders', 'OrderController', ['except'=>['destroy']]);

	// Customer creation route
	Route::get('customer/create', 'CustomerController@create');
	Route::post('customer', 'CustomerController@store')->name('customer');
});

// CHP route
	Route::resource('chp', 'ChpController', ['except'=>['destroy']]);
	Route::get('chp_delete/{chp_id}',[
		'uses' => 'ChpController@destroy',
		'as' => 'chp.destroy',
	]);
	Route::get('chp_complete/{chp_id}',[
		'uses' => 'ChpController@complete',
		'as' =>'chp.complete',
	]);
	Route::get('chp_submit/{chp_id}', [
		'uses' => 'ChpController@submit',
		'as' => 'chp.submit',
	]);
	Route::get('chp_deliver/{chp_id}', [
		'uses' => 'ChpController@deliver',
		'as' => 'chp.deliver',
	]);


	Auth::routes();


	Route::get('/home', 'HomeController@index');




	Route::group(['middleware'=>'outlet', 'as' => 'outlet.'], function(){
	Route::get('/outlet', function(){
			return view('bowner.index');
		});


	//humans route
	Route::resource('/outlet/humans', 'BownerHumansController', ['except' =>['resign','destroy']]);
	Route::patch('outlet/humans/update/{id}', [
		'uses' => 'BownerHumansController@update',
		'as' => 'humans.update'
	]);
	Route::get('outlet/humans/{id}/edit', [
		'uses' => 'BownerHumansController@edit',
		'as' => 'humans.edit'
	]);




	Route::resource('/outlet/leaves', 'LeavesController');


	//calculator route
	//input
	Route::get('/outlet/calculator', 'CalculatorController@index');
	Route::get('/outlet/inputdriver/{location}/{id?}', 'CalculatorController@inputdriver');
	Route::get('/outlet/inputstaff/{location}/{id?}', 'CalculatorController@inputstaff');
	//store
	Route::post('/outlet/store', 'CalculatorController@calculator');
	Route::post('/outlet/storedrive', 'CalculatorController@calculatordriver');
	Route::post('/outlet/storestaff', 'CalculatorController@calculatorstaff');
	

	//edit
	Route::get('/outlet/editstaff/{id}', 'CalculatorController@updatestaff');
	Route::get('/outlet/editdriver/{id}', 'CalculatorController@updatedriver');
	Route::get('/outlet/editm/{id}', 'CalculatorController@updatebowner');
	//update
	Route::post('/outlet/storeedit', 'CalculatorController@upd');
	Route::post('/outlet/storeeditdriver/{id}', 'CalculatorController@upddriver');
	Route::post('/outlet/storeeditstaff/{id}', 'CalculatorController@updstaff');


	//Route::get('calculator.store', 'CalculatorController@store');
	Route::get('/outlet/tamp', 'CalculatorController@tamp');
	Route::get('/outlet/tampdrive', 'CalculatorController@tampdrive');
	Route::get('/outlet/tampstaff', 'CalculatorController@tampstaff');

	
	//perfomance
	Route::get('/outlet/choice/{location?}', 'CalculatorController@choice');
	

	Route::get('/calculator/cari', 'CalculatorController@cari');
	Route::get('/calculator/caristaff', 'CalculatorController@caristaff');
	Route::get('/calculator/caridriver', 'CalculatorController@caridriver');

	Route::post('/import_excel/import', 'CustomerController@import');

});


// HRD middleware
Route::group(['middleware'=>'HRD', 'as' => 'HRD.'], function(){
	Route::get('/HRD', function(){
			return view('bowner.index');
		});	

	Route::get('/HRD/humans/resign/{id}', 'BownerHumansController@resign');
	Route::resource('/HRD/humans', 'BownerHumansController');
	Route::resource('/HRD/leaves', 'LeavesController');

	
	Route::get('/HRD/calculator/inputhead', 'CalculatorController@index');
	Route::get('/HRD/calculator/inputdriver', 'CalculatorController@inputdriver');
	Route::get('/HRD/calculator/inputstaff', 'CalculatorController@inputstaff');
	

	Route::post('/HRD/calculator/storestaff', 'CalculatorController@calculatorstaff');
	Route::post('/HRD/calculator/store', 'CalculatorController@calculator');
	Route::post('/HRD/calculator/storedrive', 'CalculatorController@calculatordriver');
	//Route::get('calculator.store', 'CalculatorController@store');

	Route::get('/HRD/calculator/tamp', 'CalculatorController@tamp');
	Route::get('/HRD/calculator/tampdrive', 'CalculatorController@tampdrive');
	Route::get('/HRD/calculator/tampstaff', 'CalculatorController@tampstaff');
	
	Route::get('/HRD/calculator/choice/{location?}', 'CalculatorController@choice');

	
	Route::get('/HRD/calculator/cari', 'CalculatorController@cari');
	Route::get('/caristaff', 'CalculatorController@caristaff');
	Route::get('/HRD/calculator/caridriver', 'CalculatorController@caridriver');
	
});

Route::get('/import_excel', 'ImportExcelController@index');	//update import by trison
Route::post('/import_excel/import', 'ImportExcelController@import');	//update import by trison
Route::get('/export_excel/excel', 'ExportController@excel')->name('export_excel.excel');	//update import by trison

