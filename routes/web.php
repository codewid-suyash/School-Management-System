<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AssignSubjectToClassController;
use App\Http\Controllers\FeeStructureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssignTeacherToClassController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\UserController;
use PhpParser\Node\Expr\Assign;

Route::get('/', function () {
    return view('admin.login');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');

        // Academic Year Routes
        Route::get('academic-year/create', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
        Route::get('academic-year/read', [AcademicYearController::class, 'read'])->name('academic-year.read');
        Route::get('academic-year/delete/{id}', [AcademicYearController::class, 'destroy'])->name('academic-year.delete');
        Route::get('academic-year/edit/{id}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        Route::post('academic-year/update/{id}', [AcademicYearController::class, 'update'])->name('academic-year.update');

        // Classes Routes
        Route::get('class/create', [ClassesController::class, 'index'])->name('class.create');
        Route::post('class/store', [ClassesController::class, 'store'])->name('class.store');
        Route::get('class/read', [ClassesController::class, 'read'])->name('class.read');
        Route::get('class/delete/{id}', [ClassesController::class, 'destroy'])->name('class.delete');
        Route::get('class/edit/{id}', [ClassesController::class, 'edit'])->name('class.edit');
        Route::post('class/update/{id}', [ClassesController::class, 'update'])->name('class.update');

        // Fee-Head Routes
        Route::get('fee-head/create', [FeeHeadController::class, 'index'])->name('fee-head.create');
        Route::post('fee-head/store', [FeeHeadController::class, 'store'])->name('fee-head.store');
        Route::get('fee-head/read', [FeeHeadController::class, 'read'])->name('fee-head.read'); //index-list
        Route::get('fee-head/delete/{id}', [FeeHeadController::class, 'destroy'])->name('fee-head.delete');
        Route::get('fee-head/edit/{id}', [FeeHeadController::class, 'edit'])->name('fee-head.edit');
        Route::post('fee-head/update/{id}', [FeeHeadController::class, 'update'])->name('fee-head.update');

        //Fee Structure Routes
        Route::get('feestructure/create', [FeeStructureController::class, 'index'])->name('fee-structure.create');
        Route::post('feestructure/store', [FeeStructureController::class, 'store'])->name('fee-structure.store');
        Route::get('feestructure/read', [FeeStructureController::class, 'read'])->name('fee-structure.read'); //index-list
        Route::get('feestructure/delete/{id}', [FeeStructureController::class, 'destroy'])->name('fee-structure.delete');
        Route::get('feestructure/edit/{id}', [FeeStructureController::class, 'edit'])->name('fee-structure.edit');
        Route::post('feestructure/update/{id}', [FeeStructureController::class, 'update'])->name('fee-structure.update');

        //Student Routes
        Route::get('student/create', [StudentController::class, 'index'])->name('student.create');
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/read', [StudentController::class, 'read'])->name('student.read'); //index-list
        Route::get('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
        Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('student/update/{id}', [StudentController::class, 'update'])->name('student.update');

        //Announcement Routes
        Route::get('announcement/create', [AnnouncementController::class, 'index'])->name('announcement.create');
        Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
        Route::get('announcement/read', [AnnouncementController::class, 'read'])->name('announcement.read'); //index-list
        Route::get('announcement/delete/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.delete');
        Route::get('announcement/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
        Route::post('announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');

        //Subject Routes
        Route::get('subject/create', [SubjectController::class, 'index'])->name('subject.create');
        Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('subject/read', [SubjectController::class, 'read'])->name('subject.read'); //index-list
        Route::get('subject/delete/{id}', [SubjectController::class, 'destroy'])->name('subject.delete');
        Route::get('subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::post('subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');

        //assign subject to class
        Route::get('assign-subject/create', [AssignSubjectToClassController::class, 'index'])->name('assign-subject.create');
        Route::post('assign-subject/store', [AssignSubjectToClassController::class, 'store'])->name('assign-subject.store');
        Route::get('assign-subject/read', [AssignSubjectToClassController::class, 'read'])->name('assign-subject.read'); //index-list
        Route::get('assign-subject/delete/{id}', [AssignSubjectToClassController::class, 'destroy'])->name('assign-subject.delete');
        Route::get('assign-subject/edit/{id}', [AssignSubjectToClassController::class, 'edit'])->name('assign-subject.edit');
        Route::post('assign-subject/update/{id}', [AssignSubjectToClassController::class, 'update'])->name('assign-subject.update');


        //assign teacher to class
        Route::get('assign-teacher/create',[AssignTeacherToClassController::class,'index'])->name('assign-teacher.create');
        Route::post('assign-teacher/store',[AssignTeacherToClassController::class,'store'])->name('assign-teacher.store');
        Route::get('findsubject',[AssignTeacherToClassController::class,'findSubject'])->name('findSubject');
        Route::get('assign-teacher/read',[AssignTeacherToClassController::class,'read'])->name('assign-teacher.read');
        Route::get('assign-teacher/edit/{id}',[AssignTeacherToClassController::class,'edit'])->name('assign-teacher.edit');
        Route::post('assign-teacher/update/{id}',[AssignTeacherToClassController::class,'update'])->name('assign-teacher.update');
        Route::get('assign-teacher/delete/{id}',[AssignTeacherToClassController::class,'destroy'])->name('assign-teacher.delete');

        //teachers Routes
        Route::get('teacher/create', [TeacherController::class, 'index'])->name('teacher.create');
        Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('teacher/read', [TeacherController::class, 'read'])->name('teacher.read');
        Route::get('teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::post('teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::get('teacher/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');

        //timetable routes
        Route::get('timetable/create',[TimetableController::class,'index'])->name('timetable.create');
        Route::post('timetable/store',[TimetableController::class,'store'])->name('timetable.store');
        Route::get('timetable/read',[TimetableController::class,'read'])->name('timetable.read');
        Route::get('timetable/edit/{id}',[TimetableController::class,'edit'])->name('timetable.edit');
        Route::post('timetable/update/{id}',[TimetableController::class,'update'])->name('timetable.update');
        Route::get('timetable/delete/{id}',[TimetableController::class,'destroy'])->name('timetable.delete');
    });
});

//Student login /logout Routes

Route::group(['prefix' => 'student'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [UserController::class, 'login'])->name('student.login');
        Route::post('authenticate', [UserController::class, 'authenticate'])->name('student.authenticate');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('student.dashboard');
        Route::get('logout', [UserController::class, 'logout'])->name('student.logout');
        Route::get('change-password', [UserController::class, 'changePassword'])->name('student.change-password');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('student.update-password');
        Route::get('mysubject',[UserController::class,'mySubject'])->name('student.mysubject');
    });
});

//teacher login/logout routes

Route::group(['prefix' => 'teacher'],function(){
    Route::group(['middleware' => 'teacher.guest'], function(){
        Route::get('login',[TeacherController::class,'login'])->name('teacher.login');
        Route::post('authenticate',[TeacherController::class,'authenticate'])->name('teacher.authenticate');
    });
    Route::group(['middleware'=> 'teacher.auth'],function(){
        Route::get('dashboard',[TeacherController::class,'dashboard'])->name('teacher.dashboard');
        Route::get('myclass',[TeacherController::class,'myClass'])->name('teacher.myclass');
        Route::get('logout', [TeacherController::class, 'logout'])->name('teacher.logout');

    });
});
