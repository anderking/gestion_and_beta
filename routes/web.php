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


Route::group(['prefix' => 'administrador','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'AdministradorController@index',
		'as' => 'administrador'
	]);
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
	Route::resource('reportedocumentos', 'ReporteDocumentosController');
	Route::get('reportedocumentospdf', 'ReporteDocumentosController@pdf')->name('reportedocumentospdf');
	Route::get('reportedocumentosexcel', 'ReporteDocumentosController@excel')->name('reportedocumentosexcel');
	Route::resource('reporteprogramas', 'ReporteProgramasController');
	Route::get('reporteprogramaspdf', 'ReporteProgramasController@pdf')->name('reporteprogramaspdf');
	Route::get('reporteprogramasexcel', 'ReporteProgramasController@excel')->name('reporteprogramasexcel');
	Route::resource('reporteservicios', 'ReporteServiciosController');
	Route::get('reporteserviciospdf', 'ReporteServiciosController@pdf')->name('reporteserviciospdf');
	Route::get('reporteserviciosexcel', 'ReporteServiciosController@excel')->name('reporteserviciosexcel');
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
});

Route::group(['prefix' => 'secretario','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'SecretarioController@index',
		'as' => 'secretario'
	]);
});

Route::group(['prefix' => 'encargadoserv','middleware' => ['auth']], function () {
	Route::get('/',[
		'uses'=> 'EncargadoServicioController@index',
		'as' => 'encargadoserv'
	]);
});

Route::resource('user', 'UserController')->middleware('auth');
Route::resource('solicitud','SolicitudController')->middleware('auth');
Route::resource('programa','SolicitudProgramaController')->middleware('auth');
Route::resource('solicitudservicio', 'SolicitudServiciosController');
Route::resource('sugerencia','SugerenciaController')->middleware('auth');

Route::get('sendmail', function (Request $request){
	$request = [
		"name" => "dasd",
	];

	Mail::send('solicitud.email.email',$request,function($message){
		$message->from('anderson.inversiones.2017@gmail.com','UCLA');
		$message->to('anderson.inversiones.2017@gmail.com')->subject('Solicitud de documentos UCLA');
	});

	return "Email Enviado";
    
});

