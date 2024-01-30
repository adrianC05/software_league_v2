<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/descargar-pdf', function () {
    $archivoPdf = public_path('descargas/protocolo_software_league.pdf');
    return response()->download($archivoPdf, 'Protocolo_software_league.pdf');
});
Route::get('/descargar1-pdf', function () {
    $archivoPdf = public_path('descargas/Plantillas.pdf');
    return response()->download($archivoPdf, 'Plantilla de incripción.pdf');
});
Route::get('/', [Controller::class, 'mostrarGoleadores']);