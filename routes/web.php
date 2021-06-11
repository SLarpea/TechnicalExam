<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactInformationController;

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
    return view('welcome');
});

Route::resource('contact_informations', ContactInformationController::class);
Route::get('contact_infomations/import', [ContactInformationController::class, 'import'])->name('contact_informations.import');
Route::post('contact_infomations/import_file', [ContactInformationController::class, 'import_file'])->name('contact_informations.import_file');
