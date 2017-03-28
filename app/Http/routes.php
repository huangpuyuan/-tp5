<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('basic1',function (){
   return  'hello world';
});

Route::post('basic2',function (){
   return 'basic2';
});

//多请求路由
Route::match(['get','post'],'multy1',function (){
   return 'multy1';
});

Route::any('multy2',function(){
   return 'mutly2';
});

//路由参数的配置
//Route::get('user/{id}',function($id){
//    return 'User-id'.$id;
//});

//Route::get('user/{name?}',function($name=null){
//    return 'User-'.$name;
//});

//Route::get('user/{name?}',function($name='kaitai'){
//    return 'User-name'.$name;
//});
//正则表达式
//Route::get('user/{name?}',function($name='kaitai'){
//    return 'User-name-'.$name;
//})->where('name','[A-Za-z]+');

//多个字段
//Route::get('user/{id}/{name?}',function($id,$name='kaitai'){
//    return 'User-id-'.$id.'-name-'.$name;
//})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);


//路由别名
//Route::get('user/center',['as'=>'center',function (){
//    return route('center');
//}]);


// 6. 路由群组
Route::group(['prefix'=>'member'],function (){
    Route::get('user/center',['as'=>'center',function (){
        return route('center');
    }]);

    Route::any('multy2',function(){
        return 'member-mutly2';
    });
});
//路由中输出视图
Route::get('view',function (){
   return view('welcome');
});

//Route::get('member/info','MemberController@info');

//Route::get('member/info',[
//    'uses'=>'MemberController@info',
//    'as'=>'memberinfo'
//]);

Route::any('member/{id}',[
    'uses' => 'MemberController@info'
])->where('id','[0-9]+');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
