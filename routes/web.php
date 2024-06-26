<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('not-found');
});

Route::controller(\App\Http\Controllers\LoginAdminController::class)->group(
    function (){
        Route::get("/login/admin", "login")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-admin");
        Route::post("/login/admin", "doLogin")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class])->name("login-admin");
        Route::post("/logout/admin", "logout")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("logout-admin");
    }
);

Route::controller(\App\Http\Controllers\ListGuruController::class)->group(
    function (){
        Route::get("/data/guru", "guru")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("data-guru");
        Route::get("/data/guru/{id}", "edit")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("edit-data-guru");
        Route::post("/data/guru/detail/{id}", "editData")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("edit-detail-data-guru");
    }
);

Route::controller(\App\Http\Controllers\ListSiswaController::class)->group(
    function (){
        Route::get("/data/kelas", "kelas")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("data-kelas");
        Route::get("/data/siswa/{kelasId}", "siswa")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("data-siswa");
        Route::get("/data/edit/siswa/{id}", "edit")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("edit-data-siswa");
        Route::post("/data/edit/detail/siswa/{id}", "editData")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("edit-detail-data-siswa");
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

Route::controller(\App\Http\Controllers\ProfilSiswaController::class)->group(
    function (){
        Route::get("/profile/siswa/{id}", "index")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("profile-siswa");
        Route::post("/profile/edit/siswa/{id}", "editData")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("edit-profile-siswa");
    }
);

Route::controller(\App\Http\Controllers\ProfilGuruController::class)->group(
    function (){
        Route::get("/profile/guru/{id}", "index")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("profile-guru");
        Route::post("/profile/edit/guru/{id}", "editData")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-profile-guru");
    }
);

Route::controller(\App\Http\Controllers\DashboardGuruController::class)->group(
    function (){
        Route::get("/dashboard/guru/{id}", "index")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("dashboard-guru");
    }
);

Route::controller(\App\Http\Controllers\JadwalController::class)->group(
    function (){
        Route::get("/penjadwalan/siswa/{siswaId}/{kelasId}", "siswa")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("jadwal-siswa");
        Route::get("/penjadwalan/guru/{guruId}", "guru")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("jadwal-guru");
    }
);

Route::controller(\App\Http\Controllers\DashboardAdminController::class)->group(
    function (){
        Route::get("/dashboard/admin", "index")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("dashboard-admin");
        Route::delete("/dashboard/delete/e-learning", "deleteAllData")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("delete-e-learning");
    }
);

Route::controller(\App\Http\Controllers\TutorialController::class)->group(
    function (){
        Route::get("/tutorial/admin", "admin")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("tutorial-admin");
        Route::get("/tutorial/guru/{id}", "guru")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("tutorial-guru");
        Route::get("/tutorial/siswa/{id}", "siswa")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("tutorial-siswa");
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
        Route::post("/courses/{mapelId}/detail/read/material/{materiId}/siswa/{siswaId}", "isRead")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("detail-read-siswa-material");
    }
);

Route::controller(\App\Http\Controllers\TugasGuruController::class)->group(
    function (){
        Route::get("/courses/assignment/{mapelId}/guru/{guruId}", "tugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-assignment");
        Route::get("/courses/add/assignment/{mapelId}/guru/{guruId}", "add")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-guru-assignment");
        Route::post("/courses/add/assignment/{mapelId}/guru/{guruId}", "addDataTugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-guru-data-assignment");
        Route::get("/courses/{mapelId}/assignment/{tugasId}/guru/{guruId}", "detailTugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-guru-assignment");
        Route::get("/courses/{mapelId}/nilai/assignment/{tugasId}/guru/{guruId}", "downloadNilai")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-nilai-guru-assignment");
        Route::get("/courses/{mapelId}/edit/assignment/{tugasId}/guru/{guruId}", "edit")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-assignment");
        Route::post("/courses/{mapelId}/edit/assignment/{tugasId}/guru/{guruId}", "editDataTugas")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-data-assignment");
        Route::delete("/courses/{mapelId}/delete/assignment/{tugasId}/guru/{guruId}", "delete")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("delete-guru-data-assignment");
        Route::get("/courses/{mapelId}/detail/{tugasId}/assignment/{pengerjaanTugasId}/guru/{guruId}", "pengerjaanDetail")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-penilaian-guru-assignment");
        Route::post("/courses/{mapelId}/detail/post/{tugasId}/assignment/{pengerjaanTugasId}/guru/{guruId}", "addNilaiSiswa")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("add-penilaian-guru-assignment");
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

Route::controller(\App\Http\Controllers\UjianGuruController::class)->group(
    function (){
        Route::get("/courses/examination/{mapelId}/guru/{guruId}", "ujian")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-examination");
        Route::get("/courses/add/essay/examination/{mapelId}/guru/{guruId}", "addEssai")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-add-essay");
        Route::post("/courses/add/data/essay/examination/{mapelId}/guru/{guruId}", "addDataEssai")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("course-guru-add-data-essai");
        Route::get("/courses/detail/{mapelId}/examination/{ujianId}/guru/{guruId}", "detailUjian")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-guru-examination");
        Route::get("/courses/{mapelId}/nilai/examination/{ujianId}/guru/{guruId}", "downloadNilai")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-nilai-guru-examination");
        Route::get("/courses/{mapelId}/edit/examination/{ujianId}/guru/{guruId}", "edit")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-examination");
        Route::post("/courses/{mapelId}/edit/examination/{ujianId}/guru/{guruId}", "editDataUjian")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("edit-guru-data-examination");
        Route::delete("/courses/{mapelId}/delete/examination/{ujianId}/guru/{guruId}", "delete")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("delete-guru-data-examination");
        Route::get("/courses/{mapelId}/penilaian/{ujianId}/examination/{pengerjaanSiswaId}/guru/{guruId}", "detailPengerjaanSiswa")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-penilaian-examination");
        Route::post("/courses/{mapelId}/add/penilaian/{ujianId}/examination/{pengerjaanSiswaId}/guru/{guruId}", "addDataNilai")->middleware([\App\Http\Middleware\OnlyTeacherMiddleware::class])->name("detail-add-penilaian-examination");
    }
);

Route::controller(\App\Http\Controllers\UjianSiswaController::class)->group(
    function (){
        Route::get("/courses/examination/{mapelId}/siswa/{siswaId}", "ujian")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("course-siswa-examination");
        Route::get("/courses/{mapelId}/detail/examination/{pengerjaanUjianId}/siswa/{siswaId}", "detail")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("detail-siswa-examination");
        Route::get("/courses/{mapelId}/detail/penilaian/examination/{ujianId}/siswa/{siswaId}", "penilaian")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("detail-penilaian-siswa-examination");
        Route::get("/courses/{mapelId}/detail/begin/examination/{ujianId}/siswa/{siswaId}", "beginExam")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("begin-siswa-examination");
        Route::post("/courses/{mapelId}/assign/{pengerjaanSiswaId}/examination/{ujianId}/siswa/{siswaId}", "assignExam")->middleware([\App\Http\Middleware\OnlyStudentMiddleware::class])->name("assign-siswa-examination");
    }
);
