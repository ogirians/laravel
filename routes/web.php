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
	Route::get('/bowner/humans/print', 'BownerHumansController@print');
	Route::get('/bowner/export_excel/excelkaryawan', 'ExportEmployeeController@excelkaryawan')->name('bowner.export_excel.excelkaryawan');
	Route::resource('/bowner/humans', 'BownerHumansController');
	
	//update password
	Route::resource('/bowner/users', 'PasswordController', ['only'=>['edit', 'update']]);
	

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
	//Route import used by bowner
	Route::get('bowner/import_excel', 'ImportExcelController@index');	//update import by trison
	Route::post('bowner/import_excel/import', 'ImportExcelController@import');	//update import by trison
	Route::get('bowner/export_excel/excel', 'ExportController@excel')->name('export_excel.excel');	//update import by trison
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


	// Calculater Route
	Route::get('/calculator', 'CalculatorController@index');
		//input
	Route::get('/bowner/inputhead/{location}/{id?}', 'CalculatorController@inputhead');
		//store
	Route::post('/bowner/storehead', 'CalculatorController@calculator');
		//edit
	Route::get('bowner/edithead/{id}', 'CalculatorController@edithead');
		//update
	Route::post('/bowner/storeedithead/{id}', 'CalculatorController@updhead');

	//choice
	Route::get('/calculator/choice/{location?}', 'CalculatorController@choice');

	Route::get('/bowner/calculator/detail/{id}/{calcid}', 'CalculatorController@detail');



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



//outlet middleware
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
	//see detail


	//input
	Route::get('/outlet/inputdriver/{location}/{id?}', 'CalculatorController@inputdriver');
	Route::get('/outlet/inputstaff/{location}/{id?}', 'CalculatorController@inputstaff');
	Route::get('/outlet/inputhead/{location}/{id?}', 'CalculatorController@inputhead');

	//store
	Route::post('/outlet/storedrive', 'CalculatorController@calculatordriver');
	Route::post('/outlet/storestaff', 'CalculatorController@calculatorstaff');
	Route::post('/outlet/storehead', 'CalculatorController@calculator');

	Route::get('/outlet/detail/{id}/{calcid}', 'CalculatorController@detail');


		//update
	
	//edit
	Route::get('/outlet/editstaff/{id}', 'CalculatorController@updatestaff');
	Route::get('/outlet/editdriver/{id}', 'CalculatorController@updatedriver');
	Route::get('/outlet/edithead/{id}', 'CalculatorController@edithead');
	//update
	Route::post('/outlet/storeeditdriver/{id}', 'CalculatorController@upddriver');
	Route::post('/outlet/storeeditstaff/{id}', 'CalculatorController@updstaff');
	Route::post('/outlet/storeedithead/{id}', 'CalculatorController@updhead');
	//perfomance
	Route::get('/outlet/choice/{location?}', 'CalculatorController@choice');

	Route::post('/import_excel/import', 'CustomerController@import');
	
	//update password
	Route::resource('/outlet/users', 'OPassController', ['only'=>['edit', 'update']]);

});


// HRD middleware
Route::group(['middleware'=>'HRD', 'as' => 'HRD.'], function(){
	Route::get('/HRD', function(){
			return view('bowner.index');
		});	
	//humans route
	Route::post('/HRD/humans/resign', 'BownerHumansController@resign');
	Route::resource('/HRD/humans', 'BownerHumansController');
	Route::resource('/HRD/leaves', 'LeavesController');
	Route::get('/HRD/export_excel/excelkaryawan', 'ExportEmployeeController@excelkaryawan')->name('bowner.export_excel.excelkaryawan');

	//perfomances
	Route::get('/HRD/calculator/choice/{location?}', 'CalculatorController@choice');
	Route::get('/HRD/calculator/delete/{id}/{calcid}', 'CalculatorController@destroy');

	//see detail
	Route::get('/HRD/calculator/detail/{id}/{calcid}', 'CalculatorController@detail');
	Route::get('/HRD/listnilaipdf/{location?}', 'choicePdfGenerateController@cetak_pdf');
	
	//update password
	Route::resource('/HRD/users', 'HPassController', ['only'=>['edit', 'update']]);
	
});



	
	Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');

	//export choice
	Route::get('/listnilaipdf/{location?}', 'choicePdfGenerateController@cetak_pdf');
	
	Route::get('/staffnilaipdf/{id?}/{calcid?}', 'choicePdfGenerateController@staffcetak_pdf');
	Route::get('/drivernilaipdf/{id?}/{calcid?}', 'choicePdfGenerateController@drivercetak_pdf');
	Route::get('/headnilaipdf/{id?}/{calcid?}', 'choicePdfGenerateController@headcetak_pdf');
	


//DM route updated by trison
Route::group(['middleware'=>'DM', 'as' => 'DM.'], function(){
	Route::get('/DM', 'CustomerController@index');
	Route::get('/DM/create', 'CustomerController@create');
	Route::post('/DM/create/store', 'CustomerController@store');
	Route::get('/DM/edit/{id}', 'CustomerController@edit');
	Route::patch('/DM/update/{id}', 'CustomerController@update');
	Route::delete('/DM/delete/{id}', 'CustomerController@destroy');
	Route::get('DM/import_excel', 'ImportExcelController@index');
	Route::post('DM/import_excel/import', 'ImportExcelController@import');
	Route::get('DM/export_excel/excel', 'ExportController@excel')->name('export_excel.excel');

	//route roofcalc
	Route::get('/DM/rc', 'CusRoofingController@index');
	Route::get('/DM/rc/sc/{id}', 'CusRoofingController@edit');
	Route::post('/DM/rc/sc/update', 'CusRoofingController@update');

	
	//update password
	Route::resource('/DM/users', 'DPassController', ['only'=>['edit', 'update']]);
});


//punya bambang intan
Route::get('/BFM', 'MasalahController@frontindex');
Route::get('/detail/{no}', 'MasalahController@detail');

//punya emil

Route::get('/berita', 'Sheet1Controller@frontindex');
Route::get('/berita/{outlet}','Sheet1Controller@pelaku2');

Route::get('/beritanp','NpController@frontindexnp');
Route::get('/beritanp/{outlet}','NpController@pelakunp2');
Route::get('/all','Sheet1Controller@beritaall');


//BFM migrate route

Route::group(['middleware'=>'FM', 'as' => 'FM.'], function(){
    //Pajak
    
	Route::get('/FM','Sheet1Controller@dashboard');
	
    Route::get('/dosa', 'Sheet1Controller@index');
    Route::get('/master', 'Sheet1Controller@master');
    Route::get('/dosa/tambah','Sheet1Controller@tambah');
    Route::post('/dosa/store','Sheet1Controller@store');
    Route::get('/dosa/edit/{no}','Sheet1Controller@edit');
    Route::post('/dosa/update','Sheet1Controller@update');
    Route::get('/dosa/delete/{no}','Sheet1Controller@delete');
    Route::get('/dosa/cari', 'Sheet1Controller@cari');
    
    Route::get('/dosa/stats', 'Sheet1Controller@instats');
    Route::get('/dosa/storedate','Sheet1Controller@storedate');
    
    Route::get('/dosa/filter', 'Sheet1Controller@parah');
    Route::get('/dosa/filter/{start?}/{end?}/{pos?}','Sheet1Controller@filter');
    Route::get('/dosa/{outlet}','Sheet1Controller@pelaku');
    
    
    
    //nonPajak
     Route::get('/dosanp', 'NpController@index');
    Route::get('/master', 'NpController@master');
    Route::get('/dosanp/tambah','NpController@tambah');
    Route::post('/dosanp/store','NpController@store');
    Route::get('/dosanp/edit/{no}','NpController@edit');
    Route::post('/dosanp/update','NpController@update');
    
    Route::get('/dosanp/delete/{no}','NpController@delete');
    Route::get('/dosanp/filter','NpController@parah');
    Route::get('/dosanp/filter/{start?}/{end?}/{pos?}','NpController@filter');
    
    Route::get('/dosanp/statsnp', 'NpController@instatsnp');
    Route::get('/dosanp/{outlet}','NpController@pelakunp');
    
     //SO
    Route::get('/master', 'SoController@master');
    Route::get('/so', 'SoController@index');
    Route::get('/so/tambah','SoController@tambah');
    Route::post('/so/store','SoController@store');
    Route::get('/so/edit/{no}','SoController@edit');
    Route::post('/so/update','SoController@update');
    
    Route::get('/so/delete/{no}','SoController@delete');
    Route::get('/so/filter','SoController@parah');
    Route::get('/so/filter/{start?}/{end?}/{pos?}','SoController@filter');
    
    Route::get('/so/statsnp', 'SoController@instatsnp');
    Route::get('/so/{outlet}','SoController@pelakunp');
    
	

});


Route::group(['middleware'=>'EDP', 'as' => 'EDP.'], function(){
    
    
    Route::get('/detailin/{no}', 'MasalahController@detailin');
    Route::get('/EDP', 'MasalahController@index');
    Route::get('/master', 'MasalahController@master');
    Route::get('/bfm/tambah','MasalahController@tambah');
    Route::post('/bfm/store','MasalahController@store');
    Route::get('/bfm/edit/{no}','MasalahController@edit');
    Route::post('/bfm/update','MasalahController@update');
    Route::get('/bfm/delete/{no}','MasalahController@delete');
    Route::get('/bfm/cari', 'MasalahController@cari');

});


