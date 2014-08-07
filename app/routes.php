
<?php
 
 
Route::group(array('before'=>'user'),function(){
    
   Route::any('login',array(
        'as'=>'login',
        'uses'=>'UserController@login'
        ));
      Route::any('logout',array(
        'as'=>'logout',
        'uses'=>'UserController@logout'
        ));
});
Route::any('testcam',function(){
	return View::make('testcam');
});

Route::group(array('prefix'=>'unit'),function(){
		Route::any('/',array(
			'as'=>'unit',
			'uses'=>'UnitController@index'
			));
		Route::get('delete/{id}',array(
			'as'=>'delete/unit',
			'uses'=>'UnitController@delete'
			));
});

Route::group(array('prefix'=>'fixstock'),function(){
		Route::any('/',array(
			'as'=>'fixstock',
			'uses'=>'FixstockController@index'
			));
		Route::get('delete/{id}',array(
			'as'=>'delete/fixstock',
			'uses'=>'FixstockController@delete'
			));
});
Route::group(array('prefix'=>'product'),function(){
		Route::any('/',array(
			'as'=>'product',
			'uses'=>'ProductController@index'
			));
		Route::get('delete/{id}',array(
			'as'=>'delete/product',
			'uses'=>'ProductController@delete'
			));
});
Route::group(array('prefix'=>'user'),function(){
		Route::any('/',array(
			'as'=>'user',
			'uses'=>'UserController@index'
			));
		Route::get('delete/{id}',array(
			'as'=>'delete/user',
			'uses'=>'UserController@delete'
			));
});