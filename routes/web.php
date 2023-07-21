<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateUser;

Route::get('/', function () {
    return view('index');
});
Route::post('/གནང་འཛུལ', [App\Http\Controllers\login\LoginController::class, 'གནང་འཛུལ'])->name('གནང་འཛུལ');
Route::get('/ཕྱི་མཐོན', [App\Http\Controllers\login\LoginController::class, 'ཕྱི་མཐོན'])->name('ཕྱི་མཐོན');
Route::group(['middleware' => [ValidateUser::class, 'validate']], function () {
    Route::get('/སྟོན་སྟེགས', [App\Http\Controllers\login\LoginController::class, 'སྟོན་སྟེགས'])->name('སྟོན་སྟེགས');
    Route::get('/profile', [App\Http\Controllers\login\LoginController::class, 'profile'])->name('profile');
    Route::get('/password_change', [App\Http\Controllers\login\LoginController::class, 'password_change'])->name('password_change');
    Route::get('/validate_password/{curr_pass}', [App\Http\Controllers\login\LoginController::class, 'validate_password'])->name('validate_password');
    Route::post('/update_user_password', [App\Http\Controllers\login\LoginController::class, 'update_user_password'])->name('update_user_password');
    Route::prefix('བདག་སྐྱོང')->group(function () {
        Route::get('/ལག་ལེན་པའི་རྒྱས', [App\Http\Controllers\administration\AdministrationController::class, 'ལག་ལེན་པའི་རྒྱས']);
        Route::post('/བཏོག༌གཏང', [App\Http\Controllers\administration\AdministrationController::class, 'བཏོག༌གཏང']);
        Route::post('/ལག་ལེན་པ་གསརཔ', [App\Http\Controllers\administration\AdministrationController::class, 'ལག་ལེན་པ་གསརཔ']);
        Route::get('/དགེ་སློང་ཐོ་བཀོད', [App\Http\Controllers\administration\AdministrationController::class, 'དགེ་སློང་ཐོ་བཀོད']);
        Route::post('/དགེ་སློང་གི་ཐོ་ཡིག་གསརཔ', [App\Http\Controllers\administration\AdministrationController::class, 'དགེ་སློང་གི་ཐོ་ཡིག་གསརཔ']);
        Route::post('/དགེ་སློང་གི་ཐོ་ཡིགབཏོག༌གཏང', [App\Http\Controllers\administration\AdministrationController::class, 'དགེ་སློང་གི་ཐོ་ཡིགབཏོག༌གཏང']);
        Route::get('/ཐོ་བཀོད་འཚོལ/{param}', [App\Http\Controllers\administration\AdministrationController::class, 'ཐོ་བཀོད་འཚོལ']);
        Route::get('/ཐོ་བཀོད་འཚོལ་ནི', [App\Http\Controllers\administration\AdministrationController::class, 'ཐོ་བཀོད་འཚོལ་ནི']);
    });
});
Route::get('/symlink', [App\Http\Controllers\login\LoginController::class, 'symlink'])->name('symlink');
Route::get('/viewFiles', [App\Http\Controllers\login\LoginController::class, 'viewFiles'])->name('viewFiles');