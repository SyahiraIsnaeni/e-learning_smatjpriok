<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\LoginAdminController::class)->group(
    function (){
        Route::get("/login/admin", "login")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-admin");
        Route::post("/login/admin", "doLogin")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-admin");
        Route::post("/logout/admin", "logout")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("logout-admin");
    }
);

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

Route::controller(\App\Http\Controllers\DashboardAdminController::class)->group(
    function (){
        Route::get("/dashboard/admin", "index")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("dashboard-admin");
    }
);

Route::controller(\App\Http\Controllers\CourseSiswaController::class)->group(
    function (){
        Route::get("/courses/siswa/{id}", "index")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("course-siswa");
    }
);

Route::controller(\App\Http\Controllers\CourseDetailSiswaController::class)->group(
    function (){
        Route::get("/courses/detail/{mapelId}/siswa/{siswaId}", "index")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("course-siswa-detail");
    }
);

Route::controller(\App\Http\Controllers\CourseDetailGuruController::class)->group(
    function (){
        Route::get("/courses/detail/{mapelId}/guru/{guruId}", "index")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-detail");
    }
);

Route::controller(\App\Http\Controllers\MateriGuruController::class)->group(
    function (){
        Route::get("/courses/material/{mapelId}/guru/{guruId}", "materi")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-material");
        Route::get("/courses/add/material/{mapelId}/guru/{guruId}", "add")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-guru-material");
        Route::post("/courses/add/material/{mapelId}/guru/{guruId}", "addDataMateri")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-guru-data-material");
        Route::get("/courses/{mapelId}/material/{materiId}/guru/{guruId}", "detailMateri")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-guru-material");
        Route::get("/courses/{mapelId}/edit/material/{materiId}/guru/{guruId}", "edit")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-material");
        Route::post("/courses/{mapelId}/edit/material/{materiId}/guru/{guruId}", "editDataMateri")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-data-material");
        Route::delete("/courses/{mapelId}/delete/material/{materiId}/guru/{guruId}", "delete")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("delete-guru-data-material");
    }
);

Route::controller(\App\Http\Controllers\MateriSiswaController::class)->group(
    function (){
        Route::get("/courses/material/{mapelId}/siswa/{siswaId}", "materi")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("course-siswa-material");
        Route::get("/courses/{mapelId}/detail/material/{materiId}/siswa/{siswaId}", "detail")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("detail-siswa-material");
    }
);

Route::controller(\App\Http\Controllers\TugasGuruController::class)->group(
    function (){
        Route::get("/courses/assignment/{mapelId}/guru/{guruId}", "tugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-assignment");
        Route::get("/courses/add/assignment/{mapelId}/guru/{guruId}", "add")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-guru-assignment");
        Route::post("/courses/add/assignment/{mapelId}/guru/{guruId}", "addDataTugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-guru-data-assignment");
        Route::get("/courses/{mapelId}/assignment/{tugasId}/guru/{guruId}", "detailTugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-guru-assignment");
        Route::get("/courses/{mapelId}/edit/assignment/{tugasId}/guru/{guruId}", "edit")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-assignment");
        Route::post("/courses/{mapelId}/edit/assignment/{tugasId}/guru/{guruId}", "editDataTugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-data-assignment");
        Route::delete("/courses/{mapelId}/delete/assignment/{tugasId}/guru/{guruId}", "delete")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("delete-guru-data-assignment");
        Route::get("/courses/{mapelId}/detail/assignment/{tugasId}/guru/{guruId}", "pengerjaanDetail")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-penilaian-guru-assignment");
    }
);

Route::controller(\App\Http\Controllers\TugasSiswaController::class)->group(
    function (){
        Route::get("/courses/assignment/{mapelId}/siswa/{siswaId}", "tugas")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("course-siswa-assignment");
        Route::get("/courses/{mapelId}/detail/assignment/{pengerjaanTugasId}/siswa/{siswaId}", "detail")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("detail-siswa-assignment");
        Route::post("/courses/{mapelId}/detail/assignment/{pengerjaanTugasId}/siswa/{siswaId}", "addTugas")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("add-siswa-assignment");
        Route::delete("/courses/{mapelId}/detail/assignment/{pengerjaanTugasId}/siswa/{siswaId}", "deleteDokumen")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("delete-siswa-assignment");
    }
);
