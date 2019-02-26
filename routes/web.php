<?php
use Illuminate\Http\Request;
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
Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'estudiante','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'EstudianteController@index',
		'as' => 'estudiante'
	]);
});

Route::group(['prefix' => 'directoradm','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'DirectorAdministrativoController@index',
		'as' => 'directoradm'
	]);
	Route::resource('precioDocumentos', 'PrecioDocumentoController');
	Route::resource('precioProgramas', 'PrecioProgramaController');
});

Route::group(['prefix' => 'directorpro','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'DirectorProgramaController@index',
		'as' => 'directorpro'
	]);
});

Route::group(['prefix' => 'docente','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'DocenteController@index',
		'as' => 'docente'
	]);
	Route::resource('solicitudservicio', 'SolicitudServiciosController');
});

Route::group(['prefix' => 'secretario','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'SecretarioController@index',
		'as' => 'secretario'
	]);
});

Route::resource('user', 'UserController')->middleware('auth');
Route::resource('programa','SolicitudProgramaController')->middleware('auth');
Route::resource('solicitud','SolicitudController')->middleware('auth');
Route::resource('sugerencia','SugerenciaController')->middleware('auth');

Route::get('mailable', function (Request $request)
{
    return new App\Mail\EmailSolicitud($request);
});

