<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Front')->group(function(){

    Route::get('/', 'HomeController@index')->name('front.home');

    Route::get('/cat/{id}', 'CourseController@cat')->name('front.courseCat');

    Route::get('/cat/{id}/course/{c_id}', 'CourseController@show')->name('front.showCourse');


    Route::get('/contact', 'ContactController@index')->name('front.contact');

    Route::post('/message/newsletter', 'MessageController@newletter')->name('front.message.newsletter');

    Route::post('/message/contact', 'MessageController@contactform')->name('front.message.contact');

    Route::post('/message/enroll', 'MessageController@enrollform')->name('front.message.enroll');
});

Route::namespace('Admin')->prefix('dashboard')->group(function(){


    Route::get('/login', 'AuthController@login')->name('admin.login');

    Route::post('/dologin', 'AuthController@dologin')->name('admin.dologin');

    Route::middleware(['adminAuth:admin'])->group(function () {

        Route::get('/logout', 'AuthController@logout')->name('admin.logout');

        Route::get('/', 'HomeController@index')->name('admin.home');

        Route::get('/categories', 'CatController@index')->name('admin.category.index');

        Route::get('/categories/create', 'CatController@create')->name('admin.category.create');

        Route::post('/categories/store', 'CatController@store')->name('admin.category.store');

        Route::get('/categories/edit/{id}', 'CatController@edit')->name('admin.category.edit');

        Route::post('/categories/update', 'CatController@update')->name('admin.category.update');

        Route::post('/categories/delete/{id}', 'CatController@destroy')->name('admin.category.destroy');

        Route::get('/trainers', 'TrainerController@index')->name('admin.trainer.index');

        Route::get('/trainers/create', 'TrainerController@create')->name('admin.trainer.create');

        Route::post('/trainers/store', 'TrainerController@store')->name('admin.trainer.store');

        Route::get('/trainers/edit/{id}', 'TrainerController@edit')->name('admin.trainer.edit');

        Route::post('/trainers/update', 'TrainerController@update')->name('admin.trainer.update');

        Route::post('/trainers/delete/{id}', 'TrainerController@destroy')->name('admin.trainer.destroy');

        Route::get('/courses', 'CourseController@index')->name('admin.courses.index');

        Route::get('/courses/create', 'CourseController@create')->name('admin.courses.create');

        Route::post('/courses/store', 'CourseController@store')->name('admin.courses.store');

        Route::get('/courses/edit/{id}', 'CourseController@edit')->name('admin.courses.edit');

        Route::post('/courses/update', 'CourseController@update')->name('admin.courses.update');

        Route::post('/courses/delete/{id}', 'CourseController@destroy')->name('admin.courses.destroy');

        Route::get('/students', 'StudentController@index')->name('admin.students.index');

        Route::get('/students/create', 'StudentController@create')->name('admin.students.create');

        Route::post('/students/store', 'StudentController@store')->name('admin.students.store');

        Route::get('/students/edit/{id}', 'StudentController@edit')->name('admin.students.edit');

        Route::post('/students/update', 'StudentController@update')->name('admin.students.update');

        Route::post('/students/delete/{id}', 'StudentController@destroy')->name('admin.students.destroy');

        Route::get('/students/show-courses/{id}', 'StudentController@showCourses')->name('admin.students.showcourses');

        Route::get('/students/{id}/courses/{c_id}/approve', 'StudentController@approveCourse')->name('admin.students.approveCourse');

        Route::get('/students/{id}/courses/{c_id}/reject', 'StudentController@rejectCourse')->name('admin.students.rejectCourse');

        Route::get('/students/{id}/addcourses', 'StudentController@addCourse')->name('admin.students.addcourse');

        Route::post('/students/assign-course', 'StudentController@assignCourse')->name('admin.students.assignCourse');
    });


});
