<?php

use App\Http\Controllers\AbsensiMemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JamController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KloterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CariMemberController;

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

Route::group(
    ['namespace' => 'App\Http\Controllers'],
    function () {
        Route::controller(AbsensiMemberController::class)->group(function () {
            Route::get('absensimember', 'index');
            Route::get('autocomplete', 'autocomplete')->name('autocomplete');
        });
        Route::get('/', [KloterController::class, 'home']);
        Route::get('/cari', [CariMemberController::class, 'index']);
        Route::get('/cari/autocomplete-search', [CariMemberController::class, 'autocompleteSearch']);
        Route::group(
            ['middleware' => ['guest']],
            function () {
                /**
                 * Register Routes
                 */
                Route::get('/register', 'RegisterController@show')->name('register.show');
                Route::post('/register', 'RegisterController@register')->name('register.perform');

                /**
                 * Login Routes
                 */
                Route::get('/login', 'LoginController@show')->name('login.show');
                Route::post('/login', 'LoginController@login')->name('login.perform');
            }
        );

        Route::group(
            ['middleware' => ['auth']],
            function () {
                /**
                 * Logout Routes
                 */
                Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

                Route::resource('jams', JamController::class);

                Route::get('/tutors/file-export/', [TutorController::class, 'fileExport']);
                Route::resource('tutors', TutorController::class);
                Route::post('/tutors/file-import', [TutorController::class, 'fileImport'])->name('tutors-file-import');
                Route::post('/tutors/delete-all-data', [TutorController::class, 'deleteAllData'])->name('tutors-delete-all-data');

                Route::get('/subjects/file-export/', [SubjectController::class, 'fileExport']);
                Route::resource('subjects', SubjectController::class);
                Route::post('/subjects/file-import', [SubjectController::class, 'fileImport'])->name('subjects-file-import');
                Route::post('/subjects/delete-all-data', [SubjectController::class, 'deleteAllData'])->name('subjects-delete-all-data');

                Route::get('/ruangans/file-export/', [RuanganController::class, 'fileExport']);
                Route::resource('ruangans', RuanganController::class);
                Route::post('/ruangans/file-import', [RuanganController::class, 'fileImport'])->name('ruangans-file-import');
                Route::post('/ruangans/delete-all-data', [RuanganController::class, 'deleteAllData'])->name('ruangans-delete-all-data');

                Route::resource('kloters', KloterController::class);
                Route::post('/kloters/delete-all-data', [KloterController::class, 'deleteAllData'])->name('kloters-delete-all-data');

                Route::get('/members/file-export/', [MemberController::class, 'fileExport']);
                Route::resource('members', MemberController::class);

                Route::get('/members/file-import-export', [MemberController::class, 'fileImportExport']);
                Route::post('/members/file-import', [MemberController::class, 'fileImport'])->name('file-import');
                Route::post('/members/delete-all-data', [MemberController::class, 'deleteAllData'])->name('delete-all-data');
            }
        );
    }
);
