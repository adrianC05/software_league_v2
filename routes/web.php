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

Route::get('/', [Controller::class, 'versus']);

// Descargar PDF de equipos
Route::get('generate-teams-pdf', [App\Http\Controllers\PDFController::class, 'generateTeamsPDF'])->name('generatePDF');

// Descargar PDF de jugadores
Route::get('generate-players-pdf', [App\Http\Controllers\PDFController::class, 'generatePlayersPDF'])->name('generatePlayersPDF');

// Descargar PDF de tabla de posiciones
Route::get('generate-positions-pdf', [App\Http\Controllers\PDFController::class, 'generatePositionsPDF'])->name('generatePositionsPDF');

// Descargar PDF de ingresos
Route::get('generate-income-pdf', [App\Http\Controllers\PDFController::class, 'generateIncomePDF'])->name('generateIncomePDF');

// Descargar PDF de gastos
Route::get('generate-expenses-pdf', [App\Http\Controllers\PDFController::class, 'generateExpensesPDF'])->name('generateExpensesPDF');
