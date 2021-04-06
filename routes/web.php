<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Class_StudentController;
use App\Http\Controllers\classhome;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClassController;
use App\Models\student;
use App\Models\Classmodel;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('hoten/{ten}', function ($ten) {
//     echo "ten cua ban la :".$ten;
// })->where(['ten'=>'[0-9]+']);

//  Route::get('route',['as'=>'myroute',function(){
//     echo "xin chao cac bajn";
//  }]);

//  Route::get('thehell',function(){
//     return redirect()->route('myroute');
//  });

// Route::get('route',function(){
//     echo "chon cai lao`";
//  })->name('myroute');

// Route::get('thehell',function(){
//     return redirect()->route('myroute');
// });

//  Route::group(['prefix'=>'Mygroup'],function(){
//     Route::get('user1',function(){
//         return "chi la cuc cuc user1";
//     });
//     Route::get('user2',function(){
//         return "chi la cuc cuc user2";
//     });
//     Route::get('user4',function(){
//         return "chi la cuc cuc user3";
//     });
//  });

// Route::get('/dat', [DatproController::class,'datdeptrai']);
// Route::get('/getform',function(){
//     return view('kiemtra');
// });
// Route::post('postform', [DatproController::class,'setcookie'])->name('postform');
// Route::get('getuot', [DatproController::class,'getcookie']);


// Route::get('home', function () {
//     return response($content)
//     ->header('Content-Type', $type)
//     ->cookie('name', 'value', $minutes);
// });
// Route::get('home1', function () {
//     echo "Hello World";
// });

// Route::get('aaa', function () {
//     return view('pages.home');
// })->name('home');
// Route::get('home/create', function () {
//     return view('pages.add');
// })->name('add');
// Route::get('cratetable', function () {
//     schema::create('informat');
// });


 Route::group(['prefix'=>'Mygroup'],function(){
    
 });


Route::Resource('/home', StudentController::class)->middleware('Checkloguot');
Route::Resource('/classhome', Class_StudentController::class)->middleware('Checkloguot');
Route::Resource('/class', ClassController::class)->middleware('Checkloguot');
Route::get('/cancel/{id}/{classid}', [classhome::class,'cancelregister'])->name('cancel')->middleware('Checkloguot');
// Route::get('/', function () {
//     return view('pages.login');
// })->name('login');

Route::get('/', [LoginController::class,'login'])->name('login')->middleware('Checkuser');




Route::get('/register', [LoginController::class,'register'])->name('register');
Route::post('/postregister', [LoginController::class,'postregister'])->name('postregister');
Route::get('/loguot', [LoginController::class,'loguot'])->name('loguot');
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');


Route::get('/them', function () {
    $shop = Classmodel::all()->where('id', '=', 2);
    //insert
    // $shop->classmodel()->attach(3);

    //$shop->classmodel()->syncWithoutDetaching([2, 3]);
    //update
    //$shop->classmodel()->sync([2]);
    //delete
    //$shop->products()->detach(1);
    foreach ($shop as $product) {
        echo $product->classname;
        foreach ($product->Student as $product) {
            echo "-".$product->hoten."<br>";
        }
    }
});

// Route::get('/lass', function () {
//     return view('pages.addclass');
// })->name('mgclass');