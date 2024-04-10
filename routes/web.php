<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\LoginGuruController::class)->group(
    function (){
        Route::get("/login/guru", "login")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-guru");
        Route::post("/login/guru", "doLogin")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-guru");
        Route::post("/logout/guru", "logout")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("logout-guru");
    }
);

Route::controller(\App\Http\Controllers\LoginSiswaController::class)->group(
    function (){
        Route::get("/", "login")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-siswa");
        Route::post("/", "doLogin")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-siswa");
        Route::post("/logout/siswa", "logout")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("logout-siswa");
    }
);

Route::controller(\App\Http\Controllers\DashboardSiswaController::class)->group(
    function (){
        Route::get("/dashboard/siswa/{id}", "index")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("dashboard-siswa");
    }
);

Route::controller(\App\Http\Controllers\DashboardGuruController::class)->group(
    function (){
        Route::get("/dashboard/guru/{id}", "index")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("dashboard-guru");
    }
);
