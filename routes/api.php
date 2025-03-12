<?php

/* use Illuminate\Http\Request; */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::apiResource('/students', StudentController::class);
Route::apiResource('/teachers', TeacherController::class);
Route::apiResource('/courses', CourseController::class);
Route::apiResource('/enrollments', EnrollmentController::class);
Route::get('/enrollments/student/{student_id}', [EnrollmentController::class, 'getEnrollmentsByStudent']);
Route::delete('/enrollments/{student_id}/{course_id}', [EnrollmentController::class, 'unenroll']);
